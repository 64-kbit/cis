<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/12/14
 * Time: 9:48 AM
 */

class SemesterStructure extends DataMapper {

    var $table = 'cis_semester_structure';
   var $has_many =array(
       'semester' => array(
           'class'=>'semester',
           'other_field'=>'semesterstructure',
           'join_other_as'=>'semester',
           'join_self_as'=>'structure',
           'join_table'=>'cis_program_semester_list'),
        'programme' => array(
            'class'=>'programme',
            'other_field'=>'semesterstructure',
            'join_other_as' =>'programs',
            'join_self_as' => 'structure',
            'join_table'=>'cis_program_semester_structure'
        )
        );
    var $validation = array(
        'name'=>array(
            'label'=>"Structure Name",
            'rules' => array('required','trim','unique')
        ),
        'display_name'=>array(
            'label'=>"Structure Name",
            'rules' => array('required','trim','unique')
        ),
        'code_name'=>array(
            'label'=>"Structure Name",
            'rules' => array('required','trim','unique')
        ),
        'count' => array(
            'label' => 'Semestes List',
            'rules' => array('required','trim','min_size' => 1)
        )
    );

    function __construct(){
        parent::__construct();
    }


    function get_list($type = 'object'){
        $this->get();
        $status['count'] = 0; $status['list'] = array();
        foreach($this as $id => $st){
          if($type == 'array'){
              $status['list'][$st->id] = $st->name;
          }else{
              $status['list'][$st->id] = $st;
          }
        }

        return $status;
    }

    /**
     * @param bool $id
     * @return object list(id as semid,name,display_name,numeric_value,display_value,period_name,year_count,term_value,comments,structure_id,status,is_activated,item_id
     */
    function get_structure_items($id = false){
        if(!$id){
            $id = $this->id;
        }
        $sql = "SELECT sem.*,pgsem.id as item_id,pgsem.structure_id,pgsem.status,pgsem.is_activated FROM cis_program_semester_list as pgsem JOIN cis_semester as sem on sem.id = pgsem.semester_id where pgsem.structure_id = $id";

        $qr = new CustomQuery();
        $result = $qr->execute_query($sql);

        $status['count'] = $result->num_rows();
        $status['list'] = $result->result_object();

        return $status;
    }

    function addNew($data){
       $this->name = $data['semSt_name'];
        $this->display_name = $data['semSt_dname'];
        $this->code_name = $data['semSt_code'];
        $this->count = count($data['semSt_semesters']);
        $success = $this->save();
            if(!$success){
                if($this->valid){
                    $status['status'] = false;
                    $status['msg'] = "Record Failed To Save Retry";
                }else{
                    $status['status'] = false;
                    $status['msg'] = $this->form_error();
                }
            }else{
                 $cusQuery = new CustomQuery();
                $sql = 'INSERT INTO cis_program_semester_list(structure_id,semester_id,status,is_activated) values ';
                $total = count($data['semSt_semesters']);
                foreach($data['semSt_semesters'] as $id => $sId){
                    $sql .= "({$this->id }, {$sId},1,1 )";
                    if(($id + 1) != $total){
                         $sql .= ", ";
                    }else{
                        $sql .= ";";
                    }
                }

                $status['status'] = $this->count();
                $sql = trim($sql,',');

                $cusQuery->execute_query($sql);

                $status['msg'] = $this->html_sem_list(false,'title');;
            }

            return $status;

    }

    function formView(){

    }

    function updateSemester($newData,$stid){

    }

    function get_semesters_list(){
        $status['count'] = 0;
        $status['list']  = false;
        $this->order_by('name','asc')->get();

        foreach($this as $id => $ob){
            $status['count'] += 1;
            $status['list'][] = $ob;
        }

        return $status;
    }

    function get_not_this_semesters(){
        $status['count'] = 0;
        $status['list'] = false;

        $listO = new Semester();
        $list = $listO->get_not_semester_structures($this->id);

        return $list;
    }

    function get_structure_semesters($id = false){
        $semesters = new Semester();

        $list = $semesters->get_structure_semesters($id?$id:$this->id);
        return $list;
    }

    function html_sem_list($sysCoreObj,$drawtype = false){
        if($drawtype == 'title'){
            $info = array('viewtype'=>'li-tabbed','Object'=>$this);
             $html = $this->load->view('common/data/dt_semester_structure',$info,true);
        }else{
       $semesters = new Semester();
        $list = $semesters->get_structure_semesters($this->id);
          $html = "<h2 class='subtitle' ><small style='font-size:14px'>".$this->name." Semesters</small>&nbsp;</h2><ul class='list-unordered list-checked'>";
        if($list && $list['count']){

            foreach($list['list'] as $id => $semData):
                 $html .= "<li>" . $semData->name . "(" . $semData->display_name . ")<small> Year: " .$semData->year_count. "</small></li>";
                endforeach;
        }else{
            $html .= "<li class='warning'>Structure has No Semesters</li>";
        }
        $config = $sysCoreObj->common_view_data();
        $dataInfo = array(
            'targetCont'=> "#semester_structure-list-contents",
            'viewtype' => 'li',
            'itemid'=>$this->id,
            'profileInfo' => $config['userdata']['profile'],
            'access_level'=>$config['userdata']['access_level'],
            'itemtype' => 'semester_structure',
            'targetForm' => '#new-semester_structure-data',
            'otheritems' => '',
            'row_id'=> "#item-li-{$this->id}"
        );

        $controls = $this->load->view('common/data/item_controls',$dataInfo , true);

        $html .=  "</ul><br>". $controls ;
        }
      return $html ;
    }

    function form_error(){
        $errors = false;
         if(isset($this->error->name)){
             $errors['semSt_name'] = $this->error->name;
         }
        if(isset($this->error->display_name)){
            $errors['semSt_dname']= $this->error->display_name;
         }
        if(isset($this->error->code_name)){
            $errors['semSt_code']= $this->error->code_name;
         }
        if(isset($this->error->count)){
            $errors['semSt_semesters[]']= $this->error->count;
         }


    return $errors;
    }

} 
