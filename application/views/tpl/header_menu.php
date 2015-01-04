<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * Created by oau.
 * User: xnet-dev
 * Date: 8/19/14
 * Time: 2:26 AM
 * Header Menu for different user profiles
 */

$userProfile = user_profile($userdata['profile']);

$sysCore = $this->System_core;
$menuItems = $this->profile_data->live_head_menu($userdata['profile']);

        echo build_header_menu_items($menuItems,$userProfile,$sysCore);
          ?>

