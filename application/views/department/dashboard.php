<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
  <?php
    $acy = new AcademicYear();
  $curr = $acy->get_current_academic_year();
  ?>

<div id="dashboard-left" class="span8">
    <h5 class="widgettitle">Students Classes Registrations Summary for Current Semester ( <?= $curr->notation ?> )</h5>
    <div id="tabs"   class="tabbedwidget tabs">
        <ul >
            <li ><a href="#tabs-1">Bachelor Degree(Beng)</a></li>
            <li ><a href="#tabs-2">Ordinary Diploma(OD)</a></li>
            <li><a href="#tabs-3">Summary Information</a></li>
        </ul>
        <div id="tabs-1">
            <table class="table table-bordered responsive">
                <thead>
                <tr>
                    <th class="head0">Program Course</th>
                    <th class="head1">Semester</th>
                    <th class="head0">Registered</th>
                    <th class="head1">Unregistered</th>
                    <th class="head0">Retake</th>
                    <th class="head0">Postpone</th>
                    <th class="head1">Total</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div id="tabs-2">
            <table class="table table-bordered responsive">
                <thead>
                <tr>
                    <th class="head0">Program Course</th>
                    <th class="head1">Semester</th>
                    <th class="head0">Registered</th>
                    <th class="head1">Unregistred</th>
                    <th class="head0">Retake</th>
                    <th class="head0">Postpone</th>
                    <th class="head1">Total</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div id="tabs-3">
            <h4 class="subtitle">
                Summary Information
            </h4>
        </div>
    </div>

     <div clas='divider4'>
     </div>
     <br>
    <h4 class="widgettitle"><span class="icon-comment icon-white"></span> Recent Inquiries</h4>
    <div class="widgetcontent nopadding">

    </div>

    <br>


</div><!--span8-->

<div id="dashboard-right" class="span4">

<h4 class="widgettitle">Event Calendar</h4>
<div class="widgetcontent nopadding">
    <div  id="datepicker"></div>
</div>

<br>

</div><!--span4-->

<div class="scripts">
    <script>
        jQuery("#datepicker").datepicker();
    </script>
</div>
