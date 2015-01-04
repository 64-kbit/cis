jQuery(document).ready(function(){


    // Dual picker box contols

    // Dual Picking Select

    jQuery('.modal').on('click','#dualPicker .ds_arrow button ',function(){
        var sel1 = jQuery('#dualPicker select.source_list');		//get Source Element
        var sel2 = jQuery('#dualPicker select.target_list');			//get target Element

        var t = (jQuery(this).hasClass('mv_left'))? 0 : 1;	// 0 if move left otherwise move right arrow
        if(t) {

            sel1.find('option').each(function(){
                if(jQuery(this).is(':selected')) {
                    jQuery(this).attr('selected',false);
                    var op = sel2.find('option:first-child');
                    sel2.append(jQuery(this));
                    sel2.find('option').each(function(){
                        if(!jQuery(this).is(':selected')){
                            jQuery(this).attr('selected',true);
                        }
                    })
                }
            });
        } else {
            sel2.find('option').each(function(){
                if(jQuery(this).is(':selected')) {
                    jQuery(this).attr('selected',false);
                    sel1.append(jQuery(this));
                }
            });
        }
        return false;
    });


    jQuery("#EventsCalenderDatePicker").datepicker({
        showWeek: true,
        firstDay: 1,
       onSelect: function(dt,object){
             var dateNew = jQuery.datepicker.formatDate('MM dd, yy', new Date(dt));

           jQuery("#view-item-data").modal('show');
           jQuery("#view-item-data .modal-title").text('All events of ' + dateNew);
           jQuery('body').modalmanager('loading');
           jQuery("#view-item-data .modal-body").load(window.location.origin + '/ajax_load/get_events',{evType:'calendarEvent',date:dt},function(){
               jQuery('body').modalmanager('removeLoading');
           });

       }
    }) ;

    jQuery("#feeImportsCalenderDatePicker").datepicker({
        showWeek: true,
        firstDay: 1,
        onSelect: function(dt,object){
            var dateNew = jQuery.datepicker.formatDate('dd-mm-yy', new Date(dt));
            jQuery("#fee-imports-title").text('All Payments Imported on ' + dateNew);
            jQuery('.dataTables_filter input[type="search"]').val(dateNew);

        }
    }) ;


});
