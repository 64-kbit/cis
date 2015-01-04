<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 12/28/14
 * Time: 1:32 PM
 */

class acadlecturemoduleassign extends DataMapper{
    public $table ='cis_lecture_module_assignment';
    function __construct($id=null){
        parent::__contruct($id);
    }
    function add_new($_data){

        if(is_array($_data)){
            $this->where(array(
                'lecture_id'=>$_data['lecture_id'],
                'module_id'=>$_data['module_id'],
            ))->get();
            if(!($this->result_count())){
                $this->lecture_id = $_data['lecture_id'];
                $this->module_id = $_data['module_id'];
            }
            $this->department_id = $_data['departmment_id'];
            $this->campus_id = $_data['campus_id'];
            $this->facult_id = $_data['facult_id'];
            $this->date_added = $_data['date_added'];
            $this->status = $_data['status'];
            $this->save();
        }
    }
} 