<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/22/14
 * Time: 10:22 AM
 */

class ProgrammeCourse extends DataMapper {
    public $table = 'cis_department_program_course';
    function __construct($id = null){
        parent::__construct($id);
    }

    /**
     * Get all courses that have this program in them
     * @param integer $pg specify program  id
     * @param bool $rtype if to return data as objects(true) or an array(leave blank)
     * @return array|object mixed containing programs list(id,department_id,campus_id,faculty_id,programs_id,code_name,course_code);
     */
    function get_programme_courses($pg,$rtype = false){
        $qryB = new CustomQuery();
        $sql = "SELECT dp_cz.*,course.code_name as course_code,course.name as course_name
         FROM cis_department_program_course as dp_cz
         JOIN cis_department_course as course on dp_cz.course_id = course.id
         where dp_cz.programs_id =  $pg";
        $data =  $qryB->execute_query($sql);
       if($rtype){
           $result['list'] =$data->result_object();
       }else{
         $result['list'] =$data->result_array();
        }
        $result['count'] = $data->num_rows();
        return $result;
    }

    function get_not_course_programme($cz){

        $qryB = new CustomQuery();
        $data =  $qryB->execute_query("SELECT dp_pg.id ,dp_pg.parent_program_id,dp_pg.name,dp_pg.display_name,dp_pg.code,dp_pg.nta_level,dp_pg.is_stop_level,dp_pg.level_year,dp_pg.year_started as programme_year FROM cis_department_programs as dp_pg where deleted = 0;");
        $result['count'] = 0;
        $result['list'] = false;
        foreach($data->result_array() as $id => $pg ){
            if(!$this->course_has_programme($cz,$pg['id'])){
                $result['count'] += 1;
                $result['list'][] = $pg;
            }

        }
      //  $result['count'] = $data->num_rows();
        return $result;
    }


    function get_semesters(){
       $sem = new Semester();
    }

    function course_has_programme($cz,$pg){
        $czProgrammes = $this->get_course_programmes($cz);
        $status = false;
        foreach($czProgrammes['list'] as  $dt){

            if($dt['programs_id'] == $pg){
                $status = true;
                break;
            }
        }

       return $status;
    }

    function get_course_programmes($cz){
        $qryB = new CustomQuery();
       $data =  $qryB->execute_query("SELECT dp_cz.id,dp_cz.department_id,dp_cz.campus_id,dp_cz.faculty_id,dp_cz.programs_id,dp_cz.code_name,dp_pg.parent_program_id,dp_pg.name,dp_pg.display_name,dp_pg.code,dp_pg.nta_level,dp_pg.is_stop_level,dp_pg.level_year,dp_pg.year_started as programme_year,dp_pg.id as programme,dp_cz.year_started FROM cis_department_program_course as dp_cz JOIN cis_department_programs as dp_pg on dp_cz.programs_id = dp_pg.id and dp_cz.course_id where dp_cz.course_id =  $cz");

        $result['list'] =$data->result_array();
        $result['count'] = $data->num_rows();

        return $result;
    }

    function insert_new($postinput){
        // var_dump($postinput);
       // die();
        $status = array('errors'=>false,'data'=>'<tr><td>##</td><td><span class="badge badge-warning">Information not Added!! Use the Program & Courses  Menu!!</span></td><td>--</td><td>-</td></tr>');
        return $status;
    }

    function add_new($data,$action=1){
        if($action == 2){
            $updateData = array(
                'course_id' => $data['course'],
                'department_id'=> $data['department'],
                'campus_id'=> $data['campus'],
                'faculty_id'=> $data['faculty'],
                'semester_structure_id' => $data['semester_structure_id'],
                'programs_id'=> $data['program'],
                'pg_sem_structure_id'=> $data['programe_semester'],
                'code_name'=> $data['code'],
                'year_started'=> $data['year_started'],

            );
            $this->where('id',$data['pg_id']) ;
            $this->update($updateData);
        }else{
            $this->course_id = $data['course'];
            $this->department_id = $data['department'];
            $this->campus_id = $data['campus'];
            $this->faculty_id = $data['faculty'];
            $this->semester_structure_id = $data['semester_structure_id'];
            $this->programs_id = $data['program'];
            $this->pg_sem_structure_id = $data['programe_semester'];
            $this->code_name = $data['code'];
            $this->display_name = $data['display_name'] ;
            $this->year_started = $data['year_started'];
            $this->date_created = date("Y-m-d H:i:s",time()) ;
            $this->save();
        }

    }

    function update_pgcourse($id,$newdata){

    }

    function get_list($dp = false){
        $status['count'] = 0;
        $status['list'] = false;
        if($dp){
            $this->where('department_id',$dp);
        }
        $this->get();
        foreach($this as $pg){
            $status['count'] += 1;
            $status['list'][] = $pg;
        }

        return $status;
    }
} 
