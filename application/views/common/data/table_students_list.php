<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php

$st = new StudentInfo();
$student_list = $st->get_student_list();

if(isset($student_list) && $student_list['count'] > 0){
    foreach($student_list['list'] as $id => $students){   ?>
        <tr>
            <td><?= $id + 1 ?></td>
            <td><?= $students['registration_number'] ?></td>
            <td><?= name_format(strtoupper($students['first_name']),$students['middle_name'],$students['last_name'],0) ?></td>
            <td><?= strtoupper($students['gender']) ?></td>
            <td><span data-toggle='tooltip' title="<?= $students['program_name'] ?>"><?= $students['program_code'] ?></span></td>
            <td><span title="<?= $students['course_code'] ?> " class='item-title'><?= $students['course_name'] ?></span></td>
            <td><?= $students['department_name'] ?></td>
            <td title="<?= $students['sponsor_code'] ?>"><span  class='item-title'><?= $students['sponsor_name'] ?></td>
            <td><?= $students['academic_year'] ?></td>
            <td><?= $students['admission_mode'] ?></td>
            <td><span class='badge badge-info'><?= $students['remarks'] ?></span></td>
        </tr>
    <?php
    }
}
?>
