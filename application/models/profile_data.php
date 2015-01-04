<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: xnet-dev
 * Date: 8/19/14
 * Time: 10:44 AM
 */

class profile_data extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function build_live_menu(){

    }

    function live_head_menu($profile,$userid = false){

        return "menu items";
    }
} 
