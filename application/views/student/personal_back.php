<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
    $studentinfo = new StudentInfo();
   $studentinfo->where('registration_number',$userdata['login_id'])->get();
$details = new StudentDetails($studentinfo->details_id);
$sponsor = new StudentSponsor($studentinfo->fee_sponsor_id);
$places = new PlaceLocation();
    $burl = base_url();
$fname = $details->birth_certificate;
$attachbtn = "<button data-toggle='modal' href='{$burl}ajax_load/view_item?itype=attachment&type=birth_cert&stid={$studentinfo->registration_number}&fname={$fname}' data-target='#view-item-data' class='btn btn-warning'>View Attachment</button>";
//var_dump($details->stored);
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
                <tr>
                    <td class="row-head" colspan="2" style="padding-left: 60px">Personal Personal</td>
                </tr>
                <tr>
                    <td style="text-align: right">Full Name</td><td><span class='item-title'><?= $details->first_name . " " . $details->middle_name  . " " .$details->last_name  ?></span></td>
                    <!-- Pair two -->
                </tr>
                <tr>
                    <td style="text-align: right">Gender</td><td> <span class='item-title'> <?= strtolower($details->gender) == 'f'?"Female":"Male"  ?> </span></td>
                    <!-- Pair two -->
                </tr>
                <tr>
                    <td style="text-align: right">Religion</td><td> <span class='item-title'> <?= empty($details->religion)?"-":generate_religion($details->religion) ?> </span></td>
                    <!-- Pair two -->
                </tr>
                <tr>
                    <td style="text-align: right">Marital Status</td><td> <span class='item-title'><?= empty($details->marital_status)?"-":generate_marital_status($details->marital_status) ?></span> </td>
                    <!-- Pair two -->
                </tr>
                <tr>
                    <td style="text-align: right">Number of Dependants</td><td> <span class='item-title'><?= $details->dependants ?></span> </td>
                    <!-- Pair two -->
                </tr>
                <tr>
                    <td style="text-align: right">Disability</td><td> <span class='item-title'><?= $details->disabilities ?></span> </td>
                    <!-- Pair two -->
                </tr>
                <tr>
                    <td style="text-align: right">Nationality</td><td> <span class='item-title'><?= str_replace("_"," ",$details->nationality) ?></span> </td>
                    <!-- Pair two -->
                </tr>
                <tr>
                    <td style="text-align: right">Country of Birth</td><td> <span class='item-title'> <?= str_replace("_"," ",$details->birth_country) ?></span> </td>
                    <!-- Pair two -->
                </tr>
                <tr>
                    <td style="text-align: right">Place of Birth</td><td> <span class='item-title'> <?= $details->place_of_birth ?> </span></td>
                    <!-- Pair two -->
                </tr>
                <tr>
                    <td style="text-align: right">Date of Birth</td><td> <span class='item-title'> <?= $details->dob ?> </span></td>
                    <!-- Pair two -->
                </tr>

                <tr>
                    <!-- Pair two -->
                    <td style="text-align: left;padding-left: 60px" class="row-head" colspan="2">Contact Information</td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Phone Number</td><td><span class='item-title'> <?= $details->mobile_number ?><span class='item-title'> </span></td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Email Address</td><td><span class='item-title'> <?= $details->email_address ?> </span></td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Permanent Address</td><td> <span class='item-title'> <?= $details->permanent_address ?> </span> </td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Contact Address</td><td> <span class='item-title'> <?= $details->contact_address ?> </span> </td>
                </tr>
                <tr>
                    <td style="text-align: right">Current Home Place</td>
                    <td><span class='item-title'> <?= $places->get_place($details->current_loc,false,true) ?> </span></td>
                </tr>
                <tr>
                    <td style="text-align: right">Permanent Home Place</td>
                    <td><span class='item-title'> <?= $places->get_place($details->permanent_loc,false,true) ?> </span></td>
                </tr>
                </tbody>
            </table>

        </div>
        <div class="span6">
            <table class="table table-condensed table-bordered table-responsive table-labeled">
                <colgroup>
                    <col class="con1" style="text-align:right;width:40%;">
                    <col class="con0" style="width: 60%">
                    <col class="con1" style="text-align:right;width:40%;">
                    <col class="con0"  style="width: 60%">
                </colgroup>
                <tbody>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: left;padding-left: 60px" class="row-head" colspan="2">Next of Kin Contact Information</td>
                </tr>

                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Full Name</td><td><span class='item-title'> <?= $details->kin_name ?><span class='item-title'> </span></td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Phone Number</td><td><span class='item-title'> <?= $details->kin_phone ?><span class='item-title'> </span></td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Email Address</td><td><span class='item-title'> <?= $details->kin_email ?> </span></td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Contact Address</td><td> <span class='item-title'> <?= $details->kin_address ?> </span> </td>
                </tr>
                <tr>
                    <td style="text-align: right">Physical Location</td>
                    <td><span class='item-title'> <?= $places->get_place($details->kin_location,false,true) ?> </span></td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: left;padding-left: 60px" class="row-head" colspan="2">Parent or Guardian Information</td>
                </tr>

                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Full Name</td><td><span class='item-title'> <?= $details->par_name ?><span class='item-title'> </span></td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Phone Number</td><td><span class='item-title'> <?= $details->par_phone ?><span class='item-title'> </span></td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Email Address</td><td><span class='item-title'> <?= $details->par_email ?> </span></td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Contact Address</td><td> <span class='item-title'> <?= $details->par_address ?> </span> </td>
                </tr>
                <tr>
                    <td style="text-align: right">Physical Location</td>
                    <td><span class='item-title'> <?= $places->get_place($details->par_location,false,true) ?> </span></td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: left;padding-left: 60px" class="row-head" colspan="2">Bank Account Information</td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Name of Bank</td><td> <span class='item-title'> <?= $studentinfo->bank_name ?> </span> </td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Bank Branch</td><td>  <span class='item-title'> <?= $studentinfo->bank_branch ?> </span> </td>
                </tr>
                <tr>
                    <!-- Pair two -->
                    <td style="text-align: right">Account Number</td><td>  <span class='item-title'> <?= $studentinfo->bank_account_no ?> </span> </td>
                </tr>
                   <tr>
                       <td colspan="2"><?= $attachbtn ?> &nbsp;&nbsp;
                           <?php if($userdata['access_level']) { ?>
                           <button data-toggle="modal" data-target="#edit-item-data" href="<?= base_url() ?>ajax_load/form_edit?itype=student_personal_info&itemid=<?= $userdata['login_id'] ?>" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;Edit Information</button>
                           <?php } ?>
                       </td>
                   </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
<script src="<?= plugins_folder() ?>pdfobject.js" ></script>

<script  src='#http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>


