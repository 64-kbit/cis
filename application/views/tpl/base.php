<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

   // $this->load->view('tpl/header');
  echo doctype('html5'); ?>
<html lang="en-us,tz-sw">
<head>
<?php
$sysCore = &$this->System_core;
$menuInfo = current_menu_title($userdata['profile'],$currentBase,count($uri),$uri,'main',$sysCore);

$meta = array(
    array('name' => 'robots', 'content' => 'no-cache'),
    array('name' => 'description', 'content' => 'Students Management IS'),
    array('name' => 'keywords', 'content' => 'STUDENTS-IS, cores, registration, application,management information system'),
    array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
);

echo meta($meta);
?>
  <!-- Page Header -->

<title><?php echo $menuInfo['details'] . " | " . $sys_name; ?> </title>

<link rel="icon" type="image/png" href="<?php echo base_url()?>themes/img/icon.png" />

<?php  echo css_files(user_profile(isset($userdata['profile'])?$userdata['profile']:'login'),$uri)?>


<?php echo  js_files(user_profile(isset($userdata['profile'])?$userdata['profile']:'login'),$uri)?>
<script>
      var csrf_token = "<?=$this->security->get_csrf_token_name() ?>";
      var csrf_hash = "<?=$this->security->get_csrf_hash() ?>";

</script>
  </head>
<body>


<div class="mainwrapper page-container">
    <div class="header">
            <div class="logo animate2 bounceIn">
                <img class="logo-img" src="<?php echo base_url() ?>themes/img/cores-logo-wh.png" alt="">
            </div>
        <div class="headerinner">
            <ul class="headmenu">
                <li class="topmenu">
                    <div class="topbar" style="border-radius:4px;margin:20%;z-index: 10000;width:50px"><a style="z-index: 10000" class="barmenu"></a></div>
                </li>
                <?php //$this->load->view('tpl/header_menu'); ?>
                <li class="  no-border profile-content">
                        <?php  echo user_profile_icon($userdata['profile'],$userdata['user_info']) ?>
                </li>
                <li class="right ">
                    <div class="userloggedinfo">
                        <div class="userinfo ">
                            <h5 class=" "><?php echo strtoupper(substr($userdata['fname'],0,1)).'. '. ucfirst(strtolower($userdata['lname']))?> <small>- <?php echo  $userdata['login_id']?> </small></h5>
                            <ul>
                                <li class="  <?php echo uri_string() == user_profile($userdata['profile']) .'/profile/edit_profile'?'active_li':'' ?>">
                                    <a href="<?php echo base_url() . user_profile($userdata['profile']) ?>/profile/edit_profile" class="" title="Edit my Profile" >&nbsp;<i class="glyphicon glyphicon-wrench"></i>&nbsp;&nbsp;Edit Profile</a></li>

                                <li class=" "><a href="<?php echo base_url() ?>logout" class="" title="Quit from system" >&nbsp;<i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;Sign Out</a></li>
                            </ul>
                        </div>
                        <?php

                        $img = empty($userdata['profile_photo'])?image_folder().'nothumb.png':profile_pic_url($userdata['id'],$userdata['profile_photo'],'thumb');
                        if(!isset($userdata['profile_photo']) && empty($userdata['profile_photo'])){
                            ?>
                            <img src="<?php echo $img ?>" class="img-circle" alt="No User Profile">
                        <?php }else{ ?>
                            <img  class="img-thumbnail profile_thumb" src="<?php echo $img ?>" alt="Passport Photo">
                        <?php   }  ?>
                    </div>

                </li>
            </ul><!--headmenu-->
        </div>
    </div>

    <!-- left panel menu panel -->

    <div class="leftpanel main-menu-container" style="z-index:20">

        <div class="leftmenu">
            <ul class="nav nav-tabs nav-stacked">
                <li class="nav-header">Navigation Menu </li>
                <?php
                $this->load->view('tpl/profile_menu');
                $this->load->view($userdata['profile'].'/menu'); ?>
            </ul>
        </div><!--leftmenu-->
    </div>


    <div class="rightpanel body-container"  style="z-index:18">
        <!-- page header -->

        <div class="pageheader" id="page-haeading">
            <?php if(isset($pro_search)){   ?>
                <form id='page_search_form' action="<?php echo user_pg_link('search_result',$userdata['profile']) ?>" method="post" class="searchbar">
                    <input type="hidden" name="source_page" value="<?php echo $uri_str ?>" />

                    <div class="input-append search-fieldgrp">
                        <input id="page_search_input" class="span2 search-field search-input" type="text" name="keyword" value="<?php echo isset($serchterm)?$searchterm:""; ?>" placeholder="To search type and hit enter..." type="text">
                        <button type="submit" id="page_search_btn" class="btn btn-primary" style="border-radius: 0px 4px 4px 0px"><i class="fa fa-search"></i> </button>
                    </div>

                </form>

            <?php   } if(!empty($menuInfo['details'])){  ?>

                <div class="pageicon"><span class="fa <?php echo $menuInfo['icon'] ?>"></span></div>
                <div class="pagetitle">
                    <h1><?php echo $menuInfo['details'] ?></h1>
                </div>  <?php } else { ?>
                <div class="pageicon warning" style="color: #f4593c"><span class="fa fa-warning"></span></div>
                <div class="pagetitle" style="color: #d58512">
                    <h5 style="color: #d58512">Error Page Requested Not Found! Click another Link</h5>
                    <h1 style="color: #d58512">Undefined Menu Title/Link</h1>
                </div>
            <?php } ?>
        </div><!--pageheader-->


        <div class="maincontent" style="z-index: 200">
            <div class="maincontentinner" style="z-index: 201">
                <div class="row-fluid" style="z-index: 202">
                <?php
                if($userdata['profile'] == 'student'){
                    $this->load->view($userdata['profile'].'/'.$currentBase) ;

                }else{

                        $this->load->view($currentBase);
                 }  ?>
                </div><!--row-fluid-->

            <div class="footer">
                <div class="footer-right" style="margin-right:40%">
                    <span>
                         <?php echo $footer ?>
                    </span>
                </div>
                <div class="footer-right">

                </div>
            </div><!--footer-->

            </div><!--maincontentinner-->
        </div><!--maincontent-->

    </div>
</div> <!-- End of main wrapper -->
<div class="scripts">
    <?php
    $this->load->view('tpl/modals/base');
    ?>
</div>
</body>
</html>

    <?php

   // $this->load->view('tpl/footer');

    ?>


