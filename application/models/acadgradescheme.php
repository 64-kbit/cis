<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 12/28/14
 * Time: 1:34 PM
 */

class acadgradescheme extends DataMapper{
    public $table = 'cis_acad_grading_scheme';
    function __construct($id = null){
       parent::__construct($id);
    }
    function setSchemeItem($grade_id, $min_value, $max_value,$hasPenalty=false){
        $did_it_work = false;
        $schemegradeitems = new acadgradeschemeitem();
        $_data = array(
          'grade_id'=>$grade_id,
           'scheme_id'=>$this->$id,
            'min_v'=>$min_value,
            'max_v'=>$max_value,
            'has_penalty'=>$hasPenalty
        );
        $schemegradeitems->add_new($_data);
        //+++++++++
        //NOTICE HERE
        //Here that has penalty has no where to go
        //+++++++++
        return $did_it_work;
    }
} 