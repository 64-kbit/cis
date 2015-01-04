<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/12/14
 * Time: 9:40 AM
 */

class User extends DataMapper {
    var $table = 'cis_sys_user';
    var $has_many = array();
    var $validation = array(
        'login_id'=> array(
            'label'=>'User ID',
            'rules' => array('required')
        )
    );

    function __construct($id = null){
        parent::__construct($id);

    }

    function clear_students(){
        $sql = "SELECT usr.*,reg.registration_number FROM cis_sys_user as usr
                left join cis_student_registration_id as reg on reg.registration_number = usr.registration_number_id
                where usr.profile='student';";
        $result = $this->db->query($sql);
        foreach($result->result_array() as $rid => $row){
            if(!trim($row['registration_number'])){
                $this->where('id',$row['id'])->get();
                $this->delete();
            }
        }
        //var_dump($result->result_array());
    }

    function register_user_session($udata){
        unset($udata['password']);
        $this->session->set_userdata('login_data',$udata) ;
        $this->session->set_userdata('login_status',true) ;
        $this->session->set_userdata('is_logged_in',true);
        $this->session->set_userdata('login_mode',$udata['profile']);
        $this->session->set_userdata('xhr_session',md5('XnetSystems'));
        $this->session->set_userdata('access_level',$udata['profile']);

    }
    /**
     * Serialize the session data stored in the database,
     * store it in a new array and return it to the controller
     * @return array
     */
    function get_db_session_data()
    {
        $query = $this->db->select('user_data')->get('user_sessions');
        $user = array(); /* array to store the user data we fetch */
        foreach ($query->result() as $row)
        {
            $udata = unserialize($row->user_data);
            /* put data in array using username as key */
            $user['user_name'] = $udata['user_name'];
            $user['is_logged_in'] = $udata['is_logged_in'];
        }
        return $user;
    }

    /**
     * Store the new user's data into the database
     * @return boolean - check the insert
     */
    function create_member()
    {

        $this->db->where('user_name', $this->input->post('username'));
        $query = $this->db->get('membership');
        if($query->num_rows == 0){
            $new_member_insert_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email_addres' => $this->input->post('email_address'),
                'user_name' => $this->input->post('username'),
                'pass_word' => md5($this->input->post('password'))
            );
            $insert = $this->db->insert('membership', $new_member_insert_data);
            return $insert;
        }

    }//create_member

    function validate_user($user_name, $password)
    {
        $user = new User();
        $user->where('login_id',$user_name)->get();
        $msg['error'] = "failed";

        if($user->result_count() == 1)
        {
            //  $data = new stdClass();
            if($user->account_status > 0 && $user->deleted == 0){
                if($user->password == md5($password)){
                    $udata['id'] = $user->id;
                    $udata['profile'] = $user->profile;
                    $udata['login_id'] = $user->login_id; //(array) $user->stored;

                    $user->last_active = date_convert(time(),true);
                    $user->last_login = date_convert(time(),true);
                    $user->login_status = 1;
                    $user->save();
                    // var_dump($data);die();
                    $this->register_user_session($udata);
                    $msg['error'] = false;
                }else{
                    $msg['error'] = 'Incorrect Password entered';
                }
            } else{
                $msg['error'] = 'User Account is Disabled!';
            }
        }else{
            $msg['error'] = 'User  is not registered';
        }
        return $msg;
    }

    // Get the students information if the given user is a student
    function get_student_details($id_type = 'login'){
        $std = new StudentInfo();
        $stdata = new StudentDetails();
        $std->where('registration_number',$this->login_id)->get();
        $stdata->where('id',$std->details_id)->get();
        $ac =  $std->academic_year();
        $pg =  $std->programme();
        $student_id = array(
            'registration_id' => $std->registration_number,
            'department' => $std->department(),
            'programme' => $pg['name']."(".$pg['code'].(date("Y",strtotime($ac['year']))).")" ,
            'year' =>$ac['notation'],
            'current_class' => $std->current_class(),
            'registration_status' => $std->registration_status(),
            'first_name'=> $stdata->first_name,
            'middle_name' => $stdata->middle_name,
            'last_name' => $stdata->last_name,
            'email_address' => $stdata->email_address,
            'gender' => $stdata->gender
        );
        if($std->result_count()){
            return $student_id;
        }else{
            return false;
        }
    }

    function get_about_me(){
        $pf = false;
        switch($this->profile){
            case 'student':
                $pf= $this->get_student_details();
                $pf['profile_title'] = $pf['programme'];
                //var_dump($pf);
                break;
            case 'department':
            case 'lecture':
            case 'teacher':
            case 'coordinator':
            $pf= $this->get_department_user_details();
            $pf['profile_title'] = $pf['name'];
                break;
            default:
                $pf['profile_title'] = user_profile(false,$this->profile) ;

        }

        return $pf;
    }

    function get_department_user_details(){

        $dp = new DpDepartment($this->department_id);
        return (array) $dp->stored;
    }

    function add_new_student_user($data,$acc=0){
        $this->login_id = $data['username'];
        $this->registration_number_id = $data['username'];
        $this->password = md5($data['password']);
        $this->email_address = $data['email_address'];
        $this->is_student = 1;
        $this->fname = $data['first_name'];
        $this->lname =$data['last_name'];
        $this->mname = $data['middle_name'];
        $this->is_department_user = 0;
        $this->is_other_department = 0;
        $this->acc_activate_code = $data['activation_code'];
        $this->gender = $data['gender'];
        $this->deleted = 0;
        $this->profile = 'student';
        $this->dt_registered = date("Y-m-d H:i:s",time());
        $this->account_status = $acc;
        $success = $this->save_as_new();

        if(!$success){
            if($this->valid){
               return array('error'=>true,'message'=>"Failed to Save to Database");
            }else{
                return array('error'=>true,'message'=>"One or More of required Info is missing");
            }
        }else{
            return array('error'=>false,'message'=>'User Successfully Added');
        }

    }

    function update_user($userid,$data,$level,$profile,$dp=null){

        $this->where('id',trim($userid))->get();
        $valid = false;
        if($this->result_count() == 1){
            $this->login_id = trim($data['login_id']);
            $this->fname = trim(ucfirst($data['first_name']));
            $this->lname = trim(ucfirst($data['last_name']));
            if(trim($data['password']) != 'default-pass'){
                $this->password = md5(trim($data['password']));
            }
            if($profile == 'department' || $profile == 'teacher'){

                $this->is_department_user = 1;
            }
            $this->department_id = $data['department'];
            $this->email_address = trim(strtolower($data['email']));
            $this->access_level = $level;
            $this->profile = $profile;
            $valid = $this->save();
           // $this->account_status = $data['activate_account'];
        }else{
           return $this->add_new_user($data,$level,$profile,$dp,1);
        }
         $status['error']=$valid;
        if($valid){
            $status['message'] = "User Information Updated Successfully";
        }else{
            $status['message'] = "Failed to update Information! Retry Again!";
        }

        return $status;
    }

    function add_new_user($data,$level,$profile,$dp = null,$active = 0){
        $this->where('login_id',trim($data['login_id']))->get();
        if($this->result_count() == 0){
        $this->login_id = trim($data['login_id']);
        $this->password = md5(trim($data['password']));
        $this->email_address = trim(strtolower($data['email']));
        $this->is_student = 0;
        $this->fname = trim(ucfirst($data['first_name']));
        $this->lname = trim(ucfirst($data['last_name']));
            if($profile == 'department' || $profile == 'teacher'){
                $this->is_department_user = 1;
            }
            $this->department_id = $dp;//$data['department'];
        $this->access_level = $level;
        $this->gender = $data['gender'];
        $this->deleted = 0;
        $this->profile = $profile;
        $this->dt_registered = date("Y-m-d H:i:s",time());
        $this->account_status = $active;
        $success = $this->save_as_new();
            if(!$success){
                if($this->valid){
                    $status= array('error'=>true,'message'=>"Failed to Save to Database");
                }else{
                    $status= array('error'=>true,'message'=>"One or More of required Info is missing");
                }
            }else{
                $udata = (array) $this->stored;
                $status= array('error'=>false,'message'=>$udata);
            }

        }else{
            $status = array('error'=>true,'message'=>'User Exists');
        }

        return $status;
    }

    function get_user_info($lid,$arry = false){
        $this->where('login_id',$lid)->get();
        if($arry){
            return  (array) $this->stored;
        }else{
            return $this->stored;;
        }

    }

    function get_list($filter = false,$limit = 10,$dp = false){
        $conditions = " where ";
        if($dp){

            $conditions .= "  (usr.department_id = " . $dp . " or pgcz.department_id = ".$dp." ) AND ";
        }else{
            if(!$dp){
                $conditions = "";
            }
           // $conditions = "";
        }
        $this->clear_students();
        if(!trim($filter)){
            $sql = "SELECT usr.*,pgcz.code_name as std_programme, pgcz.display_name st_course,dp.name as dp_name FROM cis_sys_user as usr
      left join cis_department_list as dp on dp.id = usr.department_id
      left join cis_student_registration_id as stdid on usr.login_id = stdid.registration_number
      left join cis_department_program_course as pgcz on pgcz.course_id = stdid.course_id and pgcz.programs_id = stdid.programme_id " . trim($conditions,"AND ") . " order by usr.profile asc limit  $limit";
        }else{

            $gender = strtolower($filter)=='female'?'f':(strtolower($filter)=='male'?'m':"");

            $sql = "SELECT usr.*,pgcz.code_name as std_programme, pgcz.display_name st_course,dp.name as dp_name FROM cis_sys_user as usr
      left join cis_department_list as dp on dp.id = usr.department_id
      left join cis_student_registration_id as stdid on usr.login_id = stdid.registration_number
      left join cis_department_program_course as pgcz on pgcz.course_id = stdid.course_id and pgcz.programs_id = stdid.programme_id
      $conditions   usr.fname like '$filter' or  usr.mname like '%$filter%'
      or usr.lname like '%$filter%' or usr.profile like '%$filter%'
      or usr.gender like '$gender' or usr.email_address like '%$filter%'
      or dp.name like '%$filter%'
      or dp.code like '%$filter%'
        or pgcz.code_name like '%$filter%'
          or pgcz.display_name like '%$filter%'
      or usr.email_address like '%$filter%'
      limit  $limit  ";

        }
        //echo ($sql);
        $result = $this->db->query($sql);
        $status['count'] = $result->num_rows();
        $status['list'] = $result->result_array();
        $status['alphabets'] = false;
        $letters = range('A','Z');
        foreach($letters as $lt){
            $count = 0;
           foreach($status['list'] as $id=>$usr) {
               if(preg_match("/^".strtolower($lt)."/",strtolower($usr['fname'])) || preg_match("/^".strtolower($lt)."/",strtolower($usr['mname'])) || preg_match("/^".strtolower($lt)."/",strtolower($usr['lname']))){
                  $count += 1;
               }
            }

            $status['alphabets'][$lt]['count'] = $count;
        }

        return $status;
    }

    function get_categories(){

    }

    function get_alphabets(){
        $letters = range('A','Z');
        $summary = array();

        foreach($letters as $letter){
             //$summary[$letter][] =
        }
    }

    function draw_alphabets(){

    }
} 
