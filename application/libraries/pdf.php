<?php
 if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pdf
 *
 * @author oau
 */

include_once APPPATH.'/third_party/mpdf/mpdf.php';
class pdf extends mPDF {
   function pdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function load($params=NULL)
    {

        if ($params == NULL)
        {
            //$param = '"","A4","","",20,20,20,20,1,0'; 
           $param = " 'c',    // mode - default ''
	 'A4-L',    // format - A4, for example, default ''
	 0,     // font size - default 0
	 '',    // default font family
	 15,    // margin_left
	 15,    // margin right
	 10,     // margin top
	 5,    // margin bottom
	10,     // margin header
	 5,     // margin footer
	 'L'";  // L - landscape, P - portrait);*/
        }
         
        return new mPDF($param);
    }
}
