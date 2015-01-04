<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php

class examination extends CI_Controller {

    function __construct(){
        parent:: __construct();
        $this->load->model("System_core");
        $this->load->model("User_model");
        $this->load->model("profile_data") ;

        if(!$this->login_status() && !$this->allowed_access()){
            redirect(base_url()."login");
        }else{

        }
    }

    function allowed_access(){
        $login =   $this->session->userdata('login_data');
        if($login['profile'] == 'examination'){
            return true;
        }else{
            return false;
        }
    }

} 
