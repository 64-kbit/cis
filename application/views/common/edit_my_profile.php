<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>


<div class="row-fluid">
    <!--span4-->
    <div class="span7 animate2 bounceInUp">
        <form id='updateinfo' action="<?php echo base_url() . user_profile($userdata['profile']) ?>/profile/update" class="editprofileform" method="post">

            <div class="widgetbox login-information">
                <h4 class="widgettitle"><span class="fa fa-user" style="font-size:20px"></span>Login Information</h4>
                <div class="widgetcontent">
                    <input type="hidden" name="account_type" value="student" />
                    <input type="hidden" name="user_id" value="<?= trim($userdata['login_id']) ?>" />
                    <input type="hidden" name="cur_email" value="<?= trim($userdata['email_address']) ?>"/>
                    <p>
                        <label>Login ID:</label>
                        <span class="badge badge-info"><?php echo $userdata['login_id'] ?></span>
                    </p>

                    <p>
                        <label>Email:</label>
                        <input name="email" class="input-xlarge required-data" value="<?php echo $userdata['email_address'] ?>" type="text">
                    </p>
                    <p>
                        <label >New Password: </label>
                        <input  name="password" class="input-xlarge " placeholder="type new password" value="" type="password">
                    </p>
                    <p>
                        <label >Password Confirm: </label>
                        <input name="password_confirm" class="input-xlarge " placeholder="Confirm password" value="" type="password">
                    </p>
                    <p>
                        <button type="submit" class="btn btn-primary" id="update_profile"><i class="glyphicon glyphicon-floppy-disk"></i> &nbsp;&nbsp;Save Changes</button> &nbsp;
                    </p>
                </div>
            </div>
        </form>
    </div><!--span8-->
    <div class="span5 profile-right animate2 bounceInRight">

        <div class="widgetbox profile-photo" style="display: block;height: 100%">
            <div class="headtitle">
                <h4 class="widgettitle"><span class="glyphicon glyphicon-picture" style="font-size:16px"></span> &nbsp;&nbsp;Profile Photo <?php if(!empty($userdata['profile_photo'])) { ?> <span class="btn-small" data-toggle="modal" data-target="#edit-item-data" style="cursor: pointer" href="<?= base_url() .'ajax_load/form_edit?refresh=1&itype=profile_photo&itemname='.$userdata['profile_photo'].'&itemid='.trim($userdata['login_id'])?>"><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;Edit</span> <?php } ?></h4>
            </div>
            <div id="crop-avatar" class="widgetcontent" style="min-height:400px">
                <div  data-toggle="modal" data-target="#edit-item-data"  href="<?= base_url() .'ajax_load/form_edit?refresh=1&itype=profile_photo&itemname='.$userdata['profile_photo'].'&itemid='.trim($userdata['login_id'])?>" class="profilethumb  avatar-view" style="height: 330px;overflow-x: hidden;overflow-y: scroll">
                    <?php     $img = empty($userdata['profile_photo'])?image_folder().'nothumb.png':profile_pic_url($userdata['id'],$userdata['profile_photo'],'full');
                    ?>
                    <img id="crop-imgsrc"  src="<?php echo $img ?>" alt="" style="width:96%;pointer-events:none" class="img-polaroid profile_photo">
                </div><!--profilethumb-->

                <div class="controls" style="margin-top: 10px;">
                    <div ><span class="btn btn-primary fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Upload new Picture</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" name="files[]"  type="file">

    </span>
                        <div style="display: inline-block;width: 60%">
                            <div id="progress" class="progress">
                                <div class="progress-bar progress-bar-success"></div>
                            </div>

                        </div>
                    </div>

                    <div id="files" class="files text-info"></div>

                </div>
            </div>
        </div>
    </div
</div>
<div class="scripts">
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
   <!-- <script src="<?= plugins_folder() ?>uploader/cors/jquery.xdr-transport.js"></script> -->
    <!--[endif]-->
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <!-- The basic File Upload plugin        -->
    <script src="<?= plugins_folder() ?>cropper.min.js"></script>
    <script src="<?= plugins_folder() ?>crop-image.js"></script>

    <script src="<?= plugins_folder() ?>uploader/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin   -->
    <script src="<?= plugins_folder() ?>uploader/jquery.fileupload-process.js"></script>
    <!-- The File Upload validation plugin   -->
    <script src="<?= plugins_folder() ?>uploader/jquery.fileupload-validate.js"></script>


    <script src="<?= plugins_folder() ?>uploader/jquery.iframe-transport.js"></script>
    <script src="<?= plugins_folder() ?>uploader/jquery.iframe-transport.js"></script>

    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    <script>
        /*jslint unparam: true */
        /*global window, $ */
        jQuery(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url = '<?php echo base_url() . "upload_file/profile_photo" ?>';
            jQuery('#fileupload').fileupload({
                url: url,
                acceptFileTypes: /(\.|\/)(jpg|png|jpeg|gif)$/i,
                dataType: 'json', disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator.userAgent),
                previewMaxWidth: 100,
                previewMaxHeight: 100,
                previewCrop: true,
                done: function (e, data) {
                    var file = data.files[0].name.split(".");
                    var type = file.pop();;

                    var userid = "<?= trim($userdata['login_id']) ?>";
                    //  var fname = file
                    var randm =    Math.random();
                    var pimg = "<?= base_url()  ?>upload_file/get_photo?refresh="+randm +"&type=profile_thumb&userid=<?= $userdata['id']?>&image=" + userid + "." + type;
                    var fimg =  "<?= base_url()  ?>upload_file/get_photo?refresh="+  randm +"&type=profile_photo&userid=<?= $userdata['id']?>&image=" + userid + "." + type;;
                    var editimgurl ="<?= base_url() ?>ajax_load/form_edit?refresh="+randm+"&itemname=" +userid + "." + type + "&itype=profile_photo&itemid=" +userid ;

                    jQuery(".profilethumb img").attr('src',fimg);;
                    jQuery(".userloggedinfo img").attr('src',pimg);
                    jQuery(".fileinput-button").find("span").html("Select New Image");
                    jQuery("#files").html("<span class='text-success'><i class='glyphicon glyphicon-ok'></i>&nbsp;&nbsp; Saved as "+userid + "." + type +"</div>&nbsp;&nbsp;<button data-toggle='modal' data-target='#edit-item-data' href='" + editimgurl + "' class='btn btn-success'><i class='glyphicon glyphicon-edit'></i>&nbsp;&nbsp;Edit Image</buton>")
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    jQuery('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                    )
                    jQuery(".fileinput-button").find("span").html("Progress" + progress + " %");
                }
            }).on('fileuploadadd', function (e, data) {
                jQuery('#progress .progress-bar').css(
                    'width',
                    0 + '%'
                );
                jQuery("#files").html("")
                data.context = jQuery('<div/>').appendTo('#files');
                jQuery.each(data.files, function (index, file) {
                    console.log(index);
                    if(data.files.error == true){
                        var node = jQuery('<span/>').addClass('text-error').text("Invalid File Added!!");
                    }else{
                        var node = jQuery('<span/>').addClass('text-info').append("<i id='icon-spinner' class='icon-spin icon-spinner'></i>&nbsp;&nbsp;").append(file.name);
                    }

                    node.appendTo(data.context);
                });
            }).on('fileuploadfail', function (e, data) {
                jQuery.each(data.files, function (index, file) {
                    var error = jQuery('<span class="alert-danger text-danger"/>').text('File upload failed.');
                    jQuery.growl.error({title:'File Upload failed',message:error})
                    jQuery(data.context.children()[index])
                        .append('&nbsp;&nbsp;')
                        .append(error);
                });
            }).prop('disabled', !jQuery.support.fileInput)
                .parent().addClass(jQuery.support.fileInput ? undefined : 'disabled');
        });

        jQuery("#updateinfo").submit(function(){

            var valid = validate_form(this);
            if(valid){
                jQuery("body").modalmanager("loading");
                var actur = jQuery(this).attr('action');
                var formdata = jQuery(this).serialize();
                var form = this;
                jQuery.post(actur,formdata,function(rdata,xhr){
                    jQuery("body").modalmanager("removeLoading");
                    if(rdata.error != false){
                        jQuery.growl.error({title:"Error Information",message:rdata.message})
                        if(rdata.error == 1){
                            populate_form_errors(form,rdata.fields)
                        }
                    }else{
                        jQuery.growl.notice({title:"Update Status",message:rdata.message})
                    }
                })
            }
            return false;
        });

        jQuery("input").change(function(){
            jQuery(this).removeClass("inputError");
            jQuery(this).siblings(".text-error").remove();
        });
        jQuery('.profilethumb').slimScroll( {
            height: '320px'
        });
    </script>

</div>
