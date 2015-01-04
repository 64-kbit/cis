jQuery('[data-toggle=tab]').each(function(id,tab ) {
    // rest of code here
     // console.log(this)
    var tabObj = jQuery(tab);
  var  url = tabObj.attr('href');
    var rm = tabObj.attr('no-remote') ;
        var tabContainer = jQuery(tabObj.attr('data-target'));

// also retrieve other settings
        var tabEvent = 'shown.bs.tab'; //listen to the show event of bootstrap v3 tabs
        tabObj.on(tabEvent, function(e) {
            if(tabContainer.length > 0){
            // Featch teh data
            jQuery.ajax({
                url: url,
                success: function(data) {
                    if (data) {
                        // Dump data to container
                        tabContainer.html(data);
                    }

                },
                fail: function(data) {
                    tabContainer.html(data)
                }
            });
            }
        })


});
   /*
jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    console.log(e)
    e.target // activated tab
    e.relatedTarget // previous tab
})
    */
