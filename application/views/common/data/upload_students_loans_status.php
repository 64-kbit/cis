<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
//var_dump($statusinfo);  ?>

<table class="table table-striped "  id="file_upload-status-list-table">
    <colgroup>
        <col  style="align: center; width: 2%">

    </colgroup>

    <thead>
    <tr>
        <th>Row</th>
        <th>Error type / Message</th>
    </tr>
    </thead>
    <tbody>
    <?php

    if(is_array($statusinfo) && count($statusinfo) > 0){
        foreach($statusinfo as $id => $status){

            if(isset($status['error'])){
                 if(isset($status['linkinfo'])){
                     if($status['linkinfo']['valid']){
                         $error = 'text-success';
                         $message =  ' Student ID: ' . $status['msg'] . " <span class='badge badge-success'>Associated info found and linked</span>";
                     }else{
                         $error = 'text-info';
                         $message =  ' Student ID: ' . $status['msg'] . " <span class='badge badge-info'>Association found, But not updated!</span>";
                     }
                 }else{
                     $error = 'text-warning';
                     $message = ' Student ID: ' . $status['msg'] ;
                 }
            }else{
                $error = '\'  style="color:#a44" \'';
                $message = $status;
            }

            ?>
            <tr>
                <td class="row-head" style="background: #123954"><?= $id ?>
                </td>
                 <td>
                     <small class='<?= $error ?>'><?= $message ?></small>
                </td>

            </tr>
        <?php        }  }
    ?>
    </tbody>
</table>

<div class="scripts">
    <script>
        jQuery("#file_upload-status-list-table").dataTable();
    </script>
</div>
