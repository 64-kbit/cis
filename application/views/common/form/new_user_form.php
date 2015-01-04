<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$input_data = isset($input_data)?$input_data['data']:false;

$modalTitle = $input_data?"Edit User Information":"Add New User ";
$dp =  new Department();

$listd = $dp->get_department_list();

$deparmetns = array('--'=>"Academic departments list !... ");

foreach($listd['list'] as $id => $ls){
   // var_dump($ls);
    $deparmetns[$ls['dp_id']] = $ls['name'] . "(" . $ls['code'] . ")";
}

$profiles = user_profile();

//var_dump($input_data);
?>

<?php echo form_open(base_url() ."admin/ajax_load/create_user",'class="stdform stdform2" id="new-user-data"',array('token'=>$currenttoken)  + (isset($fkeys)?$fkeys:array()));     ?>
<input type="hidden" name="formaction" value="<?php echo isset($formaction)?$formaction:"" ?>" />

<p>
    <label>Name<small>Specify First name of the User</small></label>
        <span class="field">
            <?php echo form_input('first_name',isset($input_data['fname'])?$input_data['fname']:""," placeholder ='First Name' class='required-data'") ?>
            <?php echo form_input('last_name',isset($input_data['lname'])?$input_data['lname']:""," placeholder ='Last Name' class='required-data'") ?>
        </span>
</p>
<p>
    <label>Gender</label>
    <span class="field">
        <label class="inline no-padding no-margins">
            <input type="radio" name="gender"  value="F" <?= isset($input_data['gender'])?strtoupper($input_data['gender'])=="F"?"checked":"":"" ?> />Female
        </label>

        <label class="inline no-padding no-margins">
            <input type="radio" name="gender" value="M" <?= isset($input_data['gender'])?strtoupper($input_data['gender'])=="M"?"checked":"":"" ?> />Male
        </label>
    </span>
</p>
<p>
    <label>Login ID<small>Specify ID to be used to login into the system</small></label>
        <span class="field">
            <?php echo form_input('login_id',isset($input_data['login_id'])?$input_data['login_id']:"","class='required-data'") ?>
        </span>
</p>

<p>
    <label>Password<small>Specify the Login Password to be used by the user</small></label>
        <span class="field">

            <?php echo form_password('password',"default-pass","placeholder='Login password' class='required-data'") ?>
        </span>
</p>
<p>
    <label>Email Address<small>Specify User Email Address</small></label>
        <span class="field">
            <?php echo form_input('email',isset($input_data['email_address'])?$input_data['email_address']:"","class='required-data'") ?>
        </span>
</p>
<p>
    <label>User Role<small>Specify the User Role and Category</small></label>
    <span class="field">
         <?= form_dropdown('user_profile',array('--'=>'Available User Profiles ...') + $profiles,isset($input_data['profile'])?$input_data['profile']:"--","class='required-data chosen-select input-xlarge' data-placeholder='User Profile ...' ") ?>
    </span>
</p>

<p>
    <label>Department<small>To which the user have belongs to!<br>Applies to users uder department Profile</small></label>
    <span class="field">
          <?= form_dropdown('department',$deparmetns,isset($input_data['department_id'])?$input_data['department_id']:"",'class="input-xlarge chosen-select"')?>
    </span>
</p>

<p>
    <label>Access Level<small>Specify the Permissions for the User</small></label>
    <span class="field">
        <label class="inline no-padding no-margins">
            <input type="checkbox" name="default_access" readonly disabled  value="0" checked />
            Can Read & View Data
        </label>&nbsp;&nbsp;|&nbsp;
         <label class="inline no-padding no-margins">
             <input type="checkbox" name="access_level" value="1" <?= isset($input_data['access_level'])?$input_data['access_level'] == 1?"checked":"":""  ?> />
             Can Make Changes to Data
         </label>
    </span>
</p>


<?php  echo form_close() ?>

<?php if(isset($input_data) && $input_data){
    $actButton = '<button type="button" class="btn btn-primary edit-data-action modal-control-btn" target-div="#user-list-contents" target-modal="#edit-item-data" target-form="#new-user-data">Update changes</button>';
}else{
    $actButton ='<button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#user-list-contents" target-modal="#add-item-data" target-form="#new-user-data">Save changes</button>';
}  ?>

<div class="scripts">
    <script>

        updateModaltitle(<?= $input_data !=false?2:1 ?>,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;


        jQuery("#datepicker-<?= $formtype ?>").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
        jQuery('.chosen-select').chosen();
        jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});


    </script>

</div>


