<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
  <?php
        $czcat = new CourseCategory();
  $list = $czcat->get_list();
  $pgbase = new ProgramBaseCode();
  $pgpre = new ProgrammePre();
  $bcodes = $pgbase->get_list();

  ?>

<div class="span12" >

    <div id="tabs" class="tabbedwidget tab-primary no-padding">
        <ul>
            <li><a href="#tab-1"><h4 class=""> Programmes</h4></a></li>
            <li><a href="#tab-2"><h4 class=""> Programme Prerequisites</h4></a></li>
            <li><a href="#tab-3"><h4 class=""> Base Codes</h4></a></li>
            <li><a href="#tab-4"><h4 class="">Courses List</h4></a></li>
            <li><a href="#tab-5"><h4 class="">Course Categories</h4></a></li>
        </ul>

        <!-- Prgogrammes list -->
        <div id="tab-1">
             <div class="options-menu">
                 <div class="btn-group">
                     <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                     <ul class="dropdown-menu">
                         <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=programme&token=<?php echo $currenttoken ?>"><i class="fa fa-plus"></i>&nbsp;Add New Programme</a></li>
                         <li><a href="" ><i class="fa fa-recycle"></i>View Trashed</a></li>
                         <li class="divider"></li>
                         <li><a href="#"><i class="fa  fa-print"></i>&nbsp;Print Programmes List</a></li>
                     </ul>
                 </div>
             </div>
                <div class=" no-padding">
                    <table class="table table-bordered responsive"  id="programmed-list-table">
                        <colgroup>
                            <col class="con0" style="align: center; width: 2%">
                            <col class="con1">
                            <col class="con0">
                            <col class="con1">
                            <col class="con0">
                            <col class="con1">
                            <col class="con0">
                            <col class="con1">
                            <col class="con0">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Programme Name</th>
                            <th>Next</th>
                            <th>Campus</th>
                            <th>Code</th>
                            <th>NTA</th>
                            <th>Level Year</th>
                            <th>Year Started</th>
                            <!--<th>Description</th>   -->
                        </tr>
                        </thead>
                        <tbody count-indicator=".programme-count-indicator" id="programme-list-contents<?php //echo $dp_type; ?>">
                        <?php
                        if(isset($programme_li['list']) && $programme_li['count'] > 0){

                            foreach($programme_li['list'] as $id => $dp ){
                                $viewtype = 'table';
                                $dp_type = 1;

                                $this->load->view('common/data/programme',array('pg_type'=>1,'pg'=>$dp,'id'=>$id,'viewtype'=>'table','count_indicator'=>'.programme-count-indicator'));

                            } }else{  ?>
                            <tr>
                                <td colspan="8"> No Programs added!</td>
                            </tr>
                        <?php  } ?>
                        </tbody>
                    </table>
                    <table style="width:100%">
                        <tr class="row-footer">
                            <td colspan="8" class="padding-left-5">
                                Total Programmes : <span class="programme-list-contents-count badge badge-info">  <?php  if(isset($programme_li['list']) && $programme_li['count'] > 0){ echo $programme_li['count'] ;}else{ echo 0 ; } ?></span>
                            </td>
                        </tr>
                    </table>
                </div>

        </div>

        <div id="tab-2">
            <div class="options-menu">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=pg_prereq&token=<?php echo $currenttoken ?>"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Add New Prerequisite</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="glyphicon glyphicon-print"></i>&nbsp;Print List</a></li>
                    </ul>
                </div>
            </div>
            <div class=" no-padding">
                <table class="table table-striped responsive"  id="pg_prereq-list-table">
                    <colgroup>
                        <col class="con0" style="align: center; width: 2%">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Award Type</th>
                        <th>Level</th>
                        <th>Forms Category</th>
                    </tr>
                    </thead>
                    <tbody count-indicator=".pg_prereq-count-indicator" id="pg_prereq-list-contents<?php //echo $dp_type; ?>">         <?php
                    $pgpreli = $pgpre->get_list();
                    if($pgpreli['count'] > 0){
                        foreach($pgpreli['list'] as $id => $ob){
                            $this->load->view('common/data/dt_pg_prereq',array('ob'=>&$ob,'id'=>$id,'userdata'=>&$userdata));
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Programme base codes -->
        <div id="tab-3">
            <div class="options-menu">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=pg_basecode&token=<?php echo $currenttoken ?>"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Add New Base Code</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="glyphicon glyphicon-print"></i>&nbsp;Print List</a></li>
                    </ul>
                </div>
            </div>
            <div class=" no-padding">
                <table class="table table-striped responsive"  id="pg_basecode-list-table">
                    <colgroup>
                        <col class="con0" style="align: center; width: 2%">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Code Name</th>
                        <th>Applies to courses in</th>
                        <th>Base Programme</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody count-indicator=".pg_basecode-count-indicator" id="pg_basecode-list-contents<?php //echo $dp_type; ?>">         <?php
                    if($bcodes['count'] > 0){
                        foreach($bcodes['list'] as $id => $ob){
                            $this->load->view('common/data/dt_pgbase_code',array('ob'=>&$ob,'id'=>$id,'userdata'=>&$userdata));
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Courses list -->
        <div id="tab-4">
            <div class="options-menu"> <div class="btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url() ?>ajax_load/form?name=course&token=<?php echo $currenttoken ?>" data-toggle="modal" data-target="#add-item-data"><i class="fa fa-plus"></i> &nbsp;Add New Course</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-print"></i> &nbsp;Print Current List</a></li>
                    </ul>
                </div>
               </div>

            <div id="dyntable_wrapper" class="dataTables_wrapper" role="grid">

                <table  id="course-list-table" class="table table-bordered responsive dataTable">
                    <colgroup>
                        <col class="con0" style="align: center; width: 2%">
                        <col class="con1" style="width: 40%">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                    </colgroup>
                    <thead>
                    <tr role="row">
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Category</th>
                        <th>Start Date</th>
                        <th>Department</th>
                        <th>Faculty</th>
                       <!-- <th>Course Descriptions</th>   -->
                    </tr>
                    </thead>

                    <tbody id="course-list-contents">
                    <?php
                    if(isset($course_li['count']) && $course_li['count'] > 0 ){
                        $viewtype = 'table';
                        foreach($course_li['list'] as $id => $cz)
                        {
                            echo $this->load->view('common/data/course',array('viewtype'=>$viewtype,'cz'=>$cz,'id'=>$id,'coursecategory'=>$list));
                        }
                    }else{
                        ?>


                    <?php } ?>
                    </tbody></table>


            </div>

        </div>

        <!-- Course Categories list -->
        <div id="tab-5">
            <div class="options-menu">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=course_category&token=<?php echo $currenttoken ?>"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Add New Category</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="glyphicon glyphicon-print"></i>&nbsp;Print Categories List</a></li>
                    </ul>
                </div>
            </div>


            <div class=" no-padding">
                <table class="table table-bordered responsive"  id="course_category-list-table">
                    <colgroup>
                        <col class="con0" style="align: center; width: 2%">
                        <col class="con1">
                        <col class="con0">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Joining Name</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody count-indicator=".course_category-count-indicator" id="course_category-list-contents<?php //echo $dp_type; ?>">         <?php
                        if($list['count'] > 0){
                            foreach($list['list'] as $id => $ob){    ?>
                       <tr class="item-list-<?= $ob->id ?>">
                           <td><?= $id + 1  ?></td>
                           <td>
                               <span class='item-title'><?= $ob->name ?></span>

                               <br>
                               <?php

                               $dataInfo = array(
                                   'targetCont' => "#course_category-list-contents",
                                   'viewtype' => 'table',
                                   'itemid' => $ob->id,
                                   'profileInfo' => $userdata['profile'],
                                   'itemtype' => 'course_category',
                                   'access_level' => $userdata['access_level'],
                                   'targetForm' => '#new-course_category-data',
                                   'otheritems' => '',
                                   'row_id' => ".item-list-{$ob->id}"
                               );

                               echo $this->load->view('common/data/item_controls',$dataInfo,true) ?>
                           </td>
                           <td><?= $ob->join_name ?> </td>
                           <td><?= $ob->comments ?> </td>
                       </tr>
                        <?php    }
                        }
                    ?>
                    </tbody>
                    </table>
                </div>
        </div>
    </div>



</div>
</div>


<div style="display: none">
    <script>
        jQuery('.dataTable').dataTable();
    </script>
</div>
