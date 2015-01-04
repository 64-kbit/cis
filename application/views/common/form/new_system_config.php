<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**@var Holds all the form input values & variables $input_data
 * @desc this form is for adding/editing academic years
 */

$dataE = isset($input_data)?$input_data['data']:false;
$modalTitle = "Update System Informaton"

?>
<?php echo form_open(base_url().user_profile($userdata['profile']) ."/ajax_load/update_system_info?type=system",'class="stdform stdform2" id="system-config-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>

    <div class="par">
        <label>System Display Name<small>Common System Name</small></label>
            <span class="field text-success">
                 <?= form_input("display_name",$config['display_name'],"" )?>
            </span>

    </div>

    <div class="par">
        <label>System Name<small>Name of the System</small></label>
            <span class="field text-success">
                 <?= form_input("sys_name",$config['sys_name']) ?>
            </span>

    </div>

    <div class="par">
        <label>Code Name<small>System Code Name</small></label>
            <span class="field text-success">
                 <?= form_input("code_name",$config['code_name']) ?>
            </span>

    </div>

    <div class="par">
        <label>Version<small>System Version</small></label>
            <span class="field text-success">
                 <?= form_input("version",$config['version']) ?>
            </span>

    </div>

    <div class="par">
        <label>Support Address<small>System Developers Email</small></label>
            <span class="field text-success">
                 <?= form_input("support_email",$config['support_email']) ?>
            </span>

    </div>

<?php echo form_close();
$actButton ='<button type="button" class="btn btn-primary add-data-action modal-control-btn" target-div="#sys_info-list-contents" target-modal="#add-item-data" target-form=\'#system-config-data\'>Save changes</button>';
?>


<script>
    jQuery("#datepicker, #datepicker2").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });

    updateModaltitle(1,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;

</script>
