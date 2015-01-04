<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

$users = new User($userdata['id']);

$list = $users->get_list(isset($form_input['term'])?$form_input['term']:false,10,$userdata['profile']=='department'?$userdata['user_info']['id']:false);
$session = new UserSession(); ?>

<?php if($list['count'] > 0 ){
    foreach($list['list'] as $id => $usr){
        $img = empty($usr['profile_photo'])?image_folder().'nothumb.png':profile_pic_url($usr['id'],$usr['profile_photo'],'thumb');
//var_dump($usr);
        $usrsess = $session->get_user_status($usr['login_id'],$usr['email_address']);
        ?>
        <div class="span6 animate<?=$id ?> bounceIn " style="float:left;">
            <div class="peoplewrapper" >
                <div class="thumb"><img src="<?= $img ?>" alt=""></div>
                <div class="peopleinfo">
                    <h4><a data-toggle="modal" data-target="#view-item-data" href="<?= base_url().'ajax_load/user_info?userid='.$usr['login_id']?>" >
                            <?= name_format($usr['fname'],$usr['mname'],$usr['lname'],0). "(" .ucfirst($usr['gender']). ")"?> - <small>
                                <?= strtoupper(user_profile($usr['profile'])) ?></small></a><br>
                        <small class="subtitle">Activity</small><?= $usrsess['online']?"<span data-toggle='tooltip' title='IP Address: ". $usrsess['ip_address']."\n\r Browser: ".$usrsess['user_agent']."' class='text-success'>online</span>&nbsp;<span>Last seen:<span data-toggle='tooltip' title='".date('M d, Y h:i a',($usrsess['last_activity']))."' class='on'>".date('h:i a',$usrsess['last_activity']) ."</span></span>" :"<span class='off text-error'>offline </span><span>Last Seen:<span class='off' data-toggle='tooltip' title='".date('M d, Y h:i a',strtotime($usr['last_login']))."'> " .date('M d, Y h:i a',strtotime($usr['last_login'])) ."</span></span>"  ?></h4>
                    <ul class="pp-data">
                        <li><span class="dt-item">Login ID:</span><span style="font-weight: bold;text-transform: uppercase" class="dt-item-info"><?= $usr['login_id'] ?> </span> (<small class="subtitle"><?= user_access_level($usr['access_level'] )?></small>)</li>
                        <li><span class="dt-item">User Profile:</span> <span class="dt-item-info"><?= strtoupper(user_profile($usr['profile'])) ."&nbsp;&nbsp;
                        (<span class='text-info'>".((strtolower($usr['profile']) == 'student')?$usr['st_course']:(trim($usr['dp_name'])?$usr['dp_name']:user_profile_map($usr['profile']))).")"  ?> </span></span></li>
                        <li><span class="dt-item">Registered on:</span><span class="dt-item-info"> <?= date('d M, Y',strtotime($usr['dt_registered'])) ?></span></li>
                        <li><span class="dt-item">Email:</span> <span class="dt-item-info"><?= $usr['email_address'] ?></li>
                        <li>
                            <?php if($userdata['access_level'] == 1){ ?>
                                <a data-toggle="modal" data-target="#edit-item-data" href="<?= base_url().'ajax_load/form_edit?itemid='.$usr['id'] . '&login_id='.$usr['login_id'] ?>&itype=user" ><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit </a>&nbsp;&nbsp;
                                <?php if($usr['account_status'] == 0){ ?>
                                    <a  target-cont=".span6"  href="#" target-url="<?= base_url().'admin/item_status?itemid='.$usr['id'] . '&login_id='.$usr['login_id'] ?>&itype=user_account&action=enable"  class="enable-item-action text-warning"><i class="fa fa-ok"></i>&nbsp;&nbsp;Enable </a>
                                <?php }else { ?>
                                    <a href="#" target-url="<?= base_url().'admin/item_status?itemid='.$usr['id'] . '&login_id='.$usr['login_id'] ?>&itype=user_account&action=disable" target-cont=".span6" class="disable-item-action text-warning"><i class="fa fa-crosshairs"></i>&nbsp;&nbsp;Disable </a>
                                <?php } ?> &nbsp;&nbsp;
                                <a  href="#" target-url=="<?= base_url().'admin/remove_item?itemid='.$usr['id'] . '&login_id='.$usr['login_id'] ?>&itype=user_account&action=remove"   target-cont=".span6" class="delete-item-action text-error"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a>&nbsp;&nbsp;       <?php  } ?>
                            <a  data-toggle="modal" data-target="#view-item-data" href="<?= base_url().'ajax_load/form_edit?itemid='.$usr['id'] . '&login_id='.$usr['login_id'] ?>&itype=user_history" class="text-success"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;info</a></li>
                    </ul>
                </div><!--peopleinfo-->
            </div><!--peoplewrapper-->
        </div>
        <?php if(($id  >0 ) && ($id%2==1)){
            // echo "  </div> <div class=\"row-fluid\">";
        }   ?>
        <!--span6-->
        <?php  //var_dump($usr);
        // var_dump($usrsess);
        //  die();
    }
}else{?>
    <div class="span6">
        <div class="peoplewrapper">
            <div class="thumb"><img src="images/photos/nothumb.png" alt=""></div>
            <div class="peopleinfo"><br><br>
                    <span class="alert alert-warning">
                       No Matching Users found!!
                    </span>
            </div><!--peopleinfo-->
        </div><!--peoplewrapper-->
    </div><!--span6-->
<?php }  ?>
