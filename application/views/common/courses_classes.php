<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$csOb = new studentClassStream();

 $strObj = new ClassStream();
$streams= $strObj->get_list();

//var_dump($csOb);
//foreach($csOb as $id => $list)

$acyear = new AcademicYear();
$curr = $acyear->get_current_academic_year();
$dpid = false;
if($userdata['profile'] == 'department'){
    $dpid = $userdata['user_info']['id'];
}
$classes_list  = $csOb->get_streams($dpid);
//var_dump($classes_list);
  $currentDate = time();
?>

<div class="span12" >

    <div id="tabs" class="tabbedwidget tab-primary no-padding">
        <ul>
            <li><a href="#tab-1">  <h4 class="">Current Year Classes </h4>  </a></li>
            <li><a href="#tab-2">
                    <h4 class="">Previous Academic Year Classes</h4>   </a></li>

            <li><a href="#tab-3">
                        <h4 class=""><?php echo $config['org_abbr'] ." ". $config['org_type'] ?> Streams Distribution</h4></a></li>
        </ul>
        <div id="tab-1">
            <div class="options-menu">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=currentcourse_class&token=<?php echo $currenttoken ?>"><i class="fa fa fa-plus"></i>&nbsp;Create New Classes</a>
                        </li>
                       <!-- <li>
                            <a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=oldcourse_class&token=<?php echo $currenttoken ?>"><i class="fa icon-plus"></i>&nbsp;Add old Classes</a>
                        </li>  -->
                        <li class="divider"></li>
                        <li><a href="#" onclick="alert('Not Implemented')"><i class="fa  fa-print"></i>&nbsp;Print List</a></li>
                    </ul>
                </div>
            </div>
             <div class="widget no-margins no-padding" style='min-height:300px'>
            <table class="table table-striped responsive dataTable"  id="currentcourse_class-list-table">
                <colgroup>
                    <col class="row-head" style="text-align: center; width: 3%">


                </colgroup>
                <thead class="bg-primary">
                <tr>
                    <th># </th>
                    <th>Year</th>
                    <th>YOS</th>
                    <th>Programme Course</th>
                    <th>Class Code</th>
                    <th>Semester</th>
                    <th>Capacity</th>
                    <!--<th>Description</th>   -->
                </tr>
                </thead>
                <tbody count-indicator=".currentcourse_class-count-indicator" id="currentcourse_class-list-contents<?php //echo $dp_type; ?>">
                <?php

                if(is_array($classes_list) && count($classes_list) > 0) {
                    $count = 1;
                    foreach($classes_list as $id => $czClass){

                      //  $status = $currentDate > strtotime($czClass['end_date']) ?0:1;


                       if($czClass['academic_year'] != $curr->notation ){
                           $count += 1;
                           continue;
                       }
                        $viewtype = 'table';
                       // echo $this->load->view('admin/data/pg_course',array('id'=>$id,'course'=>$course,'viewtype'=>'table'),false);     ?>

                        <tr class="item-list-<?= $czClass['id'] ?>">
                            <td class="row-head"><?= $id + 2 - $count  ?></td>
                            <td title="(<?= format_date($czClass['start_date'],2,false) . "-" .  format_date($czClass['end_date'],2,false) ?>)"> <?= $czClass['academic_year'] ?>

                            </td>
                            <td>
                                <?= programme_year_list(false,$czClass['class_year'],true) ?>
                            </td>

                            <td><span class="item-title"> <?= $czClass['class_name'] . (empty($czClass['class_alias']) != false?"<small>{$czClass['class_alias']}</small>":""); ?> </span>
                                <?php

                                $dataInfo = array(
                                    'targetCont'=> "#currentcourse_class-list-contents ",
                                    'viewtype' => 'table',
                                    'itemid'=>$czClass['id'],
                                    'profileInfo' => $userdata['profile'],
                                    'access_level' => $userdata['access_level'],
                                    'itemtype' => 'currentcourse_class',
                                    'targetForm' => '#new-currentcourse_class-data',
                                    'showprint'=>true,
                                    'pdf_title'=>"Students List PDF",
                                    'excel_title'=>"Students List Excel",
                                    'otheritems' => 'pg='.$czClass['programs_id'].'&cz='.$czClass['dp_course_id'].'&acyear='.$czClass['academic_year_id'].'&semester='.$czClass['semester_id'].'&class='.$czClass['code_name'],
                                    'row_id' => ".item-list-{$czClass['id']}"
                                );

                                echo $this->load->view('common/data/item_controls',$dataInfo,true);
                                ?>

                            </td>
                            <td> <?= empty($czClass['code_name'])?"--":$czClass['code_name'] ?> </td>
                            <td ><span  title="<?= $czClass['sem_dname'] ?>"><?= $czClass['sem_name'] ?></span></td>
<td> <?= $czClass['capacity'] ?> (<small class="text-success"> <?= $csOb->count_students($czClass['id'],$czClass['semester_id']) ?> </small>)</td>
                        </tr>

                <?php
                    }

                }         ?>
                </tbody>
            </table>
             </div>
        </div>

        <div id="tab-2">
            <div class="options-menu">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=autocourse_class&token=<?php echo $currenttoken ?>"><i class="fa fa fa-plus"></i>&nbsp;Create New Classes</a>
                        </li>
                        <!-- <li>
                            <a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=oldcourse_class&token=<?php echo $currenttoken ?>"><i class="fa icon-plus"></i>&nbsp;Add old Classes</a>
                        </li>  -->
                        <li class="divider"></li>
                        <li><a href="#" onclick="alert('Not Implemented')"><i class="fa  fa-print"></i>&nbsp;Print List</a></li>
                    </ul>
                </div>
            </div>
            <div class="widget no-margins no-padding" style='min-height:300px'>
                <table class="table table-striped responsive dataTable"  id="pgcourse-list-table">
                    <colgroup>
                        <col class="con0" style="text-align: center; width: 3%">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Year</th>
                        <th>YOS</th>
                        <th>Programme Course</th>
                        <th>Class Code</th>
                        <th>Semester</th>
                        <th>Capacity</th>
                        <!--<th>Description</th>   -->
                    </tr>
                    </thead>
                    <tbody count-indicator=".course_class-count-indicator" id="course_class-list-contents<?php //echo $dp_type; ?>">
                    <?php

                    if(isset($result->num_rows) && $result->num_rows > 0) {
                        $count = 1;
                        foreach($classes_list as $id => $czClass){
                          //  $status = $currentDate > strtotime($czClass['start_date']) ?0:1;
                            if($czClass['academic_year'] == $curr->notation){
                                $count += 1;
                                continue;
                            }
                            $viewtype = 'table';
                            // echo $this->load->view('admin/data/pg_course',array('id'=>$id,'course'=>$course,'viewtype'=>'table'),false);     ?>

                            <tr>
                                <td class="row-head"><?= $id + 2 - $count ?></td>
                                <td title="(<?= format_date($czClass['start_date'],2,false) . "-" .  format_date($czClass['end_date'],2,false) ?>)"> <?= $czClass['academic_year'] ?>

                                </td>
                                <td>
                                    <?= programme_year_list(false,$czClass['class_year'],true) ?>
                                </td>

                                <td><span class="item-title"> <?= $czClass['class_name'] . (empty($czClass['class_alias']) != false?"<small>{$czClass['class_alias']}</small>":""); ?> </span>

                                    <?php

                                    $dataInfo = array(
                                        'targetCont'=> "#course_class-list-contents ",
                                        'viewtype' => 'table',
                                        'itemid'=>$czClass['id'],
                                        'profileInfo' => $userdata['profile'],
                                        'access_level' => $userdata['access_level'],
                                        'itemtype' => 'course_class',
                                        'targetForm' => '#new-course_class-data',
                                        'pdf_title'=>"Students List PDF",
                                        'excel_title'=>"Students List Excel",
                                        'otheritems' => 'pg='.$czClass['programs_id'].'&cz='.$czClass['dp_course_id'].'&acyear='.$czClass['academic_year_id'].'&semester='.$czClass['semester_id'].'&class='.$czClass['code_name'],
                                        'row_id' => ".item-list-{$czClass['id']}"
                                    );

                                    echo $this->load->view('common/data/item_controls',$dataInfo,true) ?>

                                </td>
                                <td> <?= empty($czClass['code_name'])?"--":$czClass['code_name'] ?> </td>
                                <td ><span data-toggle='tooltip' title="<?= $czClass['sem_dname'] ?>"><?= $czClass['sem_name'] ?></span></td>
                                <td> <?= $czClass['capacity'] ?> (<small class="text-success"> <?= $csOb->count_students($czClass['id']) ?> </small>)</td>

                            </tr>

                        <?php
                        }

                    }         ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="tab-3">
            <div class="options-menu">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=class_stream&token=<?php echo $currenttoken ?>"><i class="fa fa-plus"></i>&nbsp;Set New Stream</a></li>
                        <li class="divider"></li>

                    </ul>
                </div>
            </div>
            <div style='min-height:300px' class="widget no-margins">
                <table class="table table-bordered responsive"  id="streams-list-table">
                    <colgroup>
                        <col class="con0" style="align: center; width: 2%">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                        <col class="con0">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>Stream Name</th>
                        <th>Code</th>
                        <th>Display Name</th>
                        <th>Capacity</th>
                        <th>Description</th>
                        <!--<th>Description</th>   -->
                    </tr>
                    </thead>
                    <tbody count-indicator=".streams-count-indicator" id="streams-list-contents<?php //echo $dp_type; ?>">
                    <?php if(isset($streams['count']) && $streams['count'] > 0) {
                        foreach($streams['list'] as $id => $str){
                            $viewtype = 'table';   ?>
                           <tr>
                               <td><?= $id + 1 ?> </td>
                               <td><?= $str->name ?></td>
                               <td><?= $str->code ?></td>
                               <td><?= $str->display_name ?></td>
                               <td><?= $str->students_limit ?></td>
                               <td><?= $str->description ?></td>
                           </tr>
                    <?php
                    }
                    } ?>
                    </tbody>
                </table>

            </div>

        </div>
    </div>

</div>


<div style="display: none">
    <script>
        jQuery('.dataTable').dataTable(
            {
                'dom':'<"top"lfpi><"#table_wrapper"t><"bottom"lfpi><"clear">'
            }
        );
    </script>
</div>
