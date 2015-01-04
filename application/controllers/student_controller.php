<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php


class student_controller extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model("System_core");
        $this->load->model("User_model");$this->load->model("profile_data") ;

        if(!$this->login_status() && !$this->allowed_access()){
            redirect(base_url()."login");
        }else{

        }
    }

    function allowed_access(){
        $login =  $this->System_core->curruser['profile'] ;//$this->session->userdata('login_data');
        if($login == 'student'){
            return true;
        }else{
            return false;
        }
    }


    function index(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = "Student Home Page " . " | ".  $data['sys_name'];
        $data['jsfiles'] = 'login_js';
        $data['userdata'] = $this->System_core->curruser;//$this->User_model->get_userdata($this->session->userdata['login_data']['login_id']);
       // var_dump($data);die();
        switch(end($data['uri'])){
            case 'registration':
                $data['currentBase'] = 'dashboard';
                break;
            case 'finance_info':
                $data['currentBase'] = 'dashboard';
                break;
            case 'my_profile':
                $data['currentBase'] = 'dashboard';
                break;
            case 'download_file':
                //$this->download_file($data);
                return false;
                break;
            default:
                $data['currentBase'] = 'dashboard';
                $data['current_uri'] = 'department';
                break;
        }

        $this->load->view('tpl/base',$data);
    }

    function message_comm(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = "Student Message " . " | ".  $data['sys_name'];
        $data['jsfiles'] = 'login_js';
        $data['userdata'] = $this->System_core->curruser;//$this->User_model->get_userdata($this->session->userdata['login_data']['login_id']);
        // var_dump($data);die();

                $data['currentBase'] = 'message';
                $data['current_uri'] = 'department';


        $this->load->view('tpl/base',$data);
    }

    function finance_info(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = "Financial Summary Info " . " | ".  $data['sys_name'];
        $data['jsfiles'] = 'login_js';
        $data['userdata'] = $this->System_core->curruser;//$this->User_model->get_userdata($this->session->userdata['login_data']['login_id']);
        // var_dump($data);die();

        $data['currentBase'] = 'message';
        $data['current_uri'] = 'department';


        $this->load->view('tpl/base',$data);
    }

    function registration_info(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = "Registration Summary Info " . " | ".  $data['sys_name'];
        $data['jsfiles'] = 'login_js';
        $data['userdata'] = $this->System_core->curruser;//$this->User_model->get_userdata($this->session->userdata['login_data']['login_id']);
        // var_dump($data);die();
        $data['currentBase'] = 'message';
        $data['current_uri'] = 'department';

        $this->load->view('tpl/base',$data);
    }

    function student_info(){
            $data = array();
            $data += $this->System_core->common_view_data();
            $data['home_view'] = 'tpl/template';
            $data['pg_title'] = "Student Home Page " . " | ".  $data['sys_name'];
            $data['jsfiles'] = 'login_js';
            $data['userdata'] = $this->System_core->curruser;//$this->User_model->get_userdata($this->session->userdata['login_data']['login_id']);
            // var_dump($data);die();
        $uri = end($data['uri']);
            switch($uri){
                case 'edit_profile':
                    $data['currentBase'] = 'my_account';
                    break;
                case 'personal_info':
                    $data['currentBase'] = 'personal_back';
                    break;
                case 'education_info':
                    $data['currentBase'] = 'education_back';
                    break;
                default:
                    $data['currentBase'] = $uri;
                    break;
                case 'update':
            }

        if($this->input->is_ajax_request()){
            $this->output->set_content_type('json')->set_output(json_encode($data));
        }else{
            $this->load->view('tpl/base',$data);

        }
            }

    function profile_info(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = "Student Home Page " . " | ".  $data['sys_name'];
        $data['jsfiles'] = 'login_js';
        $data['userdata'] = $this->System_core->curruser;//$this->User_model->get_userdata($this->session->userdata['login_data']['login_id']);
        // var_dump($data);die();
        switch(end($data['uri'])){
            case 'edit_profile':
                $data['currentBase'] = 'my_account';
                break;
            case 'personal_info':
                $data['currentBase'] = 'personal_back';
                break;
            case 'education_info':
                $data['currentBase'] = 'education_back';
                break;
            case 'update':

                $userid = $this->input->post('user_id');
                $validate = false;
                if(trim(strtolower($this->input->post('cur_email'))) != trim(strtolower($this->input->post('email')))){
                    $this->form_validation->set_message('is_unique',"Email is not Available. Try Another");
                    $this->form_validation->set_rules('email','Password','trim|required|valid_email|callback_input_check|is_unique[cis_sys_user.email_address]');
                    $validate = true;
                }
                if(trim($this->input->post('password'))){
                    $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|callback_input_check');
                    $this->form_validation->set_rules('password_confirm','Confirm','trim|required|matches[password]|callback_input_check');

                    $pass  = trim($this->input->post('password'));
                    $validate = true;
                }else{
                    $pass = false;
                }

                if($this->form_validation->run() || !$validate){
                    $user = new User();

                    $user->where('login_id',$userid)->get();
                    $user->email_address = trim($this->input->post('email'));
                    if($pass){
                        $user->password = md5($pass);
                    }
                    $user->save();
                    $details = new StudentDetails();
                    $details->where('std_id',$userid)->get();
                    $details->email_address = $this->input->post('email');
                    $details->save();
                    $data['error'] = false;
                    $data['message'] = 'Information Updated Successfully. <br>Changes will Take Effect after You have logged Out';
                 }else{
                    $data['error'] = 1;

                    $data['fields'] = $this->form_validation->error_array();
                    $data['message'] = "One or More Inputs Have Errors!";
                }

                break;
            default:
                $data['currentBase'] = 'dashboard';
                $data['current_uri'] = 'department';
                break;
        }

        if($this->input->is_ajax_request()){
           $this->output->set_content_type('json')->set_output(json_encode($data));
        }else{
            $this->load->view('tpl/base',$data);

        }
    }

    function search(){
        $sourcePage = $this->input->post('source_page');

        redirect(base_url().$sourcePage);
    }

    function student_class($in){
        $input = $this->input->get();
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = "Student Home Page " . " | ".  $data['sys_name'];
        $data['jsfiles'] = 'login_js';
        $data['userdata'] = $this->System_core->curruser;//$this->User_model->get_userdata($this->session->userdata['login_data']['login_id']);

        $data['currentBase'] = "data_" . $in;
        $this->load->view('tpl/base',$data);

    }

   public function download_file($data){
       $input = $this->input->get();
       $data = array();
       $data += $this->System_core->common_view_data();
       $data['home_view'] = 'tpl/template';
       $data['pg_title'] = "Student Home Page " . " | ".  $data['sys_name'];
       $data['jsfiles'] = 'login_js';
       $data['userdata'] = $this->System_core->curruser;//$this->User_model->get_userdata($this->session->userdata['login_data']['login_id']);

       switch($input['type']){
            case 'semester_summary':
                $studentClass = new StudentClassEnrollment();
                $studentClass->where('id',$input['classid'])->get();
                $studentClass->generate_semester_summary($data);
                die();
               // exit();
                break;
            default:
                break;
        }
    }

    function login_status(){
        return $this->session->userdata('login_status');
    }

} 
