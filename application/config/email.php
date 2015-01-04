<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.gmail.com';
$config['smtp_port'] = 587;
$config['smtp_user'] = 'ditsas.online@gmail.com';
$config['smtp_pass'] = '0mb3n1$$';

/***
 */

$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;

