<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   $img = empty($usr['profile_photo'])?image_folder().'nothumb.png':profile_pic_url($usr['id'],$usr['profile_photo'],'thumb');
?>
<div class="span6 animate4 bounceInDown " style="float:left;">
    <div class="peoplewrapper" >
        <div class="thumb"><img src="<?= $img ?>" alt=""></div>
        <div class="peopleinfo">
            <h4><a data-toggle="modal" data-target="#view-item-data" href="<?= base_url().'ajax_load/user_info?userid='.$usr['login_id']?>" ><?= name_format($usr['fname'],$usr['mname'],$usr['lname'],0) . "(" .$usr['gender']. ")"?> - <small><?= strtoupper(user_profile($usr['profile'])) ?></small></a> </h4>
            <ul class="pp-data">
                <li><span class="dt-item">Login ID:</span><span style="font-weight: bold;text-transform: uppercase" class="dt-item-info"><?= $usr['login_id'] ?> </span> (<small class="subtitle"><?= user_access_level($usr['access_level'] )?></small>)</li>
                <li><span class="dt-item">User Profile:</span> <span class="dt-item-info"><?= strtoupper(user_profile($usr['profile'])) ."&nbsp;&nbsp;(".user_profile_map($usr['profile']).")"  ?> </span></li>
                <li><span class="dt-item">Registered on:</span><span class="dt-item-info"> <?= date('d M, Y',strtotime($usr['dt_registered'])) ?></span></li>
                <li><span class="dt-item">Email:</span> <span class="dt-item-info"><?= $usr['email_address'] ?></li>

                <li><a  data-toggle="modal" data-target="#view-item-data" href="<?= base_url().'ajax_load/form_edit?itemid='.$usr['id'] . '&login_id='.$usr['login_id'] ?>&itype=user_history" class="text-success"><i class="fa fa-info-sign"></i>&nbsp;&nbsp;info</a></li>

            </ul>
        </div><!--peopleinfo-->
    </div><!--peoplewrapper-->
</div>
