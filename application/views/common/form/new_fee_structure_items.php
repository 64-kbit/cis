<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$feecategories = new FeeFigures();

$structure  = new FeeStructure();
//$structureProgramme = new $structureProgramme();

$structure->where('id',$fkeys['itemid'])->get();

$list = $structure->get_non_structure_items($fkeys['itemid']);
$assigned = $structure->get_structure_items($fkeys['itemid']);

$modalTitle = "Edit fee structure <span class='badge badge-primary'>" . $structure->name . "</span> Items List";
//var_dump($list);
$items = array('--'=>'');
if($list['count']){
foreach($list['list'] as $it){
   $items[$it->id] = $it->name;
}
}

$selItems = array();
if($assigned['count']){
     foreach($assigned['list'] as $it){
         $selItems[] = $it->id;
     }
}

//var_dump($assigned);
$totallocal = 0;

$totalforeign = 0;
   echo form_open(base_url().user_profile($userdata['profile']) ."/update_fee_structure?mode=ajax",'class="stdform stdform2" id="fee_structure_items-data"',array('token'=>$currenttoken) +(isset($fkeys)?$fkeys:array()));     ?>
        <p>
            <label>Fee Payments Items<small>Select Structure Items from available list <br>Click add if it doesn't exists <br> If it exists. it will be updated</small></label>
            <span class="field">
                <?= form_dropdown('available_categories[]',$items,'','data-placeholder="Choose an item..." style="width:350px;"   class="chosen-select" id="fee-items-source-list" data-target="#fee_structure_items-list-table"') ?> <br>
                <input type="number" style="width:150px;" limit-digits="9" class="input-small item-input-text required-data" name="amount_local_input" id="amount_input" value="" placeholder="Enter local Amount Here">
                <input type="number" style="width:100px;" limit-digits="9" class="input-small item-input-text required-data" name="amount_foreign_input" id="amount_input_foreign" value="" placeholder="Enter Foreign amount here">
                <input type="number" style="width: 50px" maxlength="3" limit-digits="3" pattern="/\d{1,3}/" class="input-small item-input-text required-data" name="amount_percentage"  id="amount_perentage" title="Minimum Percentage that can be paid" placeholder="%" >
                <button class="btn btn-primary" id="add-fee-items" data-source="#fee-items-source-list" data-target="#fee_structure_items-list-table"><i class="fa fa-plus-square-o"></i>&nbsp;Add to List</button>
            </span>
        </p>
<div class="par">
        <table class="table table-striped responsive"  id="fee_structure_items-list-table">
            <colgroup>
                <col style="align: center; width: 2%">
                <col style="width:42%">
                <col style="width: 8%">
                <col style="width:12%">
                <col style="width:10%" >
                <col style="align: center; width: 20%">
                <col style="align: center; width: 6%">
            </colgroup>
            <thead>
           <tr>
                <th>#</th>
                <th>Item Name</th>
               <th>Min %</th>
                <th>Local</th>
                <th>Foreign</th>
                <th colspan="2">Is &nbsp; Optional</th>
                <!--<th>Description</th> -->
            </tr>
            </thead>
            <tbody count-indicator=".fee_structure_items-item-indicator" id="fee_structure_items-list-contents<?php //echo $dp_type; ?>">
                <?php
                    if($assigned['count']){
                        $assignedhidden = "";
                        $total = array('total'=>0,'foreign'=>0,'min'=>0,'minfo'=>0);
                        foreach($assigned['list'] as $id => $item){
                            $assignedhidden .="
<input type='hidden' data-id='{$item->fee_category_id}' value='{$item->amount}' name='localitems[{$item->fee_category_id}]' />
<input type='hidden' data-id2='{$item->fee_category_id}' value='{$item->amount_foreign}' name='foreignitems[{$item->fee_category_id}]' />
<input type='hidden' data-id3='{$item->fee_category_id}' value='{$item->minimum_amount}' name='itempercentage[{$item->fee_category_id}]' />";
                               $total['total'] += $item->amount;
                            $total['foreign'] += $item->amount_foreign;
                            $total['min'] += $item->is_required?$item->amount * $item->minimum_amount /100:0;
                            $total['minfo'] += $item->is_required?$item->amount_foreign * $item->minimum_amount /100:0;


                            ?>
                <tr class='data-row' remote-data="yes" id='fee-row-<?= $item->fee_category_id ?>'>
                    <td class='row-head'><?=  $id + 1 ?></td>
                   <td><?= $item->item_name ?></td>
                    <td><span class='badge badge-inverse min-percentage'><?= $item->minimum_amount ?></span></td>
                    <td><span class='amount-local text-success'><?= $item->amount ?></span></td>
                    <td><span class='amount-foreign text-info'><?= $item->amount_foreign ?></span></td>
                  <td><label  data-target='fee_structure_items-list-table' class='no-padding no-margins inline '>
                          <input type='radio' class='change_option' <?= $item->is_required==0?"checked":"" ?> name='optional[<?= $item->fee_category_id ?>]'  value='1'>Yes</label>

                    <label class='no-padding no-margins inline'>
                   <input  data-target='fee_structure_items-list-table' type='radio' class='change_option minimum_amount' <?= $item->is_required==0?"":"checked" ?> name='optional[<?= $item->fee_category_id ?>]'   value='0' >No</label>
                  </td>
                    <td><a title='remove item' remote-data="yes" data-target='fee_structure_items-list-table' row-target='<?= $item->fee_category_id ?>'  class='btn remove-fee-item  btn-warning'><i class='fa fa-remove'></i></a>
                    </td>
                </tr>
                        <?php   }  ?>
                        <tr id='total_items'><td style='text-align:right' colspan='3'>Minimum Total</td><td id='total_minimum_amount_local'> <span class='badge badge-success'><?= $total['min'] ?> TZS</span></td><td id='total_minimum_amount_foreign'><span class='badge badge-info'><?= $total['minfo'] ?> USD</span></td><td  colspan='2'>&nbsp;</td></tr>
                        <tr id='total_items2'><td style='text-align:right' colspan='3'>Maximum Total</td><td id='total_amount_local'> <span class='badge badge-success'><?= $total['total'] ?> TZS</span></td><td id='total_amount_foreign'><span class='badge badge-info'><?= $total['foreign'] ?> USD</span></td><td colspan='2'>&nbsp;</td></tr>
             <?php      }
                ?>

            </tbody>

            </table>

</div>

<div class="scripts" id="inputs-holder">
    <input type="hidden" name="fee_structure_amount_local"  value="<?= $totallocal ?>" >
    <input type="hidden" name="fee_structure_amount_foreign"  value="<?= $totalforeign ?>" >

    <?php
        if($assigned['count']){
           echo $assignedhidden;
        }
    ?>
</div>

   <?php

$actButton ='<button type="button" class="btn btn-primary send-data-action modal-control-btn" target-div="#fee_structure_items-list-contents" target-modal="#edit-item-data" target-form="#fee_structure_items-data"><i class="fa fa-save"></i>&nbsp;Save Changes</button>';

?>

<div class="scripts">
   <!-- <script src="<?php echo plugins_folder() ?>jquery.chosen.js" type="text/javascript"></script>
              -->
    <script>
        updateModaltitle(2,'<?= addslashes($modalTitle) ?>','<?= addslashes($actButton) ?>') ;

        jQuery("#structure_items-tab").tabs();
        jQuery(".chosen-select").chosen({no_results_text:"No matching Item found for "});


        jQuery("#add-fee-items").click(function(){
            // console.log(jQuery(".chosen-select").val());
            var selected = jQuery(".chosen-select")[0];

            var errors = false;
            jQuery(".item-input-text").each(function(el,itm){
                var numberpatern = parseInt(jQuery(itm).attr('limit-digit'));

                  var data = jQuery(itm).val();
                if(numberpatern == 3){
                    var match = new RegExp(/\d{1,3}/);
                }else{
                    var match = new RegExp(/\d{1,9}/);
                }
                var test = match.test(data)

               // alert(regex.test(jQuery(this).val())
                if(test == false){
                    jQuery(itm).addClass("inputError").css({color:"8aa"});
                    errors = true;
                }else{
                    jQuery(itm).removeClass("inputError").css({color: '#555'})
                }
            });



            if(jQuery(".chosen-select").val() == "--" || selected.length == 0 || errors == true){

                return false;
            }


            var target = jQuery(jQuery(this).attr('data-target'))[0];
            var targettable = jQuery(this).attr('data-target');




            //trstr += "<tr id='row-"+ item.val() +"'><td class='row-head'>" + (currentitems + id + 1) + "</td><td>" + itemtitle + "</td><td><input type='text' name=''></td></tr>" ;

            var currentitems = jQuery(target).find("tr").length;
            var trstr = "" ;

            jQuery(selected.selectedOptions).each(function(id,item){
                // console.log(jQuery(item).text());
                var itemtitle = jQuery(item).text();
                var amount_foreign = jQuery("input[name='amount_foreign_input']").val();
                var amount_local = jQuery("input[name='amount_local_input']").val();
                var minpercent = jQuery("input[name='amount_percentage']").val();
                //alert(amount_local)

                var rowid = jQuery(item).val();
                if(jQuery(target).find("#fee-row-"+ rowid).length > 0){
                    var existrow =  jQuery(target).find("#fee-row-"+ rowid)[0]
                    jQuery(existrow).find('.amount-foreign').html(amount_foreign);
                    jQuery(existrow).find('.amount-local').html(amount_local);
                    jQuery(existrow).find('.min-percentage').html(minpercent);
                    jQuery("#inputs-holder").find("input[data-id='"+rowid+"']").val(amount_local) ;
                    jQuery("#inputs-holder").find("input[data-id2='"+rowid+"']").val(amount_foreign)
                    jQuery("#inputs-holder").find("input[data-id3='"+rowid+"']").val(minpercent)
                }else{
                    var $options = "optional[" + rowid + "]";
                    trstr += "<tr class='data-row' id='fee-row-"+ rowid +"'> ";
                    trstr += "<td class='row-head'>" + (currentitems + id ) + "</td>";
                    trstr += "<td>"+  itemtitle + "</td>";
                    trstr += "<td><span class='badge badge-inverse min-percentage'>"+  minpercent + "</span></td>";
                    trstr += "<td><span class='amount-local text-success'>"+ amount_local + "</span></td>"  ;
                    trstr +=    "<td>"  ;
                    trstr +=    "<span class='amount-foreign text-info'>"+ amount_foreign +"</span></td>" ;
                    trstr +=     "<td><label  data-target='"+targettable+"' class='no-padding no-margins inline '>" ;
                    trstr +=     "<input type='radio' class='change_option' name='" +$options + "'  value='1'>Yes</label>" ;
                    trstr +=     "<label class='no-padding no-margins inline'>" ;
                    trstr +=     "<input  data-target='"+targettable+"' type='radio' class='change_option minimum_amount' name='optional[" + rowid + "]'  value='0' checked>No</label>" ;
                    trstr +=     "</td>"   ;
                    trstr +=    "<td><a title='remove item' data-target='"+targettable+"' row-target='"+rowid+"'  class='btn remove-fee-item  btn-warning'><i class='fa fa-remove'></i></a>"  ;
                    trstr +=   "</td>" ;
                    trstr +=  "</tr>" ;

                    jQuery("#inputs-holder").append("<input type='hidden' data-id='"+ rowid +"' value='"+amount_local+"' name='localitems["+rowid+"]' /><input type='hidden' data-id2='"+ rowid +"' value='"+amount_foreign+"' name='foreignitems["+rowid+"]' /><input type='hidden' data-id3='"+ rowid +"' value='"+minpercent+"' name='itempercentage["+rowid+"]' />");


                }
                //  jQuery(this).remove();
            }) ;





            var totalAmount = 0;
            var tatalForeing = 0;
            var minimumTotal = 0;
            var minimumForeign  = 0;

            if(trstr != ""){
                jQuery(target).find("tbody").append(trstr) ;
            }

            jQuery(target).find('#total_items,#total_items2').each(function(){
                jQuery(this).remove();
            }) ;

            jQuery('input[type="radio"],input[type="checkbox"]').uniform();

            jQuery(target).find("tr[class='data-row']").each(function(id,item){
                var miperc = parseInt(jQuery(item).find('.min-percentage').text());
                var local = jQuery(item).find('.amount-local').text();
                var foreign = jQuery(item).find('.amount-foreign').text();
                var optional = jQuery(item).find('input[type="radio"]:checked').val();


                if(optional == "0"){
                    minimumForeign += parseInt(foreign) * miperc/100;
                    minimumTotal += parseInt(local) * miperc/100;
                }
                totalAmount += parseInt(local);
                tatalForeing += parseInt(foreign);
            });

            var footer = "<tr id='total_items'><td style='text-align:right' colspan='3'>Minimum Total</td><td id='total_minimum_amount_local'> <span class='badge badge-success'>"+minimumTotal+" TZS</span></td><td id='total_minimum_amount_foreign'><span class='badge badge-info'>"+minimumForeign+" USD</span></td><td  colspan='2'>&nbsp;</td></tr>";

            footer += "<tr id='total_items2'><td style='text-align:right' colspan='3'>Maximum Total</td><td id='total_amount_local'> <span class='badge badge-success'>"+totalAmount+" TZS</span></td><td id='total_amount_foreign'><span class='badge badge-info'>"+tatalForeing+" USD</span></td><td colspan='2'>&nbsp;</td></tr>";
            jQuery(target).find('tbody').append(footer);
            //  console.log(selected.selectedOptions)

            jQuery(".change_option").on('change',function(){
                minimumForeign = 0;
                minimumTotal = 0;
                totalAmount = 0;
                tatalForeing = 0;

                jQuery(target).find("tr[class='data-row']").each(function(id,item){
                    var miperc = parseInt(jQuery(item).find('.min-percentage').text());

                    var local = jQuery(item).find('.amount-local').text();
                    var foreign = jQuery(item).find('.amount-foreign').text();
                    var optional = jQuery(item).find('input[type="radio"]:checked').val();
                    if(optional == "0"){
                        minimumForeign += parseInt(foreign) * miperc/100;
                        minimumTotal += parseInt(local) * miperc/100;
                    }
                    totalAmount += parseInt(local);
                    tatalForeing += parseInt(foreign);
                });

                jQuery("#total_minimum_amount_local").find("span").html(minimumTotal + " TZS") ;
                jQuery("#total_minimum_amount_foreign").find("span").html(minimumForeign + " USD")

            });

            jQuery(".remove-fee-item").on('click',function(){
                var row = jQuery(this).attr("row-target") ;


                var has_remote = jQuery(this).attr("remote-data");

                if(has_remote == 'yes'){
                    alert ("remove remote data")
                    return false;
                }else{
                    jQuery('#fee-row-' + row).remove();
                    jQuery("input[data-id='"+ row +"']").remove();
                    jQuery("input[data-id2='"+ row +"']").remove();
                    jQuery("input[data-id3='"+ row +"']").remove();
                }
                minimumForeign = 0;
                minimumTotal = 0;
                totalAmount = 0;
                tatalForeing = 0;
                jQuery(target).find("tr[class='data-row']").each(function(id,item){
                    var miperc = parseInt(jQuery(item).find('.min-percentage').text());

                    var local = jQuery(item).find('.amount-local').text();
                    var foreign = jQuery(item).find('.amount-foreign').text();
                    var optional = jQuery(item).find('input[type="radio"]:checked').val();
                    if(optional == "0"){
                        minimumForeign += parseInt(foreign) * miperc/100;
                        minimumTotal += parseInt(local) * miperc/100;
                    }
                    totalAmount += parseInt(local);
                    tatalForeing += parseInt(foreign);
                });

                jQuery(target).find("#total_items").find("#total_minimum_amount_local span").html(minimumTotal + " TZS") ;
                jQuery(target).find("#total_items").find("#total_minimum_amount_foreign span").html(minimumForeign + " USD");

                jQuery(target).find("#total_items2").find("#total_amount_local span").html(totalAmount + " TZS") ;
                jQuery(target).find("#total_items2").find("#total_amount_foreign span").html(tatalForeing + " USD");

                var length = jQuery(target).find("td:nth-child(1)").length;
                jQuery(target).find("td:nth-child(1)").each(function(id){
                    if((length - id ) == 2) { return false; }
                    jQuery(this).html(id + 1);
                })
            });

            var length = jQuery(target).find("td:nth-child(1)").length;
            jQuery(target).find("td:nth-child(1)").each(function(id){

                if(( length - id) == 2) { return false; }
                jQuery(this).html(id + 1);
            })
            return false;
        });


    jQuery(".send-data-action").click(function(){
        var tForm = jQuery(this).attr('target-form');
        var tModal = jQuery(this).attr('target-modal');
        var tEl = jQuery(this).attr('target-div')
        var formExits = jQuery(tForm);

       // var formdata = jQuery(tForm).json();
           //  jQuery('body').modalmanager('loading');
       // jQuery.ajax({asyc:true});

        jQuery('body').modalmanager('loading');

        var formData = jQuery(tForm).serialize();

        formData = formData + "&ajaxrequest=true";
        var action = jQuery(tForm).attr('action');
        jQuery.post(
            action,
            formData,
            function(rdata,success,xhr){
                if(success=='success'){
                    jQuery('body').modalmanager('removeLoading');
                    if(rdata.error == false){
                        jQuery.growl.notice({title:"Items Update Status",message: rdata.message})
                    }else{
                        jQuery.growl.warning({title:rdata.title,message:rdata.message})
                    }



                }else{
                    jQuery.alerts.dialogClass = 'alert-warning';
                    jAlert('<span class="message"><i class="fa fa-info-o"></i>Network Error/Network Timeout. Pls Retry </span>', 'Alert Info', function(){
                        //jQuery(modal).modal('hide')
                        jQuery.alerts.dialogClass = null; // reset to default
                    }); }
            },'json');



    });




        jQuery(".change_option").on('change',function(){
            var target = "#fee_structure_items-list-table";
         var   minimumForeign = 0;
            var minimumTotal = 0;
            var  totalAmount = 0;
            var  tatalForeing = 0;

            jQuery(target).find("tr[class='data-row']").each(function(id,item){
                var miperc = parseInt(jQuery(item).find('.min-percentage').text());

                var local = jQuery(item).find('.amount-local').text();
                var foreign = jQuery(item).find('.amount-foreign').text();
                var optional = jQuery(item).find('input[type="radio"]:checked').val();
                if(optional == "0"){
                    minimumForeign += parseInt(foreign) * miperc/100;
                    minimumTotal += parseInt(local) * miperc/100;
                }
                totalAmount += parseInt(local);
                tatalForeing += parseInt(foreign);
            });

            jQuery("#total_minimum_amount_local").find("span").html(minimumTotal + " TZS") ;
            jQuery("#total_minimum_amount_foreign").find("span").html(minimumForeign + " USD")

            var length = jQuery(target).find("td:nth-child(1)").length;
            jQuery(target).find("td:nth-child(1)").each(function(id){

                if(( length - id) == 2) { return false; }
                jQuery(this).html(id + 1);
            })


        });

        jQuery(".remove-fee-item").on('click',function(){
            var row = jQuery(this).attr("row-target") ;
            var target = "#fee_structure_items-list-table";

            var has_remote = jQuery(this).attr("remote-data");

            if(has_remote == 'yes'){
                jQuery.alerts.dialogClass = 'alert-danger';
               var confirm = jQuery.alerts.confirm("Warning! Your are about to Remove the Item",'Fee Item Femoval Confirmation');

                console.log(jQuery.alerts)
                jQuery("#popup_ok").click(function(){

                        alert("confirmed")

                })


                jQuery.alerts.dialogClass = null;
                return false;
            }else{
                jQuery('#fee-row-' + row).remove();
                jQuery("input[data-id='"+ row +"']").remove();
                jQuery("input[data-id2='"+ row +"']").remove();
                jQuery("input[data-id3='"+ row +"']").remove();
            }
            var minimumForeign = 0;
            var  minimumTotal = 0;
            var  totalAmount = 0;
            var tatalForeing = 0;
            jQuery(target).find("tr[class='data-row']").each(function(id,item){
                var miperc = parseInt(jQuery(item).find('.min-percentage').text());

                var local = jQuery(item).find('.amount-local').text();
                var foreign = jQuery(item).find('.amount-foreign').text();
                var optional = jQuery(item).find('input[type="radio"]:checked').val();
                if(optional == "0"){
                    minimumForeign += parseInt(foreign) * miperc/100;
                    minimumTotal += parseInt(local) * miperc/100;
                }
                totalAmount += parseInt(local);
                tatalForeing += parseInt(foreign);
            });

            jQuery(target).find("#total_items").find("#total_minimum_amount_local span").html(minimumTotal + " TZS") ;
            jQuery(target).find("#total_items").find("#total_minimum_amount_foreign span").html(minimumForeign + " USD");

            jQuery(target).find("#total_items2").find("#total_amount_local span").html(totalAmount + " TZS") ;
            jQuery(target).find("#total_items2").find("#total_amount_foreign span").html(tatalForeing + " USD");

            var length = jQuery(target).find("td:nth-child(1)").length;
            jQuery(target).find("td:nth-child(1)").each(function(id){
                if((length - id ) == 2) { return false; }
                jQuery(this).html(id + 1);
            })

            var length = jQuery(target).find("td:nth-child(1)").length;
            jQuery(target).find("td:nth-child(1)").each(function(id){

                if(( length - id) == 2) { return false; }
                jQuery(this).html(id + 1);
            })

        });



    </script>



</div>
