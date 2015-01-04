<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/13/14
 * Time: 2:05 PM
 */

class StudentFeeSponsorInfo extends DataMapper {
    public  $table = 'cis_students_fee_imports_other';
    function __construct($id = null){
        parent::__construct($id);
    }
} 
