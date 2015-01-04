<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

$programs = new Programme();
$courses = new Course();
$yeas = new AcademicYear();

$serviceCharge = new FeeServiceCharge();

$charges = $serviceCharge->get_list();


$cz = $courses->get_course_list();
$pgs = $programs->get_programme_list();
$acy = $yeas->get_list(true);

$pglist = array();
$selpg = false;
if($pgs['count']){
    foreach($pgs['list'] as $id => $p){
        //  var_dump($p);die();
        $pglist[$p['id']] = "NTA-".$p['nta_level']."(".$p['code']."-".programme_year_list(false,$p['level_year'],false,false).")-".$p['name'] ;
    }
}

foreach($cz['list'] as $z){
    $cz_list[$z['id']] = $z['name']."(".$z['cat_name'] .")";
}

//var_dump($charges);
$chargeslist = array();
foreach($charges['list'] as $id=>$c){
    $chargeslist[$c->id] = $c->name . "(".$c->code_id . ")";
}


$modalTitle = "Create a New fee structure  ";
//var_dump($structure);

echo form_open(base_url().user_profile($userdata['profile']) ."/update_fee_structure?mode=ajax&itemtype=fee_structure_new",'class="stdform stdform2" id="fee_structure_new-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array())); ?>

<?php   ?>

<p>
    <label>Structure Name <small>Specify the General name for the Structure</small></label>
    <span class="field">
        <?= form_input('structure_name','',' style="width:440px" class="required-data "')?>
    </span>
</p>

<p>
    <label>Service Charge<small>Select the type of Service to be charged</small></label>
    <span class="field">
        <?= form_dropdown('service_charge',array("--"=>"--") + $chargeslist,'','data-placeholder="Choose service charge .. "  style="width:440px" class="required-data  chosen-select"')?>
    </span>

</p>

<p>
    <label>Sponsor Category<small>Specify Sponsor Type</small></label>
    <span class="field">
       <?= form_dropdown('sponsor_category',array("--"=>"--") + student_fee_category() ,'' ," data-placeholder='Choose Sponsor ..'   class='required-data chosen-select'") ?>
    </span>
</p>


<p>
    <label>Student Category<small>Specify Sponsor Type</small></label>
    <span class="field">
       <?= form_dropdown('reg_category',array("--"=>"--") + student_reg_category() ,'' ," data-placeholder='Choose Sponsor ..'   class='required-data chosen-select'") ?>
    </span>
</p>


<p>
    <label>Programme Name <small>Select a Programme from lists</small></label>
                <span class="field">
                  <?php echo form_dropdown('programme[]',array('--'=>'--') + $pglist,'',' data-placeholder="Select applicable  programme or programmes .. " style="width:440px;" class="required-data chosen-select" multiple ')?>
                </span>
</p>
<p>
    <label>Course <small>Select a course from lists</small></label>
                <span class="field">
                  <?php echo form_dropdown('course[]',array('all'=>'all') + $cz_list,'','data-placeholder="Select applicable courses or all .. " style="width:440px;"  class="required-data chosen-select" multiple')?>
                </span>
</p>

<p>
    <label>Academic Year <small>Select Academic Year</small></label>
                <span class="field">
                  <?php echo form_dropdown('academic_year',array('--'=>'--') + (is_array($acy['list'])?$acy['list']:array()),'','class="chosen-select required-data" data-placeholder="Choose an Academic Year .. " ')?>
                </span>
</p>

<p>
    <label>Amount<small>Enter manually the total amount<br> that is to be paid</small></label>
    <span class="field">
         <label><input type="number" class="required-data input-medium" style="width:110px" name="amount_local" value="" ></label>
         <label>&nbsp;&nbsp;Minimum&nbsp;<input type="number"   style="width:110px" class="required-data input-medium " name="amount_local_min" value=""> </label>
    </span>
</p>


<p>
    <label>Amount for Foreign Student<small>Enter Amount manually for foreign Students<br>  with nationality other than this country</small></label>
    <span class="field">
           <label><input type="number" class="required-data input-medium"  style="width:110px"  name="amount_foreign" value=""> </label>
         <label>&nbsp;&nbsp;Minimum&nbsp;<input type="number"  style="width:110px" class="required-data input-medium " name="amount_foreign_min" value=""> </label>
    </span>
</p>

<p>
    <label>Description<small>Fee structure Descriptions</small></label>
   <span class="field">
         <textarea name="description" style="width: 440px;height:50px;resize: none"></textarea>
   </span>
</p>
<?php
echo form_close();
?>

<?php

$actButton ='<button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#fee_structure-list-contents" target-modal="#add-item-data" target-form="#fee_structure_new-data"><i class="fa fa-save"></i>&nbsp;Save Changes</button>';


?>


<div class="scripts"title>

    <script>
        updateModaltitle(1,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;
        jQuery(".chosen-select").chosen();
    </script>
</div>
