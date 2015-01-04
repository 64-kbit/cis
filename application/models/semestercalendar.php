<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/2/14
 * Time: 1:56 PM
 */

class SemesterCalendar extends DataMapper {
   public $table = 'cis_college_callender_semester';
    function __construct($id = null){
        parent::__construct($id);
    }

     function get_current_semester($str = false){
         if($str){
             $st = " and sem.sem_structure_id = $str ";
         }else{
             $st = " ";
         }
         $todate = date("Y-m-d h:i:s",time());
         $sql = "SELECT * FROM cis_college_callender_event as event
         JOIN cis_college_callender_semester as sem on sem.event_id = event.id
         where event.start_date <= '$todate' and event.end_date >= '$todate'  $st
         ";
         $result = $this->db->query($sql);
         return $result->result_object();
     }
} 
