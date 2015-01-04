<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


<div id="dashboard-left" class="span8">

    <h5 class="subtitle">Quick Access Pages</h5>
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


    <div id="tabs" class="tabbedwidget tab-primary ">
        <ul >
            <li><a  href="#tabs-1"><span class=" fa fa-group "></span></a></li>
            <li><a  href="#tabs-2"><span class="fa fa-envelope-alt "></span></a></li>
            <li><a  href="#tabs-3"><span class="fa fa-comments"></span></a></li>
        </ul>
        <div  id="tabs-1" class="nopadding" >
            <h5 class="tabtitle">Last Registered Students </h5>
            <ul class="userlist">
                <?php
                   if(isset($last_log)){
                       foreach($last_log['last_logged'] as $id=> $uid){      ?>
                           <li>
                               <div>
                                   <img src="<?php echo $uid['profile_thumb'] ?>" alt="" class="pull-left">
                                   <div class="uinfo">
                                       <h5><?php echo $uid['name'] . " <em>(" . $uidi['login_id'] . " ) </em>"?></h5>
                                       <span class="pos"><?php echo $uid['profile'] ?> </span>
                                       <span>Last Logged In: <?php  echo $uid['last_login']?></span>
                                   </div>
                               </div>
                           </li>
                <?php       }
                   }else{ ?>
                       <li>
                           <div>
                               <img src="images/photos/thumb1.png" alt="" class="pull-left">
                               <div class="uinfo">
                                   <h5>None So far</h5>
                                   <span class="pos">--</span>
                                   <span>--</span>
                               </div>
                           </div>
                       </li>
               <?php    }
                ?>

            </ul>
        </div>
    <div  id="tabs-2" class="nopadding ">
            <h5 class="tabtitle">Messages</h5>
            <ul class="userlist ">

                <?php
                if(isset($last_log)){
                    foreach($last_log['messages'] as $id=> $uid){      ?>
                        <li>
                            <div>
                                <img src="<?php echo $uid['profile_thumb'] ?>" alt="" class="pull-left">
                                <div class="uinfo">
                                    <h5><?php echo $uid['name'] . " <em>(" . $uidi['login_id'] . " ) </em>"?></h5>
                                    <p class="par"><?php echo $uid['message'] ?></p>
                                    <span>Date Sent<?php  echo $uid['last_login']?></span>
                                    <p class="link">
                                        <a href=""><i class="fa fa-envelope"></i> reply</a>

                                    </p>
                                </div>
                            </div>
                        </li>
                    <?php       }
                }else{ ?>
                    <li>
                        <div>

                            <div class="uinfo">
                                <h5>None So far</h5>
                                <p class="bar">--</p>
                                <span>--</span>
                            </div>
                        </div>
                    </li>
                <?php    }
                ?>
            </ul>
        </div>
    <div  id="tabs-3" class="nopadding">
            <h5 class="tabtitle">Top Comments</h5>
            <ul class="userlist">
                <?php
                if(isset($last_log)){
                    foreach($last_log['last_comments'] as $id=> $uid){      ?>
                        <li>
                            <div>
                                <img src="<?php echo $uid['profile_thumb'] ?>" alt="" class="pull-left">
                                <div class="uinfo">
                                    <h5><?php echo $uid['name'] . " <em>(" . $uidi['login_id'] . " ) </em>"?></h5>
                                    <p class="par"><?php echo $uid['comment'] ?></p>
                                    <span>Date Commented<?php  echo $uid['last_login']?></span>
                                </div>
                            </div>
                        </li>
                    <?php       }
                }else{ ?>
                    <li>
                        <div>
                            <img src="images/photos/thumb1.png" alt="" class="pull-left">
                            <div class="uinfo">
                                <h5>None So far</h5>
                                <p class="bar">--</p>
                                <span>--</span>
                            </div>
                        </div>
                    </li>
                <?php    }
                ?>
            </ul>
        </div>

    </div><!--tabbedwidget-->


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
