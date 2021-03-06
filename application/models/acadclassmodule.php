<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 12/28/14
 * Time: 1:28 PM
 */

class acadclassmodule extends DataMapper {
    public $table = 'cis_acad_class_course_module';
    function __contructor($id = null){
        parent::__constructor($id);
    }

    function add_new($_data){
        if(is_array($_data)){
            $this->where(array('module_id'=>$_data['module_id'],
                'module_course_id'=>$_data['module_course_id'],
                'module_program_id'=>$_data['module_program_id'],
                'class_stream_program_id'=>$_data['class_stream_program_id'],
                'class_stream_academic_year_id'=>$_data['class_stream_academic_id'],
                'class_stream_semester_id'=>$_data['class_stream_semester_id'],
                'class_stream_id'=>$_data['class_stream_id'],
                'class_stream_dp_id'=>$_data['class_stream_dp_id']
            ))->get();
            if($this->result_count()>0)return;
            $this->module_id = $_data['module_id'];
            $this->module_pg_course_id = $_data['module_pg_course_id'];
            $this->module_course_id = $_data['module_course_id'];
            $this->module_department_id = $_data['module_department_id'];
            $this->module_campus_id = $_data['module_campus_id'];
            $this->module_faculty_id = $_data['module_faculty_id'];
            $this->module_semester_structure_id = $_data['module_semester_structure_id'];
            $this->module_program_id = $_data['module_program_id'];
            $this->module_pg_sem_structure = $_data['module_pg_sem_structure'];
            $this->class_stream_id = $_data['class_stream_id'];
            $this->class_stream_semester_id = $_data['class_stream_semester_id'];
            $this->class_stream_stream_id = $_data['class_stream_stream_id'];
            $this->class_stream_academic_year_id = $_data['class_stream_academic_year_id'];
            $this->class_stream_ref_course_id = $_data['class_stream_ref_course_id'];
            $this->class_stream_dp_course_id = $_data['class_stream_dp_course_id'];
            $this->class_stream_department_id = $_data['class_stream_department_id'];
            $this->class_stream_campus_id = $_data['class_stream_campus_id'];
            $this->class_stream_faculty_id = $_data['class_stream_faculty_id'];
            $this->class_stream_semester_structure_id = $_data['class_stream_semester_structure_id'];
            $this->class_stream_programs_id = $_data['class_stream_programs_is'];
            $this->class_stream_ref_pg_sem_strusture = $_data['class_stream_ref_pg_sem_structure_id'];
            $this->credit_point = $_data['credit_point'];
            $this->penalty_id = $_data['penalty_id'];
            $this->cis_acad_class_course_modulecol = $_data['cis_acad_class_course_modulecol'];
            $this->grading_scheme_id = $_data['grading_scheme_id'];
            $this->date_added = $_data['date_added'];
            $this->added_by = $_data['added_by'];
            $this->save_as_new();
        }
    }
} 