<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
    $users = new User();
$list = $users->get_list(false,10,$userdata['profile']=='department'?$userdata['user_info']['id']:false);
$session = new UserSession();
if(isset($queryData['filt']) && $userdata['profile'] != 'department'){
    $filter = $queryData['filt'];
    $dpinfo = 0;
}else{
    if($userdata['profile'] == 'department'){
        $dpinfo = $userdata['user_info']['name'];
        $filter = trim($queryData['filt'])?$queryData['filt']:$dpinfo;
    }else{
        $filter = "";
        $dpinfo = 0;
    }
}


$datasrc = base_url() . "ajax_load/html_data?itemtype=users_list&filter=".$filter . '&dp='.$dpinfo;
//var_dump($queryData);
?>

<div class="maincontentinner">

<ul class="peoplegroup">
    <li class="">
        <a href="<?= base_url() ?>ajax_load/form?name=new_user" class="btn btn-primary" data-toggle="modal" data-target="#add-item-data" ><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;&nbsp;Add New User</a>
    </li>
    <li class="active"><a href="">All Users <span class="badge badge-info"><?= $list['count']?></span></a></li>
    <li><a href="?filt=ss">System Users</a> </li>
    <li><a href="?filt=lv">Online</a></li>
    <li><a href="">Offline</a></li>
    <li><a href="">Students</a></li>
    <li><a href="">Lecturers</a></li>
    <li><a href="">Admins</a></li>
    <li><a href="">Others</a></li>
</ul>
    <div style="min-width: 400px;overflow:hidden">
        <ul class="alphabets">
            <?php foreach($list['alphabets'] as $id => $lt){
                if($lt['count'] > 0){?>
                    <li class="" data-toggle="tooltip" title="Total Matches:<?= $lt['count']?>"><a  href=""><?= $id ?></a></li>
                <?php  }else{
                    ?>
                    <li><?= $id ?></li>
                <?php    }
            }   ?>

        </ul>
    </div>
<div class="peoplelist">

<div class="row-fluid" id="user-list-contents" style="bottom:0;height: auto;padding:0">
    <div class="col-md-10">
        <span class="text-success" style="margin: 1% 4%; font-size: 24px">
           <div style="width: 400px;  z-index: 1060;" class=" fade in">
               <div class="progress progress-striped active"><div style="width: 100%;" class="bar"></div></div>
           </div>
            <script>
              //  jQuery("body").modalmanager("loading");
            </script>
        </span>
    </div>
    <!--span6-->
</div><!--row-fluid-->

</div><!--peoplelist-->
</div>

<div class="scripts">
    <script>
        //var lisheight = jQuery("#user-list-contents").top();
        var target = "#user-list-contents";
        var accessurl = "<?=  $datasrc  ?>";
      //  jQuery()

        var windHeight = window.outerHeight;
        var divht = windHeight - 400;
        if(divht < 500){
            divht = 400;
        }

        jQuery(target).css({'height': divht + "px"}).slimScroll({railVisible:true,allowPageScroll:true,height:divht + "px"})


        jQuery(window).resize(function(){

            resizeHandler(target)
           // Little error in the given script :

           /*
            var windHeight = window.outerHeight;
            var divht = windHeight - 400;
            if(divht < 500){
                divht = 500;
            }
            jQuery(target).css({'height': divht + "px"})//.slimScroll({height:divht + "px"})
            */
        });



        jQuery.post(accessurl,{},function(rdata,xhr){
            if(xhr=='success'){
                 jQuery(target).html(rdata);
            }else{
                jQuery(target).html("<span class='text-error'><i class='glyphicon glyphicon-warning-sign'></i>&nbsp;&nbsp;Network timeout !! Network connection timeout</span>")
            }
            //jQuery("body").modalmanager("removeLoading");

        })

        jQuery("#page_search_form").submit(function(e){
            jQuery('body').modalmanager("loading");
            e.preventDefault();
            var searchterm =  jQuery("#page_search_input").val();
            jQuery.post(accessurl,{action:'search',term:searchterm,limit:20},function(rdata,xhr){
                if(xhr == 'success'){
                    jQuery(target).html(rdata)

                }else{
                    jQuery(target).html("<span class='text-error'>Sorry we Couldn't connect to server! retry </span> ")

                }
                jQuery('body').modalmanager("removeLoading");

            })

        })




    </script>
</div>
