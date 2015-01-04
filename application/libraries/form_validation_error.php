<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/29/14
 * Time: 11:52 AM
 */

class form_validation_error extends CI_Form_validation {
    function __construct($config = array()){
        parent::__construct($config);
    }

    function error_array(){
        if(count($this->_error_array) == 0){
            return false;
        }else{
           return $this->_error_array;
        }
    }
} 
