<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 12/28/14
 * Time: 1:45 PM
 */

class acadgradeschemeitem extends DataMapper{
    public $table = 'cis_acad_grading_scheme_item';
    function __construct($id=null){
        parent::__construct($id);
    }
    function add_new($_data){
        if(is_array($_data)){
            $this->where(array(
                'grade_id'=>$_data['grade_id'],
                'scheme_id'=>$_data['scheme_id'],
            ))->get();
            if(!($this->result_count())){
                $this->grade_id = $_data['grade_id'];
                $this->scheme_id = $_data['scheme_id'];
            }
            $this->min_v = $_data['min_v'];
            $this->msx_v = $_data['max_v'];
            $this->save();
        }
    }
    function getList(){
        $result = $this->db->query('SELECT * FROM cis_acad_grading_scheme_item');
        $result_array = $result->result_array();
        return$result_array;
    }
} 