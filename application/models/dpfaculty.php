<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/25/14
 * Time: 9:41 PM
 */

class DpFaculty extends DataMapper{
    public $table = 'cis_campus_faculty';
    function __construct($id= null){
        parent::__construct($id);
    }
} 
