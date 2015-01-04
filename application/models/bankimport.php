<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


<?php

class BankImport extends DataMapper{
    
    var $table='cis_students_fee_imports_crdb';
    var $validation=array(
            array(
            'field'=>'student_name',
            'label'=>'Student Name',
            'rule'=>array('required','trim')
        ),
            array(
            'field'=>'paid_amount',
            'label'=>'Paid Amount',
            'rule'=>array('required','trim','decimal')
        ),
            array(
            'field'=>'date_of_deposit',
            'label'=>'Date Of Deposit',
            'rule'=>array('required','trim','valid_date')
        ),
            array(
          'field'=>'transaction_key',
            'label'=>'Transaction Key',
            'rule'=>array('required','trim','unique')
        ),
            array(
            'field'=>'checked',
            'label'=>'Checked',
            'rule'=>array('required','trim','matches'=>array(1,0))
        ),
            array(
            'field'=>'checked_by',
            'label'=>'Checked By',
            'rule'=>array('required','trim')
        ),
            array(
            'field'=>'payinslip_file',
            'label'=>'Payinslip File',
            'rule'=>array('required','trim','unique')
        ),
            array(
            'field'=>'form_iv_index',
            'label'=>'Form IV Index',
            'rule'=>array('required','trim','unique')
        ),
        'receipt_id'=>array(
            'label'=>'Receipt Id',
            'rule'=>array('required','trim','unique')
        ),
            array(
            'field'=>'issue',
            'label'=>'Issue',
            'rule'=>array('required','trim')
        ),
            array(
            'field'=>'comment',
            'label'=>'Comment',
            'rule'=>array('required','trim')
        ),
            array(
            'field'=>'is_valid_payment',
            'label'=>"Is Valid Payment",
            'rule'=>array('required','trim')
        ),
            array(
            'field'=>'paid_for',
            'label'=>'Paid For',
            'rule'=>array('required','trim')
        ),
            array(
            'field'=>'import_date',
            'label'=>'Import Date',
            'rule'=>array('required','trim','valid_date')
        ),
             
        
    );

    public $fileconfig ;
    
    function __construct($id='false'){
        parent::__construct($id);
    
    }
    
    function get_list(){
        $custom = new CustomQuery();
        $result = "SELECT * FROM cis_students_fee_imports_crdb";
        $data = $custom->execute_query($result);
        $status['count'] = 0;
        $status['result'] = false;
         if($data->num_rows() > 0){
            foreach($data->result_object() as $id=>$list){

                $status['count']+=1;
                $status['list'][]=$list;
            }
         }
        return $status;

    }


    function link_student($stid,$userid = false){
        $student = new StudentInfo();
        $fee = new StudentFeeAccount();

        $student->where("registration_number",$stid)->get();
        if($student->result_count()){
            $sdata = array(
                'registration_no'=>$student->registration_number,
                'student_id'=>$student->id,
                'details' => $student->details_id
            );
            $comments = "Paid at: " . $this->bank_branch . ' Bank For ' . $this->comments . " on " . date("d-M-Y",strtotime($this->date_of_deposit)). ": <br> Received on : " . date("d-M-Y",strtotime($this->import_date)) . " Added Manually on " . date("d-M-Y,h:i a",time());
            $valid = $fee->insert_transaction($sdata,$this->academic_year,$this->paid_amount,1,$this->payinslip_id,date("Y-m-d h:i:s",time()),$comments,$this->file_id,'bank',$this->id);
          // $valid['insert'] = false; $valid['valid'] = false;
            if($valid['insert'] && $valid['valid']){
                $this->checked = 1;
                $this->student_id = $student->registration_number;
                $this->checked_by = $userid;
                $this->check_date = date("Y-m-d H:i:s",time());
                $this->save();
            }
            $student->update_registration_info();

            if($valid['valid']){
                return array('error'=>false,"message"=>"Information Successfully Updated for " . $stid);
            }else{
                return array('error'=>true,"message"=>"Failed to Update Transactions for student with " . $stid);
            }
        }else{
            return array('error'=>true,'message'=>"Student with Registration Number $stid, not Found!!") ;
        }


    }

    function get_student_by_date($import_date){
        $stutus['count']=0;
        $status['list']=false;
        if(isset($import_date)){
            $this->where('import_date===',$import_date)->get();
            foreach($this as $list=>$student){
                $status['count']=+1;
                $status['list'][]=$student;
            }
            return $status;
        }
       
    }
    
    function get_student($unique){
        $status['count']=0;
        $status['list']=false;
        if(is_numuric($unique)||is_string($unique)){
            $this->where('student_id ===',$unique OR 'student_name ===',$unique)->get();
            foreach($this as $list=>$student){
            $status['count']=+1;
            $status['list'][]=$student;  
            }
            return $status;
        }
    }

    /*
     * Add student to loans file contents
     */
    function add_student($data){
        $this->where('payinslip_id',$data->reference)->get();
        if($this->result_count()== 0){
         $this->student_id =preg_replace("/[.]/",'/', $data->student);
        $this->student_name = $data->name;
        $this->paid_amount =$data->amount;
        $this->date_of_deposit = $data->date;
        $this->payinslip_id = $data->reference;
            $this->transaction_key = $data->reference;
        $this->checked =$data->checked;
            $this->checked_by = $data->checkedby;
            $this->academic_year = $data->acyear;
        $this->payinslip_file = $data->payinslip_file;
        $this->form_iv_index = preg_replace("/[.]/",'/',$data->index);
        $this->comments = $data->description;
        $this->paid_for = $data->description;;
        $this->import_date = $data->importdate;
         $this->bank_branch = $data->branch;
        $status = $this->skip_validation(true)->save();
        }else{
            return 'Item Exists';
        }
      /*  if(!$success){

            if($this->valid){
                $status['status']=false;
                $status['msg']='The record has failed to save';
            }else{
                $status['status']=false;
                $this->set_form_errors();
                $status['msg']=$this->form_error();
            }

        }else{

             $status['status']=$this->count();
             $status['msg']='Success';
                
            }  */

    return $status;
   }

    function parse_crdb_text($fname,$userid = 'automatic'){
        $cols = $this->fileconfig;
        if(!is_file($fname)){ return false;}
        $file = file_get_contents($fname);
        $student = new StudentInfo();
        $acyear = new AcademicYear();
        $fee = new StudentFeeAccount();
        $curryear = $acyear->get_current_academic_year();

        $contens = explode("\n",$file);
        $newcontents = false;
        $fileImport = new BankImportFile();

        $data = array('file'=>$fname,'date'=>$cols['date_sent'],'mail'=>$cols['mail_id']);

        $fileImport->add_file($data);
        foreach($contens as $id => $line){
            if(trim($line)){
                if(strlen($line) < 110) {continue;}
                $dte = substr($line,0,10);
                if(preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/",$dte)){
                    $sign =  (trim(substr($line,82,1)));
                    $part2 = (trim(substr($line,83,strlen($line) - 84)));
                    $part2 = explode("   ",$part2);

                    $brch = $part2[1];
                    $money = explode(" ",$part2[0]);

                    $part2[0] = $dte;
                    $part2[1] = trim(substr($line,11,36-11));
                    $part2[2] = trim(substr($line,36,61-36));
                    $part2[3] = trim(substr($line,61,81-62));
                    $part2[4] = (double) ($sign . str_replace(",","",$money[0]));
                    $part2[5] = trim($money[1]);
                    $part2[6] = trim($brch);
                   // $newcontents[]= $part2;


                    if(substr_count($dte,"-") > 0){
                        $exp = explode('-',$dte);
                        $importdate = date("Y-m-d H:i:s",strtotime(($exp[1]."/".$exp[0].'/'.$exp[2])));
                    }elseif(substr_count($dte,"/") > 0){
                        $exp = explode('/',$dte);
                        $importdate = date("Y-m-d H:i:s",strtotime($exp[1]."/".$exp[0].'/'.$exp[2]));
                    }else{
                        $importdate = date("Y-m-d H:i:s",strtotime($dte));
                    }


                    $content = new stdClass();
                    $content->student = $part2[2];
                    $content->name = trim(ucwords(strtolower( $part2[1])));
                    $content->index =  $part2[2];;
                    $content->date = $importdate;
                    $content->description = trim(ucfirst(strtolower($part2[3])));
                    $content->amount = $part2[4] ;
                    $content->reference =  $part2[5];
                    $content->branch = trim(ucwords(strtolower( $part2[6])));
                    $content->importdate = date("Y-m-d H:i:s",time());
                    $content->checked = 0;
                    $content->acyear = $curryear->id;
                    $content->checkedby = $userid;
                    $content->file_id = $fileImport->id;
                    $content->payinslip_file = "";
                    $arraydata[$id]['import'] =  $this->add_student($content);

                    if($arraydata[$id]['import']){
                        $student->where("registration_number",$content->student)->or_where('index_number',$content->student)->get();
                        if($student->result_count()){
                            $sdata = array(
                                'registration_no'=>$student->registration_number,
                                'student_id'=>$student->id,
                                'details' => $student->details_id
                            );
                            $comments = "Paid at: " . $content->branch . ' Bank For ' . $content->description . " on " . date("d-M-Y",strtotime($content->date)). ": <br> Received on : " . date("d-M-Y",strtotime($content->importdate));
                            $valid = $fee->insert_transaction($sdata,$curryear->id,$content->amount,1,$content->reference,$content->date,$comments,$content->payinslip_file,'bank',$this->id);

                            $arraydata[$id]['student']  = $valid;
                            if($valid['insert'] && $valid['valid']){
                                $this->checked = 1;
                                $this->student_id = $student->registration_number;
                                $this->check_date = date("Y-m-d H:i:s",time());
                                $this->save();
                            }

                            $student->update_registration_info();

                        }else{
                            $arraydata[$id]['student'] = 'not found';
                        }
                    }
                }
            }

        }

        return $newcontents;
    }

    function import_from_excel($filename,$userid = 'automatic'){
        $this->load->library('PHPExcel');
        $cols = $this->fileconfig;
          $student = new StudentInfo();
          $acyear = new AcademicYear();
          $fee = new StudentFeeAccount();
        $curryear = $acyear->get_current_academic_year();


          if(is_file($filename)){
              $fileImport = new BankImportFile();

              $data = array('file'=>$filename,'date'=>$cols['date_sent'],'mail'=>$cols['mail_id']);

              $fileImport->add_file($data);
              $objPHPExcel = PHPExcel_IOFactory::load($filename);

              $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

              foreach ($sheetData as $id => $row) {
                  if($id == ($cols['skiprow'] )){
                      continue;
                  }

                  if((trim($row[$cols['payinslip_id']])==false )|| (trim($row[$cols['date_of_deposit']]) ==false )|| (trim($row[$cols['paid_amount']]) ==false)){
                      continue;
                  }

                  if(substr_count($row[$cols['date_of_deposit']],"-") > 0){
                      $exp = explode('-',$row[$cols['date_of_deposit']]);
                      $importdate = date("Y-m-d H:i:s",strtotime(($exp[1]."/".$exp[0].'/'.$exp[2])));
                  }elseif(substr_count($row[$cols['date_of_deposit']],"/") > 0){
                      $exp = explode('/',$row[$cols['date_of_deposit']]);
                      $importdate = date("Y-m-d H:i:s",strtotime($exp[1]."/".$exp[0].'/'.$exp[2]));
                  }else{
                       $importdate = date("Y-m-d H:i:s",strtotime($row[$cols['date_of_deposit']]));
                  }

                  $content = new stdClass();
                  $content->student = trim($row[$cols['student_id']]);
                  $content->name = trim(ucwords(strtolower($row[$cols['student_name']])));
                  $content->index = trim($row[$cols['student_id']]);
                  $content->date = $importdate;
                  $content->description = trim(ucfirst(strtolower($row[$cols['paid_for']])));
                  $content->amount = (double) clean_digits($row[$cols['paid_amount']]);
                  $content->reference = trim($row[$cols['payinslip_id']]);
                  $content->branch = trim(ucwords(strtolower($row[$cols['bank_branch']])));
                  $content->importdate = date("Y-m-d H:i:s",time());
                  $content->checked = 0;
                  $content->acyear = $curryear->id;
                  $content->checkedby = $userid;
                  $content->file_id = $fileImport->id;
                  $content->payinslip_file = "";
                 $arraydata[$id]['import'] =  $this->add_student($content);

                  if($arraydata[$id]['import']){
                 $student->where("registration_number",$content->student)->or_where('index_number',$content->student)->get();
                  if($student->result_count()){
                  $sdata = array(
                         'registration_no'=>$student->registration_number,
                         'student_id'=>$student->id,
                        'details' => $student->details_id
                    );
                  $comments = "Paid at: " . $content->branch . ' Bank For ' . $content->description . " on " . date("d-M-Y",strtotime($content->date)). ": <br> Received on : " . date("d-M-Y",strtotime($content->importdate));
                  $valid = $fee->insert_transaction($sdata,$curryear->id,$content->amount,1,$content->reference,$content->date,$comments,$content->payinslip_file,'bank',$this->id);

                      $arraydata[$id]['student']  = $valid;
                  if($valid['insert'] && $valid['valid']){
                      $this->checked = 1;
                      $this->student_id = $student->registration_number;
                      $this->check_date = date("Y-m-d H:i:s",time());
                      $this->save();
                  }

                      $student->update_registration_info();

                  }else{
                      $arraydata[$id]['student'] = 'not found';
                  }
                  }
                  // $arraydata[] = $content;

              }

          }
        return $arraydata;
    }


    function import_from_csv($filename){
       $cols = $this->fileconfig;
        var_dump($cols);
        if(is_file($filename)){
            var_dump(file_get_contents($filename));
        }
        return false;
    }


    function update_list($newData){
       
    }




    function delete_student($presentData){
        $delete_one=new LoanFee();
        $delete_one=where('student_name OR student_id OR is_valid_payment==', $presentData)->get();
        //this will delete the selected student records
        $delete_one=delete();

    }


    function delete_all($presentData,$mode= 1){
       // $delete_all= new LoanFee();
        $delete_all= $this->where('is_valid_payment',$presentData);
        if($mode == 1){

        foreach($delete_all as $trash){
            $trash->delete();
        }
      }
    
    }



    function form_error(){
        $errors = false;
         if(isset($this->error->student_name)){
             $errors['ci_student_name'] = $this->error->student_name;
         }
        if(isset($this->error->paid_amount)){
            $errors['ci_paid_amount']= $this->error->paid_amount;
         }
        if(isset($this->form_iv_index)){
            $errors['ci_form_iv_index']= $this->error->form_iv_index;
         }
        if(isset($this->error->date_of_deposit)){
            $errors['ci_date_of_deposit']= $this->error->date_of_deposit;
         }
           if(isset($this->error->payinslip_id)){
            $errors['ci_payinslip_id']= $this->error->payinslip_id;
         }
           if(isset($this->error->checked)){
            $errors['ci_checked']= $this->error->checked;
         }
           if(isset($this->error->is_valid_payment)){
            $errors['ci_is_valid_payment']= $this->error->is_valid_payment;
         }
           if(isset($this->error->form_iv_index)){
            $errors['ci_form_iv_index']= $this->error->form_iv_index;
         }
         if(isset($this->error->comments)){
            $errors['ci_comments']= $this->error->comments;
         }
           if(isset($this->error->paid_for)){
            $errors['ci_paid_for']= $this->error->paid_for;
         }
             if(isset($this->error->import_date)){
            $errors['ci_import_date']= $this->error->import_date;
         }
         
         

    return $errors;
    }

}
?>
