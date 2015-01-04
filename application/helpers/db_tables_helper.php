<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists('print_student_colmn_map')){
    function print_student_colmn_map($col = false){
        $colmlilst = array(
           'first_name' => "First Name",
            'middle_name'=>"Middle Name",
        );
            return $col?(isset($colmlilst[$col])?$colmlilst[$col]:"Undefined"):$colmlilst;


    }
}

if(!function_exists('common_fields')){
    function common_fields(){
        $list['Special Columns'] = array(
            'combine_name'=> "Combined FName Middle & Last" ,
            'index_type_a'=>"Separate Index by (/)",
            'index_type_b'=>"Separate Index by (.)",
            'separate_dob' => "Print DOB, Date/Mont/Year in Separate Columns"
        );

        return $list;
    }
}

if(!function_exists('db_tables')){
function db_tables($sysname,$all = false){
        $list = array(
            'other_dp' => 'other_departments_list',
            'acd_dp' => 'academic_departments_list' ,
            'department_table'=> 'cis_department_list',
            'other_department_table' => 'cis_department_other_list',
            'faculty_view'=>'facult_list',
            'faculty_table' => 'cis_campus_faculty',
            'campus_view'=> 'campus_list',
            'campus_table' => 'cis_campus_list',
            'course_table' => 'cis_department_course',
            'course_view' => 'main_course_list',
            'programme_view'=> 'programme_list',
            'programme_table' => 'cis_department_programs',
            'cal_event_cat_table' => 'cis_college_callender_event_category',
            'cal_event_table' => 'cis_college_callender_event',
            'sem_table' => 'cis_semester',

        );

        $listView = array(
            'cal_event_cat_view' =>'callender_event_category',
            'cal_event_view' => 'callender_events',
            'cal_sem_view' => 'callender_semester_list',
            'sem_struct_view' =>'semester_structures',
            'pg_sem_list_view' => 'programme_semesters'
        );

    $list = $list + $listView;

        if($all){
        return $list;
        }else{
        return $list[strtolower($sysname)];
        }
    }
}

if(!function_exists('user_access_level')){
    function user_access_level($level,$arr = false){
        $avl = array(
            0 => "Read/View Only",
            1 => 'Read/View and Edit',
            2 => "undefined"
        );
        if($arr){
            return $avl;
        }else{
            return isset($avl[$level])?$avl[$level]:'undefinded';
        }
    }
}

if ( ! function_exists('clean_digits'))
{

    function clean_digits($str){

        $newstr = preg_replace('/,/','',trim($str));

        return $newstr;
    }

}



if ( ! function_exists('date_convert'))
{

    function date_convert($dt,$stamp = false){
        $dtdata = preg_replace('/A7P7/','',trim($dt));
        $dtdata = preg_replace('/-/','/',trim($dtdata));
        if($stamp){
            $new = date('Y-m-d h:i:s',trim($dtdata));

        }else{
            $new = date('Y-m-d h:i:s',strtotime($dtdata));
        }
        return $new;
    }

}

if(!function_exists("human_date")){
    function human_date($dtstr,$type = 0){
        if(preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/",$dtstr)){
           $time = strtotime($dtstr);
        }else{
            $time = trim($dtstr);
        }

        $human = unix_to_human($time);
        return $human;
    }
}

if(!function_exists('generate_marital_status() ')){
    function generate_marital_status($catid=false){
        $list = array(
            4 => 'Divorced',
            3 => 'Widowed',
            2 => "Married",
            1 => "Single" ,
        );

        if($catid){
            return $list[$catid];
        }else{
            return $list;
        }
    }
}

if(!function_exists('generate_health_issues')){
    function generate_health_issues($issue = false){
        $list = array(
            'none'=>'none',
            'other'=>'Other',
            'vision' => 'vision',
            "mobility" => "mobility",
            "hearing" => "Hearing" ,
        );

        if($issue){
            return $list[$issue];
        }else{
            return $list;
        }
    }
}

if(!function_exists('generate_bank_list')){
    function generate_bank_list($bank = false){
        $list = array(
            'other'=>'Other',
            'nmb' => 'NMB',
            "nbc" => "NBC",
            "crdb" => "CRDB" ,
        );

        if($bank){
            return $list[$bank];
        }else{
            return $list;
        }
    }
}


if(!function_exists('generate_form_list')){
    function generate_form_list($fid = false){
        $list = array(
            '1'=>'Primary Education forms',
            '2' => 'O-Level/Equivalent forms',
            "3" => "A-Level/Equivalent Forms",
            "4" => "Diploma/FTC Forms" ,
            "5" => "Bachelor Degree Forms" ,
            "6" => "Veta Education forms" ,
            "7" => "Technical Education forms" ,
        );

        if($fid){
            return $list[$fid];
        }else{
            return $list;
        }
    }
}




if(!function_exists('generate_cert_awards')){
    function generate_cert_awards($awad = false){
        $list = array(

        );

        if($awad){
            return $list[$awad];
        }else{
            return $list;
        }
    }
}

if(!function_exists('generate_common_subjects')){
    function generate_common_subjects($subj = false){
        $list = array(
            'en_lan'=>'English',
            'lan_art' => "Language Art",
            'math' => 'Mathematics',
            "amath" => "Advanced Mathematics",
            "phy" => "Phsyics" ,
            'eng_sci' => "Engineering Science",
            "his" => "History" ,
            "bio" => "Biology" ,
            "chem" => "Chemistry" ,
            "civ" => "Civics" ,
            "physics" => "Phsyics" ,
            'eng_draw' => "Technical Drawing",
            'soc_sci' => "Social Science (General Studies)",
            'f_nut' => "Food Science (Food & Nutrition)",
            'eco' => "Economics",
            'book' => "Bookkeeping",
            'geo' => 'Geography'



        );

        if($subj){
            return $list[$subj];
        }else{
            return $list;
        }
    }
}

if(!function_exists('student_reg_category')){
    function student_reg_category($catid = false){
        $list = array(
            3 => 'Graduate Students',
            2 => "Continuing Student",
            1 => "New Student" ,
        );

        if($catid){
            return $list[$catid];
        }else{
            return $list;
        }
    }
}

if(!function_exists('student_fee_category')){
    function student_fee_category($catid = false){
        $list = array(
            2 => "Government Sponsored",
            1 => "Private,Loans or Other" ,
        );

        if($catid){
            return $list[$catid];
        }else{
            return $list;
        }
    }
}

if ( ! function_exists('entry_mode'))
{
    /**
     * @param bool $Input if set makes one the entry mode is returned
     * @param bool $arrayr type of data to be returned is array when true
     * @return array|string
     */
    function entry_mode($Input = false,$arrayr= false)
    {

        $entry_modes = array('--'=>'--',1=>'Pre-Entry',0=>'Direct-Entry',2=>'Both Entry');
        if($arrayr){
            return $entry_modes;
        }else{
            return $Input ==""?"--":$entry_modes[$Input];
        }


    }
}


if(!function_exists('department_types')){
    function department_types($array = false,$uri = false){
        $dptpes = array(
            1=>'Academic Department ',
            2=>"Non Academic Department"
        );

        $pduris = array(
            'other_dp' => 2,
            'academic' => 1
        );

        if($uri){
            if($array){
                return $pduris[$array];
            }else{
                return $pduris;
            }
        }   else{

            if($array){
                return $dptpes[$array];
            }else{
                return $dptpes;
            }
        }
    }
}

// Years sets list types
if(!function_exists('programme_year_list')){
    function programme_year_list($array = false,$year = false, $alias = false){
        $yrli = array(
            0 => "--",
            1=>'First Year',
            2=> 'Second Year',
            3=> 'Third Year',
            4=> 'Fourth Year',
            5 => 'Fifth Year',
            6 => 'Sixth Year',
            7 => 'Seventh Year',
            8 => 'Eighth Year'
        );

        $aliasLi = array(
            0 => "--",
            1=>'1st Year',
            2=> '2nd Year',
            3=> '3rd Year',
            4=> '4th Year',
            5 => '5th Year',
            6 => '6th Year',
            7 => '8th Year',
            8 => '9th Year'
        );


        if($year && !$array){
           if($alias){
               return $aliasLi[$year];
           }else{
               return $yrli[$year];
           }
        }else{
            if($array){
            if($alias){
                return $aliasLi;
            }else{
                return $yrli;
            } }else{
                return "--";
            }
        }
    }
}


if(!function_exists('base_programme_list')){
    function base_programme_list($arr){
        $li = array(0=>'Last Programme')  ;
        if(is_array($arr)){
            foreach($arr as $id => $pg){
                if(!is_numeric($pg['parent_program_id'])){
                $li[$pg['id']] = $pg['name'] . (empty($pg['display_name'])?"": " (" . $pg['display_name'] . ")");   }
            }
        }

        return $li;
    }
}


if(!function_exists('break_name_str')){
    function break_name_str($name,$type = 0){
        $li = explode(',',$name);
        $lname = isset($li[0])?$li[0]:$li;
        $li[1] = isset($li[1])?trim($li[1],' '):"";
        $other = isset($li[1])?explode(" ",trim($li[1])):$li[1] ;

        $mname = isset($other[1])?$other[1]:"";
        $fname = isset($other[0])?$other[0]:$other;



        return array('fname'=>$fname,'mname'=>$mname,'lname'=>$lname);
    }
}

if(!function_exists('programme_list')){
    function programme_list($arr){
        $li = array(0=>'Base Programme (No Parent)');
        if(is_array($arr)){
            foreach($arr as $id => $pg )
            {
                $li[$pg['id']] = $pg['name'] . (empty($pg['display_name'])?"": " (" . $pg['display_name'] . ")");
            }
        }

        return $li;
    }
}
// campus types lists

if(!function_exists('campus_types_list')){
    function campus_types_list($type = 0){
        $campusTypes = array(
        'main' => "Main Branch",
        'sub' => "Branch"
        );

        if($type){
            return $campusTypes[$type];
        } else{
            return $campusTypes;
        }
    }
}

if(!function_exists('campus_list')){
    function campus_list($cmArr){
        $lisArr = array();
        if(is_array($cmArr)){
        foreach($cmArr as $id => $cm){
        $lisArr[$cm['id']] = $cm['name'];
        }
        }
    return $lisArr;
    }
}


if(!function_exists('department_list_arr')){
    function department_list_arr($arr,$type= false){
         $liArr = array();
        if(is_array($arr)){
            foreach($arr as $id => $cm ){
                $liArr[$cm['dp_id']] = $cm['name'] ;
            }
        }
        return $liArr;
    }
}



if(!function_exists('faculty_list')){
    function faculty_list($cmArr){
        $lisArr = array();
        if(is_array($cmArr)){
        foreach($cmArr as $id => $cm){
        $lisArr[$cm['id']] = $cm['facult_name'];
        }
        }
        return $lisArr;
    }
}

if(!function_exists('array_flatten')){
    function array_flatten($ar,$mode=1){
        $oneArra ="";
        if(is_array($ar)){
            switch($mode){
                case 2 :
                    break;
                default:
                foreach($ar as $id => $it){
                    if(!is_array($it)){
                        $oneArra +=", " . $it;
                    }

                }
            }
        }

        return trim($oneArra,",");
    }
}

if(!function_exists('academic_year_separator')){
  function  academic_year_separator(){
      $list = array(
          '--'=>"Separator",
          '/'=>"/",
          '\\'=>"\\",
          '-'=>"-",
          '#'=>'#'
      );

      return $list;
    }
}

if(!function_exists('numeric_values_list')){
    function numeric_values_list($type,$value=false,$rtype=false){
            $values = array(
                    'natural' => array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8),
                    'roman' => array(1=>'I',2=>"II",3=>"III",4=>"IV",5=>"V",6=>"VI",7=>"VII",8=>"VIII")
            );
            $rt = array();
        if($type == 1 && !$value && !$rtype){
             foreach($values['natural'] as $id=>$no){
               $rt[$no] = $no;
             }

            return $rt;
        }elseif($type== 2 && !$value && !$rtype){
            foreach($values['roman'] as $id=>$no){
                $rt[$no] = $no;
            }
            return $rt;
        }else{
            return $values[$type][$value];
        }
    }
}

if(!function_exists('nacte_nta_levels')){
    function nacte_nta_levels($type = false){
        $ntaa = array(1=>"Level 1",2=>'Level 2',3=>"Level 3",4=>'Level 4',5=>"Level 5",6=>'Level 6',7=>'Level 7',8=>'Level 8',9=>'Level 9',10=>'Level 10');
        if($type){
            return $ntaa[$type];
        }else{
            return $ntaa;
        }
    }
}

if(!function_exists('generate_religion')){
    function generate_religion($single = false){
        $list = array(
            1=>"Christian",
            2=>"Muslim",
            3=>'Hindu',
            4=>'Other'
        );
        if($single){
            return $list[$single];
        }else{
            return $list;
        }

    }
}

