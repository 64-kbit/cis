<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: oau
 * Date: 9/10/14
 * Time: 12:03 AM
 */

class Semester extends  DataMapper{
    var $table = 'cis_semester';
    var $has_many =array('semesterstructure' => array(
        'class'=>'semesterstructure',
        'other_field'=>'semester',
        'join_other_as'=>'structure',
        'join_self_as'=>'semester',
        'join_table'=>'cis_program_semester_list'));

    var $validation = array(
        'name'=> array(
            'label'=>'Sem Name',
            'rules'=>array('required','trim','xss_clean','unique','min_length'=>3)
        ),
        'display_name'=> array(
            'label'=>'Common Name',
            'rules'=>array('required','trim','xss_clean','unique','min_length'=>3)
        ),
        'numeric_value'=> array(
            'label'=>'Numeric Count',
            'rules'=>array('required','trim')
        ),
        'display_value'=> array(
            'label'=>'Roman Count',
            'rules'=>array('required','trim','matches_numeric')
        ),
        'year_count'=> array(
            'label'=>'Year Value',
            'rules'=>array('required','trim')
        ),

    );

    var $draw_view = false;
    var $form_errors = false;


    function __construct($id = false){
        parent::__construct($id);

    }

    function get_list(){
        $status['count'] = 0;
        $status['list']  = false;
        $this->order_by('numeric_value','asc')->get();

        foreach($this as $id => $ob){
            $status['count'] += 1;
            $status['list'][] = $ob;
        }

        return $status;
    }

    function get_not_semester_structures($strid){
        if($strid){
           $this->include_related('semesterstructure');
            $this->not_like('structure_id',$strid)->get();
            $status['count'] = 0; $status['list'] = false;
            foreach($this as $id => $obj){
                $status['count'] += 1;
                $status['list'][] = $obj;
            }
        }else{
            $status = false;
        }

        return $status;
    }



    function get_structure_semesters($structure_id){

              if($structure_id && is_numeric($structure_id)){
                  $this->include_related('semesterstructure');
                  $this->where('structure_id',$structure_id)->get();
                  $status['count'] = 0;$status['list'] = false;
                  foreach($this as $id=>$obj){
                      $data = new stdClass();
                      $status['count']   += 1;
                      $status['list'][] = $obj;
                     // if($obj->structure_id == $structure_id){
                  }
              }else{
                  $status['count'] = 0;
                  $status['list'] = false;
              }
        return $status;
    }

    function createSemester($data){
        $this->name = $data['sem_name'];
        $this->display_name = $data['sem_dname'];
        $this->numeric_value = $data['sem_numeric'];
        $this->display_value = $data['sem_roman'];
        $this->year_count = $data['sem_year'];
        $this->comments = $data['sem_comments'];
       $success = $this->save();
          if(!$success){
               if($this->valid){
                   $status['status'] = false;
                    $status['msg'] = "Record Failed To Save Retry";
               }else{
                  $status['status'] = false;
                   $this->set_form_errors();
                   $status['msg'] = $this->form_errors;
               }
          }else{
              $status['status'] = $this->count();
              $status['msg'] = 'Success';
          }
        return $status;
    }



    function updateSemester($newdata){

    }

    function create_sem_structure(){

    }

    function get_sem_structure($id){

    }

    function remove_sem_structure($id){

    }

    function add_semester($data){

    }

    function add_semester_item($id){

    }

    /** Custom validation functions  */
    function _matches_numeric($obj,$relate =false,$field = false){
       if(numeric_values_list('roman',$this->numeric_value,true) != $this->display_value){
          $this->error_message("display_value",'Roman Value does not match with Numeric Value') ;
       }
    }

    /* Load form fields errors */

    function set_form_errors(){
        if(isset($this->error->name)){
            $this->form_errors['sem_name'] = $this->error->name;
        }
        if(isset($this->error->display_name)){
            $this->form_errors['sem_dname'] = $this->error->display_name;
        }
        if(isset($this->error->numeric_value)){
            $this->form_errors['sem_numeric'] = $this->error->numeric_value;
        }
        if(isset($this->error->display_value)){
            $this->form_errors['sem_roman'] = $this->error->display_value;
        }
        if(isset($this->error->year_count)){
            $this->form_errors['sem_year'] = $this->error->year_count;
        }
        if(isset($this->error->comments)){
            $this->form_errors['sem_comments'] = $this->error->comments;
        }
    }

    /** draw_view
     * This functions draws the html content of the object on demand
     *@param string viewtype
     *@return void
     * */

    function draw_view($coreObj,$type =false,$id=false){
        $info = array(
            'viewtype'=>$type?$type:'table',
            'id_type' => 'new',
            'id' => $this->count() - 1,
            'semOb' => $this,
            'total'=> $this->count(),
        );
        $this->draw_view = $this->load->view('common/data/dt_semester',array_merge($info ,$coreObj->common_view_data()),true);

    }

} 
