<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
    $payMent = new StudentInfo();
$acYear = new AcademicYear();
$current = $acYear->get_current_academic_year();
    $student_list = $payMent->get_registration_status($current->id);

   // var_dump($student_list);die();

?>



<div class="span12" >

    <div id="tabs" class="tabbedwidget tab-primary no-padding">
        <ul>
            <li>
                <a href="#tab-1">
                    <h4 class=""><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Current Students List</h4></a>
            </li>
            <li>
                <a href="#tab-2">
                    <h4 class=""><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Other Students List</h4>
                </a>
            </li>
        </ul>
<div id="tab-1">
    <table class="table table-striped responsive dataTable"  id="pgcourse-list-table">
        <colgroup>
            <col class="con0" style="align: center; width: 2%">
            <col  style="width:125px">
            <col style="width: 13%" >
            <col>
            <col>
            <col >
            <col>
            <col  style="width:22%">

        </colgroup>
        <thead>
        <tr>
            <th>#</th>
             <TH><i class="glyphicon glyphicon-picture"></i>&nbsp;&nbsp;Photo </TH>
            <th>Student ID</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Current Class</th>
            <th>Fee Sponsor</th>
            <th>Fee Status</th>
            <!--<th>Description</th>   -->
        </tr>
        </thead>
        <tbody count-indicator=".pgcourse-count-indicator" id="pgcourse-list-contents<?php //echo $dp_type; ?>">
        <?php
        if(isset($student_list) && $student_list['count'] > 0){
            foreach($student_list['list'] as $id => $st ){
                $actUrl = base_url() . "ajax_load/student_payments?type=info&stid=" . $st['registration_id']
                ?>
            <tr class="<?= $st['dis_code']  ?>">
                <td class="row-head"><?= $id + 1 ?></td>
                <td>
                    <div class="img-thumbnail stthumb-cont">
                        <?php if(trim($st['profile_photo'])) { ?>
                            <img class="img-thumbnail profile-photo" data-id="<?= $st['registration_id'] ?>" src="<?= base_url() ?>upload_file/get_photo?type=profile_thumb&studentid=<?= $st['registration_id'] ?>&image=<?= $st['profile_photo'] ?>" alt="Passport Photo">
                        <?php } else { ?>
                            <img class="img-thumbnail" src="<?= base_url() ?>themes/img/nothumb.png" alt="Passport Photo not uploaded">
                        <?php } ?>
                    </div>
                </td>
                <td><?= $st['registration_id'] ?> <?php
                    foreach($st['tracek'] as $sm => $ik){
                        echo "<br>({$sm}:<small class='text-info'>$ik</small>)";
                    }
                    ?>
                    <div class="data-item-controls">
                    <button class="btn-primary btn" data-toggle="modal" data-target="#view-item-data" href="<?= $actUrl ?>"><i class="icon-info-sign"></i>&nbsp;&nbsp;More Info ..</button> </div>
                </td>
                <td><?= name_format($st['first_name'],$st['middle_name'],$st['last_name'],0) ?>

                </td>
                <td><?= strtoupper($st['gender'])=="F"?"Female":"Male" ?> </td>
                <td><span class='text-info'>NTA Level<span class="text-info"> <?= $st['nta_level'] ?> </span>|<?= programme_year_list(false,$st['level_year'],false) ?> </span>-<span  title='<?= $st['class_name']  ?>'><?= $st['code_name'] ?></span><br><?= $st['class_name'] ?><br><?= "<span class='".$st['status_code'] . "' > " . $st['reg_status'] . "</span>" ?></td>
                <td><?= $st['sponsor_code'] ?><br><small class="text-info"><?= $st['sponsor_name'] ?></small></td>
                <td>
                    <ul style="border:1px solid #ddd;background:#eee;padding: 7px;font-size:12px;list-style: none;border-bottom: 1px solid #ddd">
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
</div>

        <div id="tab-2">
            <table class="table table-bordered responsive dataTable"  id="pgcourse-list-table">
                <colgroup>
                    <col class="con0" style="align: center; width: 2%">
                    <col class="con1">
                    <col class="con0">
                    <col class="con1">
                    <col class="con0">
                    <col class="con1">
                    <col class="con0">
                    <col class="con1">
                    <col class="con0">
                    <col class="con1">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Current Class</th>
                    <th>Paid Amount</th>
                    <th>Required</th>
                    <th>Remaining</th>
                    <th>Balance</th>
                    <th>status</th>
                    <!--<th>Description</th>   -->
                </tr>
                </thead>
                <tbody count-indicator=".pgcourse-count-indicator" id="pgcourse-list-contents<?php //echo $dp_type; ?>">  </tbody>
                <?php
                if(isset($student_list) && $student_list['count'] > 0){ ?>
                    <tr>
                        <td>1</td>
                    </tr>
                <?php  }
                ?>
            </table>
        </div>


        </div>
    </div>

<div class="scripts">
    <script>
        jQuery(".dataTable").dataTable({         'dom':'<"top"lfpi><"#table_wrapper"t><"bottom"lfpi><"clear">',
        });
    </script>
</div>
