<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 12/28/14
 * Time: 1:39 PM
 */

class lecturemodule extends DataMapper{
    public $table = 'cis_lecture_module_assignment';
    function __construct($id=null){
        parent::__construct($id);
    }
    function add_new($_data){
        if(is_array($_data)){
            $this->where(array(
                'lecture_id'=>$_data['lecture_id'],
                'department_id'=>$_data['department_id'],
                'campus_id'=>$_data['campus_id'],
                'facult_id'=>$_data['facult_id'],
                'module_id'=>$_data['module_id'],
            ))->get();
            if(!($this->result_count())){
                $this->lecture_id => $_data['lecture_id'];
                $this->department_id =>$_data['department_id'];
                $this->campus_id => $_data['campus_id'];
                $this->facult_id =>$_data['facult_id'];

            }
        }
    }
} 