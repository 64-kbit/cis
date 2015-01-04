<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
$semd = new ClassStream();
$strli = $semd->get_list();

$acY = new AcademicYear();
$listAc = $acY->get_list();

$pg = new Programme();
$pgl = $pg->get_programme_list();

$czpg = new Course();
$dpid = false;
if($userdata['profile'] == 'department'){
    $dpid = $userdata['user_info']['id'];
}
$czLi = $czpg->get_course_list(false,$dpid);
$programmeYears = array('--'=>'--');


$years = array();
$streams = array();
$programmes = array();
$courses = array();
if($listAc['count'] > 0){
    foreach($listAc['list'] as $sem){
        $years[$sem->id] = $sem->notation;
        $programmeYears[$sem->start_year] = $sem->start_year;
    }
}

if($strli['count'] > 0){
    foreach($strli['list'] as $item){
        $streams[$item->id] = $item->name;
    }
}


if($czLi['count'] > 0){
    foreach($czLi['list'] as $sem){
        $courses[$sem['id']] = $sem['name'];
    }
}


if($pgl['count'] > 0){
    foreach($pgl['list'] as $sem){

        if($sem['is_stop_level'] == 2){
            $programmes[$sem['id']] = $sem['name'];
        }else{
            continue;
        }
    }
}


$modalTitle = "Create A New Course Class";

?>
<?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/autocourse_class",'class="stdform stdform2" id="'. $formtype . '-autocourse_class-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>
<input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:""; ?>"
<input type="hidden" name='form-head' value="<?php echo $modalTitle; ?>">


<p>
    <label>Academic Year<small>Academic Year where classes are to be added</small></label>
    <span class="field">
        <?php echo form_dropdown('academic_year',array('--'=>'--') + $years,'--','class="required-data chosen-select" data-placeholder = "Select Academic year ..." style="width:200px"') ?>
    </span>
</p>


<p>
    <label>Start Programmes <small>Select the starting Programmes</small></label>
    <span class="field">
        <?php echo form_dropdown('programmes[]', $programmes,'--','class="required-data chosen-select" data-placeholder = "Select Starting Programs ..." style="width:440px" multiple') ?>
    </span>
</p>

<p>
    <label>Courses <small>Courses where classes are to be added</small></label>
    <span class="field">
        <?php echo form_dropdown('courses[]', $courses,'--','class="required-data chosen-select" data-placeholder = "Select Courses ..." style="width:440px" multiple') ?>
    </span>
</p>
  <!--
<p>
    <label>Admission Year <small>Select the year that this class was started</small>  </label>
    <span class="field">
        <?php echo form_dropdown('startYear[]',$programmeYears,'--','class="required-data" multiple') ?>
    </span>
</p>
    -->
<p>
    <label>Streams<small>Academic Year where classes are to be added</small></label>
    <span class="field">
        <?php echo form_dropdown('ac_streams[]', $streams,'--','class="required-data chosen-select" data-placeholder = "Select Starting Stream ..." style="width:440px" multiple') ?>
    </span>
</p>

<?= form_close() ?>


<?php
$actButton = '<button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#autocourse_class-list-contents" target-modal="#add-item-data" target-form="#'.  $formtype . '-autocourse_class-data">Generates Classes</button>';

?>

<script>
    jQuery("#datepicker, #datepicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });
    jQuery('.chosen-select').chosen();
    updateModaltitle(1,'<?php echo addslashes($modalTitle); ?>','<?php echo addslashes($actButton); ?>') ;
</script>
