<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
$acyear = new AcademicYear();
$curryear = $acyear->get_current_academic_year();
$bankImports = new BankImport();

?>
<div id="dashboard-left" class="span12">

    <div id="tabs" class="tabbedwidget tab-primary no-padding">
        <ul>
            <li>
                <a href="#tab-1">
                    <h4 class="">Bank Deposits for <?= $curryear->notation ?></h4> </a>
            </li>

            <li>
                <a href="#tab-2">
                    <h4 class="">Bank Deposits for Previous Years</h4> </a>
            </li>

            <li>
                <a href="#tab-3">
                    <h4 class="">
                        Fee Importations Status
                    </h4>
                </a>
            </li>
        </ul>

        <div id="tab-1">
     <div id='fee-imports-contents'>
    <table aria-describedby="dyntable_info" id="feeimports-list-table" class="table table-striped responsive dataTable">
        <colgroup>
            <col class="con0" style="align: center; width: 3%">
            <col  style="width: 8%">

        </colgroup>
        <thead>
        <tr>
            <th>#</th>
             <th>status</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Amount </th>
            <th>Paying slip</th>
            <th>Fee Type</th>
            <th>Date</th>
            <th>Branch</th>
        </tr>
        </thead>
        <tbody>
            <?php
                $pailist = $bankImports->get_list();
            if($pailist['count'] > 0) {
                foreach($pailist['list'] as $id=> $pl){
                if($pl->academic_year != $curryear->id ) continue;
                    ?>
                <tr id="rowid-<?= $id ?>">
                    <td class="row-head">
                        <?= $id + 1 ?>
                </td>
                    <td>
                        <?php
                        if($userdata['access_level'] == 1){
                        $actionurl = base_url(). "ajax_load/form_edit?itemrow=rowid-{$id}&itype=student_bank_link&itemid={$pl->id}";
                            if($pl->checked == 1){
                                echo "<span data-toggle='dd' title='Used by this Student' class='text-success'><i class='glyphicon glyphicon-ok'></i>&nbsp<small>Linked</small></span>";
                            }else{

                                echo "<button href='$actionurl' class='btn btn-primary' data-toggle='modal' data-target='#add-item-data'><i class='fa fa-plus'></i>&nbsp;&nbsp;Save</button>";

                            }
                        }else{
                            echo "--";
                        }
                        ?>
                    </td>
                    <td>
                       <span class="text-info"><?= empty($pl->student_id)?"--":$pl->student_id ?> </span>
                    </td>
                    <td>
                        <?= empty($pl->student_name)?"--":ucwords(strtolower($pl->student_name)) ?>
                    </td>
                    <td>
                        <span class='text-success'> <?= number_format($pl->paid_amount,2,'.',',') ?>&nbsp;/=</span> </td>
                    </td>
                    <td>
                        <span class='text-info'><?= strtoupper($pl->payinslip_id) ?> </span>
                    </td>
                    <td>
                        <?= empty($pl->paid_for)?"--":$pl->paid_for ?>
                    </td>
                    <td>
                        <?=  date("d-M-Y",strtotime($pl->date_of_deposit)) ?>
                    </td>
                    <td>
                        <?= empty($pl->bank_branch)?"--":ucwords(strtolower($pl->bank_branch)) ?>
                    </td>
                    </tr>
           <?php     }
            }

           ?>
        </tbody>
  </table>
     </div>
            </div>
        <div id="tab-2">
            <div id='fee-imports-contents'>
                <table aria-describedby="dyntable_info" id="feeimports-list-table-old" class="table table-striped responsive dataTable">
                    <colgroup>
                        <col class="con0" style="align: center; width: 3%">
                        <col  style="width: 8%">
                    </colgroup>
                    <thead>
                    <th>#</th>
                    <th>status</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Amount </th>
                    <th>Paying slip</th>
                    <th>Fee Type</th>
                    <th>Date</th>
                    <th>Branch</th>
                    </thead>
                    <tbody>
                    <?php
                    $pailist = $bankImports->get_list();
                    if($pailist['count'] > 0) {
                        foreach ($pailist['list'] as $id => $pl) {
                            if ($pl->academic_year == $curryear->id) continue;
                            ?>
                            <tr id="rowid-<?= $id ?>">
                                <td class="row-head">
                                    <?= $id + 1 ?>
                                </td>
                                <td>
                                    <?php
                                    $actionurl = base_url() . "ajax_load/form_edit?itemrow=rowid-{$id}&itype=student_bank_link&itemid={$pl->id}";
                                    if ($pl->checked == 2) {
                                        echo "<button href='$actionurl' class='btn btn-primary' data-toggle='modal' data-target='#add-item-data'><i class='fa fa-plus'></i>&nbsp;&nbsp;Link</button>";
                                    } else {
                                        echo "<span data-toggle='dd' title='Used by this Student' class='text-success'><i class='glyphicon glyphicon-ok'></i>&nbsp<small>Linked</small></span>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <span
                                        class="text-info"><?= empty($pl->student_id) ? "--" : $pl->student_id ?> </span>
                                </td>
                                <td>
                                    <?= empty($pl->student_name) ? "--" : ucwords(strtolower($pl->student_name)) ?>
                                </td>
                                <td>
                                    <span class='text-success'> <?= number_format($pl->paid_amount, 2, '.', ',') ?>
                                        &nbsp;/=</span></td>
                                </td>
                                <td>
                                    <span class='text-info'><?= strtoupper($pl->payinslip_id) ?> </span>
                                </td>
                                <td>
                                    <?= empty($pl->paid_for) ? "--" : $pl->paid_for ?>
                                </td>
                                <td>
                                    <?= date("d-M-Y", strtotime($pl->date_of_deposit)) ?>
                                </td>
                                <td>
                                    <?= empty($pl->bank_branch) ? "--" : ucwords(strtolower($pl->bank_branch)) ?>
                                </td>
                            </tr>
                            }
                        <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

       <div id="tab-3">

      <?php if(isset($importsAlerts) && $importAlerts['count'] > 0): ?>
        <?php foreach($importAlerts['list'] as $id => $alert ):
            switch ($alert->log_type) {
                case 'email_scan': ?>
        <?php  break;
                case 'mail_connect': ?>
         <?php break;
                case 'network_error': ?>
    <?php break;
            default: ?>
                <div class="alert alert-block" style="width:32%;float:left">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4>Warning!</h4>
                    <p style="margin: 8px 0">Last Email Read from!</p>
                </div><!--alert  -->
         <?php

            }
            endforeach;
            else: ?>
                <div class="alert alert-info" style="width:28%;margin: 10px;float:left">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <h4>Message</h4>
                    <p style="margin: 8px 0">No any new alerts yet</p>
                </div><!--alert ->
      <?php  endif;
            ?>

</div><!--span4-->

    </div>
        </div>   <!-- End of tabs -->
<div class="scripts" style="display: none">
    <script>
        jQuery('#feeimports-list-table,#feeimports-list-table-old').dataTable();
    </script>
</div>
