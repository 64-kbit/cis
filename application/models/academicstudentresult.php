<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/9/14
 * Time: 1:13 AM
 */

class AcademicStudentResult extends DataMapper {
    public $table = 'cis_academic_student_result';



    var $validation=array(
        array(
            'field'=>'gpa_value',
            'label'=>'GPA Value',
            'rule'=>array('required','trim','is_numeric')
        ),
        array(
            'field'=>'status',
            'label'=>'Status',
            'rule'=>array('required'),
        ),
        array(
            'field'=>'remarks',
            'label'=>'Remarks',
            'rule'=>array('required','trim')
        ),
    );
    function __construct(){
        parent::__construct();
    }

    public function get_list($regid){
          $custom=new CustomQuery();
        $result="SELECT ac.*,pg.display_name as pg_dname,pg.code_name as pg_name,sem.display_name as sem_name,sem.name as sem_name,acyear.start_date,acyear.end_date,acyear.start_year,acyear.end_year,acyear.notation FROM cis_academic_student_result AS ac
        JOIN cis_department_program_course as pg on pg.id = ac.dp_course_id
        join cis_college_academic_years as acyear on acyear.id = ac.academic_year_id
        join cis_semester as sem on sem.id = ac.semester_id where ac.registration_id ='$regid'";
        $data=$custom->execute_query($result);

        return  array('count'=>$data->num_rows(),'list'=>$data->result_object());
    }

    public function get_by_studentid($regid){
        $this->where('registration_id',$regid)->get();
        $status['count'] = $this->result_count();
        $status['list'] = false;
        if($this->result_count() > 0){
            foreach($this->all as $id => $ob){
                $status['list'][] = $ob;
            }
        }
    }
} 

