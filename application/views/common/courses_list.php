<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php

$course = new ProgrammeCourse();

$courseList = $course->get_list();
//var_dump($courseList);
 ?>
<div class="span12" >
<div class=" no-padding">
    <div class="widgettitle no-margins ">

    List of Courses
        <div class="options-menu">
            <ul class="hr-nav-menu">
                <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=pgcourse&token=<?php echo $currenttoken ?>"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;Add New</a></li>
                <li><a href="#" onclick="alert('Not Implemented')"><i class="glyphicon glyphicon-print"></i>&nbsp;Print List</a></li>
            </ul>
        </div>
     </div>
    <table class="table table-bordered dataTable responsive"  id="pgcourse-list-table">
        <colgroup>
            <col class="con0" style="align: center; width: 2%">
            <col class="con1">
            <col class="con0">
            <col class="con1">

        </colgroup>
        <thead>
        <tr>
            <th>#</th>
            <th>Programme Course</th>
            <th>Code</th>
            <th>Year Started</th>

            <!--<th>Description</th>   -->
        </tr>
        </thead>
        <tbody count-indicator=".pgcourse-count-indicator" id="pgcourse-list-contents<?php //echo $dp_type; ?>">
            <?php if($courseList['count'] > 0) {
                foreach($courseList['list'] as $id => $course){
                    $viewtype = 'table';
                    echo $this->load->view('common/data/pg_course',array('id'=>$id,'course'=>$course,'viewtype'=>'table'),false);
                }
}         ?>
        </tbody>
        </table>
    </div>
  </div>
    <div class="scripts">
      <script>
          jQuery(".dataTable").dataTable({
              'dom':'<"top"lfpi><"#table_wrapper"t><"bottom"lfpi><"clear">'
          });
      </script>
    </div>


