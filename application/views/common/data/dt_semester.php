<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php if($viewtype == 'table') {  ?>
        <tr class="sem-li-<?= $semOb->id ?>">
            <td class="row-head"><?= $id + 1 ?></td>
            <td><span class='item-title'><?= $semOb->name ?>(<small><?= $semOb->display_name ?></small>)</span>
            <?php
                if($showcontrols){
                    $dataInfo = array(
                        'targetCont'=> "#semester-list-contents",
                        'viewtype' => $viewtype,
                        'itemid'=>$semOb->id,
                        'profileInfo' => $userdata['profile'],
                        'itemtype' => 'semester',
                        'targetForm' => '#new-semester-data',
                        'otheritems' => '','access_level' => $userdata['access_level'],
                        'row_id'=> ".sem-li-{$semOb->id}"
                    );
                    echo $this->load->view('common/data/item_controls',$dataInfo,true);
                }
            ?>
            </td>
            <td><?= $semOb->numeric_value . "-(". $semOb->display_value .")" ?></td>
            <td><?= $semOb->year_count ?></td>
            <td><small class="message text-info"><?= empty($semOb->comments)?"--":$semOb->comments ?></small></td>

        </tr>
<?php }else{    ?>

<?php }    ?>


