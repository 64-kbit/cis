<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

$programme = new Programme();
$course = new Course();
$acyear = new AcademicYear();
$modalTitle = "Create a New Module ";

//var_dump($programme->programs_drop_view('programs_id'));
//var_dump($course->drop_view('course_id'));;

//var_dump($structure);

echo form_open(base_url()."admin/ajax_load?mode=ajax&itemtype=update_module",'class="stdform stdform2" id="module-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array())); ?>

<?php
?>
<div role="tabpanel" style="margin: 0px">
    <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 0px;">
        <li role="presentation" class="active"><a href="#msgpanel-1"  aria-controls="profile" role="tab" data-toggle="tab"><span class="fa fa-list"></span>&nbsp;&nbsp; Basic Details</a></li>
        <li role="presentation" class=""><a href="#msgpanel-2"  aria-controls="profile" role="tab" data-toggle="tab"><span class="fa fa-inbox"></span>&nbsp;&nbsp;Module Classes</a></li>
        <li role="presentation" class=""><a href="#msgpanel-3"  aria-controls="profile" role="tab" data-toggle="tab"><span class="fa fa-inbox"></span>&nbsp;&nbsp;Module Teachers</a></li>
        </ul>
    <div class="tab-content">
        <div role='tabpanel' class="tab-pane fade in active messagecontent" id="msgpanel-1">

            <p>
                <label>
                    Module Code
                </label>
        <span class="field">
            <?= form_input("code","","class='required-data input-xlarge'") ?>
        </span>

            </p>

            <p>
                <label>
                    Title
                </label>
        <span class="field">
            <?= form_input("title","","class='required-data input-xxlarge'") ?>
        </span>

            </p>

            <p>
                <label>
                    Programme
                </label>
        <span class="field">
            <?= $programme->programs_drop_view('programs_id',"",'chosen-select input-xlarge',""," data-placeholder='Click to select Programme'") ?>
        </span>

            </p>
            <p>
                <label>
                    Course
                </label>
        <span class="field">
            <?= $course->drop_view('course_id',$userdata['user_info']['id'],"","chosen-select input-xlarge",""," data-placeholder='Click to select Course'") ?>
        </span>
            </p>

            <p>
                <label>
                    Description <small>Module Outline and Descriptions</small>
                </label>
                <span class="field">
                   <?php echo form_textarea('description',"","style='resize:none;width: 99%;height:80px;'") ?>
                </span>
            </p>
            <p>
                <button style="float: right;margin-right: 10%" type="button" class="btn btn-primary  save-control-btn" target-div="#module-list-contents" target-modal="#add-item-data" target-form="#module-data"><i class="fa fa-save"></i>&nbsp;Save</button>
            </p>

            <?= form_close() ?>
        </div>

        <div id='msgpanel-2' role="tabpanel" class="tab-pane fade messagecontent">
            <p>
                <label>Module Name<small>Module code name and title</small></label>
                <span class="field">
                    <select id="module-drop-view" class="chosen-select">
                        <option value="12">
                            Basic Work Processing
                        </option>
                        <option value="2">
                            Computer Repair and Maintanance
                        </option>
                    </select>
                </span>

            </p>
              <p>
                  <label>Academic Year</label>
                  <span class="field">
                        <?= $acyear->drop_view('academic_year_id',"",'chosen-select input-large',""," data-placeholder='Click to select Academic Year'"); ?>
                  <button style="margin-top:-17px" data-toggle="modal" data-target="#edit-item-data" href="<?= base_url() ?>ajax_load/form?name=module_class&token=<?php echo $currenttoken ?>"" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Class</button>
                  </span>

              </p>
            <p>
            <table class="table table-stripped responsive">
                <colgroup>
                    <col class="con0" style="width: 2%">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Class</th>
                    <th>Grading Scheme</th>
                    <th>Grading Points</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody count-indicator = 'module-class-indicator' id="module-class-contents">

                </tbody>
            </table>
            </p>
        </div>

        <div id="msgpanel-3" role="tabpanel" class="tab-pane fade messagecontent">
            <p>
                <label>Academic Year</label>
                  <span class="field">
                        <?= $acyear->drop_view('academic_year_id',"",'chosen-select input-large',""," data-placeholder='Click to select Academic Year'"); ?>
                <button style="margin-top:-17px" data-toggle="modal" data-target="#edit-item-data" href="<?= base_url() ?>ajax_load/form?name=module_teacher&token=<?php echo $currenttoken ?>"" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add Teacher</button>   </span>
            </p>
            <p>
            <table class="table table-stripped responsive">
                <colgroup>
                    <col class="con0" style="width: 2%">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Teacher ID</th>
                    <th>Full Name</th>
                    <th>Assigned Classes</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody count-indicator = 'module-class-indicator' id="module-class-contents">

                </tbody>
            </table>
            </p>
        </div>
    </div>
</div>

<?php
//echo form_close();

?>


<?php

$actButton ='';


?>


<div class="scripts"title>

    <script>
        updateModaltitle(1,'<?= addslashes($modalTitle) ?>','') ;
        jQuery(".chosen-select").chosen();

        jQuery("#save-control-btn").click(function(){
            var target = jQuery(this).attr('target')
        })
    </script>
</div>
