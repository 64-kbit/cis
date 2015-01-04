<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php

$acY = new AcademicYear();
$listAc = $acY->get_list();

$years = array();
if($listAc['count'] > 0){
    foreach($listAc['list'] as $sem){
        $years[$sem->id] = $sem->notation;
    }
}

$modalTitle = "<span class='fa fa-upload'></span>&nbsp;Upload New Loans in the List";

?>
<?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/loan_import",'class="stdform stdform2" id="'. $formtype . '-loan_import-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>
<input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>"

<p>
    <label>Academic Year<small>Academic Year where classes are to be added</small></label>
    <span class="field">
        <?php echo form_dropdown('academic_year',array('--'=>'--') + $years,'--','class="required-data"')?>
    </span>
</p>

<p>
    <label>Select CSV File<small>The format of file must be csv</small></label>
    <span class="field">
       <input type="file" name="loans_file">
    </span>
</p>
<?= form_close() ?>

<?php
$actButton =<<<btnAct
      <button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#loan_import-list-contents" target-modal="#add-item-data" target-form="#{$formtype}-loan_import-data">Save Changes</button>
btnAct;
?>

<script>
    jQuery("#datepicker, #datepicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });

    updateModaltitle(1,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;



</script>
