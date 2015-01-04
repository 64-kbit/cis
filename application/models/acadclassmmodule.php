<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 1/2/15
 * Time: 4:37 PM
 */

class acadclassmmodule extends DataMapper{
      public $table = 'cis_acad_class_course_module';
    function __construct($id=null){
        parent::__construct($id);
    }

    function set_grading_scheme($_data){

    }

    function add_new($_data){
        //this is for updating or adding a class module with penalt and everything
        $this->where(array(
            'module_id'=>$_data['module_id'],
            'module_pg_course_id'=>$_data['module_pg_course_id'],
            'module_course_id'=>$_data['module_course_id'],
            'module_department_id'=>$_data['module_department_id'],
            'module_campus_id'=>$_data['module_campus_id'],
            'module_faculty_id'=>$_data['module_semester_structure_id'],
            'module_semester_structure_id'=>$_data['module_semester_structure_id'],
            'module_programs_id'=>$_data['module_programs_id'],
            'module_pg_sem_structure_id'=>$_data['module_pg_sem_structure_id'],
            'class_stream_id'=>$_data['class_stream_id'],
            'class_stream_semester_id'=>$_data['class_stream_semester_id'],
            'class_stream_stream_id'=>$_data['class_stream_stream_id'],
            'class_stream_academic_year_id'=>$_data['class_stream_academic_year_id'],
            'class_stream_ref_course_id'=>$_data['class_stream_ref_course_id'],
            'class_stream_dp_course_id'=>$_data['class_stream_dp_course_id'],
            'class_stream_department_id'=>$_data['class_stream_department_id'],
            'class_stream_campus_id'=>$_data['class_stream_campus_id'],
            'class_stream_faculty_id'=>$_data['class_stream_faculty_id'],
            'class_stream_semester_structure_id'=>$_data['class_stream_semester_structure_id'],
            'class_stream_programs_id'=>$_data['class_stream_programs_id'],
            'class_stream_ref_pg_sem_structure_id'=>$_data['class_stream_ref_pg_sem_structure_id'],
            'class_stream_penalty_id'=>$_data['class_stream_penalty_id'],
            'class_stream_grading_scheme_id'=>$_data['class_stream_grading_scheme_id']
        ))->get();
        if($this->result_count()>0){

        }
    }
} 