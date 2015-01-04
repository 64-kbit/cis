<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/1/14
 * Time: 1:02 AM
 */

class FeeStructure extends DataMapper{
    public $table = 'cis_college_fee_structure';
    function __construct($id = null){
        parent::__construct($id);
    }

    function get_list($type = false,$id = false){
        $qr = new CustomQuery();
        $sql = "SELECT fx.*,acy.notation,acy.start_date,acy.end_date FROM cis_college_fee_structure AS fx JOIN cis_college_academic_years acy on fx.academic_year_id = acy.id where fx.status = 1";

        if($id){
            $sql .= " and fx.id = $id ";
        }

        $result = $qr->execute_query($sql);
        $status['count'] = $result->num_rows();
        $status['list'] = false;
        if($status['count'] > 0){
            if($id){
                $status['list'] = $result->row_object();
            }else{
                $status['list'] = $result->result_object();
            }

        }
        return $status;
    }

    function get_structure_items($structureid){
        $sql = "SELECT item.*, category.name as item_name,category.description FROM cis_college_fee_structure_items as item JOIN  cis_college_fee_category as category on category.id = item.fee_category_id where item.structure_id = $structureid ";
        $qr = new CustomQuery();
        $result = $qr->execute_query($sql);
        $status['count'] = $result->num_rows();  $status['list'] = false;
        if($status['count'] > 0){
            $status['list'] = $result->result_object();
        }

        return $status;
    }

    function get_non_structure_items($structureid){
        $sql = "SELECT cat.*,items.id as item_id,items.amount, items.amount_foreign,items.structure_id,is_required,student_category_type from cis_college_fee_category as cat left join cis_college_fee_structure_items as items on items.fee_category_id = cat.id";
        //  where item.structure_id = $structureid
        $qr = new CustomQuery();
        $result = $qr->execute_query($sql);
        $status['count'] = $result->num_rows();  $status['list'] = false;
        if($status['count'] > 0){

            $status['list'] =  $result->result_object() ;
            /*
            foreach($result->result_object() as $id => $ob){
                if($ob->structure_id != $structureid){
                    $status['list'][] = $ob;
                }
            }  */
        }

        return $status;
    }

    function create_new_structure(array $data){
        $this->where(array('name'=>$data['structure_name'],'student_fee_category'=>$data['sponsor_category'],'academic_year_id'=>$data['academic_year']))->get();

        if($this->result_count() == 0){
            $this->name = $data['structure_name'];
            $this->description = $data['description'];
            $this->academic_year_id = $data['academic_year'];
            $this->service_type_id = $data['service_charge'];
            $this->student_fee_category = $data['sponsor_category'];
            $this->amount_foreign = $data['amount_foreign'];
            $this->amount = $data['amount_local'];
            $this->minimum_foreign = $data['amount_foreign_min'];
            $this->minimum_amount  = $data['amount_local_min'];
            $this->reg_category_id = $data['reg_category'];
            $this->minimum_percentage = (double) ($data['amount_local']/ $data['amount_local_min']);
            $this->year_started = date("Y-m-d h:i:s",time()) ;
            $this->is_enabled = 1;
            $this->locked_structure = 0;
            $this->lock_password = md5('ombeni');
            $this->status = 1;

            $succes = $this->save_as_new();

            if($succes){

                $data['itemid'] = empty($this->id)?$this->db->insert_id():$this->id;;
                $status['structure'] = $this->get_list(false,$data['itemid']);
                $status['error'] = false;
                $pgFee = new ProgrammeFee();
                $status['programm'] =  $pgFee->add_structure_programme($data);


            }else{
                $status['structure'] = "Failed to save the Programme";
                $status['error'] = true;
            }
        }else{
            $succes = $this->save();
            $status['structure'] =$succes?"Structure Has been Updated": "Failed to save the Programme";
            $status['error'] = true;
        }
        return $status;
    }


    function update_structure_info(array $data){
            $this->name = $data['structure_name'];
            $this->description = $data['description'];
            $this->academic_year_id = $data['academic_year'];
            $this->service_type_id = $data['service_charge'];
            $this->student_fee_category = $data['sponsor_category'];
        $this->reg_category_id = $data['reg_category'];
        $status['structure'] = $this->save();
            $pgFee = new ProgrammeFee();
            $status['programm'] =  $pgFee->add_structure_programme($data);
        return $status;
    }

    public function filter_structure($input){

          $pg = $input['programme'];
          $sel = $input['selected_program'];

          $selcoz = $input['selected_courses'];
          $coz = $input['course'] ;

        $deselectedpg = array_diff($sel,$pg);
        if($this->key_val_search($coz,'all')){
               $deselcoz = array();
        }else{

             $deselcoz = array_diff($selcoz,$coz);
            unset($deselcoz['all']);
        }


       if(count($input['selected_program']) > 0 && is_array($input['selected_program'])){
         $qr = new CustomQuery();
        foreach($deselectedpg as $id ){
            if(!empty($id)){
           $sql = "DELETE FROM cis_program_semester_fee_structure WHERE program_id = $id and academic_years_id = {$input['academic_year']} and student_category_id = {$input['sponsor_category']} and service_charge_id = {$input['service_charge']} and  fee_structure_id ={$input['itemid']}  ";

            $qr->execute_query($sql); }
        }
       }

        if(isset($input['selected_program']) && count($input['selected_courses']) > 0 && is_array($input['selected_courses']) && !empty($input['selected_program'][0])){
            foreach($pg as $p){
                if(!empty($p)){
            foreach($deselcoz as $dz){
                if(!empty($p) && !empty($dz)){

                    $sql = "DELETE FROM cis_program_semester_fee_structure WHERE program_id = $p and academic_years_id = {$input['academic_year']} and student_category_id = {$input['sponsor_category']} and service_charge_id = {$input['service_charge']} and  fee_structure_id ={$input['itemid']} and course_id={$dz}  ";

              //  $qr->execute_query($sql);
                }
            } }
        }
        }
    }

    private function key_val_search($arr,$k){
        foreach($arr as $id=>$d){
            if(strtolower($d) == strtolower($k)){
                return true;
            }
        }
      return   false;
    }

    function add_fee_items($strid,$options,$percents,$local,$foreign){
        $data = array();
        $feeitem = new FeeStructureItem();
        $sumamounts = array('amount'=>0,'foreign'=>0,'minimum'=>0,'minimuforeign'=>0);
        $status = array();
          foreach($local as $id => $item){
              $data['structure_id'] = $strid;
              $data['fee_category_id'] = $id;
              $data['amount'] = $item;
              $data['amount_foreign'] = $foreign[$id];
              $data['minimum_amount'] = $percents[$id];
              $data['is_required'] = !$options[$id];


              $status[$id] = $feeitem->add_item($data);

              $sumamounts['amount'] += $item;
              $sumamounts['foreign'] += $foreign[$id];
              $sumamounts['minimum'] += $data['is_required']?$item * ($percents[$id]/100):0;
              $sumamounts['minimuforeign'] +=  $data['is_required']?$foreign[$id] * ($percents[$id]/100):0;
          }

        $this->where('id',$strid)->get();
        $this->amount_foreign = $sumamounts['foreign'];
        $this->amount = $sumamounts['amount'];
        $this->minimum_amount = $sumamounts['minimum'] ;
        $this->minimum_foreign = $sumamounts['minimuforeign'];
        $this->minimum_percentage = (double)($sumamounts['minimum']/$sumamounts['amount'])*100;

       // var_dump($this->minimum_percentage);
      //  die();
        $success = $this->save();

        return array('structure' => $success,'all'=>$status);
    }

} 
