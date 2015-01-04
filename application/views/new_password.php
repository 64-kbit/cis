
<div class="loginpanelinner" style="width:450px">
    <?php if($valid_time && $code_set) {
   ?>
    <div class="pageheader">
        <div class="pageicon"><span class="fa icon-key"></span></div>
        <div class="pagetitle">
            <h5>Enter Your New Password</h5>
            <h1>New Password</h1>
        </div>

    </div>
    <form id="login" action="<?php echo base_url() ?>login/change_user_password" method="post">
        <input type="hidden" name="code_set" value="<?= $code_set ?>" />
        <input type="hidden" name="login_id" value="<?= $userid ?>" />
        <input type="hidden" name="change_password_form" value="true" />
        <div class="inputwrapper login-alert">
            <div class="alert alert-error"></div>
        </div>
        <div id="inputs-text">
        <div class="inputwrapper animate1 bounceIn">
            <input name="password" id="email_password" autocomplete="off"  class="required-data"  placeholder="Enter New Password Here" type="password">
        </div>
        <div class="inputwrapper animate1 bounceIn">
            <input name="password_confirm" id="email_password2" class="required-data" autocomplete="off" placeholder="Confirm Your New Password" type="password">
        </div>

        <div class="inputwrapper animate3 bounceIn">
            <button name="submit"><span class="icon-save"></span>&nbsp;&nbsp;Change My Password</button>
        </div>
        </div>
<?php }   else{    ?>
    <div class="pageheader">
        <div class="pageicon"><span class="text-warning fa icon-info"></span></div>
        <div class="pagetitle">
            <?php if(!$code_set) {
          ?>
                <h5 class="text-warning"  style="color:#fffc0a">Invalid Request Ticket Source!!</h5>
                <h1 class="text-warning"  style="color:#ff5e5e">Expired Request code</h1>
            <?php  }else{   ?>
                <h5 class="text-warning"  style="color:#fffc0a">Password request ticked has expired</h5>
                <h1 class="text-warning" style="color:#ff5e5e">Ticket has Expired!!</h1>
            <?php    }   ?>

        </div>

    </div>
<?php }
?>
<div class="inputwrapper animate4 bounceIn">

            <div class="pull-right"> <a href="<?php echo pg_link('login_page') ?>">Go To Login Page</a></div>
        </div>

    </form>
</div><!--loginpanelinner-->

 <div class="scripts">
     <script>
         jQuery("form[id='login']").submit(function(){
             //alert("here")
             var valid = validate_form(this);
             if(valid){
                 var formdata =    jQuery(this).serialize();
                 jQuery(".pagetitle").find('h5').html('Updating your password !...')
                 jQuery(".pagetitle").find('h1').html('<i class="icon-spin icon-spinner"></i>')
                 var form = this;
                 jQuery.post(jQuery(this).attr('action'),formdata,function(rdata,success){
                     if(rdata.error != false){
                         jQuery(".pagetitle").find('h5').html('<span class="badge badge-important" style="">'+ rdata.login_error + "</span>" )
                         jQuery(".pagetitle").find('h1').html('<span class=\'text-warning\'><i class=" icon-remove"></i> Error in  Password</span>')
                         jQuery.growl.error({title:'Password Error',message:rdata.login_error});

                         if(rdata.error == 1){
                            populate_form_errors(form,rdata.fields)

                         }

                     }else{
                         jQuery(".pagetitle").find('h5').html("<span class='badge badge-success'>" + rdata.login_error + "</span>")
                         jQuery(".pagetitle").find('h1').html('<span class="" style="color:#d1ff2f"><i class="glyphicon glyphicon-ok"></i> &nbsp;&nbsp;Password Updated!!.....</span>')
                         jQuery.growl.notice({title:"Password Update!",message:rdata.login_error})
                         jQuery('#inputs-text').fadeOut();


                     }
                 })
             }else{

             }
             return false;
         });

         jQuery(".required-data").change(function(){
             jQuery(this).removeClass('inputError');
             jQuery(this).siblings('.text-error').remove();
         })
     </script>
 </div>
