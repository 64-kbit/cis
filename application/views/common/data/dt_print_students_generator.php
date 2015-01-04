<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
   //var_dump($queryData);
//var_dump($userdata);
    //echo "generate reports for printing";
$sourcetbl ="#". $queryData['sourcetb'];
//$sourceform = "#".$queryData['sourcefm'];
$modalTitle = "Print Students List Matching:  ";
   $reportGen = new PrintGenerator();

?>

<div id="print_list_items" style="margin:-14px">
    <?php echo form_open(base_url()."admin/print_report",' class="stdform stdform2" id="print_list-form" ',$queryData) ?>

    <div id="tabs" class="tabbedwidget tab-primary no-padding">
        <ul>
            <li class="active"><a href="#tab-1">Print Config</a></li>
            <li><a href="#tab-2">Print List</a></li>
        </ul>

        <div id="tab-1"  style="min-height: 400px" class="config-container">
            <p>
                <label>Select Template from List</label>
                <span class="field">
                     <?= form_dropdown('template',$reportGen->get_my_templates($userdata['login_id']),"",' class="chosen-select input-xlarge" id="template_choose"') ?>
                </span>
            </p>
             <p>
                 <label>Choose Columns</label>
                 <span class="field">
                     <?= form_dropdown('columns[]',$reportGen->create_col_map(),"",'multiple class="chosen-select input-xxlarge"') ?>
                 </span>
             </p>

            <p>
                <label>Set Template Name<small>Specify the Report name of the Template</small></label>
                <span class="field">
                    <?= form_input('template_name',"","place_holder='Report Template Name'") ?>
                </span>
            </p>

            <p>
                <label>Report Title<small>Specify the Heading Title of the Report</small></label>
                <span class="field">
                    <?= form_input('template_title',""," class='input-xlarge' place_holder='Report Template Name'") ?>
                </span>
            </p>

            <p>
                <label>Report Type</label>
                <span class="field">
                    <label class="inline">
                        <?php if($userdata['access_level'] != 2){  ?>
                        <input type="checkbox" name="report_type[]" value="excel"/><i class="fa fa-file-excel-o"  style="color:green"></i>&nbsp;&nbsp;Excel
                    </label>
                    <?php } ?>
                         &nbsp;&nbsp;

                    <label class="inline">
                        <input type="checkbox" name="report_type[]" value="pdf"/><i style="color:green" class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF
                    </label>

                </span>
            </p>

            <p id="download_link">

            </p>

            </div>
        <div id="tab-2"  style="min-height: 400px">
            <table id="print_list_item-table" class="table-responsive table table-striped">
                <colgroup>
                    <col class="row-head" style="width:8%">
                </colgroup>
                <thead>
                <tr>
                    <th>#</th><th>ID</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
</div>

    <?php echo form_close() ?>

</div>

<?php
$actButton ='<button type="button" class="btn btn-primary print-data-action modal-control-btn" target-div="#print_list-form-list-contents" target-modal="#edit-item-data" target-form="#print_list-form"><i class="glyphicon glyphicon-print"></i>&nbsp;&nbsp;Print</button>';
?>
<div class="scripts">
    <script>
       // jQuery("#print_list_item-table").dataTable({
         //   'dom':'<"top"lfpi><"#table_wrapper"t><"bottom"lfpi><"clear">'
       // });
       var searchterm = jQuery(".dtable-form").find('input[type=search]').val();
      // alert(searchterm)

       var dttable = jQuery("<?= $sourcetbl ?>").dataTable()._('tr', {"filter":"applied"});
       //console.log(registration_students._('tr', {"filter":"applied"}));
        //console.log(dttable);
        jQuery(dttable).each(function(i,e){
           // console.log(e[0].filter("input"));
            var htmls =jQuery.parseHTML(e[0]);
            var dataitem =  jQuery(htmls[0]).val();
           // console.log(jQuery(htmls[0]).val());
            jQuery("#print_list-form").append(htmls[0]);
            jQuery("#print_list_item-table").find('tbody').append("<tr><td>"+ (i + 1) +"</td><td>" + dataitem + '</td></tr>');
        })
       jQuery("#print_list_item-table").dataTable();
       updateModaltitle(1,'<?= addslashes($modalTitle) ?><span class="badge">' +searchterm + '</span>' ,'<?= addslashes($actButton) ?>') ;
       update_table_check("#print_list_item-table");
           jQuery("#tabs").tabs();
        jQuery(".chosen-select").chosen();

        jQuery(".print-data-action").click(function (){
            var target = jQuery(jQuery(this).attr('target-form'));
            var formdata = jQuery(target).serialize();
            jQuery('body').modalmanager("loading");
            jQuery.post(target.attr('action'),formdata,function(rdata,xhr){
                if(xhr == 'success'){
                 jQuery("#download_link").html(
                    "<p><label>Download Links <small>Click to download link</small></label><span class='field'>" +  rdata.data +  "</span>"
                 );
                }else{
                    jQuery.growl.error({'title':"Network Timeout",'message':"Failed to receive a request! retry Again!"})
                }
                jQuery('body').modalmanager("removeLoading");
            })
        })  ;

        jQuery("#template_choose").change(function(){

            if(jQuery(this).val() != "other"){
                jQuery('body').modalmanager("loading");
                jQuery.post('<?= base_url() ?>ajax_load/get_user_template?',{tplid:jQuery(this).val()},function(rdata,xhr){
                    jQuery('body').modalmanager("removeLoading");
                });
            }
        })
    </script>



</div>


