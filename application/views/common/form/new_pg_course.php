<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(isset($dp_list['list']) && is_array($dp_list['list']) )  {

    $czcat = new CourseCategory();
    $catList = $czcat->get_list();
    $courseCat = array("--"=>"--") ;
    if($catList['count'] > 0){
        foreach($catList['list'] as $id => $ob){
            $courseCat[$ob->id] = "&nbsp;(".$ob->join_name .")" . $ob->name ;
        }
    }

    //var_dump($input_data);
    $cz_data = isset($input_data)?$input_data:false;
    $modalTitle = $cz_data?"Edit {$cz_data['name']} Information":"Add New Course ";
    $programmes_list = $dataE != false? $dataE->get_programme_list($cz_data['id']):$programmes_data;
    $programmes_list_select = $dataE != false ?$dataE->get_course_programme($cz_data['id']):false;
   // $cz_data = isset($input_data)?$input_data:"";               $formtype
?>

    <?php
          $allpgs = array();
    if(isset($programmes_list) && $programmes_list['count'] > 0):
        foreach($programmes_list['list'] as $semOb):
            $allpgs[$semOb['id']] =   "(". $semOb['code'] . ")" . $semOb['name'];
            ?>

        <?php endforeach;
    else: ?>
        <option value="--"> No Programmes</option>
    <?php endif ?>

    <?php
     $pgs = array(); $selpg = array();
    if($programmes_list_select && isset($programmes_list_select['list']) && $programmes_list_select['count'] > 0):

        foreach($programmes_list_select['list'] as $id => $ntpg) :
            $pgs[$ntpg['programs_id']] = "(". $ntpg['code'] . ")" . $ntpg['name'] ;
            $selpg[] = $ntpg['programs_id'];
        endforeach;

        ?>
    <?php endif; ?>

<?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/create_course",'class="stdform stdform2" id="'.$formtype.'-course-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>
    <input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>"
    <input type="hidden" name='form-head' value="Create/Edit Course">
<p>
    <label>Course Name <small>Specify the Name of the Course</small></label>
        <span class="field">
            <?php echo form_input('cz_name',isset($cz_data['name'])?$cz_data['name']:"","class='required-data'") ?>
            <label class="no-margins no-padding">
             &nbsp;Category   <?php echo form_dropdown('cz_category',$courseCat,isset($cz_data['category_id'])?$cz_data['category_id']:"",'style="width:140px" class="required-data chosen-select"'); ?>
            </label>
       </span>
</p>

<p>
    <label>Course Code <small>Short code name e.g Civil Engineering CE</small></label>
        <span class="field">
            <?php echo form_input('cz_code',isset($cz_data['code_name'])?$cz_data['code_name']:"","class='required-data'") ?>
        </span>
</p>



<p>
    <label>Department<small>Where this course is offered</small></label>
        <span class="field">
            <?php echo form_dropdown('dp_name',array('--'=>'--') + department_list_arr($dp_list['list']),isset($cz_data['department_id'])?$cz_data['department_id']:"","class='required-data chosen-select'") ?>
        </span>
</p>

<p>
    <label>Faculty<small>Must be where Department is</small></label>
        <span class="field">
            <?php echo form_dropdown('fc_name',array('--'=>'--') + faculty_list($fc_list['list']),isset($cz_data['faculty_id'])?$cz_data['faculty_id']:"","class='required-data chosen-select'") ?>
        </span>
</p>

<p>
    <label>Campus<small>The Campus must be where Faculty is</small></label>
        <span class="field">
            <?php echo form_dropdown('cm_name',array('--'=>'--') + campus_list($campus_list['list']),isset($cz_data['campus_id'])?$cz_data['campus_id']:"","class='required-data chosen-select'") ?>
        </span>
</p>



<p>
    <label>Date Started<small>Historical Date that Course was Started</small></label>
        <span class="field">
            <?php echo form_input('cz_date',isset($cz_data['date_started'])?$cz_data['date_started']:""," id='datepicker-$formtype' class='input-small'") ?>
        </span>
</p>



<p>
    <label> Description<small>Shortly Describe about the Course</small></label>
        <span class="field">
             <?php echo form_textarea('cz_description',isset($cz_data['description'])?$cz_data['description']:"","class='span5 input-xlarge' rows='1' cols='130' style='height:40px !important;resize:none'  ") ?>
        </span>
</p>


<div class=" form-group " style="border-top: 1px solid #ccc;border-bottom: 1px solid #ccc">
    <label >Course Programmes<small>Click on the box to see list <BR>and select a program fro available list</small></label>
    <div id="dualPicker" class="field dualselect">
        <div class="display-inline" style="width:100%">
            <h4 class="subtitle">Course Programmes</h4>
            <?= form_dropdown('course_programmes[]',$allpgs + $pgs,$selpg,'class="target_list multiple-select chosen-select required-data" style="width:100%;height:80px" multiple="multiple" size="10"') ;?>

        </div>

    </div>

</div>


<?php
    echo form_close();
}else{ ?>
    <div class="alert alert-warning">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <h4>Warning!</h4>
        <p style="margin: 8px 0">No Departments to add the course to!! Add Departments First</p>
    </div>

<?php } ?>

<?php if(isset($cz_data) && $cz_data){
    $actButton =<<<btnAct
      <button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#course-list-contents" target-modal="#edit-item-data" target-form="#{$formtype}-course-data">Update changes</button>
btnAct;


}else{
    $actButton =<<<btnAct
      <button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#course-list-contents" target-modal="#add-item-data" target-form="#{$formtype}-course-data">Save changes</button>
btnAct;
}  ?>

<script>

    updateModaltitle(<?= $cz_data !=false?2:1 ?>,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;


    jQuery("#datepicker-<?= $formtype ?>").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });

     jQuery(".chosen-select").chosen();

    jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});


</script>



<script>

</script>
