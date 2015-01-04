<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="row">
    <?php
    $count = 1;
    if($userslist['list']){
    foreach($userslist['list'] as $id => $usr){
    $onlineStatus = $usr['status'];
    $bl = base_url()."admin/user_edit"; ?>
    <div class="col-sm-4 col-md-3">
        <div class="thumbnail">
            <img style="" src="<?php echo base_url() . 'userfile?uid=' .$usr['login_id']."&fname=".$usr['photo']?>" data-src="holder.js/300x300" alt="...">
            <div class="caption">
                <h3 style="font-size:15px"><?php echo  name_format($usr['fname'],$usr['mname'],$usr['lname'],0);?> </h3>
                <p><?php echo $usr['role_title'];
                     if($usr['login_status'] && $usr['status'] > 0){
                         if($usr['login_status']){
                             $astatus = 'green';
                         }else{
                             $astatus = 'red';
                         }
                     }else{
                         $astatus = 'black';
                     }
                      echo '<span class="user-status'.$astatus .'"></span>';
                    ?> </p>
                <p>
                    <span btn-act="remove" btn-target="user" btn-tgData="<?php echo $usr['login_id'] ?>"  class="btn btn-danger btn-sm" role="button"><span class='glyphicon glyphicon-trash'></span> Remove</span>
                    <span href="#"  btn-act="edit" btn-target="user" btn-tgData="<?php echo $usr['login_id'] ?>"   class="btn btn-sm btn-default" role="button" data-toggle='modal' data-target='#edit_user' > <span class='glyphicon glyphicon-edit' ></span> Edit</span></p>

            </div>
        </div>
    </div>

      <?php } } else{
          ?>
        <div clas="col-sm-8 col-md-10">
             <span class="text-info alert-info">
                 It Appears no user has been added so far!!
             </span>
        </div>
    <?php
    }?>
</div>
