<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="span12">

    <div id="tabs" class="tabbedwidget tab-primary no-padding">
        <ul>
            <li>
                <a href="#tab-1">
                   <h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp; List of Academic Departments  </h4>
                </a>
            </li>

            <li><a href="#tab-3">
                    <h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;  List of Campuses  </h4>
            </a></li>

            <li><a href="#tab-2">
                    <h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;  List of Faculties </h4>
                </a>
            </li>

        </ul>

        <div id="tab-1">

            <div class="options-menu">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="glyphicon glyphicon-th"></span>&nbsp;Action Menu&nbsp;<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url() ?>ajax_load/form?name=department&token=<?php echo $currenttoken ?>" data-toggle="modal" data-target="#new-department-form">Add New Department</a></li>
                        <li><a href="#">Print Departments</a></li>
                        <li><a href="#">Edit Selected</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Remove Selected</a></li>
                    </ul>
                </div>
            </div>

            <table class="table table-bordered responsive">
                <colgroup>
                    <col class="con0" style="width: 2%">
                    <col class="con1">
                    <col class="con0">
                    <col class="con1">
                    <col class="con0">
                    <col class="con1">
                    <col class="con0">
                </colgroup>
                <thead>
                <tr>
                    <th>#   </th>
                    <th>Department Name</th>
                    <th>DPT ID</th>
                    <th>DPT Code</th>
                    <th>DPT Head</th>
                    <th>DPT Description</th>
                </tr>
                </thead>
                <tbody count-indicator = 'department-count-indicator' id="department-list-contents">
                <?php

                if(isset($dp_data['dp_list']) && $dp_data['dp_list']['count'] > 0){

                    foreach($dp_data['dp_list']['list'] as $id => $dp ){
                        $viewtype = 'table';
                        $dp_type = 1;
                        $this->load->view('common/data/department',array('dp_type'=>1,'dp'=>$dp,'id'=>$id,'viewtype'=>'table'));

                    } }else{  ?>
                    <tr>
                        <td>
                            -
                        </td>
                        <td>
                            -
                        </td>
                        <td>
                            -
                        </td>
                        <td>
                            -
                        </td>
                        <td>
                            -
                        </td>
                        <td>
                            -
                        </td>
                    </tr>
                <?php  } ?>
                </tbody></table>
            <table  class="table">
                <tr>
                    <td>
                        Total Departments :

                        <span class="badge badge-info department-list-contents-<?php echo $dp_type; ?>-count"> <?php if(isset($dp_data['dp_list']) && $dp_data['dp_list']['count'] > 0){ echo $dp_data['dp_list']['count'] ;}else{ echo 0 ; } ?>   </span>
                    </td>

                    <td>
                        <button href="<?php echo base_url() ?>ajax_load/form?name=department&token=<?php echo $currenttoken ?>" class="btn btn-primary" title="Advanced Information of  Selected Departments" data-toggle="modal" data-target="#new-department-form">Add New</button>
                    </td>

                </tr>
                </tbody>
            </table>

        </div>

        <div id="tab-3">
             <div class="options-menu">
                 <div class="btn-group">
                     <button data-toggle="dropdown" class="btn dropdown-toggle"><i class="glyphicon glyphicon-th"></i>Actions Menu<span class="caret"></span></button>
                     <ul class="dropdown-menu">
                         <li><a  href="<?php echo base_url() ?>ajax_load/form?name=campus&token=<?php echo $currenttoken ?>" data-toggle="modal" data-target="#new-campus-form">Add New Campus</a></li>

                         <li class="divider"></li>
                         <li><a class='print_table_list' href="<?php echo base_url() ?>ajax_print/form?name=campus&token=<?php echo $currenttoken ?>">Print Campus List</a></li>

                     </ul>
                 </div>

             </div>
            <div class="widget">
                <br> <div class="slimScrollDiv" style=" height: 400px;width: 100%"><div id="scroll1" class="mousescroll" style=" height:400px;">
                    <!-- <br>   <button href="<?php echo base_url() ?>ajax_load/form?name=campus&token=<?php echo $currenttoken ?>" class="btn btn-primary" data-toggle="modal" data-target="#new-campus-form">Add New Campus</button>
<br>                       -->
                        <ul class="entrylist" style="border: none;width: 100%;" id="campus-list-contents">

                            <?php  if(isset($dp_data['campus_list']) && $dp_data['campus_list']['count'] > 0){
                                foreach($dp_data['campus_list']['list'] as $id => $cdata){
                                    $id_type = $id/2 == 0?" even ": "";
                                    $viewtype = 'li';
                                    $this->load->view('common/data/campus',array('id_type'=> $id_type,'viewtype'=>$viewtype,'id'=>$id,'campus_li'=>array('status'=>1, 'data'=>$cdata)));
                                }
                                /* Terminate facult list */ } else {  ?>
                                <li class="">
                                    <div class="entry_wrap">
                                        <div class="entry_content">
                                            <span class="date pull-right" title="date added"><small>--</small></span>
                                            <h4>No Campus Added</h4>
                                            <p><strong>--</strong> --</p>
                                        </div>
                                    </div>
                                </li>
                            <?php   }    ?>


                        </ul>

                    </div>
                    <div class="slimScrollBar  ui-draggable"></div><div style=""></div></div>

            </div>
        </div>

          <div id="tab-2">
              <div class="options-menu">
              <div class="btn-group">
                  <button data-toggle="dropdown" class="btn dropdown-toggle"><i class="glyphicon glyphicon-th"></i>&nbsp;Actions Menu&nbsp;<span class="caret"></span></button>
                  <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url() ?>ajax_load/form?name=faculty&token=<?php echo $currenttoken ?>" data-toggle="modal" data-target="#new-faculty-form">Add New Faculty</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Print Faculty List</a></li>
                  </ul>
              </div>
              </div>
              <div class="widget">

                  <br>
                  <!-- left section -->
                  <div class="slimScrollDiv" style=" height:400px;width: 100%">
                      <?php
                      //  var_dump($userdata);die();
                      ?>

                      <ul class="entrylist" style="border: none;width: 100%;" id="faculty-list-contents">
                          <?php  if(isset($dp_data['facult_list']) && $dp_data['facult_list']['count'] > 0){
                              foreach($dp_data['facult_list']['list'] as $id => $fcdata){
                                  $id_type = $id/2 == 0?" even ": "";
                                  $viewtype = 'li';
                                  // Load the faculty list view and dump it here
                                  $this->load->view('common/data/faculty',array('id_type'=>$id_type,'viewtype'=>$viewtype,'fcdata'=>$fcdata,'id'=>$id));
                              } /* Terminate facult list */ } else {  ?>
                              <li class="">
                                  <div class="entry_wrap">
                                      <div class="entry_content">
                                          <span class="date pull-right" title="date added"><small>--</small></span>
                                          <h4>No Faculties</h4>
                                          <p><strong>--</strong> --</p>
                                      </div>
                                  </div>
                              </li>
                          <?php   }    ?>


                      </ul>
                  </div><!--widgetcontent-->
              </div>
          </div>



    </div>

</div>


<div class="scripts">
    <script>
        jQuery(".slimScrollDiv").slimScroll({
            height:'400px', width: '100%'
        })
    </script>
</div>

