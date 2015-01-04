<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/12/14
 * Time: 1:02 AM
 */

class ProgrammePre extends DataMapper {
    public $table = "cis_department_program_pre_level";
    function __construct($id = null){
        parent::__construct($id);
    }

    function  get_list(){
        $this->order_by('level_count')->get();
        $dt = false;
        foreach($this->all as $it){
           $dt[] = $it->stored;
        }
        return array('count'=>$this->result_count(),'list'=>$dt);
    }

    function get_programme_pre($pg_id,$type = false){
       $sql = "SELECT * FROM cis_department_program_pre_level_programs as pre join cis_department_program_pre_level as level on pre.pre_level_id = level.id where pre.programs_id = $pg_id  order by level.level_count asc";
        $result = $this->db->query($sql);
        if($type){
            $dts = false;
          foreach($result->result_array() as $i => $dt){
              $dts[$dt['form_id']] = $dt;
          }

            return $dts;
        }else{
            return $result->result_object();
        }
    }

    function remove_pg_pre($pg_id,$itid){
        $sql = "DELETE FROM cis_department_program_pre_level_programs WHERE pre_level_id=$itid and programs_id = $pg_id;";
        $result = $this->db->query($sql);

    }

    function add_programme($pg_id,$itid){
        $sql = "INSERT IGNORE INTO cis_department_program_pre_level_programs(programs_id,pre_level_id) values($pg_id,$itid);";
        $result = $this->db->query($sql);
    }
} 
