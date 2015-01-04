<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**@var Holds all the form input values & variables $input_data
 * @desc this form is for adding/editing academic years
 */

$dataE = isset($input_data)?$input_data['data']:false;
$modalTitle = $dataE?"Edit Semester Information":"Add New Academic Semester";

?>
<?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/create_semester",'class="stdform stdform2" id="'. $formtype . '-semester-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>
<input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>"
<input type="hidden" name='form-head' value="<?php echo $modalTitle ?>">
<p>
    <label>
        Semester Name<small>Specify the Name e.g Semester One</small>
    </label>
    <span class="field">
        <?= form_input('sem_name',isset($dataE->name)?$dataE->name:"",' class="required-data"') ?>
    </span>
</p>

<p>
    <label>
       Display Name<small>Specify the name to be shown to viewers</small>
    </label>
    <span class="field">
        <?= form_input('sem_dname',isset($dataE->display_name)?$dataE->display_name:"",' class="required-data"') ?>
    </span>
</p>

<p>
    <label>
        Numeric Count <small> Specify the Decimal & Roman Values</small>   </label>
    <span class="field">
        <?= form_dropdown('sem_numeric',array('--'=>'Numeric') + numeric_values_list(1,false,false),isset($dataE->numeric_value)?$dataE->numeric_value:"",'class="input-small required-data"') ?>
        <?= form_dropdown('sem_roman',array('--'=>'Roman') +  numeric_values_list(2,false,false),isset($dataE->display_value)?$dataE->display_value:"",'class="input-small required-data"') ?>
       </span>


</p>

<p>
    <label>
        Academic Period <small>Specify the year that Semester is Found!!</small>
    </label>
    <span class="field">
            <?= form_dropdown('sem_year',array('--'=>'--') + programme_year_list(true),isset($dataE->year_count)?$dataE->year_count:"",'class=" required-data"') ?>
    </span>
</p>

<p>
    <label>Remarks/Comments<small>Semester Comments/Remarks information</small></label>
        <span class="field">
             <?php echo form_textarea('sem_comments',isset($dataE->comments)?$dataE->comments:"","class='span5 input-xlarge' rows='1' cols='130' style='height:100px !important;resize:none'  ") ?>
        </span>
</p>

<?= form_close() ?>

<?php if(isset($dataE) && $dataE){
$actButton =<<<btnAct
      <button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#semester-list-contents" target-modal="#edit-item-data" target-form="#{$formtype}-semester-data">Update changes</button>
btnAct;


}else{
$actButton =<<<btnAct
      <button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#semester-list-contents" target-modal="#add-item-data" target-form="#{$formtype}-semester-data">Save changes</button>
btnAct;
}  ?>

<script>
    jQuery("#datepicker, #datepicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });

    updateModaltitle(<?= $dataE !=false?2:1 ?>,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;

</script>


