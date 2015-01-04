<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
//var_dump($userdata);
       //$reob = new AcademicStudentResult();
    //  $result =  $reob->get_list($userdata['registration_number_id']);
    $bank = new BankImport();
     $studentinfo = new StudentInfo();
$studentinfo->where('registration_number',$userdata['registration_number_id'])->get();

$currentClass = $studentinfo->get_current_class();
$acy = new AcademicYear();
$current = $acy->get_current_academic_year();



?>

<div id="dashboard-left" class="span8">
    <h4 class="widgettitle">Semester Registration Status for Academic Year <?= $current->notation ?></h4>

                <?php
                $classes = $studentinfo->get_student_reg_status($userdata['registration_number_id'],$current->id);

                ?>
                <table class="table table-bordered table-condensed">

                    <colgroup>
                        <col style="align: center; width: 2%">
                        <col>
                        <col>
                        <col >
                        <col>
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Semester</th>
                        <th>Required</th>
                        <th>Paid</th>
                        <th>Remaining</th>
                        <th>Status</th>
                        <!--<th>Description</th>   -->
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $req['paid'] = 0;
                    $req['req'] = 0;
                    $status = array();
                    foreach($classes as $id => $cl){
                        $req['paid'] += $cl['fee_amount_paid'];
                        $req['req'] += $cl['fee_required_amount'];
                        $status[$cl['sem_number']] = $cl['status'];
                        $dlurl = base_url() . user_profile($userdata['profile']) . '/download_file?type=semester_summary&classid='. $cl['id'] . "&studentid=" .  $userdata['registration_number_id'];
                        ?>
                        <tr>
                            <td class="row-head">
                                <?= $id + 1 ?>
                            </td>
                            <td><?= $cl['sem_name'] ?></td>
                            <td><?= number_format($cl['fee_required_amount'] ,2)?></td>
                            <td><?= number_format($cl['fee_amount_paid'],2)?></td>
                            <td><?php

                                $remain = $cl['fee_amount_paid'] -   $cl['fee_required_amount'];
                                if($cl['fee_amount_paid'] >= $cl['fee_required_amount'] ){

                                    echo "<span class='badge badge-success'>Cleared!!</span>";
                                }else if( $cl['fee_amount_paid'] > 0 && $cl['fee_amount_paid'] < $cl['fee_required_amount'] ){
                                    echo "<span class='badge badge-warning'>" . number_format($remain,2). " /=</span>";
                                }else{
                                    echo "<span class='badge badge-important'>" . number_format($remain,2). " /=</span>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if($cl['status'] == 2){
                                    echo "<span class='badge badge-warning'><i class='fa fa-remove'></i>&nbsp;&nbsp; Not Registered for this semester </span>";
                                }else{
                                    echo "<span class='badge badge-success'><i class='fa fa-ok'></i>&nbsp;&nbsp;Registered</span><a target='_blank' href='$dlurl' class='btn btn-primary'><i class='glyphicon glyphicon-print'></i> &nbsp;&nbsp;Download PDF</a>";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php       }
                    ?>
                    <tr class="info">
                        <td colspan="2" style="text-align: right">Total </td>
                        <td> <?= number_format($req['req'],2) ?> /=</td>
                        <td> <?= number_format($req['paid'],2) ?> /= </td>
                        <td> <?php
                            $dif = $req['paid'] - $req['req'];
                            if($dif >= 0){

                              echo "<span class='badge badge-success'>Cleared!</span>";
                            }else{
                                echo "<span class='badge badge-important'>". number_format($dif ,2) ."/=</span>";
                            }
                           ?> </td>
                        <td>
                            <?php
                                if($status[1] == 1 && $status[2] == 1){
                                    echo "<span class='badge badge-success'>Fully Registered </span>";
                                }elseif(($status[1] == 1 && $status[2] != 1) || ($status[1] == 1 && $status[2] != 1)){
                                    echo "<span class='badge badge-info'>Registered</span>";
                                }else{
                                    echo "<span class='badge badge-important'>Not Registered</span>";
                                }
                            ?>
                        </td>
                    </tr>
                    </tbody>
                </table>

         <?php
       //  var_dump($currentClass);
            ?>



    <div class="divider15"></div>
    <h4 class="widgettitle">Received Bank Transactions</h4>
    <table class="table table-bordered responsive">
        <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Transaction No</th>
            <th>Amount</th>
            <th>Paid for</th>
            <th>Bank Branch</th>
        </tr>
        </thead>
        <tbody>
         <?php
                $bank->where('student_id',$userdata['registration_number_id'])->get();
         if($bank->result_count()){
             foreach($bank->all as $id => $bk ) {?>

             <tr>
                 <td><?= $id + 1 ?> </td>
                 <td><?= date('d-M-Y',strtotime($bk->date_of_deposit)) ?> </td>
                 <td><?= $bk->payinslip_id ?> </td>
                 <td><?= number_format($bk->paid_amount,2)  ?>  /= </td>
                 <td><?= $bk->comments ?> </td>
                 <td><?= $bk->bank_branch ?> </td>
             </tr>

         <?php  }  }

         ?>
        <tr><td colspan="3">Enter Missing Bank Transaction no Here</td><td colspan="3">
                <form id="add_payinslip-data">
                    <input type="text" placeholder="<?= $bank->payinslip_id ?>" name="missing_trans" class="input-xlarge">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#add-item-data"><i class="glyphicon glyphicon-floppy-disk"></i>&nbsp;&nbsp;Add</button> </form></td></tr>
        </tbody>
    </table>

</div><!--span8-->

<div id="dashboard-right" class="span4">

    <h5 class="subtitle">Announcements & Information</h5>
    <div class="divider15"></div>
    <div class="personwrapper" style="float:none;height: ">
        <div class="personinfo">
            <ul>
                <li><span class="dt-item"><i class="fa fa-chevron-right"></i>&nbsp;&nbsp;Current Class:<span class="dt-item-info"><?= $currentClass['code_name'] ?>
                           | NTA Level <?= $currentClass['nta_level'] ?> | <?= programme_year_list(false,$currentClass['level_year'],false) ?><br>(<small><?= $currentClass['class_name'] ?></small>) </span></span></li>
                <li><span class="dt-item"><i class="fa fa-chevron-right"></i>&nbsp;&nbsp;Current Semester:<span class="dt-item-info"><?= $currentClass['sem_name'] ?></span></span></li>
                <li><span class="dt-item"><i class="fa fa-chevron-right"></i>&nbsp;&nbsp;Date Enrolled:<span class="dt-item-info"><?= date("d-M-Y, h:i:s a",strtotime($currentClass['date_enrolled'])) ?></span></span></li>
                <li><span class="dt-item"><i class="fa fa-chevron-right"></i>&nbsp;&nbsp;Date Registered:<span class="dt-item-info"><?= strtotime($currentClass['date_registered']) > 0?date("d-M-Y, h:i:s a",strtotime($currentClass['date_registered'])):"Never" ?></span></span></li>
                <li><span class="dt-item"><i class="fa fa-chevron-right"></i>&nbsp;&nbsp;Fee Sponsor:<span class="dt-item-info"><?= $currentClass['sponsor_name'] . "(". $currentClass['sponsor_code'] . ")"?></span></span> </li>
            </ul>
        </div>
    </div>
      <br>
    <h4 class="widgettitle">Event Calendar</h4>
    <div class="widgetcontent nopadding">
        <div id="EventsCalenderDatePicker"></div>
    </div>

    <?php //var_dump(strtotime($currentClass['date_registered'])) ; ?>