//this is the application.js file from the example code//
jQuery(function ()
{
    'use strict';

    // Initialize the jQuery File Upload widget:
    jQuery('#fileupload').fileupload();

    // Enable iframe cross-domain access via redirect option:
    jQuery('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            './cors/result.html?%s'
        )
    );

//Set your url localhost or your ndd (perrot-julien.fr)
    if (window.location.hostname === 'localhost') {
        //Load files
        // Upload server status check for browsers with CORS support:
        if (jQuery.ajaxSettings.xhr().withCredentials !== undefined)
        {
            jQuery.ajax({
                url: 'upload_file/get_files',
                dataType: 'json',

                success : function(data) {

                    var fu = jQuery('#fileupload').data('fileupload'),
                        template;
                    fu._adjustMaxNumberOfFiles(-data.length);
                    template = fu._renderDownload(data)
                        .appendTo(jQuery('#fileupload .files'));

                    // Force reflow:
                    fu._reflow = fu._transition && template.length &&
                        template[0].offsetWidth;
                    template.addClass('in');
                    jQuery('#loading').remove();
                }

            }).fail(function () {
                jQuery('<span class="alert alert-error"/>')
                    .text('Upload server currently unavailable - ' +
                        new Date())
                    .appendTo('#fileupload');
            });
        }
    } else {
        // Load existing files:
        jQuery('#fileupload').each(function () {
            var that = this;
            jQuery.getJSON(this.action, function (result) {
                if (result && result.length) {
                    jQuery(that).fileupload('option', 'done')
                        .call(that, null, {
                            result: result
                        });
                }
            });
        });
    }


    // Open download dialogs via iframes,
    // to prevent aborting current uploads:
    jQuery('#fileupload .files a:not([target^=_blank])').live('click', function (e) {
        e.preventDefault();
        jQuery('<iframe style="display:none;"></iframe>')
            .prop('src', this.href)
            .appendTo('body');
    });
});
