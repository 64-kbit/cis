<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/9/14
 * Time: 12:09 AM
 */

class CourseCategory extends DataMapper {
   public $table = 'cis_department_course_category';
    function __construct(){
        parent::__construct();
    }


    public function get_list(){
        $status['count'] = 0;
        $status['list'] = array();
        $this->get();
        if($this->result_count() > 0){
        foreach($this->all as $ob){
            $data = new stdClass();
            $data->id = $ob->id;
            $data->name = $ob->name;
            $data->join_name  = $ob->join_name;
            $data->comments = $ob->comments;
            $data->base_code_1 = $ob->base_code_1;
            $data->base_code_2 = $ob->base_code_2;
            $status['list'][$ob->id] = $data;
            $status['count'] += 1;
        } }
        return $status;
    }
} 
