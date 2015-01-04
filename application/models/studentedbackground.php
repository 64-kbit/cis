<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/17/14
 * Time: 9:27 AM
 */

class StudentEdBackground extends DataMapper {
    public $table =    "cis_student_edbackground";
    function __construct($id = null){
        parent::__construct($id);
    }

    public function get_background($stid,$catid = false){
       if($catid){
           $this->where(array("student_id"=>$stid,'category'=>$catid))->get();
       }else{
           $this->where("student_id",$stid)->get();
       }
        $dt['count'] = $this->result_count();
        $dt['list'] =false;
        foreach($this->all as $id => $ls){
            $dt['list'][trim($ls->category)] = (array) $ls->stored;
        }

        return $dt;
    }
} 
