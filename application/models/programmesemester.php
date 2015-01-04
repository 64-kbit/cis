<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: oau
 * Date: 9/12/14
 * Time: 10:57 AM
 */

class ProgrammeSemester extends DataMapper {
    var $table = 'cis_program_semester_list';
    var $has_many =array('semester' => array('join_self_as'=>'structure','join_table'=>'cis_program_semester_list'));
    var $validatiaon = array(
        'display_name' => array('label'=>"Semester Name ",'rules'=>array('trim','required')),
        'code_name' => array('label'=>'Code Name','rules'=>'trime'),
        'is_activated' => array('label'=>'Activation Status','rules'=>'trim','numeric')
    );
    function __construct($semId =false,$semStruct = false){
        parent::__construct($semId,$semStruct);
    }

    function get_structure_semesters($structureId){
        if($structureId && is_numeric($structureId)){

       $this->include_related('semester',array('name','display_value','year_count'),'sem');
            $this->get();
        $status['count'] = 0;
        $status['list'] = false;
        foreach($this as $id=>$obj){
            $status['count']  += 1;
            $status['list'][] = $obj;
        }
        }else{
            $status['count'] = 0;
            $status['list'] = false;
        }
        return $status;
    }


} 
