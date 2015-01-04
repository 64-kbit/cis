<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="loginpanelinner" style="width:280px;border-radius: 3px; padding: 10px 20px 10px 35px;background:transparent;color:#555">
        <?php
        echo form_open( base_url(). 'login/ajax_resume' ,'id="login"  method="post"');
        ?>
        <input type="hidden" style="border-radius: 4px;" value="login_form" name="login_form">
        <h2 class="subtitle">Login first to Continue!</h2>
            <div id="warn-title" class="alert alert-error animate1 bounceIn">
                <button data-dismiss="alert" class="close" type="button">×</button>

                <div id="warn-content">Your Login Session Has Expired!! Login Again To continue </div>
            </div>
        <div class="par animate1 bounceIn">
            <label> Registration Number / User ID</label>
            <input name="username" id="username" class="required-data input-xlarge" autocomplete="off" placeholder="Enter Login Id here" type="text">
        </div>
        <div class="par animate2 bounceIn">
            <label>Password</label>
            <input name="password" id="password" class="required-data input-xlarge" placeholder="Enter Login password here" type="password">
        </div>
        <div class="inputwrapper animate3 bounceIn">
            <button name="submit" type="btn btn-primary" ><span class="glyphicon glyphicon-log-in" style="float:left;margin-left:20%;font-size:24px;margin-right:-20%;"></span>Sign In Again</button>
        </div>
        <!-- <div class="inputwrapper animate4 bounceIn">
             <label><input class="remember" name="signin" type="checkbox" style="font-size:14px; !important"> Remember Me</label>
         </div> -->
   <?php echo form_close(); ?>
</div><!--loginpanelinner-->
<div class="scripts">
    <script>
        jQuery("#login").submit(function(){
            var valid = validate_form(this);
            var form = this;
            if(valid){
                var formdata = jQuery(this).serialize();
                var action = jQuery(this).attr('action');
                jQuery('body').modalmanager('loading');
                jQuery.post(action,formdata,function(rdata,xhr){
                    jQuery('body').modalmanager('removeLoading');
                    if(xhr == 'success'){
                        if(rdata.errors == true){
                            jQuery.growl.error({title:'Login Failed',message : rdata.message});
                            jQuery("#warn-title > #warn-content").html(rdata.message);
                            if(rdata.error == 1){
                                populate_form_errors(form,rdata.fields);
                            }
                        }else{
                            jQuery(form).html(rdata.data);
                            jQuery.growl.notice({title:'Login Success',message : rdata.data});
                            jQuery(form).parents('.modal').modal('hide');
                            alert_warning('info',rdata.data + "<br>\n\rPlease Close and Open Again this Section!");
                        }
                    }else{
                        jQuery.growl.error({title:'Newtork Timeout!',message : "We are experiencing Connection problems to the server!! Please Retry Again!!"});
                    }
                });
            }

            return false;
        });

        jQuery(".required-data").change(function(){
            jQuery(this).removeClass('inputError').siblings('.text-error').remove();
        })

    </script>
</div>
