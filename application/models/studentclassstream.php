<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php

class studentClassStream extends DataMapper {
   public $table = 'cis_student_class_stream';
    function __construct($id = null){
        parent::__construct($id);
    }


    function add_stream($data){
         $strm = new ClassStream();
        $strm->where('id',$data['stream'])->get();
        $this->where(array(
            'semester_id'=>$data['semester'],
            'stream_id'=>$data['stream'],
            'academic_year_id'=>$data['acYear'],
            'ref_course_id'=> $data['course_id'],
            'programs_id'=>$data['program']
            )
        )->get();
        if($this->result_count() > 0) return true;
         $this->semester_id = $data['semester'];
         $this->stream_id = $data['stream'];
        $this->capacity = $strm->students_limit;
        $this->academic_year_id = $data['acYear'];
        $this->ref_course_id = $data['course_id'];
        $this->dp_course_id = $data['course'];
        $this->code_name = $data['class_code'];
        $this->department_id = $data['department'];
        $this->campus_id = $data['campus'];
        $this->faculty_id = $data['faculty'];
        $this->programs_id = $data['program'];
        $this->ref_pg_sem_structure_id = $data['sem_structure_id'];
        $this->semester_structure_id = $data['semester_structure'] ;
        $this->class_name = $data['class_name'] ;
        $this->status = 1;
        $this->is_enabled = 1;
        $this->class_year = $data['class_year'];

       // var_dump($data);
        $success = $this->save_as_new();

        if($success){
            return $this->valid;
        }else{
            return false;
        }

    }

    function get_streams($dpid = false){

        if($dpid){
            $sql = "SELECT * FROM class_streams where department_id = $dpid";
        }else{
            $sql = "SELECT * FROM class_streams";
        }
        $result = $this->db->query($sql);
        if($result->num_rows > 0){
          return $result->result_array();
        }else{
            return array();
        }
    }


    function count_students($czId = null){
       $students = 0;

        if($czId > 0){
           $sql = "SELECT count(";
        }else{

        }

        return $students;
    }

    function create_class_code($y,$pgid,$cz,Course &$zc){
        $year = new AcademicYear();
        $year->where('id',$y)->get();
        $pg = new Programme($pgid);

       // var_dump($pg->stored);
       // $coursecat = new CourseCategory();
        if(trim($pg->parent_program_id)){
            $base = $pg->get_base_programme($pgid);  // $pgcz->programs_id  $pgcz->course_id
            $bid = $base->id;
        }else{
            $bid = $pg->id;// trim($pg->parent_program_id)?
        }
        $zc->where('id',$cz)->get();
        $pgcodes = new ProgramBaseCode();
        $pgcodes->where(array('course_category_id'=>$zc->category_id,'program_id'=>$bid))->get();
       // var_dump($pgcodes->stored);

       // $coursecat->where('id',$zc->category_id)->get();
        $pgz = $pgcodes->code_name;
        /*switch(strtolower($pgz)){
            case 'gc':
                $stp = 4;
                break;
            case 'degree':
                $pgz = $pgcodes->code_name;
                $stp = 3;
                break;
            case 'meng' :
            case 'ms':
                $pgz = $pgcodes->code_name;
                $stp = "";
                break;
            default:
                $pgz = $pgcodes->code_name;
                break;
        }   */
       // var_dump($coursecat);
        $coursecode = strtoupper( $pgz . substr($year->start_year,-2,2)) .  '-'.$zc->code_name  ;

        return $coursecode;
    }

    function multiple_insert($data){
        $semesters = new Semester();
        $pgcz = new ProgrammeCourse();
        $pgme = new Programme();
       // $strm = new ClassStream();
        $acYear = new AcademicYear();
        $counts = new ProgrammeCourseStat();
        $insertStatus = array('count'=>0,'data'=>array('courses[]'=>""),'errors'=>false,'message'=>'good','error'=>false);
        $acYear->where('id',$data['academic_year'])->get();
        if(isset($data['programmes']) && isset($data['courses']) && isset($data['ac_streams']) & isset($data['academic_year'])){
            foreach($data['programmes'] as $pg){
               // var_dump($data['programmes']);
                $parents = $pgme->get_parent_programmes($pg, $acYear->start_year);
              //  var_dump($parents);die();
              foreach($data['courses'] as $cz){

                  foreach($parents as $id => $parentPg){
                      $zc = new Course($cz);
                        $pgcz->where(array('course_id'=>$cz,'programs_id'=>$pg))->get();
                    if($pgcz->result_count()){
                     $classcode = $this->create_class_code($data['academic_year'],$pg,$cz,$zc);

                    $pgcz->where(array('programs_id'=>$parentPg->id,'course_id'=>$cz))->get();
                    $sem = $semesters->get_structure_semesters($pgcz->pg_sem_structure_id);
                    if($sem['count'] == 0) continue;
                    foreach($sem['list'] as $semester){
                        foreach($data['ac_streams'] as $strm){
                           $insertData = array(
                               'semester'=> $semester->id ,
                               'stream'=>$strm ,
                               'acYear'=> $parentPg->academic_year ,
                               'course_id'=> $pgcz->id,
                               'course'=> $pgcz->course_id,
                               'department'=> $pgcz->department_id ,
                                'class_code' => $classcode,
                               'campus'=> $pgcz->campus_id,
                               'faculty'=> $pgcz->faculty_id ,
                               'program'=> $pgcz->programs_id ,
                               'sem_structure_id'=> $pgcz->pg_sem_structure_id,
                               'semester_structure'=> $pgcz->semester_structure_id,
                               'class_name' =>  $pgcz->display_name ."(". $pgcz->code_name .")"  ,
                               'class_year' => $parentPg->level_year
                           );
                            $insertStatus['count'] += 1;
                            $insertStatus['data'][] = array('status'=>$this->add_stream($insertData),'class'=>$insertData['class_name'] . $semester->name) ;
                        }
                    }
                  }else{
                    $pgme->where('id',$pg)->get();
                        $insertStatus['errors'] = true;
                        $insertStatus['error'] = 'extras';

                        $insertStatus['message'] .= 'Failed to add Programme '. $pgme->name . "  " . $zc->name  .". Courses does not exist!!<br>";
                        $insertStatus['data']['courses[]'] .= 'Failed to add Programme '. $pgme->name . "  " . $zc->name  .". Courses does not exist!!<br>";
                     //$insertStatus['data'][] = array('status'=>false,'class'=>'Failed to add Programme '. $pgme->name . "  " . $zc->name  .". Courses does not exist!!");
                  }
               // }
              }
            }


            }
        }

        $counts->generate_counts($acYear->id);

        return $this->generate_insert_status($insertStatus);
    }

    function generate_insert_status($data){

       return $data;
    }

    function update($data){

    }
} 
