<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php

class UserSession extends DataMapper {
    public $table = 'cis_user_session';
    function __construct(){
        parent::__construct();
    }

    public function get_user_status($userid,$usermail){
       $this->like('user_data',$usermail);
        $this->or_like('user_data',$userid);
        $this->get();
        $status = array(
            'ip_address'=>"",
            'user_agent'=>"",
            'userid' => $userid,
            'last_activity'=> 0,
            'online' => false
        );
        if($this->result_count()){
            $status['ip_address'] = $this->ip_address;
            $status['user_agent'] = $this->user_agent;
            $status['last_activity'] = ($this->last_activity);
            $status['online'] = true;
        }else{

        }
        return $status;
    }

    public function get_online_users(){

    }
} 
