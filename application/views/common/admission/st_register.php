<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
   <?php

   $applicants = new SASStudent();
   //var_dump($applicants->selected_students());
   ?>
<div class="span12" >

    <div id="tabs" class="tabbedwidget tab-primary no-padding">
        <ul>
            <li>
                <a href="#tab-1">
                    <h4 class=""><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Available Students List</h4></a>
            </li>

            <li>
                <a href="#tab-2">
                    <h4 class=""><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Import From File</h4>
                </a>
            </li>

            <li>
                <a href="#tab-3">
                    <h4 class=""><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;Import From SAS&nbsp;Selected Applicants
                    </h4>
                </a>
            </li>
        </ul>

        <div id="tab-1">
            <div class="options-menu">
                <div class="btn-group">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a  data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/form?name=student_info&token=<?php echo $currenttoken ?>"><i class="fa fa fa-plus"></i>&nbsp;Add New Student</a></li>
                        <li class="divider"></li>
                        <li><a data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/view_item?sourcetb=notadmitted_students-list-contents&itype=print_students_generator&name=generate_print_list&token=<?php echo $currenttoken ?>"></i>&nbsp;Print List</a></li>
                    </ul>
                </div>
            </div>
            <div class=" no-padding">
                <table class="table table-bordered responsive"  id="notadmitted_students-list-table">
                    <colgroup>
                        <col class="con1" style="align: center; width: 2%">
                        <col class="con0" style="width: 14%" >
                        <col class="con1" style="width: 4%">
                        <col class="con0" style="width: 10%">
                        <col class="con1" style="width: 15%">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">
                    </colgroup>

                    <thead>
                    <tr>
                        <th> # </th>
                        <th>Student ID</th>
                        <th>Year</th>
                        <th>Admission</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Programme</th>
                        <th>Course</th>
                        <th>Sponsor</th>
                        <th>Entry Mode</th>
                        <!--<th>Description</th>   -->
                    </tr>
                    </thead>
                    <tbody count-indicator=".notadmitted_students-count-indicator" id="notadmitted_students-list-contents<?php //echo $dp_type; ?>">

                    </tbody>
                </table>
            </div><!--widgetcontent-->
        </div>

        <div id="tab-2">
            <div class="widget" id="file_upload_container" style="min-height: 400px">
                <div class="tabs-right">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a data-toggle="tab" role="tab" href="#upload_new">Upload New Files</a></li>
                        <li class=""><a data-toggle="tab" role="tab" data-target="#available_files"  href="<?= base_url()?>ajax_load/html_data?itemtype=files&itemid=students_list">Available Files</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="upload_new" class=" tab-pane fade in active " style="padding:20px">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Upload CSV/Excel Files containing Students List</h4>
                                </div>
                                <div class="panel-body">
                                    <?php echo form_open_multipart(base_url() . 'upload_file/students_file?type=info','id="fileupload"',array('MAX_FILE_SIZE'=>5000000)) ?>
                                    <!-- Redirect browsers with JavaScript disabled to the origin page -->
                                    <noscript><input type="hidden" name="redirect" value="/"></noscript>
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    <div class="fileupload-buttonbar">
                                        <div class="span7">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                                <span class="btn btn-success fileinput-button">
                                                    <i class="fa fa-plus fa fa-white"></i>
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
                                                <div aria-valuemin="0" aria-valuemax="100" id="progress" class="progress progress-striped ">
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
                                        <li><a href="<?php echo base_url()?>upload_file/get_file?file=commands_template_list.xls&type=template&token=token" target="_blank">Download Commands template file here.</a> Insert Commands contents in the template file i.e <em>(disco,retake,nhif,pause,delete,gradute)</em> </li>

                                        <li><a href="<?php echo base_url()?>upload_file/get_file?file=students_template_list.xls&type=template&token=token" target="_blank">Download template file here. for Uploading new students to the system</a> Insert contents in the template file </li>

                                        <li>Click <span class="btn btn-success disabled"><i class="fa fa fa-plus fa fa-white"></i> Add files.. </span> to select files/file created from template</li>
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

        <div id="tab-3">
           <div class="options-menu">
            <div class="btn-group">
                <button data-toggle="dropdown" class="btn dropdown-toggle">Actions Menu <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a   data-toggle="modal" data-target="#add-item-data" href="<?php echo base_url() ?>ajax_load/view_item?sourcetb=applicants_list-list-table&itype=print_applicants_generator&name=generate_print_list&token=<?php echo $currenttoken ?>"><i class="fa fa fa-print"></i>&nbsp;Print List</a></li>
                </ul>
            </div>
            </div>
            <div class="widget">
                <table class="table table-bordered responsive"  id="applicants_list-list-table">
                    <colgroup>
                        <col class="con0" style="align: center; width: 2%">
                        <col class="con0" style="align: center; width: 2%">
                        <col class="con1" style="width: 16%">
                        <col class="con0" style="width: 10%">
                        <col class="con1">
                        <col class="con0" style="width: 4%">
                        <col class="con1">
                        <col class="con0">
                        <col class="con1" style="width: 4%">
                        <col class="con0">
                        <col class="con1">
                        <col class="con0">

                    </colgroup>

                    <thead>
                    <tr>
                        <th><input type="checkbox" class="checkall" name="checkall"></th>
                        <th> # </th>
                        <th>Student ID</th>
                        <th>Admission</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Entry</th>
                        <th>Selected</th>
                        <th>Batch</th>
                        <th>Applied Courses</th>

                    </tr>
                    </thead>
                    <tbody count-indicator=".applicants_list-count-indicator" id="applicants_list-list-contents<?php //echo $dp_type; ?>">

                    </tbody>
                    </table>

            </div>
        </div>
    </div>
</div>


 <script>
     //jQuery('#applicants_list-list-table').destroy();
     /*


           */
    var unadmittedstudents =  jQuery('#notadmitted_students-list-table').dataTable( {
         'dom':'<"top"lfpi><"#table_wrapper"t><"bottom"lfpi><"clear">',
         "scrollCollapse": true,
         "deferRender": true,
         //'stateSave':true,

         "columns": [
             {data: 'cis_li_id'},
             {data: 'cis_student_id'},
             {data: 'cis_academic_year'},
             {data: 'cis_admission_id'},
             {data: 'cis_name'},
             {data: 'cis_gender'},
             {data: 'cis_programme'},
             {data: 'cis_course'},
             {data: 'cis_sponsor'},
             {data: 'cis_entry_mode'}
         ],
         "processing": false,
         "serverSide": false,
         "ajax":{
             url: "<?= base_url() . 'admin/json_data?contentype=unadmitted_students'?>",
             type: 'POST'
         },
         "sPaginationType": "full_numbers",
         "fnDrawCallback": function(oSettings) {
             activate_items();
         }
     } );


 </script>

<script>
    var applicants_list =  jQuery('#applicants_list-list-table').dataTable( {
        'dom':'<"top"lfpi><"#table_wrapper"t><"bottom"lfpi><"clear">',
        "scrollCollapse": true,
        "deferRender": true,

        "columns": [
            {data: 'chk_box'},
            {data: 'li_id'},
            {data: 'student_id'},
            {data: 'admission_id'},
            {data: 'name'},
            {data: 'gender'},
            {data: 'phone'},
            {data: 'entry_mode'},
            {data: 'selected_course'},
            {data: 'batch'},
            {data: 'applied_course'}
        ],
        "processing": false,
        "serverSide": false,
        "ajax":{
            url: "<?= base_url() . 'admin/json_data?contentype=selected_applicants'?>",
            type: 'POST'
        },
        "sPaginationType": "full_numbers",
        "fnDrawCallback": function(oSettings) {
            activate_items();
        }
    } );
</script>
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
    <script src="<?= plugins_folder() ?>jquery.growl.js"></script>

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
    <![endif]-->





</div>
