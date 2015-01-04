<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');  ?>

    <div class="stdform stdform2" style="border-top: 1px solid #ddd;">
        <div class="par">
            <label>System Display Name<small>Common System Name</small></label>
            <span class="field text-success">
                 <?= $config['display_name'] ?>
            </span>

        </div>

        <div class="par">
            <label>System Name<small>Name of the System</small></label>
            <span class="field text-success">
                 <?= $config['sys_name'] ?>
            </span>

        </div>

        <div class="par">
            <label>Code Name<small>System Code Name</small></label>
            <span class="field text-success">
                 <?= $config['code_name'] ?>
            </span>

        </div>

        <div class="par">
            <label>Version<small>System Version</small></label>
            <span class="field text-success">
                 <?= $config['version'] ?>
            </span>

        </div>

        <div class="par">
            <label>Support Address<small>System Developers Email</small></label>
            <span class="field text-success">
                 <?= $config['support_email'] ?>
            </span>
        </div>

        <div class="par">
            <?php if($userdata['login_id'] == 'admin' && $userdata['access_level'] == 1) {  ?>
                <button class="btn " data-toggle="modal" data-target="#add-item-data" href="<?= base_url() . 'ajax_load/form?name=system_config&cat=sys_info&itemid'. $config['sys_id']?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit Information </button>
            <?php
            }    ?>

        </div>


        <?php
       // var_dump($config);
        ?>
    </div>


