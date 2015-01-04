

<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class maild {
    function maild()
    {

        $CI = & get_instance();
        log_message('Debug','Captcha class is loaded.');
    }

    function load(){
        include APPPATH. 'libraries/mail/PHPMailerAutoload.php';

        return new PHPMailer();
    }

} 
