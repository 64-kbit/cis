<?php
 if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * Description of excel
 *
 * @author oau
 */


class captcha {

   function captcha()
    {
       //echo "Here ";die();
        $CI = & get_instance();
        log_message('Debug','Captcha class is loaded.');
    }
 
    function load($params=NULL)
    {
        include_once APPPATH.'libraries/captcha/CaptchaBuilderInterface.php';
        include_once APPPATH.'libraries/captcha/PhraseBuilderInterface.php';
        include_once APPPATH.'libraries/captcha/CaptchaBuilder.php';
        include_once APPPATH.'libraries/captcha/PhraseBuilder.php';


        return  new \Gregwar\Captcha\CaptchaBuilder();
    }
}
