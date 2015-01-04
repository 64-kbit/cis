<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
  class login extends CI_Controller{

      function __construct(){
      parent:: __construct();
          $this->load->model("System_core");
          $status = $this->System_core->test_configurations();
          $this->load->model("User_model");
          //$this->config = $this->System_core->config;s1355/0012/2013
          ob_clean();
  }

      function index(){
          $data = array();
          if($this->login_status()){

              redirect(base_url(). user_profile($this->session->userdata('login_mode')) ."/home");
          }
          $data += $this->System_core->common_view_data();
          $loginform = $this->input->post('login_form');
          $data['login_error'] = false;
          if($loginform){
              $this->form_validation->set_rules('username','Login ID','trim|required|callback_input_check');
              $this->form_validation->set_rules('password','Password','trim|required|callback_input_check');
             if( $this->form_validation->run()){
                 $succes = $this->User_model->validate_user($this->input->post('username'),$this->input->post('password'));
                 if(!$succes['error']){
                    redirect(base_url(). user_profile($this->session->userdata('login_mode')) ."/home");
                 }else{
                     $data['login_error'] = $succes['error'];
                 }
             }else{
                 $data['login_error'] = 'Error';
             }

          }

          $data['home_view'] = 'login';
            $data['body_class'] = 'loginpage';
          $data['cont_class'] = 'loginpanel';
          $data['inst_title'] = 'Login Instructions';
          $data['pg_title'] = $data['config']['org_abbr']."-". $data['sys_name'] . ' : Login ';
          $data['jsfiles'] = 'login_js';
          $this->load->view('tpl/login_tpl',$data);

      }

      function login_status(){
          return $this->session->userdata('login_status');
      }

      function input_check($input){
          if(empty($input)){
              $this->form_validation->set_message('input_check','%s Invalid Input');
              return false;
          }else{
              true;
          }
      }

// handler for new students registering to cores account

      function new_student_account(){
          if($this->login_status()){

              redirect(base_url(). user_profile($this->session->userdata('login_mode')));
          }
          $data = array();
          $data += $this->System_core->common_view_data();
          $loginform = $this->input->post('reset_password');
          $data['login_error'] = false;
          if($loginform){
              $this->form_validation->set_rules('username','Login ID','trim|required|callback_input_check');
              $this->form_validation->set_rules('password','Password','trim|required|callback_input_check');
              if( $this->form_validation->run()){
                  $succes = $this->User_model->validate_user($this->input->post('username'),$this->input->post('password'));
                  if(!$succes['error']){
                      redirect(base_url(). user_profile($this->session->userdata('login_mode')) ."/home");
                  }else{
                      $data['login_error'] = $succes['error'];
                  }
              }else{
                  $data['login_error'] = 'Error';
              }

          }

          $data['home_view'] = 'register_student';
          $data['pg_title'] = $data['sys_name'] . ' : New Student Account ';
          $data['body_class'] = 'regpanel';
          $data['cont_class'] = 'regpage';
          $data['inst_title'] = 'Creating New Account Instructions';
          $data['jsfiles'] = 'login_js';
          $this->load->view('tpl/login_tpl',$data);
      }

    function ajax_resume(){
        if($this->input->is_ajax_request()){
          //   var_dump($this->input->post());
            $this->form_validation->set_rules('username','Login ID','trim|required|callback_input_check');
            $this->form_validation->set_rules('password','Password','trim|required|callback_input_check');
            if( $this->form_validation->run()){
                $succes = $this->User_model->validate_user($this->input->post('username'),$this->input->post('password'));
                if(!$succes['error']){
                     $data['errors'] = false;
                     $data['message'] = "You have successfully Logged in Again!!. Please close this section and Open it Again!";
                    $data['data'] = $data['message'];
                }else{
                    $data['errors'] = true;
                    $data['data'] =  $succes['error'];
                    $data['error'] = 1;
                   $data['fields'] = array('username'=>$succes['error']);
                    $data['message'] = "Failed to Login, " . $data['data'];
                }
            }else{
                $data['message'] = 'Errors in the Password or Username/Login ID';
                $data['errors'] = true;
                $data['error'] = 1;
                $data['data'] = $data['message'];
                $data['fields'] =  $this->form_validation->error_array();
            }
            $this->output->set_content_type('json')->set_output(json_encode($data));
        }else{
           $this->index();
        }
    }

      function mail_password(){
          if($this->login_status()){
              redirect(base_url(). user_profile($this->session->userdata('login_mode')));
          }
          $data = array();
          $data += $this->System_core->common_view_data();
          $loginform = $this->input->post('reset_password');
          $incoming = $this->input->get('mail');
          $data['login_error'] = false;
          if($loginform && $incoming){
              $this->form_validation->set_rules('user_email','Email Address','trim|valid_email|required|callback_input_check');

              if( $this->form_validation->run()){
                  $user = new User();
                  $user->where('email_address',$this->input->post('user_email'))->get();
                  if($user->result_count()){
                      $this->load->model('emailtpl');
                        $mail = new EmailTpl();
                        $activationcode = $this->generate_activation_code($this->input->post('user_email'));
                      $user->account_status = 3;
                      $user->acc_activate_code = $activationcode;
                      $user->last_active = date("Y-m-d h:i:s",time());
                      $user->save();

                      $mailmsg = "Please Visit on the following link to change your password!!. <a href='".base_url() . "login/new_password?txid=".$activationcode ."' target='_blank' > Change my Password</a>";
                      $mail->send_change_password(array('message'=>$mailmsg,'email_address'=>trim($this->input->post('user_email'))));
                      $data['error'] = false;
                      $data['login_error'] = "Password Reset Instructions Sent to your Email Address";
                      $data['field'] ='user_email';
                  }else{
                      $data['error'] = true;
                      $data['login_error'] = "This Email Does not exist in our system!";
                      $data['field'] ='user_email';
                  }
              }else{
                  $data['error'] = true;
                  $data['field'] = 'user_email';
                  $msg =  $this->form_validation->error_array();
                  $data['login_error'] = $msg['user_email'];

              }
          }

          if($this->input->is_ajax_request()){
            $this->output->set_content_type('json')->set_output(json_encode($data));
          }else{
          $data['home_view'] = 'mail_pass';

          $data['pg_title'] = $data['sys_name'] . ' : Create new Password';
          $data['inst_title'] = 'How to Get New password Instructions';
          $data['jsfiles'] = 'login_js';
          $data['body_class'] = 'loginpage ';
          $data['cont_class'] = 'loginpanel';
          $this->load->view('tpl/login_tpl',$data);
          }
      }


    function new_password(){

        if($this->login_status()){

            redirect(base_url(). user_profile($this->session->userdata('login_mode')));
        }



        $data = array();
        $data += $this->System_core->common_view_data();
        $loginform = $this->input->get('txid');
        if(!trim($loginform)){
            redirect(base_url());
        }
        $data['login_error'] = false;
        $user = new User();
        $user->where(array("acc_activate_code"=>$loginform,'account_status'=>3))->get();

        if($user->result_count()){
            $lastactive = strtotime($user->last_active);

            if(time() - $lastactive < (15 * 60)){

                $data['valid_time'] = true;
            }else{
                $data['valid_time'] = false;
            }
            $data['userid'] = $user->login_id;
            $data['code_set'] = $loginform;
        }else{
            $data['code_set'] = false;
        }



        $data['home_view'] = 'new_password';
        $data['pg_title'] ="Create new password " . $data['sys_name'] ;
        $data['jsfiles'] = 'login_js';
        $data['body_class'] = 'loginpage ';
        $data['cont_class'] = 'loginpanel';
        $data['inst_title'] = 'Enter New Password';
        $this->load->view('tpl/login_tpl',$data);
    }

    function error_404(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $data['pg_title'] = "Page Not Found | ". $data['sys_name'] ;
        $this->load->view('tpl/error',$data);
       // echo "Page not found";
    }


    function change_user_password(){
        $loginform = $this->input->post('token');
        $validToke = $this->User_model->check_token($loginform);
        $form = $this->input->post('change_password_form');
        if(trim($form)){
            $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|callback_input_check');
            $this->form_validation->set_rules('password_confirm','Confirm','trim|required|matches[password]|callback_input_check');

            if($this->form_validation->run()){
                $user = new User();
                $user->where(array("acc_activate_code"=>$this->input->post('code_set'),'account_status'=>3))->get();

                if($user->result_count()){
                    $lastactive = strtotime($user->last_active);

                    if(time() - $lastactive < (15 * 60)){
                         $user->password = md5(trim($this->input->post('password')));
                        $user->account_status = 1;
                        $user->acc_activate_code = "";
                        $user->save();
                        $data['login_error'] = 'Password Successfully Updated! go to login Page';
                        $data['error'] = false;
                    }else{
                        $data['login_error'] = 'Expired Time Limit!!. You Must Request Password Again';
                        $data['error'] = 4;
                    }
                }else{
                    $data['login_error'] = 'Expired Time Limit!!. You Must Request Password Again';
                     $data['error'] = 4;
                }

            }else{
                $data['login_error'] = 'Passwords Have Errors';

                $data['error'] = 1;
                $data['fields']= $this->form_validation->error_array();

            }
        }

        $this->output->set_content_type('json')->set_output(json_encode($data));
    }

    private function generate_activation_code($type=false){
        $input = $this->input->post();
        if($type){
           $key = $type;
        }else{
            $key = $input['username'];
        }
        $str = sha1(md5(uniqid("Kaza_").md5($key . rand())));
        return $str;
    }

    function add_student_account(){
        $data = array();
        $data += $this->System_core->common_view_data();

        $data['login_error'] = false;

        $input = $this->input->post();
        $data['body_class'] = 'regpanel';
        $data['cont_class'] = 'regpage';
        $passwordstrong = strlen($this->input->post('password'));
        if($this->input->post('password') == $this->input->post('password_confirm') && $passwordstrong >=5)
        {
        $user = new User();
        $user->where("registration_number_id",$input['username'])->or_where('email_address',$input['email_address'])->get();
        if($user->result_count()){
            $data['error'] = true;
            $data['home_view'] = 'register_student';
            $data['message'] = 'User Already has an account';
        }else{
            $student = new StudentInfo();
            $datai = $student->get_basic_info($input['username']);
            $stdinfo = $datai['data'];

            if($datai['count']){
                if($datai['count'] > 1){
                    $data['home_view'] = 'register_student';
                    $data['error'] = true;
                    $data['message'] = 'Multiple Students Found!!. Specify the Correct Registration ID';
                }else{
                    $activationcode = $this->generate_activation_code();
                        $newuserdata = array(
                        'username' => trim($input['username']),
                        'password' => trim($input['password']),
                        'email_address' => trim(strtolower($input['email_address'])),
                        'first_name' => $stdinfo->first_name,
                        'last_name' => $stdinfo->last_name,
                        'middle_name' => $stdinfo->middle_name,
                        'activation_code' => $activationcode,
                        'gender' => $stdinfo->gender
                    );

                   $status =  $user->add_new_student_user($newuserdata,1);

                    if($status['error'] == false){
                        $student->has_cis_account = 1;
                        $student->where('id',$stdinfo->id);
                        $student->update(array('has_cis_account'=>1)) ;
                      //  $student->save();
                        $data['body_class'] = 'loginpage ';
                        $data['cont_class'] = 'loginpanel';
                        $this->load->model('emailtpl');
                        $mailmsg = "Please Visit on the following link to activate your account!!. <a href='".base_url() . "activate_account?txid=".$activationcode ."' target='_blank' >Activate your Account in order to login </a>";
                        $email = new EmailTpl();

                        $email->send_activation_code(array('email_address'=>$input['email_address'],'message'=>$mailmsg));
                        $data['home_view'] = 'register_student_success';
                        $data['message'] = '<span style="color:#ff5">Registration Successful!. Activation Code sent to your email.</span>';
                    }else{
                        $data['home_view'] = 'register_student';
                        $data['message'] = 'Signing up Failed! :: ' . $status['message'];
                    }


                }
            }else{
                $data['home_view'] = 'register_student';
                $data['error'] = true;
                $data['message'] = 'Student is not in our Database. Check with Admissions';
            }
        }
        }else{
            $data['home_view'] = 'register_student';
            $data['error'] = true;
            if($passwordstrong < 5){
                $data['message'] = 'Provided Password is Weak!. Make Sure it Has minimum of 6 characters';
            }else{
                $data['message'] = 'Provided Passwords Do not Match.';

            }
        }

        $data['pg_title'] = $data['sys_name'] . ' : Student Account Registration';
        $data['jsfiles'] = 'login_js';

        $data['inst_title'] = 'Creating New Account Instructions';
        $this->load->view('tpl/login_tpl',$data);

    }

    function activate_user(){
        $data = array();
        $data += $this->System_core->common_view_data();
        $txid = $this->input->get('txid');
        $user = new User();
        $user->where(array('acc_activate_code'=>$txid,'account_status'=>0))->get();
        if($user->result_count()){
            $user->account_status = 1;
            $user->save();
            $data['activateerror'] = false;
            $data['message'] = '<span style="color:#fff">Your account has been activated and is ready for use</span>';
        }else{
            $data['activateerror'] = true;
            $data['message'] = '<span style="color:#fff">Your account failed to be activated. Try Again or contact Help and Support</span>';

        }
        $data['home_view'] = 'register_student_activate_status';
        $data['pg_title'] = $data['sys_name'] . ' : Account Activation Status';
        $data['jsfiles'] = 'login_js';
        $data['body_class'] = 'loginpage ';
        $data['cont_class'] = 'loginpanel';
        $data['inst_title'] = 'Account Activation Stutus';
        $this->load->view('tpl/login_tpl',$data);
    }


    function student_status(){
       $input = $this->input->post();
        $message = array();
        switch($input['content']) {
            case 'studentid':
                $user = new User();
                $user->where("registration_number_id",$input['stid'])->get();
                if($user->result_count()){
                    $message['error'] = true;
                    $message['message'] = 'User Already has an account';
                }else{
                    $student = new StudentInfo();
                    $data = $student->get_basic_info($input['stid']);

                    if($data['count']){
                        if($data['count'] > 1){
                            $message['error'] = true;
                            $message['message'] = 'Multiple Students Found!!. Specify the Correct Registration ID';
                        }else{
                            if($data['data']->is_active == 1){
                            $message['error'] = false;
                            $message['message'] = 'Available Under: ' . $data['data']->display_name ."(".$data['data']->code_name . ") of Year " . $data['data']->start_year . " : Gender " . $data['data']->gender ;
                            }else{
                                $message['error'] = true;
                                $message['message'] = "Your Data Exists. But You have been removed from the system. E.g DISCO or you are a Graduate!! or Your information in the Database is Incomplete! Contact with Admissions Office for More Information ";
                            }
                        }

                    }else{
                        $message['error'] = true;
                        $message['message'] = 'Student is not in our Database. Check with Admissions';
                    }
                }

                break;
            case 'emailaddress':
                $user = new User();
                $user->where("email_address",$input['stid'])->get();

                if($user->result_count()){
                    $message['error'] = true;
                    $message['message'] = 'This Email is Already registered with another user';
                }else{
                    $message['error'] = false;
                    $message['message'] = 'Email Available';
                }


                break;
        }

        $this->output->set_content_type('json')->set_output(json_encode($message));
        //var_dump($input);
    }

      function logout(){
        $user = new User();
          $user->last_active = date_convert(time(),true);
          //$user->last_login = date_convert(time(),true);
          $user->login_status = 0;
          $user->save();
        $this->session->sess_destroy();
          redirect(base_url()."login");
      }
  }
