<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**@var Holds all the form input values & variables $input_data
     * @desc this form is for adding/editing academic years
     */

    $dataE = isset($input_data)?$input_data['data']:false;
$modalTitle = $dataE?"Edit Academic Yer":"Add New Academic Year";

?>

<?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/create_academic_year",'class="stdform stdform2" id="'. $formtype . '-academic_year-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>
<input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>"
<input type="hidden" name='form-head' value="<?php echo $modalTitle ?>">
<p>
    <label>
        Starting Date<small>Calendar Starting Date of the Academic Year</small>
    </label>
    <span class="field">
        <?= form_input('acY_start',isset($dataE->start_date)?$dataE->start_date:"",'id="datepicker" class="required-data"') ?>
    </span>
</p>

<p>
    <label>
        Ending  Date<small>Calendar Ending Date of the Academic Year</small>
    </label>
    <span class="field">
        <?= form_input('acY_end',isset($dataE->end_date)?$dataE->end_date:"",'id="datepicker2" class="required-data"') ?>
    </span>
</p>

<p>
    <label>
        Year Separator <small> Separator for Notations </small>
    </label>
    <span class="field">
            <?= form_dropdown('acY_separator',academic_year_separator(),isset($dataE->y_separator)?$dataE->y_separator:"",'class="input-small required-data"') ?>
    </span>
</p>

<p>
    <label>Remarks/Comments<small>Academic Comments/Remarks information</small></label>
        <span class="field">
             <?php echo form_textarea('acY_comments',isset($dataE->comments)?$dataE->comments:"","class='span5 input-xlarge' rows='1' cols='130' style='height:100px !important;resize:none'  ") ?>
        </span>
</p>

<?= form_close() ?>

<?php if(isset($dataE) && $dataE){
    $actButton =<<<btnAct
      <button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#academic_year-list-contents" target-modal="#edit-item-data" target-form="#{$formtype}-academic_year-data">Update changes</button>
btnAct;


 }else{
    $actButton =<<<btnAct
      <button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#academic_year-list-contents" target-modal="#add-item-data" target-form="#{$formtype}-academic_year-data">Save changes</button>
btnAct;
}
?>

<script>
    jQuery("#datepicker, #datepicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });



  updateModaltitle(<?= $dataE !=false?2:1 ?>,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;



</script>


