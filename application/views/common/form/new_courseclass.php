<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php

$sem = new Semester();
$acY = new AcademicYear();
$list = $sem->get_list();
var_dump($list);
$listAc = $acY->get_list();
var_dump($listAc);
