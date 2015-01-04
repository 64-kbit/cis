<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if($viewtype == 'li'): ?>

<li id="dt-li-<?=$acY->id ?>" style="width: 400px;height: 160px;margin: 10px"  class=" item-row <?= $id==0?'selected':"" . " " . $id_type ?>">
    <div class="entry_wrap">
          <span class="date pull-right"> <small style="font-size:16px;" class="badge badge-<?= ($acY->current_semester)== 1?'info':'warning'?>"><?= ($total - $id) ?></small></span>
            <span class="date pull-right" title="Status">
               <small class="badge badge-<?= ($acY->current_semester)?"info":'inverse' ?>"><?= ($acY->current_semester)?'Current Academic Year':"Past Academic Year" ?></small></span>

            <h4  class="item-title subtitle" style="font-size:18px;color:#000"><?= $acY->notation ?></h4>
             <span class="date pull-left">
                  <small class="badge badge-info"><?= date("D d M, Y",strtotime($acY->start_date)) . " - " . date("D d M, Y",strtotime($acY->end_date))?></small>
             </span>
            <?php if(!empty($acY->comments)): ?>
            <p> <small> <?= $acY->comments ?> </small></p>
            <?php endif ?>  <br>
            <p>
            <?php

    if(!isset($showcontrols) && $showcontrols == true || true):
            $dataInfo = array(
                'targetCont'=> "#academic_year-list-contents ",
                'viewtype' => $viewtype,
                'itemid'=>$acY->id,
                'profileInfo' => $userdata['profile'],
                'itemtype' => 'academic_year',
                'targetForm' => '#new-academic_year-data',
                'otheritems' => '','access_level' => $userdata['access_level'],
                'row_id'=> "#dt-li-{$acY->id}"
            );
                 echo $this->load->view('common/data/item_controls',$dataInfo,true);
    endif   ;

            if($acY->current_semester):

             ?>

               </p>
         <button class="btn btn-primary" data-toggle="modal" data-target="#edit-item-data" href="<?= base_url(). 'ajax_load/form_edit?itype=acyear_timetable&itemid=' .$acY->id ?>"><i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;Semester Timetable</button>

               <?php else:  ?>
                   <button class="btn" data-toggle="modal" data-target="#edit-item-data" href="<?= base_url(). 'ajax_load/form_edit?itype=acyear_timetable&itemid=' .$acY->id ?>"><i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;Semester Timetable</button>
          <?php     endif;
               ?>

    </div>

</li>
<?php else: ?>

<?php endif ?>

