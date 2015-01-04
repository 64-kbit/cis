<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
 $loan_type = isset($loan_type)?$loan_type:'loan';
    $files = new fileExplorer();
?>
<table class="table table-striped responsive "  id="file_upload-list-table">
    <colgroup>
        <col class="con1" style="align: center; width: 2%">

    </colgroup>
   <thead>
    <tr>
        <th>#</th>
        <th>File Name</th>
        <th>Date Uploaded</th>
        <th>Contents</th>
        <th>Uploaded By</th>
        <th>Imported to DB</th>
        <!--<th>Description</th>  -->
    </tr>
    </thead>
    <tbody>
    <?php
    $fl = $files->search_files($loan_type);
    if($fl['count'] > 0){
    foreach($fl['list'] as $id => $fr){
       $fileid = explode('?',$fr->file_url);
        ?>
        <tr>
            <td class="row-head" style="background: #123954"><?= $id + 1 ?></td>
            <td><a target="_blank" href='<?= $fr->file_url ?>'><?= $fr->file_name ?><?= $fr->imported_to_db?'&nbsp;&nbsp;<span class="badge badge-success"><i class="glyphicon glyphicon-saved"></i></span>':'&nbsp;&nbsp;<span class="badge badge-warning">Not Imported</span>' ?></td>
            <td><span class='badge badge-inverse'><?= date("d-M-Y, h:i",strtotime($fr->date_added)) ?></span></td>
            <td><?= ucfirst(preg_replace("/_|-/"," ",$fr->content_type)) ?></td>
            <td><?= $fr->user_id ?></td>
            <td style="border-right: 1px solid #ddd">
                <button class="btn btn-danger action-delete" href="<?= base_url()."upload_file/remove_file?" . $fileid[1] ?>">
                    <i class="glyphicon glyphicon-trash"></i>&nbsp;
                    Delete
                </button>
            </td>

        </tr>
    <?php        }  }
    ?>
    </tbody>
</table>

<div class="scripts">
    <script>
      // alert("downloaded")
        jQuery("#file_upload-list-table").dataTable({
            'dom':'<"top"lfpi><"#table_wrapper"t><"bottom"lfpi><"clear">'
        });
    </script>
</div>
