
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
    <?php
    $filtype = file_type_from_name($fkeys['fname']);
    $file = base_url() . "upload_file/get_attachment?tdid=" . $fkeys['stid'] . '&type=' . $fkeys['type'].'&file='. $fkeys['fname'] ."&fmime=".$filtype ;


    ?>
<div id="attachment" style="margin: -13px;width: 100%;height:440px;">
        <?php
            if(strtolower($filtype) == 'pdf'){   ?>
<script>
    var myPdf = new PDFObject({url: "<?php echo $file; ?>"}).embed('attachment');
</script>
            <?php }else {  ?>
                <img class="img-polaroid" src="<?= $file ?> " style="width: 98%">
                <script>
                    jQuery("#attachment").slimScroll({'height':440 + "px"})
                </script>
            <?php  }
        ?>
</div>

<div class="scripts">

</div>


