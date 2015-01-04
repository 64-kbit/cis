<?php 
class SASApplicant extends CI_Model{
            protected $choices;
            public function __construct() {
        parent::__construct();

        $this->choices = 4;// $this->sas_system->config['choices'];

                $this->sasdb = $this->load->database('sas_db',true);

            }
            function db_validate($forein)
	{
                if($forein){
                    $userid = $this->input->post('email_address');
                }else{
                    $userid = $this->input->post('form_four_index');
                }
		$this->sasdb->where('form_four_index',$userid);
		$this->sasdb->where('password',md5($this->input->post('password')));
		
		$query = $this->sasdb->get('applicant_acc');
		
		if($query->num_rows == 1)
		{
			$row = $query->row();
                $data = array(
                    'firstname' => $row->first_name,
                    'lastname' => $row->last_name,
                    'form_four_index' => $row->form_four_index,
                    'role' => strtolower($row->role),
                    'validated' => true,
                    'foreign_student' => $row->app_type
                    );
                
                    $this->session->set_userdata($data);
                    
                        $this->update_login_status($row->form_four_index, 1,1);
			return true;
			
			}else{
			return false;
                        }
		}

    function application_progress($indeNo){
        $data = $this->get_applicant_info($indeNo);

        $progress = array();


         if($data['account_status']){
        if(
            $this->test_field($data['firstname']) &&  $this->test_field($data['last_name']) &&
            $this->test_field($data['gender']) &&  $this->test_field($data['maritalstatus']) &&
            $this->test_field($data['nationality']) &&  $this->test_field($data['place_of_birth']) &&
            $this->test_field($data['birthdate']) &&
            $this->test_field($data['email_address']) &&  $this->test_field($data['mobile_number']) &&
            $this->test_field($data['religion'])
        ){
            $progress['personal'] = 1;
        }else{
            $progress['personal'] = 0;
        }
        // education details test

        if($this->test_field($data['credit_points'])){
            if($data['attended_veta'] && !$data['a_level_status']){

                if($this->test_field($data['veta_year']) && $this->test_field($data['veta_course']) &&  $this->test_field($data['veta_course']) && $this->test_field($data['veta_center'])){
                    $progress['education'] = 1;
                }else{

                    $progress['education'] = 0;
                }
            } else if($data['a_level_status'] && !$data['attended_veta']){
                if($this->test_field($data['a_level_year']) && $this->test_field($data['a_level_center']) &&  $this->test_field($data['a_level_exam_authority']) && $this->test_field($data['a_level_school'])){
                    $progress['education'] = 1;
                }else{
                    $progress['education'] = 0;
                }
            }else{
                $progress['education'] = 1;
            }

        }else{
            $progress['education'] = 0;
        }

        if($this->test_field($data['programselections']['entry_mode']) || $data['programselections']['entry_mode'] == 0 && $this->test_field($data['preffered_session'])){
            $progress['selection'] = 1;
        }else{
            $progress['selection'] = 0;
        }

        if($data['attended_veta']){
            if($this->test_field($data['veta_certificate']) && $this->test_field($data['photo']) && $this->test_field($data['payinslip']) && $this->test_field($data['birthcertificate']) && $this->test_field($data['o_level_certificate'])){
                $progress['attachments'] = 1;
            }else{
                $progress['attachments'] = 0;
            }
        }
        elseif($data['a_level_status']){
            if($this->test_field($data['a_level_certificate']) && $this->test_field($data['photo']) && $this->test_field($data['payinslip']) && $this->test_field($data['birthcertificate']) && $this->test_field($data['o_level_certificate'])){
                $progress['attachments'] = 1;
            }else{
                $progress['attachments'] = 0;
            }
        }else{
            if($this->test_field($data['photo']) && $this->test_field($data['payinslip']) && $this->test_field($data['birthcertificate']) && $this->test_field($data['o_level_certificate'])){
                $progress['attachments'] = 1;
            }else{
                $progress['attachments'] = 0;
            }
        }
             if($this->test_field($data['sn']) && ($data['progresstatus'] == 'submitted' || $data['progresstatus'] == 'selected') ){
                 $progress['submission'] = 1;
             }else{
                 $progress['submission'] = 0;}
             return $progress;
         }
    }
              
 function test_field($input){
     $input = trim($input,'/n null \n\t\x0B - .');
     if($input =='' || $input == null){
         return false;
     }else{
         return true;
     }
 
     
     }
     
     function get_applicant_acc($appid){
         //$this->sasdb->where('form_four_index',$appid);
         $sql = "SELECT el.abbreviation as education,ac.form_four_index,ac.app_type,ac.login_status,ac.c_timestamp,ac.comments,ac.email_address,ac.registered_date,
ac.gender,ac.application_status,ac.last_logout,ad.applied_entry,
ad.app_id,ad.attach_photo as photo,ad.first_name,ad.middle_name,ad.last_name,ad.status as progress,ad.ed_level as cert FROM applicant_acc as ac
JOIN applicant_details as ad ON ac.form_four_index = ad.form_four_index 
LEFT JOIN ed_levels as el ON el.id = ad.ed_level
where ac.form_four_index = '$appid';
";
         $data = $this->sasdb->query($sql);
         if($data->num_rows() == 1){
             $result = $data->result_array();

             return $result[0];
         }else{

             return 0;
         }
     }


    function get_applicant_info($formfourindex)
    {
        $this->sasdb->where('form_four_index',$formfourindex);
        $query = $this->sasdb->get('applicant_details');
        $this->sasdb->where('form_four_index',$formfourindex);
        $accinfo = $this->sasdb->get('applicant_acc');
        $app_sess = $this->session->userdata('new_data');
        //!$app_sess
        if(true){
            if($query->num_rows == 1 && $accinfo->num_rows ==1)
            {
                $row = $query->row();
                $accdata = $accinfo->row();
                if( $row->status == 'selected'){
                    $selStatus = $this->get_selected_course($row->form_four_index);

                }else{
                    $selStatus = 0;
                }
                $ed_level = $this->get_applicant_level($row->form_four_index);
                $programchoices = $this->getmemberselections($row->form_four_index);

                $newData = array(
                    "userid" => $row->form_four_index,
                    "firstname" => $row->first_name,
                    "last_login" => strtotime($accdata->last_logout),
                    "dateregistered" => strtotime($accdata->registered_date),
                    "birthcertificate" => $row->attach_birthcertificate,
                    "payinslip" => $row->attach_payinslip,
                    "photo" => $row->attach_photo,
                    "maritalstatus" => $row->marital_status,
                    "middle_name" => $row->middle_name,
                    "last_name" => $row->last_name,
                    "gender" => $row->gender,
                    "birth_country" => $row->birth_country,
                    "nationality" => $row->nationality,
                    "religion" => $row->religion,
                    "place_of_birth" => $row->place_of_birth,
                    "birthdate" => $row->dob,
                    "progresstatus" => $row->status,
                    "mobile_number" => $row->mobile_number,
                    "email_address" => $row->email_address,
                    "permanent_address" => $row->permanent_address,
                    "contact_address" => $row->contact_address,
                    "preffered_session" => $row->preffered_session,
                    "disabilities" => $row->disabilities,
                    "fee_payment" => $row->fee_payment,
                    'fee_status' => $this->sas_system->calculate_applicant_dept($row->form_four_index,$row->foreign_student,2),

                    "programselections" => $programchoices,
                    "selected_course" => $selStatus,
                    'account_status'=>$accdata->application_status,
                    'applied_entry' =>$row->applied_entry,
                    "o_level_year" => $row->o_level_year,
                    "credit_points" => $row->credit_points,
                    "certificates_status" => $row->certificates_status,
                    "o_level_center" => $row->o_level_centerno,
                    "o_level_certificate" => $row->o_level_certificate,
                    "o_level_physics" => $row->o_level_physics,
                    "o_level_maths" => $row->o_level_maths,
                    "foreign_student" => $row->foreign_student,
                    "attended_veta" => $row->attended_veta,
                    "a_level_status" =>$row->a_level_status,
                    "verification_status" =>$row->certificates_status,
                    'curr_certificate' =>$row->ed_level,
                    "level" => $this->sas_system->get_edlevelfromid($row->ed_level,'code',0),
                    'sn' => $row->app_id,
                    'selection_status' =>$this->get_selected_course($row->form_four_index),
                    "issues" => $this->sas_system->get_applicant_issues($row->form_four_index),
                    'account_status'=>$accdata->application_status,
                    'surveyed' => $accdata->comments,

                );
                if($row->foreign_student){

                    $newData['userid'] = $row->email_address;
                    $newData['o_level_country'] = $row->o_level_country;//$this->sas_system->get_edlevelfromid($row->ed_level,'country',0);
                    $newData['o_level_exam_authority'] = $this->sas_system->get_edlevelfromid($row->ed_level,'authority',0);
                    $newData['education_level'] = $row->ed_level;
                    $newData['foreign_ed_certificate'] = $row->foreign_ed_certificate;
                    $newData['curr_certificate'] = $this->sas_system->get_edlevelfromid($row->ed_level,'code',0);
                    $newData['o_level_school'] = $row->o_level_school;

                    $newData['foreign_ed_certificate'] = $row->foreign_ed_certificate;
                    $newData['o_level_indexno'] = $row->o_level_indexno;
                    $newData['equivalent_year'] = $row->equivalent_year;
                    $newData += array( "o_level_division" => '-',
                        "o_level_biology" => $row->o_level_biology,
                        "o_level_chemistry" => $row->o_level_chemistry,
                        "o_level_language" => $row->o_level_language,
                        'technical_education'=>0);
                }else{

                    if($this->sas_system->get_schooltype($row->form_four_index) && !$row->foreign_student){
                        $newData += array(
                            'w_shop' => $row->w_shop,
                            'w_draw' => $row->w_draw,
                            'w_elect' => $row->w_elect,
                            'technical_education' => 1,
                            "o_level_biology" => '-',
                            "o_level_chemistry" => '-',
                            "o_level_language" =>'-',
                            "o_level_division" => '-'
                        );
                    }else{
                        $newData += array( "o_level_division" => $row->o_level_div,
                            "o_level_biology" => $row->o_level_biology,
                            "o_level_chemistry" => $row->o_level_chemistry,
                            "o_level_language" => $row->o_level_language,
                            'technical_education'=>0);
                    }

                    $newData += array(
                        "o_level_country" => 'Tanzania',
                        "o_level_school" => $this->sas_system->get_shoolname($row->form_four_index),
                        "o_level_exam_authority" => $this->sas_system->get_edleveldata('csee','tanzania','authority'),
                        "o_level_indexno" => $row->form_four_index,
                    );

                    if($row->attended_veta){
                        $newData += array(
                            "veta_grade" => $row->veta_grade,
                            "veta_center" => $row->veta_center,
                            "veta_year" => $row->veta_year,
                            'veta_cert_type'=>$row->veta_cert_type,
                            "veta_certificate" => $row->veta_certificate,
                            "veta_course" => $row->veta_course,
                        );
                    }
                    // elseif($row->a_level_status){
                    $newData += array(
                        "a_level_country" => 'Tanzania',//$row->a_level_country,
                        "a_level_year" => $row->a_level_year,
                        "a_level_center" => $row->a_level_centerno,
                        "a_level_exam_authority" => $this->sas_system->get_edleveldata('acsee','tanzania','authority'),
                        "a_level_school" => $this->sas_system->get_shoolname($row->a_level_centerno),
                        "a_level_certificate" => $row->a_level_certificate,
                        "a_level_physics" => $row->a_level_physics,
                        "a_level_maths" => $row->a_level_maths,
                        "a_level_indexno" => $row->a_level_indexno,
                        "a_level_qualification" => $row->a_level_qualification,
                        "a_level_major" => $row->a_level_major,
                        "a_level_division" => $row->a_level_division,
                    );

                }




                $data = array(
                );
            }
            $this->session->userdata['application_data'] = false;//$newData;
            $this->session->set_userdata('new_data',true);
        }else{
            $newData = $this->session->userdata['application_data'];
        }


        //echo sizeof($newData,3);die();

        return $newData;

    }


function update_comments($userid){
    $answers[0] = array('like the system','do not like the system');
    $answers[1] = array('Easy to use','Easy-Hard','Difficult');
    $answers[2] = array('no problems','faced problems');
  $like = $this->input->post('qn1');
  $dificult = $this->input->post('qn2');
  $problems = $this->input->post('qn3');
  $comments = $this->input->post('comments');
  
  $bicomment = "{".$like."}{".$dificult."}{".$problems."}{".$comments."}";
 $result = $this->sasdb->query("UPDATE applicant_acc SET comments = '$bicomment' WHERE form_four_index='$userid'");
 return $result;
}

function verify_useraccount(){
    $fname = $this->input->post('first_name');
    $lname = $this->input->post('last_name');
    $email = $this->input->post('email_address');
    $apptype = $this->input->post('education');
    $gender = $this->input->post('gender');
    $this->sasdb->where(array('form_four_index'=>$email,'first_name'=>$fname,'last_name'=>$lname,'gender'=>$gender,'app_type'=>$apptype));
    $data = $this->sasdb->get('applicant_acc');
    if($data->num_rows == 1){
        return true;
    }else{
        return false;
    }
}


public function get_applicant_level($id){
    
   $data = $this->sas_system->get_applicant_level($id);
    return $data;
}

public function update_login_status($id,$status,$state = 1){
 if($status== 1 or $status == 0){
    
     $time = date('Y-m-d H:i:s',time());
     if($state ==1){
       $result = $this->sasdb->query("UPDATE applicant_acc SET c_timestamp='$time',login_status={$status} where form_four_index = '{$id}'");
       
     }else{
        $result = $this->sasdb->query("UPDATE applicant_acc SET last_logout='$time',login_status={$status} where form_four_index = '{$id}'");
     }
    return $result;
 }   
 return 0;
}

private function get_selected_course($appid){
    $status = array();
    $result = $this->sasdb->query("SELECT course_code AS code, name, priority AS choice
FROM applicant_choices
JOIN courses ON courses.code = applicant_choices.course_code
WHERE applicant_choices.status =2
AND selected =1
AND applicant_id = '".$appid."'");
    if($result->num_rows() == 1){
        $result = $result->result_array();
        
        $status['code']=$result[0]['code'];
        $status['name']=$result[0]['name'];
        $status['choice']=$result[0]['choice'];
    }else
    {
        $status = 0;
    }
    
    return $status;
}
	function db_edit($table)
	{
		$this->sasdb->where('form_four_index',$this->session->userdata('form_four_index'));
		//$this->sasdb->where('password',md5($this->input->post('password')));
		
		$query = $this->sasdb->get($table);
		
		if($query->num_rows == 1)
		{
			$row = $query->row();
                 $data = array(
                    'first_name' => $row->first_name,
                    'middle_name' => $row->middle_name,
                    'last_name' => $row->last_name,
					'gender' => $row->gender,
					'nationality' => $row->nationality,
					'religion' => $row->religion,
					'dob' => $row->dob,
					'place_of_birth' => $row->place_of_birth,
					'status' => $row->status,
					'mobile_number' => $row->mobile_number,
					'email_address' => $row->email_address,
					'permanent_address' => $row->permanent_address,
					'contact_address' => $row->contact_address
                    );
           // $this->session->set_userdata($data);
           
			return true;
			
			}
			return false;
		}

function validate_applicant($applicant_Id){
    
}
                
function upload_attachments(){
	
	
}

function create_member($foreign)
{
    
        if($foreign){
            $new_member_insert_data = array(
             'registered_date'=>date("Y-m-d H:i:s",time()),
            'first_name' => ucfirst(strtolower($this->input->post('first_name'))),
            'last_name' => ucfirst(strtolower($this->input->post('last_name'))),
            'form_four_index' => strtolower($this->input->post('email_address')),
            'password' => md5($this->input->post('password')),
            'email_address' => strtolower($this->input->post('email_address')),
            'app_type' => 1,'gender'=>$this->input->post('gender'),
            'role' => 'applicant',   'application_status' => 1
        );
            
            
            $a_level_status = 0;
            $vetaStatus = 0;
            
            $new_member_details = array(
            'first_name' => ucfirst(strtolower($this->input->post('first_name'))),
            'last_name' => ucfirst(strtolower($this->input->post('last_name'))),
            'form_four_index' => strtolower($this->input->post('email_address')),
            'gender'=>$this->input->post("gender"),'foreign_student' => 1,
            'middle_name'=>ucfirst(strtolower($this->input->post("middle_name"))),
            'email_address' => strtolower($this->input->post('email_address')),
            'nationality' => $this->input->post('nationality'),
            'birth_country' => $this->input->post('nationality'),
            'status'=>'progress',
            'a_level_status'=>$a_level_status,
            'attended_veta' => $vetaStatus
        );
            
            $this->sas_system->update_visitor_count('reg_todate_foreign');
            
        }else{
            
               $apptype = $this->input->post('education_level');
         switch($apptype){
             case "csee":
                 $a_level_status = 0;
                 $vetaStatus = 0;
                 break;
             case 'acsee':
                  $a_level_status = 1;
                 $vetaStatus = 0;
                 break;
             case 'veta':
                  $a_level_status = 0;
                 $vetaStatus = 1;
                 break;
             case 'gce':
                  $a_level_status = 0;
                 $vetaStatus = 0;
                 break;
             case 'gcse':
                  $a_level_status = 0;
                 $vetaStatus = 0;
                 break;
         }
            
           $new_member_insert_data = array(
             'registered_date'=>date("Y-m-d H:i:s",time()),
            'first_name' => ucfirst(strtolower($this->input->post('first_name'))),
            'last_name' => ucfirst(strtolower($this->input->post('last_name'))),
            'form_four_index' => strtoupper($this->input->post('form_four_index')),
            'password' => md5($this->input->post('password')),
            'application_status' => 1,
            'email_address' => strtolower($this->input->post('email_address')),
            'app_type' => 0,'gender'=>$this->input->post('gender'),
            'role' => 'applicant'
        ); 
           
           // echo var_dump($this->input->post());
           $indexNoDetails = explode("/",$this->input->post('form_four_index'));
           //echo var_dump($indexNoDetails);
           
         
        $new_member_details = array(
            'first_name' => ucfirst(strtolower($this->input->post('first_name'))),
            'last_name' => ucfirst(strtolower($this->input->post('last_name'))),
            'form_four_index' => strtoupper($this->input->post('form_four_index')),
            'gender'=>$this->input->post("gender"),'foreign_student' => 0,
            'middle_name'=>ucfirst(strtolower($this->input->post("middle_name"))),
            'email_address' => strtolower($this->input->post('email_address')),
            'o_level_centerno'=>$indexNoDetails[0],
            'o_level_indexno'=>$indexNoDetails[1],
            'o_level_year' =>$indexNoDetails[2],
            'status'=>'progress',
             'ed_level' => $this->sas_system->get_edleveldata(strtolower($this->input->post('education_level')),'tanzania','id'),
            'a_level_status'=>$a_level_status,
            'attended_veta' => $vetaStatus
        );
        
        $this->sas_system->update_visitor_count('reg_todate_local');
        
        }
        
        $genderPriority['F'] = 0;$genderPriority['M'] = 1;
        
        $qualifications = array("a_level_status"=>!$a_level_status,"veta_status"=>!$vetaStatus,'form_four_index'=>$new_member_details['form_four_index'],'gender'=>$genderPriority[strtoupper($new_member_details['gender'])],'c_timestamp'=>date('Y-m-d H:m:s',time())); 
          
        $transactionInfo = array('app_id' => $new_member_details['form_four_index'],'verified'=>1,'checkin_date'=>date('Y-m-d H:m:s',time()));
        $transid = $this->input->post('payintransact_id');
        $insert = $this->sasdb->insert('applicant_acc',$new_member_insert_data);
        $insert = $this->sasdb->insert('applicant_details', $new_member_details);
        
        if($insert){
            $this->sasdb->insert('applicant_qualifications',$qualifications);};
             $existence = $this->sas_system->check_transaction($transid);
             if($existence){
        $this->sasdb->where('transc_id',$transid);
        $insert = $this->sasdb->update('payment_transactions',$transactionInfo);
             }else{
                 $this->sasdb->insert('payment_transactions_post',array('payin_date'=>date('Y-m-d H:m:s',time()),'amount'=>$this->input->post('paid_fee'),'trans_id'=>$transid,'applicant_id'=>$new_member_details['form_four_index'],'status'=>0));
             }
        return $insert;
        
}

    function update_applicant_id($newid,$currid){
        $index = explode("/",$newid);
        $em = substr_count($newid,'@');


        if(is_array($index) && $em == 0){
            if($this->sas_system->validschool($newid)){
            $this->sasdb->where('form_four_index',$currid);

            $this->sasdb->update('applicant_acc',array('form_four_index'=>strtoupper($newid)));
            $this->sasdb->where('form_four_index',$newid);
            $this->sasdb->update('applicant_details',array('o_level_centerno'=>strtoupper($index[0]),'o_level_indexno'=>$index[1],'o_level_year'=>$index[2]));

                $newname =    str_replace('/', '_',  strtoupper($newid));
                $currname = str_replace('/', '_',  strtoupper($currid));


                if(is_dir(UPLOAD_DIR.$currname)){
                    rename(UPLOAD_DIR.$currname,UPLOAD_DIR.$newname);
                }


                $this->sasdb->query("DELETE FROM visitor_session where user_data like '%$currid%'");


            }else{
                return false;
            }
        }else{
            $this->sasdb->where('form_four_index',$currid);
            $this->sasdb->update('applicant_acc',array('form_four_index'=>strtolower($newid),'email_address'=>  strtolower($newid)));
            $this->sasdb->where('form_four_index',$newid);
            $this->sasdb->update('applicant_details',array('email_address'=>strtolower($newid)));
                $newname =    $newid;
            $currname = $currid;;


            if(is_dir(UPLOAD_DIR.$currname)){
                rename(UPLOAD_DIR.$newname,UPLOAD_DIR.$currname);
            }

            $this->sasdb->query("DELETE FROM visitor_session where user_data like '%$currid%'");
        }


    }

 function cal_points($grade)
       
	{
            $grade = strtoupper($grade);
            if($grade=='A' || $grade =='A+' || $grade =='A-') $point = 1;
            else if($grade=='B') $point = 2;
            else if($grade=='C') $point = 3;
            else if($grade=='D') $point = 4;
            else if($grade=='E') $point = 12;
            else if($grade=='F') $point = 12;
            else $point = 12;
            return $point;
	}
        
        
        function cal_points_2013($grade){
            $grade = strtoupper($grade);
            if($grade=='A' || $grade =='A+' || $grade =='A-') $point = 1;
            else if( $grade =='B+') $point = 2;
            else if($grade=='B' || $grade=='C' ) $point = 3;
            else if($grade=='D') $point = 4;
            else if($grade=='E') $point = 12;
            else if($grade=='F') $point = 12;
            else $point = 12;
            return $point;
	}


    function insert_info($data,$other,$table = 'applicant_details')
    {
        if($table=='applicant_details')
        {


            $new_member_insert_data = array(
                //'form_four_index' => $this->session->userdata('form_four_index'),
                'first_name' => $data['first_name'],
                'last_name' =>  $data['last_name'],
                'middle_name' =>  $data['middle_name'],
                'birth_country' =>  $data['bcountry'],
                'gender' =>  $data['gender'],
                'nationality' =>  $data['nationality'],
                'religion' =>  $data['religion'],
                'dob' => date('Y-m-d',strtotime(trim($data['dob']))),
                'place_of_birth' =>  $data['bplace'],
                'marital_status' =>  $data['marital'],
                'mobile_number' => str_replace("-","",ltrim($data['mobile'],'+')),
                'email_address' =>  $data['email'],
                'permanent_address' =>  $data['paddress'],//$this->input->post('permanent_address'),
                'contact_address' =>  $data['caddress'],
               // 'status' => 'progress'
            );

            $accUpdate = array(
                'first_name'=>$new_member_insert_data['first_name'],
                'last_name'=>$new_member_insert_data['last_name'],
                'gender'=>  strtoupper($new_member_insert_data['gender']),
                'email_address'=>  $new_member_insert_data['email_address']
            );

            $genderPriority['F'] = 0;$genderPriority['M'] = 1;
            $this->sasdb->where('form_four_index',$other['form_four_index']);
            $this->sasdb->update('applicant_acc',$accUpdate);

            $this->sasdb->where('form_four_index',$other['form_four_index']);
            $this->sasdb->update('applicant_qualifications',array('gender'=>  $genderPriority[strtoupper( $data['gender'])]));


            $this->sasdb->where('form_four_index',$other['form_four_index']);
            $insert = $this->sasdb->update($table,$new_member_insert_data);

            return $insert;
        }
    }
   
function submit_application($uid="",$value=""){
        if($uid =="")
        {
            $uid = $this->session->userdata("form_four_index");
        }
        if($value == "")
        {
            $value =1;
        }
        
        $data = array(
            "status" => $value==1?"submitted":"progress"
        );
       // echo var_dump($data,$uid);

        $data2 = array("status"=> $value==1?1:0);
        $data['app_id'] = $this->sas_system->generate_app_sn($uid);
       // for($v = 0; $v < 4; $v++){
        $this->sasdb->where('applicant_id',$uid);
        $insert = $this->sasdb->update('applicant_choices',$data2);
        //}
        $this->sasdb->where('form_four_index',$uid);
       $result =  $insert = $this->sasdb->update("applicant_details",$data);
       $this->sasdb->where('form_four_index',$uid);
       $result = $this->sasdb->update('applicant_qualifications',array('selected'=>0,'form_status'=> 1));
        //$this->sasdb->where('app_id',$this->session->userdata('form_four_index'));
        //$this->sasdb->update('applicant_issues',array('status'=>3));
        //$this->session->set_userdata('new_data',false);
       return $result;
}

    function update_education_info_foreign($appid,$data,$other){
        $educational_info = array();
        $qualifications = array();

            $educational_info += array( 'equivalent_year' => $data['eqyear']);
            $subjectGrades = array(
                "maths"=>$data['eqmath'],
                "physics"=>$data['eqphy'],
                "biology"=>$data['eqbios'],
                "chemistry"=>$data['eqchem'],
                "language"=>$data['eqeng'],
                "a_level_status"=>$other['a_level_status']
            );

            if($data['eqyear'] >= 2013){
                $educational_info += array(
                    'credit_points'=>$this->sas_system->check_minimum_2013($subjectGrades,true),
                    "o_level_maths" => $data['eqmath'],
                    "o_level_physics" =>$data['eqphy'],
                    "o_level_biology" => $data['eqbios'],
                    "o_level_chemistry" => $data['eqchem'],
                    "o_level_language" => $data['eqeng']);

                $qualifications += array(
                    'points'=>$this->sas_system->check_minimum_2013($subjectGrades,true),
                    "o_math" => $this->sas_system->cal_points_2013($data['eqmath']),
                    "o_phy" => $this->sas_system->cal_points_2013($data['eqphy']),
                    "o_bio" => $this->sas_system->cal_points_2013($data['eqbios']),
                    "o_chem" => $this->sas_system->cal_points_2013($data['eqchem']),
                    "o_eng" => $this->sas_system->cal_points_2013($data['eqeng'])
                );
            }else{
                $educational_info += array(

                    'credit_points'=>$this->sas_system->check_minimum($subjectGrades,true),
                    "o_level_maths" => $data['eqmath'],
                    "o_level_physics" =>$data['eqphy'],
                    "o_level_biology" => $data['eqbios'],
                    "o_level_chemistry" => $data['eqchem'],
                    "o_level_language" => $data['eqeng']);

                $qualifications += array(
                    'points'=>$this->sas_system->check_minimum($subjectGrades,true),
                    "o_math" => $this->sas_system->cal_points($data['eqmath']),
                    "o_phy" => $this->sas_system->cal_points($data['eqphy']),
                    "o_bio" => $this->sas_system->cal_points($data['eqbios']),
                    "o_chem" => $this->sas_system->cal_points($data['eqchem']),
                    "o_eng" => $this->sas_system->cal_points($data['eqeng'])
                );
            }

        $education_level =$data['fed_level'];
        if($education_level == 'other'){
            //$education_level = strtolower($this->input->post('specify_ed_code'));

            $result = $this->sas_system->add_neweducation(strtolower($data['specify_ed_code']),$data['specify_ed'],$data['o_level_exam_authority'],$data['foreign_exam_authority'],$data['o_country'],$data['foreign_exam_authority_code']);
            $education_level =  $this->sas_system->get_edleveldata(strtolower($data['specify_ed_code']),$data['o_country'],'id');
        }else{
            if(!is_numeric($education_level)){
                $education_level =  $this->sas_system->get_edleveldata(strtolower($data['fed_level']),$data['fcountry'],'id'); //$education_level =$data['fed_level'];
            }
        }

        //$this->sas_system->get_edlevelfromid($row->ed_level,'authority',0);
        $educational_info += array(
            'o_level_school' => $data['fschool'],
            'o_level_country' => $data['fcountry'],
            'o_level_year' => $data['fyear'],
            'foreign_year' => $data['fyear'],
            'o_level_exam_authority' =>$data['fauthority'],
            'o_level_indexno' => $data['findex'],
            'o_level_div' => 0,

            'ed_level'=> $education_level
        );

        $this->sasdb->where('form_four_index',$appid);
        $result = $this->sasdb->update('applicant_details',$educational_info);
            $this->sasdb->where('form_four_index',$appid);

            $this->sasdb->update('applicant_qualifications',$qualifications);

        return $result;

    }

    function update_education_info_tech($appid,$data,$other){
        $qualifications = array();
        $educational_info = array();

            $subjectGrades = array(
                "maths"=>$data['o_maths'],
                "physics"=>$data['o_maths'],
                "w_shop"=>$data['o_maths'],
                "w_elect"=>$data['o_maths'],
                "w_draw"=>$data['o_maths']
            );

            $qualifications += array(
                'points'=>$this->sas_system->check_minimum_technical($subjectGrades,true),
                "o_math" => $this->sas_system->cal_points($data['o_maths']),
                "o_phy" => $this->sas_system->cal_points($data['o_phy']),
                "w_shop" => $this->sas_system->cal_points($data['w_shop']),
                "w_elect" => $this->sas_system->cal_points($data['w_elect']),
                "w_draw" => $this->sas_system->cal_points($data['w_draw']),
                'technical_ed' => 1
            );

            $educational_info += array(
                'credit_points'=>$qualifications['points'],
                "o_level_maths" => $data['o_maths'],
                "o_level_physics" => $data['o_phy'],
                'o_level_biology' => '--',
                'o_level_language' => '--',
                'o_level_chemistry' => '--',
                "w_shop" => $data['w_shop'],
                "w_elect" =>$data['w_elect'],
                "w_draw" => $data['w_draw']);



        $educational_info += array(
            "a_level_status"=>0,
            'attended_veta'=> 0,
            'technical_ed'=>1,
        );

            $this->sasdb->where('form_four_index',$appid);
            $insert = $this->sasdb->update('applicant_details',$educational_info);
            $this->sasdb->where('form_four_index',$appid);
            $this->sasdb->update('applicant_qualifications',$qualifications);

        return $insert;

    }


    function update_education_info($appid,$data,$other){
        $table = 'applicant_details';

        $year = $data['o_year'];
            $educational_info = array();
            if($other['a_level_status'] == 1){
                $educational_info['ed_level'] = $this->sas_system->get_edleveldata('acsee','tanzania','id');
            }else{
                $educational_info['ed_level'] = $this->sas_system->get_edleveldata('csee','tanzania','id');
            }
            $qualifications = array();

                $subjectGrades = array(
                    "maths"=>$data['o_maths'],
                    "physics"=>$data['o_phy'],
                    "biology"=>$data['o_bios'],
                    "chemistry"=>$data['o_chem'],
                    "language"=>$data['o_eng'],
                    "a_level_status"=>$other['a_level_status'],
                );


                if(trim($year) >=2013){

                    $educational_info += array(
                        'credit_points'=>$this->sas_system->check_minimum_2013($subjectGrades,true),
                        "o_level_maths" =>$data['o_maths'],
                        "o_level_physics" => $data['o_phy'],
                        "o_level_biology" => $data['o_bios'],
                        "o_level_chemistry" => $data['o_chem'],
                        "o_level_language" => $data['o_eng']);

                    $qualifications += array(
                        'points'=>$this->sas_system->check_minimum_2013($subjectGrades,true),
                        "o_math" => $this->sas_system->cal_points_2013($data['o_maths']),
                        "o_phy" => $this->sas_system->cal_points_2013($data['o_phy']),
                        "o_bio" => $this->sas_system->cal_points_2013($data['o_bios']),
                        "o_chem" => $this->sas_system->cal_points_2013($data['o_chem']),
                        "o_eng" => $this->sas_system->cal_points_2013($data['o_eng'])
                    );
                }else{
                    $educational_info += array(
                        'credit_points'=>$this->sas_system->check_minimum($subjectGrades,true),
                        "o_level_maths" =>$data['o_maths'],
                        "o_level_physics" => $data['o_phy'],
                        "o_level_biology" => $data['o_bios'],
                        "o_level_chemistry" => $data['o_chem'],
                        "o_level_language" => $data['o_eng']);

                    $qualifications += array(
                        'points'=>$this->sas_system->check_minimum($subjectGrades,true),
                        "o_math" => $this->sas_system->cal_points($data['o_maths']),
                        "o_phy" => $this->sas_system->cal_points($data['o_phy']),
                        "o_bio" => $this->sas_system->cal_points($data['o_bios']),
                        "o_chem" => $this->sas_system->cal_points($data['o_chem']),
                        "o_eng" => $this->sas_system->cal_points($data['o_eng'])
                    );
                }


            if($other['a_level_status']== 1)
            {
                $educational_info += array(
                    "a_level_school" => $data['achool'],
                    "a_level_centerno" => strtoupper($data['acenterno']),//$this->input->post('s_type').four_digit_no($this->input->post('a_level_exam_center')),
                    "a_level_indexno" => four_digit_no($data['a_indexno']),
                    "a_level_year" => $data['ayear'],
                    "a_level_division" => $data['adivision'],
                    "a_level_major" => strtoupper($data['amajor']),
                    "a_level_qualification" => $data['a_otherqualify'],
                    "a_level_maths" =>  $data['amath'],
                    "a_level_physics" => $data['aphy'],
                );


                $qualifications += array('a_phy'=>$this->sas_system->cal_points($data['aphy']),'a_math'=>$this->sas_system->cal_points($data['amath']));
            }

        $educational_info += array(
            "o_level_school" => $data['o_school'],
            "o_level_centerno" =>strtoupper($data['o_center']),
            "o_level_exam_authority" =>strtoupper($data['o_authority']),
            "o_level_indexno" =>$data['o_index'],
            "o_level_country" => $data['o_country'],
            "o_level_year" => $data['o_year'],
            "o_level_div" => $data['division'],

            "a_level_status" => $other['a_level_status']);



        if($other['attended_veta']){
                $educational_info += array(
                    'veta_center'=>$data['vcenter'],
                    'veta_year'=>$data['vyear'],
                    'veta_cert_type'=>$data['vcert_type'],
                    'veta_course'=>$data['vcourse'],
                    'veta_grade'=>$data['vgrade']
                );
            }



            $this->sasdb->where('form_four_index',$appid);
            $insert = $this->sasdb->update($table,$educational_info);

            $this->sasdb->where('form_four_index',$appid);
            $this->sasdb->update('applicant_qualifications',$qualifications);


            return $insert;
            //echo var_dump($this->session);

    }


    function update_course_selection($appid,$data,$other){
        $table= 'applicant_details';
            $applicant_details = array(
                "fee_payment" => ucfirst(strtolower($other['fee_payment'])),
                "disabilities" => ucfirst(strtolower($other['disability'])),
                "preffered_session" => ucfirst(strtolower($other['session_selection']))
            );

            if($other['disability'] == 'Others'){
                $applicant_details["disabilities"] = $other["disability_specific"];
            }
            if($other['fee_payment']=='Others'){
                $applicant_details["fee_payment"] = $other['fee_payment_specific'];
            }

              if(is_array($data) && is_set($data['entrymode'])){
            $somedata = array();
            $deleted = array();$update = array();
            $mode =$data['entrymode'];

            $applicant_details['applied_entry'] = $mode;
            $this->sasdb->query("DELETE FROM applicant_choices WHERE applicant_id='".$this->session->userdata('form_four_index')."'");
            for($i=1;$i<=$this->choices;$i++) {

                $choice = array('applicant_id'=>$appid,"course_code"=>$data['choices'][$i],'entry_mode'=>$mode,"priority"=>$i,"status"=>0);//;
                $priority = $i;
                $result = $this->sasdb->get_where("applicant_choices",array('applicant_id'=>$appid,'priority'=>$priority));
                if($result->num_rows==0)
                {
                    $this->sasdb->insert("applicant_choices",$choice);
                }
                else
                {
                    $this->sasdb->update("applicant_choices",array("course_code"=>$data['choices'][$i],"status"=>0,'entry_mode'=>$mode),array('applicant_id'=>$appid,'priority'=>$priority));
                }

            }
        $u = $this->sasdb->update('applicant_qualifications',array('applied_entry'=>$mode),array('form_four_index'=>$appid));

    }
            $insert = $this->sasdb->update($table,$applicant_details,array('form_four_index'=>$appid));


            return $insert;

    }
function getmemberselections($appId){
    
        $result = $this->sasdb->get_where("applicant_choices",array('applicant_id'=>$appId));

        if($result->num_rows>0)
        {
                $memberselections = array();
                $memberselections['total_selections'] = 0;

                foreach ($result->result() as $selection) {
                    $memberselections[$selection->priority]= $selection->course_code;
                    $memberselections['total_selections'] += 1;
                    $memberselections['entry_mode'] = $selection->entry_mode;
                }

                return $memberselections;
        }
        return 0;
	}

function attachementsupdate($birthcert='',$passphoto='',$payinslip='',$olevelCert='',$alevelCert='',$vetaCert='',$foreignCert='',$appid){
		/*"birthcertificate" => $row->attach_birthcertificate,
			"payinslip" => $row->attach_payinslip,
			"photo" => $row->attach_photo,*/
			
	$applicantdetails = array(
	"o_level_certificate" => $olevelCert,
	"a_level_certificate" => $alevelCert,
	"attach_birthcertificate"=>$birthcert,
	"attach_payinslip"=>$payinslip,
	"attach_photo"=>$passphoto,
        "veta_certificate" => $vetaCert,
        "foreign_ed_certificate" => $foreignCert
	);
        
        while(list($id,$content) = each($applicantdetails))
        {
            
            if($content == "")
            {
               continue;
            }
            else {
                $newDetails[$id] = $content; 
            }
            
        }
        if(count($newDetails)>0){
            $insert = $this->sasdb->update('applicant_details',$newDetails,array('form_four_index'=>$appid));
             $this->sasdb->where('app_id',$appid);
             $this->sasdb->update('applicant_issues',array('attachment'=>0));
        }
 else {$insert = 0;}
  //$this->session->set_userdata('new_data',false);
	return $insert;
}
 }

?>
