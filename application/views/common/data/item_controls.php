<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>

<ul class="data-item-controls list-nostyle list-inline" item-type="<?php $viewtype?>">
    <?php if($access_level == 1) { ?>
    <li>
        <a row-id="<?php echo $row_id ?>"  href="<?php echo base_url() ; ?>/ajax_load/form_edit?itype=<?php echo $itemtype ?>&itemid=<?php echo $itemid . (isset($otheritems)?"&".$otheritems:"")?>" target-cont="<?php echo $targetCont ?>" data-toggle="modal" class="text-info edit-remote-qry" data-target="#edit-item-data"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</a></li>

    <li>

        <a row-id="<?php echo $row_id ?>" target-title="Remove <?php echo $itemtype ?>"  href="#" target-cont="<?php echo $targetCont ?>" target-link="<?php echo base_url()  ?>admin/remove_item?itype=<?php echo $itemtype ?>&itemid=<?php echo $itemid .( isset($otheritems)?"&".$otheritems:"")?> "class="text-error remove-remote-qry" url-type="remove" ><i class="fa fa-trash"></i>&nbsp;&nbsp;Remove</a></li>
      <?php if(isset($showprint) && $showprint == true) { ?>
        <li>
            <a row-id="<?php echo $row_id ?>"  target="_blank" href="<?php echo base_url()  ?>admin/print_report?filetype=excel&itype=<?php echo $itemtype ?>&itemid=<?php echo $itemid .( isset($otheritems)?"&".$otheritems:"")?>" class="text-success" url-type="remove" ><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;<?= isset($excel_title)?$excel_title:"Excel Report" ?> </a></li>

      <?php }  } // end show print } ?>

    <?php if(isset($showprint) && $showprint == true) { ?>
    <li>
        <a row-id="<?php echo $row_id ?>"  href="<?php echo base_url() ; ?>admin/print_report?filetype=pdf&itype=<?php echo $itemtype ?>&itemid=<?php echo $itemid . (isset($otheritems)?"&".$otheritems:"")?>"  target="_blank" class="text-info print-file-action" data-target="#print-item-data"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;<?= isset($pdf_title)?$pdf_title:"PDF Report" ?> </a></li>
<?php } // end print pdf?>
    <li > <!-- data-toggle="tooltip" data-placement="top" title="View Details" -->
        <a row-id="<?php echo $row_id ?>"  data-toggle="modal" target-form="<?php echo $targetForm ?>" target-cont="<?php echo $targetCont ?>"  class="text-success remote-url-qry" url-type="view" data-target="#view-item-data" href="<?php echo base_url()  ; ?>/ajax_load/view_item?itype=<?php echo $itemtype ?>&itemid=<?php echo $itemid .( isset($otheritems)?"&".$otheritems:"")?>">
            <i class="fa fa-info-circle"></i>&nbsp;&nbsp;More Info ..</a></li>

</ul>
