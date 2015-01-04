<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/11/14
 * Time: 1:12 AM
 */

class EmailTpl extends CI_Model{
    public $mailfrom;
    public $coresparam;
    function __construct(){
        parent::__construct();

        $this->load->library('email');
        $this->load->model('System_core') ;
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;

       $this->coresparam = $this->System_core->fetch_system_params();
        $this->email->initialize($config);
        $mailfrom = empty($this->coresparam['support_email'])?$this->coresparam['org_abbr']."_".$this->coresparam['sys_name']:$this->coresparam['support_email'];
        $this->mailfrom = $mailfrom;
    }


    function send_activation_code($data){
          $this->email->from($this->mailfrom);
        $this->email->to($data['email_address']);
        $this->email->subject(  " Account Activation Instructions | " .$this->coresparam['org_name']. "-" . $this->coresparam['sys_name']);

        $this->email->message($data['message']);

        $this->email->send();
       // $this->email->print_debugger();
    }

    function send_change_password($data){
        $this->email->from($this->mailfrom);
        $this->email->to($data['email_address']);
        $this->email->subject(' Password Changing Instructions! | ' . $this->coresparam['org_abbr']. "-" . $this->coresparam['display_name'] . "");
        $this->email->message($data['message']);
        $this->email->useragent =  $this->coresparam['org_abbr'] ."-". $this->coresparam['display_name'] ;
        $this->email->send();
    }

} 
