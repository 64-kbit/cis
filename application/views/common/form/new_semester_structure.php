<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**@var Holds all the form input values & variables $input_data
 * @desc this form is for adding/editing academic years
 */

$dataE = isset($input_data)?$input_data['data']:false;
$modalTitle = $dataE?"Edit Semester Structure":"Create New Semester Structure";

?>
<?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/create_semester_structure",'class="stdform stdform2" id="'. $formtype . '-semester_structure-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>
<input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>"
<input type="hidden" name='form-head' value="<?php echo $modalTitle ?>">

        <div class="alert-info alert alert-dismissable" >
                <button class="close" type="button" data-dismiss="alert"></button>
                <small>
                    In this section create and specify the Semester structure that is to be used by different institute/college programmes.
                    then add the list of semesters to this structure. This list is going to be used to automate every programme that is associated to this structure.
                </small>
        </div>


<p class="form-group">
    <label>
        Structure Name<small>Specify the Name e.g Four Semesters</small>
    </label>
    <span class="field">
        <?= form_input('semSt_name',isset($dataE->name)?$dataE->name:"",' class="required-data"') ?>
    </span>
</p>

<p class="form-group">
    <label>
        Display Name<small>Specify the name to be shown to viewers</small>
    </label>
    <span class="field">
        <?= form_input('semSt_dname',isset($dataE->display_name)?$dataE->display_name:"",' class="required-data"') ?>
    </span>
</p>

<p class="form-group">
    <label>
        Code Name <small data-toggle="tooltip" title="The Code name will be used to link/associate with programmes that use this particular structure"> Specify the Code Name e.g 4YR meaning 4 years</small>   </label>
    <span class="field">
        <?= form_input('semSt_code',isset($dataE->code_name)?$dataE->code_name:"",'class="input-small required-data"') ?>
       </span>


</p>
   <!--
<p class="form-group">
    <label>
        Academic Period <small>Specify the year that Semester is Found!!</small>
    </label>
    <span class="field">
            <?php //form_dropdown('sem_year',array('--'=>'--') + programme_year_list(true),isset($dataE->year_count)?$dataE->year_count:"",'class=" required-data"') ?>
    </span>
</p>   -->

<div class=" form-group " style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc">
    <label >Structure Semesters List<small>Pick Semesters on the left <br>and add them on the right</small></label>
        <div id="dualPicker" class="field dualselect">

                <div class="display-inline" style="width:40%">
                    <h4 class="subtitle">Available Semesters</h4>
                    <select class="source_list" style='width: 100%' name="semesters_list" multiple="multiple" size="10">
                        <?php
                        $semesters = $dataE != false? $dataE->get_not_this_semesters():$semesters;
                        if(isset($semesters) && $semesters['count'] > 0):

                            foreach($semesters['list'] as $semOb): ?>
                               <option value="<?= $semOb->id ?>"><?= $semOb->name ."(". $semOb->display_value . ") Year: ". $semOb->year_count ?> </option>
                           <?php endforeach;
                            else: ?>
                               <option value="--"> No Semesters</option>
                        <?php endif ?>
                    </select><span><small>Pick Semesters from here</small></span>
                </div>

                                <span class="ds_arrow" style="padding-top:70px">
                                    <button data-toggle="tooltip" title="Click to add Semester To Structure on left" class="btn mv_right ds_next"><i class="glyphicon glyphicon-chevron-right"></i></button>  <br>
                                    <button class="btn mv_left ds_prev" data-toggle="tooltip" title="Click Remove Semester From Structure"><i class="glyphicon glyphicon-chevron-left"></i></button>

                                </span>


                <div class="display-inline" style="width:40%">
                    <h4 class="subtitle">Structure Semesters</h4>
                    <select name="semSt_semesters[]" class="target_list multiple-select required-data" style="width:100%" multiple="multiple" size="10">
                       <?php
                       $notSemesters = $dataE != false ?$dataE->get_structure_semesters():false;
                       if($notSemesters && isset($notSemesters['list']) && $notSemesters['count'] > 0):

                           foreach($notSemesters['list'] as $id => $ntSem) :
                                echo "<option value='{$ntSem->id}'>". $ntSem->name ."(". $ntSem->display_value . ") Year: ". $ntSem->year_count  ."</option>";
                               endforeach;

                           ?>
                        <?php endif; ?>
                    </select>
                    <span class="help-inline">List Here semesters</span>
                </div>

        </div>

</div>

<?= form_close() ?>

<?php if(isset($dataE) && $dataE){
    $actButton =<<<btnAct
      <button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#semester_structure-list-contents" target-modal="#edit-item-data" target-form="#{$formtype}-semester_structure-data">Update changes</button>
btnAct;


}else{
    $actButton =<<<btnAct
      <button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#semester_structure-list-contents" target-modal="#add-item-data" target-form="#{$formtype}-semester_structure-data">Save changes</button>
btnAct;
}  ?>

<script>

    updateModaltitle(<?= $dataE !=false?2:1 ?>,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;

    jQuery("#datepicker, #datepicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });

    jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});


</script>


