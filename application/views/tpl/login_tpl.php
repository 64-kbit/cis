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

    <link rel="icon" type="image/png" href="<?php echo base_url()?>themes/img/icon.png" />

    <?php  echo css_files(user_profile(isset($userdata['profile'])?$userdata['profile']:'login'),$uri)?>


    <?php echo  js_files(user_profile(isset($userdata['profile'])?$userdata['profile']:'login'),$uri)?>
    <script>
        var csrf_token = "<?=$this->security->get_csrf_token_name() ?>";
        var csrf_hash = "<?=$this->security->get_csrf_hash() ?>";
    </script>

</head>

<body xhr_code="<?php echo $this->session->userdata('xhr_session')?>" class="loginpage ">
<div class="container-fluid">
    <div class="row-fluid">
    <div class="col-md-5 col-sm-11">
        <div class=" <?php  echo $body_class ." " . $cont_class ?>" style="min-height: 500px">

            <?php
            $this->load->view($home_view) ;  ?>

        </div>
    </div>

    <div class="col-md-6 col-sm-11">
        <div class="login_page_instructions hidden-phone hidden-tablet" style="border-left: 1px solid rgba(255,255,255,0.1);min-height: 400px">
            <?php $this->load->view('instructions') ?>
        </div>
    </div>
   </div>
</div>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-11 col-sm-11">
        <!-- End of login panel -->
        <div class="loginfooter">
            <p>
                <?php
                echo $footer  ?>
            </p>
        </div> <!-- End of login footer -->
        <?php
        $this->load->view('tpl/footer') ;
        ?>

    </div>
        </div>
</div>

</body>
