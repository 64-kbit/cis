<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="span12">

<div id="tabs" class="tabbedwidget tab-primary no-padding">
    <ul>
        <li>
            <a href="#tab-1">
                <h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp; Department Modules </h4>
            </a>
        </li>

        <li><a href="#tab-3">
                <h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp;  Other Modules </h4>
            </a></li>

        <li><a href="#tab-2">
                <h4><i class="glyphicon glyphicon-chevron-right"></i>&nbsp;&nbsp; Old Modules (Removed) </h4>
            </a>
        </li>

    </ul>

    <div id="tab-1">

        <div class="options-menu">
            <div class="btn-group">
                <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="glyphicon glyphicon-th"></span>&nbsp;Action Menu&nbsp;<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?php echo base_url() ?>ajax_load/form?name=module&token=<?php echo $currenttoken ?>" data-toggle="modal" data-target="#add-item-data">
                            <i class="fa fa-plus"></i>&nbsp;&nbsp;Add New Module</a></li>
                    <li><a href="#"><i class="fa fa-print"></i>&nbsp;&nbsp;Print List</a></li>

                </ul>
            </div>
        </div>

        <table class="table table-stripped responsive">
            <colgroup>
                <col class="con0" style="width: 2%">
            </colgroup>
            <thead>
            <tr>
                <th>#</th>
                <th>Code</th>
                <th>Title</th>
                <th>Programme</th>
                <th>Course</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody count-indicator = 'module-count-indicator' id="module-list-contents">

            </tbody>
        </table>

    </div>

    <div id="tab-2">
        <div class="widget">
            <table class="table table-stripped responsive">
                <colgroup>
                    <col class="con0" style="width: 2%">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Programme</th>
                    <th>Course</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody count-indicator = 'module_other-count-indicator' id="module_other-list-contents">

                </tbody>
            </table>
        </div>
    </div>

    <div id="tab-3">
        <div class="widget">

            <table class="table table-stripped responsive">
                <colgroup>
                    <col class="con0" style="width: 2%">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Programme</th>
                    <th>Course</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Date Removed</th>
                </tr>
                </thead>
                <tbody count-indicator = 'module_removed-count-indicator' id="module_removed-list-contents">

                </tbody>
            </table>
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

