<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
$studentinfo = new StudentInfo();
$studentinfo->where('registration_number',$userdata['login_id'])->get();
$class = new ProgrammeCourse();
$acyear = new AcademicYear($studentinfo->academic_year_id);
$pgrame = new Programme($studentinfo->programme_id);
$sponsor = new StudentSponsor($studentinfo->fee_sponsor_id);
$class->where(array('programs_id'=>$pgrame->base_program_id?$pgrame->base_program_id:$pgrame->id,'course_id'=>$studentinfo->course_id))->get();

?>
<div class="row-fluid">
    <div class="span6">
        <table class="table table-condensed table-bordered table-responsive" style="width: 100%">
            <colgroup>
                <col class="con1" style="text-align:right;width:40%;">
                <col class="con0" style="width: 60%">
                <col class="con1" style="text-align:right;width:40%;">
                <col class="con0"  style="width: 60%">
            </colgroup>
            <tbody>

<tr>
    <!-- Pair two -->
    <td style="text-align: left;padding-left: 60px" class="row-head" colspan="2">Admission Information</td>
</tr>
<tr>
    <!-- Pair two -->
    <td style="text-align: right">Sponsorship Category</td><td> <span class='item-title'> <?= $sponsor->code_name ?> (<small><?= $sponsor->name ?></small>) </span> </td>
</tr>
<tr>
    <!-- Pair two -->
    <td style="text-align: right">Year of Admission</td><td> <span class='item-title'> <?= $acyear->notation ?> (<small>In system:<?= date("d-M-Y",strtotime($studentinfo->admission_date)) ?>  </small>)</span> </td>
</tr>

<tr>
    <!-- Pair two -->
    <td style="text-align: right">Admission Mode</td><td> <span class='item-title'> <?= $studentinfo->admission_mode ?>  </span> </td>
</tr>
<tr>
    <!-- Pair two -->
    <td style="text-align: right">Course Programme</td><td> <span class='item-title'> <?= $class->display_name ?> (<small><?= $class->code_name ?></small>) </span> </td>
</tr>

<tr>
    <td style="text-align: right">admission Number</td><td> <span class='item-title'> <?= $studentinfo->registration_number ?> -(<small>System ID:<strong>><?= $studentinfo->cis_reg_id ?></strong</small>) </span> </td>
</tr>

            </tbody>
            </table>
        </div>
    </div>
