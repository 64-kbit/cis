<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/12/14
 * Time: 10:10 AM
 */

class MailGrabConfig extends DataMapper {
    public  $table = 'cis_sys_maigrab_config';
    function __construct(){
        parent::__construct();
    }
} 
