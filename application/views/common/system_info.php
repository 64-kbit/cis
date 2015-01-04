<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: xnet-dev
 * Date: 8/21/14
 * Time: 1:13 AM
 */ 

 $current = end($uri);

$this->load->view("admin/".$current) ;
