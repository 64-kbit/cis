
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$currenttoken = $this->session->userdata('form_token');
$fc_data = isset($input_data)?$input_data['data']:"";
$modalTitle = is_array($fc_data)?"Edit Faculty Information":"Add New Faculty ";


?>

<?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/create_faculty",'class="stdform stdform2" id="new-faculty-data"',array('token'=>$currenttoken)  + (isset($fkeys)?$fkeys:array()));     ?>
<input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>" />
<input type="hidden" name="acttype" value="<?= is_array($fc_data)?'edit':'add'?>" />
<input type="hidden" name='form-head' value="Create/Edit Faculty">
<p>
    <label>Faculty Name<small>Specify the name of the faculty</small></label>
        <span class="field">
            <?php echo form_input('fc_name',isset($fc_data['facult_name'])?$fc_data['facult_name']:"","class='required-data'") ?>
        </span>
</p>
  <!--
<p>
    <label>Faculty Code<small>Faculty Unique ID/Abbreviation</small></label>
        <span class="field">
             <?php echo form_input('cm_code',isset($fc_data['code_name'])?$fc_data['code_name']:"","") ?>
        </span>
</p>
     -->
<p>
    <label>Campus <small>Faculty Campus </small></label>
        <span class="field">
           <?php echo
           form_dropdown('fc_campus',array('--'=>"--") + campus_list(isset($dp_data['campus_list']['list'])?$dp_data['campus_list']['list']:$campus_list['list']),isset($fc_data['campus_id'])?$fc_data['campus_id']:"",'id="campus_id" class="required-data"'); ?>
        </span>
</p>

<p>
    <label>Date Created <small>Specify The year/Date the Campus Started</small></label>
        <span class="field">
             <?php echo form_input('fc_startdate',isset($fc_data['date_added'])?$fc_data['date_added']:"",'class="input-xlarge  required-data" id="datepicker3"') ?>
        </span>
</p>

<p>
    <label>Faculty Head<small>Name of the person in Charge</small></label>
        <span class="field">
             <?php echo form_input('fc_head',isset($fc_data['head'])?$fc_data['head']:"","class='required-data'") ?>
        </span>
</p>
<?php
echo form_close();   ?>

<?php if(isset($fc_data) && is_array($fc_data)){
    $actButton = '<button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#faculty-list-contents" target-modal="#edit-item-data" target-form="#new-faculty-data">Update changes</button>';


}else{
    $actButton ='<button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#faculty-list-contents" target-modal="#add-item-data" target-form="#new-faculty-data">Save changes</button>';
}  ?>

<div class="scripts">
    <script>

        updateModaltitle(<?= $input_data !=false?2:1 ?>,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;


        jQuery("#datepicker3").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });



        jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});


    </script>

</div>

