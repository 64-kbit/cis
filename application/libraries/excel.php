<?php
 if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Description of excel
 *
 * @author oau
 */


class excel {
   function excel()
    {
       //echo "Here ";die();
        $CI = & get_instance();
        log_message('Debug', 'class class is loaded.');
    }
 
    function load($param=NULL)
    {
        include_once APPPATH.'/third_party/excel/PHPExcel.php';
         
        if ($params == NULL)
        {
            
        }
         
        return new PHPExcel();
    }
}
