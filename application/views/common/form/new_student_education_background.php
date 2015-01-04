<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
  <?php
  $modalTitle ="Edit #ed_type# Education Background Information";
  $background = new StudentEdBackground();
  $edlevel = new SASEdLevel();
  $levels = $edlevel->get_levels(true);
  $edbg = $background->get_background($fkeys['stid'],$fkeys['cattype']);
  $commonsubject = array();
  if($edbg['list']){
      $input_data = $edbg['list'][$fkeys['cattype']];
      $places = new PlaceLocation($input_data['location_id']);
      $commonsubject = isset($input_data['subjects'])?json_decode($input_data['subjects']):array();
     // var_dump($commonsubject);

  }else{
      $places = false;
  }
  $catid = 0;

  ?>
<?php echo form_open(base_url() ."ajax_load/update_student_education", 'class="stdform stdform2" id="new-personal_details-data"', array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));  ?>
<p>
    <label>Awarded Certificate<small>Select Awarded certificate</small></label>
    <span class="field">
               <?= form_dropdown('certificate_award',array('--'=>"Click to Select Certificate") + generate_cert_awards() + (isset($levels['list'])?$levels['list']:array()),isset($input_data['certificate_award'])?$input_data['certificate_award']:"","data-placeholder='Click to select award certificate' class='input-xxlarge chosen-select' ")  ?>

</span>                </p>
    <?php
        switch($fkeys['category']) {
            case 'basic':
                $catid = 1;
                $modalTitle =  str_replace("#ed_type#"," Primary/Basic ",$modalTitle);
    ?>        <p>
                <label>Name of School<small>Specify your Birth Date</small></label>
    <span class="field">
        <?= form_input('name',isset($input_data['name'])?$input_data['name']:"","placeholder='Name of School' id='' class='required-data'") ?>
    </span>
            </p>
                <p>
                    <label>School Location<small>Specify the location where school is found</small></label>
    <span class="field">
        <?= form_dropdown('country',generate_country(false,1),isset($input_data['country'])?$input_data['country']:'tanzania', "data-placeholder ='Click to select counrty' class='input-xlarge required-data chosen-select'") ?> <br> Region
        <?= form_input('location_id',isset($input_data['location_id'])?$places->get_place($input_data['location_id'],false,true):"","placeholder='Date of Birth' id='' class='required-data'") ?>
    </span>
                </p>
                <p>
                    <label>Year of Completion<small>Specify month and year of completing</small></label>
    <span class="field">
        <?= form_input('year_completed',isset($input_data['year_completed'])?$input_data['year_completed']:"","placeholder='month and year of completion' id='datepicker' class='required-data'") ?>
    </span>
                </p>
                <?php
                break;
            case "olevel":
                $modalTitle =  str_replace("#ed_type#"," Secondary(O-Level) ",$modalTitle);

                ?>
                <p>
                    <label>Index Number<small>Specify your last exam index(center/index/year)</small></label>
    <span class="field">
        <?= form_input('index_id',isset($input_data['index_id'])?$input_data['index_id']:"","placeholder='S|PXXXX/XXXX/XXXX' id='' class='required-data'") ?>
    </span>
                </p>
                <p>
                    <label>Subjects Taken<small>Select Your Subjects from list<br>Type to search the subject</small></label>
    <span class="field">
        <?= form_dropdown("subjects[]",generate_common_subjects(),$commonsubject,"multiple class='chosen-select required-data input-xxlarge' data-placeholder='Click to select your subject(s)'"); ?>    </span>
                </p>
                <p>
                    <label>Name of School<small>Specify your Birth Date</small></label>
    <span class="field">
        <?= form_input('name',isset($input_data['name'])?$input_data['name']:"","placeholder='Name of School' id='' class=''") ?>
    </span>
                </p>
                <p>
                    <label>School Location<small>Specify the location where is school is found</small></label>
    <span class="field">
         <?= form_dropdown('country',generate_country(false,1),isset($input_data['country'])?$input_data['country']:'Tanzania', "data-placeholder ='Click to select Country' class='input-xlarge required-data chosen-select'") ?><br>
        <?= form_input('location_id',isset($input_data['location_id'])?$places->get_place($input_data['location_id'],false,true):"","placeholder='Region/District' id='' class=''") ?>
    </span>
                </p>
                <p>
                    <label>Year of Completion<small>Specify month and year of completing</small></label>
    <span class="field">
        <?= form_input('year_completed',isset($input_data['year_completed'])?$input_data['year_completed']:"","placeholder='month and year of completion' id='datepicker' class=''") ?>
    </span>
                </p>

                <?php
                break;
            case "alevel":
                $modalTitle =  str_replace("#ed_type#"," Secondary(A-Level)/High School ",$modalTitle);
                ?>
                <p>
                    <label>Index Number(Exam Number)<small>Specify your last exam index(center/index/year)</small></label>
    <span class="field">
        <?= form_input('index_id',isset($input_data['index_id'])?$input_data['index_id']:"","placeholder='S|PXXXX/XXXX/XXXX' id='ex_index' class='required-data'") ?>
    </span>
                </p>
                <p>
                    <label>Subjects Taken<small>Select Your Subjects from list<br>Type to search the subject</small></label>
    <span class="field">
        <?= form_dropdown("subjects[]",generate_common_subjects(),isset($commonsubjects)?$commonsubject:"--","multiple class='chosen-select required-data input-xxlarge' data-placeholder='Click to select your subject(s)'"); ?>    </span>
                </p>
                <p>
                    <label>Name of School<small>Specify your Birth Date</small></label>
    <span class="field">
        <?= form_input('name',isset($input_data['name'])?$input_data['name']:"","placeholder='Name of School' id='' class=' '") ?>
    </span>
                </p>
                <p>
                    <label>School Location<small>Specify the location where is school is found</small></label>
    <span class="field">
         <?= form_dropdown('country',generate_country(false,1),isset($input_data['country'])?$input_data['country']:'Tanzania', "data-placeholder ='Click to select Country' class='input-xlarge required-data chosen-select'") ?><br>
        <?= form_input('location_id',isset($input_data['location_id'])?$places->get_place($input_data['location_id'],false,true):"","placeholder='Region/District' id='' class=' '") ?>
    </span>
                </p>
                <p>
                    <label>Year of Completion<small>Specify month and year of completing</small></label>
    <span class="field">
        <?= form_input('year_completed',isset($input_data['year_completed'])?$input_data['year_completed']:"","placeholder='month and year of completion' id='datepicker' class=' '") ?>
    </span>
                </p>
                <?php
                break;
            case "other":
                $modalTitle =  str_replace("#ed_type#"," Other Education(s) Background ",$modalTitle);
                ?>
                <p>
                    <label>Reference ID<small>Registration Number/ID</small></label>
    <span class="field">
        <?= form_input('index_id',isset($input_data['index_id'])?$input_data['index_id']:"","placeholder='Registration Number' id='' class='required-data'") ?>
    </span>
                </p>
                <p>
                    <label>Name of School<small>Institute/School/College/University</small></label>
    <span class="field">
        <?= form_input('name',isset($input_data['name'])?$input_data['name']:"","placeholder='Name of college/college/University' id='' class='required-data'") ?>
    </span>
                </p>
                <p>
                    <label>Location<small>Specify the location where is school is found</small></label>
    <span class="field">
         <?= form_dropdown('country',generate_country(false,1),isset($input_data['country'])?$input_data['country']:'Tanzania', "data-placeholder ='Click to select Country' class='input-xlarge required-data chosen-select'") ?><br>
        <?= form_input('location_id',isset($input_data['location_id'])?$places->get_place($input_data['location_id'],false,true):"","placeholder='Region/District' id='' class='required-data'") ?>
    </span>
                </p>
                <p>
                    <label>Year of Completion<small>Specify month and year of completing</small></label>
    <span class="field">
        <?= form_input('year_completed',isset($input_data['year_completed'])?$input_data['year_completed']:"","placeholder='month and year of completion' id='datepicker' class='required-data'") ?>
    </span>
                </p>
                <p>
                    <label>Course Taken<small>Select the Course you were taking</small></label>
    <span class="field">
               <?= form_input('course',isset($input_data['course'])?$input_data['course']:"","placeholder='Course' id='' class='required-data'") ?>

</span>                </p>


<?php   break;
            default: ?>
                This section is not defined yet!!
  <?php      } ?>


<input type="hidden" name="place[lat]" value="<?= $places?$places->lat:0 ?>" />
<input type="hidden" name="place[long]" value="<?= $places?$places->long:0 ?>" />

<?php echo form_close() ;


$actButton = '<button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#user-list-contents" target-modal="#edit-item-data" target-form="#new-personal_details-data">Update changes</button>';

?>

<div class="par">
    <div class="controls" style="margin-top: 10px;">
        <div ><span class="btn btn-primary fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Upload Attachment</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload-cont" name="files[]" accept="png|pdf|jpg|jpeg|gif"  type="file">

    </span>
            <div style="display: inline-block;width: 60%">
                <div id="progress" class="progress">
                    <div class="progress-bar progress-bar-success"></div>
                </div>

            </div>
        </div>

        <div id="files" class="files text-info"></div>

    </div>
</div>

<div class="scripts">
    <script src="<?= plugins_folder() ?>jquery.maskedinput.min.js"></script>

    <script src="<?= plugins_folder() ?>uploader/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin   -->
    <script src="<?= plugins_folder() ?>uploader/jquery.fileupload-process.js"></script>
    <!-- The File Upload validation plugin   -->
    <script src="<?= plugins_folder() ?>uploader/jquery.fileupload-validate.js"></script>


    <script src="<?= plugins_folder() ?>uploader/jquery.iframe-transport.js"></script>
    <script src="<?= plugins_folder() ?>uploader/jquery.iframe-transport.js"></script>

    <script>

        updateModaltitle(2,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;


        jQuery("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
        jQuery('.chosen-select').chosen();
        jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});

        jQuery('#tabs').tabs({collapsible:false});

        jQuery("input[name=year_completed]").mask("9999-99-99");

        jQuery(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = '<?php echo base_url() . "upload_file/user_certificate?catid={$fkeys['cattype']}&category=".$fkeys['category'] . "&itemid=".$background->id . "&stid=".$fkeys['stid']  ?>';
            jQuery('#fileupload-cont').fileupload({
                url: url,
                acceptFileTypes: /(\.|\/)(jpg|png|jpeg|gif|pdf)$/i,
                dataType: 'json', disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator.userAgent),
                done: function (e, data) {
                    jQuery(".fileinput-button").find("span").html("Select New File");
                    jQuery("#files").html("<span class='text-success'><i class='glyphicon glyphicon-ok'></i>&nbsp;&nbsp; File "+data.files[0].name+" Saved Successfully</div>")
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    jQuery('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                    )
                    jQuery(".fileinput-button").find("span").html("Progress" + progress + " %");
                }
            }).on('fileuploadadd', function (e, data) {

                jQuery('#progress .progress-bar').css(
                    'width',
                    0 + '%'
                );
                jQuery("#files").html("")
                data.context = jQuery('<div/>').appendTo('#files');
                jQuery.each(data.files, function (index, file) {
                    console.log(index);
                    if(data.files.error == true){
                        var node = jQuery('<span/>').addClass('text-error').text("Invalid File Added!!");
                    }else{
                        var node = jQuery('<span/>').addClass('text-info').append("<i id='icon-spinner' class='fa fa-spin fa-spinner'></i>&nbsp;&nbsp;").append(file.name);
                    }

                    node.appendTo(data.context);
                });
            }).on('fileuploadfail', function (e, data) {
                jQuery.each(data.files, function (index, file) {
                    var error = jQuery('<span class="alert-danger text-danger"/>').text('File upload failed.');
                    jQuery.growl.error({title:'File Upload failed',message:error})
                    jQuery(data.context.children()[index])
                        .append('&nbsp;&nbsp;')
                        .append(error);
                });
            }).prop('disabled', !jQuery.support.fileInput)
                .parent().addClass(jQuery.support.fileInput ? undefined : 'disabled');
        });

    </script>

</div>

