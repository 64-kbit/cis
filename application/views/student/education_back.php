<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
 <?php
    $pgre = new ProgrammePre();
 $stinfo = new StudentInfo();
 $stinfo->where("registration_number",$userdata['login_id'])->get();
 $pg = new Programme();
 $pgcat = $pg->get_base_programme($stinfo->programme_id);
 $pre = $pgre->get_programme_pre($pgcat->id,1);
 $background = new StudentEdBackground();
 $edbg = $background->get_background($stinfo->id);
 $certaward = new SASEdLevel();
 $places = new PlaceLocation();
 $attachbtn = "<span class='text-error'>--</span>";
 //var_dump($stinfo->stored);
 ?>
<div class="row-fluid">
    <h4 class="subtitle"><i class="glyphicon glyphicon-info-sign"></i>&nbsp;&nbsp; Personal Background Summary&nbsp;&nbsp;</h4>
    <div class="row-fluid">
        <div class="span6">
            <table class="table table-condensed table-bordered table-responsive table-labeled" style="width: 100%">
                <colgroup>
                    <col class="con1" style="text-align:right;width:40%;">
                    <col class="con0" style="width: 60%">
                    <col class="con1" style="text-align:right;width:40%;">
                    <col class="con0"  style="width: 60%">
                </colgroup>
                <tbody>
                <?php if(array_key_exists(1,$pre)){
                    $attachbtn = "";
                    ?>
                <tr>
                    <td class="row-head" colspan="2" style="padding-left: 60px">Primary Education Background</td>
                </tr>
                <?php if(is_array($edbg['list']) && array_key_exists(1,$edbg['list'])) {
                        $burl = base_url();
                        $fname = $edbg['list'][1]['attachment'];
                        $attachbtn = "<button data-toggle='modal' href='{$burl}ajax_load/view_item?itype=attachment&type=1&stid={$stinfo->registration_number}&fname={$fname}' data-target='#view-item-data' class='btn btn-warning'>View Attachment</button>";
                        ?>
                        <tr>
                            <td style="text-align: right">Awarded Certificate</td>
                            <td><span class="item-title"><?= $certaward->get_from_abr($edbg['list'][1]['certificate_award']) ?></span></td>
                        </tr>
                    <tr>
                    <td style="text-align: right">Name of School</td>
                    <td><span class="item-title" data-input="name_of_school"><?= $edbg['list'][1]['name'] ?></span></td>
                </tr>

                <tr>
                    <td style="text-align: right">Region Location</td>
                    <td><span class="item-title"><?= humanize($edbg['list'][1]['country']) ?> - <?= $places->get_place($edbg['list'][1]['location_id'])?></span></td>
                </tr>
                <tr>
                    <td style="text-align: right">Year of Completion</td>
                    <td><span class="item-title"><?= $edbg['list'][1]['year_completed'] ?></span></td>
                </tr>
                    <?php } ?>
                <tr>
                    <td colspan="2"><?= $attachbtn ?>
                        <?php if($userdata['access_level']) { ?>
                        <button data-toggle="modal" data-target="#edit-item-data" href="<?= base_url() ?>ajax_load/form_edit?cattype=1&category=basic&itype=student_education_background&itemid=<?= $userdata['login_id'] ?>&stid=<?= $stinfo->id ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit Information</button>
                        <?php } ?>
                    </td>
                </tr>
                  <?php }
                if(array_key_exists(2,$pre)){
                    $attachbtn = "";
                ?>
                <tr>
                    <td class="row-head" colspan="2" style="padding-left: 60px">O-Level/Equivalent Education Background</td>
                </tr>
                    <?php if(is_array($edbg['list']) &&  array_key_exists(2,$edbg['list'])) {

                        $burl = base_url();
                        $fname = $edbg['list'][2]['attachment'];
                        $attachbtn = "<button data-toggle='modal' href='{$burl}ajax_load/view_item?itype=attachment&type=1&stid={$stinfo->registration_number}&fname={$fname}' data-target='#view-item-data' class='btn btn-warning'>View Attachment</button>"; ?>
                        <tr>
                    <td style="text-align: right">Index Number</td>
                    <td><span class="item-title"><?= $edbg['list'][2]['index_id'] ?></span></td>
                </tr>
                <tr>
                    <td style="text-align: right">Name of School</td>
                    <td><span class="item-title"><?= $edbg['list'][2]['name'] ?></span></td>
                </tr>
                <tr>
                    <td style="text-align: right">Region Location</td>
                    <td><span class="item-title"><?= humanize($edbg['list'][2]['country']) ?> -<?= $places->get_place($edbg['list'][2]['location_id'],false,true) ?></span></td>
                </tr>
                        <tr>
                            <td style="text-align: right">Awarded Certificate</td>
                            <td><span class="item-title"><?= $certaward->get_from_abr($edbg['list'][2]['certificate_award']) ?></span></td>
                        </tr>
                <tr>
                    <td style="text-align: right">Year of Completion</td>
                    <td><span class="item-title"><?= $edbg['list'][2]['year_completed'] ?></span></td>
                </tr>
                <tr>
                    <td style="text-align: right">Subjects taken</td>
                    <td><span class="item-title"><?php if(trim($edbg['list'][2]['subjects'])){
                                $subs = json_decode($edbg['list'][2]['subjects']);
                               $list = "";
                                if($subs){
                                    foreach($subs as $sb){
                                        $list .= generate_common_subjects($sb) . ", ";
                                    }
                                } else{
                                    $list = $subs;
                                }
                                echo trim($list," ,");
                            }else{ echo "--" ; } ?></span></td>
                </tr>
                    <?php } ?>
                <tr>
                    <td colspan="2"><?= $attachbtn ?> &nbsp;
                        <?php if($userdata['access_level']) { ?>
                        <button data-toggle="modal" data-target="#edit-item-data" href="<?= base_url() ?>ajax_load/form_edit?cattype=2&category=olevel&itype=student_education_background&itemid=<?= $userdata['login_id'] ?>&stid=<?= $stinfo->id ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit Information</button>
                        <?php } ?>
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>

        <div class="span6">
            <table class="table table-condensed table-bordered table-responsive table-labeled" style="width: 100%">
                <colgroup>
                    <col class="con1" style="text-align:right;width:40%;">
                    <col class="con0" style="width: 60%">
                    <col class="con1" style="text-align:right;width:40%;">
                    <col class="con0"  style="width: 60%">
                </colgroup>
                <tbody>
                <?php  if( array_key_exists(3,$pre)){
                    $attachbtn = "";
                ?>
                <tr>
                    <td class="row-head" colspan="2" style="padding-left: 60px">Secondary A-Level/High School Education</td>
                </tr>
                    <?php if(is_array($edbg['list']) && array_key_exists(3,$edbg['list'])) {

                        $burl = base_url();
                        $fname = $edbg['list'][3]['attachment'];
                        $attachbtn = "<button data-toggle='modal' href='{$burl}ajax_load/view_item?itype=attachment&type=1&stid={$stinfo->registration_number}&fname={$fname}' data-target='#view-item-data' class='btn btn-warning'>View Attachment</button>";?>
                <tr>
                    <td style="text-align: right">Index Number</td>
                    <td><span class="item-title"><?= $edbg['list'][3]['index_id'] ?></span></td>
                </tr>
                <tr>
                    <td style="text-align: right">Name of School</td>
                    <td><span class="item-title"><?= $edbg['list'][3]['name'] ?></span></td>
                </tr>
                        <tr>
                            <td style="text-align: right">Awarded Certificate</td>
                            <td><span class="item-title"><?= $certaward->get_from_abr($edbg['list'][3]['certificate_award']) ?></span></td>
                        </tr>
                <tr>
                    <td style="text-align: right">Region Location</td>
                    <td><span class="item-title"><?= humanize($edbg['list'][3]['country']) ?> - <?= $places->get_place($edbg['list'][3]['location_id'],false,true) ?></span></td>
                </tr>
                <tr>
                    <td style="text-align: right">Year of Completion</td>
                    <td><span class="item-title"><?= $edbg['list'][3]['year_completed'] ?></span></td>
                </tr>
                <tr>
                    <td style="text-align: right">Subject Combination</td>
                    <td><span class="item-title"><span class="item-title"><?php if(trim($edbg['list'][2]['subjects'])){
                                    $subs = json_decode($edbg['list'][3]['subjects']);
                                    $list = "";
                                    if($subs){
                                        foreach($subs as $sb){
                                            $list .= generate_common_subjects($sb) . ", ";
                                        }
                                    } else{
                                        $list = $subs;
                                    }
                                    echo trim($list," ,");
                                }else{ echo "--" ; } ?></span></span></td>
                </tr>
                    <?php } ?>
                <tr>
                    <td colspan="2"> <?= $attachbtn ?>
                        <?php if($userdata['access_level']) { ?>
                        <button data-toggle="modal" data-target="#edit-item-data" href="<?= base_url() ?>ajax_load/form_edit?cattype=3&category=alevel&itype=student_education_background&itemid=<?= $userdata['login_id'] ?>&stid=<?= $stinfo->id ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit Information</button>
                        <?php } ?>
                    </td>
                </tr>
                   <?php }  if(array_key_exists(4,$pre) || array_key_exists(5,$pre) || array_key_exists(6,$pre) || array_key_exists(7,$pre)){
                    $value = (array_key_exists(4,$pre) == 1)?4:((array_key_exists(5,$pre) == 1)?5:((array_key_exists(6,$pre) == 1)?6:((array_key_exists(7,$pre) == 1)?7:false)));

                   ?>
                <tr>
                    <td class="row-head" colspan="2" style="padding-left: 60px">Other Education Background</td>
                </tr>
                <?php if(is_array($edbg['list']) && array_key_exists($value,$edbg['list'])) {
                        $attachbtn = "";
                        $burl = base_url();
                        $fname = $edbg['list'][$value]['attachment'];
                        $attachbtn = "<button data-toggle='modal' href='{$burl}ajax_load/view_item?itype=attachment&type=1&stid={$stinfo->registration_number}&fname={$fname}' data-target='#view-item-data' class='btn btn-warning'>View Attachment</button>";
                        ?>

                    <tr>
                        <td style="text-align: right">Reference ID</td>
                        <td><span class="item-title"><?= ($edbg['list'][$value]['index_id']) ?></span></td>
                    </tr>
                <tr>
                    <td style="text-align: right">Name of School/Institute/College/University</td>
                    <td><span class="item-title"><?= ($edbg['list'][$value]['name'])?></span></td>
                </tr>
                <tr>
                    <td style="text-align: right">Region Location</td>
                    <td><span class="item-title"><?= humanize($edbg['list'][$value]['country']) ?> - <?= $places->get_place($edbg['list'][$value]['location_id'],false,true)?></span></td>
                </tr>
                <tr>
                    <td style="text-align: right">Year of Completion</td>
                    <td><span class="item-title"><?= ($edbg['list'][$value]['year_completed'])?></span></td>
                </tr>
                <tr>
                    <td style="text-align: right">Course Taken</td>
                    <td><span class="item-title"><?= ($edbg['list'][$value]['course'])?></span></td>
                </tr>
                <tr>
                    <td style="text-align: right">Certificate Award</td>
                    <td><span class="item-title"><?= $certaward->get_from_abr($edbg['list'][$value]['certificate_award'])?></span></td>
                </tr>
                    <?php } ?>
                <tr>
                    <td colspan="2"><?= $attachbtn ?>
                        <?php if($userdata['access_level']) { ?>
                        <button data-toggle="modal" data-target="#edit-item-data" href="<?= base_url() ?>ajax_load/form_edit?cattype=<?= isset($value)?$value:4 ?>&category=other&itype=student_education_background&itemid=<?= $userdata['login_id'] ?>&stid=<?= $stinfo->id ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit Information</button>
                        <?php } ?>
                    </td>
                </tr>
                 <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
  <!--
<script  src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
  -->
<script src="<?= plugins_folder() ?>pdfobject.js" ></script>

