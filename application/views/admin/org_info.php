<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');  ?>
<div class="stdform stdform2" style="border-top: 1px solid #ddd;">
    <div class="par">
        <label>Organization Name<small>Organazation Name</small></label>
            <span class="field text-success">
              <?= $config['org_name'] ?>  (<small style="color:#444"><?= $config['org_display_name'] ?></small>)-(<strong class="text-info"> <?= $config['org_abbr'] ?></strong>)
            </span>

    </div>

    <div class="par">
        <label>Organization Type<small>Organization Category Type</small></label>
            <span class="field text-success">
                 <?= strtoupper($config['org_type']) ?>
            </span>

    </div>

    <div class="par">
        <label>Contacts Information<small>Contacts Information</small></label>
            <span class="field">
                <label><strong style="font-weight: bold">Address:</strong>  <?= $config['org_box'] ?></label>  <br>
                <label><strong style="font-weight: bold">Tel: </strong> <?= $config['org_contact'] ?></label> <br>
                <label><strong style="font-weight: bold">Email:</strong>  <?= $config['org_email'] ?></label> <br>
                <label><strong style="font-weight: bold">Website: </strong> <?= $config['org_website'] ?></label> <br>
                <label><strong style="font-weight: bold">Location:</strong>  <?= $config['org_loc'] ?></label>  <br>
                <label><strong style="font-weight: bold">Address:</strong>  <?= $config['org_box'] ?></label><br>
            </span>

    </div>

    <div class="par">
        <label>Org Summary<small> <?= strtoupper($config['org_type']) ?> Summary Information</small></label>
            <span class="field text-info">
                 <?= $config['org_summary_doc'] ?>
               &nbsp;

            </span>
        <br>

    </div>



    <?php
     //var_dump($config);
    ?>
</div>
