<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
class Admin extends  CI_Controller {

        function __construct(){

        parent:: __construct();
            $this->load->model("System_core");
            $this->load->model("User_model");
            $this->load->model("profile_data") ;
            $this->load->model("department") ;

            //$this->load->library('form_validation_error');
//var_dump($this->session->userdata);die();
//var_dump($this->session->userdata);die();
          if(!$this->login_status() && !$this->allowed_access()){
              if($this->input->is_ajax_request()){
                  $data =  $this->System_core->common_view_data(); ;
                  echo $this->load->view('ajax_login',$data,true);
                  die();
              }else{
                  redirect(base_url()."login");
              }
        }else{

        }
    }

    function allowed_access(){
         $login =   $this->session->userdata('login_data');
        if($login){
        if($login['profile'] == 'student'){
            return false;
        }else{
            return true;
        }   }else{

            return false;
        }
    }

    function index($mode = false){

        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] ='System Home ' . " | ".  $data['sys_name'] ;;
        $data['jsfiles'] = 'login_js';
        $luri = ($data['uri'][1]);
        switch($luri){
            case 'admission':
                $data['currentBase'] = 'admission/dashboard';
                break;
            case 'department':
                $data['currentBase'] = 'department/dashboard';
                break;
            case 'accommodation':
                $data['currentBase'] = 'accommodation/dashboard';
                break;
            default:
                $data['currentBase'] = $luri.'/dashboard';
                break;
        }
         $data['current_uri'] = 'admin';
        $this->load->view('tpl/base',$data);
    }

    /**
     *
     */
    function examinations($pg =false){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] ='System Home ' . " | ".  $data['sys_name'] ;;
        $data['jsfiles'] = 'login_js';
        switch($pg){
            case 'list':
                $data['currentBase'] = 'teacher/exam_list';
                break;
            case 'results':
                $data['currentBase'] = 'teacher/exam_result';
                break;
            default:
                $data['currentBase'] = 'page_error';
                break;
        }
        $data['current_uri'] = 'admin';
        $this->load->view('tpl/base',$data);
    }

    function teacher_assignment($pg =false){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] ='System Home ' . " | ".  $data['sys_name'] ;;
        $data['jsfiles'] = 'login_js';
        switch($pg){
            case 'students':
                $data['currentBase'] = 'teacher/student_list';
                break;
            case 'modules':
                $data['currentBase'] = 'teacher/module_list';
                break;
            default:
                $data['currentBase'] = 'page_error';
                break;
        }
        $data['current_uri'] = 'admin';
        $this->load->view('tpl/base',$data);
    }

    function teacher_background($pg = false){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] ='System Home ' . " | ".  $data['sys_name'] ;;
        $data['jsfiles'] = 'login_js';
        switch($pg){
            case 'basic':
                $data['currentBase'] = 'teacher/background_basic';
                break;
            case 'profession':
                $data['currentBase'] = 'teacher/background_profession';
                break;
            default:
                $data['currentBase'] = 'page_error';
                break;
        }
        $data['current_uri'] = 'admin';
        $this->load->view('tpl/base',$data);
    }


    function academic_manage($page = false){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] ='System Home ' . " | ".  $data['sys_name'] ;;
        $data['currentBase'] = 'exam/'. ($page?$page."_view":'page_error');
        $data['current_uri'] = 'admin';
        $this->load->view('tpl/base',$data);
    }

    function academic_module($page = false){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] ='System Home ' . " | ".  $data['sys_name'] ;;
        $data['currentBase'] = 'department/'. ($page?$page."_view":'module_base');
        $data['current_uri'] = 'admin';
        $this->load->view('tpl/base',$data);
    }

    function manage_teacher($page = false){
        echo $page;
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] ='System Home ' . " | ".  $data['sys_name'] ;;
        $data['currentBase'] = 'department/'. ($page?$page."_view":'teacher_base');
        $data['current_uri'] = 'admin';
        $this->load->view('tpl/base',$data);
    }

    function search(){
        $sourcePage = $this->input->post('source_page');
        redirect(base_url().$sourcePage);
    }

    function settings(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] ='Configurations Management' . " | ".  $data['sys_name'] ;
        $data['jsfiles'] = 'login_js';
        $data['currentBase'] = 'common/system_info';

        $this->load->view('tpl/base',$data);
    }

    function program_course($page){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['pg_title'] = 'Programmes and Courses Management' . " | ".  $data['sys_name'] ;
        $data['jsfiles'] = 'login_js';
       // $data['userdata'] = $this->User_model->get_userdata($this->session->userdata['login_data']['login_id']);
        $data += array(
            'dp_list' => $this->department->get_department_list('academic'),
            'dp_list_other' => $this->department->get_department_list('other_dp'),
            'fc_list' => $this->department->get_faculty_list(false),
            'campus_list' => $this->department->get_campus_list()
        );
         $data['showcontrols'] = true;
        //$this->load->model('Course');
        $course = new Course();
        $this->load->model('Programme');

        switch($page){
            case 'program_courses':
                $data['currentBase'] = 'common/program_course';
                $data['programme_li'] = $this->Programme->get_programme_list();
                $data['course_li'] = $course->get_course_list();
                break;
            case 'courses':
                $data['currentBase'] = 'common/courses_list';
                break;
            case 'classes':
                $data['currentBase'] = 'common/courses_classes';
                break;

            case 'semester_structure':
                $data['currentBase'] = 'common/semester_base';
                break;
            default:
                $data['currentBase'] = 'common/program_dash';
                array_pop($data['uri']);
                $data['uri'];
        }

        $data['current_uri'] = 'admin';

         $this->load->view('tpl/base',$data);
    }

    function student_admission(){
        $uriBase = $this->uri->segment(3);
        $subBase = $this->uri->segment(4);
        $uriMainBase = $this->uri->segment(2);
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] ='Students Admissions ' . " | ".  $data['sys_name'] ;
        $data['jsfiles'] = '';
        $data['currentBase'] = get_profile_file($subBase?$subBase:$uriBase,$data['userdata']['profile'],$uriMainBase);
            switch($uriBase){
                case 'register_student':
                 // $data['currentBase'] = 'common/student_admission';
                break;
            }
        $data['current_uri'] = 'admin';
        $this->load->view('tpl/base',$data);
    }

    function fee_structure ($page){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['pg_title'] = 'Fee Structures & Fee Payments Management' . " | ".  $data['sys_name'] ;;
        $data['home_view'] = 'tpl/template';
        $data['jsfiles'] = '';
        switch($page){
            case 'importer':
                $data['currentBase'] = 'common/fee_import_base';
                $data['current_uri'] = $page;
                break;
            case 'loans':
                $data['currentBase'] = 'common/loans_base';

                break;
            case 'items_list':
                $data['currentBase'] = 'common/fee_structure';
                break;

            case 'payments':
                $data['currentBase'] = 'common/payment_list';
                break;
            default:
                      $data['currentBase'] = 'common/accounts_base';
                break;



        }
        $data['current_uri'] = $page;
        $this->load->view('tpl/base',$data);
    }

    function users(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = 'Users Management' . " | ".  $data['sys_name'] ;
        $data['jsfiles'] = 'login_js';
            switch(end($data['uri'])){
                case 'categories':
                    $data['currentBase'] = 'common/users_groups';
                    break;
                default:
                    $data['currentBase'] = 'common/users_base';
                    break;
            }
        $data['current_uri'] = 'admin';
        $data['searchterm']  = $this->input->post('searchterm');
        $data['pro_search'] = true;

        $this->load->view('tpl/base',$data);
    }

    function statistics_info(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = 'Statistical Information' . " | ".  $data['sys_name'] ;
        $data['jsfiles'] = 'login_js';
        $data['currentBase'] = 'common/statistics_base';
        $data['current_uri'] = 'admin';

        $this->load->view('tpl/base',$data);
    }

    function messages(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] ='Messages & Communication ' . " | ".  $data['sys_name'] ;
        $data['jsfiles'] = 'login_js';
        $data['currentBase'] = 'common/message_base';
        $data['current_uri'] = 'admin';
        $this->load->view('tpl/base',$data);
    }

    function my_profile(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = 'Account Information ' . " | ".  $data['sys_name'] ;
        $data['jsfiles'] = 'login_js';
        $data['currentBase'] = 'common/edit_my_profile';
        $data['current_uri'] = 'admin';
        $this->load->view('tpl/base',$data);
    }

    function manage_departments(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $uripart = $this->uri->segment(3);
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = 'Campus/Faculty/Departments Management' . " | ".  $data['sys_name'] ;
        $data['jsfiles'] = 'login_js';
        $this->load->model('department');
        if($uripart == 'academic' || $uripart == 'other_dp'){
        $data['dp_data'] = array(
            'dp_list' => $this->department->get_department_list($uripart),
            'facult_list' => $this->department->get_faculty_list($uripart),
            'campus_list' => $this->department->get_campus_list($uripart)
        );
            $data['dp_type'] = department_types($uripart,1);
        }else{
            array_pop($data['uri']);
        }

        $data['currentBase'] = get_profile_file($uripart, $data['userdata']['profile']);
        $data['current_uri'] = 'departments';
        $this->load->view('tpl/base',$data);
    }

    function calendar(){
        $data = array();
        $data += $this->System_core->common_view_data();
        if($this->input->is_ajax_request()){
            $type = $this->input->get("month");
            $cal = new Calendar();
            switch($type){
                case 'current':
                    $msg = $cal->get_all_events($this->input->post('start'),$this->input->post('end'),true);
                    break;
                default:
                    $msg = $cal->get_all_events($this->input->post('start'),$this->input->post('end'),true);
                    break;
            }
            $this->output->set_content_type('json')->set_output(json_encode($msg));
        }else{
            $currentUri = end($data['uri']); reset($data['uri']);
            switch($currentUri){
                case 'events':
                    $data['currentBase'] = 'common/calendar_base_events';
                    break;
                case 'timetable':
                    $data['currentBase'] = 'common/calendar_base_timetable';
                    break;
                case 'timers':
                    $data['currentBase'] = 'common/calendar_base_timers';
                    break;
                default:
                    $data['currentBase'] = 'common/calendar_base';
                    break;
            }
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] ='Calendar for Current Year' . " | ".  $data['sys_name'] ;
        $data['jsfiles'] = 'login_js';

        $data['current_uri'] = 'admin';
        $this->load->view('tpl/base',$data); }
    }

    function get_users(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['home_view'] = 'tpl/template';
        $data['pg_title'] = 'Users Management' . " | ".  $data['sys_name'] ;
        $data['jsfiles'] = 'login_js';

        $data['currentBase'] = 'common/users_list';
        $this->load->view('tpl/base',$data);
    }
       /** Ajaxed Routes handling/Receptors */
    function ajax_load(){
        $token1 =  $this->input->post('token');
         $action = $this->uri->segment(3);
         $is_ajax = $this->input->post('ajaxrequest');

         $mode = $this->input->post('acttype') == 'edit'?2:1;
         $token = $this->session->userdata('form_token');
         $validtk = ($token == $token1);
         $structureid = $this->input->post('itemid');
        if($validtk && $this->input->is_ajax_request()){
            switch($action){
                /** Campus handlers */
                case 'create_campus':
                  $data = $this->add_campus($mode);
                break;
                case 'update_campus':
                    $data =   $this->add_campus(2);
                    break;
                /** Department handlers */
                case 'create_department':
                    $data =  $this->add_department($mode);
                    break;
                case 'update_department':
                    $data =  $this->add_department($mode);
                    break;
                /** faculty handlers */
                case 'create_faculty':
                    $data =  $this->add_faculty($mode);
                    break;
                case 'update_faculty':
                    $data =  $this->add_faculty($mode);
                   break;
                /** Course handlers */
                case 'create_course':
                    $data =  $this->add_course($mode);
                    break;
                case 'update_course':
                    $data =  $this->add_course($mode);
                    break;
                case 'autocourse_class':
                    $cz = new studentClassStream();

                    if($mode == 1){
                        $data = $cz->multiple_insert($this->input->post());
                    }else{
                        $data = $cz->update_stream($this->input->post());
                    }

                    break;
                /** programme handlers */
                case 'create_programme':
                    if($mode == 1){
                        $data =  $this->add_programme($mode);
                    }else{
                        $data =  $this->add_programme($mode);
                    }
                    break;
                case 'update_programme':
                    $data =  $this->add_programme($mode);

                 break;

                /** Semester structures */
                case 'create_academic_year':
                    $ac = new AcademicYear();
                    if($mode == 1){
                        $result = $ac->createNew($this->input->post());

                        $data['errors']=!$result['status'];
                        if($result['status']){
                            $info = array(
                                'viewtype' => 'li',
                                'id_type' => 'new',
                                'id' => $ac->count() - 1,
                                'acY' => $result['msg'],
                                'total'=> $result['status'],

                            );
                            $data['data'] = $this->load->view('common/data/sem_acYear',array_merge($info ,  $this->System_core->common_view_data()),true);
                        }else{
                            $data['data'] =  $result['msg'];
                        }

                    }else{
                        $result = $ac->updateYear($this->input->post());
                        $data['errors']=!$result['status'];
                        $data['data'] = $result['msg'];
                    }


                    break;
                case 'create_semester':
                        $semOb = new Semester();

                    if($mode == 1){
                        $result = $semOb->createSemester($this->input->post()) ;
                    }else{
                        $result = $semOb->updateSemester($this->input->post()) ;
                    }

                      if($result['status']){
                          $semOb->draw_view($this->System_core,'table');
                          $data['data'] = $semOb->draw_view ;
                      }else{
                          $data['errors']  =!$result['status'];
                          $data['data'] = $result['msg'];
                      }

                    break;
                case 'create_semester_structure':
                         $semOb = new SemesterStructure();

                         if($mode == 1){
                             $result = $semOb->addNew($this->input->post());
                         }else{
                             $result = $semOb->updateStructure($this->input->post(),$structureid);
                         }
                          if($result['status']){
                              $data['errors'] = !$result['status'];
                             $data['data'] = $result['msg'];
                          } else{
                              $data['errors'] = !$result['status'];
                                  $data['data'] = $result['msg'];
                          }

                    break;
                case 'create_pgcourse':
                    $pgCourse = new ProgrammeCourse();
                    if($mode == 1){
                       $data =  $pgCourse->insert_new($this->input->post());
                        if($data['errors'] == true){
                            $data['error'] = true;
                            $data['message'] = $data['data'];
                        }
                    }else{
                         $pgCourse->where('id',$this->input->post('itemid'))->get();
                        if($pgCourse->result_count()){
                            $pgCourse->display_name = trim($this->input->post('pg_course_name'));
                            $pgCourse->code_name = trim($this->input->post('pg_course_code'));
                            $pgCourse->year_started = trim($this->input->post('pg_startdate'));
                            $valid = $pgCourse->save();
                            if($valid){
                                $data = array('errors'=>false,'data'=>"Course Information Updated Successfully!");
                            }else{
                                $data = array('errors'=>true,'data'=>"Failed to Update course information. Retry");
                            }
                        }else{
                            $data = array('errors'=>true,"Failed to Update course information.<br>\n\r It Appears the Course Has Been Removed!");
                        }

                      //  var_dump($pgCourse);die();
                    }
                     // $data['errors'] = false;
                     // $data['data'] = 'Actions Is Being Define!';
                    break;
                case 'create_user':
                    $data = $this->add_new_user($mode);
                    break;
                case 'create_pg_basecode':
                    $data =   $this->create_pbbase_code($mode);
                    break;

                case 'create_sem_timetable':
                    $data = $this->add_sem_timetable($mode);
                    break;
                default:

                    if(method_exists($this,$action)){
                        $data = $this->$action();
                    }else{
                        $data = array('errors'=>true,'data'=>'Undefined Actions!!');
                        $data['error'] = $data['errors'];
                        $data['message'] = $data['data'];
                    }
                    break;

            }

            $this->output->set_content_type('json')->set_output(json_encode($data));
        }else{
            echo 'bad access method';
        }
     }

    private function update_system_info(){

    }

    function admit_student(){
        if($this->input->is_ajax_request()){
           switch($this->input->get('type')){
               case 'applicant_info':
                   $data = array(
                       'status'=>'error',
                       'title'=> 'Failed to add',
                       'message'=>'Student Exists'
                   );
                  // echo "applicant registration ";
                   break;
               default :
                   $data = array(
                       'status'=>'warning',
                       'title'=> 'Unspecified Action',
                       'message'=>'No Action Specified. Retry'
                   );
                   break;
           }

            $this->output->set_content_type('json')->set_output(json_encode($data));
        }else{
            echo 'bad access method';
        }
        }

    function json_data(){
        if($this->input->is_ajax_request()){
           $type = $this->input->get('contentype');
           $data['jsondata'] = true;
            $data['currenttoken'] = $this->session->userdata('formtoken');
            $data['content'] = 'json';
            switch($type){
                case 'selected_applicants':

                  $dt = new SASStudent();
                  //echo "herae";
                  $out = $dt->draw_html_json();
                 // var_dump($out);
                    break;
                case 'unadmitted_students':
                    $dt = new StudentInfo();
                    $out = $dt->draw_html_json(1);
                    break;
                default:
                    $out = 'empty';
            }

            $this->output->set_content_type('json')->set_output(json_encode($out));
        }else{
            echo 'bad access method';
        }
    }

    private function create_pbbase_code($mode){

        $this->form_validation->set_rules('base_programme','Base Programme','trim|required|xss_clean');
        $this->form_validation->set_rules('course_cat[]','Course Category','trim|required|callback_input_check|xss_clean');
        $this->form_validation->set_message('is_unique',"%s Already Exists!!");
        if($mode == 1){
            $this->form_validation->set_rules('base_code','Base Code','trim|required|callback_input_check|xss_clean|is_unique[cis_department_program_base_code.code_name]');
        }else{
            $this->form_validation->set_rules('base_code','Base Code','trim|required|callback_input_check|xss_clean');
        }
        $this->form_validation->set_rules('description','Description','trim|required|callback_input_check|xss_clean');
        if($this->form_validation->run() == true){
               $pbase = new ProgramBaseCode();
                $status = $pbase->add_new($this->input->post(),$mode);

            $out['errors'] = $status['error'];
            $out['error'] = $status['error']?'happened':false;
            if($mode == 1 && !$status['error']){
                $out['data'] = $this->load->view('common/data/dt_pgbase_code',array('userdata'=>$this->System_core->curruser,'id'=>"-N",'ob'=>&$status['message']),true);// $status['message'];

            }else{
                $out['data'] = $status['message'];
            }
            $out['message'] =$status['message'];
        }else{
            $out['errors'] = true;
            $out['data'] = $this->form_validation->error_array();
        }

        return $out;
    }

    private function add_new_user($mode){
        $this->form_validation->set_rules('email','Email Address','trim|required|callback_valid_email_address|xss_clean');
        $this->form_validation->set_rules('first_name','First Name','trim|required|callback_input_check|xss_clean');
        $this->form_validation->set_rules('last_name','Last Name','trim|required|callback_input_check|xss_clean');
        $this->form_validation->set_rules('login_id','User Name','trim|required|callback_input_check|xss_clean');
        $this->form_validation->set_rules('user_profile','User Profile','trim|required|callback_input_check|xss_clean');
        if($this->input->post('user_profile') == 'department'){
            $this->form_validation->set_rules('department','Department','trim|required|callback_input_check|xss_clean');

        }
         if($mode == 1){
             $this->form_validation->set_message('is_unique','%s Already Exists. Use Another one');
            $this->form_validation->set_rules('email_address','Email Address','is_unique[cis_sys_user.email_address]');
            $this->form_validation->set_rules('login_id','User Name','cis_sys_user.login_id');
             $this->form_validation->set_rules('password','Password','trim|required|callback_input_check|min_length[5]|xss_clean');
         }else{
            if($this->input->post('password') != 'default-pass'){
                $this->form_validation->set_rules('password','Password','trim|required|callback_input_check|min_length[5]|xss_clean');
            }
         }
        if($this->form_validation->run() == true && ($this->input->post('user_profile') != 'student' || $mode == 2 )){
            $user = new User();
            if($mode == 2){
                $status = $user->update_user($this->input->post('itemid'),$this->input->post(),$this->input->post('access_level'),$this->input->post('user_profile'),$this->input->post('department'));
                $out['errors'] = !$status['error'];
                $out['error'] = $status['error']?'happened':false;
                $out['message'] =$status['message'];
                $out['data'] = $status['message'];
            }else{
                $status = $user->add_new_user($this->input->post(),$this->input->post('access_level'),$this->input->post('user_profile'),$this->input->post('department'),1);
                $out['errors'] = $status['error'];
                if($status['error']){
                    $out['error'] = true;
                    $out['data']['login_id'] = $status['message'];
                    $out['message'] = $status['message'] ;
                }else{
                $out['data'] =$this->load->view('common/data/user_info',array('userdata'=>$this->System_core->curruser,'usr'=>$status['message']),true);
                }
            }
        }else{
            $out['errors'] = true;
            $out['data'] = $this->form_validation->error_array();
            if($this->input->post('user_profile') == 'student'){
                $out['data']['user_profile'] = "Student Accounts must be added using login form using self registration forms!";
            }

        }

        return $out;
    }

    /**
     * Update fee strcuture handler from route /admin/update_fee_structure via ajax with inputs itemtype as type and mode as ajax
     */
    function update_fee_structure(){
        if($this->input->is_ajax_request()){
            $update = $this->input->get("itemtype");
            switch($update){
                case 'fee_structure_new':
                    $this->form_validation->set_rules('service_charge','Service Charge','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('sponsor_category','Sponsor Category','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('academic_year','Academic Year','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('amount_local','Amount for Local Students ','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('amount_local','Amount for Local Students ','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('amount_foreign','Amount for non Tanzanians ','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('amount_local_min','Minimum Amount','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('amount_foreign_min','Minimum Amount ','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('structure_name','Structure name ','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('description','Description ','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('programme[]','Programme ','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('course[]','Parent Programme ','trim|required|callback_input_check|xss_clean');
                    if($this->form_validation->run()){
                        $structure = new FeeStructure($this->input->post('itemid'));
                        $status = $structure->create_new_structure($this->input->post());
                        if($status['error']){
                            $out['error'] = 'happened';
                            $out['message'] = $status['structure'];
                        }else{
                        $out['error'] = 'message';
                        $out['message'] = "";
                        foreach($status['programm'] as $id=>$dt){
                            if($dt['error']){
                                $out['error'] = 'happened';
                            }
                            $out['message'] .= "<br>Status:<strong>".$dt['status'] . "</strong> Programme: <em> <span class='badge'>" . $dt['data'] . "</span></em>";
                        }
                            if($out['error'] == 'message'){
                               $out['error'] = 'extras';
                              // $out['errors'] = false;
                               // $out['data'] = $this->load->view("admin/data/dt_fee_structure_list",array('item'=>$status['structure']),true);
                            }
                        }
                    }else{
                        $out['errors'] = true;
                        $out['data'] = $this->form_validation->error_array();
                    }

                    break;
                case 'fee_structure':
                         // var_dump($this->input->post());
                  //  die();
                    $this->form_validation->set_rules('itemid','Structure','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('service_charge','Service Charge','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('sponsor_category','Sponsor Category','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('academic_year','Academic Year','trim|required|callback_input_check|xss_clean');
                   $this->form_validation->set_rules('structure_name','Structure name ','trim|required|callback_input_check|xss_clean');
                   $this->form_validation->set_rules('description','Description ','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('programme[]','Programme ','trim|required|callback_input_check|xss_clean');
                    $this->form_validation->set_rules('course[]','Parent Programme ','trim|required|callback_input_check|xss_clean');
                    if($this->form_validation->run()){
                           $structure = new FeeStructure($this->input->post('itemid'));
                           $status = $structure->update_structure_info($this->input->post());
                        $structure->filter_structure($this->input->post());
                        $out['error'] = 'message';
                        $out['errors'] = false;
                        $out['message'] = "";
                        foreach($status['programm'] as $id=>$dt){
                            if($dt['error']){
                                $out['error'] = 'happened';
                            }
                            $out['message'] .= "<br>Status:<strong>".$dt['status'] . "</strong> <br>Programme:  <span class='text-info'>" . $dt['data'] . "</span><br>";
                        }
                    }else{
                        $out['errors'] = true;
                        $out['data'] = $this->form_validation->error_array();
                    }

                    break;

                case 'fee_structure_items_remove':

                    break;
                case 'fee_structure_items':
                default:
                     // $out = $this->input->post();
                    $itemid = $this->input->post('itemid');
                    $optionals = $this->input->post('optional');
                    $localitems = $this->input->post('localitems');
                    $foreignitems = $this->input->post('foreignitems');
                    $itemspercentage = $this->input->post('itempercentage');

                    if(!empty($itemid) && is_numeric($itemid) && is_array($optionals) && is_array($localitems) && is_array($foreignitems) && is_array($itemspercentage)){
                        $feeStructure = new FeeStructure();
                        $status =  $feeStructure->add_fee_items($itemid,$optionals,$itemspercentage,$localitems,$foreignitems);
                            $msg = "";
                        $error = false;
                        if($status['structure']){
                            $msg = "Structure Update Success";
                        }else{
                            $msg = "Structure Update Failed";
                            $error = true;
                        }
                        $suc = array(1=>0,2=>0);
                        foreach($status['all'] as $id){
                            if($id == true){
                                $suc[1] += 1;
                            }else{
                                $error = true;
                                $suc[2] += 1;
                            }
                        }

                        $msg .= "<br>".$suc[1]. " Items Successfully Saved";
                        $msg .= "<br>".$suc[2]. " Items Failed to Save";

                        $out = array('error'=>$error,'message'=>$msg);
                        }else{
                            $out = array('error'=>true,'message'=>"Some Items Information is Missing");
                        }
             }
        }else{
            echo "bad access method";
        }

        $this->output->set_content_type('json')->set_output(json_encode($out));

    }

    function ajax_load_form() {
        $data =  "<< -- Here are the contents requested " ;

        $this->output->set_content_type('html')->set_output(($data));

    }

    /** Ajaxed inline contents load view */
    function ajax_view_item(){
        $data = "Item Information";
        $this->output->set_content_type('html')->set_output(($data));
    }

    function ajax_remove_item(){
       $data = array(
           'data' => '<<-- Item removed successfully',
           'status' => true
       );

        $this->output->set_content_type('json')->set_output(json_encode($data));

    }

    function remove_item(){
        $ftype = $this->input->get('itype');
        $fks = $this->input->get();
        $output = "";
        $data = $this->System_core->common_view_data();
        $status = array();

        switch($ftype){
            case 'programme':
                $pg = new Programme($fks['itemid']);
                $status =  $pg->remove_programme($fks['itemid'],0);
                break;
            case 'course':
                $cz = new Course($fks['itemid'],$fks['department'],$fks['faculty'],$fks['campus']);
                $status = $cz->remove_course($fks['itemid'],$fks['department'],$fks['faculty'],$fks['campus']);
                break;
            case 'department':
                $status = array('status'=>false,'msg'=>' Action! not allowed! Item has Deep Relationship!');
                break;
            case 'faculty':
                $status = array('status'=>false,'msg'=>' Action! not allowed! Item has Deep Relationship! ');
                break;
            case 'campus':
                $status = array('status'=>false,'msg'=>' Action! not allowed! Item has Deep Relationship! ');
                break;
            case 'programme_course':
                $status = array('status'=>false,'msg'=>' Action! not allowed! Item has Deep Relationship! ');
                break;

            case 'semester':
                $status = array('status'=>false,'msg'=>'Action! not allowed! Item has Deep Relationship! ');
                break;
            default:
                $status = array('status'=>false,'msg'=>'Undefined Action!');
        }

        $output = array('status'=>$status['status'],'data'=>$status['msg']);
        $this->output->set_content_type('json')->set_output(json_encode($output));
    }

    function login_status(){

        return $this->session->userdata('login_status');
    }

    /** The following functions are the Event & routes data handlers */
    // Create/Update a programme event/route handler
    private function add_sem_timetable($mode){
        $this->form_validation->set_rules('event_cat','Event Type','trim|required|callback_input_check|xss_clean');
        $this->form_validation->set_rules('sem_start_date','Start Date','trim|required|min_length[3]|valid_date|callback_sem_date_check|xss_clean');
        $this->form_validation->set_rules('sem_start_date','Start Date','trim|required|valid_date|callback_input_check|xss_clean');
        $this->form_validation->set_rules('semesters_list[]','Semesters','trim|required|callback_input_check|xss_clean');
              if($this->input->post('pg_start_year')){
            $this->form_validation->set_rules('pg_start_year','Year Started ','trim|required|length[10]|callback_input_check|callback_valid_date|xss_clean');
        }

        if($this->form_validation->run()){
            $info = array();
                $calEvent = new Calendar();
               $info= $calEvent->add_sem_event($this->input->post(),$this->session->userdata['login_data']['login_id']);
               $result['errors'] = $info['error'];
            if($result['errors']){
                $result['data'] = array(
                    'semesters_list[]'=>$info['message'],
                    //'wadau_wote'=>$info['message']
                );
            }else{
                $result['data'] = $info['message'];
            $result['message'] = $info['message'];
            }
           // $result['errors'] = 'happened';

        }else{
            $result['errors'] = true;
            $result['data'] = $this->form_validation->error_array();
        }

        return $result;

    }
    private function add_programme($mode){
        $result = array();
        $this->form_validation->set_message('is_unique','%s  already Exists');
        if($mode == 1){
        $this->form_validation->set_rules('pg_name','Programme Name ','trim|required|min_length[3]|callback_input_check|xss_clean|is_unique['.db_tables('programme_table').'.name]');
        }
        $this->form_validation->set_rules('pg_parent','Parent Programme ','trim|required|callback_input_check|xss_clean');
        $this->form_validation->set_rules('pg_dname','Common Name','trim|required|min_length[3]|callback_input_check|xss_clean');
        $this->form_validation->set_rules('pg_is_last','Type','trim|required|callback_input_check|xss_clean');
        $this->form_validation->set_rules('pg_code','Code Name','trim|required|callback_input_check|xss_clean');
        $this->form_validation->set_rules('pg_level_year','Type','trim|required|is_numeric|callback_input_check|xss_clean');
        $this->form_validation->set_rules('pg_nta_level','NTA','trim|required|is_numeric|callback_input_check|xss_clean');
        if($this->input->post('pg_code_no')){
            $this->form_validation->set_rules('pg_code_no','Number ','trim|required|is_numeric|callback_input_check|xss_clean');
        }

        if($this->input->post('pg_start_year')){
            $this->form_validation->set_rules('pg_start_year','Year Started ','trim|required|length[10]|callback_input_check|callback_valid_date|xss_clean');
        }
           $action = $this->input->post('formaction');
        $inputdata = $this->input->post();
        if($this->form_validation->run()){
            $this->load->model('Programme');
            $info = array();
            if($action != 'update'){
                $programe = $this->Programme->add_programme($inputdata);
            }else{
                $programe = $this->Programme->update_programme($this->input->post('itemid'),$inputdata);
            }
              if($mode == 1){
                  $info = array('pg_type'=>1,'pg'=>$programe['msg']['data'],'id'=>$programe['status'],'viewtype'=>'table') +  $this->System_core->common_view_data();;;
                  $result['errors'] = false;
                  $result['data']  = $mode==1?$this->load->view('common/data/programme',$info,true):$programe['msg'];
              } else{
                  $result['errors'] = false;
                  $result['data']  = $programe['msg'];
              }

        }else{
            $result['errors'] = true;
            $result['data'] = $this->form_validation->error_array();
        }

        return $result;
    }

    private function add_course($mode){
        $result = array();
        $this->form_validation->set_message('is_unique','%s  already Exists');
        if($mode == 1){
            $this->form_validation->set_rules('cz_name','Course Name ','trim|required|min_length[3]|callback_input_check|xss_clean|is_unique['.db_tables('course_table').'.name]');
            $this->form_validation->set_rules('cz_code','Course Code','trim|required|min_length[2]|max_length[4]|callback_input_check|xss_clean|is_unique['.db_tables('course_table').'.code_name]');

        }
        $this->form_validation->set_rules('dp_name','Department','trim|required|numeric|callback_input_check|xss_clean');
        $this->form_validation->set_rules('fc_name','Faculty ','trim|required|callback_input_check|xss_clean');
        $this->form_validation->set_rules('cm_name','Campus  ','trim|required|callback_input_check|xss_clean');
        if($this->input->post('cz_date')){
            $this->form_validation->set_rules('cz_date','Year Started ','trim|required|length[10]|callback_input_check|callback_valid_date|xss_clean');

        }
        $inputdata = $this->input->post();
        if($this->form_validation->run()){
            $course = new Course();
            $info = array();
            if($mode == 1){
                $programe = $course->add_course($inputdata);
                $info['cz'] = $programe['msg']['data'];
                $info['id'] = $programe['msg']['data']['id'];
                $info['viewtype'] = 'table';
                $info += $this->System_core->common_view_data();;
                $msg = $this->load->view('common/data/course',$info,true)  ;
            }else{
                $programe = $course->update_course($inputdata['itemid'],$inputdata['department'],$inputdata['faculty'],$inputdata['campus'],$inputdata);
                $msg = $programe['msg'] ;
            }

            $result['errors'] = false;
            $result['data']  = $msg;
        }else{
            $result['errors'] = true;
            $result['data'] = $this->form_validation->error_array();
        }

        return $result;
    }

    // Create and campus handler
    private function add_campus($mode){
        $result = array();
        $this->form_validation->set_message('is_unique','%s  already Exists');
        if($mode == 2){
            $this->form_validation->set_rules('cm_name','Campus Name ','trim|required|min_length[3]|callback_input_check|xss_clean');

        }else{
            $this->form_validation->set_rules('cm_name','Campus Name ','trim|required|min_length[3]|callback_input_check|xss_clean|is_unique['.db_tables('campus_table').'.name]');

        }
        $this->form_validation->set_rules('cm_location','Campus Location ','trim|required|min_length[3]|callback_input_check|xss_clean');
        $this->form_validation->set_rules('cm_type','Type','trim|required|min_length[3]|callback_input_check|xss_clean');
        $this->form_validation->set_rules('cm_startdate','Year Created ','trim|required|length[10]|callback_input_check|callback_valid_date|xss_clean');
        $this->form_validation->set_rules('cm_head','Campus Head ','trim|required|min_length[3]|callback_input_check|xss_clean');
        $inputdata = $this->input->post();
       if( $this->form_validation->run()){
              $this->load->model('department');
           $campus = $this->department->add_campus($inputdata,$mode);
           $result['errors'] = false;
           $data = array('id_type'=> 'new','viewtype'=>'li','id'=>'10','campus_li'=>$campus['msg']) +  $this->System_core->common_view_data();;
            if($mode == 2){
                $result['data'] = $campus['msg'];
            }else{
            $result['data'] = $this->load->view('common/data/campus',$data,true);
            }
       }else{
           $result['errors'] = true;
           $result['data'] = $this->form_validation->error_array();
       }
        return $result;
    }
       // Create / update a faculty route handler
    private function add_faculty($mode){
        $this->form_validation->set_message('is_unique','%s  already Exists');
       if($mode == 2){
           $this->form_validation->set_rules('fc_name','Faculty Name ','trim|required|apha|min_length[3]|callback_input_check|xss_clean');

       }else{
           $this->form_validation->set_rules('fc_name','Faculty Name ','trim|required|apha|min_length[3]|callback_input_check|xss_clean|is_unique['.db_tables('faculty_table').'.facult_name]');

       }
        $this->form_validation->set_rules('fc_campus','Campus  ','trim|required|numeric|callback_input_check|xss_clean');
        $this->form_validation->set_rules('fc_head','Head ','trim|required|apha|min_length[3]|callback_input_check|xss_clean');

            $this->form_validation->set_rules('fc_startdate','Start Date ','trim|required|callback_input_check|callback_valid_date|xss_clean');

        $inputdata = $this->input->post();
        if( $this->form_validation->run()){
            $this->load->model('department');
            if($mode == 2){
                $fc = $this->department->update_faculty($inputdata['itemid'],$inputdata);
                $result['errors'] = !$fc['status'];
                $result['data'] = $fc['msg'];
            }else{


            $fc = $this->department->add_faculty($inputdata['fc_campus'],$inputdata,$inputdata['fc_campus']);
            $result['errors'] = false;
            $data = array('id_type'=>'new','viewtype'=>'li','fcdata'=>$fc['msg']['data'],'id'=>$fc['msg']['data']['id']);

                //array('dp'=>$dp['msg']['data'],'id'=>$dp['msg']['data']['id'],'viewtype'=>'table','dp_type' => $inputdata['dp_type']);//array('id_type'=> 'new','viewtype'=>'li','id'=>'10','campus_li'=>$campus['msg']);

            $result['data'] = $this->load->view('common/data/faculty',$data +  $this->System_core->common_view_data(),true);
            }
        }else{
            $result['errors'] = true;
            $result['data'] = $this->form_validation->error_array();
        }
        return $result;
    }
       // Create/ update a new department route/event handler
    private function add_department($mode){
        $this->form_validation->set_message('is_unique','%s  already Exists');
        $this->form_validation->set_rules('dp_campus','Campus Name ','trim|required|numeric|callback_input_check|xss_clean');
        $this->form_validation->set_rules('dp_head','Head ','trim|required|min_length[3]|callback_input_check|xss_clean');
           if($this->input->post('dp_type') == 1){
               $this->form_validation->set_rules('dp_facult','Faculty ','trim|required|number|callback_input_check|xss_clean');
               if($mode == 2){
                   $this->form_validation->set_rules('dp_number','Department Number ','trim|required|callback_input_check|xss_clean');
                   $this->form_validation->set_rules('dp_code','Department Code ','trim|required|min_length[2]|callback_input_check|xss_clean');
                   $this->form_validation->set_rules('dp_name','Department Name ','trim|required|min_length[3]|callback_input_check|xss_clean');
               }else{
               $this->form_validation->set_rules('dp_number','Department Number ','trim|required|callback_input_check|xss_clean|is_unique['.db_tables('department_table').'.code_no]');
               $this->form_validation->set_rules('dp_code','Department Code ','trim|required|min_length[2]|callback_input_check|xss_clean|is_unique['.db_tables('department_table').'.code]');
               $this->form_validation->set_rules('dp_name','Department Name ','trim|required|min_length[3]|callback_input_check|xss_clean|is_unique['.db_tables('department_table').'.name]');
               }
           }else{
               if($mode == 2){
               $this->form_validation->set_rules('dp_name','Department Name ','trim|required|min_length[3]|callback_input_check|xss_clean');
               }
               else{
                   $this->form_validation->set_rules('dp_name','Department Name ','trim|required|min_length[3]|callback_input_check|xss_clean|is_unique['.db_tables('other_department_table').'.name]');

               }
           }
        $inputdata = $this->input->post();
        if( $this->form_validation->run()){
            $this->load->model('department');
            if($mode == 2){
                   $into = $this->department->update_department($inputdata['itemid'],$inputdata,$inputdata['type']);
                    $result['errors'] = !$into['status'];
                    $result['data']  = $into['msg'];

            }else{
            $dp = $this->department->add_department($inputdata['dp_facult'],$inputdata['dp_campus'],$inputdata,$inputdata['dp_type']);
            $result['errors'] = false;
            $data = array('dp'=>$dp['msg'],'id'=>$dp['msg']['dp_id'],'viewtype'=>'table','dp_type' => $inputdata['dp_type']) +  $this->System_core->common_view_data();
            $result['data'] = $this->load->view('common/data/department',$data,true);
            }
        }else{
            $result['errors'] = true;
            $result['data'] = $this->form_validation->error_array();
        }
        return $result;
    }
    /** Inputs Checking and validations functions */
    // General input checker
    function input_check($input){
        $input =trim($input,"\n\t\x0B");
        if ($input == 'default-pass' || $input == 'select'|| $input == 'Select' || $input == '--' || $input=='')
        {
            $this->form_validation->set_message('input_check', '%s is Empty');
            return FALSE;
        }
        else
        {

            return true;
        }
    }

    function valid_date($date)
    {
        // $ddmmyyy='/(0[1-9]|[12][0-9]|3[01])[- /](0[1-9]|1[012])[- /](19|20)[0-9]{2}/';
        $ddmmyy ='(19|20)\d{2}[\-](0[1-9]|1[012])[\-](0[1-9]|[12][0-9]|3[01])';

        if(preg_match("/$ddmmyy/", $date)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('valid_date', 'Please enter yyyy-mm-dd');
            return FALSE;
        }
    }

    function sem_date_check($date){
        $date2 = strtotime($this->input->post('sem_end_date'));
        $date = strtotime($date);

        if($date2 < $date){
            $this->form_validation->set_message('sem_date_check',"Make Sure End Date is Greater than Start Date");
            return false;
        }else{
           return true;
        }
    }

    function valid_email_address($email){
        $email = trim($email);
        $valid = filter_var($email,FILTER_VALIDATE_EMAIL);
        if($valid){
            return true;
        }else{
            $this->form_validation->set_message('valid_email_address'," %s is not a valid address");
            return false;
        }
    }

    function print_report(){
        $input = $this->input->post();
        var_dump($input);
       //  var_dump($input['registration_detaisl'])
       // if()
        $links = "<a href='download_file?xcel=list.xls' target='_blank' class='btn btn-primary'><i class='fa fa-file-excel-o'></i>&nbsp;&nbsp;Download Excel</a>&nbsp;&nbsp;<a href='download_file?pdf=list.pdf' target='_blank' class='btn btn-primary'><i class='fa fa-file-pdf-o'></i>&nbsp;&nbsp;Download Pdf</a>";
        $data = array(
            'error'=>false,
            'data' => $links
        );
        //$this->output->set_content_type('json')->set_output(json_encode($data));
    }
}
