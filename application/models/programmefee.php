<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/12/14
 * Time: 8:25 AM
 */

class ProgrammeFee extends DataMapper {
    public $table = 'cis_program_semester_fee_structure';
    function __construct($id = null){
        parent::__construct($id);
    }

    /**            Inserts individaul caours fee structure
     * @param $data
     * @return bool
     */
    function add_structure($data){
        $this->where(
            array(
            'program_id'=>$data->program,
            'course_id'=>$data->course,
            'academic_years_id'=>$data->ac_year,
            'fee_structure_id'=>$data->fee,
            'cis_cmanagerDboAdvancedVer_02.cis_program_semester_fee_structure.service_charge_id' =>$data->service_charge,
            'student_category_id' => $data->student_cat
            )
        )->get();
        if($this->result_count() == 0){
           $this->program_id = $data->program;
            $this->course_id = $data->course;
            $this->fee_structure_id = $data->fee;
            $this->department_id = $data->department;
            $this->academic_years_id = $data->ac_year;
            $this->is_current_structure = 1 ;
            $this->student_category_id = $data->student_cat;
            $this->service_charge_id =$data->service_charge;
            $this->date_added = date("Y-m-d h:i:s",time());
           // $this->date_update = date("Y-m-d h:i:s",time());
            $sc = $this->save_as_new();
            $status =array('status'=>$sc,'msg'=>$sc?"Item Created":"Item not Created");


        }else{
            $this->program_id = $data->program;
            $this->course_id = $data->course;
            $this->fee_structure_id = $data->fee;
            $this->department_id = $data->department;
            $this->academic_years_id = $data->ac_year;
            $this->is_current_structure = 1 ;
            $this->student_category_id = $data->student_cat;
            $this->service_charge_id =$data->service_charge;
           // $this->date_update = date("Y-m-d h:i:s",time());
            $sc = $this->save();
           $status =array('status'=>$sc,'msg'=> $sc?"Update Success":'Update Failed');
        }

        return $status;
    }


    function get_list(){

    }

    /**
     * Get fee structure applied programmes and courses in a semester summed
     * @param array $semst {fee_structure_id, academic_years_id}
     * @return array programme semester fee structure
     */
    function get_structure_programme($semst){
        $this->where($semst)->get();
        $ob = new stdClass();

        $ob->program_id = $this->program_id;
        $ob->course_id = $this->course_id;
        $ob->academic_years_id = $this->academic_years_id;
        $ob->fee_structure_id = $this->fee_structure_id;
        $ob->department_id = $this->department_id;
        $ob->minimum_percentage = $this->minimum_percentage;
        $ob->is_current_structure = $this->is_current_structure;

        return $ob;
    }

    function get_programmes($str){
        $sql = "SELECT distinct(fee.program_id),fee.* from cis_program_semester_fee_structure as fee where fee.fee_structure_id = $str   ";       $qr = new CustomQuery();
        $result = $qr->execute_query($sql);
        return  array('count'=>$result->num_rows(),'list'=>$result->result_object());
    }

    /**
     * This generates the list of courses and programes that link to student payments.
     * it is the source of how much a student must pay money. this creates a link that defines how much the student is required to pay for his/her course.
     * @param $data data input from the form
     * @return array
     */
    function add_structure_programme($data){
        $pgz = new ProgrammeCourse();
      //  $pgs = $pgz->get_programme_courses($programme,true);

       $qr = new CustomQuery();

        foreach($data['programme'] as $p){
            $courses = array();
            if($this->key_val_search($data['course'],'all')){
                $courses = $pgz->get_programme_courses($p,true);
            }else{
                $courses['type'] = 2;
                   $qrpart = $this->build_or_qr($data['course'],'course_id');
                $sql = "SELECT * FROM cis_department_program_course WHERE programs_id = $p and $qrpart";
               // var_dump($sql);
                $result = $qr->execute_query($sql);
                $courses['list']= $result->result_object();
            }

            if(is_array($courses['list'])){
                foreach($courses['list'] as $id=>$cz){
                    $ob = new stdClass();
                    $ob->program = $cz->programs_id;
                    $ob->course = $cz->course_id;
                    $ob->department = $cz->department_id;
                    $ob->ac_year = $data['academic_year'];
                    $ob->student_cat = $data['sponsor_category'];
                    $ob->service_charge = $data['service_charge'];
                    $ob->fee = $data['itemid'];
                    $rd = $this->add_structure($ob);
                  $status[] = array('error'=> !$rd['status'],'status' => $rd['msg'],'data'=>$cz->display_name . "(".$cz->code_name . ")");
                }
            }
           // var_dump($courses);
        }

        return $status;

    }

    private function  build_or_qr($arr,$type){
       $str = " ( ";
        foreach($arr as $it => $id ){
            if(!isset($arr[$it + 1])){
                $str .= " `$type` = $id ";
            }else{
               $str .= " `$type` = $id OR ";
            }
        }

        return $str." ) ";
    }

    private function key_val_search($arr,$k){
        foreach($arr as $id=>$d){
            if(strtolower($d) == strtolower($k)){
                return true;
            }
        }
        return   false;
    }
}
