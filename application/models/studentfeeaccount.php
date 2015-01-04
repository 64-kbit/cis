<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/1/14
 * Time: 5:30 AM
 */

class StudentFeeAccount extends DataMapper {
    public $table   = 'cis_student_payments_account_ledger';
    function __construct(){
        parent::__construct();
    }


    function get_current_balance($stdid){

    }


    function compose_transaction_key(){

    }

    public function student_balance($regno,$acyear){
        $sql = "SELECT sum(led.amount) as amount,led.amount_type FROM cis_student_payments_account_ledger as led where led.academic_years_id = $acyear and led.registration_id = '$regno' and item != 'loan' group by amount_type";
    $loan = "SELECT sum(led.amount) as amount FROM cis_student_payments_account_ledger as led where led.academic_years_id = $acyear and led.registration_id = '$regno' and led.item = 'loan' and led.amount_type = 1";
        $data = $this->db->query($sql);
        $ldata = $this->db->query($loan);

        $credit = 0;
        $debit = 0;
        foreach($data->result_array() as $dt){
            if($dt['amount_type'] == 1){
                $credit +=  (double) $dt['amount'];
            }else{
                $debit += (double)$dt['amount'];
            }
        }
         $loan = 0;
        if( $ldata->num_rows()>0){

            $loan = $ldata->row_array();
           $loan = (double)($loan['amount']) ;
        }

        $status['loan'] = $loan;
        $status['balance'] = array('debit'=>$debit,'credit'=>$credit,'status'=>($credit-$debit));

        return $status;
    }

    /**  // Open student Account for depositiong transactions of money
     * @param $data  student info(id,reg_no,);
     * @param int $stype   student type
     * @param StudentInfo $student student object holding details
     * @param $initiator
     * @return string
     */
    function open_account(&$data,$stype=1,StudentInfo &$student,$initiator){
        $loansFiles = new StudentLoan();
        $bankimport = new BankImport();
        $acYear = new AcademicYear();
        $curryear = $acYear->get_current_academic_year();

        $otherSupport = new StudentFeeSponsorInfo();
         $feestatus = "";
        // Import Fee payment from loans for loan students
        $loansFiles->where(array("student_id"=>$data['registration_no'],'ac_year_id'=>$curryear->id,'checked'=>0))->get();
        if($loansFiles->result_count() > 0){
              $student->update_status('has_loan',1);
            $comments = 'New credit Tuition Fee from Loan. ' .$loansFiles->comments;

            $transid = $loansFiles->compose_transaction_key($loansFiles->id,$curryear->start_year,$loansFiles->current_yos,$student->cis_reg_id);


           // var_dump($data);die();
             if($loansFiles->student_id ==$data['registration_no'] ){
            $valid =    $this->insert_transaction($data,$curryear->id,$loansFiles->semester_amount,1,$transid,$loansFiles->import_date,$comments,"",'loan',$loansFiles->id);

             if($valid['insert'] && $valid['valid']){
            $loansFiles->checked = 1;
                 $loansFiles->reference_id   = $transid;
            $loansFiles->checkec_by = $initiator;
                 $loansFiles->save();
                 $feestatus .= " Student Loan Added!!. " . $transid;
             } }else{
                 $feestatus .= " Student not matched . not added";
             }
        }else{
            $student->update_status('has_loan',0);
        }
           // Import fee payment from bank for all students
        $bankimport->where(array('student_id'=>$data['registration_no'],'checked'=>0))->get();
        if(trim($data['form_iv_index']) && $bankimport->result_count() == 0){
            $bankimport->where(array('student_id'=>$data['form_iv_index'],'checked'=>0))->get();
        }
        $updateIds = array();
        if($bankimport->result_count() > 0){
            $bank = 0;
            foreach($bankimport as $ob){
                $comments = "Paid at: " . $ob->bank_branch . ' Bank For ' . $ob->paid_for . " on " . date("d-M-Y",strtotime($ob->date_of_deposit)). ": <br> Received on : " . date("d-M-Y",strtotime($ob->import_date));
              $valid=  $this->insert_transaction($data,$curryear->id,$ob->paid_amount,1,$ob->payinslip_id,$ob->date_of_deposit,$comments,$ob->payinslip_file,'bank',$ob->id);     $bank += $ob->paid_amount;
               if($valid['insert'] && $valid['valid']){
                   $updateIds[] = $ob->id;
               }
            }
            $feestatus .=" Bank Payments added total: " . $bank;
        }

        foreach($updateIds as $id){
            $updateinfo = array('checked'=>1,'checked_by'=>$initiator,'student_id'=>$data['registration_no']);
            $bankimport->where('id',$id)->update($updateinfo);
        }


        $otherSupport->where(array('student_id'=>$data['registration_no'],'checked'=>0))->get();
        $updateIds = array();
        if($otherSupport->result_count()){
            $othep = 0;
            foreach($otherSupport->all as $ob){
                 $comments = "Fee from Sponsor/Support/Beneficiary. Received on " . date("d-M-Y",strtotime($ob->date_added)). " Deposited on " . date("d-M-Y",strtotime($ob->date_paid));
                $valid = $this->insert_transaction($data,$curryear->id,$ob->paid_amount,1,$ob->cheque_id,$ob->date_paid,$comments,$ob->file_id,'other_pay',$ob->id);
                if($valid['insert'] && $valid['valid']){
                    $updateIds[] = $ob->id;
                }
                $othep += $ob->paid_amount;
            }

            $feestatus .= " Fee from Sponsors : " . $othep;
        }

        foreach($updateIds as $id){
            $updateinfo = array('checked'=>1,'checked_by'=>$initiator);
            $otherSupport->where('id',$id)->update($updateinfo);
        }


        return $feestatus;
    }

    /**
     * @param array $studentid  student details link information
     * @param int $acyer  academic year
     * @param double $amount
     * @param int $type  payment type . 1= credit , 2 = debit
     * @param string $reference   referecnce number
     * @param bool $transdate transaction date
     * @param string $description      type of payment made
     * @param $file file id of this transaction
     * @param bool $item Item being transacted
     */
    function insert_transaction(array $studentid,$acyear,$amount,$type,$reference,$transdate=false,$description,$file,$item=false,$source,$service_id = null){

        $this->where(array('source_type_id'=>$source,'reference_id'=>$reference))->or_where('transaction_number',$reference)->get();
        if($this->result_count() == 0){
        $date = $transdate?date('Y-m-d H:i:s',strtotime($transdate)):date("Y-m-d H:i:s",time());
        $this->student_id = $studentid['student_id'];
        $this->registration_id = $studentid['registration_no'];
        $this->student_details_id = $studentid['details'];
        $this->academic_years_id = $acyear;
        $this->reference_id = $reference;
        $this->transaction_number = $reference;
        $this->source_type_id = $source;
        $this->amount = (double) $amount;
        $this->amount_type = $type;
        $this->item = $item;
        $this->file_id = $file;
        $this->comments =$description;
        $this->transaction_date = $date;
        $this->service_charge_id = $service_id;
        $status['insert'] = $this->save_as_new();
        $status['valid'] = $this->valid;
        }else{
            $status['insert'] = true;
            $status['valid'] = true;
            $status['message'] = 'Reference Number  Exists';
        }
        return $status;
    }

    function get_student_fee_crdb($reg_id,$fiv_index=false){
        $cQ = new CustomQuery();
        $otherfiled = $fiv_index?" or pay.student_id = '{$fiv_index}' ":"";
         $sql = "SELECT * FROM cis_students_fee_imports_crdb as pay WHERE (pay.student_id = '{$reg_id}' $otherfiled ) AND checked = 1";
        $result = $cQ->execute_query($sql);
        $trans = array('list'=>false,'count'=>$result->num_rows());
        if($result->num_rows() > 0){
           $trans['list'] = $result->result_object();
        }
        return $trans;
    }

    function get_student_fee_loan($reg_id,$acyear,$fiv_index = false) {
          $loan = new CustomQuery();

        $sql = "SELECT * FROM cis_students_fee_imports_loans as loan WHERE () AND checked = 2";
    }
} 
