<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: xnet-dev
 * Date: 8/19/14
 * Time: 10:34 AM
 */

class department extends CI_Controller{

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
        $login = $this->System_core->curruser['profile'];
        if($login == 'department'){
            return true;
        }else{
            return false;
        }
    }


    function index(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = $data['sys_name'] . ':Login ';
        $data['jsfiles'] = 'login_js';
       // $data['userdata'] = $this->User_model->get_userdata($this->session->userdata['uid']);
        $data['currentBase'] = 'department/dashboard';
        $data['current_uri'] = 'department';
        $this->load->view('tpl/base',$data);
    }

    function messages(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = $data['sys_name'] . ':Login ';
        $data['currentBase'] = 'common/message_base';
        $data['current_uri'] = 'department';
        $this->load->view('tpl/base',$data);
    }

    function student_info(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $uri = end($data['uri']);
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = $data['sys_name'];
        $data['currentBase'] = 'common/dp/st_'.$uri . "_data";
        $data['current_uri'] = 'department';
        $this->load->view('tpl/base',$data);
    }

    function programmes(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $uri = end($data['uri']);
        $data['jsfiles'] = 'login_js';
        $data['currentBase'] = 'common/dp/dpcourse_'.$uri . "_data";
       // $data['currentBase'] = 'department/courses_base';
        $data['current_uri'] = 'department';
        $this->load->view('tpl/base',$data);
    }

    function current_students(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = $data['sys_name'] . ':Login ';
        $data['currentBase'] = 'department/current_students';
        $data['current_uri'] = 'department';
        $this->load->view('tpl/base',$data);
    }

    function students_archive(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = $data['sys_name'] . ':Login ';
         $data['currentBase'] = 'department/students_archive';
        $data['current_uri'] = 'department';
        $this->load->view('tpl/base',$data);
    }


    function registration_info(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = $data['sys_name'] . ':Login ';
         $data['currentBase'] = 'department/registration_base';
        $data['current_uri'] = 'department';
        $this->load->view('tpl/base',$data);
    }

    function search(){
        $sourcePage = $this->input->post('source_page');

        redirect(base_url().$sourcePage);
    }

    function get_users(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = $data['sys_name'] . ': Users Management ';
        $data['currentBase'] = 'users_list';
        $this->load->view('tpl/base',$data);
    }

    function ajax_load(){
        //var_dump($this->input->post());
        $token1 =  $this->input->post('token');
        $action = $this->uri->segment(3);
        $is_ajax = $this->input->post('ajaxrequest');

        $mode = $this->input->post('acttype') == 'edit'?2:1;
        $token = $this->session->userdata('form_token');
        $validtk = ($token == $token1);
        $structureid = $this->input->post('itemid');
        if($this->input->post('ajaxrequest') && $this->input->post('token') == $this->System_core->get_config('session_pass')){
            $file = $this->input->post('form');
            switch($action){
                case 'autocourse_class':
                    $cz = new studentClassStream();

                    if($mode == 1){
                        $data = $cz->multiple_insert($this->input->post());
                    }else{
                        $data = $cz->update_stream($this->input->post());
                    }

                    break;
                default:
                    $data = array("message"=>"Unspecified Action!!",'error'=>true,'data'=>"Unspecified Action",'errors'=>true);
            }
            $this->output->set_content_type('json')->set_output(json_encode($data));

        }else{
            echo "Please Login First";
        }
    }


    function login_status(){
        return $this->session->userdata('login_status');
    }
} 
