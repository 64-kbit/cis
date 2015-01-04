<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php


$pg = new Programme();
$czcat = new CourseCategory();
$course = $czcat->get_list();
$pglist = $pg->get_programme_list() ;

if(isset($fkeys)){
    $basecode = new ProgramBaseCode(isset($fkeys)?$fkeys['itemid']:null);
   $basecode->where('code_name',$basecode->code_name)->get();
  $input_data['id'] = &$basecode->id;
    $input_data['code_name'] = &$basecode->code_name;
    $input_data['program_id'] = &$basecode->program_id;

    foreach($basecode->all as $id => $bc){
        $input_data['course_category_id'][] = $bc->course_category_id;
    }
    $input_data['display_name'] = &$basecode->display_name;

}else{
   $input_data = false;
}
$pdt = array();
foreach($pglist['list'] as $id => $p){
   //if($p['parent_program_id'] == null){
       $pdt[$p['id']] = $p['name'] . "(" .$p['code']. ")";
  //// }else{
  ///     continue;
   //}
}

$list = array();
foreach($course['list'] as $id => $p ){
   $list[$p->id] = $p->name . "(". $p->join_name . ")";
}

$modalTitle = $input_data?"Edit Base Code Information ":"Add New Programme Base CODE ";
   ?>
<?php echo form_open(base_url()."admin/ajax_load/create_pg_basecode",'class="stdform stdform2" id="'.$formtype.'-pg_basecode-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>
<input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>" />

<p>
    <label>Award Programme<small>Select a Award Programme from lists</small></label>
    <span class="field">
        <?php echo form_dropdown('base_programme', array('--'=>"Click to choose award programme" ) + $pdt,isset($input_data['program_id'])?$input_data['program_id']:false,'class="required-data select-chosen input-xlarge" data-placeholder="Click to choose a programme..."')?>
    </span>
</p>


<p>
    <label>Course Category<small>Select a Course category type from lists</small></label>
    <span class="field">
        <?php echo form_dropdown('course_cat[]',$list,isset($input_data['course_category_id'])?$input_data['course_category_id']:"--",'class="required-data select-chosen input-xxlarge" multiple data-placeholder="Click to choose a categories to be applied to..."')?>
    </span>
</p>
<p>
    <label>Code Name<small>Specify the code name.<br> e.g BENG for Bachelor degree in Engineering</small></label>
    <span class="field">
        <?= form_input('base_code',isset($input_data['code_name'])?$input_data['code_name']:"","class='required-data'")?>
    </span>
</p>

<p>
    <label>Description<small>Describe Shortly about this Programme Code</small></label>
    <span class="field">
        <?= form_textarea('description',isset($input_data['display_name'])?$input_data['display_name']:"","style='resize:none;height: 40px;width:300px' class='required-data'")?>
    </span>
</p>


<?php

echo form_close();

  if(isset($input_data) && is_array($input_data) == true){
    $actButton ='<button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#pg_basecode-list-contents" target-modal="#edit-item-data" target-form="#'.$formtype.'-pg_basecode-data">Update changes</button>';


}else{
    $actButton ='<button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#pg_basecode-list-contents" target-modal="#add-item-data" target-form="#'.$formtype.'-pg_basecode-data">Save changes</button>';
}  ?>

<script>

    updateModaltitle(<?= $input_data !=false?2:1 ?>,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;


    jQuery(".select-chosen").chosen();

    jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});


</script>
