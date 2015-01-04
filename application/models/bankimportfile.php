<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/18/14
 * Time: 11:43 AM
 */

class BankImportFile extends DataMapper {
    public $table = 'cis_college_fee_imports_status';

    function __construct($id=null){
        parent:: __construct($id);
    }

    function get_list(){
        $status['count'] = 0; $status['list'] = false;
        $this->order_by('last_run','asc');
        $this->get();
        foreach($this as $id=>$item){
            $status['count'] += 1;
            $status['list'][] = $item;
        }

        return $status;
    }

    function get_network_warnings(){

    }

    function get_last_connection(){
        //$this->_max_date('last_run',)
    }


    function add_file($data){
        $this->where('mail_id',$data['mail'])->get();
        if($this->result_count() == 0){
       $this->date_received = date("Y-m-d H:i:s ",time());
        $this->last_access = date("Y-m-d H:i:s ",time());
        $this->file_name = $data['file'];
        $this->date_sent = $data['date'];
        $this->mail_id  = $data['mail'];

        $this->save();
        }
    }


    function get_mail_imports(){
        $this->where('log_type','mail_scan');
    }
} 
