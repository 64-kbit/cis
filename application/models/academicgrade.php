<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/22/14
 * Time: 5:16 PM
 */

class AcademicGrade extends DataMapper{
  public $table = "cis_acad_grade";
    function __construct(){
        parent::__construct();
    }

} 
