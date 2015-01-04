<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$input_data = isset($input_data)?$input_data['data']:false;
$modalTitle = $input_data?"Edit Programme Information":"Add New Programme ";
$pgpre = new ProgrammePre();
$lst = $pgpre->get_list();
$plist = array();
foreach($lst['list'] as $i => $dt){
    $plist[$dt->id] = $dt->name;
}
$seplist = false;
$curr = "";
if($input_data){

    foreach($pgpre->get_programme_pre($input_data['programs_id']) as $id => $pr){
      $seplist[$pr->pre_level_id] = $pr->pre_level_id;
    $curr .= "<input type=\"hidden\" name='currpre[]' value='{$pr->pre_level_id}'>";

    }


}
?>

<?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/create_programme",'class="stdform stdform2" id="'. $formtype . '-programme-data"',array('token'=>$currenttoken)  + (isset($fkeys)?$fkeys:array()));    echo $curr ?>
<div class="tabbedwidget tab-primary " id="tabs-pop" style="margin:-15px; height: 500px;border:none;">
    <ul >
        <li class="active"><a href="#tab1"  ><h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Basic Info</h4></a></li>
        <li class="active"><a href="#tab2"  ><h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Settings</h4></a></li>
</ul>
    <div id="tab1">

        <p>
            <input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>" />
            <input type="hidden" name='form_head' value="Create/Edit Programme">
            <label>Programme Name <small>Specify the Award Name of the Programme</small></label>
        <span class="field">
            <?php echo form_input('pg_name',isset($input_data['name'])?$input_data['name']:"","class='required-data'") ?>
        </span>
        </p>

        <p>
            <label>Display Name <small>Specify Award name</small></label>
        <span class="field">
            <?php echo form_input('pg_dname',isset($input_data['display_name'])?$input_data['display_name']:"","class='required-data'") ?>
        </span>
        </p>

        <p>
            <label>Short Name<small>Programme short code name</small></label>
        <span class="field">
            <?php echo form_input('pg_code',isset($input_data['code'])?$input_data['code']:"","placeholder='Code Name' class='input-small required-data'") ?>

            <?php echo form_input('pg_code_no',isset($input_data['code_no'])?$input_data['code_no']:"","placeholder='Code No' class='input-small required-data'") ?>
        </span>
        </p>


        <p>
            <label>Campus<small>The Campus must be where Faculty is</small></label>
        <span class="field">
            <?php echo form_dropdown('pg_campus',array('--'=>'--') + campus_list($campus_list['list']),isset($input_data['campus_id'])?$input_data['campus_id']:"","class='required-data chosen-select'") ?>
        </span>
        </p>
        <p>
            <label>NTA-Level<small>NACTE NTA Level</small></label>
        <span class="field">
            <?php echo form_dropdown('pg_nta_level',array("--"=>"--")+ nacte_nta_levels(),isset($input_data['nta_level'])?$input_data['nta_level']:"","class='input-small required-data chosen-select'") ?>
        </span>
        </p>

        <p>
            <label>Level Year<small>Based on Parent programme</small></label>
        <span class="field">
            <?php echo form_dropdown('pg_level_year',array('--'=>'--')+programme_year_list(1),isset($input_data['level_year'])?$input_data['level_year']:"","input-small class='required-data chosen-select'") ?>
        </span>
        </p>
        <!--
<p>
    <label>NTA-Level<small>NACTE NTA Level</small></label>
        <span class="field">
            <?php echo form_input('pg_nta_level',isset($input_data['nta_level'])?$input_data['nta_level']:"","class='input-small required-data'") ?>
        </span>
</p>
     -->

        <p>
            <label>Year Started<small>The Date that course was Started</small></label>
        <span class="field">
            <?php echo form_input('pg_start_year',isset($input_data['year_started'])?$input_data['year_started']:""," id='datepicker-{$formtype}' class='input-small required-data'") ?>
        </span>
        </p>

        <!--
<p>
    <label> Description<small>Shortly Describe about the Course</small></label>
        <span class="field">
             <?php echo form_textarea('pg_description',isset($input_data['description'])?$input_data['description']:"","class='span5 input-xlarge' rows='1' cols='130' style='height:40px !important;resize:none'  ") ?>
        </span>
</p>

    -->



    </div>
    <div id="tab2">

        <p>
            <label>Next Programme<small>Specify The Next Programme</small></label>
        <span class="field " >
            <?php  echo form_dropdown('pg_parent',array('--'=>'--') + programme_list($programme_li['list']),$input_data['parent_program_id'] == null ?0:$input_data['parent_program_id'],"class='required-data input-xxlarge chosen-select'") ?>
            <br>
          <label class="no-margins no-padding">  <?php echo form_radio('pg_is_last',1,isset($input_data['is_stop_level'])?$input_data['is_stop_level']==1:"","class='input-small required-data'") ?> Last/Middle Programme </label>
           <label  class="no-margins no-padding"><?php echo form_radio('pg_is_last',2,isset($input_data['is_stop_level'])?$input_data['is_stop_level']==2:"","class='input-small required-data'") ?> Start Programme     </label>
     </span>
        </p>

        <p>
            <label>Base Programme<small>Award Programme of this course</small></label>
    <span class="field">


    <?php  echo form_dropdown('pg_base',array('--'=>'--') + base_programme_list($programme_li['list']),$input_data['base_program_id'],"class='chosen-select input-xxlarge required-data'") ?>
        </span>
        </p>

        <p>
            <label >Semester Structure<small>This will be set as current semesters</small></label>
    <span class="field">
        <?php
        $semStructure = $semesterStructure->get_list('array');
        //$semStructure['list']
        // var_dump($semStructure['list']);
        echo  form_dropdown('pg_semester_structure',(array('--'=>'--')+$semStructure['list']),isset($input_data['structure_id'])?$input_data['structure_id']:"",'class="required-data chosen-select"');?>
    </span>
        </p>
        <?php if((isset($input_data['base_program_id']) && empty($input_data['base_program_id']) || $input_data['base_program_id'] == 0) || $input_data==false){ ?>
            <p>
                <label>Pre-Requisites<small>Select Required Qualifications <br>for a Person to have to be in this programme</small></label>
              <span class="field">
                     <?=  form_dropdown('pg_pre[]',array('--'=>'--') + $plist,$seplist,"multiple data-placeholder='Click to select' class='required-data chosen-select input-xxlarge'") ?>

              </span>
            </p>
        <?php } ?>


    </div>
</div>

<?php  echo form_close() ?>

    <?php if(isset($input_data) && $input_data){
        $actButton = '<button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#programme-list-contents" target-modal="#edit-item-data" target-form="#'.$formtype.'-programme-data">Update changes</button>';


    }else{
        $actButton ='<button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#programme-list-contents" target-modal="#add-item-data" target-form="#'.$formtype.'-programme-data">Save changes</button>';
    }  ?>

<div class="scripts">
    <script>

        updateModaltitle(<?= $input_data !=false?2:1 ?>,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;
        jQuery("#datepicker-<?= $formtype ?>").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'yy-mm-dd'
                });


        jQuery('.chosen-select').chosen();

        jQuery('#tabs-pop').tabs({collapsible:false});

        jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});


    </script>

</div>


