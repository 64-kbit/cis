<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$item = $item['list'];

$feesurl  = base_url() . "ajax_load/form_edit?itype=fee_structure&itemid=".$item->id;
$itemsurl = base_url() . "ajax_load/form_edit?itype=fee_structure_items&itemid=".$item->id;

?>

<tr>
    <td class="row-head"><?= $item->id ?> </td>

    <td><span class="item-title"><?= $item->name ?></span><br>
        <ul class="data-item-controls list-nostyle list-inline" item-type="">
            <li data-toggle="tooltip" data-placement="top" title="Edit Fee This Fee Structure">
                <a class="btn btn-circle btn-primary" data-toggle="modal" data-target="#add-item-data" href="<?= $feesurl ?>"><i class="fa fa-pencil"></i></a></li>
            <li data-toggle="tooltip" data-placement="top" title="Edit Fee Structure Items">
                <a class="btn btn-circle btn-primary" data-toggle="modal" data-target="#edit-item-data" href="<?= $itemsurl ?>"><i class="fa fa-list"></i></a></li>
        </ul>
        </span>
    </td>
    <td><span class='text-success'>
                                           <?= number_format($item->amount,0)?> TZS</span> &nbsp;
        (<span> Min: <small class="text-info"> <?=  number_format($item->minimum_amount,0 )?>
            </small> TZS)</span>
        <br>
                                       <span class='text-info'>
                                           <?= number_format($item->amount_foreign,2 )?> USD</span> &nbsp;
        (<span> Min: <small class="text-warning"> <?=    number_format($item->minimum_foreign,2 )?>
            </small> USD)</span>
    </td>

    <td><?= $item->notation ?></td>
    <td><small class="text-primary"><?= $item->description ?></small></td>
</tr>
