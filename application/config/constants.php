<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);
define('CURRENT_DATE',date("Y-m-d",time()));
define('MINIMUM_DATE','1960-01-01');

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

/*
    Folders Directory
*/

define('UPLOAD_DIR',APPPATH.'files/');
define('PROFILE_PHOTOS',APPPATH.'files/profile/');
define('PROFILE_PHOTOS_THUMBS',APPPATH.'files/profile/thumbs/');
define('PHOTO_GALLERY',APPPATH.'files/gallery/');
define('PHOTO_GALLERY_THUMBS',APPPATH.'files/gallery/thumbs/');
define('STUDENT_FILES',APPPATH.'files/students/');
define('ADMIN_FILES',APPPATH.'files/administration/');
define('MAIL_FILES',APPPATH.'files/administration/mails/');
define('TRASH_FILES',APPPATH.'files/deleted/');
define('LOANS_FILES',APPPATH.'files/administration/loans/');
define('STUDENT_LIST_FILES',APPPATH.'files/administration/students/');
define('TMP_UPLOAD_DIR',APPPATH.'files/uploads/');



define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */
