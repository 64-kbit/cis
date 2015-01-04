<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/24/14
 * Time: 8:06 AM
 */

class CalendarEvent extends DataMapper{
   public  $table = 'cis_college_callender_event_category' ;
    function __construct(){
        parent::__construct();
    }

    function add_new($data,$uid){

    }
} 
