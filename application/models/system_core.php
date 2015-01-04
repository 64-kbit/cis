<?php
/**
 * Created by PhpStorm.
 * User: xnet-dev
 * Date: 7/7/14
 * Time: 4:12 AM
 */

class System_core Extends CI_Model {

    public $config = array();
    public $curruser = false;

    function __construct(){
        parent::__construct();
        $this->config = $this->fetch_system_params();
        $this->session->set_userdata('form_token', md5('XnetSystems'));
        $this->load->model('User_model');
        //var_dump($this->session->userdata);
        if($this->session->userdata('login_status')){
            $user = new User($this->session->userdata['uid']);
            $user->last_active = date_convert(time(),false);
            $user->login_status = 1;
            $user->save();
            $this->curruser = (array) $user->stored;
            $this->curruser['user_info'] = $user->get_about_me();
           // var_dump($user->stored);
        }


       // ob_clean();
    }

    public function get_config($col = false){
        if(!$col){
            return $this->config;
        }else{
            return $this->config[$col];
        }
    }

    function test_configurations(){
        return true;
    }

     function fetch_system_params(){
        $param = $this->db->get('registration_sys_config');
        $param2 = $this->db->get('cis_org_details');

        $result = $param->row_array() + $param2->row_array();
        $result['session_pass'] = md5('XnetSystems');
        return $result;
    }

    public function system_parameters(){
        $parama = array(
            'sys_title' => ucwords($this->config['display_name']),
            'sys_hardname' => strtolower($this->config['sys_name']),
            'sys_ver'=>strtolower($this->config['version']),
            'org_name' => ucwords($this->config['org_name']),
            'org_logo' => $this->config['org_logo'],
            'org_email' => strtolower($this->config['org_email']),
            'org_box' => strtoupper($this->config['org_box']),
            'org_contacts' => $this->config['org_contact'],
            'org_abbr' => strtoupper($this->config['org_abbr']),
            'org_type' => ucfirst($this->config['org_type']),
            'sys_name' => $this->config['code_name'],
            'org_website'=> isset($this->config['org_website'])?$this->config['org_website']:""
        );

        return $parama;
    }

    function get_file($uid,$fname){

        if($uid && $fname && is_file(UPLOAD_DIR.$uid."/".$fname)){
           return file_get_contents(UPLOAD_DIR.$uid."/".$fname);
        }else{
            return file_get_contents(FCPATH.'themes/img/warning.png');
        }

    }

    function parse_config($item){
        $item =  preg_replace("{#c_type#}",ucfirst($this->config['org_type']),$item);
        $item = preg_replace('{#c_name#}',ucfirst($this->config['code_name']),$item) ;
        return $item;
    }


    function common_view_data(){
        $data = array();
        $data['footer'] = "copyright &copy; ".date("Y",time())." ".$this->get_config('org_abbr') ." : ". $this->get_config('code_name'). " ver " . $this->get_config('version');
        $data['sys_name'] = $this->get_config('display_name');
        $data['home_view'] = 'tpl/template';
        $data['config'] = $this->fetch_system_params();
        $data['uri'] = $this->uri->segments;
        $data['uri_str'] = $this->uri->uri_string;
        $data['queryData'] = $this->input->get();
        $data['userdata'] = $this->curruser; // isset($this->session->userdata['login_data']['login_id'])?):"";
        $data['modals'] = get_profile_modals($data['uri'],$data['uri_str']);
        $data['form_input'] = $this->input->post();
        $data['currenttoken'] = $this->session->userdata('form_token') ;
        $data['showcontrols'] = true;
        return $data;
    }
} 
