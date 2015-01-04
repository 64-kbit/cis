<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="userloggedinfo">
    <?php

    $img = empty($userdata['profile_photo'])?image_folder().'nothumb.png':profile_pic_url($userdata['id'],$userdata['profile_photo'],'thumb');
    if(!isset($userdata['profile_photo']) && empty($userdata['profile_photo'])){

        ?>
    <img src="<?php echo $img ?>" class="img-circle" alt="No User Profile">
    <?php }else{ ?>
        <img  class="img-circle" src="<?php echo $img ?>" alt="Passport Photo">
  <?php   }  ?>
    <div class="userinfo">
        <h5 class=" animate4 bounceIn"><?php echo $userdata['fname'].' '.$userdata['lname']?> <small>- <?php echo  $userdata['login_id']?> </small></h5>
        <ul>
            <li class=" animate5 bounceIn <?php echo uri_string() == user_profile($userdata['profile']) .'/profile/edit_profile'?'active_li':'' ?>"><a href="<?php echo base_url() . user_profile($userdata['profile']) ?>/profile/edit_profile" class="" title="Edit my Profile" >&nbsp;<i class="fa fa-wrench"></i>&nbsp;Edit Profile</a></li>
           <!-- <li><a href="<?php echo base_url(). user_profile($userdata['profile']) ?>/account_settings" class="" title="Change Account SEttings" >&nbsp;<i class="fa fa-cog"></i>&nbsp;Account Settings</a></li>  -->
            <li class=" animate6 bounceIn"><a href="<?php echo base_url() ?>logout" class="" title="Quit from system" >&nbsp;<i class="fa fa-sign-out"></i>&nbsp;Sign Out</a></li>
        </ul>
    </div>
</div>




