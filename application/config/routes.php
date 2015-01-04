<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['404_override'] = 'login/error_404';

/* Default login routes */
$route['login'] = 'login/index';
$route['logout'] = 'login/logout';
$route['validate_user'] = 'login/validate_user';
$route['password/email'] = 'login/password_remind';
$route['password/new'] = 'login/password_new';
$route['password/save'] = 'login/password_save';
$route['userfile'] = 'ajax/file_req/$1';
$route['login/forgot_password'] = 'login/mail_password';

/**
 * common module functions
 */

$route['(:any)/messages'] = 'admin/messages';
$route['(:any)/exams'] = 'admin/examinations';
$route['(:any)/exams/(:any)'] = 'admin/examinations/$2';
$route['(:any)/module'] = 'admin/academic_module';
$route['(:any)/module/(:any)'] = 'admin/academic_module/$2';
$route['(:any)/background'] = 'admin/teacher_background';
$route['(:any)/background/(:any)'] = 'admin/teacher_background/$2';
$route['(:any)/class_courses'] = 'admin/teacher_assignment';
$route['(:any)/class_courses/(:any)'] = 'admin/teacher_assignment/$2';
$route['(:any)/sys_info'] = 'admin/settings';
$route['(:any)/teacher']   = 'admin/manage_teacher/$2';
$route['(:any)/teacher/(:any)']   = 'admin/manage_teacher/$2';

//$route['(:any)/programmes/(:any)'] = 'admin/program_course/$1';
$route['(:any)/org_info'] = 'admin/settings';
$route['(:any)/forums'] = 'admin/get_forum/$2';
$route['(:any)/settings'] = 'admin/settings_info/$2';
$route['(:any)/departments'] = 'admin/manage_departments';
$route['(:any)/departments/(:any)'] = 'admin/manage_departments/$2';
$route['(:any)/profile/edit_profile'] = 'admin/my_profile';
$route['(:any)/profile'] = 'admin/my_profile';
$route['(:any)/academic/(:any)'] = 'admin/academic_manage/$2';
$route['(:any)/messages'] = 'admin/messages';
$route['(:any)/message/(:any)'] = 'admin/messages/$2';
$route['(:any)/ajax_load/(:any)'] = 'admin/ajax_load/$2';
$route['(:any)/admission/(:any)'] = 'admin/student_admission/$2';
$route['(:any)/admission'] = 'admin/student_admission/no_route';

/**
 * Teachers/Lecturers routes configurations
 */
$route['teacher'] = 'teacher/index';
$route['teacher/home'] = 'teacher/index';
$route['teacher/messages'] = 'admin/messages';
$route['teacher/exams'] = 'admin/examinations';
$route['teacher/exams/(:any)'] = 'admin/examinations/$1';
$route['teacher/background'] = 'admin/teacher_background';
$route['teacher/background/(:any)'] = 'admin/teacher_background/$1';
$route['teacher/class_courses'] = 'admin/teacher_assignment';
$route['teacher/class_courses/(:any)'] = 'admin/teacher_assignment/$1';
//$route['teacher/']

/** Finance Department Routes configurations */
$route['finance/home'] = 'admin/index/$1';
$route['finance'] = 'login';
$route['finance/fee_structure/(:any)'] = 'admin/fee_structure/$1';
$route['finance/messages'] = 'admin/messages';
$route['finance/profile/edit_profile']  = 'admin/my_profile';
$route['finance/profile']  = 'admin/my_profile';

$route['coordinator/home'] = 'coordinator/index/$1';

  /** Admission office and More */
$route['admission/home'] = 'admission/index';
$route['admission/sys_info'] = 'admin/settings';
$route['admission/programmes/(:any)'] = 'admin/program_course/$1';
$route['admission/org_info'] = 'admin/settings';
$route['admission/forums'] = 'admin/get_forum/$1';
$route['admission/settings'] = 'admin/settings_info/$1';
$route['admission/departments'] = 'admin/manage_departments';
$route['admission/departments/(:any)'] = 'admin/manage_departments/$1';
$route['admission/profile/edit_profile'] = 'admin/my_profile';
$route['admission/profile'] = 'admin/my_profile';
$route['admission'] = 'login';
$route['admission/messages'] = 'admin/messages';
$route['admission/message/(:any)'] = 'admin/messages/$1';
$route['admission/ajax_load/(:any)'] = 'admin/ajax_load/$1';
$route['admission/admission/(:any)'] = 'admin/student_admission/$1';
$route['admission/admission'] = 'admin/student_admission/no_route';


/** Administrator Routes configurations */
$route['admin/home'] = 'admin/index/$1';
$route['admin/sys_info'] = 'admin/settings';
$route['admin/programmes/(:any)'] = 'admin/program_course/$1';
$route['admin/org_info'] = 'admin/settings';
$route['admin/forums'] = 'admin/get_forum/$1';
$route['admin/settings'] = 'admin/settings_info/$1';
$route['admin/departments'] = 'admin/manage_departments';
$route['admin/departments/(:any)'] = 'admin/manage_departments/$1';
$route['admin/profile/edit_profile'] = 'admin/my_profile';
$route['admin'] = 'login';
$route['admin/admission/(:any)'] = 'admin/student_admission/$1';
$route['admin/admission'] = 'admin/student_admission/no_route';
//$route['upload_file/loans_file'] = ''

/** Departments Academic Routes */
$route['department/users'] = 'admin/users';
$route['department/users/(:any)'] = 'admin/users/$1';
$route['department/home'] = 'department/index';
$route['department/student-info'] = 'department/student_info';
$route['department/student-info/(:any)'] = 'department/student_info/$1';
$route['department'] = 'login';
$route['upload_file/download_file'] = 'upload_file/get_file/$1';

/** Students Profile Routes and links */
$route['student/download_file/(:any)'] = 'student_controller/download_file/$1';
$route['student/download_file'] = 'student_controller/download_file/$1';

//$route['student/(:any)'] = 'student_controller/index';
$route['student/home'] =  'student_controller/index';
$route['student/messages'] =  'student_controller/message_comm';
$route['student/finance_info'] =  'student_controller/finance_info';
$route['student/registration'] =  'student_controller/registration_info';
$route['student/profile/(:any)'] =  'student_controller/profile_info';
$route['student_info/(:any)'] =  'student_controller/student_info/$1';
$route['student/student_info/(:any)'] =  'student_controller/student_info/$1';
 $route['student/class/(:any)'] = 'student_controller/student_class/$1';
$route['student/class'] = 'student_controller/student_class/$1';
$route['student'] = 'student_controller/index';

// Login profile
$route['signup/student'] = 'login/new_student_account';
$route['signup/student_status'] = 'login/student_status';
$route['signup/success'] = 'login/add_student_account';
$route['activate_account'] = 'login/activate_user';

$route['student'] = 'login';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
