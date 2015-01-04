
<div class="loginpanelinner" style="width:500px">
    <?php if(isset($activateerror) && $activateerror == true){
        ?>
        <div class="pageheader animate1 bounceIn" >
            <div class="pageicon"><span style="color:#f48f59" class="glyphicon glyphicon-remove-circle"></span></div>
            <div class="pagetitle">
                <h5 style="color:#f48f59">Account Activation process failed. Please Contact Admin</h5>
                <h1 style="color:#f48f59">Your account could not be activated</h1>
            </div>

        </div>
        <form id="login" action="<?php //echo pg_link('password_email') ?>" method="post">

            <div style="color:#f48f59" class="inputwrapper animate2 bounceIn">
                <?php echo $message ?>
            </div>

            <div class="inputwrapper animate3 bounceIn">

                <div class="pull-right"> <a href="<?php echo pg_link('login_page') ?>">Go To Login Page</a></div>
            </div>

        </form>

    <?php

    }else{ ?>
    <div class="pageheader animate1 bounceIn" >
        <div class="pageicon"><span class="glyphicon glyphicon-ok"></span></div>
        <div class="pagetitle">
            <h5>Your Account  is now ready for use. Go to login page to continue</h5>
            <h1>Your account has been Activated</h1>
        </div>

    </div>
    <form id="login" action="<?php //echo pg_link('password_email') ?>" method="post">

        <div class="inputwrapper animate2 bounceIn">
                <?php echo $message ?>
        </div>

        <div class="inputwrapper animate3 bounceIn">

            <div class="pull-right"> <a href="<?php echo pg_link('login_page') ?>">Go To Login Page</a></div>
        </div>

    </form>

    <?php } ?>
</div><!--loginpanelinner-->



