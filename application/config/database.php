<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = '127.0.0.1';
$db['default']['username'] = 'root';
$db['default']['password'] = 'oauXbin';
$db['default']['database'] = 'cis_cmanagerDboAdvancedVer_02';
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = true;
$db['default']['cache_on'] = false;
$db['default']['cachedir'] = '/home/db_chache/cis/';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


$db['sas_db']['hostname'] = '127.0.0.1';
$db['sas_db']['username'] = 'root';
$db['sas_db']['password'] = 'oauXbin';
$db['sas_db']['database'] = 'dit_sasdb';
$db['sas_db']['dbdriver'] = 'mysql';
$db['sas_db']['dbprefix'] = '';
$db['sas_db']['pconnect'] = TRUE;
$db['sas_db']['db_debug'] = TRUE;
$db['sas_db']['cache_on'] = FALSE;
$db['sas_db']['cachedir'] = '';
$db['sas_db']['char_set'] = 'utf8';
$db['sas_db']['dbcollat'] = 'utf8_general_ci';
$db['sas_db']['swap_pre'] = '';
$db['sas_db']['autoinit'] = false;
$db['sas_db']['stricton'] = FALSE;



/* End of file database.php */
/* Location: ./application/config/database.php */
