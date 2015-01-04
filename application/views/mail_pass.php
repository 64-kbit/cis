
<div class="loginpanelinner" style="width:450px">
    <div class="pageheader">
        <div class="pageicon"><span class="glyphicon glyphicon-envelope"></span></div>
        <div class="pagetitle">
            <h5>To Get New Password</h5>
            <h1>Enter your Email</h1>
        </div>

    </div>
    <form id="login" action="<?php echo pg_link('password_email') ?>" method="post">
        <input type="hidden" name="reset_password" value="true">
        <div class="inputwrapper login-alert">
            <div class="alert alert-error">Invalid email or Unregistered User. Check Email</div>
        </div>
        <div class="inputwrapper animate1 bounceIn">
            <input name="user_email" id="email_password" autocomplete="off" class="required-data" placeholder="Your Email Address Here" type="email">
        </div>

        <div class="inputwrapper animate3 bounceIn">
            <button name="submit"><span class="icon-mail-forward"></span>&nbsp;&nbsp;Send password Reset Instructions</button>
        </div>
        <div class="inputwrapper animate4 bounceIn">

            <div class="pull-right"> <a href="<?php echo pg_link('login_page') ?>">Return To Login Page</a></div>
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
                jQuery(".pagetitle").find('h5').html('Sending your password reset instructions..')
                jQuery(".pagetitle").find('h1').html('<i class="icon-spin icon-spinner"></i>')
                jQuery.post(jQuery(this).attr('action'),formdata,function(rdata,success){
                    if(rdata.error == true){
                        jQuery(".pagetitle").find('h5').html('<span class="badge badge-important" style="">'+ rdata.login_error + "</span>" )
                        jQuery(".pagetitle").find('h1').html('<span class=\'text-warning\'><i class=" icon-remove"></i> Enter  New Address</span>')
                        jQuery.growl.error({title:'Email Address Error',message:rdata.login_error})
                         jQuery(this).find('input[name='+ rdata.field + ']').addClass('inputError').after("<span class='inline text-error'>"+ rdata.login_error + "</span>");
                    }else{
                        jQuery(".pagetitle").find('h5').html("<span class='badge badge-success'>" + rdata.login_error + "</span>")
                        jQuery(".pagetitle").find('h1').html('<span class="" style="color:#2a2"><i class="glyphicon glyphicon-ok"></i> &nbsp;&nbsp;Message Sent!!.....</span>')
                        jQuery.growl.notice({title:"Success",message:rdata.login_error})
                        jQuery(this).find('button').remove();


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

