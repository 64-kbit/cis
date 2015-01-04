<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/26/14
 * Time: 7:02 PM
 */

class fileExplorer extends DataMapper {
    public $table = 'cis_user_files';
    protected $path_img_upload_folder;
    protected $path_img_thumb_upload_folder;
    protected $path_url_img_upload_folder;
    protected $path_url_img_thumb_upload_folder;
    protected  $mails_dir;
    protected $admin_dir;
    protected  $trash_dir;
    protected  $students_dir;
    protected  $profile_dir;
    protected $profile_thumbs;
    protected  $gallery_dir;
    protected   $gallery_thumbs;
    protected $loans_dir;
    public  $uploader;
    protected $delete_img_url;

    function __construct(){
        parent::__construct();
        //Set relative Path with CI Constant
        //$this->setPath_img_upload_folder(PHOTO_GALLERY);
        //$this->setPath_img_thumb_upload_folder(PHOTO_GALLERY_THUMBS);

        //Delete img url
       // $this->setDelete_img_url(TRASH_FILES);

        //Set url img with Base_url()
       // $this->setPath_url_img_upload_folder(base_url() .PHOTO_GALLERY);
        //$this->setPath_url_img_thumb_upload_folder(base_url() . PHOTO_GALLERY_THUMBS);
         $this->mails_dir = MAIL_FILES;
        $this->admin_dir = ADMIN_FILES;
        $this->trash_dir = TRASH_FILES;
        $this->students_dir = STUDENT_FILES;
        $this->profile_dir = PROFILE_PHOTOS;
        $this->profile_thumbs = PROFILE_PHOTOS_THUMBS;
        $this->gallery_dir = PHOTO_GALLERY;
        $this->loans_dir = LOANS_FILES;
        $this->load->library('session');
       // $this->uploader = new UploadHandler();

    }


    function search_files($type,$removed=false){
         $this->where('content_type',$type)->get();
        $status['count'] = 0;$status['list'] = false;
        foreach($this->all as $id => $dt){
            $status['count'] += 1;
            $status['list'][] = $dt;
        }

        return $status;
    }

    function  upload_student_certificate($indata){
        $this->load->library('UploadHandler');
        //Format the name
        $CI = &get_instance();
        if(!isset($_FILES['files']['name'])){
            return 0;
        }
        $name = $_FILES['files']['name'];
        //var_dump($name);
        // $type = strtolower(file_type_from_name(FCPATH.STUDENT_LIST_FILES.$name));
       // $name[0] =
        $name = $name[0] ;   //'students loans imports_list.csv';//
        $data = false;

        if(!is_dir(FCPATH.STUDENT_FILES.$indata['folder'])){
           mkdir(FCPATH.STUDENT_FILES.$indata['folder']);
        }

        if(is_file(FCPATH.TMP_UPLOAD_DIR.$name)){
            if(file_exists(FCPATH.STUDENT_FILES.$indata['folder']."/".$name)){
                unlink(file_exists(FCPATH.STUDENT_FILES.$indata['folder']."/".$name));
                $fname = $name;
            }else{
                $fname = $name;
            }
            rename(FCPATH.TMP_UPLOAD_DIR.$name,FCPATH.STUDENT_FILES.$indata['folder']."/".$fname);
            $data = array(
                'file_name' =>$indata['folder']."/".$fname ,
                'content_type' => 'students_list' ,
                'file_path' => FCPATH.STUDENT_FILES.$indata['folder']."/".$fname ,
                'file_url' => file_dl_url(array('type'=>'students_list','name'=>$indata['folder']."/".$fname)) ,
                'import_status' => 0,
                'uploader'=>$CI->session->userdata['uid']
            );
            $this->add_file($data);
            $data['file_id'] = $this->id;
            $data['file_upload_time'] = time();
            $CI->session->set_userdata('upload_status',array('action'=>'import','file_type'=>'Students','data'=>$data));
        }

        return $data;
    }

    function add_file($data){
       $this->file_name = $data['file_name'];
        $this->user_id = $data['uploader'];// $this->session->userdata['login_id'];
        $this->date_added =date('Y-m-d H:i:s',time());
        $this->content_type = $data['content_type'];
        $this->file_path = $data['file_path'];
        $this->file_url = $data['file_url'];                     -
        $this->imported_to_db = $data['import_status'];
        $this->deleted =0;
        //if($this->id){
         //   $this->id = $this->id + 1;
      //  }
        $this->save();

    }

    /*
     * Handle students list csv file uploading
     */
    public  function  upload_students_csv(){
        $this->load->library('UploadHandler');
        //Format the name
         $CI = &get_instance();
        if(!isset($_FILES['files']['name'])){
            return 0;
        }
        $name = $_FILES['files']['name'];
        //var_dump($name);
       // $type = strtolower(file_type_from_name(FCPATH.STUDENT_LIST_FILES.$name));
        $name = $name[0] ;   //'students loans imports_list.csv';//
        if(is_file(FCPATH.TMP_UPLOAD_DIR.$name)){
            if(file_exists(FCPATH.STUDENT_LIST_FILES.$name)){
               $newname = explode('.',$name);
                //$this->where('file_name',$name)->get();
                $fname = $newname[0] . "_" .  (time())."." . $newname[1];
            }else{
                $fname = $name;
            }
            rename(FCPATH.TMP_UPLOAD_DIR.$name,FCPATH.STUDENT_LIST_FILES.$fname);
            $data = array(
                'file_name' =>$fname ,
                'content_type' => 'students_list' ,
                'file_path' => FCPATH.STUDENT_LIST_FILES.$fname ,
                'file_url' => file_dl_url(array('type'=>'students_list','name'=>$fname)) ,
                'import_status' => 0,
                'uploader'=>$CI->session->userdata['uid']
            );
            $this->add_file($data);
            $data['file_id'] = $this->id;
            $data['file_upload_time'] = time();
            $CI->session->set_userdata('upload_status',array('action'=>'import','file_type'=>'Students','data'=>$data));
        }
    }


    function import_student_xls_to_db($fname){

    }

    public  function upload_students_class(){

    }

    public  function upload_loan_csv(){
        $this->load->library('UploadHandler');
        //Format the name
        $CI = &get_instance();
        if(!isset($_FILES['files']['name'])){
            return 0;
        }
        $name = $_FILES['files']['name'];
        //var_dump($name);
        $name = $name[0] ;   //'students loans imports_list.csv';//
        if(is_file(FCPATH.TMP_UPLOAD_DIR.$name)){
            if(file_exists(FCPATH.LOANS_FILES.$name)){
                $newname = explode('.',$name);
                //$this->where('file_name',$name)->get();
                $fname = $newname[0] . "_" .  (time())."." . $newname[1];
            }else{
                $fname = $name;
            }
            rename(FCPATH.TMP_UPLOAD_DIR.$name,FCPATH.LOANS_FILES.$fname);
        $data = array(
            'file_name' =>$fname ,
            'content_type' => 'loan' ,
            'file_path' => FCPATH.LOANS_FILES.$fname ,
            'file_url' => file_dl_url(array('type'=>'loan','name'=>$fname)) ,
            'import_status' => 0,
            'uploader'=>$CI->session->userdata['uid']
        );
        $this->add_file($data);

            $data['file_id'] = $this->id;
            $data['file_upload_time'] = time();
            $CI->session->set_userdata('upload_status',array('action'=>'import','file_type'=>'students_loans','data'=>$data));

        }
    }

    function import_loan_xls_to_db($flurl){

        return true;
    }
    function get_loan_csv_delete_url($fname,$folder){
        $url = base_url() . 'upload_file/get_file?name='.$fname . '&folder='.$folder;
        return $url;
    }

    function get_loan_csv_file_url($fname,$folder){
        $url = base_url() . 'upload_file/remove_file?name='.$fname . '&folder='.$folder;
         return $url;
    }

    function upload_photo(){
        $this->load->library('UploadHandler');
        //Format the name
        $CI = &get_instance();
        if(!isset($_FILES['files']['name'])){
            return 0;
        }
        $name = $_FILES['files']['name'];
        $username = $CI->session->userdata['uid'];

        //var_dump($name);
        $name = $name[0] ;
        $type = file_type_from_name($name);

        if(is_file(FCPATH.TMP_UPLOAD_DIR.$name)){
            if(file_exists(FCPATH.PROFILE_PHOTOS.$name)){
                $fname = trim($username) . "." . trim($type);
               unlink(FCPATH.PROFILE_PHOTOS.$name);
            }else{
                $fname =  $fname = trim($username) . "." . trim($type);;
            }
            rename(FCPATH.TMP_UPLOAD_DIR . "thumbnail/".$name,FCPATH.PROFILE_PHOTOS_THUMBS.$fname);
            rename(FCPATH.TMP_UPLOAD_DIR.$name,FCPATH.PROFILE_PHOTOS.$fname);
        }

        $user = new User();
        $user->where('login_id',$username)->get();
        $user->profile_photo = $fname;
        $user->save();
    }

    //Function for the upload : return true/false
    public function do_upload()
    {
        if (!$this->upload->do_upload())
        {
            return false;
        }
        else
        {
            //$data = array('upload_data' => $this->upload->data());
            return true;
        }
    }

    function crop_profile_photo($input){
       $orsrc = FCPATH. $this->profile_dir .$input['itemname'];
        $ftype = file_type_from_name($input['itemname']);
        $new = FCPATH.$this->profile_dir ."original_".trim($input['itemid']).'.'.$ftype;

        if(is_file($orsrc)){
            if(!is_file($new)){
                copy($orsrc,$new);
                unlink($orsrc);
            }else{
                $new = $orsrc;
            }
       // $src = $new;
        $ob = new stdClass();
        $ob->x = $input['coord_x'];
        $ob->y = $input['coord_y'];
        $ob->width = $input['width'];
        $ob->height = $input['height'];
        $ob->type = exif_imagetype($new);//$input['coord_y'];
        $ob->src = $new;
        $ob->dst = $orsrc;
           // var_dump($ob);die();
          $status =  $this->crop($ob);
            if($status['error'] == false){
               $this->create_img_thumb($ob->dst,150,186,$input['itemid'].'.'.$ftype);
            }
            return $status;
        }else{
            return array('errors'=>true,'error'=>true,'data'=>'Specified File not Found in the system!','message'=>'Specified File not Found in the system!');
        }

    }

    function restore_image($input){
        $orsrc = FCPATH. $this->profile_dir .$input['itemname'];
        $ftype = file_type_from_name($input['itemname']);
        $new = FCPATH.$this->profile_dir ."original_".trim($input['itemid']).'.'.$ftype;
        if(is_file($new)){
            unlink($orsrc);
            rename($new,$orsrc);
            return array('errors'=>false,'error'=>false,'data'=>'File has Been Reset','message'=>'File Has Been Restored to Original');
        } else{
            return array('errors'=>true,'error'=>true,'data'=>'File Not Found!','message'=>'Specified File is not Found in the system!');

        }
    }

    function rotate_image($fname,$dgree){
        $image = new Imagick($fname);
         $image->rotateImage("ffffff",$dgree);
        return array('errors'=>false,'error'=>false,'data'=>'Image Rotated','message'=>'Image Rotated!');

    }

    private function create_img_thumb($src,$width,$height,$dstname){
          $image = new Imagick($src);
          $image->scaleimage($width,$height,true);
            $image->writeimage(FCPATH.PROFILE_PHOTOS_THUMBS.$dstname);
        $image->destroy();
    }


    private function imagic_crop(&$data){
        if (!empty($data->src) && !empty($data->dst) && !empty($data)) {
            if(is_file($data->src)){
             $image = new Imagick($data->src);

                $result =  $image->cropimage($data->width,$data->height,$data->x,$data->y);
                $image->setcompressionquality(Imagick::COMPRESSION_LOSSLESSJPEG);
            $image->writeimage($data->dst);
            if($result){
                $msg = "Image Successfully Cropped";
            }else{
                $msg = "failed to Crop & Save the Image";
            }
            $error = !$result;
            $image->destroy();
            }else{
                $error = true;
                $msg = "Provided file does not exist";
            }
        }else{
            $error = true;
            $msg = "Mising Required Information";
        }

        return array('error'=>$error,'msg'=>$msg);
    }

    private function crop(&$data) {

        if (!empty($data->src) && !empty($data->dst) && !empty($data)) {
            switch ($data -> type) {
                case IMAGETYPE_GIF:
                    $src_img = imagecreatefromgif($data->src);
                    break;

                case IMAGETYPE_JPEG:
                    $src_img = imagecreatefromjpeg($data->src);
                    break;

                case IMAGETYPE_PNG:
                    $src_img = imagecreatefrompng($data->src);
                    break;
                default:
                    $src_img = false;
            }

            if (!$src_img) {
               $msg = "Failed to read the image file";
                return array('error'=>true,'msg'=>$msg);
            }

            //$dst_img = imagecreatetruecolor(220, 220);
           // imagecolorallocate($src_img,255,255,255);
            $dst_img = imagecrop($src_img,(array) $data);
           // $result = imagecopyresampled($dst_img, $src_img, 0, 0, $data -> x, $data -> y, 220, 220, $data -> width, $data -> height);

            if ($dst_img) {
                switch ($data -> type) {
                    case IMAGETYPE_GIF:
                        $result = imagegif($dst_img, $data->dst);
                        break;

                    case IMAGETYPE_JPEG:
                        $result = imagejpeg($dst_img, $data->dst);
                        break;

                    case IMAGETYPE_PNG:
                        $result = imagepng($dst_img, $data->dst);
                        break;
                }

                if (!$result) {
                    $error = true;
                    $msg  = "Failed to save the cropped image file";
                }else{
                    $error = false;
                    $msg = "Image Successfully Cropped";
                }
            } else {
                $error = true;
                $msg = "Failed to crop the image file";
            }

            imagedestroy($src_img);
            imagedestroy($dst_img);
        }

        return array('error'=>$error,'msg'=>$msg);

    }


} 
