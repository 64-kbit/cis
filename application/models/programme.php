<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by oau.
 * User: admin
 * Date: 9/2/14
 * Time: 2:00 AM
 */

class Programme extends DataMapper {
    var $table = 'cis_department_programs';
    var $has_many = array(
        'semesterstructure'=>array(
            'class'=>'semesterstructure',
            'other_field'=>'programme',
            'join_other_as'=>'structure',
            'join_self_as'=>'programs',
            'join_table'=>'cis_program_semester_structure'),
        'course'=>array(
            'class'=>'course',
            'other_field'=>'programme',
            'join_other_as'=>'course',
            'join_self_as' => 'programs',
            'join_table'=>'cis_department_program_course'
        )
    );
    function __construct($id = null){
        parent::__construct($id);
    }


    function  get_programme($pgid){
        $pg = array('status'=>0,'data'=>false);
         if($pgid){
             $this->db->where('cis_department_programs.id',$pgid);
             $this->db->join('cis_program_semester_structure',"cis_program_semester_structure.programs_id = cis_department_programs.id  AND cis_program_semester_structure.is_current_structure = 1",'left');
             $result = $this->db->get('cis_department_programs');
             $pg['status'] = $result->num_rows();
             $pg['data'] = $result->row_array();
         }
        return $pg;
    }


    function get_programme_list($pgid = false){
        $list = array('count' => 0,'list'=>false);
        $result =   $this->db->get(db_tables('programme_view'));
         if($result->num_rows()){
             $list['count'] = $result->num_rows();
             $list['list'] = $result->result_array();
         }

        return $list;
    }


    function add_programme($data){
        $status = array('status' => false,'msg'=>false);
      if(is_array($data)){
         $insert = array(
            'name'=>$data['pg_name'],
             'display_name'=>$data['pg_dname'],
             'code'=>$data['pg_code'],
             'campus_id'=>$data['pg_campus'],
             'dt_added'=>date('Y-m-d',time()),
             'year_started' => $data['pg_start_year'],
             'deleted' => 0,
             'parent_program_id'=>$data['pg_parent'] == 0?NULL:$data['pg_parent'],
             'nta_level'=>$data['pg_nta_level'],
             'code_no'=>$data['pg_code_no'],
             'is_stop_level'=>$data['pg_is_last'],
             'level_year'=>$data['pg_level_year'],
             'base_program_id'=>$data['pg_base']
         );

         // $this->db->trans_start();
          $result = $this->db->insert(db_tables('programme_table'),$insert) ;
          $pgid = $this->db->insert_id();
        //  $this->db->trans_complete();
          $pgStr = new ProgrammeSemesterStructure();
          $pgStr->add_new($pgid,$data['pg_semester_structure']);
          if($result){
              $status['status'] = $pgid;
              $status['msg'] = $this->get_programme($pgid) ;
          }else{
              $status['msg'] = 'Failed To Insert';
          }
      }

        return $status ;
    }

   // function get_equivalent_next_class(){
    //    $this->where('')
   // }

    function set_programme_parent($pgid,$parent){
        if($pgid && isset($parent)){
            $this->db->where('id',$pgid);
            $this->db->update(db_tables('programme_table',array('parent_program_id'=>$parent)));
        }
    }

    function get_parent_programmes($pg,$acYear){
        $aY = new AcademicYear();
        $aY->where("start_year",$acYear)->get();

        $this->where('id',$pg)->get();
        $parents = array();
        $programe = new stdClass();
        $programe->id = $this->id;
        $programe->name = $this->name;
        $programe->code = $this->code;
        $programe->nta_level = $this->nta_level;
        $programe->level_year = $this->level_year;
        $programe->code_no = $this->code_no;
        $programe->academic_year = $aY->id;
        $programe->year_notation = $aY->notation;
        $count = 1;
        $parents[$count] = $programe;
       // $aY->where("start_year",$acYear + 1)->get();
        while($this->parent_program_id != null){
            $acYear = $acYear + 1;
            $aY->where("start_year",$acYear)->get();
            if($aY->result_count() == 0){
                break;
            }
            $count += 1;
            $programe = new stdClass();
            $this->where('id',$this->parent_program_id)->get();
            $programe->id = $this->id;
            $programe->name = $this->name;
            $programe->code = $this->code;
            $programe->nta_level = $this->nta_level;
            $programe->level_year = $this->level_year;
            $programe->academic_year = $aY->id;
            $programe->code_no = $this->code_no;
            $programe->year_notation = $aY->notation;
            $parents[$count] = $programe;
        }


        return $parents;
    }

    function get_base_programme($id = null){
       if(is_numeric($id)){
           $this->where('id',$id)->get();
       }

        $custome = new CustomQuery();
       $result = $custome->execute_query("SELECT base.* FROM cis_department_programs as pg join cis_department_programs as base on pg.base_program_id = base.id where pg.id= $this->id") ;
        return $result->num_rows() >0?$result->row():$this;
    }

    function update_programme($id,$newdata){
        $status = array('status' => false,'msg'=>false);
        if($id && is_array($newdata)){
            $insert = array(
                'name'=>$newdata['pg_name'],
                'display_name'=>$newdata['pg_dname'],
                'code'=>$newdata['pg_code'],
                'campus_id'=>$newdata['pg_campus'],
                'year_started' => $newdata['pg_start_year'],
                'deleted' => 0,
                'parent_program_id'=> ($newdata['pg_parent'] == 0)?NULL:$newdata['pg_parent'],
                'nta_level'=>$newdata['pg_nta_level'],
                'code_no'=>$newdata['pg_code_no'],
                'is_stop_level'=>$newdata['pg_is_last'],
                'level_year'=>$newdata['pg_level_year'],
                'base_program_id'=>$newdata['pg_base']
             );

            $this->where('id',$id);
           // $this->trans_start();
            $result = $this->update($insert) ;

            $pgid = $id;// $this->db->insert_id();

            $pgStr = new ProgrammeSemesterStructure();

            $pgStr->add_new($pgid,$newdata['pg_semester_structure']);
            $pgCourse = new ProgrammeCourse();
            // Add programme pre requisites
            $pgpre = new ProgrammePre();

            foreach($newdata['pg_pre'] as $id => $pre){
                 $pgpre->add_programme($pgid,$pre);
            }
            if(isset($newdata['currpre'])){
                // find who is to be removed
                $pretoremove = array_diff($newdata['currpre'],$newdata['pg_pre']);
              // var_dump($pretoremove);die();
            foreach($pretoremove as $id => $pre){
                $pgpre->remove_pg_pre($pgid,$pre);
            }
            }

            $pgCourse->where('programs_id',$pgid);
            $pgCourse->update(array('pg_sem_structure_id'=>$pgStr->structure_id,'semester_structure_id'=>$pgStr->id));
           // $this->trans_complete() ;
            if($result){
                $status['status'] = true;
                $status['msg'] = 'Update Successfull' ;
            }  else{
                $status['msg'] = 'Failed To Insert';
            }
        }
            //var_dump($status);
        return $status ;
    }

    function remove_programme($id,$mode=0){
       if($mode){
            $status['status'] = $this->delete();
           $status['msg'] = 'Item Permanently Deleted';
       }else{
           $this->where('id',$id)->update('deleted',1);
           $status['status'] = true;
           $status['msg'] = 'Item Temporarily Deleted';
       }

        return $status;
    }

    function get_semesters(){

    }

    function add_semester_structure(){

    }


    function get_courses_not_this($cz){

        $this->include_related('course');
        $this->not_like('id',$cz);
        $this->get();
        $status['count'] = 0;
        $status['list']  = false;
        foreach($this->get() as $id=> $dt){
            $status['count'] += 1;
            $status['list'][] = $dt;
        }

      //  var_dump($status);
    }

    function current_semester(){
        $todate = date("Y-m-d h:i:s",time());
        $pgid = $this->id;

        $sql = "SELECT sem.*,event.start_date,event.end_date,event.event_type,se.name,se.display_value,se.display_name,se.period_name,se.year_count,se.numeric_value FROM cis_program_semester_structure as pgs
         JOIN cis_college_callender_semester as sem on sem.sem_structure_id = pgs.structure_id
         JOIN cis_college_callender_event as event on event.id = sem.event_id
         JOIN cis_semester as se on se.id = sem.semester_id
         where event.start_date <= '$todate' and event.end_date >= '$todate' and pgs.programs_id = $pgid  and pgs.is_current_structure = 1
         group by se.id order by se.numeric_value asc ";
        $result = $this->db->query($sql);
        return $result->row_object();
    }

    function get_courses($cz){



        //var_dump($cz);
    }

    /**
     * Views
     */

    function programs_drop_view($name,$selected = false,$class = '',$id="",$other=""){
       $list  =$this->get_programme_list();
        $arrview = array();
        if($list['count']){
              foreach($list['list'] as $i => $pg){
                  $arrview[$pg['id']] = $pg['name'] .  "(" . $pg['code'] . ") ";
              }
           }

        return form_dropdown($name,$arrview,$selected," $other class='$class' id='$id'");

    }

} 
