<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if($view = 'list') {     ?>

    <ul class="data-item-controls list-nostyle list-inline">      <?php } ?>

        <li>
            <a row-id="<?php echo $row_id ?>"  href="<?php echo base_url() ; ?>/admin/print_report?filetype=pdf&itype=<?php echo $itemtype ?>&itemid=<?php echo $itemid . (isset($otheritems)?"&".$otheritems:"")?>"  target="_blank" class="text-info print-file-action" data-target="#print-item-data"><i class="fa fa fa-print"></i>&nbsp;&nbsp;<?= $pdf_title ?> </a></li>
    <?php if($access_level == 1) { ?>
        <li>
            <a row-id="<?php echo $row_id ?>"  href="<?php echo base_url()  ?>admin/print_report?filetype=excel&itype=<?php echo $itemtype ?>&itemid=<?php echo $itemid .( isset($otheritems)?"&".$otheritems:"")?>" class="text-success" url-type="remove" ><i class="glyphicon glypfa fa--list"></i>&nbsp;&nbsp;<?= $excel_title ?> </a></li>

    <?php  } ?>

        <?php if($view = 'list') {     ?>
    </ul>

  <?php } ?>
