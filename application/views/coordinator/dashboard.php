<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


<div id="dashboard-left" class="span8">

    <h5 class="subtitle">Quick Access Pages</h5>
    <!--
    <ul class="shortcuts">

        <li class="archive">
            <a href="<?= base_url() . user_profile($userdata['profile']) ."/fee_structure_payments" ?>">
                <span class="shortcuts-icon fa fa-dollar "></span>
                <span class="shortcuts-label">Fee Payments</span>
            </a>
        </li>
        <li class="help">
            <a href="<?= base_url() . user_profile($userdata['profile']) ."/programmes/classes" ?>">
                <span class="shortcuts-icon glyphicon glyphicon-tags"></span>
                <span class="shortcuts-label">Classes</span>
            </a>
        </li>
        <li class="last images">
            <a href="<?= base_url() . user_profile($userdata['profile']) ."/admission/students_list/registered" ?>">
                <span class="shortcuts-icon glyphicon glyphicon-circle-arrow-down"></span>
                <span class="shortcuts-label">Registrations</span>
            </a>
        </li>
        <li class="last images">
            <a onclick="alert('Feature In Progress');return false;" href="<?= base_url() . user_profile($userdata['profile']) ."/message/announcement" ?>">
                <span class="shortcuts-icon fa fa fa-volume-up fa fa-rotate-270"></span>
                <span class="shortcuts-label">Announcements</span>
            </a>
        </li>

        <li class="events">
            <a onclick="alert('Feature In Progress');return false;" href="#<?= base_url() . user_profile($userdata['profile']) ."/info/calendar" ?>">
                <span class="shortcuts-icon iconsi-event"></span>
                <span class="shortcuts-label">Calendar</span>
            </a>
        </li>

    </ul>

-->
    <br>

    <h5 class="subtitle">Daily Statistics</h5><br>
    <div class="divider30"></div>


</div><!--span8-->

<div id="dashboard-right" class="span4">
    <h4 class="widgettitle">Event Calendar</h4>
    <div class="widgetcontent nopadding">
        <div  id="EventsCalenderDatePicker">
        </div>
    </div>


    <br>

</div><!--span4-->
