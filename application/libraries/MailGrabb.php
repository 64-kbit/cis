<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/14/14
 * Time: 7:27 PM
 */

class MailGrabb {

    public $conn;
    private $inbox;
    private $msg_count;
    public $server ;
    public $pass ;
    public $user ;
    public $port;
    private $folder;
    private $ssl ;
    private $currinbox;
    public $mailstatus;
    public $filefolder ;
    public $savefolder ;
    public $readmailsfile ;
    private $currentmessage;
    private $readmails ;
    private $mailheader;
    private $mailfolder;
    private $transform ;
    private $logs;
    private $logfile;
    private $db;
    private $db_logs;
    private $db_logs_contents = array();
    private $date_sent;
    public   $dl_files;

    function __construct($mailconfig = false,$ssl = false,$import = true){
      if(!$mailconfig) {
          global $mailconfig;
      }
        $this->server = $mailconfig['server'];
        $this->port = $mailconfig['port'];
        $this->user = $mailconfig['user'];
        $this->pass = $mailconfig['password'];
        $this->folder = $mailconfig['folder'];
        $this->filefolder = $mailconfig['tmp_folder'];
        $this->savefolder = $mailconfig['savefolder'];
        $this->readmailsfile = $mailconfig['readmails'];
        $this->db_logs = $mailconfig['db_logs'];
        $this->logs = $mailconfig['logsfile'];
        $this->logfile = $mailconfig['logfile'];
        $this->ssl = $ssl;
        $this->transform = $import;

    }


    function config_files(){
        $testfiles[] = $this->readmailsfile;

        if(!is_dir($this->savefolder)){
           mkdir($this->savefolder);
        }
        if(!is_dir($this->logs)){
            mkdir($this->logs);
        }

        foreach($testfiles as $id => $file){
            if(!(file_exists($file) && is_file($file))){
                $fp = fopen($file,'w');
                fclose($fp);
            }
        }
    }


    function init(){
        $this->config_files();
        $this->readmails = file_get_contents($this->readmailsfile);
        // $this->db = new dbMysql();
        $this->connect();
    }

    // Create connection to the imap server.
    function connect()
    {
        //$host,$port,$user,$pass,$folder="INBOX",$ssl=false
        $host = $this->server;
        $port = $this->port;
        $ssl=($this->ssl ==false)?"imap/novalidate-cert":"imap/ssl";
        echo "\n\r<br>Connecting to mail server\n\r";
         if($this->check_network()){
             $this->conn = imap_open("{"."$host:$port/$ssl"."}$this->folder",$this->user,$this->pass);
             $this->create_log('mail_connect',1,array('data'=>'Successfully Connected to Mail'));
             echo "\n\r<br>Connection Successfull\n\r";
         }else{
             $this->create_log('network_error',1,array('data'=>"Failed to Connect email",'error'=>1));
             echo "\n\r<br>Connection to Mail Server Failed\n\r";
             die();
         }
    }

    function save_logs(){
        echo "\n\r<br>Save logs for database";
         // foreach($this->db_logs_contents as $id => $dt){
             // $this->db->query($dt);
         // }
        return $this->db_logs_contents;
    }

    function write_logs($time,$countents,$log_content,$logtype){

        $str = "time: $time | type: $logtype | content: $countents | logs: $log_content \n" ;
          $contents = "";
        $fname = $this->logfile .".log";
        if(is_file($this->logs.$fname)){
            $contents = file_get_contents($this->logs.$fname);
            $fsize = filesize($this->logs.$fname);
            if($fsize['size'] > (1024 * 1024 * 1024)/2){
               rename($this->logs.$fname,$this->logs.$this->logfile."_".time().".log");
            }
        }
        //$this->check_network()

       // $fp = fopen($this->logs.$fname,'a');
        $contents .= $str;

        file_put_contents($this->logs.$fname,$contents);
        //fwrite($fp,$str,strlen($str)) ;
       // fclose($fp);
    }

    function create_log($log_type,$count,$log){
        $lastrun = date('Y-m-d H:i:s',time());
        $content_count =  $count;
        $log_content = addslashes(json_encode($log));
          $sql = "INSERT INTO {$this->db_logs}(last_run,inserted_contents,logs,log_type) values('{$lastrun}','{$content_count}','{$log_content}','{$log_type}')" ;
          $this->db_logs_contents[] = $sql;
        $this->write_logs($lastrun,$content_count,$log_content,$log_type);
    }

    function check_network(){
        $connected = @fsockopen($this->server, $this->port);

        //website, port  (try 80 or 443)
        if ($connected){
            echo "<br>\n\r Network is reachable";
            $is_conn = true; //action when connected

            fclose($connected);
            }else{

            echo "<br>\n\r Network is unreachable";
                $is_conn = false; //action in connection failure
            }
        return $is_conn;
    }

    // Get mail box information
    function get_mailbox_info()
    {
        $connection = $this->conn;
        $check = imap_mailboxmsginfo($connection);
        return ((array)$check);
    }

    // get the message overview

    function message_overview($message="")
    {
        $connection = $this->conn;
        if ($message)
        {
            $range=$message;
        }else{
            $MC = imap_check($connection);
            $range = "1:".$MC->Nmsgs;
        }

        $response = imap_fetch_overview($connection,$range);
        foreach ($response as $msg) $result[$msg->msgno]=(array)$msg;
        return $result;
    }

    function mail_header($message)
    {
        $connection= $this->conn;
        return(imap_fetchheader($connection,$message,FT_PREFETCHTEXT));
    }

    function check_if_mail_read($mailid){

        $status = $this->readmails;
        if(substr_count($status,$mailid)){
        return true;
        }else{
          return false;
        }
    }


    // Update read mails;
    function update_read_mails($mid){
       $this->readmails .= "$mid,";
    }

    function save_read_mails_to_file(){
         file_put_contents($this->readmailsfile,$this->readmails);
    }

    // delete mail
    function delete_mail($message)
    {
        $connection = $this->conn;
        return(imap_delete($connection,$message));
    }
    /** @param $headers Fetched email headers;
     * translate mail headers
   */

    function mail_parse_headers($headers)
    {
        $headers=preg_replace('/\r\n\s+/m', '',$headers);
        $headers=trim($headers)."\r\n"; /* a hack for the preg_match_all in the next line */
        preg_match_all('/([^: ]+): (.+?(?:\r\n\s(?:.+?))*)?\r\n/m', $headers, $matches);
        foreach ($matches[1] as $key =>$value) $result[$value]=$matches[2][$key];
        return($result);
    }

    /**
     * @param integer $mail Email id
     * @param bool $file if to return a file or not
     * @param bool $allowimport  permit the function to import to database
     */
    function get_mail_attachment($mail,$file=false,$allowimport=true){

        $attachments = $this->search_mail($mail);

        if($attachments){

        $logcontents  = array('db_count'=>0);
          $countdata = 1;
        foreach($attachments as $id => $attc){
            foreach($attc as $ad => $data){
            if(isset($data['is_attachment']) && $data['is_attachment']){
                  $fname = isset($data['filename'])?$data['filename']:$data['name'];
               // var_dump($data) ;die();
                 $ftype = $this->file_type_from_name($fname);
                if(strtolower($ftype['type']) == 'xls' || strtolower($ftype['type']) == 'csv' || strtolower($ftype['type']) == 'txt'){
                    $name = $this->create_file_from_attachment($data['data'],$ftype['name'],$ftype['type']);
                        // $csv = new Csv2db($name,$ftype['name'].".".$ftype['type']);
                        // $csv->register_file($ftype['name'].".".$ftype['type'],$attc['date_sent'],$attc['mail_id']);
                        // $csv->do_the_work() ;
                        $logcontents[$id] = array('file'=> $ftype['name'].".".$ftype['type'],
                            'date_sent'=> $attc['date_sent'],
                            'search_param'=>$mail,
                            'db_import'=>'none',
                            'otherinfo' => $name
                        );
                       echo "<br>\n\rMail attachment Grabbed";
                        $logcontents['db_count'] = $id;

                    $this->dl_files[] = array(
                        'file'=>  $name,
                        'date'=>$attc['date_sent']  ,
                        'mail' => $mail
                    );
                      $countdata += 1;

                   //rename($name,$this->savefolder . $ftype['name'].".".$ftype['type']) ;

                $email = $this->user;
                $Name = "E-Mail Attachment Extraction System";
                $header = "From: ". $Name . " < " . $email . ">\r\n"; //optional headerfields
                    // Send notification as mail sent
                mail('ombeniaidani@gmail.com','CRDB-Statements','File Saved',$header);


                }
                //var_dump($data);
            }
            }
        }
            $this->create_log('email_scan',count($attachments),array('data'=>$logcontents,'error'=>false)) ;     // create a log for the happened above events
        }  else{
            $this->create_log('email_scan',1,array('data'=>'No New Emails Found','error'=>true));
            echo "<br>\n\rNo New Emails found\n\r";
        }
    }

    private function create_file_from_attachment($fdata,$name,$type){
           $status = file_put_contents($this->filefolder . $name.time().".".$type,trim(trim($fdata,'<'),'\n\r'));
        return $this->filefolder . $name.time().".".$type;
    }

   function file_type_from_name($name){
       $namdata = explode('.',$name);
       $type = array_pop($namdata);
       $nm = "";
       while(list($k,$v) = each($namdata)){
            $nm .= $v. "_";
       }

       return array('name'=>$nm,'type'=>$type);
   }

    function mail_mime_to_array($mid,$parse_headers=false)
    {
        $imap = $this->conn;
        $mail = imap_fetchstructure($imap,$mid);
        $mail = $this->mail_get_parts($mid,$mail,0);
        if ($parse_headers) $mail[0]["parsed"]=$this->mail_parse_headers($mail[0]["data"]);
        return($mail);
    }

    function search_mail($searchstring){
        $mailid = imap_search($this->conn,$searchstring);
         // var_dump($mailid);

        $result = false;
        if($mailid){

            $this->mailstatus['status'] = count($mailid);
            $this->mailstatus['msg'] = count($mailid) . " Emails Found \n\r<br>";
            $this->currinbox = $mailid;
            echo "\n\r<br>".  count($mailid) ." Emails Found <br>\n\r";
                foreach($mailid as $id => $mid){

                    if(!$this->check_if_mail_read($mid)){
                        echo "\n\n<br> Mail: " . ($id + 1) . " Fetched ";
                         $this->update_read_mails($mid);
                         $result[$id] = $this->mail_mime_to_array($mid);
                         $msgOverview = $this->message_overview($mid);
                         $result[$id]['date_sent'] = $msgOverview[$mid]['date'];
                        $result[$id]['mail_id'] = $mid;
                    }else{
                        echo "\n\n<br> Mail: " .( $id + 1) . " Found already read by system ";
                    }
                }

            $this->inbox = $result;
        }else{
             $this->mailstatus['msg'] = '<br>\n\rNo Email  Found';
            $this->mailstatus['status'] = false;
            $result = false;
           }
        $this->save_read_mails_to_file();
        return $result;
    }

    function mail_get_parts($mid,$part,$prefix)
    {
        //$imap = $this->conn;
        $attachments=array();
        $attachments[$prefix]=$this->mail_decode_part($mid,$part,$prefix);
        if (isset($part->parts)) // multipart
        {
            $prefix = ($prefix == "0")?"":"$prefix.";
            foreach ($part->parts as $number=>$subpart)
                $attachments = array_merge($attachments, $this->mail_get_parts($mid,$subpart,$prefix.($number+1)));
        }
        return $attachments;
    }




    function mail_decode_part($message_number,$part,$prefix)
    {

        $connection = $this->conn;
        $attachment = array();
        if($part->ifdparameters) {
            foreach($part->dparameters as $object) {
                $attachment[strtolower($object->attribute)]=$object->value;
                if(strtolower($object->attribute) == 'filename') {
                    $attachment['is_attachment'] = true;
                    $attachment['filename'] = $object->value;
                }
            }
        }

        if($part->ifparameters) {
            foreach($part->parameters as $object) {
                $attachment[strtolower($object->attribute)]=$object->value;
                if(strtolower($object->attribute) == 'name') {
                    $attachment['is_attachment'] = true;
                    $attachment['name'] = $object->value;
                }
            }
        }

        $attachment['data'] = imap_fetchbody($connection, $message_number, $prefix);
        if($part->encoding == 3) { // 3 = BASE64
            $attachment['data'] = base64_decode($attachment['data']);
        }
        elseif($part->encoding == 4) { // 4 = QUOTED-PRINTABLE
            $attachment['data'] = quoted_printable_decode($attachment['data']);
        }

        return ($attachment);
    }

} 
