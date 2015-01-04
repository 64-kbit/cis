<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 12/28/14
 * Time: 1:51 PM
 */

class acadmoduleexamcategory extends DataMapper{
    public $table = 'cis_acad_class_exam_category';
    function __construct($id=null){
        parent::__construct($id);
    }

} 