<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/1/14
 * Time: 5:42 PM
 */

if(!function_exists('user_profile')){
    function user_profile($level = false,$ds = false){
        $level_map = array(
            'admin'=>'admin',
            'student'=> 'student',
            'registry' => 'registry',
            'department'=> 'department',
            'account'=> 'account',
            'admission'=>'admission',
            'user'=> 'user',
            'login' => 'login',
            'accommodation'=>'accommodation',
            'exam'=> 'exam',
            'finance'=>'finance',
            'module'=>'module',
            'timetable'=>'timetable',
            'teacher'=>'teacher',
            'coordinator' => 'coordinator'
        )   ;

        $level_describe = array(
            'admin'=>'Administration and Management',
            'student'=> 'Normal Student Account',
            'department'=> 'Academic Department Head',
            'finance'=> 'Finance Management',
            'admission'=>'Students Admissions and Management',
            'user'=> 'Normal/Regular User',
            'exam' => 'Examinations Office',
            'module' => 'Modules Management',
            'accommodation'=>"Student Accommodations",
            'timetable'=>'Timetable Master' ,
            'teacher' => 'Academic Department Lecture/Trainer/Teacher',
            'coordinator' => 'Academic Department Coordinator'
        );

        if($level){
            return $level_map[$level];
        }else{
            return $ds?$level_describe[$ds]:$level_describe;
        }
    }
}

if(!function_exists('image_folder')) {
    function image_folder(){
        return base_url().'themes/img/';
    }
}

if(!function_exists('profile_pic_url')){
    function profile_pic_url($profile,$image,$type = 1,$resize=false){
        if($type == 'thumb'){
            $url = base_url().'upload_file/get_photo?type=profile_thumb&userid='.$profile.'&image='.$image;
        }else{
            $url = base_url().'upload_file/get_photo?type=profile_photo&userid='.$profile.'&image='.$image;
        }

        return $url;
    }
}

if(!function_exists('get_profile_modals')){
    function get_profile_modals($segments,$uri){
        $common = array(
            "tpl/modals/edit_item_model",
            "tpl/modals/view_item_modal",
            "tpl/modals/add_item_modal",
        );

        $modals = array(
            'admin/programmes/program_courses' => array(
                'tpl/modals/new_course' ,
                 'tpl/modals/new_programme'
            ),
            'admin/departments/academic' => array(
                'tpl/modals/dpt_modal'
            )                           ,

            'admin/departments/other_dp' => array(
               'tpl/modals/dpt_modal'
            )
        );



        if(array_key_exists($uri,$modals)){
            $full = array_merge($modals[$uri],$common);
          return $full;
        }else{
            return $common;
        }
    }
}

if(!function_exists('get_profile_file')){

    function get_profile_file($uri,$profile,$base = false){
    $urifilemap = array(
            'common'=>array(
                'other_dp' => 'department_list_non',
                'academic' => 'departments_list',
                'admission' => array(
                    'base' => 'admission/dash',
                    'applicants' => 'admission/applicant_list',
                    'register_student' => 'admission/st_register',
                    'st_all' => 'admission/st_summary',
                    'current' => 'admission/st_current_list',
                    'registered' => 'admission/st_registered_list',
                    'not_continuing' => 'admission/st_offprogress',
                    'alumni' => 'admission/st_alumni'
                )
            )
        )       ;
       $file = "";
            if($base){
                if(array_key_exists($uri,$urifilemap['common'][$base])){
                    $file = "common/".$urifilemap['common'][$base][$uri] ;
                }else{
                    $file = 'pg_error';
                }
            }else{
                if(array_key_exists($uri,$urifilemap['common'])){

                    $file =  "common/".$urifilemap['common'][$uri] ;
            }else{
                    $file = 'pg_error';
                }
        }

      return $file;
    }
}



if(!function_exists('user_profile_icon')){
    function user_profile_icon($profile,$subprofile = false){

        $profileTitle = user_profile_map($profile);
        $pIcons = array(
            'admin'=>' admin-icon',
            'department'=> 'department-icon ',
            'student'=>'student-icon',
            'finance'=>'finance-icon',
            'admission'=>'admission-icon',
            'teacher' => ' teacher-icon '    ,
            'coordinator' => ' coordinator-icon ',
            'accommodation' => ' accomodation-icon '
        );
        $subpf =$subprofile?$subprofile['profile_title']:"Profile not Set";

        $shortcode = words_first_letter($subpf);

        if($profile == 'student'){
            $iconStr = "
         <div class='pageheader  profile-title '>
           <div class='headicon'> <div class='{$pIcons[$profile]} profile-icon'></div>  </div>
           <div class='headtitle'>
              <h1>$profileTitle</h1>
             <h5>$subpf</h5>
           </div>
          </div>
        ";
        }else{
            $subpf =$subprofile?$subprofile['profile_title']:"Profile not Set";
            $iconStr = "
         <div class='pageheader  profile-title '>
           <div class='headicon'> <div class='{$pIcons[$profile]} profile-icon'></div>  </div>
           <div class='headtitle'>
              <h1>$subpf </h1>
             <h5>$profileTitle</h5>
           </div>
          </div>
        ";
        }


        return $iconStr;
    }
}


if(!function_exists('words_first_letter')){
    function words_first_letter($wrd,$lc=false){
        $str = "";
        $lst = explode(" ", $wrd,3);
        if(is_array($lst)){
            foreach($lst as $wd) {
                $str .= substr($wd,0,1);
            }
        }            else{
            $str = substr($wrd,0,1);
        }
        return $lc?strtolower($str):strtoupper($str);
    }
}


if(!function_exists('user_profile_map')){
    function user_profile_map($level = false){
        $level_map = array(
            'admin'=>'System Administrator',
            'student'=> 'Student Information',
            'admission' => 'Students Management',
            'department'=> 'Academic Department Head',
            'account'=> 'Finance Management',
            'finance'=>'Finance Management',
            'user'=> 'Normal User' ,
            'accommodation'=>"Student Accommodations",
            'timetable'=>'Timetable Master' ,
            'teacher' => 'Department Lecture/Trainer/Teacher',
            'coordinator' => 'Department Coordinator'
        )   ;

        if($level){
            return $level_map[$level];
        }else{
            return $level_map;
        }
    }
}

if(!function_exists('plugins_folder')){
   function plugins_folder(){
        return base_url(). 'themes/js/plugins/';
   }
}

if(!function_exists('css_plugins_folder')){
    function css_plugins_folder(){
        return base_url(). 'themes/css/plugins/';
    }
}

if(!function_exists('js_folder')){
    function js_folder(){
        return base_url(). 'themes/js/';

    }
}

if(!function_exists('file_dl_url')){
    function file_dl_url($param){
        return base_url().'upload_file/download_file?type='.$param['type'].'&file='.$param['name'] ;
    }
}

if(!function_exists('js_files')){
    function js_files($profile,$uri){
        $common = array(
           // '<link rel="stylesheet" href="'. css_plugins_folder() .'uploader/style.css"> ',
   ' <link rel="stylesheet" href="'. css_plugins_folder() .'uploader/jquery.fileupload.css">',
'<link rel="stylesheet" href="'. css_plugins_folder() .'uploader/jquery.fileupload-ui.css">',
'
<noscript><link rel="stylesheet" href="'. css_plugins_folder() .'uploader/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="'. css_plugins_folder() .'uploader/jquery.fileupload-ui-noscript.css"></noscript>',

    '<script type="text/javascript" src="' . base_url(). 'themes/js/plugins/jquery-1.9.1.min.js"></script>',
    '<script type="text/javascript" src="' . base_url(). 'themes/js/plugins/jquery-migrate-1.1.1.min.js"></script>',
   ' <script type="text/javascript" src="' . base_url(). 'themes/js/plugins/modernizr.min.js"></script>',
   ' <script type="text/javascript" src="' . base_url(). 'themes/js/plugins/jquery-ui-1.10.3.min.js"></script>',
   ' <script type="text/javascript" src="' . base_url(). 'themes/js/plugins/bootstrap.min.js"></script>',
   ' <script type="text/javascript" src="' . base_url(). 'themes/js/plugins/bootstrap-modal.js"></script>',
    '<script type="text/javascript" src="' . base_url(). 'themes/js/plugins/bootstrap-modalmanager.js"></script>',
    '<script type="text/javascript" src="' . base_url(). 'themes/js/plugins/jquery.growl.js"></script>',
    '<script type="text/javascript" src="' . base_url(). 'themes/js/plugins/bootstrapValidator.min.js"></script>',
    '<script type="text/javascript" src="' . base_url(). 'themes/js/plugins/jquery.chosen.js"></script>',
   ' <script type="text/javascript" src="' . base_url(). 'themes/js/plugins/jquery.alerts.js"></script>',
   ' <script type="text/javascript" src="' . base_url(). 'themes/js/plugins/jquery.cookie.js"></script>',
   '<script type="text/javascript" src="' . base_url(). 'themes/js/plugins/jquery.dataTables.js"></script>',
    '<script type="text/javascript" src="' . base_url(). 'themes/js/plugins/jquery.slimscroll.js"></script>',
   ' <script type="text/javascript" src="' . base_url(). 'themes/js/plugins/jquery.bxSlider.js"></script>',
    '<script type="text/javascript" src="' . base_url(). 'themes/js/plugins/jquery.uniform.js"></script>',
    '<script type="text/javascript" src="' . base_url(). 'themes/js/plugins/responsive.table.js"></script>',
    '<script type="text/javascript" src="' . base_url(). 'themes/js/user_fx.js"></script>',
     ' <script type="text/javascript" src="' . base_url(). 'themes/js/inputs.js"></script>',
   ' <script type="text/javascript" src="' . base_url(). 'themes/js/custom.js"></script>',

        );
          // $common = array();
        $pageSpecific = array(

        );
        $files = "";
        foreach($common as $id => $item){
            $files .= trim($item);
        }

        foreach($pageSpecific as $id => $item){
            $files .= trim($item);
        }

        return $files;
    }
}

if(!function_exists('css_files')){
    function css_files($profile,$uri){
        $common = array(
            ' <link href=" ' . base_url(). 'themes/css/global.css" rel="stylesheet" type="text/css">'
        );

        $pageSpecific = array(

        );
        $files = "";

       foreach($common as $id => $item){
           $files .= $item;
       }

        foreach($pageSpecific as $id => $item){
            $files .= $item;
        }

        return $files;
    }
}
