<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 12/28/14
 * Time: 1:49 PM
 */

class acadmoduleexam extends DataMapper{
    public $table = 'cis_acad_class_course_module_exam';
    function __construct($id=null){
       parent::__construct($id);
    }

} 