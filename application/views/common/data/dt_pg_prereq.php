<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>

<tr>
    <td class="row-head"><?= $id + 1 ?> </td>
    <td><span class='item-title'><?= $ob->name ?></span></td>
    <td><?= $ob->award_name ?></td>
    <td><span class="badge badge-success"> <?= $ob->level_count ?></span></td>
    <td><?= generate_form_list($ob->form_id) ?></td>

</tr>
