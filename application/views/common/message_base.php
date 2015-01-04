<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>



<div class="row-fluid">
<div class="messagepanel" role="tabpanel">
<!--messagehead-->

    <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 0px;">

        <li role="presentation" class="active"><a href="#msgpanel-1"  aria-controls="profile" role="tab" data-toggle="tab"><span class="fa fa-inbox"></span>&nbsp;&nbsp; Inbox</a></li>
        <li role="presentation"><a href="#msgpanel-2"  aria-controls="profile" role="tab" data-toggle="tab" ><span class="fa fa-edit"></span>&nbsp;&nbsp;Compose</a></li>
        <li role="presentation"><a href="#msgpanel-3"  aria-controls="profile" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-volume-up"></span>&nbsp;&nbsp;Broadcast</a></li>
        <li role="presentation"><a href="#msgpanel-4"  aria-controls="profile" role="tab" data-toggle="tab"><span class="fa fa-plane"></span> Sent</a></li>
        <li role="presentation"><a href="#msgpanel-5"  aria-controls="profile" role="tab" data-toggle="tab"><span class="fa fa-edit"></span> Draft</a></li>
        <li role="presentation"><a href="#msgpanel-6"  aria-controls="profile" role="tab" data-toggle="tab"><span class="fa fa-trash"></span> Trash</a></li>
    </ul>

    <div class="tab-content">
        <div role='tabpanel' class="tab-pane fade in active messagecontent" id="msgpanel-1">
        <div class="messageleft">
            <form class="messagesearch">
                <input class="input-block-level" placeholder="Search message and hit enter..." type="text">
            </form>
            <ul class="msglist">
                <li class="selected">
                    <div class="thumb"><img src="images/photos/thumb1.png" alt=""></div>
                    <div class="summary">
                        <span class="date pull-right"><small>April 03, 2013</small></span>
                        <h4>Message Sender</h4>
                        <p><strong>Message Title</strong> -Message Title..</p>
                    </div>
                </li>
            </ul>
        </div><!--messageleft-->
        <div class="messageright">
            <div class="messageview">
                <div class="btn-group pull-right">
                    <button data-toggle="dropdown" class="btn dropdown-toggle">Actions <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Forward</a></li>
                        <li><a href="#">Report as Spam</a></li>
                        <li><a href="#">Delete Message</a></li>
                        <li><a href="#">Print Message</a></li>
                        <li><a href="#">Mark as Unread</a></li>
                    </ul>
                </div>

                <h1 class="subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit</h1>
                <div class="msgauthor">
                    <div class="thumb"><img src="images/photos/thumb1.png" alt=""></div>
                    <div class="authorinfo">
                        <span class="date pull-right">April 03, 2012</span>
                        <h5><strong>Leevanjo Sarce</strong> <span>hisemail@hisdomain.com</span></h5>
                        <span class="to">to me@mydomain.com</span>
                    </div><!--authorinfo-->
                </div><!--msgauthor-->
                <div class="msgbody">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <p>Regards, <br>Leevanjo</p>
                </div><!--msgbody-->


            <div class="msgreply">
                <div class="thumb"><img src="images/photos/thumb1.png" alt=""></div>
                <div class="reply">
                    <textarea placeholder="Type something here to reply"></textarea>
                </div><!--reply-->
            </div><!--messagereply-->

        </div><!--messageright-->
        </div><!--messagecontent-->
        </div>

        <div role='tabpanel' class="tab-pane fade messagecontent" id="msgpanel-2">

        </div>

        <div role='tabpanel' class="tab-pane fade messagecontent" id="msgpanel-3">

        </div>

        <div role='tabpanel' class="tab-pane fade messagecontent" id="msgpanel-4">

        </div>

        <div role='tabpanel' class="tab-pane fade messagecontent" id="msgpanel-5">

        </div>

        <div role='tabpanel' class="tab-pane fade messagecontent" id="msgpanel-6">

        </div>

     </div>
</div>
