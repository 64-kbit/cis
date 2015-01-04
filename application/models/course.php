<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/9/14
 * Time: 1:49 PM
 */

class Course extends DataMapper {
    var $table = 'cis_department_course';
    var $has_many = array(
        'programme'=>array(
            'class'=>'programme',
            'other_field'=>'programme',
            'join_other_as'=>'programs',
            'join_self_as' => 'course',
            'join_table'=>'cis_department_program_course'
        )
    );
    var $updated_field = 'last_modify';
    var $local_time = true;
    var $unix_timestamp = true;


    function __construct($id=null){
        parent::__construct($id);
    }



    function get_pg_course($id,$dp = false,$cm = false,$fc = false)
    {

    }

    function get_pg_course_list($pg,$mode){

    }

    function get_programme_list($cz){
        $pg = new ProgrammeCourse();
        $status =   $pg->get_not_course_programme($cz);
      return $status;
    }

    function get_course_programme($cz){
        $data = new ProgrammeCourse();
        $status = $data->get_course_programmes($cz);
        //var_dump($status);
      return $status;
    }


    function set_programm($pglist){

    }

    function get_course_list($type = 1,$dpid = false){
        if($dpid){
            $this->where("department_id",$dpid);
        }
        $this->get_iterated();
        $dp = new DpDepartment();
        $dp->get();
        $fc = new DpFaculty();
        $fc->get();
        $coursecat = new CourseCategory();
        $coursecat->get();
        foreach($dp as $d){
            $dpls[$d->id] = $d->name;
        }
        foreach($fc as $f){
            $fcls[$f->id] = $f->facult_name;
        }

        foreach($coursecat as $c){
            $catls[$c->id] = $c->stored;
        }




        // var_dump($this->all);die() ;
        $status['count'] = $this->result_count();
        foreach($this as $l => $it){
            $status['list'][$l]  = $type == 2?$it->stored:(array)$it->stored;
            $status['list'][$l]['dp_name'] = $dpls[$it->department_id];
            $status['list'][$l]['fc_name'] = $fcls[$it->faculty_id];
            $status['list'][$l]['cat_name'] = $catls[$it->category_id]->name;
            $status['list'][$l]['join_name'] = $catls[$it->category_id]->join_name;

        }
        return $status;
    }

    function get_course($id,$dp=false,$fc=false,$cm=false,$type=1){
        if($fc && $cm && $dp){
            $other = array('department_id'=>$dp,'faculty_id'=>$fc,'campus_id'=>$cm);
        }else{
            $other = array();
        }
       $this->db->where(array('id'=>$id) + $other);
       $result =  $this->db->get(db_tables('course_view'));
        if($type == 2){
            $dataArray =$result->row_object();
        }else{
            $dataArray =$result->row_array();
        }
        $status['status'] = true;
        $status['data'] = $dataArray;

        return $status;
    }

    function add_course($cz){
      if(is_array($cz)){
         $this->name = $cz['cz_name'];
          $this->code_name = $cz['cz_code'];
          $this->description = $cz['cz_description'];
          $this->date_started= $cz['cz_date'];;
          $this->faculty_id= $cz['fc_name'];;
          $this->campus_id= $cz['cm_name'];;
          $this->department_id= $cz['dp_name'];;
          $this->last_modify = date('Y-m-d H:i:s',time());
          $this->category_id = $cz['cz_category'];
          $this->status = 1;
          $this->deleted = 0;
          $this->save();
          $id = $this->id?$this->id:$this->db->insert_id();
          $pgCz = new ProgrammeCourse();
          $pgrme = new Programme();
          $pgSem = new ProgrammeSemesterStructure();
          $czcat = new CourseCategory();
          $pgcodes = new ProgramBaseCode();
          $counts = new ProgrammeCourseStat();
          $czcat->where('id',$cz['cz_category'])->get();

          if(isset($cz['course_programmes']) && is_array($cz['course_programmes'])){
              foreach($cz['course_programmes'] as $i => $pg){
                  $pgCz->where(array('course_id'=>$id,'programs_id'=>$pg))->get();
                  if($pgCz->result_count()) { continue ; }
                  $pgrme->where('id',$pg)->get();
                  $pgcodes->where(array('program_id'=>trim($pgrme->base_program_id) != false?$pgrme->base_program_id:$pgrme->id,'course_category_id'=>$cz['cz_category']))->get();
                  $pgSem->where(array('programs_id'=>$pg,'status'=>1,'is_current_structure'=>1))->get();

                   $pgcode = $pgcodes->code_name;
                   /* switch(strtolower( $pgrme->code)){
                        case 'od':
                            $pgcode = $czcat->base_code_2;
                            break;
                        case 'beng':
                            $pgcode = $czcat->base_code_1;
                            break;
                        case 'meng'  :
                        case 'ms':
                            $pgcode = $czcat->base_code_3;
                            break;
                        case 'gc':
                        default:
                        $pgcode = $pgrme->code;
                            break;
                    }

                    */

                  $pgData = array(
                      'course'=>$id,
                      'department'=>$cz['dp_name'],
                      'campus'=>$cz['cm_name'],
                      'faculty'=>$cz['fc_name'],
                      'program' => $pg,
                      'semester_structure_id' => $pgSem->id,
                      'programe_semester'=>$pgSem->structure_id,
                      'code'=> $pgcode  . '-'.  $cz['cz_code'],
                      'display_name'=> $pgrme->name . " ".  $czcat->join_name . " ". $cz['cz_name'] ,
                      'year_started'=> $cz['cz_date']
                  );

                  $pgCz->add_new($pgData,1);
              }
          }

          $status['status'] = true;
          $status['msg'] = $this->get_course($this->id,$cz['dp_name'], $cz['fc_name'], $cz['cm_name']);

          return $status;
      }else{
         return array('status'=>false,'msg'=>'Missing Input(s)');
      }
    }

    function update_course($id,$dp,$fc,$cm,$cz){
      //  var_dump($cz);
       $this->where(array('id'=>$id,'campus_id'=>$cm,'faculty_id'=>$fc,'department_id'=>$dp));
        $update = array(
        'name' => $cz['cz_name'],
        'code_name' => $cz['cz_code'],
       'description' => $cz['cz_description'],
        'date_started'=> $cz['cz_date'],
        'faculty_id'=> $cz['fc_name'],
        'campus_id'=> $cz['cm_name'],
        'department_id'  => $cz['dp_name'],
         'category_id' => $cz['cz_category'],
        'last_modify' =>date('Y-m-d H:i:s',time()),
       'status'  => 1,
        'deleted' => 0
        ) ;


        $this->update($update);
        $pgCz = new ProgrammeCourse();
        $pgrme = new Programme();
        $pgSem = new ProgrammeSemesterStructure();
        $czcat = new CourseCategory();
        $pgcodes = new ProgramBaseCode();

        $czcat->where('id',$cz['cz_category'])->get();

        if(isset($cz['course_programmes']) && is_array($cz['course_programmes'])){
        foreach($cz['course_programmes'] as $i => $pg){
            $pgCz->where(array('course_id'=>$id,'programs_id'=>$pg))->get();
            $action = 1;

            $pgrme->where('id',$pg)->get();
            $pgSem->where(array('programs_id'=>$pg,'status'=>1,'is_current_structure'=>1))->get();

            $pgcodes->where(array('program_id'=>$pgrme->id,'course_category_id'=>$cz['cz_category']))->get();
            $pgSem->where(array('programs_id'=>$pg,'status'=>1,'is_current_structure'=>1))->get();
            if($pgcodes->result_count() == 0){
                continue;
            }
            $pgcode = $pgcodes->code_name;


            /*
            switch(strtolower($pgrme->code)){
                case 'od':
                    $pgcode = $czcat->base_code_2;
                    break;
                case 'beng':
                    $pgcode = $czcat->base_code_1;
                    break;
                case 'meng'  :
                    case 'ms':
                    $pgcode = $czcat->base_code_3;
                    break;
                case 'gc':
                default:
                    $pgcode = $pgrme->code;
                    break;
            }
             */

            $pgData = array(
               'course'=>$id,
                'department'=>$cz['dp_name'],
                'campus'=>$cz['cm_name'],
                'faculty'=>$cz['fc_name'],
                'program' => $pg,
                'semester_structure_id' => $pgSem->id,
                'programe_semester'=>$pgSem->structure_id,
                'code'=> $pgcode  . '-'.  $cz['cz_code'],
                'display_name'=> $pgrme->name . " ".  $czcat->join_name . " ". $cz['cz_name'] ,
                'year_started'=> $cz['cz_date']
            );

            if($pgCz->result_count()) {
                $action = 2;
                $pgData['pg_id'] = $pgCz->id;
            }

            $pgCz->add_new($pgData,$action);
        }
        }
        $status['status'] = true;
        $status['msg'] = "Course & Course Programmes Successfully Updated";

    return $status;
    }

    function remove_course($id,$dp,$fc,$cm,$mode = 0){

        if($mode){
            $status['status'] = $this->delete();
            $status['msg'] = 'Course Permanently Deleted';
        }else{
            $this->where(array('id'=>$id,'campus_id'=>$cm,'faculty_id'=>$fc,'department_id'=>$dp))->update('deleted',1);
            $status['status'] = true;
            $status['msg'] = 'Course Temporarily Deleted';
        }

        return $status;

    }

    /**
     * Views
     */

    function drop_view($name,$dpid,$selected = false,$class = '',$id="",$other=""){
        $list  =$this->get_course_list(1,$dpid);
        $arrview = array();
        if($list['count']){
            foreach($list['list'] as $i => $pg){
                $arrview[$pg['id']] = $pg['name'] .  "(" . $pg['code_name'] . ") ";
            }
        }

        return form_dropdown($name,$arrview,$selected," $other class='$class' id='$id'");

    }
} 
