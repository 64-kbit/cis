<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$getqr = $this->input->get();
$applicantinfo = new SASAdmin();
$strms = new ClassStream();
$sponsors = new StudentSponsor();
$sponsorsdata = $sponsors->get_list();
$courses = $applicantinfo->get_courses();
$strlist = $strms->get_list();
$data = $applicantinfo->get_allapplicants(1,1,$getqr['fid'],$getqr['fid'],'all',0);


$data = $data[0];

$classtreams['--'] = '--';
$sponsolist['--'] = '--';;
if($sponsorsdata['count'] > 0){
    foreach($sponsorsdata['list'] as $sp){
       // var_dump($sp);
        $sponsolist[$sp->id] = $sp->code_name . "(". $sp->name .")";
    }
}

$courseslist = array();
foreach($courses as $cz){
    $courseslist[$cz->code] = $cz->name;
}
// var_dump($strlist['list']);
foreach($strlist['list'] as $id => $st){

    $classtreams[$st->id] = $st->name . "(". $st->code .")";
    //var_dump($st);
}


$modalTitle = "Admit <span class='badge'>".  strtoupper($data['lname']) .", " . $data['fname'] . " " . $data['mname'] . "</span> To selected Course"   ;

?>


<?php echo form_open(base_url().user_profile($userdata['profile']) ."/admit_student?type=applicant_info",'class="closedform stdform stdform2" id="add-applicant_info-data"',array('token'=>$currenttoken));     ?>

<p>
    <label>Selected Mode <small>Students selected mode of entry</small></label>
    <span class="field  text-info" id="data-student_entrymode">
        <span class="badge badge-<?= $data['sel_entry']?'warning':'success' ?>"><?=  strtoupper(entry_mode($data['sel_entry'],false)) ?>  </span>
        <small> <?= $data['preffered_session'] ?> - Session</small>
    </span>
</p>


<p>
    <label>Student ID<small>Form IV Index number</small></label>
    <span class="field  text-info" id="data-student_id">
         <?=   $data['f_id'] . "&nbsp;(<small style='color:#333'>". $data['app_id']. "</small>)" ?>
    </span>
</p>


<p>
    <label>Student name<small>Last name, First name Middle name</small></label>
    <span class="field  text-info" id="data-student_name">
         <?=  strtoupper($data['lname']) .", " . $data['fname'] . " " . $data['mname'] . " "   ?>
    </span>
</p>


<p>
    <label>Selected Course </label>
    <span class="field text-info" id="data-student_course-cont">
        <?=  form_dropdown('selected_course',$courseslist,$data['selected_code'],'id="data-student_course" style="width:400px" class="chosen-select required-data input-xlarge"'); ?>
    </span>
</p>

<p>
    <label>Fee Sponsor<small>Set student Fee Sponsor</small></label>
    <span class="field">
       <?= form_dropdown('student_sponsor',$sponsolist,'--','style="width:400px" class="chosen-select required-data"') ?>
    </span>
</p>

<p>
    <label>Registration No <small>Specify Student Registration Number</small></label>
    <span class="field">
        <?= form_input('registration_id','','class="required-data" ') ?>
    </span>
</p>

<div class="par">
    <label>
        Has NHIF<small>Specify student has health insurance<br></small>
    </label>

    <div class="field" >
        <label class="inline no-padding no-margins"> <input type="radio" class="hasnhf required-data" value="true" name="has_nhif">YES  </label>
        <label class="inline no-padding no-margins">  <input type="radio" class="hasnhf required-data"  value="false" name="has_nhif">NO     </label>

    </div>
</div>
  <!--
<p>
    <label>Class Stream<small>Set student Class stream</small></label>
    <span class="field">
       <?= form_dropdown('student_session', $classtreams,'--','class="required-data"') ?>
    </span>
</p>
     -->

<div style="display: none" id="data-student_keys">
    <input type="hidden" id="student_index"  name="student_index" value="<?= $getqr['fid'] ?>" />
    <input type="hidden" id="student_appid" name="student_appid" value="<?= $getqr['appid'] ?>"  />

</div>
<?php
echo form_close();
$actionBtn ='<button type="button" class="btn btn-warning " id="applicant_info-data-btn-prev" target-div="#applicant_info-list-contents" skip="5"  target-modal="#add-item-data" next-item="'.$getqr['nextitem'].'" target-form="#add-applicant_info-data"><i class="glyphicon glyphicon-circle-arrow-left"></i>&nbsp;&nbsp;Previous</button>&nbsp;<button type="button" class="btn btn-primary " id="applicant_info-data-btn" target-div="#applicant_info-list-contents" skip="0"  target-modal="#add-item-data" next-item="'.$getqr['nextitem'].'" target-form="#add-applicant_info-data"><i class="icon-save"></i>&nbsp;&nbsp;Save and Next</button>&nbsp;<button type="button" class="btn btn-warning  " id="applicant_info-data-btn-skip" target-div="#applicant_info-list-contents" skip="1"  target-modal="#add-item-data" next-item="'.$getqr['nextitem'].'" target-form="#add-applicant_info-data"><i class="glyphicon glyphicon-circle-arrow-right"></i>&nbsp;&nbsp;Skip</button>';

?>
   <div class="scripts">
<script>
    updateModaltitle(1,'<?= addslashes($modalTitle) ?>','<?= addslashes($actionBtn) ?>') ;
    //  var acbtn = jQuery("#applicant_info-data-btn,#applicant_info-data-btn-skip")[0];
    // console.log(acbtn);
    //console.log('<?= $actionBtn ?>')
    jQuery('#applicant_info-data-btn,#applicant_info-data-btn-skip,#applicant_info-data-btn-prev').click(function(){
        //  alert('adsfs')
        //console.log(this)
        var targetform = jQuery(jQuery(this).attr('target-form'))
        var currow = jQuery(jQuery(jQuery(this).attr('next-item')));
        if(currow[0] != undefined){
            var prevrow = currow[0].previousSibling;
            var nextrow = currow[0].nextSibling;
            var course = ((jQuery(nextrow).children('td:nth-child(9)')).children('small')).text().trim();
            if(course == undefined){
                course = ((jQuery(nextrow).children('td:nth-child(9)')).children('small')).text().trim()
            }
            var $stid = jQuery(jQuery(nextrow).children('td:first-child')).find("input[type='checkbox']").val();
            var $entrymode = jQuery(jQuery(nextrow).children('td:nth-child(8)')).html();
            var $entrycode = jQuery(jQuery(nextrow).children('td:nth-child(8)')).find(".badge").attr('data-entrymode')
            //  console.log(jQuery(jQuery(nextrow).children('td:first-child')).find("input[type='checkbox']"))
            var $appid = jQuery(jQuery(jQuery(nextrow).children('td:nth-child(3)')).children("span")).children('small').text();

            var data = {
                st_id:$stid ,
                st_appid:$appid ,
                st_name:  (jQuery(nextrow).children('td:nth-child(5)')).text(),
                st_course: course,
                st_entrymode : $entrymode,
                st_entrycode : $entrycode
            }



            if(jQuery(nextrow).length > 0){

                if(jQuery(this).attr('skip') == '0'){
                    $status = send_admission_info(targetform.serialize(),currow,'applicants',jQuery(targetform).attr('action'),targetform)
                }else{
                    $status = 'skip';
                }
                if($status){
                    // console.log(targetform.serialize())
                    jQuery("#data-student_id").html(data.st_id + "&nbsp;(<small style='color:#333'>" + data.st_appid + "</small>)");
                    jQuery("#data-student_name").html(data.st_name );
                    jQuery("#data-student_course").val(data.st_course);
                    jQuery("#data-student_entrymode").html(data.st_entrymode);
                    jQuery("#add-item-data-label").html('Admit ' + data.st_name + " To Selected Course" );
                    jQuery('#student_index').val(data.st_id);
                    jQuery('#student_appid').val(data.st_appid) ;
                    jQuery("#applicant_info-data-btn-prev").attr('next-item','#' + jQuery(prevrow).attr('id'))
                    if(jQuery(this).attr('skip') == '5'){
                        jQuery('#applicant_info-data-btn,#applicant_info-data-btn-skip').attr('next-item','#' + jQuery(nextrow).attr('id')) ;
                    }else{
                        jQuery('#applicant_info-data-btn,#applicant_info-data-btn-skip').attr('next-item','#' + jQuery(nextrow).attr('id')) ;
                    }

                    jQuery('input[type=radio]').each(function(el,d){
                        d.checked = false;
                    });

                    jQuery('input[name="registration_id"]').val("")
                    // jQuery(currow).remove();
                }else{
                    //jQuery("#add-item-data").modal("hide");
                }
            }else{
                jQuery("#add-item-data").modal("hide");

            }

        }
    })
    jQuery(".chosen-select").chosen();
</script>


   </div>
