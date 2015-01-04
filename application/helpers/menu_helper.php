<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/1/14
 * Time: 5:40 PM
 */


// User profiles datbase to normal string mapper

if(!function_exists('build_breadcrumbs')){
    function build_breadcrumbs($profile,$uri,$current = "",$parse = false){
        $separator = "<span class=\"separator\"></span>";
        $bstr = "";
        $currentMenu = user_menu_items($profile,'main',$current,count($uri),array());
        $menuData = $currentMenu[$uri[2]];
        $last = end($uri); reset($uri);
        if(is_array($uri)){
            foreach($uri as $id => $item){
                if($id == 1) { continue; }
                if($menuData['submenu']){
                    foreach($menuData['submenu'] as $id => $menu){
                        if($menu['code_name'] == $item){
                            $menuData =  $menu;
                            break;
                        }
                    }
                }
                $title = $menuData['title'];

                if( $last == $item){
                    $bstr .= "<li>". $parse->parse_config($title) . "</li>";
                }else{
                    $bstr .= "<li>". $parse->parse_config($title) . "  $separator</li>";
                }
            }
        }

        return $bstr;
    }
}

if(!function_exists('current_menu_title')){
    function current_menu_title($profile,$baseMenu,$level=1,$uri,$menutype='main',$parse = false){
        $currentMenus = user_menu_items($profile,$menutype);
        $currentMenu = $currentMenus[isset($uri[2])?$uri[2]:$uri[1]] ;
        $menuDesc = array();

        $lastitem = end($uri);
        reset($uri);
        if($currentMenu['submenu'] && $level > 1 && $currentMenu['code_name'] != $lastitem ){
            $subItems = $currentMenu['submenu'];
            $newAr = array();
            $lastAr = array();
            if($subItems){
                foreach ($uri as $id => $item){
                    if($id == 1){ continue;}
                    if(count($newAr) ) $subItems = $newAr;
                    foreach($subItems as $itid => $itdata){
                        if($itdata['code_name'] == $lastitem){
                            $lastAr = $itdata;
                            break 2;
                        }else{
                            if($itdata['code_name'] == $item && $itdata['submenu']){
                                $newAr = $itdata['submenu'];
                                break;
                            }
                        }
                    }
                }
                 if(!empty($lastAr)){

                $menuDesc['icon']= $lastAr['icon'];
                $menuDesc['details'] = $parse->parse_config($lastAr['desc']);
                $menuDesc['title'] = $parse->parse_config($lastAr['title']); }

            }else{
                $currentMenu = $currentMenus[$uri[$level]] ;
                $menuDesc['icon']= $currentMenu['icon'];
                $menuDesc['details'] = $parse->parse_config($currentMenu['desc']);
                $menuDesc['title'] = $parse->parse_config($currentMenu['title']);
            }

        } else{
            $menuDesc['icon']= $currentMenu['icon'];
            $menuDesc['details'] = $parse->parse_config($currentMenu['desc']);
            $menuDesc['title'] = $parse->parse_config($currentMenu['title']);
        }
        $menuDesc['base_menu'] = $uri[1];



        return $menuDesc;
    }
}


if(!function_exists('build_header_menu_items')){
    function build_header_menu_items($itemsList,$profile){

        $menu ='<li class="odd">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="count">4</span>
        <span class="head-icon head-message"></span>
        <span class="headmenu-label">Messages</span>
    </a>
    <ul class="dropdown-menu">
        <li class="nav-header">Messages</li>
        <li><a href=""><span class="fa fa-envelope"></span> New message from <strong>Jack</strong> <small class="muted"> - 19 hours ago</small></a></li>
        <li><a href=""><span class="fa fa-envelope"></span> New message from <strong>Daniel</strong> <small class="muted"> - 2 days ago</small></a></li>
        <li><a href=""><span class="fa fa-envelope"></span> New message from <strong>Jane</strong> <small class="muted"> - 3 days ago</small></a></li>
        <li><a href=""><span class="fa fa-envelope"></span> New message from <strong>Tanya</strong> <small class="muted"> - 1 week ago</small></a></li>
        <li><a href=""><span class="fa fa-envelope"></span> New message from <strong>Lee</strong> <small class="muted"> - 1 week ago</small></a></li>
        <li class="viewmore"><a href="messages.html">View More Messages</a></li>
    </ul>
</li>';
        return  $menu;

    }
}

if(!function_exists('main_sub_menu')){
    function main_sub_menus_walker($submenu,$uri,$level = 3,$parse){
        $subs = "";
        $mainItem = "";
        $subs .= "<ul>";
        $bpage = isset($uri[$level])?$uri[$level]:$uri[2];

        foreach($submenu as $id => $item){
            $title = $parse->parse_config($item['title']);
            $desc = $parse->parse_config($item['desc']);
            $subitems = isset($item['submenu'])?$item['submenu']:false;

            $icon = $subitems?"":"";

            $liclasses =     $subitems?"dropdown ":"";
            $liclasses .=  $bpage == $item['code_name']?' active ':" ";


            $link =  $subitems? "#": "href='{$item['link']}' ";

            $mainItem .= "<li class='" . $liclasses ."' title='$desc'>";
            $mainItem .= "<a " . $link . ">" . $icon . $title. "</a>";

            $mainItem .= $subitems ? main_sub_menus_walker($item['submenu'],$uri,$level+1,$parse) : "";
            $mainItem .= "</li>";
        }


        $subs .= $mainItem .  "</ul>";

        return $subs;
    }
}

if(!function_exists('user_menu_items')) {
    function user_menu_items($profile,$menutype,$current="",$leves = "",$submen = array(),$selected_options = false) {
        $baseUrl = base_url();
        /* List of common menu Items that are shared throughout profiles */
        $common_function    = array(
            'logout'=>array(
                'loc'=>'sub',  // Menu display location sub = Submenus item main = Main Items menu
                'link'=> $baseUrl  . '/logout',   // where the menu link to page item
                'title'=>'Dashboard',   // Menu display title
                'desc'=>'Quit from System',  // Menu descriptions
                'base'=>'admin',// Menu main base page/profile
                'submenu'=>false,   /// Menu submenu Items
                'icon'=>'fa fa-power-off'), // Menu Icon File
              // Profile account settings link
            'account_setting'=> array('loc'=>'sub',
                'sub'=>'main','link'=> $baseUrl  .$profile . '/account_settings',
                'title'=>'Account Settings',
                'desc'=>'My Account Settings Information',
                'base'=>'admin',
                'submenu'=>false,
                'icon'=>'fa fa-wrench'),

            // Profile infomation settings appears on header
            'edit_profile'=> array(
                'loc'=>'sub',
                'sub'=>'main',
                'link'=> $baseUrl  .$profile . '/my_profile',
                'title'=>'My Profile',
                'desc'=>'My Account Information',
                'base'=>'admin',
                'submenu'=>false,
                'icon'=>'fa fa-wrench'),

            'dashboard'=> array('loc'=>'sub',
                'code_name'=>'home',
                'link'=> $baseUrl  .$profile . '/home',
                'title'=>'Dashboard',
                'desc'=>'Home page',
                'base'=>'admin',
                'submenu'=>false,
                'icon'=>'fa fa-dashboard'),
              /** Dashboard aka home/landing page link */
            'home'=> array('loc'=>'sub',
                'code_name'=>'home',
                'link'=> $baseUrl  .$profile . '/home',
                'title'=>'Dashboard',
                'desc'=>'Home page',
                'base'=>'admin',
                'submenu'=>false,
                'icon'=>'fa fa-dashboard'),
            /** Profile Messages and Information summary */
            'messages'=>array('loc'=>'sub',
                'code_name'=>'messages',
                'link'=> $baseUrl  .$profile . '/messages',
                'title'=>'Messages #dtct#','desc'=>'New Messages',
                'base'=>'admin',
                'submenu'=>false,
                'icon'=>'fa fa-envelope'),
            'reports'=>array('loc'=>'sub',
                'code_name'=>'reports',
                'link'=> $baseUrl  .$profile . '/reports',
                'title'=>'Reports for Print #dtct#','desc'=>'Generate Reports and Summaries from System',
                'base'=>'reports',
                'submenu'=>false,
                'icon'=>'fa fa-print'),
                /** Profile information menu */
            'profile' => array('loc'=>'sub',
                'code_name'=>'profile','link'=>'#',
                'icon'=>'fa fa-user',
                'title'=>'My Profile',
                'desc'=>'User Accounts Configurations and Settings',
                'base'=>'admin',
                'submenu'=>array(
                    1=> array( 'loc'=>'main','link'=>$baseUrl . $profile . '/profile/edit_profile',
                        'title'=>'Edit My Profile',
                        'code_name'=> 'edit_profile',
                        'icon'=>'fa fa-pencil',
                        'desc'=>'Change/Modify Account and Profile Information',
                        'base'=>'admin',
                        'submenu'=>false ),

                    2=> array(
                        'loc'=>'main', 'link'=>$baseUrl  . '/sign_out',
                        'icon'=>'fa fa-sign-out',
                        'code_name'=>'sign_out',
                        'title'=>'Sign Out',
                        'desc'=>'Sign Out of the System',
                        'base'=>'login',
                        'submenu'=>false
                    )
                ))
        );

        $prfmenu = array(
            'student'=>array(
                'academic'=>array('loc'=>'sub',
                    'code_name'=>'academic',
                    'icon'=>'fa fa-graduation-cap',
                    'link'=> $baseUrl  .$profile . '/academic',
                    'title'=>'Academic Info',
                    'desc'=>'Academic Info',
                    'base'=>'department',
                    'submenu'=>false),
                'finance_info'=>array('loc'=>'main',
                    'code_name'=>'finance_info',
                    'icon'=>'fa fa-dollar',
                    'link'=> $baseUrl  .$profile . '/finance_info',
                    'title'=>'Financial Information',
                    'desc'=>'Students Fee payments status information',
                    'base'=>'finance_info',
                    'submenu'=>false),
                'class' => array( 'loc'=>'main',
                    'code_name'=>'class',
                    'icon'=>'fa fa-graduation-cap',
                    'link'=> $baseUrl  .$profile . '/class',
                    'title'=>"My Class",
                    'desc'=>"My Current Class Information",
                    'submenu'=>array(
                        1=> array( 'loc'=>'main','link'=>$baseUrl  .$profile  . '/class/students',
                            'title'=>'Students List',
                            'code_name'=> 'students',
                            'icon'=>'fa fa-pencil',
                            'desc'=>'List of Students in my Class',
                            'base'=>'student_info',
                            'submenu'=>false ),
                        2=> array( 'loc'=>'main','link'=>$baseUrl  .$profile . '/class/modules',
                            'title'=>'Modules List',
                            'code_name'=> 'modules',
                            'icon'=>'fa fa-pencil',
                            'desc'=>'List of Modules in My Class',
                            'base'=>'student_info',
                            'submenu'=>false ),
                        3=> array(
                            'loc'=>'main','link'=>$baseUrl  .$profile . '/class/results',
                            'title'=>'Exam Results #count#',
                            'code_name'=> 'results',
                            'icon'=>'fa fa-pencil',
                            'desc'=>'Results ',
                            'base'=>'student_info',
                            'submenu'=>false
                        )     ,
                        4=> array(
                            'loc'=>'main','link'=>$baseUrl  .$profile . '/class/announcements',
                            'title'=>'Announcements #count#',
                            'code_name'=> 'announcements',
                            'icon'=>'fa fa-pencil',
                            'desc'=>'Announcements and News Information',
                            'base'=>'student_info',
                            'submenu'=>false
                        )

                    )
                ),
                'student_info'=>array('loc'=>'main',
                    'code_name'=>'student_info',
                    'icon'=>'fa fa-user',
                    'link'=> $baseUrl  . '/student_info',
                    'title'=>'My Profile',
                    'desc'=>'My Background and Profile Information',
                    'base'=>'student_info',
                    'submenu'=>array(
                        1=> array( 'loc'=>'main','link'=>$baseUrl  . 'student_info/edit_profile',
                            'title'=>'Account Settings',
                            'code_name'=> 'edit_profile',
                            'icon'=>'fa fa-pencil',
                            'desc'=>'Student Account Summary Information',
                            'base'=>'student_info',
                            'submenu'=>false ),
                        2=> array(
                            'loc'=>'main', 'link'=>$baseUrl .$profile   . '/student_info/admission_info',
                            'icon'=>'fa fa-user',
                            'code_name'=>'admission_info',
                            'title'=>'Admission Information',
                            'desc'=>'Admission Status and Summary Information',
                            'base'=>'student_info',
                            'submenu'=>false
                        ),
                        3=> array(
                            'loc'=>'main', 'link'=>$baseUrl .$profile  . '/student_info/personal_info',
                            'icon'=>'fa fa-user',
                            'code_name'=>'personal_info',
                            'title'=>'Personal Information',
                            'desc'=>'Personal Background Information',
                            'base'=>'student_info',
                            'submenu'=>false
                        ),

                        4=> array(
                            'loc'=>'main', 'link'=>$baseUrl .$profile   . '/student_info/education_info',
                            'icon'=>'fa fa-user',
                            'code_name'=>'education_info',
                            'title'=>'Education Background',
                            'desc'=>'Education Background Information',
                            'base'=>'student_info',
                            'submenu'=>false
                        )
                    )),
            ),
            'academic'=>array(
                'loc'=>'main',
                'link'=>'#',
                'code_name'=>'academic',
                'title'=> 'Academic Management',
                'icon' => 'fa fa-archive',
                'desc'=>"Students Academic Records Information",
                'base'=> $profile,
                'submenu' => array(
                1=> array(
                        'loc'=>'main','link'=>$baseUrl . $profile . '/academic/grading_scheme',
                        'title'=>'Grading Schemes',
                        'code_name'=> 'grading_scheme',
                        'icon'=>'fa fa-plus-sign',
                        'desc'=>'#c_type# Grading Schemes Settings & Management',
                        'base'=>'admission',
                        'submenu'=>false),
                    2=> array(
                        'loc'=>'main','link'=>$baseUrl . $profile . '/academic/examinations',
                        'title'=>'Examinations & Tests',
                        'code_name'=> 'examinations',
                        'icon'=>'fa fa-plus-sign',
                        'desc'=>'#c_type# Examinations, Tests and Assignments List and Configurations Information',
                        'base'=>'admission',
                        'submenu'=>false),
                    3=> array(
                        'loc'=>'main','link'=>$baseUrl . $profile . '/academic/course-result',
                        'title'=>'Students Results',
                        'code_name'=> 'course-result',
                        'icon'=>'fa fa-plus-sign',
                        'desc'=>'#c_type# Grading Schemes Settings & Management',
                        'base'=>'admission',
                        'submenu'=>array(
                            1=> array(
                                'loc'=>'main','link'=>$baseUrl . $profile . '/academic/course-result/best',
                                'title'=>'Best Performers',
                                'code_name'=> 'best',
                                'icon'=>'fa fa-plus-sign',
                                'desc'=>'Best Students List for Courses',
                                'base'=>'course-result',
                                'submenu'=>false),
                            2=> array(
                                'loc'=>'main','link'=>$baseUrl . $profile . '/academic/course-result/failed',
                                'title'=>'Best Failures',
                                'code_name'=> 'failed',
                                'icon'=>'fa fa-plus-sign',
                                'desc'=>'Failed Students List for Courses',
                                'base'=>'course-result',
                                'submenu'=>false),
                            3=> array(
                                'loc'=>'main','link'=>$baseUrl . $profile . '/academic/course-result/summary',
                                'title'=>'Result Summary',
                                'code_name'=> 'summary',
                                'icon'=>'fa fa-plus-sign',
                                'desc'=>'Students Performance Summary',
                                'base'=>'course-result',
                                'submenu'=>false),
                            4=> array(
                                'loc'=>'main','link'=>$baseUrl . $profile . '/academic/course-result/reports',
                                'title'=>'Generate Reports',
                                'code_name'=> 'reports',
                                'icon'=>'fa fa-plus-sign',
                                'desc'=>'Examination Reports Summary',
                                'base'=>'course-result',
                                'submenu'=>false),
                        )),
                    4 => array(
                        'loc'=>'main','link'=>$baseUrl . $profile . '/academic/modules',
                        'title'=>'Academic Modules List',
                        'code_name'=> 'modules',
                        'icon'=>'fa fa-plus-sign',
                        'desc'=>'Academic Modules Information Management',
                        'base'=>'admission',
                        'submenu'=>false),
                    5 => array( 'loc'=>'main','link'=>$baseUrl . $profile . '/academic/modules-lectures',
                        'title'=>'Lectures Assignment',
                        'code_name'=> 'modules-lectures',
                        'icon'=>'fa fa-th',
                        'desc'=>'Academic Modules Lectures Assignment',
                        'base'=>'users',
                        'submenu'=>false ),
                   6 => array( 'loc'=>'main','link'=>$baseUrl . $profile . '/academic/modules-classes',
                        'title'=>'Modules Class Assignment',
                        'code_name'=> 'modules-classes',
                        'icon'=>'fa fa-th',
                        'desc'=>'#c_type# List of Course Modules Class Assignment',
                        'base'=>'users',
                        'submenu'=>false )
                )
            ),
            'users'=>array('loc'=>'main',
                'code_name'=>'users',
                'link'=> $baseUrl  .$profile . '/users',
                'title'=>'Manage Users',
                'desc'=>'New Added System Users',
                'base'=>'admin',
                'icon'=>'fa fa-group',
                'submenu'=>array(
                    1 => array( 'loc'=>'main','link'=>$baseUrl . $profile . '/users/categories',
                        'title'=>'User Groups & Categories',
                        'code_name'=> 'categories',
                        'icon'=>'fa fa-group',
                        'desc'=>'System Users Categories Info',
                        'base'=>'users',
                        'submenu'=>false ),
                    2 => array( 'loc'=>'main','link'=>$baseUrl . $profile . '/users/list',
                        'title'=>'People & Users Directory',
                        'code_name'=> 'list',
                        'icon'=>'fa fa-group',
                        'desc'=>'System Users and People Information',
                        'base'=>'users',
                        'submenu'=>false ),
                )
            ),
            'admission'=> array(
                'loc'=>'main',
                'link'=>'#',
                'code_name'=>'admission',
                'title'=> 'Students Admissions',
                'icon' => 'fa fa-archive',
                'desc'=>"#c_type# Students Admissions Information",
                'base'=> $profile,
                'submenu'=>array(
                    1=> array(
                        'loc'=>'main','link'=>$baseUrl . $profile . '/admission/register_student',
                        'title'=>'Admit/Readmit Students',
                        'code_name'=> 'register_student',
                        'icon'=>'fa fa-plus-sign',
                        'desc'=>'Create or Manage New Students information',
                        'base'=>'admission',
                        'submenu'=>false),
                    2=> array(
                        'loc'=>'main', 'link'=>$baseUrl . $profile . '/admission/students_list',
                        'icon'=>'fa fa-list',
                        'code_name'=>'students_list',
                        'title'=>'Students Information',
                        'desc'=>'#c_type# Students Information and Details',
                        'base'=>'admission',
                        'submenu'=>array(
                            1=> array( 'loc'=>'main','link'=>$baseUrl . $profile . '/admission/students_list/st_all',
                                'title'=>'All Students info',
                                'code_name'=> 'st_all',
                                'icon'=>'fa fa-th',
                                'desc'=>'All Students Information',
                                'base'=>'students_list',
                                'submenu'=>false),
                            2=> array(
                                'loc'=>'main', 'link'=>$baseUrl . $profile . '/admission/students_list/current',
                                'icon'=>'fa fa-info-sign',
                                'code_name'=>'current',
                                'title'=>'Current Students',
                                'desc'=>'List of all Current Students Continuing with Studies',
                                'base'=>'students_list',
                                'submenu'=>false
                            ) ,
                            3=> array(
                                'loc'=>'main', 'link'=>$baseUrl . $profile . '/admission/students_list/registered',
                                'icon'=>'fa fa-info-sign',
                                'code_name'=>'registered',
                                'title'=>'Registration Status',
                                'desc'=>'List of all Current  Students registration Status',
                                'base'=>'students_list',
                                'submenu'=>false
                            ) ,
                            4=> array(
                                'loc'=>'main', 'link'=>$baseUrl . $profile . '/admission/students_list/not_continuing',
                                'icon'=>'fa fa-info-sign',
                                'code_name'=>'not_continuing',
                                'title'=>'Not Continuing',
                                'desc'=>'List of all students who are not continuing with studies',
                                'base'=>'students_list',
                                'submenu'=>false
                            ) ,
                            5=> array(
                                'loc'=>'main', 'link'=>$baseUrl . $profile . '/admission/students_list/alumni',
                                'icon'=>'fa fa-info-sign',
                                'code_name'=>'alumni',
                                'title'=>'Alumni Students',
                                'desc'=>'List of all Alumni Students',
                                'base'=>'students_list',
                                'submenu'=>false
                            )

                        )) // end of students info submenu
                )

            ),
            'departments'=>array('loc'=>'main',
                'code_name'=>'departments',
                'link'=> $baseUrl  .$profile . '/departments',
                'title'=>'#c_type# Departments',
                'desc'=>'#c_type# Departments',
                'base'=>'admin',
                'icon'=>'fa fa-th-large',
                'submenu'=>array(
                    1=> array( 'loc'=>'main','link'=>$baseUrl . $profile . '/departments/academic',
                        'title'=>'Academic Departments',
                        'code_name'=> 'academic',
                        'icon'=>'fa fa-table',
                        'desc'=>'#c_type# Academic Departments',
                        'base'=>'system/info',
                        'submenu'=>false ),
                    2 => array( 'loc'=>'main','link'=>$baseUrl . $profile . '/departments/other_dp',
                        'title'=>'Other Departments',
                        'code_name'=> 'other_dp',
                        'icon'=>'fa fa-th-large',
                        'desc'=>'#c_type# Non Academic Departments',
                        'base'=>'system/info',
                        'submenu'=>false ))
            ),
            'programmes'=>array('loc'=>'main',
                'code_name'=>'programmes',
                'link'=> $baseUrl  .$profile . '/programmes',
                'title'=>'Programmes Structure',
                'desc'=>'College Departments',
                'base'=>'admin',
                'icon'=>'fa fa-tags',
                'submenu'=>array(
                    1=>  array( 'loc'=>'main','link'=>$baseUrl . $profile . '/programmes/program_courses',
                        'title'=>'Programmes & Courses',
                        'code_name'=> 'program_courses',
                        'icon'=>'fa fa-tag',
                        'desc'=>'#c_type# Programmes and Courses Management',
                        'base'=>'programmes',
                        'submenu'=>false ),

                    2=>  array( 'loc'=>'main','link'=>$baseUrl . $profile . '/programmes/courses',
                        'title'=>'#c_type# Courses List',
                        'code_name'=> 'courses',
                        'icon'=>'fa fa-tag',
                        'desc'=>'#c_type# List of All Academic Courses',
                        'base'=>'programmes',
                        'submenu'=>false ),

                    3=>  array( 'loc'=>'main','link'=>$baseUrl . $profile . '/programmes/classes',
                        'title'=>'Course Classes Structure',
                        'code_name'=> 'classes',
                        'icon'=>'fa fa-cubes',
                        'desc'=>'#c_type# Active Academic Classes Structure',
                        'base'=>'programmes',
                        'submenu'=>false ),
                    4=>  array( 'loc'=>'main','link'=>$baseUrl . $profile . '/programmes/semester_structure',
                        'title'=>'Semester Structure',
                        'code_name'=> 'semester_structure',
                        'icon'=>'fa fa-cubes',
                        'desc'=>'#c_type# Semester Structure',
                        'base'=>'programmes',
                        'submenu'=>false ),
                )),
            'fee_structure'=>array('loc'=>'main',
                'code_name'=>'fee_structure',
                'link'=> $baseUrl  .$profile . '/fee_structure',
                'title'=>'Fees & Payments',
                'desc'=>'#c_type# Fee Structure',
                'base'=>'admin',
                'icon'=>'fa fa-dollar',
                'submenu'=>array(
                    1 => array( 'loc'=>'main','link'=>$baseUrl . $profile . '/fee_structure/importer',
                        'title'=>'Bank Imported Fees',
                        'code_name'=> 'importer',
                        'icon'=>'fa fa-cloud-download',
                        'desc'=>'#c_type# Automated Fee Importation From Bank via Email',
                        'base'=>'fee_structure',
                        'submenu'=>false ),
                    2 => array( 'loc'=>'main','link'=>$baseUrl . $profile . '/fee_structure/loans',
                        'title'=>'Students Loans',
                        'code_name'=> 'loans',
                        'icon'=>'fa fa-dollar',
                        'desc'=>'#c_type# Students Loans Management',
                        'base'=>'fee_structure',
                        'submenu'=>false ),
                    3=> array( 'loc'=>'main','link'=>$baseUrl . $profile . '/fee_structure/items_list',
                        'title'=>'Fee Structures',
                        'code_name'=> 'items_list',
                        'icon'=>'fa fa-th',
                        'desc'=>'#c_type# Fee Structure Items Management',
                        'base'=>'fee_structure',
                        'submenu'=>false ),
                    4 => array( 'loc'=>'main','link'=>$baseUrl . $profile . '/fee_structure/payments',
                        'title'=>'Fee Payments',
                        'code_name'=> 'payments',
                        'icon'=>'fa fa-dollar',
                        'desc'=>'#c_type# Various Fee Payments From Students',
                        'base'=>'fee_structure',
                        'submenu'=>false ),
                    5 => array( 'loc'=>'main','link'=>$baseUrl . $profile . '/fee_structure/payments_other',
                        'title'=>'Other Payments',
                        'code_name'=> 'payments_other',
                        'icon'=>'fa fa-dollar',
                        'desc'=>'#c_type# Various Fee Payments From Students',
                        'base'=>'fee_structure',
                        'submenu'=>false )

                )),
            'settings'=>array('loc'=>'main',
                'code_name'=>'settings',
                'link'=>'#',
                'icon'=>'fa fa-wrench',
                'title'=>'#c_name# Information',
                'desc'=>'Systems Parameters and Information',
                'base'=>'admin',
                'submenu'=>array(
                    1=> array( 'loc'=>'main','link'=>$baseUrl . $profile . '/settings/sys_info',
                        'title'=>'Systems Details',
                        'code_name'=> 'sys_info',
                        'icon'=>'fa fa-info',
                        'desc'=>'System Summary Information',
                        'base'=>'system/settings',
                        'submenu'=>false),
                    2=> array(
                        'loc'=>'main', 'link'=>$baseUrl . $profile . '/settings/org_info',
                        'icon'=>'fa fa-list',
                        'code_name'=>'org_info',
                        'title'=>'#c_type# Details',
                        'desc'=>'College Summary Information and Details',
                        'base'=>'system/settings',
                        'submenu'=>false
                    ),
                    3=> array(
                        'loc'=>'main', 'link'=>$baseUrl . $profile . '/settings/email_grab',
                        'icon'=>'fa fa-mail-reply',
                        'code_name'=>'email_grab',
                        'title'=>'Email Grab Configuration',
                        'desc'=>'Students Fee Attachment Downloader Configurations',
                        'base'=>'system/settings',
                        'submenu'=>false
                    ))
            ),
            'statistics_info'=>array('loc'=>'main',
                'code_name'=>'statistics_info',
                'link'=> $baseUrl  .$profile . '/statistics_info',
                'title'=>'Statistics',
                'desc'=>'Statistical Information',
                'base'=>'admin',
                'submenu'=>false,
                'icon'=>'fa fa-bar-chart'),
            'calendar' => array(
                'loc'=>'main',
                'code_name'=>'calendar',
                'link'=> $baseUrl  .$profile . '/calendar',
                'title'=>'#c_type# Calendar',
                'desc'=>'#c_type# Calendar Information',
                'base'=>'admin',
                'icon'=>'fa fa-calendar',
                'submenu'=> array(
                    1=> array('loc'=>'main','link'=>$baseUrl . $profile . '/calendar/events',
                        'title'=>'#c_type# Events',
                        'code_name'=> 'events',
                        'icon'=>'fa fa-reorder',
                        'desc'=>'Various #c_type# Calendar Events',
                        'base'=>'users',
                        'submenu'=>false),
                    2 => array('loc'=>'main','link'=>$baseUrl . $profile . '/calendar/timers',
                        'title'=>'Event Timers',
                        'code_name'=> 'timers',
                        'icon'=>' 	glyphicon glyphfa fa-time',
                        'desc'=>'Scheduled Events and Timers Progress Status',
                        'base'=>'users',
                        'submenu'=>false ),
                    3 => array( 'loc'=>'main','link'=>$baseUrl . $profile . '/calendar/timetable',
                        'title'=>'Class Time Table',
                        'code_name'=> 'timetable',
                        'icon'=>'glyphicon glyphfa fa-th-large',
                        'desc'=>'#c_type# Class Timetables for Semesters',
                        'base'=>'users',
                        'submenu'=>false ),
                    4 => array(
                        'loc'=>'main','link'=>$baseUrl . $profile . '/calendar/general',
                        'title'=>'Calendar',
                        'code_name'=> 'general',
                        'icon'=>'fa fa-calendar',
                        'desc'=>'#c_type# General Calendar',
                        'base'=>'users',
                        'submenu'=>false
                    )
                )
            ),
            'reports' => array(),
            'dpmenu'=> array(
                'programmes'=>array('loc'=>'main',
                    'code_name'=>'programmes',
                    'icon'=>'fa fa-tags',
                    'link'=> $baseUrl  .$profile . '/programmes',
                    'title'=>'Programmes & Courses',
                    'desc'=>'List of Department Courses',
                    'base'=>'department',
                    'submenu'=>array(
                        1=>  array( 'loc'=>'main','link'=>$baseUrl . $profile . '/programmes/courses',
                            'title'=>'Department Courses',
                            'code_name'=> 'courses',
                            'icon'=>'glyphicon glyphfa fa-chevron-right',
                            'desc'=>'Department Academic Courses',
                            'base'=>'programmes',
                            'submenu'=>false ),

                        2=>  array( 'loc'=>'main','link'=>$baseUrl . $profile . '/programmes/classes',
                            'title'=>'Department Classes',
                            'code_name'=> 'classes',
                            'icon'=>'glyphicon glyphfa fa-chevron-right',
                            'desc'=>'Department Active Academic Classes',
                            'base'=>'programmes',
                            'submenu'=>false
                        ))),
                'student-info'=>array('loc'=>'main',
                    'code_name'=>'student-info',
                    'icon'=>'glyphicon glyphfa fa-chevron-right',
                    'link'=> $baseUrl  .$profile . '/student-info',
                    'title'=>'Students Info',
                    'desc'=>'Students  Information Database',
                    'base'=>'department',
                    'submenu'=>array(
                        1=> array( 'loc'=>'main','link'=>$baseUrl . $profile . '/student-info/all',
                            'title'=>'All Students info',
                            'code_name'=> 'all',
                            'icon'=>'fa fa-th',
                            'desc'=>'All Students Information',
                            'base'=>'students_list',
                            'submenu'=>false),
                        3=> array(
                            'loc'=>'main', 'link'=>$baseUrl . $profile . '/student-info/registered',
                            'icon'=>'fa fa-info-sign',
                            'code_name'=>'registered',
                            'title'=>'Registration Status',
                            'desc'=>'List of all Current  Students registration Status',
                            'base'=>'students_list',
                            'submenu'=>false
                        ) ,
                        4=> array(
                            'loc'=>'main', 'link'=>$baseUrl . $profile . '/student-info/not_continuing',
                            'icon'=>'fa fa-info-sign',
                            'code_name'=>'not_continuing',
                            'title'=>'Not Continuing',
                            'desc'=>'List of all students who are not continuing with studies',
                            'base'=>'students_list',
                            'submenu'=>false
                        ) ,
                        5=> array(
                            'loc'=>'main', 'link'=>$baseUrl . $profile . '/student-info/alumni',
                            'icon'=>'fa fa-info-sign',
                            'code_name'=>'alumni',
                            'title'=>'Alumni Students',
                            'desc'=>'List of all Alumni Students',
                            'base'=>'students_list',
                            'submenu'=>false
                        )

                        // end of students info submenu
                    ))
            ) ,
            'teacher'=>array(
                    'exams'=>array('loc'=>'main',
                        'code_name'=>'exams',
                        'icon'=>'fa fa-tags',
                        'link'=> $baseUrl  .$profile . '/exams',
                        'title'=>'Exams & Tests',
                        'desc'=>'List of Exams and Tests',
                        'base'=>'exams',
                        'submenu'=>array(
                            1=>  array( 'loc'=>'main','link'=>$baseUrl . $profile . '/exams/list',
                                'title'=>'Exams/tests List',
                                'code_name'=> 'list',
                                'icon'=>'fa fa-chevron-right',
                                'desc'=>'List of Exams and Tests',
                                'base'=>'exams',
                                'submenu'=>false ),
                            2=>  array( 'loc'=>'main','link'=>$baseUrl . $profile . '/exams/results',
                                'title'=>'Student Results',
                                'code_name'=> 'results',
                                'icon'=>'fa fa-chevron-right',
                                'desc'=>'Student Tests and Exams Results',
                                'base'=>'exams',
                                'submenu'=>false
                            ))),
                    'class_courses'=>array(
                        'loc' => 'main',
                        'code_name'=>'class_courses',
                        'icon'=> 'fa fa-list',
                        'link'=>$baseUrl.$profile ."/class_courses",
                        'title'=>'Courses & Classes','desc'=>'List of Assigned Courses and Classes',
                        'base'=>'courses',
                        'submenu'=>array(
                            1=>array(
                                'loc'=>'main',
                                'code_name'=>'students',
                                'title'=>'Assigned Students List','desc'=>'Students Taking Assigned Modules',
                                'icon'=>'fa fa-list' ,
                                'link'=>$baseUrl.$profile."/class_courses/students",
                                'base'=>'courses'
                            ),
                            2=>array(
                                'loc'=>'main',
                                'code_name'=>'modules',
                                'title'=>'Assigned Modules List','desc'=>'List of Assigned Moduels',
                                'icon'=>'fa fa-list' ,
                                'link'=>$baseUrl.$profile."/class_courses/modules",'base'=>'courses'
                            ),

                        )
                    ),
                    'background'=>array(
                        'loc' => 'main',
                        'code_name'=>'background',
                        'icon'=> 'fa fa-user',
                        'link'=>$baseUrl.$profile ."/background",
                        'title'=>'Background Profile','desc'=>'List of Assigned Courses and Classes',
                        'base'=>'background',
                        'submenu'=>array(
                            1=>array(
                                'loc'=>'main',
                                'code_name'=>'basic',
                                'title'=>'Basic Information','desc'=>'Basic Background Information',
                                'icon'=>'fa fa-list' ,
                                'link'=>$baseUrl.$profile."/background/basic",
                                'base'=>'background'
                            ),
                            2=>array(
                                'loc'=>'main',
                                'code_name'=>'profession',
                                'title'=>'Profession Background','desc'=>'List of My Professional Background',
                                'icon'=>'fa fa-list' ,
                                'link'=>$baseUrl.$profile."/background/profession",'base'=>'background'
                            ),
                        )
                    ),

            )   ,
            'coordinator'=>array(
                'module' => array(
                    'loc' => 'main',
                    'code_name'=>'module',
                    'icon'=> 'fa fa-th',
                    'link'=>$baseUrl.$profile ."/module",
                    'title'=>'Department Modules','desc'=>'List of Courses Modules from this Department and Others!',
                    'base'=>'background',
                    'submenu'=>false
                ),
                'teacher' => array(
                    'loc' => 'main',
                    'code_name'=>'teacher',
                    'icon'=> 'fa fa-graduation-cap',
                    'link'=>$baseUrl.$profile ."/teacher",
                    'title'=>'Available Teachers','desc'=>'List of Department Teachers and Assignment',
                    'base'=>'background',
                    'submenu'=>false
                ),
            )
        );

        $mainMenu = array(
            'admission' => $common_function + array(
                 'users' => &$prfmenu['users'],
                    'departments' => &$prfmenu['departments'],
                    'programmes' => &$prfmenu['programmes'],
                    'admission' => &$prfmenu['admission'],
                    'modules'=>&$prfmenu['coordinator']['module'],
                    'teacher'=>&$prfmenu['coordinator']['teacher'],

                ) ,
            'academic' => $common_function + array(
                    'academic'=>&$prfmenu['academic'],
                    'exams' => &$prfmenu['teacher']['exams'],
                    'class_courses'=>&$prfmenu['teacher']['class_courses'],
                    'background'=>&$prfmenu['teacher']['background']
                ),
            /* System testing sand Management */
            'admin'=>$common_function +  array(
                    'calendar' => &$prfmenu['calendar'],
                    'departments'=>&$prfmenu['departments'],
                    'programmes'=>&$prfmenu['programmes'],
                    'admission'=>&$prfmenu['admission'] ,
                    'users' => &$prfmenu['users'],
                    'academic'=>&$prfmenu['academic']
                ),
             /** Department Profile Menu Items  **/
            'department'=> $common_function + array(
                   'programmes'=>&$prfmenu['dpmenu']['programmes'],
                    'student-info' => &$prfmenu['dpmenu']['student-info'],
                    'module'=>&$prfmenu['coordinator']['module'],
                    'teacher'=>&$prfmenu['coordinator']['teacher'],
                    'academic'=>&$prfmenu['academic'],
                    'exams' => &$prfmenu['teacher']['exams'],
                    'class_courses'=>&$prfmenu['teacher']['class_courses'],
                    'background'=>&$prfmenu['teacher']['background'],
                    'users' => &$prfmenu['users'],

                ),

            /** Accounts Menu Profile Items */
              'finance'=> $common_function + array(
                      'fee_structure'=> &$prfmenu['fee_structure']
                  ),
            /** Teachers/lecturers routes */
            'teacher'=>$common_function + array(
                    'exams' => &$prfmenu['teacher']['exams'],
                    'class_courses'=>&$prfmenu['teacher']['class_courses'],
                    'background'=>&$prfmenu['teacher']['background']
                ),
            /** Department Coordinators Profile */
            'coordinator'=>$common_function + array(
                    'module'=>&$prfmenu['coordinator']['module'],
                    'teacher'=>&$prfmenu['coordinator']['teacher'],
                    'exams' => &$prfmenu['teacher']['exams'],
                    'class_courses'=>&$prfmenu['teacher']['class_courses'],
                    'background'=>&$prfmenu['teacher']['background'],
                ),
            /** Students Profile Menu Items */
            'student'=> $common_function +  $prfmenu['student']
        );

       // var_dump($mainMenu['teacher']); die();

        $headerMenu = array(
            'admin'=>array(
                'messages'=>&$common_function['messages'],
                'users'=>&$prfmenu['users'],
                'statistics_info'=>&$common_function['statistics_info'],
            ),
            'department'=>array(
                'messages'=>&$common_function['messages'],
                //'students'=>$mainMenu['department']['current_students'],
            ),
            'finance'=>array(
                'messages'=>&$common_function['messages'],
            )
        );

        switch($menutype){
            case 'header':
                return isset($headerMenu[$profile])?$headerMenu[$profile]:false;
                break;
            case 'main':
                return isset($mainMenu[$profile])?$mainMenu[$profile]:false;
                break;
            case 'sub':
                switch($menutype){
                    case 'header':
                        return isset($headerMenu[$profile][$submen]['submenu'])?$headerMenu[$profile][$submen]['submenu']:false;
                    case 'main':
                        return  isset($mainMenu[$profile][$submen]['submenu'])?$mainMenu[$profile][$submen]['submenu']:false;
                }
                break;
        }
    }
}

