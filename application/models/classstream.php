<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/23/14
 * Time: 2:52 PM
 */

class ClassStream extends DataMapper {
    public $table = 'cis_department_program_class_stream';

    function __construct($id = null){
        parent::__construct($id);
    }

    function get_list($dp = false){
        if($dp){
            $this->where("department_id",$dp);
        }
        $this->get();
        $status['count'] = $this->result_count();
        $status['list'] = false ;
        foreach($this as $it){
            $status['list'][] = $it->stored;
        }

       return $status;
    }



    function add_new($data){

    }

    function update_stream($data){

    }

    function generate_class_streams($acYear){

    }

    function import_students(){

    }
} 
