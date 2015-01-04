<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/15/14
 * Time: 2:27 PM
 */

class StudentCategory extends DataMapper{
  public $table = "cis_student_category_information";
    public $has_many = array(
        'studentinfo'=>array(
            'class'=>'StudentInfo',
            'other_field'=>'studentcategory',
            'join_self_as'=>'category',
            'join_other_as'=>'student',
            'join_table'=>'cis_student_category'
        )
    );
    function __construct(){
        parent::__construct();
    }

    function get_student_category($stdid,$rtype = 1){
        $sql = "SELECT cat.*,inf.name,inf.category_type,inf.display_name,inf.remarks FROM cis_student_category as cat join cis_student_category_information as inf on cat.category_id = inf.id where cat.student_id = $stdid";
        $resut = $this->db->query($sql);
        $dt = array();
         switch($rtype){
             case 2:
                 foreach($resut->result_array() as $r){
                     $dt[$r['id']] = $r['category_id'];
                 }
                 break;
             case 3:
                 foreach($resut->result_array() as $r){
                     $dt[$r['id']] = $r['category_id'];
                 }
                 break;
             default:
                 $dt = $resut->result_array();
                 break;
         }
        return $dt;
    }
} 
