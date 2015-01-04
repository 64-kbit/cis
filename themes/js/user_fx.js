
function activate_action_buttons(){

    // Handle save action of the form
  //  jQuery.uniform.update();
    jQuery('input:checkbox, input:radio, .uniform-file').uniform();

}

function update_container_element(rdata,targetCont,targetModal){
     if(rdata.errors == true){
         alert_warning('danger',rdata.data);
     }else{
         alert_warning('info',rdata.data);
       //  jQuery('form').reset();
     }

    jQuery('body').modalmanager('removeLoading');
}

function validate_form(form){
    var noerror = true;
    jQuery(form).find('.required-data').each(function(){
           var value =  jQuery(this).val();
            if(value == "" || value == '--'){
                jQuery(this).addClass('inputError') ;
                jQuery(this).siblings('.help-inline').remove();
                jQuery(this).after('<span class="help-inline text-error" style="color:#b94a48">Must not be empty</span>')

                noerror  = false
            }
    }

    );

    jQuery(form).find('.required-data.multiple-select').each(function(){
        var options = jQuery(this).find('option');
        if(options.length == 0 || jQuery(this).val() == '--'){
            jQuery(this).addClass('inputError') ;
            jQuery(this).siblings('.help-inline').remove();
            jQuery(this).after('<span class="help-inline text-error" style="color:#b94a48">Must not be empty</span>')

            noerror  = false
        }
    })


    return noerror;
}

function populate_form_errors(form,data){
    jQuery.each(data,function(id,element){

        jQuery(form).find("input[name='" + id + "']").each(function(){
            jQuery(this).addClass('inputError') ;
            jQuery(this).siblings('.help-inline').remove();
            jQuery(this).after('<span class="help-inline text-error" style="color:#b94a48">' + element +'</span>')

        })

        jQuery(form).find("select[name='" + id + "']").each(function(){
            jQuery(this).addClass('inputError') ;
            jQuery(this).siblings('.help-inline').remove();
            jQuery(this).after('<span class="help-inline text-error" style="color:#b94a48">' + element +'</span>')

        })

        jQuery(form).find("textarea[name='" + id + "']").each(function(){
            jQuery(this).addClass('inputError') ;
            jQuery(this).siblings('.help-inline').remove();
            jQuery(this).after('<span class="help-inline text-error" style="color:#b94a48">' + element +'</span>')

        })
    });

}


function handle_incoming_add(rdata,dmpTo,modal){

      jQuery(dmpTo).prepend(rdata);
        jQuery.alerts.dialogClass = 'alert-info';
        jAlert('<span class="message"><span class="btn btn-info btn-circle"><i class="icon-info-sign"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;Successfully Added</span>', 'Activity Information', function(){
        jQuery(rdata).modal('hide')
        jQuery.alerts.dialogClass = null; // reset to default
    });

        icrement_item_count(dmpTo,'+')
    jQuery('input:checkbox, input:radio, .uniform-file').uniform();
    //reload data tanbe
    jQuery('.dataTable').dataTable({
        "bDestroy":true,
        "sPaginationType": "full_numbers",
        "aaSortingFixed": [[0,'asc']],
        "fnDrawCallback": function(oSettings) {
            jQuery.uniform.update();
        }
    });

    jQuery('body').modalmanager('removeLoading');
}

function remove_element(targetCont,targetEl,msg){
    jQuery(targetCont).find(targetEl).hide().delay(1000).remove();
    jQuery.alerts.dialogClass = 'alert-danger';
    jAlert('<span class="danger"><span class="btn btn-danger btn-circle"><i class="fa fa-info"></i></span>&nbsp;Successfully Removed</span>', 'Item Removal Activity Information', function(){
        jQuery.alerts.dialogClass = null; // reset to default
    });


        icrement_item_count(targetCont,'-')
    jQuery('.reloadDataTable').dataTable({
        "bDestroy":true,
        "sPaginationType": "full_numbers",
        "aaSortingFixed": [[0,'asc']],
        "fnDrawCallback": function(oSettings) {
            jQuery.uniform.update();
        }
    });
}
    // Increment the item count for the tables or list of items in the dom
function icrement_item_count(targetCont,type){
    var itC = jQuery(targetCont).attr('id') + '-count';

    var items = jQuery(targetCont).children('.item-row');

    var curVal = items.length;

    jQuery("." + itC).text(curVal); // Update the dom with new items list
}

function alert_warning(type,message){

    switch(type){
        case 'warning':
             var title = "Warning Message"
            var msgHead = "Message Warning"
            itype = 'warning-sign';
            break;
        case 'success':
            var title = "Success Message"
            var msgHead = "Success Status Info"
            itype = 'info-sign';
            break;
        case 'danger':
            var title = "Danger Message"
            var msgHead = "Attention !"
            itype = 'warning-sign';
            break;
        case 'info':
            var title = "Information Message"
            var msgHead = "Status Information! "
            itype = 'info-sign';
            break;
    }

    jQuery.alerts.dialogClass = 'alert-'+type;
    jAlert('<span class="danger"><span class="btn btn-' + itype +  ' btn-circle"><i class="glyphicon glyphicon-'+itype + '"></i></span>&nbsp'+ message + '</span>', msgHead, function(){

        jQuery.alerts.dialogClass = null; // reset to default
    });
    jQuery('body').modalmanager('removeLoading');

}


function updateModaltitle(type,title,button){
   // fix_modal()
    jQuery.uniform.update();

    if(type == 1){
        jQuery('#add-item-data-label').html(title) ;
        jQuery('#add-item-act-button').html(button) ;

    }else if(type == 2){
        jQuery('#edit-item-data-label').html(title) ;
        jQuery('#edit-item-act-button').html(button) ;

    }else{
        jQuery('#view-item-data-label').html(title) ;
        jQuery('#view-item-act-button').html(button) ;

    }

    activate_action_buttons();
   // update_table_check();

}


function fix_modal(){
     jQuery(".modal").each(function(){
       var elm = jQuery(this);
         var windowheight = jQuery('body').height();
         alert(windowheight)
        jQuery(this).css(
            'margin-top', 0 - (elm.height()/2 )
        )

         //alert(height)
     });
}

function activate_items(){
    jQuery('input:checkbox, input:radio, .uniform-file').uniform();
    jQuery.uniform.update();
    jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});
}

/**
 * @param $formdata  serialized form data to be sent
 * @param $targetcontainer  row source from which the data is to be reset
 * @param $type  content type that is to be dumped to server
 * @param $url the url link for which the data is to be dumped to
 */
function send_admission_info($formdata,$targetcontainer,$type,$url,$targetform){
    if(validate_form($targetform)){
      jQuery.ajax({
          type: 'POST',
          url: $url,
          data: $formdata,
          success: function(rdata,xhr){
             switch(rdata.status){
                 case 'error':
                     jQuery.growl.error({title:rdata['title'],message:rdata['message']})
                     break;
                 case 'success':
                     jQuery.growl.notice({title:rdata['title'],message:rdata['message']})
                     break;
                 case 'warning':
                     jQuery.growl.warning({title:rdata['title'],message:rdata['message']})
                     break;
                 default:
                     jQuery.growl({title:rdata['title'],message:rdata['message']})
                     break;
             }

             console.log(rdata)
          } ,
          async: true

      });}else{
        return false;
    }

    return true;

}

function update_items_table($item){

    console.log($item) ;

    var target = jQuery(jQuery($item).attr('data-target'))[0];

    //jQuery(".chosen-select").trigger("chosen:updated");
}

function update_table_check($table){
    jQuery($table).on('click','.checkall',function(){
        var parentTable = jQuery(this).parents('table');
        var ch = parentTable.find('tbody input[type=checkbox],.checkall-li');
        if(jQuery(this).is(':checked')) {
            //check all rows in table
            ch.each(function(){
                jQuery(this).attr('checked',true);
                jQuery(this).parent().addClass('checked');	//used for the custom checkbox style
                jQuery(this).parents('tr').addClass('selected'); // to highlight row as selected
            });
        } else {
            //uncheck all rows in table
            ch.each(function(){
                jQuery(this).attr('checked',false);
                jQuery(this).parent().removeClass('checked');	//used for the custom checkbox style
                jQuery(this).parents('tr').removeClass('selected');
            });
        }
    });
}
