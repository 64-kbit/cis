<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
   $app = new SASStudent();
$apps = $app->selected_students();
if(is_array($apps) && count($apps) > 0){
    foreach($apps as $id => $data){     ?>
        <tr id="rowid-<?= $id ?>">
            <td st-id="<?= $data['f_id'] ?>">
                <input type="checkbox" class="applicants" name='applicant_list[]' value="<?= $data['f_id'] ?>" >
            </td>
            <td >
                <?= $id + 1 ?>
            </td>
            <td st-appid="<?= $data['app_id'] ?>"><span style="color: #555" ><?= $data['f_id'] ?><br>(<small class="text-info" ><?= $data['app_id'] ?></small>)</span></td>
            <td><?php
                $actionurl = base_url() . "admin/admit_applicant?appid={$data['app_id']}&fid={$data['f_id']}";
                $admiturl = base_url() . "ajax_load/form?nextitem=%23rowid-{$id}&appid={$data['app_id']}&fid={$data['f_id']}&name=admit_applicant&token={$currenttoken} ";
                echo  ($data['registered_id']== '-')?
                    "<button class='btn btn-primary' target-url='{$actionurl}' data-toggle='modal' data-target='#add-item-data' href='{$admiturl}'><i class='glyphicon glyphicon-plus-sign'></i>&nbsp;&nbsp;Admit</button>
                                     "
                    :$data['registered_id'] ?></td>
            <td st-name><?= name_format($data['fname'],$data['mname'],strtoupper($data['lname']),0) ?></td>
            <td st-gender><?= $data['gender'] ?></td>
            <td><?= $data['mobile_number'] ?></td>
            <td st-course><small data-toggle="tooltip" title="<?= $data['selected_course'] ?>" class='text-success'><?= $data['selected_code'] ?></small></td>
            <td><span class="badge badge badge-<?= $data['batch']== 1?"success":"warning" ?>"> <?= $data['batch'] ?></span></td>
            <td><span class='text-info small'><small><?= $data['app_choices'] ?></small></span></td>
        </tr>
    <?php          }
    }

?>
