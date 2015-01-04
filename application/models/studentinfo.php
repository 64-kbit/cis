<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/1/14
 * Time: 4:09 AM
 */

class StudentInfo extends DataMapper{
    public  $table = 'cis_student_registration_id';
    public $has_many = array(
        'studentcategory'=>array(
            'class'=>'StudentCategory',
            'other_field'=>'studentinfo',
            'join_self_as'=>'student',
            'join_other_as'=>'category',
            'join_table'=>'cis_student_category'
        )
    );

    function __construct($id = null){
        parent::__construct($id);
    }

    function get_student_academic_years($stid = false){
        $sql = "select class.id,class.academic_year_id,acy.start_date,acy.end_date,acy.notation from cis_student_class_enrollment as class join cis_college_academic_years as acy on class.academic_year_id = acy.id group by acy.id order by acy.notation asc";
        $result = $this->db->query($sql);
        $status['count'] = $result->num_rows();
        $data = $result->result_array();
        $status['list'] = $data;
        return $status;
    }


    function get_current_class($stid = false){

        if($stid){
            $this->where('registration_number',$stid)->get();
        }
        $todate = date("Y-m-d h:i:s",time());
        $regno = $this->registration_number;
        $sql = "SELECT  date_enrolled AS curr_date, class.*,detail.first_name,detail.last_name,detail.middle_name,detail.gender,sponsor.name as sponsor_name,sponsor.code_name as sponsor_code,detail.nationality,detail.mobile_number,detail.email_address,stid.remarks,stream.class_name,stream.code_name,pg.nta_level,pg.level_year,stream.class_year,sem.display_name as sem_name,sem.numeric_value as sem_number,class.paid_fee,class.status,class.fee_amount_paid,class.fee_required_amount,class.reg_confirm_status,class.reg_confirm_date , ucc.profile_photo ,detail.mobile_number,ucc.email_address
 from cis_student_class_enrollment  as class
join cis_student_registration_id as stid on stid.id = class.student_id
join cis_student_class_stream as stream on class.stream_id = stream.id
join cis_semester as sem on sem.id = class.semester_id
JOIN cis_college_callender_semester as csem on csem.semester_id = sem.id
join cis_college_callender_event as event on event.id = csem.event_id
join cis_students_details as detail on detail.id = stid.details_id
join cis_department_programs as pg on pg.id = class.programs_id
join cis_student_sponsor_type as sponsor on sponsor.id = stid.fee_sponsor_id
left join cis_sys_user as ucc on ucc.registration_number_id = stid.registration_number
where  class.registration_id = '$regno'  and  event.start_date <= '$todate' and event.end_date >= '$todate' ";
        $result = $this->db->query($sql);

        return $result->row_array();
    }

    function get_student_reg_status($regid,$accyear=false){
        if($accyear){
            $ac = ' and class.academic_year_id = ' . $accyear;
        }else{
            $ac = " ";
        }

        $sql = "select class.*,detail.first_name,detail.last_name,detail.middle_name,detail.gender,sponsor.name as sponsor_name,sponsor.code_name as sponsor_code,detail.nationality,detail.mobile_number,detail.email_address,stid.remarks,stream.class_name,stream.code_name,pg.nta_level,pg.level_year,stream.class_year,sem.display_name as sem_name,sem.numeric_value as sem_number,class.paid_fee,class.status,class.fee_amount_paid,class.fee_required_amount,class.reg_confirm_status,class.reg_confirm_date , ucc.profile_photo from cis_student_class_enrollment  as class
join cis_student_registration_id as stid on stid.id = class.student_id
join cis_student_class_stream as stream on class.stream_id = stream.id
join cis_semester as sem on sem.id = class.semester_id
join cis_students_details as detail on detail.id = stid.details_id
join cis_department_programs as pg on pg.id = class.programs_id
join cis_student_sponsor_type as sponsor on sponsor.id = stid.fee_sponsor_id
left join cis_sys_user as ucc on ucc.registration_number_id = stid.registration_number
where  class.registration_id = '$regid' $ac  order by class.date_enrolled,class.academic_year_id, class.registration_id,sem_number ,class.date_registered,class.reg_confirm_date,status  desc;
;
          ";

        $result = $this->db->query($sql);
        $status['count'] = $result->num_rows();
        $data = $result->result_array();
        //$status['list'] = $data;
        return $data;
    }

    function get_registration_status($acyear = false,$dpid = false,$stid = false){
        if($dpid){
            $dpinfo =  " and class.department_id = $dpid ";
        }else{
            $dpinfo = "";
        }

        if($acyear){

            $ac = ' class.academic_year_id = ' . $acyear;
        }else{

            $ac = " class.academic_year_id != " . $acyear;
        }


          $sql = "
                select class.trace_key,class.date_enrolled,class.date_registered,class.registration_id,stid.cis_reg_id,detail.first_name,detail.last_name,detail.middle_name,detail.gender,sponsor.name as sponsor_name,sponsor.code_name as sponsor_code,detail.nationality,detail.mobile_number,detail.email_address,stid.remarks,stream.class_name,stream.code_name,pg.nta_level,pg.level_year,stream.class_year,sem.display_name as sem_name,sem.numeric_value as sem_number,class.paid_fee,class.status,class.fee_amount_paid,class.fee_required_amount,class.reg_confirm_status,class.reg_confirm_date , ucc.profile_photo from cis_student_class_enrollment  as class
join cis_student_registration_id as stid on stid.id = class.student_id
join cis_student_class_stream as stream on class.stream_id = stream.id
join cis_semester as sem on sem.id = class.semester_id
join cis_students_details as detail on detail.id = stid.details_id
join cis_department_programs as pg on pg.id = class.programs_id
join cis_student_sponsor_type as sponsor on sponsor.id = stid.fee_sponsor_id
left join cis_sys_user as ucc on ucc.registration_number_id = stid.registration_number
where  $ac $dpinfo  order by class.registration_id,sem_number ,class.date_registered,class.reg_confirm_date,status  asc;
;
          ";

        $result = $this->db->query($sql);
         $status['count'] = $result->num_rows();
        $data = $result->result_array();
        $status['list'] = false;
        //var_dump($data);die();
        if($status['count']){
            $restatus =false;
            $stauscode = false;
           foreach($data as $id => $st){
               $feestatus = array();
               $next = false;
               if($id > 0 && $st['registration_id'] == $data[$id-1]['registration_id']){
                   continue;
               }

                $discode = 'text-normal';
               $next =  $data[$id+1] ;
               $restatus = "";
               $stauscode = 'badge badge-important';
               if($st['registration_id'] == $next['registration_id']){
               if($st['status'] == 1 && $next['status'] == 1 ){

                   if($st['reg_confirm_status'] == 1 && $next['reg_confirm_status'] == 1){
                       $restatus = "Fully Registered" .( $st['reg_confirm_status']==1?"&nbsp;&nbsp; <i  title='Student have seen this' class='fa fa-ok'></i> " : "&nbsp;&nbsp;<i title='Student have not seen this' class='fa fa-info-sign text-warning'></i>") ."";
                       $stauscode = "badge badge-success";
                       $discode = 'success'  ;

                   }else{
                       $restatus = $st['sem_name'] . " Accepted " . ($st['reg_confirm_status']==1?"&nbsp;&nbsp; <i title='Student have seen this' class='fa fa-ok'></i> " : " &nbsp;&nbsp;<i class='fa fa-info-sign text-warning'  title='Student have not seen this'></i>");
                       $restatus .= "<br><span class='text-info'>". $next['sem_name']  . " Accepted ". ($next['reg_confirm_status']==1?"&nbsp;&nbsp; <i class='fa fa-ok' title='Student have  seen this'></i> " : " &nbsp;&nbsp;<i title='Student have not seen this' class='fa fa-info-sign text-warning'></i>")."</span>";
                       $stauscode = "text-success";
                       $discode = 'success'  ;
                   }

               }elseif($st['status'] == 1 && $next['status'] != 1){
                   $restatus = $st['sem_name'] . " Accepted " . ($st['reg_confirm_status']==1?"&nbsp;&nbsp; <i title='Student Have Seen this' class='fa fa-ok' ></i> " : " &nbsp;&nbsp;<i title='Student have not seen this' class='fa fa-info-sign text-warning'></i>");
                   $restatus .= "<br><span class='text-warning'>". $next['sem_name']  . " Not-Registered</span>";
                   $stauscode = "text-info";
                   $discode = 'info';
                       }else{
                           if($st['fee_amount_paid'] > 0){
                               $restatus = "Insufficient Fee , Not-Registered. ";
                               $stauscode = 'badge badge-warning';
                           }elseif($st['fee_amount_paid']  <= 0){
                               $restatus = "Fee not Paid, Not-Registered";
                           }


                       }
                   // fee calculations
                     $remain = ($st['fee_required_amount'] - $st['fee_amount_paid']) < 0?0:$st['fee_required_amount'] - $st['fee_amount_paid'];
                   $feestatus[$st['sem_name']] = array(
                         'required' => number_format($st['fee_required_amount'],1),
                         'remain' => number_format( $remain,1),
                          'paid'=> number_format($st['fee_amount_paid'],1)
                   );
                   $nextR =  ($next['fee_required_amount'] - $next['fee_amount_paid'])< 0?0:$next['fee_required_amount'] - $next['fee_amount_paid'];
                   $feestatus[$next['sem_name']] = array(
                       'required' => number_format($next['fee_required_amount'],1),
                       'remain' =>number_format( $nextR,1) ,
                       'paid'=> number_format($next['fee_amount_paid'],1)
                   );

                   $feestatus['Total'] = array(
                       'required' =>number_format( $next['fee_required_amount']  + $st['fee_required_amount'],1),
                           'remain' => number_format($remain + $nextR,1) ,
                    'paid'=> number_format($next['fee_amount_paid']+$st['fee_amount_paid'],1) ,
                   );

                   $traceKeys = array(
                     $st['sem_name'] => $st['trace_key']   ,
                       $next['sem_name'] => $next['trace_key']
                   );

               }else{  // case student does have only one semetster
                   if($st['status'] == 1 ){

                       if($st['reg_confirm_status'] == 1 ){
                           $restatus = "<br>Single semester Registered" .( $st['reg_confirm_status']==1?"&nbsp;&nbsp; <i title='Student have seen this' class='fa fa-ok'></i> " : "&nbsp;&nbsp;<i title='Student have not seen this' class='fa fa-info-sign text-warning'></i>") ."";
                           $stauscode = "badge badge-success";
                       }else{
                           $restatus = $st['sem_name'] . " Registered " . ($st['reg_confirm_status']==1?"&nbsp;&nbsp; <i title='Student have seen this' class='fa fa-ok'></i> " : " &nbsp;&nbsp;<i title='Student have not seen this' class='fa fa-info-sign text-warning'></i>");


                           $stauscode = "text-success";
                       }


                   }elseif($st['status'] == 1){
                       $restatus = $st['sem_name'] . " Registered " . ($st['reg_confirm_status']==1?"&nbsp;&nbsp; <i title='Student have seen this' class='fa fa-ok'></i> " : " &nbsp;&nbsp;<i title='Student have not seen this' class='fa fa-info-sign text-warning'></i>");

                       $stauscode = "text-info";
                   }else{
                       if($st['fee_amount_paid'] > 0){
                           $restatus = " Insufficient Fee ,Not-Registered.";
                           $stauscode = 'badge badge-warning';
                       }elseif($st['fee_amount_paid']  <= 0){
                           $restatus = "Fee not Paid";
                       }
                   }

                   // fee calcult
                   $remain = ($st['fee_required_amount'] - $st['fee_amount_paid']) < 0?0:$st['fee_required_amount'] - $st['fee_amount_paid'];
                   $feestatus[$st['sem_name']] = array(
                       'required' => number_format($st['fee_required_amount'],1),
                       'remain' => number_format( $remain,1),
                       'paid'=> number_format($st['fee_amount_paid'],1)
                   );

                   $traceKeys = array(
                       $st['sem_name'] => $st['trace_key']
                   );
               }



               $status['list'][] = $st + array('dis_code'=>$discode,'ree_status'=>$feestatus,'reg_status'=>$restatus,'status_code'=>$stauscode,'tracek'=>$traceKeys);
           }
        }
       return $status;

    }


    function get_dp_registration_status(&$dpid,&$acyear){

        return $this->get_registration_status($acyear,$dpid);
    }

    function get_basic_info($regid){
        $sql = "SELECT std.*,sdata.first_name,sdata.middle_name,sdata.last_name,sdata.gender,pg.code_name,pg.display_name,acy.start_year FROM cis_student_registration_id as std LEFT JOIN cis_students_details as sdata on sdata.id = std.details_id LEFT JOIN cis_department_program_course as pg on pg.course_id = std.course_id and pg.programs_id = std.programme_id LEFT JOIN cis_college_academic_years as acy on acy.id = std.academic_year_id  where std.registration_number='$regid' and std.is_active = 1  ";
        $qr = new CustomQuery();

        $result = $qr->execute_query($sql);
       $data =  $result->result_object();

       return array('count'=>$result->num_rows,'data' => isset($data[0])?$data[0]:$data);
    }

    function count_list($parameters,$single = true){
        if($single){
            $result =  $this->where($parameters['column'],$parameters['value'])->count_distinct();
        }else{
            $result =  $this->where($parameters)->count_distinct();
        }
        return $result;
    }

    function get_list_department($programme = false,$department = false){
        $sql = "SELECT reg.*,sda.first_name,sda.middle_name,sda.last_name,sda.gender,course.name as course_name,course.name,
course.code_name as course_code,programme.name as program_name,
programme.code as program_code,acy.notation as academic_year,
acy.start_year as year_registered,sponsor.name as sponsor_name,sponsor.code_name as sponsor_code
FROM cis_student_registration_id as reg
join cis_students_details as sda on sda.id = reg.details_id
left join cis_department_course as course on course.id = reg.course_id
left join cis_department_programs as programme on programme.id = reg.programme_id
left join cis_college_academic_years as acy on acy.id = reg.academic_year_id
left join cis_student_sponsor_type as sponsor on sponsor.id = reg.fee_sponsor_id
where course.department_id = $department
;
";
        $qr = new CustomQuery();

        $result = $qr->execute_query($sql);
        $status['count']  = $result->num_rows();
        $status['list'] = false;
        if($status['count'] == 0){
            return $status;
        } else{
            foreach($result->result_array() as $id => $ob){

                $status['list'][] = $ob;
            }
            return $status;  }

    }

    function get_student_list($options = false){
       if($options){
           $part = " WHERE reg.tmp_reg_id = $options";
       }else{
           $part = "";
       }
        $sql = "SELECT reg.*,sda.first_name,sda.middle_name,sda.last_name,sda.gender,course.name as course_name,course.name,
course.code_name as course_code,department.name as department_name,programme.name as program_name,
programme.code as program_code,acy.notation as academic_year,
acy.start_year as year_registered,sponsor.name as sponsor_name,sponsor.code_name as sponsor_code
FROM cis_student_registration_id as reg
join cis_students_details as sda on sda.id = reg.details_id
left join cis_department_course as course on course.id = reg.course_id
left join cis_department_programs as programme on programme.id = reg.programme_id
left join cis_college_academic_years as acy on acy.id = reg.academic_year_id
left join cis_student_sponsor_type as sponsor on sponsor.id = reg.fee_sponsor_id
left join cis_department_list as department on department.id = course.department_id

$part
";
        $qr = new CustomQuery();

        $result = $qr->execute_query($sql);
        $status['count']  = $result->num_rows();

        $status['list'] = false;
        if($status['count'] == 0){
            return $status;
        } else{
            foreach($result->result_array() as $id => $ob){

                $status['list'][] = $ob;
            }
            return $status;
        }
    }

    function department(){
        $status = false;

        return $status;
    }


    function programme(){
        $pg = new ProgrammeCourse();
        $pg->where(array('programs_id'=>$this->programme_id,'course_id'=>$this->course_id))->get();

        $status = array(
          'name'=>$pg->display_name,
            'code'=> $pg->code_name,
            'pg_id'=> $pg->id
        );
        return $status;
    }

    function academic_year(){
        $ac = new AcademicYear();
        $ac->where('id',$this->academic_year_id)->get();

        $status = array('notation'=>$ac->notation,'year'=>$ac->start_date);

        return $status;
    }

    function  current_class(){
        $status = false;

        return $status;
    }


    function create_registration_id(&$row,$acyear,$coursecat,&$cuurclass,&$curacyear,ProgrammeCourseStat &$pgstat){
        $pgstat->where(array('course_id'=>$row['cz_id'],'programs_id'=>$row['pg_id'],'academic_years_id'=>$acyear))->get();
        if($pgstat->result_count() == 0){
            return false;
        }
        $this->where(array('academic_year_id'=>$acyear,'course_id'=>$row['cz_id'],'programme_id'=> $row['pg_id']))->get();
        $total = $pgstat->st_count;//$this->result_count();
       $cz = trim($row['course_code']);
       // $pg = $row['programme_code'];
        $pg = $coursecat;
        $cpg = $pg;
        $cyear = (int) substr($row['academic_year'],0,4);
        $year = (int) substr($row['academic_year'],0,4);
        $startclass = $cpg;
        switch(strtolower($row['programme_code'])){
            case 'od':
                $stp = preg_match('/pvt|private/',$row['sponsor'])?2:1 ;
                break;
            case 'gc':
                $cyear = (int) substr($row['current_class'],0,4);
                // If general course year is greater than one. that is the student is on the 3rd of 4rth year
                // The student class is the current class reduce by one year
                if(($cyear - $year) > 1){
                   $cyear = ($year + 1);
                }else{

                }
                $startclass = 'gc';
                $stp = 4;
                break;
            case 'bs':
            case 'btech':
            case 'beng':
            case 'ba':
            case 'degree':
                $stp = 3;
                break;
            case 'meng' :
            case 'ms':
            case 'ma':
            case 'masters':
                $stp = "1";
                break;
            default:
                $stp = "1";
                break;
        }

        $gender = strtolower($row['gender']) == 'f'?1:2;

        //$yd = $year - $cyear;;
        if(strtolower($pg) == 'od'){
            $stp = preg_match('/pvt|private/',$row['sponsor'])?2:1 ;
        }

        $acy =substr($year,-2);
         $class = substr($cyear,-2) ;
        $str2 = strtoupper($cpg . $class . "-".$cz);
        if(!$row['dit_code']){
            $str1 = strtoupper( $acy .two_digit_no(($row['dp_no']))  .trim($row['pg_no']).trim($row['cz_no']) . $gender . three_digit_no($total + 1));
        }
        else if(!$row['reg_code']){
            $str1 = strtoupper($pg . $stp.  $acy  . "-".$cz. "-" . $gender . four_digit_no($total + 1));
        }else{
            $str1 = strtoupper( $acy .two_digit_no(($row['dp_id']))  .trim($row['pg_id']).two_digit_no($row['cz_id']) .$stp  . $gender . three_digit_no($total + 1));
        }
        $startclass = strtoupper($startclass . $acy."-" . $cz);

        return array('rgid'=>luhn($str1),'classcode'=>$str2,'startclass'=>$startclass);
    }

    function update_registration_info($stid=false){
         if($stid){
            $this->where('registration_number',$stid)->get();
         }

        if(!$this->registration_id or !$this->id or !$this->details_id){
             //   return false;
        }

        $acyear = new AcademicYear();
       $curyear = $acyear->get_current_academic_year();
         $classenroll = new StudentClassEnrollment();
        $studnetCat = new StudentCategory();
        $cats = $studnetCat->get_student_category($this->id,2);
        $servicecharge = 'class-enroll';
        $class = new studentClassStream();
        $service = new FeeServiceCharge();
        $service->where('code_id',$servicecharge)->get();

        $feeAcc = new StudentFeeAccount();
        $feeStructure = new FeeStructureProgramme();
        $semester = new Semester();
        $tracekyeyear = substr($curyear->start_year,-2) ;
         $classenroll->where(array('student_id'=>$this->id,'academic_year_id'=>$curyear->id))->get();
       $sponsor = new StudentSponsor();

        $sponsor->where('id',$this->fee_sponsor_id)->get();
        if($classenroll->result_count() > 0){

            if($this->reg_category_id != 1){
                $programme = new Programme($classenroll->programs_id);
                $pgid = trim($programme->base_program_id)?$programme->base_program_id:$programme->id;
            }else{
                $pgid= $classenroll->programs_id;
            }

            // gEt the required fee for the program under give circumstances
            $required =  $feeStructure->get_programme_fee($sponsor->sponsor_category,$pgid,$this->course_id,$curyear->id,$service->id,$cats);
           // var_dump($required);//die();
           // get current student balance
            $balance = $feeAcc->student_balance($this->registration_number,$curyear->id);

            // Get main fee aka tuition fee for foreign or for local
            $mainfee = $this->is_foreign_student == 2?$required['fee']['major']['loc']:convertCurrency($required['fee']['major']['forg'],'USD','TZS',true);

           // Subtract loan from tuition fee
            $requiredmain =(double) ($mainfee - $balance['loan']); // Subtract loan if student have one

            // Compute the minimum required from the provided percentage
            $minimumMainFee =(double) (($requiredmain) * ($required['fee']['major']['percent']/100));

            //  GEt other fees which are required to be paid on the first term max - main fee
           $other =  $this->is_foreign_student == 2?$required['fee']['max'] - $mainfee: convertCurrency($required['fee']['maxf'],'USD','TZS',true) - $mainfee ;

            // New required amounts
            $newRequired[0] = $minimumMainFee + $other ; // Minimum required for semester one  is minimum main fee + other charges
            $newRequired[1] = $requiredmain - $minimumMainFee; // Minimum required for semester two    remaining main fee for term two

            // Student current balance
            $currentBalance =  $balance['balance']['status'];
            // Remaining amount to be paid
             $remaining = (($newRequired[0] + $newRequired[1]) - ($classenroll->all[0]->fee_required_amount + $classenroll->all[1]->fee_required_amount));
            // Take current balance top up with required for both terms
            $paid = $currentBalance + $newRequired[0] + $newRequired[1] - $remaining ;                  //  - $newRequired[0]
            $nebalance = $paid - $newRequired[0];
          // What amount is this student suppose to pay
            $feestatus[0] = array('required' => $newRequired[0],'paid'=>$paid > $newRequired[0]? $newRequired[0]:$paid,'status'=>$paid - $newRequired[0]);

            $feestatus[1] = array('required'=> $newRequired[1],'paid'=> $nebalance > 0?($nebalance >$newRequired[1]?$newRequired[1]:$nebalance) :0,'status'=>$nebalance - $newRequired[1]);

                foreach($classenroll->all as $id => $cl){
                    if($feestatus[$id]['status'] >= 0){
                        $fstate = 1;
                        $dtregistred =  date("Y-m-d H:i:s",time());
                    }else{
                        $fstate = 2;
                        $dtregistred = "0000-00-00 00:00:00";
                    }
                    $feeAcc->where(array('transaction_number'=>$cl->trace_key))->get() ;
                    if($feeAcc->result_count() > 0){
                        $feeAcc->amount = $feestatus[$id]['required'];
                        $feeAcc->save();
                    }else{
                        $tdy = date("Y-m-d H:i:s",time());
                        $comments ="Fee Charge for: " . $service->name . " Class: " . $cl->start_class_code_id . " Year :" . $acyear->notation;
                    $status[] =    $feeAcc->insert_transaction(array('student_id'=>$this->id,'registration_no'=>$this->registration_number,'details'=>$this->details_id),$acyear->id,$feestatus[$id]['paid'],2,$cl->trace_key,$tdy,$comments,"",$servicecharge,$cl->id,$service->id);
                    }

                    $cl->fee_required_amount = $feestatus[$id]['required'];
                    $cl->fee_amount_paid = $feestatus[$id]['paid'];
                    $cl->status = $fstate;
                    $cl->paid_fee = $fstate;
                      $cl->date_registered = $dtregistred;
                    $cl->save();
                }
           // }

        }

    }

    /**
     * @param array $data    the array of  data containing information to be saved
     * @param int $tmpreg  mark if student is having a temporary ID or not
     * @return array|bool
     */
    function add_new(&$data,$tmpreg = 1){
        // $status = false;
        if($tmpreg == 1){
            $this->where(array('is_active'=>1,'index_number'=>$data['form_iv_index']))->get();
        }else{
            $this->where('registration_number', $data['registration_no'])->get();
        }

        if($this->result_count() == 0){
            $this->registration_number = $data['registration_no'];
            $this->programme_id = $data['programme'];
            $this->course_id = $data['course'];
            $this->academic_year_id = $data['academic_year'];
            $this->admission_date = date("Y-m-d H:i:s",time());
            $this->admission_mode = $data['admission_mode'];
            $this->fee_sponsor_id = $data['fee_sponsor'];
            $this->details_id = $data['details'];
            $this->remarks = $data['remarks'];
            $this->has_nhif = $data['has_nhif'];
            $this->has_hostel = $data['has_hostel'];
            $this->cis_reg_id = $data['cis_id'];
            $this->tmp_reg_id = $tmpreg;
            $this->reg_category_id = $data['reg_category'];
            $this->admission_status = $tmpreg;
            $this->is_active = $data['is_active'];
            $this->index_number = $data['form_iv_index'];
            $this->class_code = $data['class_code'];
            $this->is_foreign_student = $data['is_foreign'];
            $this->has_nhif = $data['has_nhif'];
            $success =  $this->save_as_new();
            if(!$success){   // check if save new succeded
                if($this->valid){
                    // Failure reason is Insert or Update
                    $status = array('error'=>3,'msg'=>'Failed to save Student','errormsg'=>$this->error->string);
                }else{
                    $status = array('error'=>2,'msg'=>'Failed to save Student. Invalid Data','errormsg'=>$this->error->string);
                }
            }else{
                $status['student_id'] = $this->id?$this->id:$this->db->insert_id();
                $this->id = $this->id?$this->id:$this->db->insert_id();;
                // save success set return status as success
                $status = array('error'=>false,'msg'=>'Student Saved','errormsg'=>'good');
            }

            }else{
                 $this->save();
                $status = array('error'=>1,'msg'=>'Student Already Exists','errormsg'=>'Student Skipped!');
            $status['student_id'] = $this->id;
                 }
        return $status;
    }

    function add_to_category($name){
         $cat = new StudentCategory();
        $name = trim($name);
        $name = $name?$name:"zzzzz";
        $cat->where('name',$name)->get();
        if($cat->result_count() == 1){
            $cat->save($this);
            return array('id'=>$cat->id,'name'=>$cat->name);
        }else{
            return array('id'=>'none','name'=>'None');
        }
    }

    function import_student_excel_to_db($fname,&$config,$userid = ""){
        $this->load->library('PHPExcel');
        $acadY = new AcademicYear();
        $studentDetails = new StudentDetails();
        $feesponsor = new StudentSponsor();
        $programme = new Programme();
        $department = new DpDepartment();
        $course = new Course();
        $courseCat = new CourseCategory();
        $feeAcount = new StudentFeeAccount();
        $classEnroll = new StudentClassEnrollment();
        $classStr = new studentClassStream();
        $pgcodes = new ProgramBaseCode();
        $pgstat = new ProgrammeCourseStat();
        $data = array();
        $status = array();


        // $CI =& get_instance();
        if(is_file($fname)){  // Check if requested file exists
            $objPHPExcel = PHPExcel_IOFactory::load($fname);

            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
         //  var_dump($sheetData);//die();
            foreach($sheetData as $id => $row){
                if($id == 1){
                    continue;
                }
                if($row[$config['registration_no']]=='new'){
                    $fid = !empty($row[$config['form_iv_index']]);
                }else{
                    $fid = true;
                }

                if(
                    !empty($row[$config['registration_no']]) // not empty registration no
                    && !empty($row[$config['gender']]) // not empty gender
                    && !empty($row[$config['programme_code']]) // not empty programme code
                    && !empty($row[$config['course_code']])  // not empty course code
                    && !empty($row[$config['academic_year']])  // not empty academic year
                                                                // student class no empty
                    && !empty($row[$config['sponsor']])      // not empty fee sponsor
                    && $fid // for new students if form iv index is defined
                    && (!empty($row[$config['combined_name']]) || !empty($row[$config['first_name']]))) // not empty  names
                {
                    $row[$config['foreign_student']] = strtolower($row[$config['foreign_student']])=='yes'?1:2;
                    // Break the combined name when is not empty
                    if(empty($row[$config['combined_name']])){
                        $names = array(
                            'fname'=>trim($row[$config['first_name']]),
                            'mname'=>trim($row[$config['middle_name']]),
                            'lname'=>trim($row[$config['last_name']]),
                        );
                    }else{
                        $names = break_name_str(trim($row[$config['combined_name']])) ; // break combined name to components format lname,fname,lastname
                    }


                    // Check is student is having disconitinued status
                    if(preg_match('/disco|discontinued/',strtolower(trim($row[$config['remarks']])))){
                        $validstudent = false;
                    }else{
                       $validstudent = true;
                    }
                      //Chkeck is marked as having nhif status
                    if(strtolower($row[$config['has_nhif']]) == 'no' || strtolower($row[$config['has_nhif']]) == 'none' || trim(strtolower($row[$config['has_nhif']])) == false){
                        $nhif = false;
                    }else{
                       $nhif = $row[$config['has_nhif']];
                    }

                    $acadY->where('notation',$row[$config['academic_year']])->get() ;
                   // Check if the academic year entered is a valid one
                    if($acadY->result_count() == 0){
                        $status[$id]['error'] = 10;
                        // $message = empty(trim($row[])
                        $status[$id]['message'] = 'Error Row: ' . ($row[$config['academic_year']] ) . " as Academic Year Does  not exist in the system:" ;
                        continue;
                    }

                    // Get the programes, Courses, academic year and fee sponsor of the studnt

                    $current = $acadY->get_current_academic_year();   // Current academci year
                    $programme->where('code',trim($row[$config['programme_code']]))->get();   // Get programme having this code
                    $course->where('code_name',trim($row[$config['course_code']]))->get();   // Get course having the entered code
                    $feesponsor->where('code_name',trim($row[$config['sponsor']]))->get();   // Get the fee sponsor having the given code
                    $department->where('id',$course->department_id)->get();
                    $courseCat->where('id',$course->category_id)->get();    // Get the course category information

                     // Check if the user entered the academic year of the class
                    if(!trim($row[$config['current_class']])){
                        $row[$config['current_class']] = $current->notation;
                    }else{

                    }

                    // Get the programme base codes to be used
                    $pgcodes->where(array('program_id'=>$programme->base_program_id != false?$programme->base_program_id:$programme->id,'course_category_id'=>$course->category_id))->get();

                   // Create data for generating registration number and Class Code that the student is to be admitted in
                   // var_dump($programme);
                    $reginfo = array(
                        'course_code'=>trim($row[$config['course_code']]),    // course code
                         'programme_code'=>trim($row[$config['programme_code']]),    // programme code
                         'academic_year'=>trim($row[$config['academic_year']]),   // Academic year
                         'current_class'=>trim($row[$config['current_class']]),   // Current academic year class
                         'sponsor'=>trim($row[$config['sponsor']]),        // Fee Sponsor for the given student
                         'pg_id'=>$programme->id,          // Programme id             from the system
                        'dit_code'=>true,
                          'pg_no'=>$programme->code_no,
                         'dp_no'=>$department->code_no, // Department code no
                         'cz_id'=>$course->id,
                          'cz_no'=>$course->cz_no,// Course id from the system
                        'dp_id'=>$course->department_id,
                          'sponsor_id'=>$feesponsor->sp_id,
                        'reg_code'=>true,
                         'gender'=>trim($row[$config['gender']]),     // Student Gender
                    );

                    // Generate the Student Registration number from the above $reginfo
                    $tmpreg =  $this->create_registration_id($reginfo,$acadY->id,$pgcodes->code_name,$row[$config['current_class']],$current,$pgstat);

                    if(!$tmpreg){
                        $status[$id]['error'] = 10;
                        // $message = empty(trim($row[])
                        $status[$id]['message'] = 'Failed to compose registration Key/ID for the Student!! Academic Year Class Counts Not Added Yet' ;
                        continue;
                    }

                        // var_dump($tmpreg);continue;
                    // Get if the Class Stream for the student exists before we begin adding to the system
                    $classStr->where(array('code_name'=> $tmpreg['classcode'],'dp_course_id'=>$course->id,'academic_year_id'=>$current->id))->get();

                    if($classStr->result_count()== 0){
                        // if class stream does not exists break the code and exit the process. I mean continue to the next student in the row.
                        //and mark him with some random error(sorry not random error. tell the user thatn the programme u are trying to add the student to is not in the system
                        $status[$id]['error'] = 10;
                        $status[$id]['message'] = 'Error Row: ' . ($id ) . ": Programme Course({$row[$config['programme_code']]}-{$row[$config['course_code']]}) Combination Does not Exist.Use Valid Course Codes as Defined in list of Courses and Programmes" ;
                        continue;
                    }
                      // Check if the user doesnot have any registration number (That means he/she is a new student and must have a new one)
                    if($row[$config['registration_no']] == 'new' || empty($row[$config['registration_no']])){
                        $row[$config['registration_no']] = $tmpreg['rgid'];
                        $row[$config['has_tmp_reg']] = 1;   // User has a tmp registraiton number
                    }else{
                        $row[$config['has_tmp_reg']] = 2;   // User does not have a tmp registration number
                    }

                    // Check if this student has previous information in the Student details database
                      $dob = preg_replace("/-/","/",$row[$config['date_of_birth']]);

                    $sd = array(
                        'registration_no'=> trim($row[$config['registration_no']]) ,
                        'fname'=> $names['fname'] ,
                        'mname'=>$names['mname'],
                        'lname'=> $names['lname'],
                        'email'=>(empty($row[$config['email']])==false)?trim($row[$config['email']]):null,
                        'gender'=>trim($row[$config['gender']]),
                        'box'=>trim($row[$config['address']]),
                        'qualification'=>trim($row[$config['qualification']]),
                        'mobile'=>empty($row[$config['mobile']]) == false?$config['mobile']:null,
                        'dob'=> (trim($dob))?(date("Y-m-d H:i:s",strtotime($dob))):null
                    );


                    // The student registration data that we must are to be saved to database
                    $data = array(
                        'registration_no'=>trim($row[$config['registration_no']]),
                        'details'=>null, //$studentDetails->id ,
                        'programme'=>$programme->id ,
                        'course'=>$course->id ,
                        'academic_year'=>$acadY->id ,
                        'admission_mode'=>trim($row[$config['entry_mode']]) ,
                        'fee_sponsor'=>$feesponsor->id ,
                        'remarks' =>  trim($row[$config['remarks']]) ,
                        'entry_mode'=> trim($row[$config['entry_mode']]),
                        'cis_id'=>  $tmpreg['rgid'],
                        'has_hostel'=>0,
                        'form_iv_index'=>trim($row[$config['form_iv_index']]) ,
                        'has_loan' => 0,
                        'reg_category'=> $acadY->id == $current->id?1:2 ,
                        'is_active' => $validstudent,
                        'has_nhif' => $nhif?1:0,
                        'class_code'=> $tmpreg['startclass'],
                        'is_foreign'=>trim($row[$config['foreign_student']])
                    );

                    // check to see the academic year,programme and course exists

                    if($acadY->result_count() && $programme->result_count() && $course->result_count() && $feesponsor->result_count()){
                        $stInfo = $this->add_new($data, trim($row[$config['has_tmp_reg']]));  // Insert the student into the Registration DBASE
                        $pgstat->st_count = $pgstat->st_count + 1;
                        $pgstat->save();
                        $status[$id]['error'] = false;
                        $status[$id] = array('reg_id'=>$this->registration_number,'name'=> $names['fname']. " " . $names['mname'] . " " . $names['lname']) +  $stInfo;

                        // Check if the Student Programme is matching the specified programme/Class programme
                        // Verifies to see if the student is arleady enrolled to any programme yet. Prevents from forcing the user from being enrolled to a different class
                        if($this->programme_id == $programme->id){
                            $proenroll = true;
                        }else{
                            $proenroll = false;
                        }


                        if($proenroll){ // if allowed to continue enrolling the students (that means the student is valid)
                        $status[$id]['reg_id'] = $this->registration_number;
                        $data['student_id'] = $this->id;
                        $data['registration_no'] = $this->registration_number;
                        $sd['registration_no'] = $this->registration_number;
                        $category = $this->add_to_category($nhif);   // Add student to the category
                        $status[$id]['category'] = $category['name'] ;
                        $studentDetails->add_basic_student($sd); // Add basic details to the system (name,dob and other simple infor about the student)
                        $this->update_status('details_id',$studentDetails->id);  // Update a single  column(Student details information )
                        $data['details'] = $studentDetails->id;
                            // Check if is valid student then must be enrolled into the system classes
                        if($validstudent){
                        $status[$id]['fee_status'] = $feeAcount->open_account($data,1,$this,'Students Import By ' . $userid); // Open Student fee account first
                        $status[$id]['class_enroll'] =  $classEnroll->enroll_student(array('foreign'=>$this->is_foreign_student,'student_id'=>$this->id,'registration_no'=>$data['registration_no'],'details'=>$data['details'],'reg_category'=>$data['reg_category'],'fee_sponsor'=>$feesponsor->sponsor_category,'category'=>array($category['id'])),$programme->id,$course->id,$acadY->id,trim($row[$config['academic_year']]),trim($row[$config['current_class']]),$acadY->id == $current->id?$data['class_code']:$tmpreg['classcode'],$data['class_code']); // Enroll student to the class (lost of info are required but few are used . I dont remember some of them) but anyway go with it boy/girl!
                        }else{
                            // If not valid notifie the user and continue to the next user
                            $status[$id]['error'] = false;
                            $status[$id]['class_enroll']['enroll'] = "<span class='badge badge-important'>Student Not Enrolled has <strong>DISCO</strong> status. Only added to Database</span>";
                        }
                    }else{
                            /// If  not allowed to enroll (That is already enrolled to another class) Notifiy the user and continue tao the next student
                            $status[$id]['error'] = false;
                            $status[$id]['category'] = "" ;
                            $status[$id]['class_enroll']['enroll'] = "<span class='badge badge-warning'>Student Already Enrolled in another Class. Student can be enrolled only when marked as not active student</span>";
                        }

                    }else{
                        /**
                         * Case where student programme is not specified
                         */
                        // Notify the user that the student does not exists
                        $status[$id]['error'] = 10;
                        // $message = empty(trim($row[])
                        $status[$id]['message'] = 'Error Row: ' . ($id ) . ": Check Programme code,Course code,Academic Year, Admitted class or Fee Sponsor to contain Valid Data or valid code names" ;

                    }
                } // end of row checking  must no be empty
                else {
                    // This is the case where one or more required data for admitting the student is missing
                    // We enter the command mode for the user we are told to add into the system
                    if(trim($row[$config['registration_no']]) !='new' && !empty($row[$config['registration_no']])){
                          $stid = trim($row[$config['registration_no']]);
                           $command = trim($row[$config['combined_name']]);
                        // find this student
                        $this->where('registration_number',trim($stid))->get();
                        // if student is fouond start doing the needed to do
                        // Switch between available commands and find the aka execute their actions
                        if($this->result_count()){
                            switch(strtolower(trim($command))){
                                // case command is nhif
                                case 'nhif':
                                    $this->has_nhif = 1;
                                    $this->add_to_category('nhif');
                                    $msg['valid'] = $this->save();
                                    $msg['msg'] = "<span class='badge badge-info'> NHIF Status updated Updated</span>";
                                    $this->update_registration_info();
                                    break;
                                // is disco / Then get rid of this pupilc
                                case 'disco':
                                    $msg = $this->unsubscribe_student();
                                    break;
                                // Retake (*this is where things are complex*) anway move the student current version of the previous class
                                case 'retake':
                                    $msg = $this->retake_programme(trim($row[$config['first_name']]));
                                    break;
                                // Pause means postpond studies
                                case 'postpond':
                                case 'pause':
                                    $msg = $this->postpone_class();
                                    break;
                                // Case Graduate gET RID OF STUDENT INFOS(ACCOUNT INFORMATION)
                                case 'graduate':
                                    $msg = $this->update_ac_status('graduate');
                                    break;
                                // cASE DELETE  GET RID OF STUDENT FROM THE SYSTEM(TRASH THE PUPIL FIRST)
                                case 'delete':
                                    $msg = $this->unsubscribe_student();
                                    break;
                                // CASE NONE MATCHED ABOVE COMMANDS THAT MEANS WE HAVE NO IDEA OF WHAT TO DO. NOTIFY THE USER THTA WAE DONT KKNOW WHAT HE/SEH WANT
                                default:
                                    $msg['valid'] = false;
                                    $msg['msg'] = "Failed to Update Information on Student or Specified Command is not available";
                                    break;
                            }

                        if($msg['valid']){
                                $status[$id]['error'] = 10;
                                $status[$id]['message'] = 'Row: ' .( $id ) . ":" .$msg['msg'] ;
                            }else{
                                $status[$id]['error'] = 10;
                                $status[$id]['message'] = 'Row: ' .( $id ) . ": <span class='badge badge-warning'>{$msg['msg']}</span>" ;
                            }

                        }else{
                            $status[$id]['error'] = 10;
                            $status[$id]['message'] = 'Row: ' .( $id ) . ": This Student Does not Exist" ;
                        }

                    }else{
                        $status[$id]['error'] = 10;
                        // $message = empty(trim($row[])
                        $status[$id]['message'] = 'Row: ' .( $id ) . ": Make Sure the required columns are not empty" ;
                    }
                }
            }
        }else{
            $status['error'] = 11;
            $status['message'] = 'File to be  Imported not Specified';
        }

        return $status;
    }

    function postpone_class(){
       $class = new StudentClassEnrollment();
        $currentClass = $this->current_class();
       $class->pause_class($this->id,$currentClass->id);
       $status['valid'] = true;
        $status['msg'] = 'Student Class Postponed!!';
        return $status;
    }

    function unsubscribe_student($classonly = false,$pause = false){
        $acyear = new AcademicYear();
        $current = $acyear->get_current_academic_year();

        $class = new StudentClassEnrollment();
        $class->where(array('registration_id'=>$this->registration_number,'academic_year_id'=>$current->id))->get();

        $accBook = new StudentFeeAccount();
        $accBook->where(array('transaction_number'=>$class->trace_kery,'registration_id'=>$this->registration_number))->get();

        $class->delete();
        $accBook->delete();
            $user = new User();
            $user->where('login_id',$this->registration_number)->get();
            $user->delete();
            $this->is_active = 0;
            $this->remarks = "Student is Dropped from System!! (Disco/Deleted)";
            $this->has_cis_account = 0;
            $this->has_hostel = 0;
            $this->save();

       // $this->update_registration_info();

        $status = array('valid'=>true,'msg'=>'Student Removed from Classes!, Student Charges Dropped!, Student Account Removed from System');
        return $status;
    }

    /**
     * @param $semid  semester id /ids that are to be retaken
     * @return mixed status messages about the caried action(the retake class actions sequesnces)
     */
    function retake_programme($semid){
          $class = new StudentClassEnrollment();
       // Find how many semesters are there to be retaken
        if(substr_count($semid,',')){
            $semesters = explode(',',$semid);
        }else{
            $semesters[] = trim($semid);
        }
        $mesg = $class->retake_class($this,$semesters);
        if(is_array($mesg['enroll'])){
            if(isset($mesg['enroll']['error'])){
                $status['valid'] = false;
                $status['msg'] = $mesg['enroll']['msg'];
            }else{
                if(isset($mesg['enroll'][0])){
                    $in = $mesg['enroll'][0];
                }else{
                    $in = $mesg['enroll'][1];
                }
                $status['valid'] = true;
                $status['msg'] = isset($in['class'])?$in['class']:"Class Association not Found!!";
            }
        }else{
            $status['valid'] = false;
            $status['msg'] = $mesg['enroll'];
        }

        return $status;
    }

    function update_ac_status($status){

    }

    function registration_status(){

        $status = false;

        return $status;
    }

    /**  Create an array of json formatted html data for display on table
     * @param $type integer specify what content is to be drawn as html array
     */

    function draw_html_json($type){
        switch($type){
            case 1:
                $data =   $this->draw_unadmitted();
                break;
            default:
                $data = $this->draw_current();
                break;
        }

        return $data;
    }


    function update_status($col,$val){
       $this->$col = $val;
        $this->save();
    }

    private function draw_unadmitted(){
        $CI = &get_instance();
        $currenttoken = $CI->session->userdata('formtoken');
        $parameters = $CI->input->post();
        $apps = $this->get_student_list(1);
        // var_dump($apps);
        $output = array('data'=>false);
        if(!isset($parameters['start'])){
            $parameters['start'] = 0;
        }

        if(!isset($parameters['length'])){
            $parameters['length'] = ($apps['count']);
            $parameters['draw'] = 0;
        }

        //var_dump($this->count_list(array('column'=>'tmp_reg_id','value'=>1)));
       // die();

        $output = array(
            'draw'=> (int) $parameters['draw'],
            'recordsTotal' => (int) ($this->count_list(array('column'=>'tmp_reg_id','value'=>1))),
            'recordsFiltered' => (int)  ($apps['count']),
            'data'=> false
        );



        $length = $parameters['length'] + $parameters['start'];
        if($apps['count']){

         $list = $apps['list'] ;
            unset($apps);
        for($x = $parameters['start']; $x < $length ; $x++){
            $dto = new stdClass();
            $actionurl = base_url() . "admin/admit_student?tmp_id={$list[$x]['registration_number']}&sid={$list[$x]['id']}";
            $admiturl = base_url() . "ajax_load/form?nextitem=%23rowid-{$x}&tmp_id={$list[$x]['registration_number']}&sid={$list[$x]['id']}&name=admit_student&token={$currenttoken} ";

            $btn = "<button class='btn btn-primary' target-url='{$actionurl}' data-toggle='modal' data-target='#add-item-data' href='{$admiturl}'><i class='glyphicon glyphicon-plus-sign'></i>&nbsp;&nbsp;Admit</button>";

            $entrymode = "<span class='badge badge-success'>".$list[$x]['admission_mode']." </span>";

           // $dto->chk_box =  "<input type='checkbox' class='applicants' name='new_student_list[]' value='{$list[$x]['id']}' >";
            $dto->cis_li_id = $x + 1;
            $dto->cis_student_id = "<span style=\"color: #555\" >{$list[$x]['registration_number']} <br>(<small class=\"text-info\" >{$list[$x]['index_number']}</small>)</span> ";
            $dto->cis_admission_id = $btn;
            $dto->cis_name = name_format($list[$x]['first_name'],$list[$x]['middle_name'],strtoupper($list[$x]['last_name']),0) ;
            $dto->cis_gender = $list[$x]['gender'];
            $dto->cis_academic_year = $list[$x]['academic_year'];
            $dto->cis_programme = $list[$x]['program_name'] . "({$list[$x]['program_code']})";
            $dto->cis_course  = "<span  title=\"Department: {$list[$x]['department_name']}\" class='text-info'> {$list[$x]['course_name']} ({$list[$x]['course_code']}) </span>";

            $dto->cis_sponsor  = "<span  title=\"{$list[$x]['sponsor_name']}\" class='text-success'> {$list[$x]['sponsor_code']} </span>";

            $dto->DT_RowId = "rowid-". $x ." data='{$list[$x]['registration_number']}'";
            $dto->cis_entry_mode = $entrymode;
            $output['data'][] = $dto;

            if($output['recordsFiltered'] == $x + 1 ){
                break;
            }
        }
        }
       // var_dump($output);
        return $output;
        //return "empty";
    }

    private function draw_admitted(){

    }

    private function draw_current(){
      return "current";
    }



}
