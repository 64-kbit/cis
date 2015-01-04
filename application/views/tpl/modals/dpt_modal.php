<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!-- New faculty modal display -->
<div class="modal fade " id="new-faculty-form" data-width='760' tabindex="-1" role="dialog" aria-labelledby="new-faculty-form-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="new-faculty-form-label">Add New Faculty</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add-data-action" target-div="#faculty-list-contents" target-modal="#new-faculty-form" target-form="#new-faculty-data">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- New campus form-->
<div class="modal fade hide" data-width='760' id="new-campus-form" tabindex="-1" role="dialog" aria-labelledby="new-campus-form-label" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="new-campus-form-label">Add New Campus</h4>
    </div>

    <div class="modal-body">

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add-data-action" target-div="#campus-list-contents" target-modal="#new-campus-form" target-form="#new-campus-data">Save changes</button>
    </div>
</div>

<!-- New faculty Department display -->
<div class="modal fade " id="new-department-form" data-width="760" tabindex="-1" role="dialog" aria-labelledby="new-department-form-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="new-department-form-label">Create a New Department</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add-data-action" target-div="#department-list-contents" target-modal="#new-department-form" target-form="#new-department-data" >Save changes</button>
            </div>
        </div>
    </div>
</div>
