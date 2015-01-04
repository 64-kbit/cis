<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/14/14
 * Time: 4:34 AM
 */

class CustomQuery extends CI_Model {

    function __construct(){
        parent::__construct();

    }

    function execute_query($sql){
        $result = $this->db->query($sql);

        return $result;
    }


} 
