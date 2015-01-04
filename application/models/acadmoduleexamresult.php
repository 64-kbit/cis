<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 12/28/14
 * Time: 1:53 PM
 */

class acadmoduleexamresult extends DataMapper{
    public $table = 'cis_acad_class_course_module_exam_result';
    function __construct($id=null){
        parent::__construct($id);
    }

} 