<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: 3Wave Tech
 * Date: 11/6/07
 * Time: 11:33 AM
 */

$newst=new StudentInfo();
$newst->where('registration_number',$fkeys['itemid'])->get();
 $modalTitle = "Update Personal Background Information";
$studentinfo = new StudentDetails($newst->details_id);
$fkeys['stdid'] = $studentinfo->id;
$fkeys['details_id'] = $studentinfo->id;

$input_data = (array) $studentinfo->stored;
//var_dump($input_data);
//var_dump($newst->stored);//die();
$places = new PlaceLocation();

$reginfo = (array) $newst->stored;
?>

<?php echo form_open(base_url() ."ajax_load/update_student_info", 'class="stdform stdform2" id="new-personal_details-data"', array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));  ?>
<input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>"/>
<div class="tabbedwidget tab-primary " id="tabs" style="margin:-10px; height: 460px">
    <ul >
        <li class="active"><a href="#tab1"  ><h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Basic</h4></a></li>
        <li class="active"><a href="#tab2"  ><h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Affiliation</h4></a></li>
        <li><a href="#tab3" ><h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Contacts</h4></a></li>
        <li><a href="#tab4" ><h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Next of Kin</h4></a></li>
        <li><a href="#tab5" ><h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Parent/Guardian</h4></a></li>
        <li><a href="#tab6" ><h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Bank Account</h4></a></li>
    </ul>


    <div id="tab1">
        <p>
            <label>First Name</label>
    <span class="field">
                        <span class="text-info"><?= isset($input_data['first_name'])?$input_data['first_name']:"" ?></span>
    </span>
        </p>
        <p >
            <label>Middle Name</label>
            <span class="field">
             <span class="text-info"><?= isset($input_data['middle_name'])?$input_data['middle_name']:"" ?></span>
               <br>
            </span>
        </p>
        <p>
            <label>Surname</label>
            <span class="field">
                <span class="text-info"><?= isset($input_data['last_name'])?$input_data['last_name']:"" ?></span>
                <?php// echo form_input('last_name', isset($input_data['last_name'])?$input_data['last_name']:"", "placeholder='Last Name' class='required-data'") ?>&nbsp;&nbsp;
            </span>
        </p>

        <p>
            <label>Gender</label>
    <span class="field">
        <span class="text-info">
            <?= strtoupper($input_data['gender'])=="F"?"Female":"Male" ?>
        </span>
    </span>
        </p>

        <p>
            <label>Health Insurance<small>Select provider from list</small></label>
    <span class="field">
            <select style="z-index: 20000" class="input-xlarge required-data chosen-select" name="basic[health]">
                <option value="--">Click to select Provider</option>
                <option value="1"  <?= $reginfo['has_nhif']==1?"selected":"" ?>>NHIF Provided from this School</option>
                <option value="2" <?= $reginfo['has_nhif']==2?"selected":"" ?>>NHIF or Other Providers not from here</option>
                <option value="0" <?= $reginfo['has_nhif']==0?"selected":"" ?>>Don't Have Insurance</option>
            </select>
    </span>
        </p>

        <p>
            <label>Disabilities<small>Specify if any disabilities</small></label>
            <span class="field">
                  <?= form_dropdown('basic[disability]',generate_health_issues(),isset($input_data['disabilities'])?$input_data['disabilities']:"", "data-placeholder ='Click to select Country of Birth' class='input-xlarge required-data chosen-select'") ?>
            </span>
        </p>


        <p>
            <label>Date of Birth<small>Specify your Birth Date</small></label>
    <span class="field">
        <?php //var_dump($input_data['dob']) ?>
        <?= form_input('basic[dob]',isset($input_data['dob'])?$input_data['dob']:"","placeholder='Date of Birth' id='datepicker' mask='9999-99-99'  class='masked required-data'") ?>
    </span>
        </p>

    </div>

    <div id="tab2">
        <p>
            <label>Nationality<small>Specify your nationality</small></label>
    <span class="field">
                <?= form_dropdown('afill[nationality]',generate_country(false,1),isset($input_data['nationality'])?$input_data['nationality']:'Tanzania', "data-placeholder ='Click to select your Nationality' class='input-xlarge required-data chosen-select'") ?>

    </span>
        </p>
        <p>
            <label>Country of Birth<small>Specify your country of Birth</small></label>
    <span class="field">
        <?= form_dropdown('afill[country_of_birth]',generate_country(false,1),isset($input_data['birth_country'])?$input_data['birth_country']:'Tanzania', "data-placeholder ='Click to select Country of Birth' class='input-xlarge required-data chosen-select'") ?>
    </span>
        </p>
        <p>
            <label>Religion<small>Specify your religion</small></label>
    <span class="field">
        <?=  form_dropdown('afill[religion]', array("--"=>"--")+generate_religion(),isset($input_data['religion'])?$input_data['religion']:"","data-placeholder='Click to select your religion' class='input-xlarge required-data chosen-select'") ?>
    </span>
        </p>
        <p>
            <label>Marital Status<small>Specify your marital status</small></label>
    <span class="field">
        <?= form_dropdown('afill[marital_status]', array("--"=>"--")+generate_marital_status(),isset($input_data['marital_status'])?$input_data['marital_status']:"", "data-placeholder='Click to select your marital status' class='input-xlarge  required-data chosen-select'") ?>
    </span>
        </p>
        <p>
            <label>Dependants<small>Specify number of Dependants</small></label>
            <span class="field">
                        <?= form_input('afill[depend]', isset($input_data['dependants'])?$input_data['dependants']:0, " mask='9' placeholder='dependants' class='masked required-data'")?>

            </span>
        </p>


        <p>
            <label>Place of Birth<small>Hospital Location your were born</small></label>
    <span class="field">
        <?= form_input('afill[place_of_birth]',$input_data['place_of_birth'], " placeholder='Place of Birth'  class=' input-xxlarge required-data' target-input='.birth_loc' ")?>
    </span>
        </p>
    </div>

    <div id="tab3">
        <p>
            <label>Mobile Number(s)<small>Specify your mobile Number(s)</small></label>
    <span class="field">
        <?= form_input('afill[mobile_number]', isset($input_data['mobile_number'])?$input_data['mobile_number']:"", "placeholder='Mobile Numbers separate by comma(,)' class='input-xlarge required-data masked' mask='+(999)-999-999999'") ?>
    </span>
        </p>

        <p>
            <label>Email Address<small>Specify your email address</small></label>
    <span class="field">
        <?php echo form_input('afill[email_address]', isset($input_data['email_address'])?$input_data['email_address']:"", "class='input-xlarge' placeholder='Email Address'") ?>
    </span>
        </p>
        <p>
            <label>Permanent Address<small>If there are less digits, start with 000</small></label>
    <span class="field">
        <?php echo form_input('afill[permanent_address]', isset($input_data['permanent_address'])?$input_data['permanent_address']:"", "class=' input-xlarge masked' mask='P.O Box 999999' placeholder='P.O Box ... region'") ?>
    </span>
        </p>
        <p>
            <label>Contact Address<small>Specify your Contact Address</small></label>
    <span class="field">
         <?php echo form_input('afill[contact_address]', isset($input_data['contact_address'])?$input_data['contact_address']:"", "class='input-xlarge required-data masked' mask='P.O Box 999999' placeholder='P.O Box ... region'") ?>
    </span>
        </p>

        <p>
            <label>Current Home Place<small>Separate Region,District,Ward .. <br>by comma (,)</small></label>
    <span class="field">
         <?php $hpc = $places->get_place(isset($input_data['current_loc'])?$input_data['current_loc']:null,false);?>
          <input type="hidden" name="loc[homec][long]" value="<?= $hpc->long ?>" class="homec_loc-long" />
                <input type="hidden" name="loc[homec][lat]" value="<?= $hpc->lat ?>" class="homec_loc-lat" />

        <?php echo form_input('afill[current_loc]', $hpc->name, "class=' input-xxlarge location_picker ' placeholder='Region, district, ward, village, street' target-input='.homec_loc'") ?>
    </span>
        </p>
        <p>
            <label>Permanent Home Place<small>Separate Region,District,Ward .. <br>by comma(,) </small></label>
    <span class="field">
         <?php $ppc = $places->get_place(isset($input_data['permanent_loc'])?$input_data['permanent_loc']:null,false) ?>
          <input type="hidden" name="loc[homep][long]" value="<?= $ppc->name ?>" class="homep_loc-long" />
                <input type="hidden" name="loc[homep][lat]" value="<?= $ppc->lat ?>" class="homep_loc-lat" />

        <?php echo form_input('afill[permanent_loc]', $ppc->name , "class='input-xxlarge location_picker required-data' placeholder='Region,district,ward,village,street' target-input='.homep_loc'") ?>
    </span>
        </p>
    </div>

    <div id="tab4">
        <p>
            <label>Kin Full Name<small>Full name of your parent/guardian</small></label>
    <span class="field">
        <?= form_input('kin[kin_name]', isset($input_data['kin_name'])?$input_data['kin_name']:"", "placeholder='First name, (middle name) , last name' class='required-data'") ?>
    </span>
        </p>
        <p>
            <label>Mobile Phone<small>Kin contact Phone</small></label>
    <span class="field">
        <?php ///var_dump($input_data); ?>
        <?= form_input('kin[kin_phone]', isset($input_data['kin_phone'])?$input_data['kin_phone']:"", "placeholder='Mobile Number' mask='+(999)-999-999999' class='masked required-data'") ?>
    </span>
        </p>

        <p>
            <label>Email Address</label>
    <span class="field">
        <?php echo form_input('kin[kin_email]', isset($input_data['kin_email'])?$input_data['kin_email']:"", "class=''  placeholder='Email Address'") ?>
    </span>
        </p>

        <p>
            <label> Contact Address</label>
    <span class="field">
        <?php echo form_input('kin[kin_address]', isset($input_data['kin_address'])?$input_data['kin_address']:"", "class='masked' mask='P.O Box 9?99999' placeholder='P.O Box .... Region'") ?>
    </span>
        </p>
        <p>
            <label> Physical Location <small>Separate by comma (,)</small></label>
    <span class="field">
         <?php $kpc = $places->get_place(isset($input_data['kin_location'])?$input_data['kin_location']:null,false) ?>
          <input type="hidden" name="loc[kin][long]" value="<?= $kpc->long ?>" class="kin_loc-long" />
                <input type="hidden" name="loc[kin][lat]" value="<?= $kpc->lat ?>" class="kin_loc-lat" />

        <?php echo form_input('kin[kin_location]', $kpc->name , "class='location_picker' placeholder='Region,district,ward,village,street' target-input='.kin_loc'") ?>
    </span>
        </p>

    </div>

    <div id="tab5">
        <p>
            <label>Full Name<small>Full name of your parent/guardian</small></label>
    <span class="field">
        <?= form_input('parent[par_name]', isset($input_data['par_name'])?$input_data['par_name']:"", "placeholder='First , Middle/Last names' class='required-data'") ?>
    </span>
        </p>
        <p>
            <label>Mobile Phone<small>Parent/Guardian contact Phone</small></label>
    <span class="field">

        <?= form_input('parent[par_phone]', isset($input_data['par_phone'])?$input_data['par_phone']:"", "placeholder='Mobile Number' mask='+(999)-999-999999'  class='masked required-data'") ?>
    </span>
        </p>

        <p>
            <label> Email Address</label>
    <span class="field">
        <?php echo form_input('parent[par_email]', isset($input_data['par_email'])?$input_data['par_email']:"", "class='' placeholder='Email Address'") ?>
    </span>
        </p>

        <p>
            <label> Contact Address</label>
    <span class="field">
        <?php echo form_input('parent[par_address]', isset($input_data['par_address'])?$input_data['par_address']:"", "class='masked' mask='P.O Box 9?99999' placeholder='P.O box ... region '") ?>

    </span>
        </p>
        <p>
            <label> Physical Location<small>Separate by comma (,)</small></label>
    <span class="field">
         <?php $rpc = $places->get_place(isset($input_data['par_location'])?$input_data['par_location']:null,false) ?>
        <input type="hidden" name="loc[par][long]" value="<?= $rpc->long ?>" class="par_loc-long" />
                <input type="hidden" name="loc[par][lat]" value="<?= $rpc->lat ?>" class="par_loc-lat" />

        <?php echo form_input('parent[par_location]',$rpc->name, "class='location_picker' placeholder='Region,district,ward,village,street' target-input='.par_loc'") ?>
    </span>
        </p>



    </div>

    <div id="tab6">
        <p>
            <label>Bank Name<small>Select name of the Bank</small></label>
    <span class="field">
        <?=  form_dropdown('bank_name', array("--"=>"--",'none'=>'Don\'t Have')+generate_bank_list(),isset( $reginfo['bank_name'])?$reginfo['bank_name']:"","data-placeholder='Click to select your religion' class='input-xlarge required-data chosen-select'") ?>
       <label class="inline" style="display: none"> &nbsp; OR &nbsp;
        <?php echo form_input('bank_name_other', isset($reginfo['contact_address'])?$reginfo['contact_address']:"", "class='input-xlarge '  placeholder='Specify Bank Name here'") ?>  </label>
    </span>
        </p>
        <p>
            <label>Bank Branch<small>Branch where your account was Opened</small></label>
    <span class="field">
        <?php echo form_input('bank_branch', isset($reginfo['bank_branch'])?$reginfo['bank_branch']:"", "class='input-xlarge ' placeholder='Branch name'") ?>
    </span>
        </p>

        <p>
            <label>Account Number<small>Specify your Bank account Number</small></label>
    <span class="field">
        <?php echo form_input('bank_account', isset($reginfo['bank_account_no'])?$reginfo['bank_account_no']:"", "class='input-xlarge required-data' placeholder='Account Number'") ?>
    </span>
        </p>
        </div>
</div>


<div id="locpicker-cont" class="map" style="width:500px;height:400px;position:absolute;display:none;background: #eee;border: 1px solid #ddd;border-radius: 4px;box-shadow: 0px 0px 6px 0px #555">
    <div class="closelocpic" style="position: absolute;right: 0px;z-index: 39; top: 0px;width: 20px;cursor:pointer;height: 20px;font-size:16px;opacity:0.7"><i class="glyphicon glyphicon-remove-circle"></i> </div>
    <div id="locpicker" style="width:500px;height: 400px">

    </div>

</div>
<?php  echo form_close();

    $actButton = '<button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#user-list-contents" target-modal="#edit-item-data" target-form="#new-personal_details-data">Update changes</button>';

 ?>
<br>
<div class="par">
    <div class="controls" style="margin-top: 10px;">
        <div ><span class="btn btn-primary fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Upload Birth Certificate</span>
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

    <script src="<?= plugins_folder() ?>locationpicker.jquery.js"></script>
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

        jQuery(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = '<?php echo base_url() . "upload_file/user_certificate?category=birth_cert&stid=" . $newst->id . "&regid=".$newst->registration_number ?>';
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

        updateModaltitle(2,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;
        jQuery("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
        jQuery(".masked").each(function(){

                var maski = jQuery(this).attr('mask');
                jQuery(this).mask(maski)

        });
        jQuery('.chosen-select').chosen();
        jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});

        jQuery('select[name=bank_name]').change(function(){
            var input = jQuery("input[name=bank_account]");
            input.unmask();
            switch(jQuery(this).val()){
                case 'crdb':
                    input.mask("9*99999999999")
                    break;
                case 'nmb':
                    input.mask("999999999999")
                    break;
                case 'nbc':
                    input.mask("9999999999999")
                    break;
                default:
                    input.mask("9999999999999999999")
                    break;
            }
            if(jQuery(this).val() == 'other'){
                jQuery(this).siblings('label').show();
            }else{
                jQuery(this).siblings('label').hide();
            }
        });

        jQuery('#tabs').tabs({collapsible:false});
           jQuery(".location_picker").focusin(function(e){
               var left = 54 + "%"
               var top = 4 + "%"
               var targetin = jQuery(this).attr('target-input');
               var $input = jQuery(this).attr('name');

               jQuery("#locpicker-cont").css({'top':top,'left':left}).show();
              jQuery('#locpicker').locationpicker({
                   location: {latitude:-6.819 , longitude:39.279018},
                   radius: 300,
                  enableAutocomplete: true,
                   inputBinding: {
                       latitudeInput: jQuery(targetin + "-lat"),
                       longitudeInput: jQuery(targetin + "-long"),
                       locationNameInput: jQuery("input[name='" + $input + "']")
                   } ,
                  onchanged: function(currentLocation, radius, isMarkerDropped) {
                     // alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
                      jQuery(targetin + '-lat').val(currentLocation.latitude )
                      jQuery(targetin + '-long').val(currentLocation.longitude )
                  }
              });
           });

        jQuery("#locpicker-cont .closelocpic").click(function(e){
            jQuery('#locpicker-cont').hide();
        });
         /**/


    </script>

</div>
