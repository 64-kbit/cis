<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/1/14
 * Time: 1:34 AM
 */

class FeeFigures extends DataMapper{
    public $table = 'cis_college_fee_category';
    function __construct(){
        parent::__construct();
    }

    function get_list(){
      $qr = new CustomQuery();
        $sql = "select cat.name,cat.description,cat.student_category_type,stcat.name as stcat_name,stcat.display_name as stcat_dname  from  cis_college_fee_category as cat
        left join cis_student_category_information as stcat on stcat.id = cat.student_category_type  ";
        $result = $qr->execute_query($sql);


        $status['count'] = $result->num_rows();
        $status['list'] = false;
        if($status['count'] > 0){
            $status['list']= $result->result_object();
        }

        return $status;
    }
} 
