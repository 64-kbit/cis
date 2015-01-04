<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(isset($dp_list['list']) && is_array($dp_list['list']) )  {
    //var_dump($input_data);
    $cz_data = isset($input_data)?$input_data:false;
    $modalTitle = $cz_data?"Edit {$cz_data->code_name} Information :: Last Modified ". date('d M, Y H:s',strtotime($cz_data->date_created)):"Add New Course Programme ";
   //var_dump($course_list);
   // var_dump($programme_list);
    $pg_list = array();
    $cz_list = array();
    if($course_list['count'] > 0){
        foreach($course_list['list'] as $pg){
             $cz_list[$pg['id']] = $pg['name'] ."(". $pg['code_name'] . ")";
        }
    }

    if($programme_list['count'] > 0){
        foreach($programme_list['list'] as $pg){
            $pg_list[$pg['id']] = $pg['name'] ."(". $pg['code'] . ")";
        }
    }
    // $cz_data = isset($input_data)?$input_data:"";               $formtype
    ?>
    <?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/create_pgcourse",'class="stdform stdform2" id="'.$formtype.'-pgcourse-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>
    <input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>" />
            <?php if($cz_data == false){   ?>
        <p>
            <label>Course<small>Select a course from lists</small></label>
                <span class="field">
                  <?php echo form_dropdown('course',array('--'=>'--') + $cz_list,'--','class="required-data select-chosen input-xlarge"')?>
                </span>
        </p>

        <p>
            <label>Programme<small>Select a Course Programme from lists</small></label>
                <span class="field">
                 <?php echo form_dropdown('programme',array('--'=>'--') + $pg_list,'--','class="required-data select-chosen input-xlarge"')?>
                </span>
        </p>
    <?php  }
      ?>
     <p>
         <label>Display Name<small>Specify the Display Name of the course</small></label>
         <span class="field">
             <input name="pg_course_name" class='input-xxlarge required-data' value="<?= isset($cz_data->display_name)?$cz_data->display_name:""?>">
         </span>
     </p>

     <p>
         <label>Course Code<small>Update the Code Name of the course</small></label>
         <span class="field">
             <input name="pg_course_code" class="required-data" value="<?= isset($cz_data->code_name)?$cz_data->code_name:""?>">
         </span>
     </p>

     <p>
         <label>Date Started<small>Select When the Course Started</small></label>
         <span class="field">
             <input id="datepicker4-<?= $formtype ?>" class="required-data" name="pg_startdate" value="<?= isset($cz_data->year_started)?$cz_data->year_started:""?>">
         </span>
     </p>



<?php

    echo form_close();

}  if(isset($cz_data) && $cz_data == true){
    $actButton ='<button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#pgcourse-list-contents" target-modal="#edit-item-data" target-form="#'.$formtype.'-pgcourse-data">Update changes</button>';


}else{
    $actButton ='<button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#pgcourse-list-contents" target-modal="#add-item-data" target-form="#'.$formtype.'-pgcourse-data">Save changes</button>';
}  ?>

<script>

    updateModaltitle(<?= $cz_data !=false?2:1 ?>,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;


    jQuery("#datepicker4-<?= $formtype ?>").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });


    jQuery(".select-chosen").chosen();

    jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});


</script>



<script>

</script>
