<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/8/14
 * Time: 7:29 PM
 */

class ajax_load extends CI_Controller {
    private $token ;
    private $profile;
    private $commondata;


    function __construct(){
        parent::__construct();

        $this->load->model('system_core');
        $this->token =$this->session->userdata('formtoken');
        $this->commondata =  $this->system_core->common_view_data();;
        $this->profile = $this->commondata['userdata'];

        if($this->input->is_ajax_request()){
            if(!$this->login_status() && !$this->allowed_access()){
                if($this->input->is_ajax_request()){
                    $data =  $this->commondata ;
                    echo $this->load->view('ajax_login',$data,true);
                    die();
                }else{
                    redirect(base_url()."login");
                }
            }


            switch(user_profile($this->commondata['userdata']['profile'])){
                case 'admin':
                    break;
                case 'student':
                    break;
                case 'department':
                    break;
                default:
                    break;
            }
        }else{
          redirect(base_url()) ;
        }
    }

    function allowed_access(){
        $login =   $this->session->userdata('login_data');
        if($login){
        if($login['profile'] == 'student'){
            return false;
        }else{
            return true;
        }}
        else{
            $data = $this->commondata;

            $this->load->view('ajax_login',$data);
        }
    }

    function index() {
        echo 'what do u want?';
    }

    function student_payments(){
        $type = $this->input->get('type');
        $stid = $this->input->get('stid');
        $input = $this->input->post();
        $rtype = 'xml';
            if($this->input->is_ajax_request()){
               switch($type){
                   case 'item':
                       echo $stid;
                       $file = 'data_student_item';
                       break;
                   case 'info':
                       $file = 'data_student_book';
                       break;
                   case 'link_bank_fee':
                       $rtype = 'json';
                       $bankImport = new BankImport();
                       $curruser = $this->session->userdata('login_id');
                       $bankImport->where("id",$input['itemid'])->get();

                       if(trim($input['student_id'])){
                           $status = $bankImport->link_student($input['student_id'],$curruser);
                           $stainfo = $status ;

                       }else{
                           $stainfo = array("error"=>true,'message'=>"Empty Student Registration Number") ;
                       }

                       break;
               }

                if($rtype == 'xml'){
                    $this->load->view('finance/'.$file,array('regno'=>$stid));
                }else{
                    $this->output->set_content_type('json')->set_output(json_encode($stainfo));
                }

            }else{
                echo "Bad Access Method";
            }
    }

    function update_student_education(){
        $input = $this->input->post();
        $edbac = new StudentEdBackground();
        $places = new PlaceLocation();
        // var_dump($input);
        $this->form_validation->set_rules('year_completed','Year Completed ', 'required|xss_clean|callback_date_check');
        $this->form_validation->set_rules('certificate_award','Certificate Award','trim|required|xss_clean');
        $data = array();
        $this->form_validation->set_rules('name','Name of School','required|xss_clean');
        if($this->form_validation->run()){
            $edbac->where(array('student_id'=>$input['stid'],'category'=>$input['cattype']))->get();
            $edbac->name = $input['name'];
            $edbac->country = $input['country'];
            $edbac->year_completed = $input['year_completed'];
            $edbac->location_id = $places->add_place_name($input['location_id'],$input['place']['long'],$input['place']['lat']);
            $edbac->subjects = isset($input['subjects'])?json_encode($input['subjects']):"--";  $edbac->allowedit = 0;
            $edbac->index_id = isset($input['index_id'])?$input['index_id']:time();
            $edbac->category = $input['cattype'];
            $edbac->course = isset($input['course'])?$input['course']:"--";
            $edbac->certificate_award = $input['certificate_award'];
            $edbac->student_id = $input['stid'];
            $edbac->year_completed = $input['year_completed'];
           $status = $edbac->save();
            if($status){
                $data['command'] = 'bind';
                $data['bind'] = $edbac->stored;
                $data['errors'] = false;
                $data['data'] = "Information Successfully Updated!";
                $data['message'] = $data['data'];
            }else{
                $data['errors'] = 'happened';
                $data['data'] = 'Failed to Update information! Retry Again';
                $data['error'] =true;
                $data['message'] = $data['data'];
            }


        }else{
            $data['errors'] = true;
            $data['error'] = true;
            $data['message'] = "One or More input(s) is Invalid";
            $data['data'] = $this->form_validation->error_array();

        }

        $this->output->set_content_type('json')->set_output(json_encode($data));

    }

    function update_student_info(){
        $input = $this->input->post();
        //var_dump($input);
        $this->form_validation->set_rules('basic[health]','Health Insurance Provider ', 'required|xss_clean|');
        $this->form_validation->set_rules('afill[email_address]','Email Address','trim|required|callback_valid_email_address|xss_clean');
        $this->form_validation->set_rules('afill[place_of_birth]','Place of Birth','required|xss_clean');
        if($this->form_validation->run()){
            $stinf = new StudentInfo(); $stinf->where('registration_number',$input['itemid'])->get();

            $places = new PlaceLocation();
            $stinf->bank_account_no = $input['bank_account'];
            $stinf->bank_name = $input['bank_name'];
            $stinf->bank_branch = $input['bank_branch'];
            $stinf->has_nhif = $input['basic']['health'];
            $stinf->save();

            if($input['basic']['health'] != 2){
                $stinf->add_to_category('nhif');
            }

            $stdetail = new StudentDetails($input['details_id']);
            $stdetail->nationality = $input['afill']['nationality'];
            $stdetail->birth_country = $input['afill']['country_of_birth'];
            $stdetail->religion = $input['afill']['religion'];
            $stdetail->dob = $input['basic']['dob'];
            $stdetail->place_of_birth = $input['afill']['place_of_birth'];
            $stdetail->marital_status = $input['afill']['marital_status'];
            $stdetail->mobile_number = trim($input['afill']['mobile_number'],"");
            $stdetail->email_address = $input['afill']['email_address'];
            $stdetail->permanent_address = $input['afill']['permanent_address'];
            $stdetail->contact_address = $input['afill']['contact_address'];
            $stdetail->disabilities = $input['basic']['disability'];
            $stdetail->dependants = $input['afill']['depend'];
            $stdetail->current_loc = $places->add_place_name($input['afill']['current_loc'],$input['loc']['homec']['long'],$input['loc']['homec']['lat']) ;
            $stdetail->permanent_loc = $places->add_place_name($input['afill']['permanent_loc'],$input['loc']['homep']['long'],$input['loc']['homec']['lat']);
            $stdetail->kin_name = $input['kin']['kin_name'];
            $stdetail->kin_phone = $input['kin']['kin_phone'];
            $stdetail->kin_email = $input['kin']['kin_email'];
            $stdetail->kin_address = $input['kin']['kin_address'];
            $stdetail->kin_location =  $places->add_place_name($input['afill']['permanent_loc'],$input['loc']['kin']['long'],$input['loc']['kin']['lat']);
            $stdetail->par_name = $input['parent']['par_name'];
            $stdetail->par_email = $input['parent']['par_email'];
            $stdetail->par_phone = $input['parent']['par_phone'];
            $stdetail->par_address = $input['parent']['par_address'];
            $stdetail->par_location =  $places->add_place_name($input['afill']['permanent_loc'],$input['loc']['par']['long'],$input['loc']['par']['lat']);;
           $status =  $stdetail->save();
            if($status){
                $data['command'] = 'bind';
                $data['bind'] = $stdetail->stored;
                $data['errors'] = false;
                $data['data'] = "Information Successfully Updated!";
                $data['message'] = $data['data'];
            }else{
                $data['errors'] = 'happened';
                $data['data'] = 'Failed to Update information! Retry Again';
                $data['error'] =true;
                $data['message'] = $data['data'];
            }


        }else{
            $data['errors'] = true;
            $data['error'] = true;
            $data['message'] = "One or More input(s) is Invalid";
            $data['data'] = $this->form_validation->error_array();

        }

        $this->output->set_content_type('json')->set_output(json_encode($data));
    }

    function file_upload_status(){
        $upload_info = $this->session->userdata('upload_status');
         $this->config->load('file_import_config');

        //$configs['student_file'] = $this->config->config['student_list'];
         $user = $this->session->userdata('login_data');
        $userid = $user['login_id'];

        switch(strtolower($upload_info['file_type'])){
            case 'students':
                $students = new StudentInfo();
                $configs = $this->config->config['student_list']['new_colmap'];

               $status['statusinfo'] =  $students->import_student_excel_to_db($upload_info['data']['file_path'],$configs,$userid);
                //var_dump($status);
                //die();
                $html = 'upload_students_status';
                break;
            case 'students_loans':
                $loans = new StudentLoan();
                $configs = $this->config->config['student_loans']['new_colmap'];
                $status['statusinfo'] = $loans->import_loan_csv_to_db($upload_info['data']['file_path'],$configs,$userid,$upload_info['data']['file_id']);
                $html = 'upload_students_loans_status';
                break;
            default:
                $html = 'error_info';
                break;
        }

       $this->load->view('common/data/'.$html,$status);
    }

    function form(){
        $ftype = $this->input->get('name');

        $this->load->model('department');
        $data = $this->commondata;

        $pg = new Programme();

        $data += array(
            'dp_list' => $this->department->get_department_list('academic'),
            'dp_list_other' => $this->department->get_department_list('other_dp'),
            'fc_list' => $this->department->get_faculty_list(false),
            'campus_list' => $this->department->get_campus_list(),
            'programme_li' => $pg->get_programme_list() ,
            'formaction' =>'create'
        );

        $data['formtype'] = 'new';

        switch($ftype){
            case 'programme':
                $data['semesterStructure'] = new SemesterStructure();
                $form = 'new_pg_programme';
                break;
            case 'course':
               // $cz = new Course();
                $data['dataE'] = false;
                $form = 'new_pg_course';
                $data['programmes_data']  = $pg->get_programme_list();
                break;

            case 'pgcourse':
                $cz = new Course();
                $data['dataE'] = false;
                $data['programme_list']  = $pg->get_programme_list();
                $data['course_list'] = $cz->get_course_list();
                $form = 'new_course';

                break;

            case 'autocourse_class':
                $form = 'new_autocourse_class';
                break;

            case 'oldcourse_class':
                $form = 'new_oldcourse_class';
                break;

            case "loan_import":
                $form = 'new_loan_import';
                break;

            case 'courseclass':
               // $sem = new Semester();
              //  $acY = new AcademicYear();
                $form = 'new_courseclass';
                break;

            case 'department':
                $form = 'new_department';
                break;
            case 'faculty':
                $form = 'new_faculty';
                break;
            case 'campus':
                $form = 'new_campus';
                break;
            case 'programme_course':
                break;
            case 'academic_year':
                $form = 'new_academic_year';
                break;
            case 'semester':
                $form = 'new_semester';
                break;
            case 'semester_structure':
                $form = 'new_semester_structure';
                $semOb = new Semester();
                $data['semesters'] = $semOb->get_list();
                break;
            case 'admit_applicant':    // Single applicant selection admission
                $form = 'new_student_from_applicant';
                break;
                // Students feee structure edit
            case 'fee_structure':
                $form = 'new_fee_structure';
                break;
            case 'new_user':
                $form = 'new_user_form';
                break;

            case 'pg_basecode':
                $form = 'new_pgbasecode';
                break;
            case 'course_category':
                $form = "new_course_category";
                break;
            default:
                $form = "new_".$ftype;

        }
         $this->output->set_content_type('html')->set_output($this->load->view("common/form/".$form,$data,true));
    }

    function get_events(){

            $input = $this->input->post();
        switch($this->input->post('evType')){
            case 'calendarEvent':
                $data['eventTitle'] = 'Calendar Events of  ' . date("l d-F-Y" , strtotime($this->input->post('date')));
                $currentBase = 'events_list';
                break;
            default:
                $data['eventTitle'] = 'Calendar Events of this day ' . date("l d-F-Y" , strtotime($this->input->post('date')));
                $currentBase = 'events_list';
        }

        $this->load->view('tpl/data/'. $currentBase,$data);

    }

    function get_fee_imports() {

    }

    function form_edit(){

        $ftype = $this->input->get('itype');
        $itemid = $this->input->get('itemid');
        $fkeys = $this->input->get();
        $output = "";
        //$this->load->model('programme_course');
        $this->load->model('department');
        $pg = new Programme($itemid);

        $dp = new Department();

        $this->load->model('department');
        $data = $this->commondata;
        $data['formtype'] = 'edit';
        $data += array(
            'dp_list' => $this->department->get_department_list('academic'),
            'dp_list_other' => $this->department->get_department_list('other_dp'),
            'fc_list' => $this->department->get_faculty_list(false),
            'campus_list' => $this->department->get_campus_list(),
            'programme_li' => $pg->get_programme_list()   ,
            'formaction' =>'update',
            'fkeys' => $this->input->get()
        );

        switch($ftype){
            case 'department':
                $data['input_data'] = $dp->get_department($itemid,isset($fkeys['faculty'])?$fkeys['faculty']:"",$fkeys['campus'],$fkeys['type']);
                $form = 'new_department';
                break;
            case 'faculty':
                $data['input_data'] = $this->department->get_faculty($itemid,$fkeys['campus']);
                $form = 'new_faculty';
                break;
            case 'campus':
                $data['input_data'] = $this->department->get_campus($itemid);

                $form = 'new_campus';
                break;

            case 'programme':
                $form = 'new_pg_programme';

                $data['semesterStructure'] = new SemesterStructure();
                $data['input_data'] = $pg->get_programme($itemid);

                break; // 0719178232
            case 'course':
                $cz = new Course();
                $data['input_data'] = $cz->get_course($itemid,$fkeys['department'],$fkeys['faculty'],$fkeys['campus']);
                $data['programmes_data']  = $pg->get_programme_list();

               // var_dump($data['programmes_data']) ;
                $data['dataE'] = $cz;
                $data['input_data'] =  $data['input_data']['data'];
                $form = 'new_pg_course';
                break;

            case 'pgcourse':
                $cz = new Course();
                $data['dataE'] = false;
                $data['programme_list']  = $pg->get_programme_list();
                $data['course_list'] = $cz->get_course_list();
                $pgd = new ProgrammeCourse();
                $pgd->where('id',$itemid)->get();

                $data['input_data'] = $pgd ;
                $form = 'new_course';
                break;
            case 'autocourse_class':
                $sem = new Semester();
                $acY = new AcademicYear();
                $form = 'new_autocourse_class';
                break;

            case 'courseclass':
                $sem = new Semester();
                $acY = new AcademicYear();
                $form = 'new_courseclass';
                break;

            case 'programme_course':

                break;

            case 'academic_year':
                $form = 'new_academic_year';
                $acY = new AcademicYear($itemid);
                $data['input_data'] = array('data'=>$acY->where('id',$itemid)->get());;
                break;
            case 'semester':
                $semO = new Semester();
                $data['input_data'] = array('data'=>$semO->where('id',$itemid)->get());
                $form = 'new_semester';
               break;
            case 'semester_structure':
                $form = 'new_semester_structure';
                $semOb = new SemesterStructure();
                $data['input_data'] = array('data'=>$semOb->where('id',$itemid)->get());
                break;

            case 'student_bank_link':
                $form = 'new_student_bank_link';
                break;

            // Students feee structure edit
            case 'fee_structure':
                $form = 'new_fee_structure_edit';
                break;

            // Students feee structure edit
            case 'fee_structure_items':
                $form = 'new_fee_structure_items';
                break;
            case 'user':
                $user = new User();
               $data['input_data']['data'] = $user->get_user_info($fkeys['login_id'],true);
                $form = 'new_user_form';
                break;

            case 'pg_basecode':
                $form = 'new_pgbasecode';
                break;
            case 'course_category':
                $form = "new_course_category";
                break;
            default:
                $form = "new_".$ftype;

        }

        $output = $this->load->view("common/form/".$form,$data,true);
        $this->output->set_content_type('html')->set_output($output);
    }

    function view_item(){
        if($this->input->is_ajax_request()){
        $ftype = $this->input->get('itype');
        $output = "";
        $data = $this->commondata;
            $data['fkeys'] = $this->input->get();
            switch($ftype){
            case 'attachment':
                $form = "student_attachment";
                break;
            default:
                $form = 'dt_'.$ftype;
                break;
        }

        $output = $this->load->view("common/data/".$form,$data,true);
        $this->output->set_content_type('html')->set_output($output);
        }else{
            redirect(base_url());
        }
    }
    /**
     * Handle ajax requests from remote. receives itemid & itemtype as Specific Content from DB and Category of Item
     */

    function html_data(){
        $itemid = $this->input->get('itemid');
        $itemtype = $this->input->get('itemtype');

       // echo $itemtype;
        $output = "";
        switch(trim($itemtype)){
            case 'structure_semesters':
                $output = "Semester Structures";
                break;
            case 'files':
                  switch($itemid){
                      case 'deleted_loans_files':
                          $output= $this->load->view('common/data/file_list',array('loan_type'=>'deleted_loan'),true);
                          break;
                      case 'loans_files':
                          $output= $this->load->view('common/data/file_list',array('loan_type'=>'loan'),true);
                          break;
                      case 'students_list':
                          $output= $this->load->view('common/data/file_list',array('loan_type'=>'students_list'),true);
                      default:
                          //echo $itemid;
                       break;
                  }
                break;
            default:
                $this->load->view('common/data/'.'dt_'.$itemtype,$this->commondata);
                return;
           break;
        }
        $this->output->set_content_type('html')->set_output($output);
    }

    /**
     * Load Admin Contents
     */

    function load_content(){

    }

    function user_info(){
        $output = "<h3>User Information</h3>";
        $this->output->set_content_type('html')->set_output($output);
    }

    function login_status(){

       return $this->session->userdata('login_status');
    }

    /** Validation functions */
    function radio_check($str){
        if(!isset($str)||empty($str)||$str=='')
        {
            $this->form_validation->set_message("radio_check","%s is required");
            return false;
        }
        else
        {
            return true;
        }
    }


    function select_check($str)
    {
        $str =trim($str,"\n\t\x0B");

        if ($str == 'select'|| $str == 'Select' || $str == '--' || $str=='')
        {
            $this->form_validation->set_message('select_check', '%s is Empty');

            return FALSE;
        }
        else
        {

            return true;
        }
    }


    function validschool($str){
        if($this->select_check($str)){
            if(preg_match("/S|P|s|p|U|u\d{4}\/\d{4}\/\d{4}/",$str)){

                if($this->find_schoolid(true)){
                    if($this->sas_system->check_applicant($str)){
                        return true;
                    }else{
                        $this->form_validation->set_message('validschool','This Id is Registered');
                        return false;
                    }

                }else{
                    $this->form_validation->set_message('validschool','No Associated Shool found');
                    return false;
                }}
            else{
                $this->form_validation->set_message('validschool','Invalid Index No.');
                return false;
            }
        }else{
            $this->form_validation->set_message('validschool','Form Four Index is Empty');
            return FALSE;
        }
    }

    function phonecheck($phoneno){
        if($this->personal_check($phoneno)){
            $phoneno = trim(str_replace("-", "", $phoneno),"+ ");
            if(strlen($phoneno) == 10 && is_numeric($phoneno) && substr($phoneno, 0,1) == 0){
                return true;
            }elseif(strlen($phoneno) == 12 && is_numeric ($phoneno)){
                return true;
            }elseif( strlen($phoneno) == 13 && substr($phoneno, 0,1)=='+' && is_numeric(substr($phoneno, 1,12))){

                return true;
            }else{
                //echo "count " . strlen($phoneno) . " no." .substr($phoneno, 1,12);
                // die();
                $this->form_validation->set_message('phonecheck','Invalid Phone No');
                return false;
            }
        }else{
            $this->form_validation->set_message('phonecheck','Empty Phone No');
            return false;
        }
    }

    function age_check($str){
        if($this->personal_check($str)){
            if($this->date_check($str)){
                $appage = date("Y",strtotime($str));
                $currYear = date('Y',time());
                if($appage < $currYear - 5){
                    return true;
                }else{
                    $this->form_validation->set_message('age_check', 'Invalid Birthdate entered!');
                    return false;
                }}else{
                $this->form_validation->set_message('age_check', 'Please Enter dd/mm/yyyy');
                return false;
            }
        }else{
            $this->form_validation->set_message('age_check', '%s is Required');
            return false;
        }
    }

    function date_check($date)
    {
        // $ddmmyyy='/(0[1-9]|[12][0-9]|3[01])[- /](0[1-9]|1[012])[- /](19|20)[0-9]{2}/';
        $ddmmyy ='(19|20)\d{2}[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])';

        if(preg_match("/$ddmmyy/", $date)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('date_check', 'Please enter mm-dd-yyyy');
            return FALSE;
        }
    }

    function boxaddresscheck($str){
        $str =trim($str,"\n\t\x0B - .");
        if($str =="" || $this->input->post('contact_address')==$this->input->post('permanent_address'))
        {
            $this->form_validation->set_message('boxaddresscheck', '%s Is Required');
            if($this->input->post('contact_address')==$this->input->post('permanent_address'))
            {
                $this->form_validation->set_message('boxaddresscheck', 'Addresses Match');
            }
            return false;
        }
        else {
            $str = strtoupper($str);
            $boxparten = "/^([P.O BOX]+\s{1}[0-9]?)/";
            if(true)//(preg_match($boxparten,$str))
            {

                return true;
            }
            else {
                $this->form_validation->set_message('boxaddresscheck', 'Invalid Box Address');
                return false;
            }
        }
    }

    function personal_check($str){
        $str =trim($str,"\n\t\x0B - .");

        if ($str == '' || $str == '--' || $str =='255 --- --- ---' || $str == 'select'|| $str == '01/01/1910' || $str =='Enter Permanent Address')
        {
            $this->form_validation->set_message('personal_check', '%s is Required');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function get_user_template(){
       //var_dump($this->session->userdata);
        $userid = $this->session->userdata['login_data']['id'];
        $tpl = new PrintGenerator();
        $out = $tpl->get_my_templates($userid,$this->input->post('tplid'));

        $this->output->set_content_type('json')->set_output(json_encode($out));

    }
}
