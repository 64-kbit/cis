<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
  <?php

    $studentdata = new StudentInfo();
    $acyear = new AcademicYear();
    $current = $acyear->get_current_academic_year();
  $student_list = $studentdata->get_registration_status($current->id)  ;
       // var_dump($student_list);
  //die();

  ?>
<div class="span12" >
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=new_student&token=<?php echo $currenttoken ?>"><i class="fa fa fa-plus"></i>&nbsp;Add New Student</a></li>
                    <li class="divider"></li>
                    <li><a data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/view_item?sourcetb=registration_students&itype=print_generator&name=generate_print_list&token=<?php echo $currenttoken ?>" ><i class="fa  fa fa-print"></i>&nbsp;Print List</a></li>
                </ul>
            </div>
            <h4 class="widgettitle"><?php echo $config['org_abbr'] ." ". $config['org_type'] ?> &nbsp;Current Registered Students</h4>
        </div>
        <div class="widgetcontent no-padding">
            <table class="table table-striped responsive"  id="registration_students-list-table">
                <colgroup>
                    <col style="align: center; width: 2%">
                    <col style="width:16%">
                    <col style="width:16%">
                    <col>
                    <col>
                    <col>
                    <col>
                    <col  style="width:22%">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Class</th>
                    <th>Sponsor</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <!--<th>Description</th>   -->
                </tr>
                </thead>
                <tbody count-indicator=".registration_students-count-indicator" id="registration_students-list-contents<?php //echo $dp_type; ?>">
                <?php
                if(isset($student_list) && $student_list['count'] > 0){
                    foreach($student_list['list'] as $id => $st){

                        ?>
                    <tr class="<?= $st['dis_code']  ?>">
                        <td class="row-head"><?= $id + 1 ?></td>
                        <td><?= $st['registration_id'] ?>
                            <?php
                                foreach($st['tracek'] as $sm => $ik){
                                    echo "<br>(<span style='font-size:12px'>{$sm}:<small class='text-info'>$ik</small></small>)";
                                }
                            ?>
                        </td>
                        <td><?= name_format($st['first_name'],$st['middle_name'],$st['last_name'],0) ?>
                           <br><div class="img-thumbnail stthumb-cont">
                                <?php if(trim($st['profile_photo'])) { ?>
                                <img class="img-thumbnail profile-photo" data-id="<?= $st['registration_id'] ?>" src="<?= base_url() ?>upload_file/get_photo?type=profile_thumb&studentid=<?= $st['registration_id'] ?>&image=<?= $st['profile_photo'] ?>" alt="Passport Photo">
                                <?php } else { ?>
                                    <img class="img-thumbnail" src="<?= base_url() ?>themes/img/nothumb.png" alt="Passport Photo not uploaded">
                            <?php } ?>
                                </div>
                        </td>
                        <td><?= strtoupper($st['gender'])=='F'?"Female":'Male' ?> </td>
                        <td><span class='text-info'>NTA Level<span class="text-info"> <?= $st['nta_level'] ?> </span>|<?= programme_year_list(false,$st['level_year'],true) ?> </span><br><?= $st['code_name'] ?><br><small><?= $st['class_name']  ?></small></td>
                        <td>
                            <span title="<?= $st['sponsor_name'] ?>" data-toggle="tooltip" class='text-info'> <?= $st['sponsor_code'] ?>  </span>
                        </td>

                        <td>
                            <?php

                            echo "<span class='".$st['status_code'] . "' > " . $st['reg_status'] . "</span>";

                            ?>
                        </td>
                        <td>
                            <ul style="border:none;font-size:12px;list-style: none;border-bottom: 1px solid #ddd">
                                <?php
                                    foreach($st['ree_status'] as $id=> $sem ){
                                      echo "<li style=''><span style='font-weight: bold' class='text-info'>$id</span> Fee:<span class='alert-info'>{$sem['required']}</span>| Paid:<span class='alert-success'>{$sem['paid']}</span> </li>";
                                    }
                                ?> </ul>


                        </td>

                    </tr>
                <?php  } }
                ?>
                </tbody>
            </table>
        </div><!--widgetcontent-->
    </div>

</div>

<div class="scripts">
    <script>
        jQuery("#registration_students-list-table").dataTable();
    </script>
</div>
