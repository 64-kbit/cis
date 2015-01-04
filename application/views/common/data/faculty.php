<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<li style="" id='item-list-<?php echo $fcdata['id'] ?> ' class="item-row  item-list-<?php echo $fcdata['id'] ?> main-cat-<?php echo $fcdata['campus_id']?>" subcat-data = '.sub-cat-<?php echo $fcdata['id'] ?>'>
    <div class="entry_wrap">
        <div class="entry_img"><img class="img-circle"  src="<?php echo base_url() ?>themes/img/logo.jpg" alt=""></div>
        <div class="entry_content_img">
            <span class="date pull-right" title="Date Added"><small><?php echo $fcdata['date_added']?></small></span>
            <h4  class="item-title"><?php echo $fcdata['facult_name']?></h4>
            <p>Campus-><strong><?php echo $fcdata['campus']?></strong> <br> Head-><em> <?php echo $fcdata['head']?> </em></p>
            <?php
            $dataInfo = array(
                'targetCont'=> "#faculty-list-contents ",
                'viewtype' => 'li',
                'itemid'=>$fcdata['id'],
                'profileInfo' => $userdata['profile'],
                'itemtype' => 'faculty','access_level' => $userdata['access_level'],
                'targetForm' => '#new-faculty-data',
                'otheritems' => 'campus='.$fcdata['campus_id'] ,
                'row_id'=>'.item-list-'.$fcdata['id']
            );

            echo $this->load->view('common/data/item_controls',$dataInfo,true) ?>
        </div>
    </div>
</li>
