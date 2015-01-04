<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
  <?php
     $acyear = new AcademicYear($fkeys['itemid']);
//var_dump($acyear);
    $semstr = new SemesterStructure();
$str = $semstr->get_semesters_list();
$eventCat = new CalendarEvent();
$calendar = new Calendar();
$calendar->where(array('event_type'=>1,'academic_year_id'=>$acyear->id))->get();

$modalTitle = "Edit {$acyear->notation} Academic Year Semester Time Table";

 //var_dump($acyear->get_current_ac_semester());
$enddate = strtotime($acyear->start_date) + (strtotime($acyear->end_date) - strtotime($acyear->start_date))/2
?>

        <div id="tabds" style="margin: -15px;height: 500px" class="tabbedwidget tab-primary no-padding">
            <ul>
                <li><a href="#tabd-1" style="text-transform: uppercase;font-size:12px">
                      <h4 style="text-transform: uppercase;font-size:12px">  <i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;Time Table  </h4> </a></li>
                <?php if($userdata['access_level'] == 1 ) { ?> <li><a style="text-transform: uppercase;font-size:12px" href="#tabd-2">
                        <h4 style="text-transform: uppercase;font-size:12px">    <i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Add New Time Table </h4></a></li>
    <?php } ?>
                </ul>

             <div id="tabd-1">
                    <table class="table table-striped">
                        <thead>
                            <th style="width: 2%">#</th><th>Semesters Schedule</th><th>Semesters</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($calendar->all as $id => $cal){
                                    $eventCat->order_by('title','asc')->get();
                                    $ct = $id + 1;
                                    echo "<tr><td class='row-head'>{$ct}</td>
                                               <td><span class='text-info'>{$cal->comments}</span><br>Start Date: <span class='text-success'>". date('d-M-Y',strtotime($cal->start_date)) . "</span>
                                                &nbsp;&nbsp;&nbsp;End Date: <span class='text-success'>". date('d-M-Y',strtotime($cal->end_date)) . "</span>";
                                         if($userdata['access_level'] == 1){
                                         echo "&nbsp;&nbsp;&nbsp;&nbsp;<span data-start='". date("Y-m-d",strtotime($cal->start_date))."' target-form='#change-sem_timetable-data' data-end='". date("Y-m-d",strtotime($cal->end_date))."' style='cursor: pointer' class='edit_dates text-success'><i class='glyphicon glyphicon-edit'></i>&nbsp;Edit</span> ";
                                         }

                                   echo " </td> ";
                                    $semesli = $cal->get_sem_events();
                                    echo "<td><ul>";
                                    foreach($semesli as $id => $sl){
                                         echo "<li>{$sl['name']}</li>";
                                    }
                                    echo "</ul></td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                 <br>
                  <!-- edit time data form ? -->
                 <?php echo form_open(base_url() ."admin/ajax_load/create_sem_timetable?update_form=true",'class="stdform stdform2 " id="change-sem_timetable-data" style="display:none;"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>
                 <input type="hidden" id="itemid_data" name="edit_date" value="" />
                   <p class="animate1 bounceIn">
                       <label>Edit Dates</label>
                      <span class="field">
                        <label class="inline" style="font-weight: normal;color:#777">Start Date&nbsp;&nbsp;<input type="text" name="edit_start_date" id="edit_start_date" value="" class="required-data input-medium"> </label>
            &nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="inline" style="font-weight: normal;color:#777">  End Date&nbsp;&nbsp;<input class="required-data input-medium" value="" type="text" name="edit_end_date" id="edit_end_date">
                        </label>
                          <span target-form="#change-sem_timetable-data" class="btn btn-success inline-save-btn"><i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;&nbsp;Save</span>
                   </span>
                   </p>

                 <?php echo form_close() ?>

             </div>
<?php   if($userdata['access_level'] == 1){ ?>
            <div id="tabd-2">

                <?php echo form_open(base_url() ."admin/ajax_load/create_sem_timetable",'class="stdform stdform2" id="edit-sem_timetable-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>
                <input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>" />
                <p>
                    <label>Event Type <small>Select Semester Event Type<br> as Defined in events section</small></label>
                    <span class="field">
                           <select class="select-chosen required-data input-xlarge" data-placeholder="Click to select an Event category .. !" name="event_cat">
                                <?php
                                $eventCat->order_by('title','asc')->get();
                                    foreach($eventCat->all as $id => $ob){
                                        echo "<option value='{$ob->id}'>{$ob->title}</option>";
                                    }
                                ?>

                           </select>
                    </span>
                </p>
                <p >
                    <label>Schedule Date <small>Enter the Scheduled Dates</small></label>
                    <span class="field">
                        <label class="inline" style="font-weight: normal;color:#777">Start Date&nbsp;&nbsp;<input type="text" name="sem_start_date" id="sem_start_date" value="<?= $acyear->start_date ?>" class="required-data input-medium"> </label>
            &nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="inline" style="font-weight: normal;color:#777">  End Date&nbsp;&nbsp;<input class="required-data input-medium" value="<?= date('Y-m-d ',$enddate) ?>" type="text" name="sem_end_date" id="sem_end_date">
                         </label>
                   </span>
                </p>
                <p>
                    <label>Semesters List<small>Select all Semesters that use this schedule</small></label>
            <span class="field">
                <select id="semesters_list" class="select-chosen required-data input-xxlarge" multiple  data-placeholder="Click to select a semester" name="semesters_list[]">
                    <?php
                    if($str['count']){
                        foreach($str['list'] as $id=>$st){  ?>
                            <optgroup label="<?= $st->name ?>">
                                <?php $semli = $semstr->get_structure_semesters($st->id);
                                ?>

                                <?php
                                if($semli['count']){

                                    foreach($semli['list'] as $id => $se){
                                        echo "<option value='{$st->id}-{$se->id}'> {$st->code_name}-{$se->name}</option>";
                                    }
                                }
                                ?>
                            </optgroup>
                        <?php       }
                    }
                    ?>
                </select>
            </span>
                </p>

                <p>
                    <label>Description<small>Describe who are the target of this Dates</small></label>
                   <span class="field">
                       <textarea style="resize: none;width: 400px;height: 100px" class='required-data' name="wadau_wote"></textarea>
                   </span>
                </p>
                <?php

                echo form_close();
                $actButton ='<button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#sem_timetable-list-contents" target-modal="#edit-item-data" target-form="#edit-sem_timetable-data">Save changes</button>';
                ?>

            </div>
       <?php } ?>
        </div>



<div class="scripts">
    <script>
        updateModaltitle(2,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;
        jQuery("#sem_start_date,#sem_end_date").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });


        jQuery(".select-chosen").chosen();

        jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});

    jQuery("#semesters_list").accordion();
        jQuery("#tabds").tabs();
        jQuery(".edit_dates").click(function(){
            var tagt = jQuery(jQuery(this).attr('target-form')).fadeIn();
            jQuery(tagt).find("#edit_start_date").val(jQuery(this).attr('data-start'));
            jQuery(tagt).find("#edit_start_date").datepicker({changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'})   ;
            jQuery(tagt).find("#edit_end_date").val(jQuery(this).attr('data-end'));
            jQuery(tagt).find("#edit_end_date").datepicker({changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'})

            //console.log(tagt);
        }) ;

        jQuery(".inline-save-btn").click(function(){
            var tagt = jQuery(jQuery(this).attr('target-form')).fadeOut();
        })
    </script>
</div>
<?php
//var_dump($str);
