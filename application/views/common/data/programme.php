<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if(is_array($pg)){
    if($viewtype == 'table'){   ?>

        <tr class="item-row item-list-<?php echo $pg['id'];?>">
           <td class="row-head">
               <?php echo $id + 1 ?>
            </td>
            <td>
             <span class="item-title"> <?php echo  $pg['name'] ." (<small>" . $pg['display_name'] . "</small>)" ?>  </span>
                <br>
               <?php

                $dataInfo = array(
                   'targetCont'=> "#programme-list-contents ",
                    'viewtype' => $viewtype,
                    'itemid'=>$pg['id'],
                    'profileInfo' => $userdata['profile'],
                    'itemtype' => 'programme',
                    'access_level' => $userdata['access_level'],
                    'targetForm' => '#new-programme-data',
                    'otheritems' => 'parent='.$pg['parent_program_id'] . "&campus=".$pg['campus_id'],
                    'row_id' => ".item-list-{$pg['id']}"
                );

               echo $this->load->view('common/data/item_controls',$dataInfo,true) ?>
            </td>
            <td>
                <?php echo $pg['parent_program_id']==0?'BASE':strtoupper($pg['pg_parent']) ?>
            </td>
            <td>
                <?php echo $pg['campus_name'] ?>
            </td>
            <td class="left">
                <?php echo  $pg['code'] . (empty($pg['code_no'])?"": " ( ".$pg['code_no'].")" )?>
            </td>
            <td  class="center">
                <?php echo $pg['nta_level'] ?>
            </td>
            <td  class="center">
                <?php echo programme_year_list(false,$pg['level_year'],true) ?>
            </td>
            <td>
                <?php echo $pg['year_started'] ?>
            </td>
           <!-- <td><?php echo $pg['description'] ?></td>   -->
        </tr>

 <?php   }
}    ?>
