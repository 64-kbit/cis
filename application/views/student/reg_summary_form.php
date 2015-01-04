<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php


$servicecharge = 'class-enroll';
$service = new FeeServiceCharge();
$service->where('code_id',$servicecharge)->get();

$student = new StudentInfo();
$student->where('registration_number',$userdata['login_id'])->get();

$studentLoan = new StudentLoan();
 $acyear = new AcademicYear();
$pg = new Programme();
$course = new Course();
$sem = new Semester();
$sem->where('id',$class->semester_id)->get();
$sponsor = new StudentSponsor();
$classtype = new studentClassStream();
$classtype->where('id',$class->stream_id)->get();

$sponsor->where('id',$student->fee_sponsor_id)->get();
$configinf = $this->System_core->fetch_system_params();

$studnetCat = new StudentCategory();
$cats = $studnetCat->get_student_category($student->id,2);

$feePayment = new FeeStructureProgramme();
$required = $feePayment->get_programme_fee($sponsor->sponsor_category,$class->programs_id,$class->dp_course_id,$class->academic_year_id,$service->id,$cats);

$currclass = $student->get_current_class();

$studentLoan->where(array('student_id'=>$student->registration_number,'ac_year_id'=> $class->academic_year_id))->get();

if($studentLoan->result_count() == 1){
    $loan = $studentLoan->semester_amount;
}else{
    $loan = 0;
}

$pg->where('id',$student->programme_id)->get();
$course->where('id',$student->course_id)->get();
$acyear->where('id',$class->academic_year_id)->get();

?>



<!-- defines the headers/footers - this must occur before the headers/footers are set -->
<!--mpdf
<htmlpageheader name="myHTMLHeader1">
<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family:
serif; font-size: 9pt; color: #000088;"><tr>
        <td width="20%" align="center"><img src="<?= base_url() ?>themes/img/logo.jpg" width="80px" height="80px" /></td>
<td width="43%"><h2><?= $configinf['org_name'] ?></h2>
                    <?= $configinf['org_box'] ?><br>
                    <?= $configinf['org_contact'] ?> <br>
                  Email:<span style="text-decoration: underline">  <?= $configinf['org_email'] ?> </span><br>
    Website: <span style="text-decoration: underline">  <?= $configinf['org_website'] ?> </span></td>
<td width="33%" valign="bottom" style="vertical-align:text-top;text-align: right;"><span style="font-weight: bold;text-transform: uppercase">Semester Registration Summary</span></td>
</tr></table>
</htmlpageheader>
mpdf-->
<!-- set the headers/footers - they will occur from here on in the document -->
<!--mpdf
<sethtmlpageheader name="myHTMLHeader1" page="O" value="on" show-this-page="1" />
mpdf-->

<table>
    <caption style="text-align: left;text-transform: uppercase;color:#002a80">Student Registration Summary Information</caption>
    <tr>
        <td width="50%" valign="top">
           <table>
               <tr> <td>Name</td><td style="border-bottom: 0.2mm solid #444;color:#002a80"><?= name_format($userdata['user_info']['first_name'],$userdata['user_info']['middle_name'] ,$userdata['user_info']['last_name'],false) ?> &nbsp; &nbsp;</td></tr>
               <tr><td> Gender: </td><td style="border-bottom: 0.2mm solid #444;color:#002a80"><?= strtoupper($userdata['user_info']['gender']) == 'F'?"Female":"Male" ?></td></tr>
               <tr><td>Registration No</td><td style="border-bottom: 0.2mm solid #444;color:#002a80"><?= $userdata['login_id'] ?> </td></tr>
               <tr><td>Programme:</td><td style="border-bottom: 0.2mm solid #444;color:#002a80"><?= $pg->name ?></td></tr>

               <tr><td>Course:</td><td style="border-bottom: 0.2mm solid #444;color:#002a80"><?= $course->name ?></td>
               </tr>
               <tr><td>Fee Sponsor:</td><td style="border-bottom: 0.2mm solid #444;color:#002a80"><?= $sponsor->name . " (" . $sponsor->code_name . ")" ?></td></tr>
           </table>
        </td>
        <?php
            $pg->where('id',$class->programs_id)->get();
        ?>
        <td width="50%" valign="top">
           <table>
               <tr><td>Academic Year:</td><td style="border-bottom: 0.2mm solid #444;color:#002a80"><?= $acyear->notation ?> </td>
               </tr>
               <tr><td style="text-align: left">Registered Class:</td><td style="border-bottom: 0.2mm solid #444;color:#002a80"><?= $classtype->class_name ?> </td></tr>
               <tr><td>Year of Study:</td><td style="border-bottom: 0.2mm solid #444;color:#002a80"><?= programme_year_list(false,$pg->level_year,true) . " | NTA Level " . $pg->nta_level ?> </td></tr>
               <tr><td>Semester:</td><td style="border-bottom: 0.2mm solid #444;color:#002a80"> <?= $sem->name ?></td></tr>

               <tr><td>Registration Status:</td><td style="border-bottom: 0.2mm solid #444;color:#002a80"><span style="color:#4a4"> Registered</span></td></tr>
           </table>
        </td>
    </tr>

</table>  <br>
<table cellpadding="0" cellspacing="0" style="border: 0.2mm solid #444;font-weight: normal">
    <caption style="text-align: left;text-transform: uppercase;color:#002a80">Fee Payment Summary Information<br>(<small style="color: #444"> <?= $required['fee']['major']['program']  ?></small>)</caption>
   <thead  style="background:#083060;color:#fff;margin:0px;">
        <tr style="border-bottom: 0.2mm solid #444;">
            <th style="border-bottom: 0.2mm solid #444;width:2%">#</th>
            <th style="border-bottom: 0.2mm solid #444;text-align: left">Item Name</th>
            <th style="border-bottom: 0.2mm solid #444;text-align: left">Amount</th>
            <th style="border-bottom: 0.2mm solid #444;text-align: left">Minimum</th>
        </tr>
   </thead>
    <?php
    $total = 0;
    $totalMinimum = 0;
        foreach($required['data']['items'] as $id => $item){
              $total += $item['amount'];
            $totalMinimum +=  ($item['amount'] * ($item['minimum_amount']/100));
            ?>
      <tr>
          <td style="background:#083060;color:#fff;margin:0px;"> <?= $id +1  ?></td>
          <td ><?= $item['name'] ?> </td>
          <td style="border-bottom: 1px solid #888;"><?= number_format($item['amount'],2) ?> /=</td>
          <td style="border-bottom: 1px solid #888;"> <?= number_format(($item['amount'] * ($item['minimum_amount']/100)),2) ?> /=  </td>
      </tr>
     <?php   }
    ?>
    <tr>
        <td colspan="2" style="border-top: 0.2mm solid #444;text-align: right"> Total:</td>
        <td  style="border-top: 0.2mm solid #444;"><?= number_format($total,2) ?> /= </td>
        <td style="border-top: 0.2mm solid #444;"><?= number_format($totalMinimum,2) ?></td></tr>
    <tr><td colspan="2" style="border-top: 0.2mm solid #444;text-align: right">Required</td>
        <td style="border-top: 0.2mm solid #444;" ><?= number_format($class->fee_required_amount,2)?> /=</td>
        <td style="border-top: 0.2mm solid #444;">Paid: <?= number_format($class->fee_amount_paid,2)  ?> /=</td>
    </tr>
    <?php if($loan > 0) {
        echo "<tr><td colspan='2' style=\"text-align: right\">Paid from Loan:</td><td style=\"text-align: left\">". number_format($loan,2)  . "</td><td>--</td></tr>";
    }    ?>
</table>
<?php


