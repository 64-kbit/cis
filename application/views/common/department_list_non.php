<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="span12">
    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button data-toggle="dropdown" class="btn dropdown-toggle">Action Menu<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url() ?>ajax_load/form?name=department&token=<?php echo $currenttoken ?>" data-toggle="modal" data-target="#new-department-form">Add New Department</a></li>
                    <li><a href="#">Print Departments</a></li>
                    <li><a href="#">Edit Selected</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Remove Selected</a></li>
                </ul>
            </div>
            <h4 class="widgettitle">List of Non Academic Departments</h4>
        </div>
        <div class="widgetcontent no-padding">
            <table class="table table-bordered responsive">
                <colgroup>
                    <col class="con0" style="width: 3%">
                    <col class="con1" style="width: 32%">
                    <col class="con0">
                    <col class="con1">
                    <col class="con0">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Department Name</th>
                    <th>Head</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody id="department-list-contents">
                <?php

                if(isset($dp_data['dp_list']) && $dp_data['dp_list']['count'] > 0){

                    foreach($dp_data['dp_list']['list'] as $id => $dp ){
                        $viewtype = 'table';
                        $dp_type = 2;
                        $this->load->view('common/data/department',array('dp'=>$dp,'id'=>$id,'viewtype'=>'table','dp_type'=>2));

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
                    </tr>
                <?php  } ?>

                </tbody></table>
            <table>
                <tr>
                    <td colspan="2">
                        Total Departments :
                    </td>
                    <td colspan="2" class="left">
                          <span class="badge badge-infodepartment-list-contents-<?php echo $dp_type; ?>-count">
                        <?php if(isset($dp_data['dp_list']) && $dp_data['dp_list']['count'] > 0){ echo $dp_data['dp_list']['count'] ;}else{ echo 0 ; } ?>
                         </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <button class="btn btn-primary"  href="<?php echo base_url() ?>ajax_load/form?name=department&token=<?php echo $currenttoken ?>" title="Advanced Information of  Selected Departments" data-toggle="modal" data-target="#new-department-form">Add New</button>

                    </td>

                </tr>
                </tbody>
            </table>
            <?php //var_dump($config) ?>
        </div>
    </div>
</div>

