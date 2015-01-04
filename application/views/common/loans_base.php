<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-- Generic page styles -->
 <?php

        $files = new fileExplorer();
        $acyear = new AcademicYear();
  $curryear = $acyear->get_current_academic_year();
        $studLoan =   new   StudentLoan();
       $student_list = $studLoan->get_all();
 //$studLoan->get();
;
 ?>
<div class="span12" >
    <div id="tabs" class="tabbedwidget tab-primary no-padding">
        <ul>
            <li>
                <a href="#tab-1">
                <h4 class=""> <i class="icon-chevron-right"></i>&nbsp;&nbsp;Loan allocation for <?= $curryear->notation ?></h4> </a>
            </li>

            <li>
                <a href="#tab-2">
                    <h4 class=""> <i class="icon-chevron-right"></i>&nbsp;&nbsp;Loan allocation for Previous Years</h4> </a>
            </li>


            <li>
                <a href="#tab-3">
                    <h4 class=""><i class="fa icon-upload"></i>&nbsp;&nbsp;Import New List</h4>
                </a>
            </li>
        </ul>

        <div id="tab-1">
           <div class="options-menu">
            <div class="btn-group">
                <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=loan_import&token=<?php echo $currenttoken ?>"><i class="fa fa-upload"></i>&nbsp;Add Manually</a></li>
                    <li class="divider"></li>
                    <li><a href="#" onclick="alert('Not Implemented')"><i class="fa  fa-print"></i>&nbsp;Print List</a></li>
                </ul>
            </div>
           </div>
            <div class="widget no-padding" style="min-height: 400px">
                <table class="table table-stripped responsive"  id="loan_import-list-table">
                    <colgroup>
                        <col class="con0" style="align: center; width: 2%">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1" style="width: 15%">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>??</th>

                        <th>Student ID</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th>Year</th>
                        
                        <th>Amount</th>

                        <th>Date Added</th>
                        <th>Remarks</th>
                        <!--<th>Description</th>   -->
                    </tr>
                    </thead>
                    <tbody count-indicator=".loan_import-count-indicator" id="loan_import-list-contents<?php //echo $dp_type; ?>">
                        <?php
                        if(isset($student_list) && $student_list['count'] > 0){
                            foreach($student_list['list'] as $id => $li) {
                                if($li['academic_year'] != $curryear->notation){
                                    continue;
                                }
                            ?>
                            <tr>
                                <td class="row-head"><?= $id + 1 ?> </td>
                                <td>
                                <?php
                                if( $li['checked'] == 2 ||$li['checked'] == 0){
                                    echo "<span title='Not Used by This Student!' class='text-warning'><i class='icon-remove'></i>&nbsp;</span>";
                                }else{
                                    echo "<span data-toggle='tooltip' title='Used by this Student' class='text-success'><i class='glyphicon glyphicon-ok'></i></span>";
                                }
                                ?></td>
                                <td><span class='item-title'><?= $li['student_id']?><br>(<small><?= $li['form_iv_index']?></small>)</span></td>

                                <td><span class="item-title"><?= ucwords(strtolower($li['student_name']))?></span></td>
                                <td><?= strtoupper($li['gender'])?></td>
                                <td><?= $li['course']?></td>
                                <td><?= $li['academic_year']?></td>
                                
                                <td><span class="text-success"><?= number_format($li['semester_amount'],2) ?>/=</span></td>

                                <td><?= date('d-M-Y',strtotime($li['import_date'])) ?></td>
                                <td><small><?= $li['comments']?></small></td>
                            </tr>
                        <?php  } }
                        ?>
                    </tbody>
                </table>
            </div><!--widgetcontent-->
        </div>

        <div id="tab-2">
            <div class="widget no-padding" style="min-height: 400px">
                <table class="table table-stripped responsive"  id="loan_import-list-table-2">
                    <colgroup>
                        <col class="con0" style="align: center; width: 2%">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1" style="width: 15%">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>??</th>

                        <th>Student ID</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Course</th>
                        <th><span title="Academic Year" data-toggle="tooltip">Year</span></th>

                        <th>Amount</th>

                        <th>Date Added</th>
                        <th>Remarks</th>
                        <!--<th>Description</th>   -->
                    </tr>
                    </thead>
                    <tbody count-indicator=".loan_import-count-indicator" id="loan_import-list-contents<?php //echo $dp_type; ?>">
                    <?php
                    if(isset($student_list) && $student_list['count'] > 0){
                        foreach($student_list['list'] as $id => $li) {

                            if($li['academic_year'] == $curryear->notation){
                                continue;
                            }

                            ?>
                            <tr>
                                <td class="row-head"><?= $id + 1 ?> </td>
                                <td>
                                    <?php
                                    if( $li['checked'] == 2 ||$li['checked'] == 0){
                                        echo "<span title='Not Used by This Student!' class='text-warning'><i class='icon-remove'></i>&nbsp;</span>";
                                    }else{
                                        echo "<span data-toggle='tooltip' title='Used by this Student' class='text-success'><i class='glyphicon glyphicon-ok'></i></span>";
                                    }
                                    ?></td>
                                <td><span class='item-title'><?= $li['student_id']?><br>(<small><?= $li['form_iv_index']?></small>)</span></td>

                                <td><span class="item-title"><?= ucwords(strtolower($li['student_name']))?></span></td>
                                <td><?= strtoupper($li['gender'])?></td>
                                <td><?= $li['course']?></td>
                                <td><?= $li['academic_year']?></td>

                                <td><span class="text-success"><?= number_format($li['semester_amount'],2) ?>/=</span></td>

                                <td><?= date('d-M-Y',strtotime($li['import_date'])) ?></td>
                                <td><small><?= $li['comments']?></small></td>
                            </tr>
                        <?php  } }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="tab-3">
           <div class="widget" id="file_upload_container" style="min-height: 400px">

                    <!--  <div class="tabs-right">
                          <ul class="nav nav-tabs" role="tablist">
                              <li class="active"><a data-toggle="tab" role="tab" href="#upload_new">Upload New Files</a></li>
                              <li class=""><a data-toggle="tab" role="tab" data-target="#available_files"  href="<?= base_url()?>ajax_load/html_data?itemtype=files&itemid=loans_files">Available Files</a></li>
                              <li class=""><a data-toggle="tab" role="tab" data-target='#deleted_files' href="<?= base_url()?>ajax_load/html_data?itemtype=files&itemid=deleted_loans_files">Deleted Files</a></li>
                          </ul> </div>

               -->
                          <div class="tab-content">
                              <div id="upload_new" class=" tab-pane fade in active " style="padding:20px">
                                  <div class="panel panel-default">
                                      <div class="panel-heading">
                                          <h4 class="panel-title">Upload CSV/Excel Files containing Students Loans</h4>
                                      </div>
                                      <div class="panel-body">
                                          <?php echo form_open_multipart(base_url() . 'upload_file/loans_file','id="fileupload"',array('MAX_FILE_SIZE'=>5000000)) ?>
                                          <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                          <noscript><input type="hidden" name="redirect" value="/"></noscript>
                                          <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                          <div class="fileupload-buttonbar">
                                              <div class="span7">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                                <span class="btn btn-success fileinput-button">
                                                    <i class="icon-plus icon-white"></i>
                                                    <span>Add files...</span>
                                                    <!-- The file input field used as target for the file upload widget -->
                                                    <input  type="file"  name="files[]" multiple>
                                                </span>

                                                <button type="submit" class="btn btn-primary start">
                                                      <i class="glyphicon glyphicon-upload"></i>
                                                      <span>Start upload</span>
                                                  </button>

                                                  <button type="reset" class="btn btn-warning cancel">
                                                      <i class="glyphicon glyphicon-ban-circle"></i>
                                                      <span>Cancel upload</span>
                                                  </button>
                                                  <input class="toggle" type="checkbox">
                                             </div>
                                              <!-- The global progress state -->
                                              <div class="span5 fileupload-progress fade">
                                                  <!-- The global progress bar -->
                                                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                      <div id="progress" class="progress">
                                                          <div class="progress-bar progress-bar-success"></div>
                                                      </div>
                                                  </div>
                                                  <!-- The extended global progress state -->
                                                  <div class="progress-extended">&nbsp;</div>
                                              </div>
                                          </div>
                                           <br>
                                          <!-- The table listing the files available for upload/download  -->
                                          <!--<div id="files" class="files"></div> -->
                                          <table role="presentation" class="table table-striped">
                                              <tbody class="files"></tbody>
                                          </table>
                                          <?php echo form_close() ?>
                                 </div>
                          </div>
                                  <div class="panel panel-default">
                                      <div class="panel-heading">
                                          <h3 class="panel-title">Upload Instructions <small> Read carefully </small></h3>
                                      </div>
                                      <div class="panel-body">
                                          <ol >
                                              <li><a href="<?php echo base_url()?>upload_file/get_file?file=loans_template.xls&type=template&token=token" target="_blank">Download template file here.</a> Insert contents in the template file</a> </li>
                                              <li>Click <span class="btn btn-success disabled"><i class="fa icon-plus icon-white"></i> Add files.. </span> to select files/file created from template</li>
                                              <li>Click   <button type="submit" class="disabled btn btn-primary start">
                                                      <i class="glyphicon glyphicon-upload"></i>
                                                      <span>Start upload</span>
                                                  </button> to upload all files or individual file</li>

                                              <li>The maximum file size for uploads in this is <strong>5 MB</strong></li>
                                              <li>Only  (<strong>xls,csv</strong>) files are allowed </li>
                                              <li>Uploaded files will be Stored Permanently on the Server</li>
                                              <li>You can <strong>drag &amp; drop</strong> files from your desktop on this Page (<strong>Old browsers Not Supported</strong>)</li>
                                          </ol>
                                      </div>
                                  </div>

                                  <!-- The template to display files available for upload -->
                              </div>
                              <div id="available_files" class="tab-pane fade ">

                              </div>
                              <div id="deleted_files" class="tab-pane fade">

                              </div>
                          </div><!--tab-content-->

            </div>
           </div>
        </div>
      </div>

</div>

<div style="display: none">
    <script>
        jQuery('#loan_import-list-table,#loan_import-list-table-2').dataTable({'dom':'<"top"lfpi><"#table_wrapper"t><"bottom"lfpi><"clear">'});
    </script>
</div>

<div style="display:none">
    <script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
    <!-- <script src="<?= plugins_folder() ?>jquery.blueimp-gallery.min.js"></script> -->
    <script src="<?= plugins_folder() ?>tmpl.min.js"></script>

    <!-- The Iframe Transport is required for browsers without support for XHR file uploads  -->
    <script src="<?= plugins_folder() ?>uploader/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin        -->
    <script src="<?= plugins_folder() ?>uploader/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin   -->
    <script src="<?= plugins_folder() ?>uploader/jquery.fileupload-process.js"></script>
    <!-- The File Upload validation plugin   -->
    <script src="<?= plugins_folder() ?>uploader/jquery.fileupload-validate.js"></script>

    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="<?= plugins_folder() ?>tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="<?= plugins_folder() ?>load-image.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="<?= plugins_folder() ?>canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
   <!-- blueimp Gallery script -->
    <script src="<?= plugins_folder() ?>jquery.blueimp-gallery.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->

    <script src="<?= plugins_folder() ?>uploader/jquery.fileupload-ui.js"></script>
    <!-- The main application script -->
    <script src="<?= plugins_folder() ?>uploader/main.js"></script>
    <script src="<?= js_folder() ?>tabs-nav.js"></script>

    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
   <!-- <script src="<?= plugins_folder() ?>uploader/cors/jquery.xdr-transport.js"></script> -->
    <!--[endif]-->


    <script>
    </script>


</div>




