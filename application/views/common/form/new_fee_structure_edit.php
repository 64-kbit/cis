<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

$structure = new FeeStructure();

$structureProgramme = new ProgrammeFee();
$programs = new Programme();
 $courses = new Course();
 $yeas = new AcademicYear();

$serviceCharge = new FeeServiceCharge();

$charges = $serviceCharge->get_list();

$structure->where('id',$fkeys['itemid'])->get();
//$yeas->where('id',$structure->academic_year_id);
$feePg = $structureProgramme->get_programmes($structure->id,$structure->academic_year_id);



$cz = $courses->get_course_list();
$pgs = $programs->get_programme_list();
$acy = $yeas->get_list(true);

$pglist = array();
$selpg = false;
$selcourses = false;
$currepgs = "<input type='hidden' name='selected_program[]' value=''/><input type='hidden' value='' name='selected_courses[]' ";
if($pgs['count']){
    foreach($pgs['list'] as $id => $p){
      //  var_dump($p);die();
        $pglist[$p['id']] = "NTA-".$p['nta_level']."(".$p['code']."-".programme_year_list(false,$p['level_year'],false,false).")-".$p['name'] ;
    }

    if($feePg['count']){
    foreach($feePg['list'] as $fe){

        $selpg[$fe->program_id] = $fe->program_id;
        $selcourses[$fe->course_id] = $fe->course_id;
        $currepgs .= "<input type='hidden' value='{$fe->program_id}' name='selected_program[{$fe->program_id}]' /> <input type='hidden' value='{$fe->course_id}' name='selected_courses[{$fe->course_id}]' />";
    }   }
}

foreach($cz['list'] as $z){
    $cz_list[$z['id']] = $z['name']."(".$z['cat_name'] .")";
}

if(count($cz_list) == count($selcourses)){
    $selcourses = 'all';
    $currepgs .= "<input type='hidden' value='all' name='selected_courses[all]' />";
}



//var_dump($charges);
$chargeslist = array();
foreach($charges['list'] as $id=>$c){
    $chargeslist[$c->id] = $c->name . "(".$c->code_id . ")";
}


$modalTitle = "Edit fee structure <span class='badge badge-primary'>" . $structure->name . "</span> Information";
 //var_dump($structure);

echo form_open(base_url().user_profile($userdata['profile']) ."/update_fee_structure?mode=ajax&itemtype=fee_structure",'class="stdform stdform2" id="fee_structure-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array())); ?>

<?php   ?>

<p>
    <label>Structure Name <small>Specify the General name for the Structure</small></label>
    <span class="field">
        <?= form_input('structure_name',$structure->name,' style="width:440px" class="required-data "')?>
    </span>
</p>

<p>
    <label>Service Charge<small>Select the type of Service to be charged</small></label>
    <span class="field">
        <?= form_dropdown('service_charge',array("--"=>"--") + $chargeslist,$structure->service_type_id,'data-placeholder="Choose service charge .. "  style="width:440px" class="required-data  chosen-select"')?>
    </span>

</p>


<p>
    <label>Student Category<small>Specify Sponsor Type</small></label>
    <span class="field">
       <?= form_dropdown('reg_category',array("--"=>"--") + student_reg_category() ,$structure->reg_category_id ," data-placeholder='Choose Sponsor ..'   class='required-data chosen-select'") ?>
    </span>
</p>


<p>
    <label>Sponsor Category<small>Specify Sponsor Type</small></label>
    <span class="field">
       <?= form_dropdown('sponsor_category',array("--"=>"--") + student_fee_category() , $structure->student_fee_category," data-placeholder='Choose Sponsor ..'   class='required-data chosen-select'") ?>
    </span>
</p>

<p>
    <label>Programme Name <small>Select a Programme from lists</small></label>
                <span class="field">
                  <?php echo form_dropdown('programme[]',array('--'=>'--') + $pglist,$selpg,' data-placeholder="Select applicable  programme or programmes .. " style="width:440px;" class="required-data chosen-select" multiple ')?>
                </span>
</p>
<p>
    <label>Course <small>Select a course from lists</small></label>
                <span class="field">
                  <?php echo form_dropdown('course[]',array('all'=>'all') + $cz_list,$selcourses,'data-placeholder="Select applicable courses or all .. " style="width:440px;"  class="required-data chosen-select" multiple')?>
                </span>
</p>

<p>
    <label>Academic Year <small>Select Academic Year</small></label>
                <span class="field">
                  <?php echo form_dropdown('academic_year',array('--'=>'--') + (is_array($acy['list'])?$acy['list']:array()),$structure->academic_year_id,'class="chosen-select required-data" data-placeholder="Choose an Academic Year .. " ')?>
                </span>
</p>
  <!--
<p>
    <label>Amount<small>Enter manually the total amount<br> that is to be paid</small></label>
    <span class="field">
         <label><input type="number" class="required-data input-medium" style="width:110px" name="amount_local" value="<?= $structure->amount?>"" ></label>
         <label>&nbsp;&nbsp;Minimum&nbsp;<input type="number"   style="width:110px" class="required-data input-medium " name="amount_local_min" value="<?= $structure->minimum_amount?>""> </label>
        <label>&nbsp;%<input type="number" style="width:100px" name="minimum_percentage" value="<?= number_format($structure->minimum_percentage,4) ?>" /></label>
    </span>
</p>


<p>
    <label>Amount for Foreign Student<small>Enter Amount manually for foreign Students<br>  with nationality other than this country</small></label>
    <span class="field">
           <label><input type="number" class="required-data input-medium"  style="width:110px"  name="amount_foreign" value="<?= $structure->amount_foreign?>"> </label>
         <label>&nbsp;&nbsp;Minimum&nbsp;<input type="number"  style="width:110px" class="required-data input-medium " name="amount_foreign_min" value="<?= $structure->minimum_foreign?>"> </label>
    </span>
</p>
     -->
<p>
    <label>Description<small>Fee structure Descriptions</small></label>
   <span class="field">
         <textarea name="description" style="width: 440px;height:50px;resize: none"><?= $structure->description ?></textarea>
   </span>
</p>

<p class="scripts">
    <?php echo $currepgs ; ?>
</p>
<?php
echo form_close();
?>

<?php

$actButton ='<button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#fee_structure-list-contents" target-modal="#edit-item-data" target-form="#fee_structure-data"><i class="fa fa-save"></i>&nbsp;Save Changes</button>';


?>


<div class="scripts">

    <script>
        updateModaltitle(1,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;
           jQuery(".chosen-select").chosen();
    </script>
</div>
