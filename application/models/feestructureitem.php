<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/10/14
 * Time: 4:26 AM
 */

class FeeStructureItem extends  DataMapper {
    public $table = 'cis_college_fee_structure_items';
    function __construct(){
        parent::__construct();
    }

    function add_item($data){
         $this->where(array('structure_id'=>$data['structure_id'],'fee_category_id'=>$data['fee_category_id']))->get();

        if($this->result_count()==0){
            $this->structure_id = $data['structure_id'];
            $this->fee_category_id = $data['fee_category_id'];
            $this->amount =$data['amount'];
            $this->amount_foreign = $data['amount_foreign'];
            $this->minimum_amount =$data['minimum_amount'];
            $this->enabled = 1;
            $this->is_required = $data['is_required'];
            $this->date_added = date("Y-m-d H:i:s",time());
            $this->use_structure = 1;
            $success = $this->save_as_new();

            return $success;

        } else{
            $this->where('id',$this->id);
            $status = $this->update($data);
           // var_dump($this); die();
            return $status;
        }
    }
} 
