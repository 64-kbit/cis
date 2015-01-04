<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
//var_dump($fkeys);
$modalTitle ="Crop Profile Image/Photo";

            ?>
<div class="" style="margin: -10px;box-shadow: 0px 0px 4px 0px;min-height:400px">
     <div class="row-fluid">
         <div class="span9">

             <div class="profilethumb" style="position:relative;;display:block;height: 400px;overflow-x: hidden;overflow-y: scroll;">
                 <?php     $img =   base_url()  ."upload_file/get_photo?refresh=" .$fkeys['refresh']. "&type=profile_photo&userid=".$fkeys['itemid']."&image=".$fkeys['itemname'] ;
                 ?>
                 <img class="animate4 bounceIn profile_photo" id="croppable" src="<?php echo $img ?>" alt="" style="width:100%;" >
             </div>
             <!--profilethumb-->
             <div class="eg-button" style="margin: 15px;">
                 <button id="restore_img" target-form="#new-crop_profile_img-data" type="button" class="btn btn-warning">Restore Original</button>
                 <button id="reset" type="button" class="btn btn-warning">Reset</button>
                 <button id="clear" type="button" class="btn btn-primary">Clear</button>
                 <button id="zoomIn" type="button" class="btn btn-info">Zoom In</button>
                 <button id="zoomOut" type="button" class="btn btn-info">Zoom Out</button>
                 <!--<button id="rotateLeft" type="button" class="btn btn-info">Rotate Left</button>
                 <button id="rotateRight" type="button" class="btn btn-info">Rotate Right</button>    -->
             </div>
         </div>
         <div class="span3">
             <div class="profilecontrols" style="position:relative;display:block;height: 400px;background: transparent">
                 <div class="preview-photo img-polaroid" style="margin: 15px;width: 128px;height: 154px;overflow: hidden">

                 </div>
                 <div class="preview-photo img-circle" style="margin: 15px auto;border: 4px solid #0077b3;padding: 0px;background:#ff5;width: 60px;height: 60px;overflow: hidden">

                 </div>
             </div>
         </div>
     </div>
   </div>

<?php echo form_open(base_url() ."upload_file/crop_image", 'class="stdform stdform2" id="new-crop_profile_img-data"', array('token'=>$currenttoken) +$fkeys);


echo form_hidden("coord_x","");
echo form_hidden("coord_y","");
echo form_hidden("width","");
echo form_hidden("height","");
echo form_hidden("rotate_deg",'0');
echo form_hidden("allow_rotate",false);
  echo form_close() ;
    $actButton ='<button type="button" class="btn btn-primary crop-image-btn modal-control-btn" target-div="#user-crop_profile_img-contents" target-modal="#edit-item-data" target-form="#new-crop_profile_img-data">Save Image</button>';
 ?>
<div class="scripts">
    <script>
        updateModaltitle(2,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;

        var $modal = jQuery("#edit-item-data"),
            $image = $modal.find("#croppable"),
            originalData = {};
            $image.cropper({
                aspectRatio: 0.8075,
                multiple: false,
                preview: ".preview-photo,.preview",
                 data: {
            x: 420,
                y: 50,
                width: 640,
                height: 360
        },
                done: function(data) {
                    jQuery("input[name=coord_x]").val(data.x);
                    jQuery("input[name=coord_y]").val(data.y);
                    jQuery("input[name=width]").val(data.width);
                    jQuery("input[name=height]").val(data.height);

                }
            });
        $modal.on("hidden.bs.modal", function() {
            originalData = $image.cropper("getData");
            $image.cropper("destroy");
        });


        jQuery("#reset").click(function() {
            $image.cropper("reset");
        });

        jQuery("#reset2").click(function() {
            $image.cropper("reset", true);
        });

        jQuery("#clear").click(function() {
            $image.cropper("clear");
        });


        jQuery("#zoom").click(function() {
            $image.cropper("zoom", jQuery("#zoomWith").val());
        });

        jQuery("#zoomIn").click(function() {
            $image.cropper("zoom", 0.1);
        });

        jQuery("#zoomOut").click(function() {
            $image.cropper("zoom", -0.1);
        });

        jQuery("#rotateLeft").click(function() {
           // $image.css("transform",'rotate(-90)')
            jQuery("input[name=rotate_deg]").val(jQuery("input[name=rotate_deg]").val() - 15);
          //  $image.cropper("rotate", -15);

        });

        jQuery("#rotateRight").click(function() {
            //$image.css("transform",'rotate(90)')
            jQuery("input[name=rotate_deg]").val(jQuery("input[name=rotate_deg]").val() + 15);
           // $image.cropper("rotate", 15);

        });

        jQuery("#setAspectRatio").click(function() {
            $image.cropper("setAspectRatio", jQuery("#aspectRatio").val());
        });


        jQuery("#restore_img").click(function(){
            jQuery('.modal').modalmanager('loading');
            var target_form = jQuery(jQuery(this).attr('target-form'));
            var form_data = jQuery(target_form).serialize() + "&acttype=resetimg&ajaxrequest=true";;
            jQuery.post(target_form.attr('action'),form_data,function(data,xhr){
                if(xhr== 'success'){
                    if(data.error){
                        alert_warning("error",data.message);
                    }else{
                        var radm = Math.random();
                        jQuery('.profile_photo,.profile_thumb,.cropper-container img').each(function(){
                            var src = jQuery(this).attr('src');
                            jQuery(this).attr('src',src + "&"+radm);
                        }) ;
                        $image.cropper('replace',$image.attr('src')+radm);
                        alert_warning("info",data.message);


                    }
                }else{
                    alert_warning('error',"Network Timeout");
                }
                jQuery('.modal').modalmanager('removeLoading');
            });

        });

        jQuery(".crop-image-btn").click(function(){
            var target_form = jQuery(jQuery(this).attr('target-form'));
            var form_data = jQuery(target_form).serialize() + "&acttype=edit&ajaxrequest=true";;
            jQuery('.modal').modalmanager('loading');
            jQuery.post(target_form.attr('action'),form_data,function(data,xhr){
                if(xhr== 'success'){
                    if(data.error){
                        alert_warning("error",data.message);
                    }else{
                        var radm = Math.random();
                        jQuery('.profile_photo,.profile_thumb,.cropper-container img').each(function(){
                           var src = jQuery(this).attr('src');
                           jQuery(this).attr('src',src + "&"+radm);
                       }) ;
                        $image.cropper('replace',$image.attr('src')+radm);
                        alert_warning("info",data.message);


                    }
                }else{
                    alert_warning('error',"Network Timeout");
                 }
                jQuery('.modal').modalmanager('removeLoading');
            });

        })

        jQuery('.profilethumb').slimScroll( {
            height: '400px'
        });


    </script>
</div>
