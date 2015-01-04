<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<tr class="item-list-<?= $course->id ?>">
    <td>
        <?= $id + 1 ?>
    </td>
    <td>
        <?= $course->display_name ?>
        <br>
        <?php

        $dataInfo = array(
            'targetCont'=> "#pgcourse-list-contents ",
            'viewtype' => $viewtype,
            'itemid'=>$course->id,
            'profileInfo' => $userdata['profile'],
            'itemtype' => 'pgcourse',
            'access_level' => $userdata['access_level'],
            'targetForm' => '#new-pgcourse-data',
            'otheritems' => 'department='.$course->department_id.'&faculty='.$course->faculty_id . "&campus=".$course->campus_id . "&semester=" . $course->semester_structure_id,
            'row_id' => ".item-list-{$course->id}"
        );

        echo $this->load->view('common/data/item_controls',$dataInfo,true) ?>
    </td>
    <td>
        <?= $course->code_name ?>
    </td>
    <td>
        <?= $course->year_started ?>
    </td>
</tr>
