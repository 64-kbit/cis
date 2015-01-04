
<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/15/14
 * Time: 8:01 PM
 */
include 'CsvImporter.php';

class Csv2db {
    private $file;
    private $filename;
    private $header;
    private $colheads;
    private $data;
    private $csvData;
    private $colmap;
    private $headerrow;
    private $delimiter;
    private $encloer;
    private $totalrows;
    private $errors;
    private $dbconfig;
    private $dbconn;
    private $dbtable;
    private $dbcolumns;
    private $skiprows;
    private $trans_file;
    private $trans_data;
    private $last_transaction;
    private $last_query;
    private $date_sent;
    public $total_items = array('total'=>0);
    // make the csv file object
    function __construct($file,$fname){
        global $dbconfig;
        global $colmap;
        $this->dbconfig = $dbconfig;
        $this->file = $file;
        $this->filename = $fname;
        $this->colmap = $colmap;
        $this->headerrow = $colmap['header_row'];
        $this->delimiter = $colmap['delimeter'];
        $this->encloer = $colmap['enclosure'];
        $this->skiprows = $colmap['skips'];
        $this->trans_file =$colmap['trans_file'];
       // $this->trans_data = $date_sent;
        if($this->open_csv_file()){
            $importer = new CsvImporter($this->file,false,$this->delimiter);
            $this->csvData = $importer->get();
            $this->header = $this->get_header() ;
            $this->colheads = $this->get_head_cols();
            $this->totalrows = count($this->csvData);
            $this->data = $this->get_csv_array();
            $this->dbcolumns = $this->columnsar_to_str($colmap['dbcols']);
            $this->dbtable = $dbconfig['dbtable'];
            $this->trans_data = $this->open_data_file();

        }

        $this->dbconn = new  dbMysql();

        // $this->data = $this->get_csv_array();
    }

    // open data file
    function open_data_file(){

        $filename = $this->colmap['trans_file'];
        $file =  new CsvImporter($filename,false,',');
         if(file_exists($filename) && is_file($filename)){
             $this->trans_data = $file->get();
           $this->trans_data =  isset($this->trans_data[0])?$this->trans_data[0]:$this->trans_data;
             $this->last_transaction = isset($this->trans_data[0])?$this->trans_data[0]:$this->trans_data;
         }else{
             $myfile = fopen($filename,'w');
             fclose($myfile);
             $this->trans_data = $file->get();

         }
    }

    // database columns to query strucuture
    function columnsar_to_str($colarr){
        $cols['cols'] = "";
        $cols['structure'] = array();
        $x = 0;

        foreach($colarr as $id => $val){

           if($val != 'none' || $val == 0){
            $cols['cols'] .= $x ==0?$id:','.$id;
            $cols['structure'][] = $id;
           }
            $x += 1;
        }


      return $cols;
    }
      // Test to open the csv file if it exists return true; if not return false;
    function open_csv_file(){
        $finame = $this->file_type_from_name($this->filename);

        if(file_exists( $this->file) && is_file( $this->file) && strtolower($finame['type']) == 'csv'){

            return true;
        }else{

            return false;
        }
    }
      // Get the file type that is accessed
    function file_type_from_name($name){
        $namdata = explode('.',$name);
        $type = array_pop($namdata);
        $nm = "";
        while(list($k,$v) = each($namdata)){
            $nm .= $v. "_";
        }
        return array('name'=>$nm,'type'=>$type);
    }

  // get the columns of the csv data
 function get_head_cols(){
    return $this->csvData[$this->headerrow];
 }

  // Get the header contents of the file
 function get_header(){
    $header  = array();
     if($this->headerrow == 0) return $header;
     foreach($this->csvData as $id => $data){
         $val = 0;   //var_dump($data);
          foreach($data as $col => $cd){
              $data[$col] = trim($data[$col],"");
              if(isset( $data[$col + 1]) && $cd != ""){
                  if($col/2 != 0){
                      continue;
                  }
                  $header[][$cd] = $data[$col   + 1];
                  $val++;
              }
          }

         if($id == ($this->headerrow - 1) ) break;
     }

     return $header;
 }
// Get the data contents from the csv file
function get_csv_array (){
    $data = array();
    for($x = $this->headerrow + 1; $x < $this->totalrows; $x++) {
        $data[] = $this->csvData[$x];
    }
    return $data;
}

    // create date for the database
    function date_convert($dt){
        $dtdata = preg_replace('/A7P7/','',$dt);

        $new = date('Y-m-d h:i:s',strtotime($dtdata));
        return $new;
    }
       // Clean digits replace commas with nothin. remove commas
    function clean_digits($str){

        $newstr = preg_replace('/,/','',$str);

        return $newstr;
    }

    function generate_transaction_key(){
        $startkey = 0;
      $newkey = "";

       if(empty($this->last_transaction)){
           $newkey = date('Y',time())."-000001";

       }else{

           $last = trim($this->last_transaction);

         // reset($this->trans_data);

           $cr = explode('-',$last);
            $ci = isset($cr[1])?ltrim($cr[1],'0'):0;
           $ci = date("Y",time()) == $cr[0]?$ci + 1:1;
           $currdate = date('Y',time());

           $newkey = $currdate . "-" . str_pad($ci,(7-count($ci)),'0',STR_PAD_LEFT);

       }

         $this->last_transaction = $newkey;
        return $newkey;
    }

    function write_transactions(){

           $handle = fopen($this->trans_file,'w');
            fputcsv($handle,array(end($this->trans_data)),',');
           fclose($handle);
    }

    function auto_db_values_type($type){
        $value = false;
        switch($type){
            case 'currdate':
                $value = date('Y-m-d H:i:s',time());
            break;
            case 'checktrue':
                $value = 1;
                break;
            case 'checkfalse':
                $value = 0;
                break;
            case 'keygen':
                 $value = $this->generate_transaction_key();

                 $this->trans_data[] = $value;

                break;
            default:
                $value = false;
                break;
        }

        return $value;
    }

    function translate_values($type,$value){
        $new = "";
        switch($type){
            case 'date':
                $new = $this->date_convert($value);
                break;
            case 'decimal':
                $new = $this->clean_digits($value);
                break;
            case 'integer':
                $new = $value;
                break;
            default :
                $new = addslashes($value);
           }

        return $new;
    }

    function grab_db_values($data){
        $values = "";
        foreach($this->dbcolumns['structure'] as $id=>$val){
            $dt = isset($data[$this->colmap['dbcols'][$val]])?$data[$this->colmap['dbcols'][$val]]:$this->auto_db_values_type($this->colmap['dbcols'][$val]);
            $valuedata = $this->translate_values($this->colmap['colstype'][$val],$dt);
            $values .= isset($this->dbcolumns['structure'][$id + 1])?"'". $valuedata ."', ": "'".$valuedata."' ";
        }

        $values =  trim($values,",");
        $values = trim($values,',');
        return $values;
    }

    function build_query(){
        $sql = "INSERT INTO ".$this->dbtable . "(". trim($this->dbcolumns['cols'],",").",file_id,checked) values ";
        $fileid = $this->dbconn->insert_id;

        foreach($this->data as $id => $dt){
            $content = new stdClass();
            $content->student = $dt[$this->colmap['dbcols']['student_id']];
            $content->paid_amount = $this->clean_digits($dt[$this->colmap['dbcols']['paid_amount']]);
            $content->date = $this->date_convert($dt[$this->colmap['dbcols']['date_of_deposit']]);
            $content->branch = $dt[$this->colmap['dbcols']['bank_branch']];
            $content->reference = $dt[$this->colmap['dbcols']['payinslip_id']];
            $content->description = $dt[$this->colmap['dbcols']['paid_for']];
            $content->name = $dt[$this->colmap['dbcols']['student_name']];
            $studentinfo = $this->get_student_info($content->student);

            if($studentinfo){
                $acyear = $this->get_academic_year(date('Y',strtotime($content->date)));
                $checked = $this->link_students_to_accounts($studentinfo,$content,$acyear);
            }

            $sql .= isset($this->data[$id+1])?" (". ($this->grab_db_values($dt)) . ",{$fileid}), ":" (".$this->grab_db_values($dt) .",{$fileid});";
            $this->total_items['total'] += 1;

        }

        $sql = trim($sql,',');
         $this->write_transactions();
        $this->last_query = $sql;
        var_dump($sql);
        die();
       return $sql;
    }

    function import_data(){
        $sql = $this->build_query();
        $status = $this->dbconn->query($sql);

        $error = $this->dbconn->error_list;
        $this->total_items['db_errors'] = $error;
    }

    /**  Register the file to the database
     * @param string $fname
     * @param string $date_sent
     */
    function register_file($fname,$date_sent,$mailid){

        $date_sent = date('Y-m-d H:i:s',strtotime($date_sent));

        $table = $this->dbconfig['files_table'];
        $sql = "INSERT INTO {$table}(date_received,date_sent,file_name,mail_id) VALUES (NOW(),'{$date_sent}','{$fname}',$mailid)";
        $this->dbconn->query($sql);

    }

    function get_academic_year($startyear){
      //  echo $startyear;
       // die();
         $sql = "SELECT * FROM cis_college_academic_years AS acy where acy.start_year == $$startyear";
        $result= $this->dbconn->query($sql)->fetch_all();

            var_dump($result); die();
        if($result->num_rows){
           $result->fetch_object();
            return $result;
        }                  else{
            return false;
        }
    }

    function get_student_info($stdid){
      $sql = "SELECT * FROM cis_student_registration_id as std where std.registration_number = '$stdid' or std.index_number = '$stdid'";
        $result = $this->dbconn->query($sql);
        if($result->num_rows){
            $result->fetch_object();
            return $result;
        }else{
            return false;
        }
    }

	function link_students_to_accounts($stdid,$info,$acyear){

	}

    // well do the whole work of importing to the designeted database
    function do_the_work(){

      $this->import_data();

    }
} 
