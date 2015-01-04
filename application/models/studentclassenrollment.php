<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/25/14
 * Time: 1:44 AM
 */

class StudentClassEnrollment extends DataMapper {
    public $table = 'cis_student_class_enrollment';
    function __construct($id = null){
        parent::__construct($id);
    }

    function compose_class_code(){

    }


    function retake_class(StudentInfo &$student,$semlist){
        // Dont give me a student who is already retaking a Class
        // Give me the one not retaking any class
        if($student->academic_status == 2){
            return array('enroll'=>$student->registration_number . ' is Already Retaking A Class');
        }
        $acyear = new AcademicYear();
        // Get current academic year
        $current = $acyear->get_current_academic_year();
        // get Previous Academic Year!
        $acyear->where('start_year',$current->start_year - 1)->get();

        // Get Class Streams
        $stream = new studentClassStream();
        $category = new StudentCategory();

        // Get student Category Information
        $cats = $category->get_student_category($student->id);

        // Get Semester that is to be retaken
        $sem = new Semester();
        $feeacc = new StudentFeeAccount();
        $pg = new Programme();
         $student->remarks = "";

        $status = array();

        // GEt the current class that a student is enrolled

        $this->where(array('registration_id'=>$student->registration_number,'academic_year_id'=>$current->id))->get();

        // Save fe info regarding the current class (we will use this info to get rid off this class after retake
            $currentEnrolled = array(
               'registration_id' => $this->registration_id,
                'academic_year_id' => $this->academic_year_id,
                'programs_id' => $this->programs_id ,
                'dp_course_id'=>$this->dp_course_id
            );



        foreach($semlist as $semid){
            $sem->where('numeric_value',$semid)->or_where('display_value',$semid)->get();
            if($sem->result_count() == 0){
                $status['enroll'][$semid]['error'] = false;
                $status['enroll'][$semid]['msg'] = "Undefined Semester {$semid} , Student cannot Retake this undefined Semester";
                continue;
            }

            // $date = $tdy
        // Get the Program that uses Enrolled program as parent. That is the one to be retaken!
        $pg->where("parent_program_id",$currentEnrolled['programs_id'])->get();
            // If this the student programme is from the previous programme
           // $this->where(array('registration_id'=>$student->registration_number,'academic_year_id'=>$current->id))->get();
            if($pg->result_count()){
                // Get the class that is to be retaken by the student
            $stream->where(array('semester_id'=>$sem->id,'dp_course_id'=>$currentEnrolled['dp_course_id'],'programs_id'=>$pg->id,'academic_year_id'=>$current->id))->get();

            // if we have got the class that is to be retaken we do the retake  class action
            if($stream->result_count()){
                // Get the Current class that the student is enrrolleed ( The one we are going to replace with another one)
                $this->where(array('registration_id'=>$currentEnrolled['registration_id'],'academic_year_id'=>$currentEnrolled['academic_year_id'],'programs_id'=>$currentEnrolled['programs_id']))->get();
                // Start editing the class
                // First create a New Trace Key
                $tracekyeyear = substr($current->start_year,-2) ; // Trace key year
                $refkey = $tracekyeyear.'-'. two_digit_no($stream->programs_id).two_digit_no($stream->dp_course_id).two_digit_no($current->id).two_digit_no($stream->semester_id).'-'.four_digit_no($student->id);  //=  Trace subyear-class_programme kEY -class_course keY -academic_YEAR kEY-SEMESTER KEY - STUDENT KEY

                // GEt student fee Account information with this class
                $feeacc->where('transaction_number',$this->trace_key)->get();
                if($feeacc->result_count()){
                    $feeacc->transaction_number = $refkey;
                    $feeacc->comments = $feeacc->comments . ":: ".$current->notation . "-". $sem->name ." Retaking Programme : " . $stream->code_name;
                 $feestatus =  $feeacc->save();
                }else{
                    $feestatus = false;
                }

                // Provide new class details
                $this->trace_key = $refkey;
                $this->semester_id = $stream->semester_id;
                $this->academic_year_id = $stream->academic_year_id;
                $this->stream_id =  $stream->id;
                $this->class_stream_id = $stream->stream_id;
                $this->current_class_code = $stream->code_name;
                $this->ref_course_id = $stream->ref_course_id;
                $this->dp_course_id = $stream->dp_course_id;
                $this->department_id = $stream->department_id;
                $this->campus_id = $stream->campus_id;
                $this->faculty_id = $stream->faculty_id;
               // $this->date_enrolled = $tdy;
                $this->semester_structure_id = $stream->semester_structure_id;
                $this->programs_id = $stream->programs_id;
                $this->ref_pg_sem_structure_id = $stream->ref_pg_sem_structure_id;
               $va =  $this->save();
                $student->remarks =  $student->remarks.  "Retake Programme: " . $stream->code_name . "-" . $sem->name . "<br>";
                $student->academic_status = 2;
              $regin =  $student->save();
                if($feestatus && $va && $regin){
                    $status['enroll'][$semid]['error'] = false;
                    $status['enroll'][$semid]['save'] = false;
                    $status['enroll'][$semid]['class'] = "{$student->registration_number} successfully moved to new Class: " . $stream->code_name . " - " . $sem->name;
                }else{
                    $status['enroll'][$semid]['save'] = false;
                    $status['enroll'][$semid]['error'] = false;
                    $status['enroll'][$semid]['class'] = ($feestatus?"Fee Payments Updated":"Fee Payments not Updated, " )
                                                         .($va?"Student successfully moved to new Class":"Failed to Save to New Class!!.(Retake Failed)" )                                              .($regin?"Student Info Updated!":"New Status not Set!" )
                                                        ;
                }
             }else{
                // if we havent go the class that the pupil is to retake
                $status['enroll'][$semid]['error'] = true;
                $status['enroll'][$semid]['msg'] = "System Failed to find the Valid Class for the Student!!";
            }
        }else{
            // Case we didn't get the programme that is to be retaken by the student. that means this is a one year program/ or it is the last Class programme by the student. Find the previous year of the programme and get that as the one the student is going to retake

            $this->where(array('registration_id'=>$this->registration_number,'semester_id'=>$sem->id,'academic_year_id'=>$acyear->id))->get();
            if($this->result_count()){
                $status = $this->enroll_student(array('registration_no'=>$student->registration_number,'student_id'=>$student->id,'fee_sponsor'=>$student->fee_sponsor_id,'category'=>$cats,'foreign'=>$student->is_foreign_status),$this->programs_id,$this->dp_course_id,$student->academic_year_id,$current->notation,$current->notation,$this->start_class_code_id,$sem->id);
            }else{
                $status['enroll'][$semid]['error'] = false;
                $status['enroll'][$semid]['class'] = "Student Previous Class Enrollments Not Found!.";
            }
        }

        }

        // Remove from all current subscribed classes other than the retaking ones
        echo $this->programs_id;
        if($currentEnrolled){
            $this->where(array('registration_id'=>$currentEnrolled['registration_id'],'academic_year_id'=>$currentEnrolled['academic_year_id'],'programs_id'=>$currentEnrolled['programs_id']))->get();
            $feeacc->where('transaction_number',$this->trace_key)->get();
            $this->delete();
            $feeacc->delete();
        }
         var_dump($currentEnrolled);
        // $sem->where(array('id'=>$class->all[]))
    return $status;
    }

    function generate_semester_summary($data){
        $this->load->library('pdf');
        $current = new AcademicYear();
        $cur = $current->get_current_academic_year();
        // var_dump($data);die();
        $filename = $data['userdata']['registration_number_id']." Semester Summary.pdf";

        $html = $this->load->view("student/reg_summary_form",$data + array('class'=>$this),true);

        $this->reg_confirm_status = 1;
        $this->reg_confirm_date = date('Y-m-d h:i:s ',time());
        $this->save();
       // var_dump($html);die();
        ini_set('memory_limit','32M'); // boost the memory limit if it's low
        $this->load->library('pdf');
        $footer = 'online registration - ' .$cur->notation;
        $pdf = new mPDF('c','A4','','',15,15,40,10,10,10);
        //$pdf = $this->pdf->load('c','A4','','',32,25,47,47,10,10);
        $pdf->SetDisplayMode('fullpage');
        $pdf->SetWatermarkText($data['config']['org_name']);
        $pdf->watermark_font = 'DejaVuSansCondensed';
        $pdf->showWatermarkText = true;
        $pdf->SetWatermarkImage(FCPATH.'themes/img/logo.jpg',0.1,'F');
        $pdf->showWatermarkImage = true;
        $pdf->SetFooter($data['config']['org_abbr'] . "-". 'Ref: ' . $this->trace_key .'|'.$footer.'|'.date(DATE_RFC822)); // Add a footer for good measure
        $pdf->WriteHTML("<style>".file_get_contents(FCPATH.'themes/css/prnt_lay_01.css')."</style>");
        $pdf->WriteHTML($html); // write the HTML into the PDF

        // $pdf->Output($pdfFilePath, 'F'); // save to file because we can*/
        $pdf->Output($filename,'I');
        die();
    }

    /**
     * Enroll student to the class
     * @param array $student_id   {registration_no,student_id,fee_sponsor,category,foreign}
     * @param $programme        programme student is admitted to
     * @param $course  course he was admitted to
     * @param $admittedyear academic year of being admitted
     * @param $classyear his class year which he was enrolled
     * @param $currentclass    the current class academic year eg 2013/2014
     * @param $class_code   class code of the student to be enrolled to
     * @return mixed
     */
    function enroll_student(array $student_id,$programme,$course,$admittedyear,$classyear,$currentclass,$class_code,$startclass,$sem_id = false){
       $servicecharge = 'class-enroll';
        $class = new studentClassStream();
        $service = new FeeServiceCharge();
        $service->where('code_id',$servicecharge)->get();
        $feeAcc = new StudentFeeAccount();
        $feeStructure = new FeeStructureProgramme();
        $acyear = new AcademicYear();
        $semester = new Semester();
        $acyear->where('notation',trim($currentclass))->get();
        $tracekyeyear = substr($acyear->start_year,-2) ;

        //Get student class
        $class->where(array('code_name'=>$class_code,'dp_course_id'=>$course,'academic_year_id'=>$acyear->id))->get();

        // check if academic years exists and a class exists
        if($acyear->result_count() > 0 && $class->result_count() > 0) {
          // Get fee required to pay for enrollment to this class
            if($student_id['reg_category'] != 1){
                 $programme = new Programme($class->programs_id);

               // $programme->get_equivalent_next_class();
                $pgid = $programme->base_program_id?$programme->base_program_id:$programme->id;
            }else{
                $pgid= $class->programs_id;
            }

          $required =  $feeStructure->get_programme_fee($student_id['fee_sponsor'],$pgid,$course,$acyear->id,$service->id,$student_id['category'],$student_id['foreign'],$student_id['reg_category']);
            // Check if fee is zero or negative. then break the enrrollment if zero


            if($student_id['foreign'] == 1){
                if($required['fee']['major']['forg'] <= 0 || $required['fee']['maxf'] <= 0 ){
                    $status['enroll']= "No Fee Defined for Programme ";
                    return $status;
                }
            }else{
                if( $required['fee']['max'] <= 0 || $required['fee']['major']['loc'] <= 0){
                    $status['enroll']= "No Fee Defined for Programme ";
                    return $status;
                }
            }

            // if fee is non zero get student balance
            $balance = $feeAcc->student_balance($student_id['registration_no'],$acyear->id);
            // Prepare the Main fee to be paid
            $mainfee = (double) $student_id['foreign'] == 2?$required['fee']['major']['loc']:convertCurrency($required['fee']['major']['forg'],'USD','TZS',true);

            // Subtract loan if student have one
            $requiredmain =(double) ($mainfee - $balance['loan']);
            $minimumMainFee =(double) ($requiredmain * ($required['fee']['major']['percent']/100));

            // Other required charges separate from main fee
            $other =(double)  ($student_id['foreign'] == 2?$required['fee']['max'] - $mainfee: convertCurrency($required['fee']['maxf'],'USD','TZS',true) - $mainfee) ;

           // New required amounts
            $newRequired[0] = $minimumMainFee + $other ; // Minimum required for semester one
            $newRequired[1] = $mainfee - $minimumMainFee; // Minimum required for semester two
            $feestatus = array();

            // Amount paid by student to bank
             $paid = $balance['balance']['status'];

            // Subtact amount required to pay for enrollment
             $nebalance = $paid - $newRequired[0];

            $feestatus[0] = array('required' =>  $newRequired[0],'paid'=>$paid,'status'=>$nebalance);   // Term one analysis status
            $feestatus[1] = array('required'=> $newRequired[1],'paid'=> $nebalance > 0?$nebalance:0,'status'=> ($nebalance-$newRequired[1]));  // term 2 analyusis status


            foreach($class->all as $id => $csr){
                 $semester->where('id',$csr->semester_id)->get();
                if($sem_id){
                    if($semester->id != $sem_id){
                        continue;
                    }
                }
                // .two_digit_no($csr->campus_id).two_digit_no($csr->faculty_id).two_digit_no($csr->department_id).
                $refkey = $tracekyeyear.'-'. two_digit_no($csr->programs_id).two_digit_no($csr->dp_course_id).two_digit_no($class->academic_year_id).two_digit_no($csr->semester_id).'-'.four_digit_no($student_id['student_id']);
                 $cols = array('registration_id'=>$student_id['registration_no'],'academic_year_id'=>$csr->academic_year_id,'semester_id'=>$csr->semester_id);
                $this->where($cols)->get();
                if($this->result_count()==0){
                    if($feestatus[$id]['status'] >= 0){
                        $reg = 1;
                        $fee = 1;
                        $dtregistred =  date("Y-m-d h:i:s",time());
                    }else{
                        $reg = 2;
                        $fee = 2;
                        $dtregistred = "0000-00-00 00:00:00";
                    }

                    $tdy = date("Y-m-d H:i:s",time());
                    $comments ="Fee Charge for: " . $service->name . " Class: " . $class_code . " Year :" . $currentclass . " Semester : " . $semester->name;
                    $feeAcc->insert_transaction($student_id,$acyear->id,$feestatus[$id]['required'],2,$refkey,$tdy,$comments,"",$servicecharge,$csr->id,$service->id);

                    $this->trace_key = $refkey;
                    $this->student_id = $student_id['student_id'];

                    $this->registration_id = $student_id['registration_no'];
                    $this->semester_id = $csr->semester_id;
                    $this->academic_year_id = $csr->academic_year_id;

                    $this->stream_id =  $csr->id;
                    $this->class_stream_id = $csr->stream_id;
                    $this->start_class_code = $startclass;
                    $this->ref_course_id = $csr->ref_course_id;
                    $this->dp_course_id = $csr->dp_course_id;
                    $this->department_id = $csr->department_id;
                    $this->campus_id = $csr->campus_id;
                    $this->faculty_id = $csr->faculty_id;
                    $this->date_enrolled = $tdy;
                    $this->semester_structure_id = $csr->semester_structure_id;
                    $this->programs_id = $csr->programs_id;
                    $this->ref_pg_sem_structure_id = $csr->ref_pg_sem_structure_id;
                    $this->current_class_code = $class_code;
                    $this->fee_payment_status = $fee;
                    $this->fee_amount_paid = $feestatus[$id]['paid'];
                    $this->fee_required_amount = $feestatus[$id]['required'];
                    $this->status = $reg;
                    $this->date_registered = $dtregistred;
                    $this->paid_fee = $fee;
                    $err =  $this->save();
                    $status['enroll'][$id]['error'] = $err;
                    $status['enroll'][$id]['save'] = true;
                    $status['enroll'][$id]['feestatus'] = $feestatus[$id];
                    $status['enroll'][$id]['class'] = $student_id['registration_no'] . " on " . $csr->class_name."-" .$currentclass .  " Successfully Enrolled. Ref " . $refkey . " fee payment: " . (($fee == 1)?" Paid Fee ": "Fee not Paid");
                }else{
                    $status['enroll'][$id]['error'] = true;
                    $status['enroll'][$id]['save'] = false;
                    $status['enroll'][$id]['feestatus'] = false;
                    $status['enroll'][$id]['class'] = $student_id['registration_no'] . " on " . $csr->class_name."-" .$currentclass . " Already Enrolled . Ref " . $refkey;
                }
            }
        }else{
            $status['enroll']['error'] = true;
            $status['enroll']['msg'] = "Student Class not Found!!";
        }
        return $status;
    }

    function retake_programme($student_id,$programme,$course,$admitedyear,$classyear,$currentclass,$classcode,$sem_id=false){

        var_dump($student_id);die();
        $status = array();

        return $status;
    }

    function pause_class($stdid){
       $acyear = new AcademicYear();
        //$this->s
    }

    function change_student_class($student_id,$class_id,$enroll_id,$data){

    }

    function get_list(){

    }


    function import_list(){

    }


} 
