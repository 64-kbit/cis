<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 $currenttoken = $this->session->userdata('form_token');

$cm_data = isset($input_data)?$input_data['data']:"";
$modalTitle = $cm_data?"Edit Campus Information":"Add New Campus ";

?>

   <?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/create_campus",'class="stdform stdform2" id="new-campus-data"',array('token'=>$currenttoken)  + (isset($fkeys)?$fkeys:array()));

   ?>
  <input type="hidden" name="action_type" value="<?php echo isset($form_action)?$form_action:'create'; ?>">
<input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>"
       <input type="hidden" name="acttype" value="<?= is_array($cm_data)?'edit':'add'?>" />
<input type="hidden" name='form-head' value="Create/Edit Programme">
    <p>
        <label>Campus Name</label>
        <span class="field">
            <?php echo form_input('cm_name',isset($cm_data['name'])?$cm_data['name']:"","class='required-data'") ?>
        </span>
    </p>

    <p>
        <label>Code Name <small>Campus Unique Code/Abbreviation</small></label>
        <span class="field">
             <?php echo form_input('cm_code',isset($cm_data['code_name'])?$cm_data['code_name']:"","") ?>
        </span>
    </p>

<p>
    <label>Location <small>Geographic Location of the Campus</small></label>
        <span class="field">
             <?php echo form_input('cm_location',isset($cm_data['location'])?$cm_data['location']:"","class='required-data'") ?>
        </span>
</p>

    <p>
        <label>Type <small>Specify If  parent or the branch</small></label>
        <span class="field">
             <?php echo
              form_dropdown('cm_type',array('--'=>"--") + campus_types_list(),isset($cm_data['campus_type'])?$cm_data['campus_type']:"",'id="selection2" class="uniformselect required-data input-xlarge"'); ?>
        </span>
    </p>

<p>
    <label>Date Created <small>Specify The year/Date the Campus Started</small></label>
        <span class="field">
             <?php echo form_input('cm_startdate',isset($cm_data['year_created'])?$cm_data['year_created']:"",'class="input-small  requir
             ed-data" id="datepicker"') ?>
        </span>
</p>

<p>
    <label>Campus Head<small>Name of the person in Charge</small></label>
        <span class="field">
             <?php echo form_input('cm_head',isset($cm_data['head'])?$cm_data['head']:"","class='required-data'") ?>
        </span>
</p>

<?php if(isset($cm_data) && is_array($cm_data) ){ ?>

<?php } echo form_close();   ?>
   <!--
 <script>
     jQuery(document).ready(
    function(){
        jQuery("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
    }
     )
 </script>
           -->


<?php if(isset($cm_data) && $cm_data){
    $actButton = '<button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#campus-list-contents" target-modal="#edit-item-data" target-form="#new-campus-data">Update changes</button>';


}else{
    $actButton ='<button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#campus-list-contents" target-modal="#add-item-data" target-form="#new-campus-data">Save changes</button>';
}  ?>

<div class="scripts">
    <script>

        updateModaltitle(<?= $input_data !=false?2:1 ?>,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;


        jQuery("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });



        jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});


    </script>

</div>


