<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/19/14
 * Time: 11:46 AM
 */

class SASEdLevel extends DataMapper {
    public  $table = 'sas_ed_levels';
    function __construct(){
        parent::__construct();
    }

    function get_levels($siar = false){
        $this->order_by("category,abbreviation",'asc')->get();
       //var_dump($this->all);
        $list = array('count'=>$this->result_count());

        foreach($this->all as $id => $it){
           $list['list'][$it->abbreviation] = $siar?$it->name . "(".strtoupper($it->abbreviation). ")":(array)$it->stored;
        }


        return $list;
    }

    function get_from_abr($abbr){
        $this->where('abbreviation',$abbr)->get();
        return $this->name . "(" . $this->abbreviation . ")";
    }
} 
