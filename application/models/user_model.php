<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php

class User_model extends CI_Model {

    /**
    * Validate the login's data with the database
    * @param string $user_name
    * @param string $password
    * @return void
    */
   // public $details = array();

    function _construct(){

        //$this->details = $this->get_userdata();

    }

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
    function get_student_details($student_id,$id_type = 'login'){
            $std = new StudentInfo();
        $stdata = new StudentDetails();

         $std->where('registration_number',$student_id)->get();
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

    function get_department_user_details($dep_id,$type = false){

        if($type){
            $sql = "SELECT * FROM other_departments_list WHERE dp_id={$dep_id}";
        }else{
            $sql = "SELECT * FROM academic_departments_list WHERE dp_id={$dep_id}";
        }
        $result= $this->db->query($sql);

        if($result->num_rows()){
            $dpdata = $result->row_array();

            return $dpdata;
        }
        else{
            return false;
        }
    }
    //** create a user session for storing login credentials */
    function register_user_session($udata){
        unset($udata['password']);
        $this->session->set_userdata('uid',$udata['id']) ;
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

        if($query->num_rows > 0){

		}else{
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


    // check if the token matches with user who sent the requiest
    function check_token($token){

        return true;
    }

    // Change user password
    function change_user_password($userid,$newpassword){

        return true;
    }
    // check is email is registered or associated with a particular user/student
    function validate_user_email($email_address){

        $message = array('error'=>false);
        return $message;
    }

    function get_userdata($userid){

        if($userid == false){
            $userid = $this->session->userdata('login_data');
            $id = $userid['login_id'];
        }else{
            $id = $userid;
        }

        $user = new User();
        $userdata = $user->get_user_info($id,true);//$this->session->userdata('login_data');
       // $userdata['user_info'] = $this->session->userdata('user_info');

        switch(strtolower($userdata['profile'])){
            case 'student':
                $userdata['user_info'] = $this->get_student_details($userdata['login_id'],'login');
                $userdata['user_info']['profile_title'] =   $userdata['user_info']? $userdata['user_info']['programme']:'Department not Set';
                break;
            case 'department':
            case 'teacher':
            $userdata['user_info'] = $this->get_department_user_details($userdata['department_id']);
            $userdata['user_info']['profile_title'] =   $userdata['user_info']? $userdata['user_info']['name']:'Department not Set';
            break;
            default:
                $userdata['user_info'] = array('none');
                $userdata['user_info']['profile_title'] = 'College Administration and Management';

                break;
        }
        return $userdata;
    }

        function get_allusers(){
            $list = false;
            $sql = "
            SELECT * FROM sys_users as usr join user_roles as ur on ur.id = usr.role
            LEFT JOIN member_details as md on md.sn = usr.user_details
        ";

            $d = $this->db->query($sql);
            $list['total'] = $d->num_rows;
            if($d->num_rows){
                  $list['list'] = $d->result_array();
            }

            return $list;

        }

    function get_Uroles($mode = false,$col = false){
        $list = $this->db->get('user_roles');
        $roles = array();
        $roles = $list->result_array();
        $rd = array();


        if($mode==0){
            if($col == 1){
               return $roles;
            }else{
               foreach($roles as $rId => $rl){
                   $rd[$rl['id']] = $rl['role_title'];
               }

                return $rd;
            }
        }else{
            return $roles[0][$col];
        }
    }
}

?>
