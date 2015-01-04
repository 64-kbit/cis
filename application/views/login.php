

    <div class="loginpanelinner" style="width:280px">
        <div class="logo animate0 bounceIn">
            <img class="orglogo logo-img img-circle"  src="<?php echo theme_icons() ?>logo.jpg" alt="">
            <img class="logo-img" src="<?php echo theme_icons() ?>cores-logo-wh.png" alt=""></div>
        <?php
            echo form_open(pg_link('login_page'),'id="login"  method="post"');
        ?>

            <input type="hidden" value="login_form" name="login_form">
            <?php if($login_error){ ?>

                <div class="alert alert-error animate1 bounceIn">
                    <?php echo $login_error ?>
                    <button data-dismiss="alert" class="close" type="button">×</button>
                </div>

            <?php } ?>
            <div class="inputwrapper animate1 bounceIn">
                <label> Registration Number / User ID</label>
                <input name="username" id="username" autocomplete="off" placeholder="Enter Login Id here" type="text">
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <label>Password</label>
                <input name="password" id="password" placeholder="Enter Login password here" type="password">
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit" style="width:270px;"><span class="glyphicon glyphicon-log-in" style="float:left;margin-left:20%;font-size:24px;margin-right:-20%;"></span>Sign In</button>
            </div>
           <!-- <div class="inputwrapper animate4 bounceIn">
                <label><input class="remember" name="signin" type="checkbox" style="font-size:14px; !important"> Remember Me</label>
            </div> -->
            <div class="inputwrapper animate4 bounceIn">
                <div class="pull-right" style="font-size:14px;">Don't have Cores Account? <a href="<?php echo pg_link('signup_student') ?>">Sign Up</a></div>
            </div>  <br>
            <div class="inputwrapper animate4 bounceIn">

                <div class="pull-right" style="font-size:14px;">Forgotten login Password? <a href="<?php echo pg_link('password_reset') ?>">Request New</a></div>
            </div>

        <?php echo form_close(); ?>
    </div><!--loginpanelinner-->



