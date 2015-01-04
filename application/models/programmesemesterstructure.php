<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/21/14
 * Time: 1:07 AM
 */

class ProgrammeSemesterStructure extends DataMapper {
    public $table = 'cis_program_semester_structure';

    function __construct($sem = NULL){
        parent::__construct($sem);
    }

    function activate($program,$semstr,$stid){
         $this->where(array('programs_id'=>$program))->update(array('status'=>0,'is_current_structure'=>0));;
        $this->where(array('programs_id'=>$program,'structure_id'=>$semstr,'id'=>$stid))->update(array('status'=>1,'is_current_structure'=>1)) ;
    }

    function add_new($pg,$str){
        $this->where(array('programs_id'=>$pg,'structure_id'=>$str))->get();
        if($this->result_count() == 0){
            $this->programs_id = $pg;
            $this->structure_id = $str;
            $this->status = 1;
            $this->date_added = date('Y-m-d H:i:s',time());
            $this->is_current_structure = 1;
            $this->save();
        }

        $id = $this->id;

        $this->activate($pg,$str,$id);
    }
} 
