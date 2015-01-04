
    <div class="regpanelinner">

        <div class="pageheader">
            <div class="pageicon"><span class="fa fa-chevron-circle-down "></span></div>
            <div class="pagetitle">
                <h5>Create Cores Account</h5>
                <h1>Sign Up</h1>
            </div>

        </div>
        <div class="regcontent">
            <form action="<?= base_url() ?>signup/success" method="post" id="student_registration" class="stdform">
                <p class="animate2 bounceIn">
                   <label>Registration No:</label> <input required="true" name="username" autocomplete="off" class="input-block-level required-data" value="<?= $this->input->post("username") ?>" placeholder="Institute Registration No" type="text">
                    <span class="indicator"></span>
                </p>
                <p class="animate3 bounceIn">
                   <label>Email Address:</label> <input  required="true" name="email_address" class="input-block-level required-data" placeholder="Active Email Address" value="<?= $this->input->post("email_address") ?>" type="email">    <span class="indicator"></span>
                </p>
                <p class="animate4 bounceIn" id="passwordcontainer">
                    <label>Login Password</label><input value="<?= $this->input->post("password") ?>" required="true" name="password" class="input-block-level required-data" placeholder="Login Password" type="password">
                </p>

                <p class="animate5 bounceIn" id="passwordcontainer">
                    <label>Password Confirm</label><input value="<?= $this->input->post("password_confirm") ?>" required="true" name="password_confirm" class="input-block-level required-data" placeholder="Confirm Password" type="password">  <span class="indicator"></span>
                </p>

                <h3 class="subtitle animate6 bounceIn">Student Basic Information</h3>
                <p id='student-info' class="animate5 bounceIn">

                </p>

                <p  class="animate6 bounceIn">
                    <button class="animate7 bounceIn btn btn-primary" style="width:60%;display: inline-block"><span class="icon-plus-sign-alt"></span> &nbsp;&nbsp;  &nbsp;&nbsp; Register</button>

                    <a class="animate8 bounceIn pull-right" style="color:#fff" href="<?php echo pg_link('login_page') ?>" >Go to Login Page </a>


                </p>

            </form>

        </div><!--regcontent-->
    </div><!--regpanelinner-->


<div class="'scripts">
    <script src="<?= plugins_folder()?>passtrength.js" type="text/javascript" ></script>
    <script src="<?= plugins_folder()?>jquery.growl.js" type="text/javascript" ></script>
        <script>

            <?php if(isset($error)) {    ?>
                jQuery.growl.error({title:"Registration Errors",message: '<?= $message ?> '})

 <?php    }       ?>


            jQuery('input[name=password_confirm]').keyup(function(){
                if(jQuery(this).val() != jQuery("input[name=password]").val()){
                    jQuery(this).addClass("inputError");
                    jQuery(this).siblings('.indicator').css({color:'#a44'}).html("<i class='icon-remove'></i>")
                }else{
                    jQuery(this).removeClass("inputError")
                    jQuery(this).siblings(".indicator").css({color:'#4a4'}).html("<i class='icon-ok'></i>")
                }
            }).focusout(function(){
                if(jQuery(this).val() != jQuery("input[name=password]").val()){
                    jQuery(this).addClass("inputError");
                    jQuery(this).siblings('.indicator').css({color:'#a44'}).html("<i class='icon-remove'></i>")
                    jQuery.growl.warning({title:"Passwords Mismatch",message:"The Login Password entered does not match with Password Confirm Field"})
                }
            });

            jQuery('input[name=password]').passStrengthify();

                jQuery('input[name="username"]').keyup(function(){
                    jQuery(this).removeClass("inputError")
                    jQuery(this).siblings(".indicator").css({color:'#444'}).html("<i class='icon-spin icon-spinner'></i>")
                }).focusout(function(){
                  //  alert("he left me")
                  var input = jQuery(this).val();
                    input = input.toString().trim();
                    if(input == ""){

                        jQuery(this).addClass("inputError");
                        jQuery(this).siblings('.indicator').css({color:'#a44'}).html("<i class='icon-remove'></i>")
                    }else{
                        jQuery.ajax({async:true});
                        var target = this;
                        jQuery.post('student_status',{content:'studentid',stid:jQuery(this).val()},function(rdata,status){

                            if(rdata.error == false){
                                jQuery(target).siblings('.indicator').css({color:'#4a5'}).html("<i class='icon-ok'></i>")
                                jQuery.growl.notice({title:" Registration Number Available",message : rdata.message})
                                jQuery("#student-info").html("<span class='badge badge-success'>" + rdata.message + "</span>");
                            }else{
                                jQuery(target).addClass("inputError");
                                jQuery(target).siblings('.indicator').css({color:'#a44'}).html("<i class='icon-remove'></i>")
                                jQuery.growl.error({title:"Error With Registration Number",message : rdata.message})
                                jQuery("#student-info").html("<span class='badge badge-important'>" + rdata.message + "</span>");

                            }

                        },'json');
                    }
                });


                jQuery('input[name="email_address"]').keyup(function(){
                    jQuery(this).removeClass("inputError")
                    jQuery(this).siblings(".indicator").css({color:'#444'}).html("<i class='icon-spin icon-spinner'></i>")
                }).focusout(function(){
                    //  alert("he left me")
                    var input = jQuery(this).val();
                    input = input.toString().trim();
                    var patern =/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
                    var mailtst = new RegExp(patern) ;
                    var target = this;
                    if(mailtst.test(input) == false){
                        jQuery(this).addClass("inputError");
                        jQuery(this).siblings('.indicator').css({color:'#a44'}).html("<i class='icon-remove'></i>")
                    }else{
                        jQuery.ajax({async:true});
                        jQuery.post('student_status',{content:'emailaddress',stid:jQuery(this).val()},function(rdata,status){
                            if(rdata.error == false){
                                jQuery(target).siblings('.indicator').css({color:'#4a5'}).html("<i class='icon-ok'></i>") ;
                                jQuery.growl.notice({title:"Email Available",message : rdata.message});

                            }else{
                                jQuery(target).addClass("inputError");
                                jQuery(target).siblings('.indicator').css({color:'#a44'}).html("<i class='icon-remove'></i>")
                                jQuery.growl.error({title:"Error With Email Address",message : rdata.message})

                            }
                        },'json');
                    }
                });

                jQuery(document).ready(function(){
                var errors  = jQuery(this).find('.inputError');
                if(errors.length > 0){
                        jQuery.growl.warning({title:"form has Errors",message:"One or More required inputs has errors."})
                        return false;
                    }else{
                        return true;
                    }
            });


        </script>
</div>
