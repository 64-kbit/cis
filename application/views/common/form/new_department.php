
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 $currenttoken = $this->session->userdata('form_token');
  $cm_data = isset($input_data)?$input_data:"";
$modalTitle = is_array($cm_data)?"Edit Department Information":"Add New Department ";
    if(is_array($cm_data)){
        $cm_data['dp_type'] = $fkeys['type'];
    }

?>

<?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/create_department",'class="stdform stdform2" id="new-department-data"',array('token'=>$currenttoken)  + (isset($fkeys)?$fkeys:array()));     ?>
<input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>"
<input type="hidden" name="acttype" value="<?= is_array($cm_data)?'edit':'add'?>" />

<input type="hidden" name='form-head' value="Create/Edit Programme">
<p>
    <label>Department Name<small>General name of the department</small></label>
        <span class="field">
            <?php echo form_input('dp_name',isset($cm_data['name'])?$cm_data['name']:"","class='required-data input-xlarge'") ?>
        </span>
</p>

<p>
    <label>Department Code<small>Specify if there is any</small></label>
        <span class="field">
             <?php echo form_input('dp_code',isset($cm_data['code'])?$cm_data['code']:"","class='input-xlarge'") ?>
        </span>
</p>

<p>
    <label>Department Number <small>Specify Department Unique Number</small></label>
        <span class="field">
             <?php echo form_input('dp_number',isset($cm_data['code_no'])?$cm_data['code_no']:"","class='input-xlarge'") ?>
        </span>
</p>

<p>
    <label>Campus <small>Specify the Campus where the department is</small></label>
        <span class="field">
             <?php echo
             form_dropdown('dp_campus',array('--'=>"--") + campus_list(isset($dp_data['campus_list']['list'])?$dp_data['campus_list']['list']:$campus_list['list']),isset($cm_data['campus_id'])?$cm_data['campus_id']:"",'id="selection2" class="input-xlarge required-data"'); ?>
        </span>
</p>

<p>
    <label>Faculty <small>Specify the Faculty where the department is</small></label>
        <span class="field">
             <?php echo
             form_dropdown('dp_facult',array('--'=>"--") + faculty_list(isset($dp_data['facult_list']['list'])?$dp_data['facult_list']['list']:$fc_list['list']),isset($cm_data['facult_id'])?$cm_data['facult_id']:"",'id="selection2" class="input-xlarge "'); ?>
        </span>
</p>

<p>
    <label>Department Type<small>Specify based on activity type</small></label>
        <span class="field">
             <?php echo  form_dropdown('dp_type',array('--'=>"--") + department_types(),isset($cm_data['dp_type'])?$cm_data['dp_type']:"",'id="selection2" class="input-xlarge required-data"');  ?>
        </span>
</p>

<p>
    <label>Department Head<small>Name of the person in Charge</small></label>
        <span class="field">
             <?php echo form_input('dp_head',isset($cm_data['head'])?$cm_data['head']:"","class='required-data input-xlarge'") ?>
        </span>
</p>

<p>
    <label>Department Description<small>Shortly Describe about the department</small></label>
        <span class="field">
             <?php echo form_textarea('dp_description',isset($cm_data['description'])?$cm_data['description']:"","class='span5 input-xlarge' rows='1' cols='130' style='height:40px !important;resize:none'  ") ?>
        </span>
</p>

<?php
 echo form_close();   ?>


<?php if(isset($cm_data) && is_array($cm_data)){
    $actButton = '<button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#department-list-contents" target-modal="#edit-item-data" target-form="#new-department-data">Update changes</button>';


}else{
    $actButton ='<button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#department-list-contents" target-modal="#add-item-data" target-form="#new-department-data">Save changes</button>';
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

