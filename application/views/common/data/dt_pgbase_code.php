<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<tr class="item-list-<?= $ob['id'] ?>">
    <td class="row-head"><?= $id + 1  ?></td>
    <td><span class="item-title"> <?= $ob['code_name'] ?> (<small><?= $ob['display_name'] ?></small>) </span>
        <br>
        <?php

        $dataInfo = array(
            'targetCont' => "#pg_basecode-list-contents ",
            'viewtype' => 'table',
            'itemid' => $ob['id'],
            'profileInfo' => $userdata['profile'],
            'itemtype' => 'pg_basecode',
            'access_level' => $userdata['access_level'],
            'targetForm' => '#new-pg_basecode-data',
            'otheritems' => 'course_cat='.$ob['course_category_id'] . "&program_id=".$ob['program_id'],
            'row_id' => ".item-list-{$ob['id']}"
        );

        echo $this->load->view('common/data/item_controls',$dataInfo,true) ?>

    </td>
    <td><?= $ob['categories'] ?> </td>
    <td><?= $ob['pg_name'] ?></td>
    <td><?= $ob['pg_name'] ." ". $ob['join_name'] ." ". $ob['cat_name'] ?> </td>
</tr>
