<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
    $studentinfo = new StudentInfo();
   // $studentDetails = new StudentDetails();
    $fees = new FeeStructureProgramme();
    $feeacc = new StudentFeeAccount();
        $bankfee = new BankImport();
     $studentCategory = new StudentCategory();
    $studentinfo->where('registration_number',$regno)->get();
    $catLi = $studentCategory->get_student_category($studentinfo->id,'other');
$classEnroll = new StudentClassEnrollment();
$bankfee->where('student_id',$regno)->get();
   // $studentDetails->where('id',$studentinfo->details_id)->get();
     $stdata = $studentinfo->get_student_reg_status($regno,false);
    $currentClass = $studentinfo->get_current_class();

     $acyear = $studentinfo->get_student_academic_years($regno) ;
      // var_dump($feeacc);die();
//echo $regno;
$categoyinf = "";
foreach($catLi as $i => $dt){
    $categoyinf .= $dt['name'];
}


?>

<div style="margin:-10px;padding: 0px;box-shadow: 0px 0px 3px 0px #444;min-height: 500px" class="tabbable tabs-top no-padding">
    <ul class="nav nav-tabs" id='std_info-data-list' role="tablist">
        <li class="active">
            <a href="#tabid-one" role="tab" data-toggle="tab"><h4  class="subtitle"><i class="fa fa-info-sign"></i> &nbsp;&nbsp; Student Summary</h4></a>
        </li>
        <li class="">
            <a href="#tabid-two" role="tab" data-toggle="tab"><h4  class="subtitle"><i class="fa fa-check-sign"></i> &nbsp;&nbsp; CRDB Deposits History</h4></a>
        </li>
        <?php
    if($acyear['count']){
    foreach($acyear['list'] as $id => $yr){   ?>
        <li ><a href="#tabid-<?= $id ?>" role="tab" data-toggle="tab"><h4  class="subtitle"><i class="fa fa-check"></i> &nbsp;&nbsp; <?= $yr['notation'] ?> Transactions</h4></a></li>

  <?php }
    }   ?>
    </ul>
    <div class="tab-content no-padding">
        <div id="tabid-one" class='peoplelist tab-pane active '>
            <div class="row-fluid">
            <div class="span12" style="float:left;">
                <div class="personwrapper1">
                    <h2 class="subtitle">Student Profile Summary</h2>
                    <div class="big-thumb"  >
                        <img  src="<?= base_url() ?>/upload_file/get_photo?type=profile_photo&studentid=100101P7307&image=<?= $currentClass['profile_photo'] ?>" alt="">
                    </div>
                    <div class="personinfo">
                        <h4>
                            <a href=""><?= $currentClass['first_name'] . " " . $currentClass['middle_name'] . " " . $currentClass['last_name'] ?> </a> &nbsp;(<small>Gender:<?php
                                if(strtoupper($currentClass['gender']) == 'F') {
                                    echo "<span class='text-success'>FEMALE</span>"  ;
                                }else{
                                    echo "<span class='text-info'>MALE</span>"  ;
                                }
                            ?></small>)</h4>
                        <ul>
                            <li><span  class="dt-item"><i class="fa fa-ok" class="text-success"></i>&nbsp;&nbsp;Phone No:<span class="dt-item-info"><?= $currentClass['mobile_number'] ?></span></li>
                            <li><span  class="dt-item"><i class="fa fa-ok" class="text-success"></i>&nbsp;&nbsp;Email:<span class="dt-item-info"><?= $currentClass['email_address'] ?></span></li>
                            <li><span class="dt-item"><i class="fa fa-ok" class="text-success"></i>&nbsp;&nbsp;Registration ID:<span class="dt-item-info"><?= $studentinfo->registration_number ?> </span></span></li>
                            <li><span class="dt-item"><i class="fa fa-ok" class="text-success"></i>&nbsp;&nbsp;Student Class:<br><span class="dt-item-info"><?= $currentClass['code_name'] ." - NTA LEvel" . $currentClass['nta_level'] . " | " . programme_year_list(false,$currentClass['level_year'],false) . "<br>(<small>". $currentClass['class_name'] ."</small>)"?> </span></span></li>
                            <li><span class="dt-item"><i class="fa fa-ok" class="text-success"></i>&nbsp;&nbsp;Date Admitted:<span class="dt-item-info"><?= date("d-M-Y",strtotime($studentinfo->admission_date)) ?> </span></span></li>
                            <li><span  class="dt-item"><i class="fa fa-ok" class="text-success"></i>&nbsp;&nbsp;Fee Sponsor:<span class="dt-item-info"><?= $currentClass['sponsor_name'] . "(" . $currentClass['sponsor_code'] . ")"  ?></span></span> </li>
                            <li><span  class="dt-item"><i class="fa fa-ok" class="text-success"></i>&nbsp;&nbsp;Category Info: <span class="dt-item-info"><?= $categoyinf  ?></span></span></li>

                        </ul>
                    </div><!--peopleinfo-->
                </div><!--peoplewrapper-->
            </div>
                  </div>

        </div>

        <div id="tabid-two" class="tab-pane">
            <table class="table table-striped table-condensed">
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
                    <th>Date</th>
                    <th>Reference No</th>
                    <th>Amount</th>
                    <th>Branch</th>
                    <th>Remarks</th>

                    <!--<th>Description</th>   -->
                </tr>
                </thead>
                <tbody>
                   <?php
                        foreach($bankfee->all as $id => $ob){

                            ?>
                         <tr>
                             <td><i class="text-success fa fa-ok"></i></td>
                             <td>
                                 <?= date("d/M/Y",strtotime($ob->date_of_deposit )) ?>
                             </td>
                             <td>
                                 <?= $ob->payinslip_id ?>
                             </td>
                             <td>
                                 <?= number_format($ob->paid_amount,2) . " /= " ?>
                             </td>
                             <td>
                                 <?= $ob->bank_branch ?>
                             </td>
                             <td>
                                 <?= $ob->comments ?>
                             </td>
                         </tr>

                      <?php  }
                   ?>
                </tbody>
                </table>
        </div>
        <?php

        if($acyear['count']){
            foreach($acyear['list'] as $id => $yr){   ?>
                 <div class='tab-pane no-padding' id="tabid-<?= $id ?>">

                     <div class="row-fluid">
                         <div class="span12">
                            <?php
                          $classes = $studentinfo->get_student_reg_status($regno,$yr['academic_year_id']);

                            ?>
                             <table class="table table-striped table-condensed">
                                 <caption><h3 >Tuition Fee and Other charges</h3></caption>
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
                                        foreach($classes as $id => $cl){
                                            $req['paid'] += $cl['fee_amount_paid'];
                                            $req['req'] += $cl['fee_required_amount'];
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
                                                   echo "<span class='badge badge-success'>" . number_format($remain,2). " /=</span>";
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
                                                    echo "<span class='badge badge-success'><i class='fa fa-ok'></i>&nbsp;&nbsp;Registered for this semester </span>";
                                                }
                                              ?>
                                          </td>
                                      </tr>
                                 <?php       }
                                    ?>
                                 <tr>
                                     <td colspan="2">Total </td>
                                     <td> <?= number_format($req['req'],2) ?> /=</td>
                                     <td> <?= number_format($req['paid'],2) ?> /= </td>
                                     <td> <?= number_format($req['paid'] - $req['req'] ,2)?> /=</td>
                                 </tr>
                                 </tbody>
                                 </table>
                         </div>
                     </div>

                     <div class="row-fluid">

                         <div class="span12">

                             <table class="table table-striped table-condensed">
                                 <caption><h3 >All Recorded Transactions & charges</h3></caption>
                                 <colgroup>
                                     <col style="align: center; width: 2%">
                                     <col>
                                     <col>
                                     <col >
                                     <col>
                                     <col>
                                     <col  style="width:30%">
                                 </colgroup>
                                 <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Date</th>
                                     <th>Reference No</th>
                                     <th>Amount</th>
                                     <th>Item</th>
                                     <th>Type</th>
                                     <th>Remarks</th>
                                     <!--<th>Description</th>   -->
                                 </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 $feeacc->where(array("registration_id"=>$regno,'academic_years_id'=>$yr['academic_year_id']))->get();
                                  $total['credit'] = 0;
                                 $total['debit'] = 0;

                                 foreach($feeacc->all as $id => $ob ){
                                     if($ob->item == 'loan'){
                                         continue;
                                     }
                                       if($ob->amount_type == 1){
                                           $rowc = "success";
                                           $amounttype = "Credit";
                                           $total['credit'] += $ob->amount;
                                       }else{
                                           $rowc = 'warning';
                                           $amounttype = "Charge";
                                           $total['debit'] += $ob->amount;
                                       }
                                     ?>
                                    <tr class="<?= $rowc ?>">
                                        <td class="row-head" style="background: #123954"><?= $id + 1 ?></td>
                                        <td><span class='badge'><?= date("d/M/Y, h:i a",strtotime($ob->transaction_date)) ?></span></td>
                                        <td><span class="text-success"> <?= $ob->transaction_number ?> </span></td>
                                        <td><span class="badge badge-inverse"> <?= number_format($ob->amount,2) ?> /= </span></td>
                                        <td><?php
                                            switch($ob->item){
                                                case 'class-enroll':
                                                    $rm = "Class Enrolloment Charges";
                                                    break;
                                                case 'bank':
                                                    $rm = "Fee Paid to Bank";
                                                    break;
                                                case 'loan':
                                                    $rm = "Student Loan";
                                                    break;
                                                case 'previous':
                                                    $rm = "Other Manually Entered";
                                                    break;

                                            }
                                            echo $rm;
                                            ?> </td>
                                        <td><?= $amounttype ?></td>
                                        <td><small class="text-info"><?= $ob->comments ?> </small> </td>
                                    </tr>
                                 <?php

                                 }
                                 ?>
                                   <tfooter>
                                       <tr>
                                         <td colspan="3">
                                             Total Credit: <span class="badge badge-info"> <?= number_format($total['credit'],2) . " /=" ?></span>
                                         </td>
                                           <td colspan="2">
                                             Total  Charges: <span class="badge badge-info"> <?= number_format($total['debit'],2) . " /=" ?></span>
                                           </td>
                                           <td colspan="2">
                                               Balance: <?php
                                                $bal = number_format($total['credit'] - $total['debit'],2) . " /=";
                                               if($bal >= 0){
                                                 echo  "<span class=\"badge badge-success\">$bal</span>  "  ;
                                               }else{
                                                   echo  "<span class=\"badge badge-important\">$bal</span>  "  ;
                                               }   ?>

                                           </td>
                                       </tr>
                                   </tfooter>
                                 </tbody>
                             </table>

                         </div></div>

                 </div>
            <?php     }
        }
    ?>
     </div>
</div>

<div class="scripts">
    <script>
       jQuery("#view-item-data").find(".modal-header").html("Student Advanced Information");
       jQuery('#std_info-data-list a').click(function (e) {
            e.preventDefault()
           jQuery(this).tab('show')
        })
    </script>
</div>
