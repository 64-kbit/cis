jQuery.noConflict();

jQuery(document).ready(function(){
    jQuery('.taglist .close').click(function(){
        jQuery(this).parent().remove();
        return false;
    });

    jQuery("#CalenderDatePicker").datepicker(
        {
            showWeek: true,
            firstDay: 1
        }
    );


    jQuery("#acYearPick").data("placeholder","Academic Year ..").chosen();

    // dropdown in leftmenu
    jQuery('.leftmenu .dropdown > a').click(function(){
        if(!jQuery(this).next().is(':visible'))
            jQuery(this).next().slideDown('fast');
        else
            jQuery(this).next().slideUp('fast');
        return false;
    });


    jQuery("#tabs" ).tabs({
        collapsible: false
    });

    if(jQuery.uniform)
        jQuery('input:checkbox, input:radio, .uniform-file').uniform();

    if(jQuery('.widgettitle .close').length > 0) {
        jQuery('.widgettitle .close').click(function(){
            jQuery(this).parents('.widgetbox').fadeOut(function(){
                jQuery(this).remove();
            });
        });
    }
     // SlimScroll Div
    jQuery(".ul_items-list").slimScroll( {
        height: '400px',width:'100%'
});




    jQuery('#programme-list-table').dataTable({
        "sPaginationType": "full_numbers",
        "aaSortingFixed": [[0,'asc']],
        "fnDrawCallback": function(oSettings) {
            jQuery.uniform.update();
        }
    });


    // Show or hide menu on this action
    jQuery('.topbar .barmenu').click(function() {

        var lwidth = '240px';
        if(jQuery(window).width() < 340) {
            lwidth = '240px';
        }

        if(!jQuery(this).hasClass('open')) {
            jQuery('.rightpanel').css({marginLeft: lwidth},'fast');
            jQuery(' .leftpanel').css({marginLeft: 0},'fast');
            jQuery(this).addClass('open');
            jQuery('body').addClass('showLeftMenu');
        } else {
            jQuery('.rightpanel').css({marginLeft: 0},'fast');
            jQuery('.leftpanel').css({marginLeft: '-'+lwidth},'fast');
            jQuery(this).removeClass('open');
            jQuery('body').removeClass('showLeftMenu');
        }
    });

    jQuery('.topbar .chatmenu').click(function(){
        if(!jQuery('.onlineuserpanel').is(':visible')) {
            jQuery('.onlineuserpanel,#chatwindows').show();
            jQuery('.topbar .chatmenu').css({right: '210px'});
        } else {
            jQuery('.onlineuserpanel, #chatwindows').hide();
            jQuery('.topbar .chatmenu').css({right: '10px'});
        }
    });


    // dropdown menu for profile image
    jQuery('.userloggedinfo img').click(function(){
        if(jQuery(window).width() < 720) {
            var dm = jQuery('.userloggedinfo .userinfo');
            if(dm.is(':visible')) {
                dm.hide();
            } else {
                dm.show();
            }
        }
    });

    // Instantiate tooltips

   jQuery('[data-toggle="tooltip"]').tooltip({'placement': 'top'});

    // expand/collapse boxes
    if(jQuery('.minimize').length > 0) {

        jQuery('.minimize').click(function(){
            if(!jQuery(this).hasClass('collapsed')) {
                jQuery(this).addClass('collapsed');
                jQuery(this).html("&#43;");
                jQuery(this).parents('.widgetbox')
                    .css({marginBottom: '20px'})
                    .find('.widgetcontent')
                    .hide();
            } else {
                jQuery(this).removeClass('collapsed');
                jQuery(this).html("&#8211;");
                jQuery(this).parents('.widgetbox')
                    .css({marginBottom: '0'})
                    .find('.widgetcontent')
                    .show();
            }
            return false;
        });

    }

    // fixed right panel
    var winSize = jQuery(window).height() - 90;
    if(jQuery('.rightpanel').height() < winSize) {
        jQuery('.rightpanel').height(winSize);
    }

    // check all checkboxes in table
    jQuery('table').on('click','.checkall',function(){
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

    activate_action_buttons();
    // Handle delete/remove data action.
    jQuery('body').on('click',".remove-remote-qry",function(){

        var targetUrl = jQuery(this).attr('target-link');
        var sourceCont = jQuery(this).attr('target-cont');

        var targetRow = jQuery(this).attr('row-id');
        var targetTitle = jQuery(sourceCont).find(targetRow + " .item-title ");

        var title = targetTitle[0].textContent;
        console.log(title);

        if(targetTitle == undefined){
            targetTitle = jQuery(targetRow).children('.item-title').text();
        }

        // confirm box
        var proceed_delete = false;
                jConfirm('Are you Sure you Want to delete this: <span class="warning"> ' +  title + "</span>", 'Confirmation Dialog', function(r) {
                    if(r == true){
                        jQuery('body').modalmanager('loading');
                        jQuery.post(targetUrl,{remove:true},function(rdata,status){
                            if(status == 'success'){
                                jQuery('body').modalmanager('removeLoading');
                                if(rdata.status == true){
                                    remove_element(sourceCont,targetRow,rdata.data);
                                }else{
                                    jQuery('body').modalmanager('removeLoading');
                                    alert_warning('warning',"Failed to remove due :: " + rdata.data)
                                }
                            }else{
                                jQuery('body').modalmanager('removeLoading');
                                alert_warning('warning',"Network Timeout! Please Retry")
                            }
                        },'json')
                    }else{
                         proceed_delete = false;
                    }
                    //jAlert('Confirmed: ' + r, 'Confirmation Results');
                });
    });

    // All inputs hands up when key is pressed clean all validation errors
    jQuery('.modal').on('keyup',':input',function(){
        if(jQuery(this).val() != ""){
            jQuery(this).removeClass('inputError');
            jQuery(this).siblings('.help-inline').remove();
        }
    }).on('change',':input',function(){
        if(jQuery(this).val() != "" || jQuery(this).val() != "--"){
            jQuery(this).removeClass('inputError');
            jQuery(this).siblings('.help-inline').remove();
        }
    }).on('click','.add-data-action',function(){
        jQuery('#dualPicker select.target_list').find('option').each(function(){
            if(jQuery(this).not(":selected")){
               jQuery(this).attr('selected',true);
            }
        })
        var tForm = jQuery(this).attr('target-form');
        var tModal = jQuery(this).attr('target-modal');
        var tEl = jQuery(this).attr('target-div')
        var formExits = jQuery(tForm);

        if(formExits.length > 0){
            var notEmpty = validate_form(tForm);
            if(notEmpty){
                jQuery('body').modalmanager('loading');

                var formData = jQuery(tForm).serialize();

                formData = formData + "&ajaxrequest=true";
                var action = jQuery(tForm).attr('action');
                jQuery.post(
                    action,
                    formData,
                    function(rdata,success,xhr){
                        if(success=='success'){
                            if(rdata.errors != false){
                                populate_form_errors(tForm,rdata.data)
                                jQuery.growl.error({title:"Form Errors",message:"Check form for Errors / Missing Inputs"})
                            }else if(rdata.error == true){
                                jQuery.alerts.dialogClass = 'alert-danger';
                                jAlert('<span class="message"><i class="fa icon-info-sign"></i>&nbsp;&nbsp;&nbsp;'+ rdata.message +'</span>', 'Warning Message!', function(){
                                    //jQuery(modal).modal('hide')
                                    jQuery.alerts.dialogClass = null; // reset to default
                                });
                            }else if(rdata.error == 'happened'){
                                jQuery.growl.warning({title:"Information",message:rdata.message}) ;
                            }else if(rdata.error == 'message'){
                                jQuery.growl.notice({title:"Information",message:rdata.message}) ;
                            }else{
                                if(rdata.error == 'extras'){
                                    jQuery.growl.warning({title:"Warning Messages",message:rdata.message});
                                }
                                handle_incoming_add(rdata.data,tEl,tModal);
                            }
                            jQuery('body').modalmanager('removeLoading')
                        }else{
                            jQuery.alerts.dialogClass = 'alert-warning';
                            jAlert('<span class="message"><i class="fa icon-info-sign"></i>&nbsp;&nbsp;&nbsp;Network Error/Network Timeout. Pls Retry </span>', 'Alert Info', function(){
                                //jQuery(modal).modal('hide')
                                jQuery.alerts.dialogClass = null; // reset to default
                            }); }
                    },'json');

            }else{
                jQuery('body').modalmanager('removeLoading');
            }    }else{
            jQuery('body').modalmanager('removeLoading');

        }


    }).on('click','.edit-data-action',function(){
        var tForm = jQuery(this).attr('target-form');
        var tModal = jQuery(this).attr('target-modal');
        var tEl = jQuery(this).attr('target-div')

        var formExits = jQuery(tForm);
        if(formExits.length > 0){
            var notEmpty = validate_form(tForm);
            if(notEmpty){
                jQuery('body').modalmanager('loading');

                var formData = jQuery(tForm).serialize();
                 console.log(formData)
                formData = formData + "&acttype=edit&ajaxrequest=true";
                var action = jQuery(tForm).attr('action');
                jQuery.post(
                    action,
                    formData,
                    function(rdata,success,xhr){
                        if(success=='success'){
                            if(rdata.errors != false){
                                populate_form_errors(tForm,rdata.data)
                            }else{
                                update_container_element(rdata,tEl,tModal);
                            }
                            jQuery('body').modalmanager('removeLoading')
                        }else{
                            jQuery.alerts.dialogClass = 'alert-warning';
                            jAlert('<span class="message"><i class="fa fa-info-o"></i>Network Error/Network Timeout. Pls Retry </span>', 'Alert Info', function(){
                                //jQuery(modal).modal('hide')
                                jQuery.alerts.dialogClass = null; // reset to default
                            }); }
                    },'json');

            }else{
                jQuery('body').modalmanager('removeLoading');
            }    }else{
            jQuery('body').modalmanager('removeLoading');

        }


    }).on("show.bs.modal",function()
    {
        //alert("some thig else")
        jQuery('body').modalmanager("loading");
       // alert("am show why is data not replaced")
        jQuery(this).find(".modal-body").html("<span class='text-success' style='font-size:24px'><i class='icon-spin icon-spinner'></i>&nbsp;&nbsp; Downloading ....!</span>");
    }).on("loaded.bs.modal",function()
    {
        jQuery('body').modalmanager("removeLoading");
    });

    jQuery("[data-toggle=modal]").click(function(){
       var remote = jQuery(this).attr('href');
        if(remote){
            jQuery('body').modalmanager("loading");
        }
    })
});


var resizeHandler = function(target) {
    var me = jQuery(target);
    var winheigh = jQuery(window).height() - 400;
    if(winheigh < 400){
        winheigh = 400;
    }
    me.css("height",winheigh+'px');
    jQuery(".slimScrollDiv").css("height",winheigh+'px');
    var height = Math.max((me.outerHeight() / me[0].scrollHeight)
        * me.outerHeight(), 30);
    jQuery(".slimScrollBar").css({ height: height + 'px' });
}
