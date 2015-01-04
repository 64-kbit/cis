<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/1/14
 * Time: 4:49 AM
 */

class StudentSponsor extends DataMapper {
   public $table = 'cis_student_sponsor_type';
    function __construct($id = null){
        parent::__construct($id);
    }

        function get_list(){
            $status['count'] = 0;
            $status['list']  = false;
            $this->order_by('name','asc')->get();
            foreach($this as $id => $ob){
                $data = new stdClass();
                $status['count'] += 1;
                $status['list'][] = $ob->stored;
            }

            return $status;
        }
} 
