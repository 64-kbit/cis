<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: Herbert G
 * Date: 12/28/14
 * Time: 1:42 PM
 */

class acadgrade extends DataMapper{
    public $table = 'cis_acad_grade';
    function __construct(){
        parent::__construct();
    }
} 