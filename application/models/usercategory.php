<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/27/14
 * Time: 9:09 AM
 */

class UserCategory extends DataMapper {
    public $table = 'cis_sys_user_category';
    function __construct($id = null){
        parent::__construct($id);
    }


    function get_list(){

    }
} 
