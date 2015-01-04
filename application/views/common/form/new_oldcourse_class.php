<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
$semd = new ClassStream();
$strli = $semd->get_list();

$acY = new AcademicYear();
$listAc = $acY->get_list();

$pg = new Programme();
$pgl = $pg->get_programme_list();

$czpg = new Course();
$czLi = $czpg->get_course_list();
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
        if($sem['is_stop_level'] == 1){
        $programmes[$sem['id']] = $sem['name'];  }else{
            continue;
        }
    }
}


$modalTitle = "Add new Course Classes";

?>
<?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/oldcourse_class",'class="stdform stdform2" id="'. $formtype . '-autocourse_class-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>
<input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:""; ?>"
<input type="hidden" name='form-head' value="<?php echo $modalTitle; ?>">


<p>
    <label>Academic Year<small>Academic Year where classes are to be added</small></label>
    <span class="field">
        <?php echo form_dropdown('academic_year',array('--'=>'--') + $years,'--','class="required-data"') ?>
    </span>
</p>


<p>
    <label>Course Programmes <small>Select the course Programmes</small></label>
    <span class="field">
        <?php echo form_dropdown('programmes[]', $programmes,'--','class="required-data" multiple') ?>
    </span>
</p>

<p>
    <label>Courses <small>Course classes are to be added</small></label>
    <span class="field">
        <?php echo form_dropdown('courses[]', $courses,'--','class="required-data" multiple') ?>
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
        <?php echo form_dropdown('ac_streams[]', $streams,'--','class="required-data" multiple') ?>
    </span>
</p>

<?= form_close() ?>


<?php
$actButton = '<button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#oldcourse_class-list-contents" target-modal="#add-item-data" target-form="#'.  $formtype . '-oldcourse_class-data">Generates Classes</button>';

?>

<script>
    jQuery("#datepicker, #datepicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });
    updateModaltitle(1,'<?php echo addslashes($modalTitle); ?>','<?php echo addslashes($actButton); ?>') ;
</script>
