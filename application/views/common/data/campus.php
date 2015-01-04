<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/** Campus list file
 * Typically it is for displaying list of campuses either major view or tabular view
 can be used via ajax calls or normal call
 */



    if($campus_li['status'] && $viewtype == 'li'){
        $cdata = $campus_li['data'];
        ?>

        <li style="" id="dt-li-<?php echo  $cdata['id'] ?>" sub-cat = 'cat-cm-<?php echo $cdata['id']?>' cat-data=".main-cat-<?php echo $cdata['id']?>" class="item-row <?php echo $id==0?'selected':"" . " " . $id_type ?>">
            <div class="entry_wrap">
                <div class="entry_img"><img class='img-circle' src="<?php echo base_url() ?>themes/img/logo.jpg" alt=""></div>
                <div class="entry_content">
                    <span class="date pull-right" title="Date Added"><small><?php echo $cdata['year_created']?></small></span>
                    <h4  class="item-title"><?php echo $cdata['name']?></h4>
                    <p>Location-><strong><?php echo $cdata['location']?></strong> <br> Head-><em> <?php echo $cdata['head']?> </em></p>
                    <?php
                    $dataInfo = array(
                        'targetCont'=> "#campus-list-contents ",
                        'viewtype' => $viewtype,
                        'itemid'=>$cdata['id'],
                        'profileInfo' => $userdata['profile'],
                        'itemtype' => 'campus',
                        'targetForm' => '#new-campus-data',
                        'otheritems' => '', 'access_level' => $userdata['access_level'],
                        'row_id'=> "#dt-li-{$cdata['id']}"
                    );

                    echo $this->load->view('common/data/item_controls',$dataInfo,true) ?>


                </div>

            </div>
        </li>

 <?php   }else{ ?>

 <?php   }   ?>

