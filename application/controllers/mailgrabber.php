<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

class mailGrabber extends CI_Controller {
    public $configitems;
    function __construct(){

        parent::__construct();

        if(!$this->input->is_cli_request()){
            $username = $this->input->get('username');
            $password = $this->input->get('password');

            if($username == "xnet-oau" && $password=='ombeniaidani'){
                echo "allowed";
            }else{
             //  redirect(base_url());
            }
        }


        //$this->config['mailgrabber'] = false;
    }

    function status(){
         echo "Grabber is Running fine\n\r";
    }

    function index(){

        $this->config->load('csv_config');
        $this->load->library('mailGrabb');
        $this->load->model('customquery');
        $this->configitems =  $this->config->config['mailgrabber'];
        $this->config->config['mailgrabber'] = false;

        echo "
        :::::::::::::::::::::::::::::::::::::::::::::::::::::::
        ::::::::::: MAIL GRABBER BY OAU . CI-Version ::::::::::
        :::::::::::::::::::::::::::::::::::::::::::::::::::::::
        \n\r";


        $mailconfig = $this->configitems['mailconfig'];
         $query = new CustomQuery();
        $mailgrab = new MailGrabb($mailconfig,true,false);
        $mailgrab->init();

        $subject = $mailconfig['subject'];
        $matchtext = $mailconfig['matchtext'];
        $from = 'FROM "'.$mailconfig['sender'].'" ';
        $to = 'TO "'.$mailconfig['receiver'].'" ';  //text "'.$matchtext.'"
        $searchstr = $from . $to ; //. 'subject "'.$subject.'" ';


         $mailgrab->get_mail_attachment($searchstr,false,true);



       $logs = $mailgrab->save_logs();
        $filelist = $mailgrab->dl_files;
        $mailstatus = $mailgrab->mailstatus;

        foreach($logs as $log){
            $query->execute_query($log);
        }


       // $filelist[] = array('date'=>date('Y-m-d, H:i:s',time()),'file'=>FCPATH.MAIL_FILES."file.txt",'mail'=>2);

        $bankimport = new BankImport();
        $status = "";
        if(!empty($filelist) && is_array($filelist) && isset($filelist[0]['file'])){
                foreach($filelist as $id => $file){
                    $fileinfo = file_type_from_name($file['file']);
                   // if(preg_match('/xls/',strtolower($fileinfo))){
                    if(file_exists($file['file'])){
                        $bankimport->fileconfig['date_sent'] = $file['date'];
                        $bankimport->fileconfig['mail_id'] = $file['mail'];
                        $bankimport->fileconfig += $this->configitems['colmap']['dbexcel'] ;

                    echo "<br>\r\nImporting file contents to database for file no . " . ($id + 1 );          echo "<br> file: " . $file['file'] . "<br>";

                        if(preg_match('/txt/',strtolower($fileinfo))){
                            $status[] = $bankimport->parse_crdb_text($file['file']);
                        }else{
                            $status[] = $bankimport->import_from_excel($file['file']);
                        }
                    var_dump($status);
                    echo "<br>\r\nImporting file contents to database for file Done . " . ($id + 1) ;
                   }else{
                        echo "<br>\r\nFailed to import File doesnot exist . " . ($id + 1 );
                        echo "<br> file: " . $file['file'] . "<br>";
                        $status[] = "<br>File does not exists  file: " . $file['file'] . "<br>";;
                    }

                    //  }elseif($fileinfo == 'csv'){
                  //      $bankimport->fileconfig = $this->configitems['colmap']['dbcols'] ;
                  //      $bankimport->import_from_csv($file);
                  //  }else{
                  //      echo "<br>\n\r Unsupported file type.";
                  //  }
                }
        }

        $this->save_logs(json_encode($status) . json_encode($filelist));

    }


    function save_logs($data){
        $file = FCPATH.UPLOAD_DIR."/logs/email_attachments_log.log";
        if(is_file($file)){

        }else{
          $fh =  fopen($file,'w');
            fclose($fh);
        }

        $status = file_put_contents($file,date("d-m-y H:i:s") . " : data :" . $data);
    }

} 
