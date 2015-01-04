<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-- manually edit the SERVER line in /media/oau/win8/matlab/licenses/network.lic. -->
<?php
/**
 * Created by PhpStorm.
 * User: oau
 * Date: 11/29/14
 * Time: 2:29 PM
 */

class PrintGenerator extends DataMapper {
    public $table = 'print_student_info';
    function __construct(){
        parent::__construct();
    }

    function create_col_map(){
        $this->get();
        //= $reportGen->fields;
        $fields = array();
        foreach($this->fields as $fld){
           $col = print_student_colmn_map($fld);
            if(strtolower($col) == 'undefined') continue;
             $fields[$fld] = $col;
        }
       return  $fields + common_fields();//$fields

    }

    function add_my_template(){

    }

    function get_my_templates($userid,$tplid = false){
       $list = array(
          'other'=> 'other',
           'student_info'=>'info'
       );

        return $list;
    }
}
