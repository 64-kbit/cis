<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php

/**
 * Class StudentLoan used to manage and manipulate students loans contents
 */
class StudentLoan extends DataMapper {
    public $table = 'cis_students_fee_imports_loans' ;
    var $validation = array(
        'student_id'=> array(
            'label'=>'Registration ID',
            'rules'=>array('trim','xss_clean')
        ),
        'student_name'=> array(
            'label'=>'Name',
            'rules'=>array('trim','xss_clean')
        ),
        'semester_amount'=> array(
            'label'=>'Amount',
            'rules'=>array('trim','xss_clean')
        ),
        'academic_year'=> array(
            'label'=>'Academic Year',
            'rules'=>array('trim','xss_clean')
        ),
        'form_iv_index'=> array(
            'label'=>'Form four Index',
            'rules'=>array('trim','xss_clean')
        ),
    );

    function __construct($id = null){
        parent::__construct($id);
    }

    function get_all(){
        $sql = "select concat(pg.name,'-',cz.name) as course, concat(st.last_name,' ',st.first_name,' ',st.middle_name) as student_name,st.gender,st.mobile_number,loan.* from cis_students_fee_imports_loans as loan
        left join cis_student_registration_id as reg on (reg.registration_number = loan.student_id or reg.index_number = loan.form_iv_index )
        left join cis_students_details as st on  reg.details_id = st.id
        left join cis_department_course as cz on cz.id = reg.course_id
         left join cis_department_programs as pg on pg.id = reg.programme_id
        ";
        $cuq = new CustomQuery();
        $resutl = $cuq->execute_query($sql);

        $status['count'] = $resutl->num_rows();
        $status['list'] = false;
        if($status['count'] == 0){
            return $status;
        } else{
        foreach($resutl->result_array() as $id => $ob){

            $status['list'][] = $ob;
        }
        return $status;  }
    }


    function add_loan($data){
        $this->where(array('student_id'=>$data['registration_no'],'academic_year'=>$data['academic_year']))->get();
        if($this->result_count() == 0){
            $this->student_id = $data['registration_no'];
            $this->form_iv_index = $data['form_four_index'];
            $this->assigned_yos = $data['year_of_service'];
            $this->current_yos = $data['current_year_of_service'];
            $this->semester_amount = preg_replace('/,/','',$data['amount']);
            $this->academic_year = $data['academic_year'];
            $this->ac_year_id = $data['academic_id'];
            $this->comments = $data['remarks'];
            $this->semester_id = $data['semester'] ;
            $this->import_date = date('Y-m-d H:i:s',time());
            $this->imported_by = $data['imported_by'];
            $this->checked = 0;
            $this->reference_id = null;
            $this->file_id = $data['file_id'];
            $this->save_as_new();
            $this->id = $this->db->insert_id();
            if($this->valid){
                return array('error'=>false,'msg'=>$data['registration_no'] . ' <span class="badge badge-success">Saved</span>');
            }else{
                return array('error'=>true,'msg'=>'Check data errors','errormsg'=>$this->all_errors());
            }
        }else{
            return array('error'=>true,'msg'=>'<span class="badge badge-warning">Student Loan Already Exists</span>');
        }
    }

    function all_errors(){
        $msg = "";
        foreach($this->error->all as $a){
            $msg .= "<span class='alert alert-danger'> $a</span>" ;
        }

        return $msg;
    }

    function _currency_format($file,$param){
        return true;
    }


    function compose_transaction_key($id,$year,$yos,$cis_index){
          $yr = substr($year,-2);
          $idx = explode("-",$cis_index);
          $str =  'L'.$yos.$yr."-". $idx[2]."-". four_digit_no($id) ;
        return $str;
    }

    function import_loan_csv_to_db($flurl,$config,$userid,$fileid){

        $this->load->library('PHPExcel');

        $acadY = new AcademicYear();
        $student = new StudentInfo();
        $payment = new StudentFeeAccount();
        $sponsor = new StudentSponsor();
        $data = array();
        $status = array();

        if(is_file($flurl)){
            $objPHPExcel = PHPExcel_IOFactory::load($flurl);

            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

            foreach($sheetData as $id => $row){
                 if($id == 1){
                     continue;
                 }
            if(trim($row[$config['registration_no']]) == false || trim($row[$config['amount']]) == false ){
                $status[$id] = 'Empty row or Missing Key Information on a row';
                continue;
            }



                $acadY->where('notation',$row[$config['academic_year']])->get() ;

                if($acadY->result_count() == 0){
                    $status[$id] = 'Invalid Academic Year Specified. or Academic year is not Available in a system';
                    continue;
                }

                $sponsor->where('code_name', $row[$config['sponsor']])->get();
                if($sponsor->result_count() == 0){
                    $status[$id] = "Undefined Student Fee Sponsor Type. Please make sure the sponsor code names exists in our database" ;
                    continue;
                }

                if(!is_numeric(clean_digits($row[$config['amount']]))){
                    $status[$id]  = "Invalid Characters found on the Amount Specified!";
                    continue;
                }

                $data = array(
                    'academic_year'=>$row[$config['academic_year']],
                    'academic_id'=>$acadY->id,
                    'registration_no' => $row[$config['registration_no']],
                    'sponsor' =>$sponsor->id,
                    'year_of_service' => $row[$config['year_of_study']],
                    'current_year_of_service' => $row[$config['current_year']],
                    'amount' => clean_digits($row[$config['amount']]),
                    'remarks' => $row[$config['remarks']],
                    'form_four_index'=> preg_replace("/[.]/",'/',$row[$config['index_no']]),
                    'semester' => $row[$config['semester']],
                    'imported_by'=>$userid  ,
                    'file_id'=>$fileid
                );

                // var_dump($data);
                // die();

                $status[$id] = array('registration_no'=> $row[$config['registration_no']]) + $this->add_loan($data);

                 if($status[$id]['error'] == false){
                $student->where('registration_number',$data['registration_no'])->get();

                 if($student->result_count()){

                     $trans = $this->compose_transaction_key($this->id,$acadY->start_year,$data['year_of_service'],$student->cis_reg_id);

                      $student->fee_sponsor_id = $sponsor->id;
                     $student->has_loan = 1;
                     $student->save();
                     $comments = 'New credit Tuition Fee from Loan. ' .$data['remarks'];
              $lstatus =   $payment->insert_transaction(array('details'=>$student->details_id,'registration_no'=>$data['registration_no'],'student_id'=>$student->id),$acadY->id,$data['amount'],1,$trans,date("m-d-Y",time()),$comments,$fileid,'loan',$this->id);

                if($lstatus['valid'] && $lstatus['insert']){
                    $this->checked = 1;
                    $this->reference_id = $trans;
                    $this->checked_by = 'Auto Insert:'.$userid;
                    $this->save();
                    $status[$id]['linkinfo'] = $lstatus;
                }
                    // $student->update_registration_info($student->registration_number);
                 }
                 }

                $student->update_registration_info($data['registration_no']);

            }

            //$this->session->set_userdata('loans_import_status', $status);
        }

        // $this->session->set_userdata('flash_data',$data);
        return $status;
    }

} 
