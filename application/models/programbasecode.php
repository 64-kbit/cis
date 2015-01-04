<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/28/14
 * Time: 6:22 PM
 */

class ProgramBaseCode extends DataMapper {
    public $table = 'cis_department_program_base_code';
    function __construct($id=null){
        parent::__construct($id);
    }

    function get_list($id = false){
        if($id){
           $bcode = " WHERE bcode.code_name = '$id' ";
        }
        else{
            $bcode = " ";
        }
       $sql = "SELECT bcode.*,GROUP_CONCAT(czcat.name SEPARATOR ', ' )as categories,
                pg.name as pg_name,pg.code as pg_code,czcat.name as cat_name,czcat.join_name
                FROM cis_department_program_base_code as bcode
                JOIN cis_department_programs as pg on pg.id = bcode.program_id
                JOIN cis_department_course_category as czcat on czcat.id = bcode.course_category_id
			    $bcode group by code_name ORDER BY pg.level_year asc;";
        $result = $this->db->query($sql);
         if($id){
              return $result->row_array();
         }else{
             return array('count'=>$result->num_rows(),'list'=>$result->result_array()) ;
         }
    }

    /** Insert new base code name for the programes and course
     * @param $data
     * @param $mode
     * @return array
     */
    function add_new($data,$mode){
        $msg = "Empty Courses";
        foreach($data['course_cat'] as $id => $cz){
            $this->where(array('program_id'=>$data['base_programme'],'course_category_id'=>$cz))->get();
            $this->code_name = strtoupper(trim($data['base_code']));
            $this->display_name = $data['description'] ;
            $this->program_id = $data['base_programme'];
            $this->course_category_id = $cz;
            if($this->result_count()){
               $valid =  $this->save();
                $msg = $valid?"Code Name Updated":"Code name Failed to update";
            }else{
              $valid = $this->save_as_new();
                if(!$valid){
                    $msg = "Failed to save the Code name!!. Technical Error!";
                }
            }
        }
        if($valid && $mode == 1){
            $msg = $this->get_list(strtoupper(trim($data['base_code']))) ;
        }
        return array('error'=>!$valid,'message'=>$msg);
    }
} 
