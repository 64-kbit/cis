<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/26/14
 * Time: 3:24 PM
 */

class upload_file extends CI_Controller{
   private $fileexplorer ;

    function __construct(){
        parent::__construct();
        if(!$this->login_status()){
            $output = array(

            );
            if(!$this->input->is_ajax_request()) {
                redirect(base_url());
            }else{
                $this->output->set_content_type('json')->set_output($output);

            }

            exit();
        }else{
         $this->fileexplorer = new fileExplorer();
        }
    }


    public function loans_file(){

            $this->fileexplorer->upload_loan_csv();
    }

    public function index()
    {

    }

    function crop_image(){
      $input = $this->input->post();
        if($input['acttype'] == 'resetimg'){
            $out = $this->fileexplorer->restore_image($input);
        }else{
            $out = $this->fileexplorer->crop_profile_photo($input);
            $out['errors'] = $out['error'];
            $out['data'] = $out['msg'];
            $out['message'] = $out['msg'];
        }
        $this->output->set_content_type('json')->set_output(json_encode($out));

    }

    function profile_photo(){
        $this->fileexplorer->upload_photo();
    }

    public function students_file(){
         $this->fileexplorer->upload_students_csv();
    }

    function get_attachment(){
        $input = $this->input->get();
        $ftype = $input['fmime'];
        $fname = FCPATH.STUDENT_FILES.$input['file'];
        if(is_file($fname)){
            $data = file_get_contents($fname);
        }else{

            echo  "File Failed!!";
            die();
        }
        ob_clean();
        $this->output->set_header("Pragma: public"); // required
        $this->output->set_header("Expires: 0");
        $this->output->set_header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        $this->output->set_header("Cache-Control: private",false); // required for certain browsers
// change, added quotes to allow spaces in filenames, by Rajkumar Singh
        $this->output->set_header("Content-Disposition: inline; filename=\"".basename($fname)."\";" );
        $this->output->set_header("Content-Transfer-Encoding: binary");
        $this->output->set_header("Content-Length: ".filesize($fname));
        $this->output->set_content_type($ftype)->set_output($data);
    }

    function get_file(){
        $file = $this->input->get('file');
        $type = $this->input->get('type');
        $token = $this->input->get('token');
        $ftype = file_type_from_name($file);
        switch($type){
            case 'loans':
                $fname = FCPATH.LOANS_FILES.$file;
                if(is_file($fname)){
                    $data = file_get_contents($fname);
                }else{
                    $data = 'failed to get file';
                }
                break;
            case 'loans_template':
                break;
            case 'students_list':
                $fname = FCPATH.STUDENT_LIST_FILES.$file;
                if(is_file($fname)){
                    $data = file_get_contents($fname);
                }else{
                    $data = 'failed to get file';
                }
                break;
            case 'template':
                $fname = FCPATH.UPLOAD_DIR.$file;
                if(is_file($fname)){
                    $data = file_get_contents($fname);
                }else{
                    $data = 'failed to get file';
                }
                break;
            default:
                $data = "failed";
        }
        ob_clean();
        $this->output->set_header("Pragma: public"); // required
        $this->output->set_header("Expires: 0");
        $this->output->set_header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        $this->output->set_header("Cache-Control: private",false); // required for certain browsers
// change, added quotes to allow spaces in filenames, by Rajkumar Singh
        $this->output->set_header("Content-Disposition: attachment; filename=\"".basename($fname)."\";" );
        $this->output->set_header("Content-Transfer-Encoding: binary");
        $this->output->set_header("Content-Length: ".filesize($fname));
        $this->output->set_content_type($ftype)->set_output($data);

    }

    function get_photo(){
        //get_photo?type=profile_thumb&userid=admin&image=admin_1.jpg

        $type = $this->input->get('type');
        $profile = $this->input->get('profile');
        $image = $this->input->get('image');
        switch($type){
            case 'profile_thumb':
                 $file = FCPATH . PROFILE_PHOTOS_THUMBS . $image;
                 if(is_file($file)){
                   $data = file_get_contents($file);
                     $ftype = file_type_from_name($image);
                 }else{
                     $data = file_get_contents(image_folder().'nothumb.png');
                     $ftype = 'png';
                 }
                break;
            case 'profile_photo':
                $file = FCPATH . PROFILE_PHOTOS . $image;
                if(is_file($file)){
                    $data = file_get_contents($file);
                    $ftype = file_type_from_name($image);
                }else{
                    $data = file_get_contents(image_folder().'nothumb.png');
                    $ftype = 'png';
                }
                break;
        }
        ob_clean();
        $this->output->set_content_type($ftype)->set_output($data);
       // echo $data;
    }

    function user_certificate(){
        $input = $this->input->get();
       // var_dump($input);
         $stinfo = new StudentInfo(trim($input['stid']));
       // var_dump($stinfo->stored);die();
        $status = $this->fileexplorer->upload_student_certificate(array('folder'=>md5($stinfo->registration_number)));
        switch($input['category']){
             case 'birth_cert':
                 $detaisl = new StudentDetails($stinfo->details_id);
                 $detaisl->birth_certificate = $status['file_name'];
                 $detaisl->save();
                 break;
             default:
                 $edback = new StudentEdBackground($input['itemid']);
                 if(trim($input['itemid'])){
                     $edback->attachment = $status['file_name'];
                     $edback->save();
                 }else{
                     $edback->attachment = $status['file_name'];
                     $edback->category = $input['catid'];
                     $edback->student_id = $stinfo->id;
                     $edback->index_id = time();
                     $edback->save_as_new();
                 }
                 break;
         }
    }

    function login_status(){
        return $this->session->userdata('login_status');
    }
} 
