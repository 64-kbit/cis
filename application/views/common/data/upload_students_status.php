<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


<?php

?>


<table class="table  table-striped responsive" id="file_upload-status-list-table">
<colgroup>
    <col style="align: center; width: 2%">
</colgroup>
<thead>
<tr>
<th>ROW</th>
<th>status</th>
</tr>
</thead>
<tbody>
    <?php  if(is_array($statusinfo)){

        if(!isset($statusinfo['error'])){
        foreach($statusinfo as $id => $dt){

        switch($dt['error']){
            case 10:
                $message = "<span class='alert-danger'>{$dt['message']}</span>";
                break;
            case 3:

            case 2:
                $message = "<span class='text-danger' style='color:#a44'>" . $dt['name'] ."(". $dt['reg_id'] . ")" .$dt['msg'] . "(<small class='badge badge-important'>" . $dt['errormsg'] . "</small>)</span>";
                break;
            case 1:
                $message = "<span class='text-warning' >" . $dt['name'] ."(". $dt['reg_id'] . ")" .$dt['msg'] . "(<small class='badge'>" . $dt['errormsg'] . "</small>)";             $message .= " Category: " . $dt['category'] . "</span>" ;
                break;
            default:
                $message = "<span class='text-success' >" . $dt['name'] ."(". $dt['reg_id'] . ")" .$dt['msg'] . "(<small class='badge badge-success'>" . $dt['errormsg'] . "</small>)";             $message .= " Category: " . $dt['category'] . "</span>" ;
                break;
        }
             if($dt['error'] != 10 )
            if(isset($dt['class_enroll']['enroll']) && !is_array($dt['class_enroll']['enroll'])) {
               $message .= "<br> Class: <small class='text-warning'>" . $dt['class_enroll']['enroll'] . "</small>";
            }elseif(isset($dt['class_enroll']['error']) && !is_array($dt['class_enroll']['enroll'])){
                $message .= "<br> Class: <small class='text-danger' style='color: #a44'>". $dt['class_enroll']['msg']. "</small>";
            }else{
                foreach($dt['class_enroll']['enroll'] as $en ){
                   $message .= "<br> Class <small class='text-info'>" . $en['class'] . "</small>";
                }
            }

        ?>
           <tr class="<?= $dt['error']?'success':'danger'?>>">
               <td class="row-head" style="background: #123954">
                   <?= $id ?>
               </td>
               <td>
                   <?= $message?>
               </td>
           </tr>
   <?php  }
        } else{
            echo "<td>##</td><td><span class='alert alert-danger'>{$dt['message']} <br>Please try to upload the file again to fix the Problems. <br>This Happens when we failed to Catch the Uploaded File. Retry to Upload  Again and We will get it this time!!</span></td>";
    }
    }?>
</tbody>
</table>


<div class="scripts">
    <script>
        updateModaltitle(2,'Students Upload & Importation status Information',"");
        jQuery("#file_upload-status-list-table").dataTable();
    </script>
</div>
