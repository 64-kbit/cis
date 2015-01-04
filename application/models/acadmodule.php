<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 12/28/14
 * Time: 1:13 PM
 */

class acadmodule extends DataMapper{
    public $table = 'cis_acad_course_module';
    function __construct($id = null){
       parent::__construct($id);
    }

    function get_list($dep_id){
       //$listarray = array();
       //foreach( $this->where('department_id',$dep_id)->get() as $coursemodule){
       //   array_push($listarray,$coursemodule);
       //}
       //$listarray = $this->where('department_id',$dep_id);
       $query_req = 'SELECT * FROM cis_acad_course_module WHERE department_id = $dep_id';
       $query_cmd = new CustomQuery();
       $listarray = $query_cmd->execute_query($query_req);
       return $listarray;
    }

    function setLecturer($lect_id){
       $lecture = new AcadLecture($lect_id);
       $data = array(
          'lecture_id'=>$lect_id,
          'department_id'=>$lecture->department_id,
          'campus_id'=>$lecture->campus_id,
          'facult_id'=>$lecture->facult_id,
          'module_id'=>$this->id,
          'date_added'=>date('Y-m-d H:i:s'),
          'status'=>1
       );
       $lecturemodule = new acadlecturemoduleassign();
       $lecturemodule->add_new($data);
    }
    function setClass($class_id){
        $studentclass = new classstudents($class_id);
        $classmodule = new acadclassmodule();
        $_data = array(
          'module_id'=>$this->id,
            'module_pg_course_id'=>$this->pg_course_id,
            'module_course_id'=>$this->course_id,
            'module_department_id'=>$this->department_id,
            'module_campus_id'=>$this->campus_id,
            'module_faculty_id'=>$this->faculty_id,
            'module_semester_structure_id'=>$this->semester_structure_id,
            'module_programs_id'=>$this->pg_sem_structure,
            'class_stream_id'=>$studentclass->stream_id,
            'class_stream_semester_id'=>$studentclass->semester_id,
            'class_stream_stream_id'=>$studentclass->stream_id,
            'class_stream_academic_year_id'=>$studentclass->academic_year_id,
            'class_stream_ref_course_id'=>$studentclass->ref_course_id,
            'class_stream_dp_course_id'=>$studentclass->dp_course_id,
            'class_stream_department_id'=>$studentclass->department_id,
            'class_stream_campus_id'=>$studentclass->campus_id,
            'class_stream_faculty_id'=>$studentclass->faculty_id,
            'class_stream_semester_structure_id'=>$studentclass->semester_structure_id,
            'class_stream_program_id'=>$studentclass->program_id,
            'class_stream_ref_pg_sem_structure_id'=>$studentclass->ref_pg_sem_structure_id
        );
        $classmodule->add_new($_data);
    }
    function setPenalty($pen_id){
       $status = false;
       $classmodule = new acadclassmmodule(null);
       return $status;
    }
    function setGradingScheme($scheme_id){
        //I require at least class_stream_id to be able to add the data
        //we may need extra info for us to clear assign a grading scheme so as not to modify same type of module for different classes
        $status = false;
        $grading_scheme = new acadgradescheme($scheme_id);
        $query_req = 'SELECT * FROM cis_acad_class_course_module
        WHERE module_id = $this->id
        AND module_pg_course_id = {$this->pg_course_id}
        AND module_department_id = {$this->department_id}
        AND module_campus_id = {$this->campus_id}
        AND module_faculty_id = {$this->faculty_id}
        AND module_semester_structure_id = {$this->semester_structure_id}
        AND module_programs_id = {$this->programs_id}
        AND module_pg_sem_structure_id = {$this->pg_sem_structure_id} ';
        $result = $this->db->query($query_req);



        return $status;
    }
    function clearGradingScheme($scheme_id){

    }
    function clearPenalty($pen_id){

    }
    function getGradingSchemeItems(){

    }
} 