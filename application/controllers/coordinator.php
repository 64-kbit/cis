<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
class Coordinator extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("System_core");
        $this->load->model("User_model");
        $this->load->model("profile_data") ;
        $this->load->model("department") ;

        //$this->load->library('form_validation_error');
        if(!$this->login_status() && !$this->allowed_access()){
            redirect(base_url()."login");
        }
    }

    function allowed_access(){
        $login =   $this->System_core->curruser['profile'];
        if($login){
            if($login == 'coordinator'){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function index(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] ='System Home ' . " | ".  $data['sys_name'] ;;
        $data['jsfiles'] = 'login_js';
        $data['currentBase'] = 'coordinator/dashboard';
        $data['current_uri'] = 'admin';
        $this->load->view('tpl/base',$data);
    }

    /** Inputs Checking and validations functions */
    // General input checker
    function input_check($input){
        $input =trim($input,"\n\t\x0B");
        if ($input == 'select'|| $input == 'Select' || $input == '--' || $input=='')
        {
            $this->form_validation->set_message('input_check', '%s is Empty');
            return FALSE;
        }
        else
        {

            return true;
        }
    }

    function valid_date($date)
    {
        // $ddmmyyy='/(0[1-9]|[12][0-9]|3[01])[- /](0[1-9]|1[012])[- /](19|20)[0-9]{2}/';
        $ddmmyy ='(19|20)\d{2}[\-](0[1-9]|1[012])[\-](0[1-9]|[12][0-9]|3[01])';

        if(preg_match("/$ddmmyy/", $date)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('valid_date', 'Please enter yyyy-mm-dd');
            return FALSE;
        }
    }

    function login_status(){
        return $this->session->userdata('login_status');
    }
}
