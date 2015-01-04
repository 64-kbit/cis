<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/10/14
 * Time: 12:30 PM
 */

class AcademicYear extends DataMapper {

    var $table = 'cis_college_academic_years';
    var $validation = array(
        'start_date'=>array(
            'label' => 'Start Date',
            'rules' => array('required','trim','unique','valid_date','max_date'=>CURRENT_DATE),
        ),
        'end_date'=>array(
            'label' => 'Ending Date',
            'rules' => array('required','trim','unique','valid_date','valid_year_check'),
        ),
        'end_year' => array('Ending Year',
            'label' => 'Ending year',
            'rules' => array('required','trim','unique')
        ),
        'start_year' => array(
            'label'=>'Starting Year',
            'rules' => array('required','trim','unique')
        ),
        'y_separator'=>array(
            'label' => 'Years Separator',
            'rules' => array('required','trim'),
        ),
        'notation'=>array(
            'label' => 'Notation',
            'rules' => array('required','trim','unique'),
        )
    );

    var $form_errors = false;
    var $current_year;
    var $current_semester = false;
    function __construct($id = false){
        parent::__construct($id);
        $this->current_year = $this->set_current_yr();
       $this->_current_semester();
    }

    function get_list($type = false){
        $list['count'] = 0;
        $list['list'] = false;
        $this->order_by('end_year','desc');
        $this->get();
         foreach($this as $obj => $o){
             $o->_current_semester();
              $list['count'] += 1;
             if($type){
                 $list['list'][$o->id] = $o->notation;
             }else{
              $list['list'][] = $o;
             }
          }

        return $list;
    }

    function get_current_ac_semester($str = false){
        if($str){
            $st = " and sem.sem_structure_id = $str ";
        }else{
            $st = " ";
        }
        $todate = date("Y-m-d h:i:s",time());
        $sql = "SELECT sem.*,event.start_date,event.end_date,event.event_type,se.name,se.display_value,se.display_name,se.period_name,se.year_count,se.numeric_value FROM cis_college_callender_event as event
         JOIN cis_college_callender_semester as sem on sem.event_id = event.id
         JOIN cis_semester as se on se.id = sem.semester_id
         where event.start_date <= '$todate' and event.end_date >= '$todate'  $st
         group by se.id order by se.numeric_value asc ";
        $result = $this->db->query($sql);

        return $result->result_object();
    }

    function get_current_academic_year(){
        $sql = "select *  from cis_college_academic_years where end_date >= now();";
        $result = $this->db->query($sql);
        return $result->row_object();
    }

    function update_Ayear(){

    }

     function  _current_semester(){
       if((strtotime($this->end_date) >= time())){
           $this->current_semester = true;
       }else{
           $this->current_semester = false;
       }
    }

    function updateYear($newdata){

        return array('status'=>true,'msg'=>'Academic year Successfully Updated');

    }

    function createNew($data){

         $this->start_date =  $data['acY_start']; //('acY_start') ;
        $this->end_date = $data['acY_end']; //$this->input->post('acY_end');
        $this->y_separator = addslashes($data['acY_separator']); //$this->input->post('acY_separator');
        $comments =$data['acY_comments']; // $this->input->post('acY_comments');
        if(!empty($comments)){
            $this->comments  = $comments;
        }

        $this->start_year = date("Y",strtotime($this->start_date));
        $this->end_year = date("Y",strtotime($this->end_date));

        $this->_current_semester();

        $this->status = $this->current_semester;

        $this->notation = $this->start_year . $this->y_separator .  $this->end_year;

       $this->y_separator = "`" . $this->y_separator . "`";
      $success =  $this->save();
        $status['status'] = false;
        $status['msg'] = false;

        if(!$success){
           if($this->valid){
               $status['msg'] = "Failed to Insert/Update";
           }else{
               $this->form_errors();
              $status['msg'] = $this->form_errors;
           }
        }else{
            $status['status'] = $this->count();
            $status['msg'] = $this;
        }

        return $status;
        //$this->
    }

    function set_current_yr(){
        $today = date("Y",time());
        $this->current_year = $today . "/" . ($today + 1);
    }


    function create_view(){

    }

    function _valid_year_check($obj,$related_obj=false,$rel_field=false,$param=""){
          $curyear = date("Y",time()) ;
        $startY = $this->start_year;
          $endY = $this->end_year;
        if($endY > $curyear + 1){
            //$this->form_validation->set_message('valid_year_check','');
            $this->error_message('end_date','End Date Must not Exceed Next Year');
            //return false;
        }elseif($startY >= $endY){
            $this->error_message('end_date','End date Must be greater than Start date By 1 year');
            //return false;
        }elseif(($endY - $startY) != 1){
            $this->error_message('end_date','End date and Start date Difference In Years must be 1');
           // return false;
        }else{
            return true;
        }

    }

    function form_errors(){
        $data = array();
        if(isset($this->error->start_date)){
            $data['acY_start']  = $this->error->start_date;
        }
        if(isset($this->error->end_date)){
            $data['acY_end'] = $this->error->end_date;
        }
        if(isset($this->error->y_separator)){
            $data['acY_separator']  = $this->error->y_separator;
        }
        if(isset($this->error->comments)){
            $data['acY_comments']  = $this->error->comments;
        }

        if(isset($this->error->start_year)){
            $data['acY_start']  = $this->error->start_year;
        }
        if(isset($this->error->end_year)){
            $data['acY_end'] = $this->error->end_year;
        }

        $this->form_errors = $data;
    }
    function mine(){

    }

    /**
     * Views
     */

    function drop_view($name,$selected = false,$class = '',$id="",$other=""){
        $list  =$this->get_list(1);

        return form_dropdown($name,$list['list'],$selected," $other class='$class' id='$id'");

    }
} 
