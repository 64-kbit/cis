<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/20/14
 * Time: 11:47 PM
 */

class ProgrammeCourseStat extends DataMapper {
    public  $table = "cis_department_pg_course_count";
    function __construct(){
        parent::__construct();
    }

    function generate_counts($yearid){
        $pg = new ProgrammeCourse();
        $pg->get();

        foreach($pg->all as $p){
            $this->where(array('academic_years_id'=>$yearid,'course_id'=>$p->course_id,'programs_id'=>$p->programs_id,'campus_id'=>$p->campus_id))->get();
            if($this->result_count()){
                continue;
            }
            $this->academic_years_id = $yearid;
            $this->course_id = $p->course_id;
            $this->department_id = $p->department_id;
            $this->programs_id = $p->programs_id;
            $this->faculty_id = $p->faculty_id;
            $this->campus_id = $p->campus_id;
            $this->st_count = 0;
            $this->lect_count = 0;
            $this->save();

        }

    }
} 
