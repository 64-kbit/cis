<?php
class SASAdmin extends CI_Model{
     public $sasdb ;
    public $systemsettings = array();
    public function __construct() {
        parent::__construct();

        $this->systemsettings = array();//$this->sas_system->config;

        $this->sasdb = $this->load->database('sas_db',true);
    }
    
    public function getsytemsettings(){
        
        return $this->systemsettings;
    
    }

    function applicant_online($appid = false){
        if($appid){
            $sql = $this->sasdb->query("SELECT * FROM visitor_session where user_data like '%$appid%'");
            if($sql->num_rows >  0){
                return true;
            }else{
                return false;
            }
        }
    }

    function remove_question($qnid){
        $result = $this->sasdb->query('delete from visitor_question_answers where qn_id=' . $qnid);
        $result2 = $this->sasdb->query('delete from visitor_question where id='.$qnid);
        return ($result && $result2);
    }


    function mail_selection_status($uid,$mode){

    }

    function get_applicant_selected_course($appid = false){
        if($appid){
           $si = " where aq.form_four_index = '$appid' ";
        }else{
            $si = "";
        }
           $sql = "
           SELECT aq.form_four_index as uid,aq.points,ad.registered_id as registrationNo, cn.code as course_code,cn.name as sel_course,ac.priority as choice_no,ac.entry_mode FROM applicant_qualifications as aq
            JOIN applicant_acc as acc on acc.form_four_index =aq.form_four_index
            JOIN applicant_details as ad on ad.form_four_index = aq.form_four_index
            JOIN applicant_choices as ac on ac.applicant_id = aq.form_four_index and ac.selected = 1 and ac.status = 2
            JOIN courses as cn on cn.code = ac.course_code $si order by course_code;

           ";
    }

    function reply_visitor($data = false){
        $reply = array('email'=>0,'faq'=>1,'both'=>2);

        $maildata= array();
        $mailto = array();
        $mailsubj = array();
        $mailbodymult = array();
        $othermaildata = array();
        if($data){
           // var_dump($data); //replyname
            if(isset($data['qn'])){
                     $mailCount = 0;
                foreach($data['qn'] as $id => $qn){
                    if($data['answer_select'][$qn] != '--'){
                        $insetData = array('qn_id'=>$qn,'reply_id'=>$data['answer_select'][$qn],'date_posted'=>date("Y-m-d H:i:s",time()));
                        $this->sasdb->insert('visitor_question_answers',$insetData);
                        if(count($data['reply_method'][$qn]) == 2){
                            $replyvia = 2;
                        }else{
                            $replyvia = $reply[$data['reply_method'][$qn][0]];
                            
                        }
                        $mail = 0;
                        
                        if($replyvia == 0 || $replyvia == 2){

                            $qndata = $this->get_question($qn);
                            $mail = $qndata['sender_email'];
                            $message = "You asked the following qn <span style='color:#4256ab'>".$qndata['question']."</span> on <span>".format_date($qndata['date_posted'],0,false)
                                .". </span><br>The following is the description of your Question ".$data['question_answer'][$qn]."<br> If you have more Inquiries. Please visit <a href='".base_url()."help' target='_blank'>DIT-Admission system: Help and Support</a>";

                            $maild["mailtplmoto"] = 'Skillful Mind comes with skilled hands.';
                            $maild['mailtpltitle'] = 'Reply to your Question/Enquiry asked on ' . format_date($qndata['date_posted'],0,0,false);

                            $maild['helpcontacts'] ='';
                            $nos = explode("\n",$this->systemsettings['help_support']);

                            foreach ($nos as $id=>$no){
                                if(!empty($no)){
                                    $maild['helpcontacts'] .= "(".$no.")<br>";
                                }}

                            $maild['mailtplbody'] = $this->load->view('mail/question_reply',array('replyby'=>'DIT-Admission Officer','date_replied'=>date('D d-M-y h:i:a',time()),'qn'=>$qndata['question'],'dt_posted'=>format_date($qndata['date_posted']),'answer'=>$data['question_answer'][$qn]),true);
                            $mailbody = $this->load->view('mail/mail',$maild,true);

                            $mailto[$mailCount] -= $mail;
                            $mailsubj[$mailCount] =  $maild['mailtpltitle'];
                            $mailbodymult[$mailCount] = $mailbody  ;
                            //$maildata[$id] = array('mail_to'=>$mail,'body'=>$mailbody,'subject'=>$maild['mailtpltitle']);
                            $othermaildata[$mailCount] = array('name'=>$qndata['sender_name'],'file'=>false,'altbody'=>$message);
                        }
                        
                        $qnstatus = array('ans_status'=>1,'replied_via' => $replyvia,'publish_status'=>$data['publish'][$qn],'status'=>$mail,$mail);
                        $this->sasdb->where('id',$qn);
                        $this->sasdb->update('visitor_question',$qnstatus);
                        
                        
                    }else{
                   }
                    $insetData = array('reply_by'=>$data['replyname']==""?"DIT-Utawala":$data['replyname'],'reply_contents'=>$data['question_answer'][$qn],'date_replied'=>date("Y-m-d H:i:s",time()));
                        $result = $this->sasdb->insert('visitor_replies',$insetData);
                        $insertId = $this->sasdb->insert_id();
                        $qnan = array('qn_id'=>$qn,'reply_id'=>$insertId,'date_posted'=>date("Y-m-d H:i:s",time()));
                        $this->sasdb->insert('visitor_question_answers',$qnan);
                        
                        

                    // send email to visitor is deemed by the replying partiy
                    if(count($data['reply_method'][$qn]) == 2){
                            $replyvia = 2;
                        }else{
                            $replyvia = $reply[$data['reply_method'][$qn][0]];
                        }
                        $mail = 0;
                        
                        if($replyvia == 0 || $replyvia == 2){

                            $qndata = $this->get_question($qn);
                            $mail = $qndata['sender_email'];
                            $message = "You asked the following qn <span style='color:#4256ab'>".$qndata['question']."</span> on <span>".format_date($qndata['date_posted'],0,false)
                                .". </span><br>The following is the description of your Question ".$data['question_answer'][$qn]."<br> If you have more Inquiries. Please visit <a href='".base_url()."help' target='_blank'>DIT-Admission system: Help and Support</a>";

                            $maild["mailtplmoto"] = 'Skillful Mind comes with skilled hands.';
                            $maild['mailtpltitle'] = 'Reply to your Question/Enquiry asked on ' . format_date($qndata['date_posted'],0,0,false);

                            $maild['helpcontacts'] ='';
                            $nos = explode("\n",$this->systemsettings['help_support']);

                            foreach ($nos as $id=>$no){
                                if(!empty($no)){
                                    $maild['helpcontacts'] .= "(".$no.")<br>";
                                }}

                            $maild['mailtplbody'] = $this->load->view('mail/question_reply',array('replyby'=>'DIT-Admission Officer','date_replied'=>date('D d-M-y h:i:a',time()),'qn'=>$qndata['question'],'dt_posted'=>format_date($qndata['date_posted']),'answer'=>$data['question_answer'][$qn]),true);
                            $mailbody = $this->load->view('mail/mail',$maild,true);

                            $mailto[$mailCount] = $mail;
                            $mailsubj[$mailCount] =  $maild['mailtpltitle'];
                            $mailbodymult[$mailCount] = $mailbody  ;
                            //$maildata[$id] = array('mail_to'=>$mail,'body'=>$mailbody,'subject'=>$maild['mailtpltitle']);
                            $othermaildata[$mailCount] = array('name'=>$qndata['sender_name'],'file'=>false,'altbody'=>$message);
                            }
                            
                            $qnstatus = array('ans_status'=>1,'replied_via' => $replyvia,'publish_status'=>$data['publish'][$qn],'status'=>$mail);
                        $this->sasdb->where('id',$qn);
                        $this->sasdb->update('visitor_question',$qnstatus);

                          $mailCount += 1;
                }

                $mail = $this->sas_system->send_email($mailto, $mailsubj,$mailbodymult,$othermaildata,true);
            }
            
        }
    }

    function get_app_feesasdbacks(){
           $ql =  "
           SELECT ad.form_four_index as id,ad.first_name,ad.attach_photo as photo,ad.email_address as email,ad.last_name,registered_date,comments from applicant_acc as ac
           join applicant_details as ad on ad.form_four_index = ac.form_four_index
           where ac.comments != '' group by ac.registered_date order by ac.registered_date desc
           ";
        $comments = array();
        $comments['likes']['yes'] = 0; $comments['likes']['no'] = 0;
        $comments['dificult']['easy'] = 0; $comments['dificult']['medium'] = 0; $comments['dificult']['hard'] = 0;
        $comments['problems']['yes'] = 0; $comments['problems']['no'] = 0;
        $likes = array('No','Yes');
        $dificult = array('Easy','Medium','Difficult');
        $problems = array('Yes','No');
        $data = $this->sasdb->query($ql);
         $comments['total_comments'] = $data->num_rows();
        if($data->num_rows()> 0){
            $result =  $data->result_array();

            foreach($result as $id => $cm){
                $cms =   explode("}{", trim(trim($cm['comments'],"{"),"}"));

                $comments['list'][$id] = $cm;
                //var_dump($cms); die();
                $comments['list'][$id]['comments'] = $cms[3];
                $comments['list'][$id]['difficult'] = $dificult[$cms[1]];
                $comments['list'][$id]['likes'] = $likes[$cms[0]];
                $comments['list'][$id]['problems'] = $problems[$cms[2]];
                if($cms[0]){ $comments['likes']['yes']  += 1;}else{ $comments['likes']['no']  += 1;}
                if($cms[1] == 1){  $comments['dificult']['medium'] += 1; }elseif($cms[1] == 2){ $comments['dificult']['hard'] += 1; }else{ $comments['dificult']['easy'] += 1;}
                if($cms[2]){  $comments['problems']['yes'] += 1; }else{ $comments['problems']['no'] += 1; }
            }
        }else{
            $comments['comments'] = false;
        }

        return $comments;
    }

    function update_applicant_data(){

    }
    
    function update_applicant_info($id,$newdata,$type){
        if($id && $type){
            switch($type){
                case 'id':
                    $this->load->model('membership_model');
                    $this->membership_model->update_applicant_id($newdata,$id);
                   /* $index = explode("/",$newdata);
                    if(is_array($index)){
                        $this->sasdb->where('form_four_index',$id);
                        
                        $this->sasdb->update('applicant_acc',array('form_four_index'=>strtoupper($newdata)));
                        $this->sasdb->where('form_four_index',$id);
                        $this->sasdb->update('applicant_details',array('o_level_centerno'=>strtoupper($index[0]),'o_level_indexno'=>$index[1],'o_level_year'=>$index[2]));
                    }else{
                        $this->sasdb->where('form_four_index',$id);
                        $this->sasdb->update('applicant_acc',array('form_four_index'=>strtoupper($newdata),'email_address'=>  strtolower($newdata)));
                         $this->sasdb->where('form_four_index',$id);
                        $this->sasdb->update('applicant_details',array('email_address'=>strtolower($newdata)));
                    }

                   if(is_dir(UPLOAD_DIR.str_replace('/', '_',  strtoupper($id)))){
                       rename(UPLOAD_DIR.str_replace('/', '_',strtoupper($id)),UPLOAD_DIR.str_replace('/', '_',strtoupper($newdata)));
                   }
                     */
                    
                 break;
                case 'email':
                    $this->sasdb->where('form_four_index',$id);
                        $this->sasdb->update('applicant_acc',array('email_address'=>strtolower($newdata)));
                         $this->sasdb->where('form_four_index',$id);
                        $this->sasdb->update('applicant_details',array('email_address'=>strtolower($newdata)));
                    break;
                case 'password':
                     $this->sasdb->where('form_four_index',$id);
                        $this->sasdb->update('applicant_acc',array('password'=>md5($newdata)));
                    break;
                case 'account_status':
                        $this->sasdb->where('form_four_index',$id);
                        $this->sasdb->update('applicant_acc',array('application_status'=>$newdata));


                        if($newdata != 1){
                            $this->sasdb->where('form_four_index',$id);
                            $this->sasdb->update('applicant_details',array('status'=>'progress'));

                            $this->sasdb->where('applicant_id',$id);
                            $this->sasdb->update('applicant_choices',array('status'=>0));

                            $this->sasdb->where('form_four_index',$id);
                            $this->sasdb->update('applicant_qualifications',array('form_status'=>0));

                        }
                    break;
                case 'forced_submit':
                    $data['app_id'] = $this->sas_system->generate_app_sn($id);
                    $this->sasdb->where('form_four_index',$id);
                    $this->sasdb->update('applicant_acc',array('application_status'=>1));

                    $this->sasdb->where('form_four_index',$id);
                    $this->sasdb->update('applicant_details',array('status'=>'submitted','app_id'=>$data['app_id']));

                    $this->sasdb->where('applicant_id',$id);
                    $this->sasdb->update('applicant_choices',array('status'=>1));

                    $this->sasdb->where('form_four_index',$id);
                    $this->sasdb->update('applicant_qualifications',array('form_status'=>1));

                    break;
                case 'entry_mode':
                    $this->sasdb->where('form_four_index',$id);
                    $this->sasdb->update('applicant_details',array('applied_entry'=>$newdata));

                    $this->sasdb->where('applicant_id',$id);
                    $this->sasdb->update('applicant_choices',array('entry_mode'=>$newdata));

                    $this->sasdb->where('form_four_index',$id);
                    $this->sasdb->update('applicant_qualifications',array('applied_entry'=>$newdata));
                    break;
                case 'certificate':
                       $ed = $this->sas_system->get_column($newdata,'abbreviation',"ed_levels",'id');
                       switch(strtolower($ed)){
                           case 'csee':
                           case 'gce':
                               $this->sasdb->where('form_four_index',$id);
                               $this->sasdb->update('applicant_details',array('ed_level'=>$newdata,'a_level_status'=>0,'attended_veta'=>0,'foreign_student'=>0));
                               $this->sasdb->where('form_four_index',$id);
                               $this->sasdb->update('applicant_acc',array('app_type'=>0));
                               $this->sasdb->where('form_four_index',$id);
                               $this->sasdb->update('applicant_qualifications',array('a_level_status'=>1,'veta_status'=>1));


                               break;
                           case 'ascee':
                               $this->sasdb->where('form_four_index',$id);
                               $this->sasdb->update('applicant_details',array('ed_level'=>$newdata,'a_level_status'=>1,'attended_veta'=>0,'foreign_student'=>0));
                               $this->sasdb->where('form_four_index',$id);
                               $this->sasdb->update('applicant_acc',array('app_type'=>0));
                               $this->sasdb->where('form_four_index',$id);
                               $this->sasdb->update('applicant_qualifications',array('a_level_status'=>0,'veta_status'=>1));
                               break;
                           case 'veta':
                               $this->sasdb->where('form_four_index',$id);
                               $this->sasdb->update('applicant_details',array('ed_level'=>$newdata,'a_level_status'=>0,'attended_veta'=>1,'foreign_student'=>0));
                               $this->sasdb->where('form_four_index',$id);
                               $this->sasdb->update('applicant_acc',array('app_type'=>0));
                               $this->sasdb->where('form_four_index',$id);
                               $this->sasdb->update('applicant_qualifications',array('a_level_status'=>1,'veta_status'=>0));
                               break;

                           default:
                               $this->sasdb->where('form_four_index',$id);
                               $this->sasdb->update('applicant_details',array('ed_level'=>$newdata,'a_level_status'=>0,'attended_veta'=>0,'foreign_student'=>1));
                               $this->sasdb->where('form_four_index',$id);
                               $this->sasdb->update('applicant_acc',array('app_type'=>1));
                               $this->sasdb->where('form_four_index',$id);
                               $this->sasdb->update('applicant_qualifications',array('a_level_status'=>1,'veta_status'=>1));
                               break;
                       }
                    break;
            }
            //ss $this->sasdb->query("delete  from visitor_session where user_data like '%$id%'");
        }else{
            return 'Invalid Infos Entered';
        }
        
    }

    function verify_application($appid,$appdata,$verifiedby){
        $dataI = array(
            'personal'=>0,'education'=>0,'selection'=>0,'attachment'=>0,
            'bcert'=>0,'photo'=>0,'payinslip'=>0,'ocert'=>0,'acert'=>0,'vcert'=>0,'equicert'=>0,'Comments'=>$appdata['application_comments'],
            'verification_date'=>date('Y-m-d H:i:s',time()),
            'status'=>0,'checked_by'=>$verifiedby
        );
        switch($appdata['rd_accept']){
            case 'accepted':
                $dataI['bcert'] =2;
                $dataI['photo'] =2;
                $dataI['ocert'] =2;
                $dataI['acert'] =2;
                $dataI['vcert'] =2;
                $dataI['equicert'] =2;
                $dataI['payinslip'] =2;
                $this->sasdb->where('form_four_index',$appid);
                $this->sasdb->update('applicant_details',array('certificates_status'=>1,'paid_fee'=>1));
                $this->sasdb->where("applicant_id",$appid);
                $this->sasdb->update('applicant_choices',array('status'=>1));

                $this->sasdb->where('app_id',$appid);
                $this->sasdb->update('applicant_issues',$dataI);

                $this->sasdb->where('form_four_index',$appid);
                $this->sasdb->update('applicant_qualifications', array('valid_applicant'=>1,'form_status'=>1));
               // foreach($appid['payment_status'] as $idt=>$status){
                //    if($status > 0){
                        $this->sasdb->where('applicant_id',$appid);
                       // $this->sasdb->where('transid',$idt);
                        $this->sasdb->update('payment_transactions_post',array('status'=>1));
                       // if($status > 1){  $paystatsu  = $status;}
                   // }
              //  }
                break;
            case 'rejected':
                $this->sasdb->where('form_four_index',$appid);
                $this->sasdb->update('applicant_acc',array('application_status'=>0));
                $this->sasdb->where('form_four_index',$appid);

                $this->sasdb->update('applicant_qualifications', array('valid_applicant'=>0,'form_status'=>0));
                $this->sasdb->where("applicant_id",$appid);
                $this->sasdb->update('applicant_choices',array('status'=>0));
                return false;
                break;
            case 'revalidate':

                $dataI['personal'] = !$appdata['personal_status'];
                $dataI['education'] = !$appdata['education_status'];
                $dataI['selection'] = !$appdata['selection_status'];
                $dataI['attachment'] = !$appdata['attachment_status'];
                $dataI['status'] = 1;
                $dataI['payinslip'] = isset($appdata['accept']['cert']['payinslip'])?$appdata['accept']['cert']['payinslip']:0;
                $dataI['ocert'] = isset($appdata['accept']['cert']['o_level_certificate'])?$appdata['accept']['cert']['o_level_certificate']:0;
                $dataI['bcert'] = isset($appdata['accept']['cert']['birthcertificate'])?$appdata['accept']['cert']['birthcertificate']:0;
                $dataI['photo'] = isset($appdata['accept']['cert']['photo'])?$appdata['accept']['cert']['photo']:0;
                $dataI['acert'] = isset($appdata['accept']['cert']['a_level_certificate'])?$appdata['accept']['cert']['a_level_certificate']:0;
                $dataI['vcert'] = isset($appdata['accept']['cert']['veta_certificate'])?$appdata['accept']['cert']['veta_certificate']:0;
                $dataI['equicert'] = isset($appdata['accept']['cert']['foreign_ed_certificate'])?$appdata['accept']['cert']['foreign_ed_certificate']:0;




                //payment_status
                $paystatsu =$appdata['payment_status'] == 1?1:2;
                foreach($appdata['payment_id'] as $idt=>$status){
                    if($status > 0){
                    $this->sasdb->where('applicant_id',$appid);
                    $this->sasdb->where('trans_id',$idt);
                    $this->sasdb->update('payment_transactions_post',array('status'=>$status));
                      if($status > 1){  $paystatsu  = $status;}
                    }
                }

                $this->sasdb->where("applicant_id",$appid);
                $this->sasdb->update('applicant_choices',array('status'=>0));

                $this->sasdb->where('app_id',$appid);
                $this->sasdb->update('applicant_issues',$dataI);

                $this->sasdb->where('form_four_index',$appid);
                $this->sasdb->update('applicant_qualifications', array('valid_applicant'=>0,'form_status'=>0));
                $this->sasdb->where('form_four_index',$appid);
                $this->sasdb->update('applicant_details',array('certificates_status'=>2,'status'=>'progress','paid_fee'=>2));


                break;
        }
         // var_dump($appdata);
        return $dataI;
    }


    function unblock_applicant($id){

    }
    
    function remove_applicant($id,$permanent){
        $explode = substr_count($id,'_d') +  substr_count($id,'_D');
       if($explode > 0 || $permanent){
          // $apid = preg_replace('{\/deleted}',"",$id);
           //echo $apid;
           // die();
           $this->sas_system->remove_applicant_folder($id);
           $sql = "DELETE FROM payment_transactions_post WHERE applicant_id='$id'";
           $this->sasdb->query($sql);
           $sql2 = "DELETE FROM applicant_acc WHERE form_four_index = '$id'";
           $this->sasdb->query($sql2);
           $this->sasdb->query("DELETE FROM visitor_session where user_data like '%$id%'");
           return '<span class="error">User Account Has been permanently deleted</span>';
       }else{

           $this->check_applicant_deleted($id);
           $apid = preg_replace('{\_d}',"",$id);
           $this->load->model('membership_model');
           $newid = $id . "_d";
           $this->membership_model->update_applicant_id($newid,$id);
           $this->sasdb->where('form_four_index',$newid);
           $this->sasdb->update('applicant_acc',array('deleted'=>1,'application_status'=>0));

           $this->sasdb->query("UPDATE payment_transactions_post set applicant_id = '$newid',trans_id=concat(trans_id,'_d'),deleted=1 where applicant_id='$newid'");

           return '<span class="error">User Account Moved to Blocked Applicants List!</span>';
           //return 'Applicant successfully Trashed';
       }
    }


    function check_applicant_deleted($id){
       $deleted = $id."_d";
        $this->sasdb->where('form_four_index',$deleted);

        $data = $this->sasdb->get("applicant_details");

        if($data->num_rows()> 0) {

             $this->remove_applicant($deleted,true);
        }
    }

    function publish_questions($data,$mode = false){
        $qnslst = $data['qn'];
           $mailto = array();
        $mailbodymult = array();
        $mailsubj = array();
        $sendmail = false;;
        $mailCount = 0;
        foreach($qnslst as $id=>$qn){
            $sendmail = true;
            $this->sasdb->where('id',$qn);
            $this->sasdb->update('visitor_question',array('publish_status'=>1));
            $this->sasdb->where('id',$data['ans_id'][$qn]);
            $this->sasdb->update('visitor_replies',array('reply_contents'=>$data['question_answer'][$qn]));

            $qndata = $this->get_question($qn);
            $mail = $qndata['sender_email'];
            $message = "You asked the following qn <span style='color:#4256ab'>".$qndata['question']."</span> on <span>".format_date($qndata['date_posted'],0,false)
                .". </span><br>The following is the description of your Question ".$data['question_answer'][$qn]."<br> If you have more Inquiries. Please visit <a href='".base_url()."help' target='_blank'>DIT-Admission system: Help and Support</a>";

            $maild["mailtplmoto"] = 'Skillful Mind comes with skilled hands.';
            $maild['mailtpltitle'] = 'Reply to your Question/Enquiry asked on ' . format_date($qndata['date_posted'],0,0,false);


            $maild['helpcontacts'] ='';
            $nos = explode("\n",$this->systemsettings['help_support']);

            foreach ($nos as $id=>$no){
                if(!empty($no)){
                    $maild['helpcontacts'] .= "(".$no.")<br>";
                }}

            $maild['mailtplbody'] = $this->load->view('mail/question_reply',array('replyby'=>'DIT-Admission Officer','date_replied'=>date('D d-M-y h:i:a',time()),'qn'=>$qndata['question'],'dt_posted'=>format_date($qndata['date_posted']),'answer'=>$data['question_answer'][$qn]),true);
            $mailbody = $this->load->view('mail/mail',$maild,true);

            $mailto[$mailCount] = $mail;
            $mailsubj[$mailCount] =  $maild['mailtpltitle'];
            $mailbodymult[$mailCount] = $mailbody  ;
            //$maildata[$id] = array('mail_to'=>$mail,'body'=>$mailbody,'subject'=>$maild['mailtpltitle']);
            $othermaildata[$mailCount] = array('name'=>ucfirst(strtolower($qndata['sender_name'])),'file'=>false,'altbody'=>$message);
            $mailCount +=1;
        }

        if($mode && $sendmail){


         $mail = $this->sas_system->send_email($mailto, $mailsubj,$mailbodymult,$othermaildata,true);

        }
        return true;
    }
    
    function get_question($qn){
        if($qn){
            $this->sasdb->where('id',$qn);
           $data = $this->sasdb->get('visitor_question');
           $result = $data->result_array();
           return $result[0];
        }else{
            return false;
        }
    }
    
    function get_allquestions($pub,$mode){
        
        if($mode == 1){
            $data = $this->sasdb->query("SELECT DISTINCT q.id as id,q.question,sender_name,sender_email,date_posted,total_asked,ans_status,replied_via,status FROM visitor_question as q where ans_status = 0 and publish_status = 0 ORDER BY date_posted ");
            if($data->num_rows()> 0){
                $rdata = $data->result_array();
                $result['status'] = true;
                $result['type'] = $mode;
                $result['total'] = $data->num_rows();
                $result['data'] = $rdata;
            }else{
                $result['status'] = false;
                 $result['type'] = $mode;
                $result['total'] = $data->num_rows();
                $result['data'] = array();
            }
        }elseif($mode == 2){
            $data = $this->sasdb->query("SELECT DISTINCT q.id as id,q.question,q.sender_name,q.sender_email,q.date_posted  as date_asked,q.total_asked,q.ans_status,q.replied_via,status,a.date_posted as date_answered,r.reply_by,r.reply_contents,r.id as reply_id,r.date_replied as reply_date FROM visitor_question as q "
                    . "JOIN visitor_question_answers as a ON q.id=a.qn_id JOIN visitor_replies as r ON r.id = a.reply_id   where q.ans_status = 1 =  q.publish_status = 1 ORDER BY a.date_posted ");
            if($data->num_rows()> 0){
                $rdata = $data->result_array();
                $result['status'] = true;
                 $result['type'] = $mode;
                $result['total'] = $data->num_rows();
                $result['data'] = $rdata;
            }else{
                $result['status'] = false;
                 $result['type'] = $mode;
                $result['total'] = $data->num_rows();
                $result['data'] = array();
            }
        }else{
            $data = $this->sasdb->query("SELECT DISTINCT q.id as id,q.question,q.sender_name,q.sender_email,q.date_posted  as date_asked,q.total_asked,q.ans_status,q.replied_via,status,a.date_posted as date_answered,r.reply_by,r.reply_contents,r.id as reply_id,r.date_replied as reply_date FROM visitor_question as q "
                    . "JOIN visitor_question_answers as a ON q.id=a.qn_id JOIN visitor_replies as r ON r.id = a.reply_id   where q.ans_status = 1 =  q.publish_status = 0 ORDER BY a.date_posted ");
            if($data->num_rows()> 0){
                $rdata = $data->result_array();
                $result['status'] = true;
                 $result['type'] = $mode;
                $result['total'] = $data->num_rows();
                $result['data'] = $rdata;
            }else{
                $result['status'] = false;
                 $result['type'] = $mode;
                $result['total'] = $data->num_rows();
                $result['data'] = array();
            }
        }
        
        return $result;
        
    }
    
    function get_allanswers($pub,$mode){
        $data = $this->sasdb->query("SELECT r.id,reply_by,reply_contents,helpfull_count from visitor_replies as r order by helpfull_count");
        if($data->num_rows()> 0){
            $result = $data->result_array();
            return $result;
        }else{
            return array();
        }
    }
            
    function update_helpcontents($contents,$col,$heading,$publish){
        
        $this->sasdb->where('type',$col);
        $data = $this->sasdb->get('sys_long_data');
        if($data->num_rows()> 0){
            $this->sasdb->where('type',$col);
        $this->sasdb->update('sys_long_data',array('publish_status'=>$publish,'heading'=>$heading,'content'=>$contents));}else{
            $this->sasdb->insert('sys_long_data',array('publish_status'=>$publish,'type'=>$col,'heading'=>$heading,'content'=>$contents,'date'=>date("Y-m-d H:m:s",time())));
        }
    }
    
    public function get_course($code)
    {
         $data = $this->course_model->get_course($code);
         return $data;
    }

    public function get_courses(){
       $sql = "SELECT courses.id,courses.name,courses.code FROM dit_sasdb.courses where deleted = 0";
        $result = $this->sasdb->query($sql);

        $data = $result->result_object();

        return $data;
    }

    public function count_questions($type){
        //if($type== 0){
        //$data = $this->sasdb->query('SELECT COUNT(id) as totalQns from visitor_question');}
        //else{
           $data =  $this->sasdb->query("SELECT COUNT(id) as totalQns from visitor_question where ans_status = $type");
        //}
        if($data->num_rows()>0){
            $result = $data->result_array();
            return $result[0]['totalQns'];
        }else{
         return 0;   
        }
    }
    
    
    public function compile_summary(){
        $summary['all_applicants'] = $this->course_model->count_total_applicants();
        $course_list = $this->course_model->getallcourses(0);
        $summary['course_list'] = array();
        //$summary['course_list']
        if($course_list){
        foreach($course_list as $itNo =>$details)
        {
            $details['first_choice']=$this->course_model->count_course_appliants($details['code'],1,0);

            $details['pre_entry_count'] = $this->course_model->count_course_appliants($details['code'],1,1);
            $details['both_entry_count'] = $this->course_model->count_course_appliants($details['code'],1,2);
            $summary['course_list'][$itNo]=$details;
        }
        }
        //echo var_dump($summary['course_list']);

        return $summary;
    }
    
    public function add_course($data,$mode=1){
       
       //$this->sasdb->where('code',$data['code']);
       $course = $this->sasdb->get_where('courses',array('code'=>$data['code'],'deleted'=>0));
       if($course->num_rows() > 0 && $mode == 1)
       {
           $result[0] = 0;
           $result[1] ='Course Exists';
            $this->session->set_userdata('db_update0',$result[1]);
           return $result ;
       }
        elseif ($mode == 0) {
          $this->sasdb->where('code',$data['code']);
          $this->sasdb->where('deleted',0);
          
          $result[0] = $this->sasdb->update('courses',$data);
          $result[1] = "Course Updated Successfully";
           $this->session->set_userdata('db_update',$result[1]);
          return $result;
       }
        else {
                //echo 'this is the one';
            $result[0] = $this->sasdb->insert('courses',$data);
               
           // die();
            $result[1]='Course Added Successfully';
             $this->session->set_userdata('db_update',$result[1]);
            return $result;
        }
    }
    
    public function updatesystemconfigurations($data){
        
        $this->load->model('sas_system');
       $result= $this->sas_system->updateconfig($data);
       return $result;
    }
    
    public function delete_department($dpid,$dpcode){
        $result = $this->sasdb->query("DELETE FROM users WHERE course_department_id = $dpid");
        $result2 = $this->sasdb->query("UPDATE courses SET deleted=1 WHERE course_department_id=$dpid");
        if($result && $result2){
            
            $result = $this->sasdb->query("UPDATE course_department SET deleted=1 WHERE id=$dpid AND dp_code = '$dpcode'");
            return $result;
        }else{
            return 2;
        }
    }
    
    public function get_all_departments(){
        //$this->sasdb->where('deleted',0);
       $result =  $this->sasdb->query('SELECT cd.id,cd.dp_name,cd.dp_code,cd.max_managers,cd.default_login_id,cd.deleted,users.username FROM course_department as cd
                LEFT JOIN  users on users.userid = cd.default_login_id where cd.deleted=0');
       if($result->num_rows()){
           $departments = $result->result_array();
           return $departments;     
       }
       else{
           die();
           return 0;
       }
        
    }

    function get_departmentname($depid){
        $deps = $this->sasdb->query("SELECT dp_name as name FROM course_department WHERE deleted=0 AND id=$depid");
        $result = $deps->result_array();
        if($deps->num_rows()>0){
            $depname = $result[0]['name'];}
        else{
            $depname = "Administration";
        }
        return $depname;

    }

    function count_departmentusers($dpid){
       // echo $dpid;
        $result = $this->sasdb->query("SELECT COUNT(*) as users FROM users where course_department_id=$dpid and deleted=0");
        $data=$result->result_array();

       // var_dump($data);
       // die();
        return $data[0]['users'];
    }

    function get_departments(){
        $deps = $this->sasdb->query("SELECT * FROM course_department WHERE deleted=0");

        if($deps->num_rows() > 0){
            $deps_data = $deps->result_array();

        }
        else
        {
            $deps_data = 0;
        }

        return $deps_data;
    }

    public function update_department($dpid){

        $data = array(
            'dp_name'=>$this->input->post("department_name"),
            'dp_code'=>$this->input->post("department_code"),
            'description'=>$this->input->post("description"),
            'max_managers'=>$this->input->post("max_users"),
            'default_login_id'=>$this->input->post("default_login"),
            );



        if($this->check_defaultid($this->input->post("default_login"))){
            $this->session->set_userdata('db_update','This user is already used on another Department');
        }else{
        $this->sasdb->where('dp_code',$data['dp_code']);
        $this->sasdb->update('course_department',$data);
            $this->sasdb->where('userid',$data['default_login_id']);
            $this->sasdb->update('users',array('course_department_id'=>$dpid));
        }
       
    }

    function check_defaultid($id){
        $this->sasdb->where('default_login_id',$id);
        $result = $this->sasdb->get('course_department');
        if($result->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function add_department(){
        $data = array(
            'dp_name'=>$this->input->post("department_name"),
            'dp_code'=>$this->input->post("department_code"),
            'description'=>$this->input->post("description"),
            'max_managers'=>$this->input->post("max_users"),
            "default_login_id"=>$this->input->post("login_id"),
            "login_password"=>md5($this->input->post("password")));
        
        $department = $this->sasdb->query("SELECT * FROM course_department WHERE dp_code = '{$data['dp_code']}'");
        $uid = $this->sasdb->query("SELECT * FROM users WHERE username='".$this->input->post("login_id")."'");
        if($department->num_rows > 0 || $uid->num_rows > 0){
            $this->session->set_userdata('db_update',"Department/User Arleady Exists!");
            return 2;}else{
                
        $result = $this->sasdb->insert("course_department",$data);
        $userdata = array(
            "c_timestamp"=>time(),
            "username"=>$data['default_login_id'],
            "password"=>$data['login_password'],
            "fname"=>$data['dp_code'],
            "lname"=>'default',
            "course_department_id"=>$this->sasdb->insert_id(),
            "role"=>'department');
            $this->sasdb->insert('users',$userdata);
            $uid = $this->sasdb->insert_id();
            $this->sasdb->where('id',$userdata['course_department_id']);
            $this->sasdb->update('course_department',array('default_login_id'=>$uid));
            $this->session->set_userdata('db_update',"Department Added successfully!");
            }
        return $result;
    }

    public function add_user($userdata){
       //$this->sasdb->where("username",$userdata['username']);
       // $this->sasdb->where("course_department_id",$userdata['course_department_id']);
       $result = $this->sasdb->query("SELECT * FROM users where username='{$userdata['username']}' AND course_department_id={$userdata['course_department_id']}");
       //$userdata['password'] = md5($userdata['password']);
       if($result->num_rows() > 0){
           return 2;
       }else{
           $userdata['c_timestamp'] = time();
           $result2 = $this->sasdb->insert("users",$userdata);
           return $result2;
       }
    }
    
    public function get_users($dpid=''){
       if($dpid !=""){
                $this->sasdb->where('course_department_id',$dpid); 
                //echo "$pdid";
                 $r_users = $this->sasdb->get('users');
       //$this->sasdb->where("role",$type);}
       }else
       {
            $r_users = $this->sasdb->get('users');
       }
     
      
      if($r_users->num_rows>0){
          $users = $r_users->result_array();
          return $users;
      }  else {
          return 0;
      }     
    }
    
    public function get_department_info($dpid){

        if($dpid >= 0){
            // $this->sasdb->where('id',$dpid);
           // $data =  $this->sasdb->get('course_department');
           // echo $dpid;die();
            $data =  $this->sasdb->query("
                SELECT cd.id,cd.dp_name,cd.dp_code,cd.max_managers,cd.description,cd.default_login_id,cd.deleted,users.username FROM course_department as cd
               LEFT JOIN  users on users.userid = cd.default_login_id where cd.id = $dpid
            ");

            if($data->num_rows() > 0){
                $result = $data->result_array();
                $result = $result[0];
                return $result;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }
    
    public function delete_user($userid,$username){
        //$result = 1;
        $result = $this->sasdb->query("DELETE FROM users WHERE userid=$userid AND username='$username'");
        
        if($result){
            return 1;
        }else
        {
            return 0;
        }
    }
    
    function validate_admin($admin_id,$password){
        
       
                $sql = "SELECT * FROM users WHERE username = '$admin_id'";
                $result = $this->sasdb->query($sql);
                
                if($result->num_rows() == 1){
                  
                    $data = $result->result_array();
                      
                    if($data[0]['password'] == md5($password)){
                       
                        $userdata = $data[0];
                        $dpid = $userdata['course_department_id'];
                        $usertype = $userdata['role'];
                        unset($userdata['password']);
                        if($usertype == 'administrator'){
                            $result2 = $this->sasdb->query("SELECT id,dp_name,description,max_managers,default_login_id FROM course_department WHERE deleted=1 AND id=$dpid");
                        }else{
                            $result2 = $this->sasdb->query("SELECT id,dp_name,description,max_managers,default_login_id FROM course_department WHERE deleted=0 AND id=$dpid");
                        }
                            $dataDp = $result2->result_array();
                        //$departmentData=$dataDp[0];
                        $this->session->set_userdata('validated',1);
                        $this->session->set_userdata('role',$usertype);
                        $this->session->set_userdata('user_type',$usertype);
                        $this->session->set_userdata(array("user"=>$userdata,"department"=>$dataDp[0]));
                        $this->update_login_status($userdata['userid'],1,1);
                         $return[0]=1;
                        $return['data']=$usertype;
                    }  else {
                       $return[0]=0;
                       $return['error']= "password";
                    }
                    
                }else
                {
                    $return[0]=0;
                    $return['error'] = "username";
                }
                
        //var_dump($return);
             //   die();
        return $return;
    }

    function get_useraccinfo($userid,$dpid){
           $userraw = $this->sasdb->query("SELECT users.*,course_department.dp_name,course_department.dp_code FROM users JOIN course_department ON course_department.id = users.course_department_id WHERE userid=$userid AND course_department_id = $dpid");
           if($userraw->num_rows == 1){
               $userdata = $userraw->result_array();
               return $userdata[0];
           }else{
               return false;
           }
           
}

    function update_accountinfo($username){
        $this->sasdb->where('username',$username);
        $data['fname'] = $this->input->post('fname');
        $data['lname'] = $this->input->post('lname');
        if($this->input->post('password_new') !== ""){
            $data['password'] = md5($this->input->post('password_new'));
        }
        $result = $this->sasdb->update('users',$data);
        return $result;
    }

    public function update_login_status($id,$status,$state=1){
 if($status== 1 or $status == 0){
     $datetime = date('Y-m-d H:i:s',time()); 
     if($state == 1){
        $result = $this->sasdb->query("UPDATE users SET last_login='$datetime',  login_status={$status} where userid='{$id}'");
     
     }else{
        $result = $this->sasdb->query("UPDATE users SET  last_logout='$datetime', login_status={$status} where userid='{$id}'"); 
     }
     return $result;
 }   
 return 0;
}

    public function get_allapplicants($pg,$count,$searchmode = false,$term = false,$stype = false, $searchcol = false,$countMode = false){
        if($countMode){
              $groups = " group by a.gender ";
            $columns = "
                 a.gender, count(a.form_four_index) as total
            ";
        } else{
            $groups = '';
            $columns = "
            distinct(a.form_four_index) as f_id,
      a.app_id,
      a.registered_id,
      apc.registered_date as regdate,
      a.c_timestamp as last_update,
      a.first_name as fname,
      a.middle_name as mname,
      a.last_name as lname,
        a.gender,
        a.nationality,
        a.foreign_student,
        a.status as app_progress,
        aq.sel_batch as batch,
        a.mobile_number,
        a.email_address,
        a.attach_payinslip as payinslip,
        vr.username as checked_by,
        attach_photo as photo,
        a.certificates_status,
        a.paid_fee,
        a.applied_entry as entry,
        ed.abbreviation as ed_cert,
        a.credit_points,
        a.o_level_maths as omath,
        a.o_level_physics as ophy,
        a.o_level_chemistry as ochem,
        a.o_level_language as oeng,
         a.o_level_biology as obio,
         a.a_level_status,
         a.attended_veta,
         a.o_level_year as oyear,
         a.a_level_year as ayear,
          a.veta_year as vyear,
          a.veta_cert_type,
          a.veta_grade,
                     a.veta_year,
                     a.attended_veta,
                     a.veta_center,
                     a.veta_year,
                     a.veta_course,
                     a.veta_cert_type,
                     a.veta_grade,
          a.a_level_major as amajor,
          a.paid_fee,
          a.certificates_status as verified,
           apc.form_downloads as frm_dlds,
           apc.dld_date,
           aq.selected as selection_status,
           aq.applied_entry as sel_entry,
                         ed.country as o_level_country,
                         a.o_level_school as custom_school,
                         a.o_level_exam_authority,
                         a.o_level_div,
                          scl.name as o_level_school,
                        a.a_level_physics as a_phy_grade,
                        a.a_level_maths as a_math_grade,
                        a.a_level_major,
                        a.a_level_year,
                        a.a_level_division,
                        a.a_level_qualification,
                        a.a_level_status,
                        a.a_level_indexno,
                        a.a_level_school,
                        a.a_level_centerno,
                        a.technical_ed,
                        a.w_shop,
                        a.w_draw,
                        ed.abbreviation as level,
                        a.w_elect,
                        a.birth_country,
                        a.foreign_year,
                        a.foreign_student,
                        a.equivalent_year,
                        a.religion,
                        a.dob,
                        a.contact_address,
                    a.permanent_address,
                    a.preffered_session,
                        a.place_of_birth,
                        a.marital_status,
                        a.mobile_number,
                        a.email_address,
                        a.disabilities,
                        a.fee_payment as sponsor,
                        a.paid_fee,
                        a.applied_entry,
                        aq.applied_entry as selected_entry,
                         acl.course_code as selected_code,
                         courses.name as selected_course,
                        payment.trans_id,
                        payment.total_paid,
                        course_sels.app_choices,
                        apc.application_status as account_status
            ";
        }

    $sql = $sql = "
      SELECT $columns
        FROM applicant_details as a
        JOIN applicant_acc as apc on apc.form_four_index = a.form_four_index
        LEFT JOIN applicant_issues as ai on a.form_four_index = ai.app_id
        LEFT JOIN applicant_qualifications as aq on aq.form_four_index = a.form_four_index
        LEFT JOIN users as vr on vr.userid = ai.checked_by
       LEFT JOIN ed_levels as ed on  ed.id = a.ed_level

       LEFT JOIN payment_transactions_post as ptp on ptp.applicant_id = a.form_four_index
        LEFT join (select concat(sc.type_prefix,sc.indexno) as centerno,sc.name from secondary_schools as sc) as scl on scl.centerno = a.o_level_centerno
        LEFT JOIN (
				select applicant_id,group_concat(trans_id separator ', ') as  trans_id,sum(amount) as total_paid
			    from payment_transactions_post
						group by applicant_id ) as payment on payment.applicant_id = a.form_four_index
        LEFT join (
            select applicant_id as uid,group_concat(applicant_choices.priority, '-', courses.CODE ORDER BY applicant_choices.priority SEPARATOR ', ') as app_choices
              from applicant_choices
               join courses on applicant_choices.course_code = courses.code
                group by applicant_id ORDER BY applicant_choices.priority )
									as course_sels on course_sels.uid = a.form_four_index
                           LEFT JOIN applicant_choices as acl on acl.applicant_id = a.form_four_index and acl.selected = 1 and acl.status = 2
                          LEFT JOIN courses on acl.course_code = courses.code

         ";

        $forced = false;
    $term = trim(strtolower($term));
        if($searchcol == 11){
            $sql .= " JOIN visitor_session as vs on vs.user_data like concat('%',apc.form_four_index,'%')";
        }

        $moreWhre = "";
        if(!is_numeric($searchcol)){
            $coursecode = $searchcol;
            $searchcol = 12;
            if($stype == 'selected' && substr(strtolower($term),0,8)  == 'selected'){
                $newTerm = false;
                $status = ' and acl.selected = 1 ';
                if(substr_count($term,':')){
                    $terms = explode(':',$term);
                    if(strtolower($terms[1]) == 'pre'){
                       $status .= " and acl.entry_mode = 1 ";
                    }elseif(strtolower($terms[1]) == 'direct'){
                        $status .= "  and  acl.entry_mode = 0 ";
                    }elseif(strtolower($terms[1]) == 'both'){
                        $status .= "  and  a.applied_entry = 2 ";
                    }else{
                        $newTerm = $terms[1];

                    };
                }
                $term =$newTerm;
            }else{
                $status = '';
            }
            $moreWhre = " and  acl.course_code = '$coursecode' $status ";

        }

        $newTermSearch =false;
        if(substr_count($term,'choice:',0) > 0){
            if($searchcol == 12){
                $choice = explode(":",$term);
                if(is_array($choice) && isset($choice[1]) && is_numeric($choice[1])){
                    $forced = " AND acl.priority = " . $choice[1] . " ";
                }
                if(isset($choice[2])){
                    $term  = $choice[2];
                    if(isset($choice[3])){
                        $newTermSearch =  $choice[3];
                        $searchmode = true;
                        $forced = false;
                    }

                }
            }
        }



        switch($term){
        case 'female':
            $forced = " AND a.gender = 'f' ";
            break;
        case 'male':
            $forced = " AND a.gender = 'm' ";
            break;
        case 'pre entry':
            if($stype == 'selected'){
                $forced = " AND aq.applied_entry = 1  ";
            }else{
                $forced = " AND a.applied_entry = 1  ";
            }

            break;
        case 'direct entry':
            if($stype == 'selected'){
                $forced = " AND aq.applied_entry = 0  ";
            }else{
                $forced = " AND a.applied_entry = 0  ";
            }

            break;
        case 'both entry':
            $forced = " AND a.applied_entry = 2 ";
            break;
        case'female & pre':
            if($stype == 'selected'){
                $forced = "  AND a.gender = 'f'  AND aq.applied_entry = 1  ";
            }else{
                $forced = "  AND a.gender = 'f' AND a.applied_entry = 1  ";
            }

            break;

        case  'male & pre':
            if($stype == 'selected'){
                $forced = " AND a.gender = 'm' AND aq.applied_entry = 1  ";
            }else{
                $forced = " AND a.gender = 'm'  AND a.applied_entry = 1  ";
            }
           // $forced = " AND a.gender = 'm' AND a.applied_entry = 1  ";
            break;

        case 'female & direct':
            if($stype == 'selected'){
                $forced = " AND a.gender = 'f' AND aq.applied_entry = 0  ";
            }else{
                $forced = " AND a.gender = 'f' AND a.applied_entry = 0  ";
            }
           // $forced = " AND a.gender = 'f' AND a.applied_entry = 0  ";
            break;
        case 'male & direct':
            if($stype == 'selected'){
                $forced = " AND a.gender = 'm' AND aq.applied_entry = 0  ";
            }else{
                $forced = " AND a.gender = 'm' AND a.applied_entry = 0  ";
            }
           // $forced = " AND a.gender = 'm' AND a.applied_entry = 0  ";
            break;

        case 'female & both':
            $forced = " AND a.gender = 'f' AND a.applied_entry = 2  ";
            break;

        case 'without credit':
            $forced = " AND (a.credit_points  < 3 or a.credit_points = '')  ";
            break;

        case 'male & both':
            $forced = " AND a.gender = 'm' AND a.applied_entry = 2 ";
            break;
        case 'female &foreign':
            $forced = " AND a.gender = 'f' AND a.foreign_student ";
            break;

        case 'male & foreign':
            $forced = " AND a.gender = 'm'  AND a.foreign_student = 1 ";
            break;
        case 'foreign':
            $forced = " AND a.foreign_student = 1 ";
            break;

        case 'today':
            $term = date('Y-m-d',strtotime('today'));
            break;

        case 'yesterday':
            $term = date('Y-m-d',strtotime('yesterday'));
            break;

        default :
            //$forced = false;

    }

    switch($stype){
        case 'complete':
         $sql .= " WHERE a.status = 'submitted' and a.paid_fee >= 0  and a.certificates_status = 0 and apc.deleted = 0 and apc.application_status != 0 and aq.selected = 0  ";

            break;

        case 'verified':
        $sql .= " WHERE a.status = 'submitted' and a.paid_fee = 1  and a.certificates_status = 1 and apc.deleted = 0 and apc.application_status != 0 and aq.selected = 0 ";
        break;

        case 'blocked':
            $sql .= " WHERE  apc.deleted = 1  or apc.application_status = 0 ";
            break;

        case 'selected':
            $sql .= "  WHERE aq.selected = 1 and apc.deleted = 0 and apc.application_status > 0 ";
            break;

            default:
                $sql .= " WHERE   apc.deleted = 0 and apc.application_status != 0 ";
    }
        $term = $newTermSearch?$newTermSearch:$term;
    if($searchmode && $term && !$forced){

        $term = trim($this->sasdb->escape($term),"'");

        $sql .= " and ( apc.form_four_index like '%$term%' or ed.abbreviation like '%$term%' or ed.authority_abb like '%$term%' or ed.authority_name like '%$term%' or  apc.first_name like '%$term%' or a.o_level_school like '%$term%' or a.a_level_school like '%$term%' or a.veta_center like '%$term%' or  apc.last_name like '%$term%' or   a.middle_name like '%$term%' or  apc.email_address like '%$term%' or "
            . "a.status like '%$term%' or  a.nationality like '%$term%' or apc.registered_date like '%$term%' or  a.gender like '%$term%' or  a.app_id like '%$term%' or  a.nationality like '%$term%') ";

        //$data = $this->sasdb->query($sql);
        //$r = $data->result_array();
    }elseif($forced){
        $sql .= $forced;
    }
        $sortorder = ' ' . $groups. ' order by apc.registered_date desc';
        if($searchcol){
            switch($searchcol){

                case 11: // online applicants
                    $sql .= ' AND apc.login_status = 1 ';
                break;
                case 10:   // registered today
                    $date = date('Y-m-d',time());
                    $sql .= " AND apc.registered_date like '%$date%'";

                    break;
                case 2:   // last registered
                    $sortorder = '  ' . $groups . ' order by  apc.registered_date desc';
                    break;
                case 3:   // first registered
                    $sortorder = '  ' . $groups . ' order by  apc.registered_date asc';
                    break;
                case 4:   // done personal
                    break;
                case 5: // done education
                    break;
                case 6:   // done selection
                    break;
                case 7:   // done attachment
                    break;
                case 8:   // payment verified
                    $sql .= " AND ptp.status > 0";
                    break;
                case 9:    // rejected payments
                    $sql .= " AND ptp.status > 1";
                    break;
                case 12:
                    //$sql .= " AND acl.course_code = '$coursecode' ";
                    break;
            }
        }

        $sql .= $moreWhre;

           if($stype == 'selected'){
               $sortorder = " $groups  order by a.gender,a.last_name,a.middle_name,a.first_name asc ";
           }
    $sql .=  " $sortorder";

          //$sql = $this->sasdb->escape_query($sql);
     // echo print_r($sql);

    $data = $this->sasdb->query($sql);
    $rows = $data->num_rows();
    $this->session->set_userdata('db_query_rows',$rows);
    $result = $data->result_array();
        if($pg == 'all'){     //
             return $result;
        }else{
    $r = array();
    $start = ($pg - 1) * $count;
    if($rows > 0){
    while($count){
       if($start < $rows){
           $r[] = $result[$start];
       }else{
           break;
       }
        $count -= 1;
        $start += 1;
    } }
        }

            //  var_dump($r);
        //die();
    return $r;
}

    function count_applicants_balanced($searchmode = false,$term = false,$stype = false, $searchcol = false){
         //  $count = $this->get_allapplicants();

    }

    function reset_verifications(){

       $rs =  $this->sasdb->query('SELECT form_four_index from applicant_acc where 1');
        if($rs->num_rows()> 0){
            $ls = $rs->result_array();
            foreach($ls as $id => $ind){
               $sql = "insert into applicant_issues(app_id) values('{$ind['form_four_index']}') ON DUPLICATE KEY UPDATE status=0";
                $this->sasdb->query($sql);
            }
            return 'done';

        }else{
            return 'none';
        }
    }
}

