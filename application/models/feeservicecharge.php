<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/10/14
 * Time: 1:42 PM
 */

class FeeServiceCharge extends DataMapper{
    public  $table = 'cis_college_system_service_type';
    function __construct(){
        parent::__construct();
    }

    public function get_list(){
        $sql = "SELECT service.*,structure.id as structure_id,structure.amount,structure.amount_foreign,structure.student_fee_category,structure.minimum_percentage FROM  cis_college_system_service_type as service LEFT JOIN cis_college_fee_structure as structure on structure.service_type_id = service.id";
        $qr = new CustomQuery();
        $data = $qr->execute_query($sql);

        return array('count'=>$data->num_rows(),'list'=>$data->result_object());
    }
} 
