
<div class="loginpanelinner" style="width:500px">
    <div class="pageheader animate1 bounceIn" >
        <div class="pageicon"><span class="glyphicon glyphicon-ok"></span></div>
        <div class="pagetitle">
            <h5>Account Details sent to your Email</h5>
            <h1>Your account has been created</h1>
        </div>

    </div>
    <form id="login" action="<?php echo pg_link('password_email') ?>" method="post">

        <div class="inputwrapper animate2 bounceIn">
                <?php echo $message ?>
        </div>

        <div class="inputwrapper animate3 bounceIn">

            <div class="pull-right"> <a href="<?php echo pg_link('login_page') ?>">Go To Login Page</a></div>
        </div>

    </form>
</div><!--loginpanelinner-->



