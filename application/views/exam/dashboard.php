<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


<div id="dashboard-left" class="span8">
    <h4 class="widgettitle">Fee & Other Payments History</h4>
    <table class="table table-bordered responsive">
        <thead>
        <tr>
            <th>Date</th>
            <th>Receipt No</th>
            <th>Amount</th>
            <th>Paid for</th>
            <th>Received by</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>12-dec-2012</td>
            <td>44432dfd33</td>
            <td>230,000/=</td>
            <td class="left">First Year School Fee</td>
            <td class="center">-</td>
        </tr>

        <tr>
            <td>12-dec-2012</td>
            <td>TRBX8899BXF00</td>
            <td>220,000/=</td>
            <td class="left">Second Year School Fee</td>
            <td class="center">-</td>
        </tr>

        </tbody>
    </table>

   <!--
    <h5 class="subtitle">Recently Viewed Pages</h5>
    <ul class="shortcuts">
        <li class="events">
            <a href="">
                <span class="shortcuts-icon iconsi-event"></span>
                <span class="shortcuts-label">Events</span>
            </a>
        </li>
        <li class="products">
            <a href="">
                <span class="shortcuts-icon iconsi-cart"></span>
                <span class="shortcuts-label">Products</span>
            </a>
        </li>
        <li class="archive">
            <a href="">
                <span class="shortcuts-icon iconsi-archive"></span>
                <span class="shortcuts-label">Archives</span>
            </a>
        </li>
        <li class="help">
            <a href="">
                <span class="shortcuts-icon iconsi-help"></span>
                <span class="shortcuts-label">Help</span>
            </a>
        </li>
        <li class="last images">
            <a href="">
                <span class="shortcuts-icon iconsi-images"></span>
                <span class="shortcuts-label">Images</span>
            </a>
        </li>
    </ul>       <div class="divider30"></div>
             -->
                <br>
    <h4 class="widgettitle">Semesters Examination Results</h4>

    <table class="table table-bordered responsive">
        <thead>
        <tr>
            <th class="head1">#</th>
            <th class="head0">Year</th>
            <th class="head1">Sem I</th>
            <th class="head0">Sem II</th>
            <th class="head1">Average GPA</th>
            <th class="head1">Remarks</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Basic Technician Certificate</td>
            <td>3.2</td>
            <td class="center">3.4</td>
            <td class="center">3.3</td>
            <td><span class="label label-success">Passed</span></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Technician Certificate</td>
            <td>3.6</td>
            <td class="center">3.6</td>
            <td class="center">3.6</td>
            <td><span class="label label-success">Passed</span></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Ordinary Diploma</td>
            <td>-</td>
            <td class="center">-</td>
            <td class="center">-</td>
            <td></td>
        </tr>
        </tbody>
    </table>

    <br>

    <h4 class="widgettitle"><span class="fa fa-info-circle"></span>Other News and Information</h4>
    <div class="widgetcontent nopadding">
        <ul class="commentlist">
            <li>
                <img src="images/photos/thumb2.png" alt="" class="pull-left">
                <div class="comment-info">
                    <h4><a href="">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</a></h4>
                    <h5>in <a href="">Sit Voluptatem</a></h5>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                    <p>
                        <a href="" class="btn btn-success btn-small"><span class="icon-thumbs-up icon-white"></span> Approve</a>
                        <a href="" class="btn btn-small"><span class="icon-thumbs-down"></span> Reject</a>
                    </p>
                </div>
            </li>

            <li><a href="">View More Announcements</a></li>
        </ul>
    </div>

    <br>


</div><!--span8-->

<div id="dashboard-right" class="span4">

    <h5 class="subtitle">Announcements</h5>

    <div class="divider15"></div>

    <div class="alert alert-info">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <h4>New Semester Registrations</h4>
        <p style="margin: 8px 0">All Students Are required to register for the Next Semester.</p>
    </div><!--alert-->

    <br>

    <h4 class="widgettitle">Event Calendar</h4>
    <div class="widgetcontent nopadding">
        <div id="EventsCalenderDatePicker"></div>
    </div>
