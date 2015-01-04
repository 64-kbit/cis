<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

// $this->load->view('tpl/header');
echo doctype('html5'); ?>
<html lang="en-us,tz-sw">
<head>
    <?php

    $meta = array(
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'description', 'content' => 'Students Management IS'),
        array('name' => 'keywords', 'content' => 'STUDENTS-IS, cores, registration, application,management information system'),
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')

    );

    echo meta($meta);
    ?>
    <!-- Page Header -->

    <title><?php echo $pg_title; ?> </title>

    <link rel="icon" type="image/ico" href="<?php echo base_url()?>themes/img/logo.ico" />

    <?php  echo css_files(user_profile(isset($userdata['profile'])?$userdata['profile']:'login'),$uri)?>


    <?php echo  js_files(user_profile(isset($userdata['profile'])?$userdata['profile']:'login'),$uri)?>

</head>
<body>


<div id="mainwrapper" class="mainwrapper">

    <div class="header">
        <div class="logo animate2 bounceIn">
            <img class="logo-img" src="<?php echo base_url() ?>themes/img/cores-logo-wh.png" alt="">
        </div>
        <div class="headerinner">
            <!--headmenu-->
        </div>
    </div>
    <div class="rightpanel">
    <div class="errortitle">
        <h4 class="animate0 fadeInUp">Page not Found</h4>
        <span class="animate1 bounceIn">4</span>
        <span class="animate2 bounceIn">0</span>
        <span class="animate3 bounceIn">4</span>
        <div class="errorbtns animate4 fadeInUp">
            <a onclick="history.back()" class="btn btn-primary btn-large">Go to Previous Page</a>
            <a href="<?php echo base_url()?>" class="btn btn-large">Go to Dashboard</a>
        </div>
    </div>

    <div class="footer">
        <div class="footer-right" style="margin-right:40px">
            <span> <?php
                $this->load->view('tpl/p_footer');
                ?></span>
        </div>

    </div><!--footer-->
    </div>
</div><!--maincontentinner-->

<div class="scripts">
    <?php
    $this->load->view('tpl/modals/base');
    ?>
</div>
</body>
</html>

<?php

// $this->load->view('tpl/footer');

?>




