<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
  <?php if($viewtype =='table' ){
      if($dp_type == 2) {
      ?>
<tr class="item-row item-list-<?php echo $dp['dp_id'] ?> cat-cm-<?php echo $dp['campus_id'] ?>">
    <td class="row-head"> <?= $id + 1 ?></td>

    <td style="min-width:20%">
        <span   class="item-title" data-id=""<?php echo $dp['dp_id'] ?>"><?php echo $dp['name'] ?></span><br>
        <?php
        $dataInfo = array(
            'targetCont'=> "#department-list-contents",
            'viewtype' => $viewtype,
            'itemid'=>$dp['dp_id'],
            'profileInfo' => $userdata['profile'],
            'itemtype' => 'department', 'access_level' => $userdata['access_level'],
            'targetForm' => '#new-department-data',
            'otheritems' =>  "campus=".$dp['campus_id']. '&type=2',
            'row_id'=>".item-list-{$dp['dp_id']}"
        );

        echo $this->load->view('common/data/item_controls',$dataInfo,true) ?>

    </td>
    <td class="left"><?php echo $dp['head'] ?></td>
    <td class="left"><?php echo $dp['description'] ?></td>
</tr>
    <?php }else { ?>
          <tr class="item-row item-list-<?php echo $dp['dp_id'] ?>  cat-cm-<?php echo $dp['campus_id'] ?>">
              <td class="row-head"> <?= $id + 1 ?></td>
              <td><span href="#"  class="item-title" data-id=""<?php echo $dp['dp_id'] ?>"><?php echo $dp['name'] ?></span>
                  <br>
                  <?php
                  $dataInfo = array(
                      'targetCont'=> "#department-list-contents ",
                      'viewtype' => $viewtype,
                      'itemid'=>$dp['dp_id'],
                      'profileInfo' => $userdata['profile'],
                      'itemtype' => 'department', 'access_level' => $userdata['access_level'],
                      'targetForm' => '#new-department-data',
                      'otheritems' => 'faculty='.$dp['facult_id']. "&campus=".$dp['campus_id']. '&type=1',
                      'row_id'=>".item-list-{$dp['dp_id']}"
                  );

                  echo $this->load->view('common/data/item_controls',$dataInfo,true) ?>
              </td>
              <td class="center"><?php echo $dp['code_no'] ?></td>
              <td class="left"><?php echo $dp['code'] ?></td>
              <td class="left"><?php echo $dp['head'] ?></td>
              <td class="left"><?php echo $dp['description'] ?></td>
          </tr>
      <?php } ?>

  <?php }else { ?>

  <?php } ?>

