<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 12/28/14
 * Time: 1:47 PM
 */

class acadmodulepenalty extends DataMapper{
    public $table = 'cis_acad_course_module_penalty';
    function __construct($id=null){
        parent::__construct($id);
    }
} 