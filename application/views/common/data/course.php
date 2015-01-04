<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
   <?php if($viewtype == 'table'){ ?>
<tr  class="item-row item-list-<?php echo $cz['id'];?>">
    <td class="row-head"> <?php echo $id + 1 ?> </td>
    <td style="min-width:25%"> <span class="item-title"><?php  echo $cz['name']?>(<small><?php echo $cz['code_name'] ?></small>)</span>
        <br>
        <?php

        $dataInfo = array(
            'targetCont'=> "#course-list-contents ",
            'viewtype' => $viewtype,
            'itemid'=>$cz['id'],
            'profileInfo' => $userdata['profile'],
            'itemtype' => 'course',
            'access_level' => $userdata['access_level'],
            'targetForm' => '#new-course-data',
            'otheritems' => 'department='.$cz['department_id'].'&faculty='.$cz['faculty_id'] . "&campus=".$cz['campus_id'],
            'row_id' => ".item-list-{$cz['id']}"
        );

        echo $this->load->view('common/data/item_controls',$dataInfo,true) ?>
    </td>
    <td><?php echo empty($cz['cat_name'])?"--":"({$cz['join_name']})".$cz['cat_name'] ;?></td>
    <td><?php echo date("d-M-Y",strtotime($cz['date_started'])) ?></td>
    <td><?php echo $cz['dp_name'] ?></td>
    <td><?php echo $cz['fc_name'] ?></td>
   <!-- <td><?php echo empty($cz['description'])?"--":$cz['description'] ?></td>     -->
</tr>

<?php }else{  ?>

<?php
}

   //var_dump($cz);
   ?>


