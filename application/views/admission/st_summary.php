<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="span12" >

    <div class="widgetbox">
        <div class="headtitle">
            <div class="btn-group">
                <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=new_student&token=<?php echo $currenttoken ?>"><i class="fa fa fa-plus"></i>&nbsp;Add New Student</a></li>
                    <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=new_student&token=<?php echo $currenttoken ?>"><i class="fa fa-upload"></i>&nbsp;Import Students/Class</a></li>
                    <li class="divider"></li>
                    <li><a href="#" onclick="alert('Not Implemented')"><i class="fa  fa fa-print"></i>&nbsp;Print List</a></li>
                </ul>
            </div>
            <h4 class="widgettitle"><?php echo $config['org_abbr'] ." ". $config['org_type'] ?>&nbsp; Students</h4>
        </div>
        <div class="widgetcontent no-padding">
            <table class="table table-bordered responsive"  id="pgcourse-list-table">
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
                    <col class="con1">
                    <col class="con0">
                    <col class="con1">
                </colgroup>
                <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Programme</th>
                    <th>Course</th>
                    <th>Class</th>
                    <th>Current Level</th>
                    <th>Sponsorship</th>
                    <th>Category</th>
                    <th>Date of Admission</th>
                    <th>Admission Mode</th>
                    <th>Remarks</th>
                    <!--<th>Description</th>   -->
                </tr>
                </thead>
                <tbody count-indicator=".pgcourse-count-indicator" id="pgcourse-list-contents<?php //echo $dp_type; ?>">  </tbody>
                <?php
                if(isset($student_list) && $student_list['count'] > 0){ ?>
                    <tr>
                        <td>1</td>
                    </tr>
                <?php  }
                ?>
            </table>
        </div><!--widgetcontent-->
    </div>

</div>
