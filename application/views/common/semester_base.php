<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$semObj = new Semester();
$acSem = new AcademicYear();
$semStructure = new SemesterStructure();
$semesters = $semObj->get_list();
$academic_year = $acSem->get_list();
$sem_structures =  $semStructure->get_semesters_list();
    $acYears = array();
?>


 <div class="row-fluid">
<div class="span12">
    <div id="tabs" class="tabbedwidget tab-primary no-padding">
        <ul>
            <li>
                <a href="#tab-1">
                    <h4 class=""><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp; Academic Years</h4> </a>
            </li>

            <li>
                <a href="#tab-2">
                    <h4 class=""><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp; Semester Structure</h4> </a>
            </li>

            <li><a href="#tab-3">
                    <h4 class=""><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp; Semesters List</h4>
                </a>
            </li>

        </ul>

        <div id="tab-1" class="tab-pane active no-padding">
            <div class="widgetcontent no-borders">
                <?php if($academic_year['count'] > 0) : ?>
                    <div class="slimScrollDiv" style=" height: 400px;">
                        <div id="scroll1" class="mousescroll" style=" height:400px;">
                            <button class='btn btn-primary' href="<?php echo base_url() ?>ajax_load/form?name=academic_year&token=<?php echo $currenttoken ?>" data-toggle="modal" data-target="#add-item-data"><i class="fa fa-plus"></i> New Academic Year&nbsp;</button>
                            <span class="badge-important badge">Total Academic Years Up to date:</span>
                                            <span class="academic_year-list-contents-count badge badge-info"><?= $academic_year['count'] ?>
                                        </span>

                            <ul class="entrylist" id="academic_year-list-contents">

                                <?php foreach($academic_year['list'] as $id => $acY) :
                                    $viewtype = 'li';
                                    $id_type = $id/2== 0? 'even':"odd";
                                    $acYears[$acY->id] = $acY->notation;
                                    echo $this->load->view('common/data/sem_acYear',array('viewtype'=>'li','id'=>$id,'acY'=>$acY,'id_type'=>$id_type,'total'=>$academic_year['count']),true) . "<br>" ;
                                endforeach ; ?>


                            </ul>
                        </div>
                    </div>

                <?php else : ?>
                    <div class="messagebox warning">
                        No Academic Years Added!<br>
                        <button class='btn btn-primary' href="<?php echo base_url() ?>ajax_load/form?name=academic_year&token=<?php echo $currenttoken ?>" data-toggle="modal" data-target="#add-item-data"><i class="fa fa-plus"></i> New Academic Year&nbsp;</button>
                    </div>

                <?php endif ?>

            </div>
        </div>

        <div id="tab-2" class="tab-pane ">
            <div class="widgetcontent no-padding no-borders">

                <h4 class="subtitle" style="color:#222;"> Semester Structures List</h4>

                <p>
                    <button href="<?php echo base_url() ?>ajax_load/form?name=semester_structure&token=<?php echo $currenttoken ?>" class="btn btn-primary" data-toggle="modal" data-target="#add-item-data"><i class="fa fa-plus"></i> &nbsp;Add New Structure</button>
                <div class="" style="height: 300px">
                    <div class="tabs-left" >
                        <ul class="nav nav-tabs" id="semester_structure-list-contents">
                            <?php if(isset($sem_structures) && $sem_structures['count'] > 0):
                                $container = "";
                                foreach($sem_structures['list'] as $id => $seSt):
                                    ?>
                                    <li id="item-li-<?= $seSt->id ?>"  class="<?=(($id==0)?'active':"")?>"><a class="item-title"  data-toggle="tab" href="#tabId-<?= $seSt->id ?>"><?= $seSt->name ."(".$seSt->code_name .")&nbsp;<span class='badge pull-right badge-inverse'>".$seSt->count."</span>"?></a></li>
                                    <?php
                                    $container .= "<div style='background:#fff;color:#444;' id='tabId-".$seSt->id . "' class='tab-pane ".(($id==0)?'active':"")."'>". $seSt->html_sem_list($this->System_core,'li-tabbed') ."</div>";
                                endforeach;
                            else : ?>
                                <li class=""><a data-toggle="tab" href="#no-content">No Structures</a></li>
                                <?php $container = "<div id='no-content' class='tab-pane text-warning'>No Structures added</div>" ; endif ?>
                        </ul>
                        <div class="tab-content" id="jsScriptLoadContents">
                            <?= $container ?>
                        </div><!--tab-content-->
                    </div>
                </div>
                </p>
            </div>
        </div>

        <div id="tab-3" class="tab-pane">
            <button class="btn btn-primary" href="<?php echo base_url() ?>ajax_load/form?name=semester&token=<?php echo $currenttoken ?>" data-toggle="modal" data-target="#add-item-data"><i class="fa fa-plus"></i> &nbsp;Add New Semester</button>
            <div class="table-wrapper">
                <table class="table table-bordered responsive" id="semester-list-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Semester Title</th>
                        <th> Value</th>
                        <th>Year </th>
                        <th>Remarks</th>
                    </tr>
                    </thead>
                    <colgroup>
                        <col class="con0" style="text-align:center;width:2%"> </col>
                        <col class="con1" style="min-width: 200px"> </col>
                        <col class="con0"> </col>
                        <col class="con1"> </col>
                        <col class="con0"> </col>
                    </colgroup>
                    <tbody id="semester-list-contents">
                    <?php if(isset($semesters) && $semesters['count'] > 0):

                        foreach($semesters['list'] as $id => $semObj) :

                            echo $this->load->view('common/data/dt_semester',array('semOb'=>$semObj,'id'=>$id,'viewtype'=>'table'),true);
                        endforeach;
                    else: ?>
                        <tr><td>-</td><td colspan="5"><span class="warning">No Semesters Added</span></td></tr>
                    <?php endif ?>
                    </tbody>

                </table>

            </div>

        </div>
    </div>


</div>


<div class="scripts">

    <script>
        jQuery(".slimScrollDiv").slimScroll({height:"400px",width:'100%'})
    </script>
</div>
