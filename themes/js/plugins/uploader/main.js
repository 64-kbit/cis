/*
 * jQuery File Upload Plugin JS Example 8.9.1
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/* global $, window */

jQuery(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    jQuery('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        url: jQuery('#fileupload').attr('action'),
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(xls|csv)$/i,
        maxFileSize: 5000000, // 50 MB
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    });

    // Enable iframe cross-domain access via redirect option:
    jQuery('#fileupload').fileupload(
        {paramName: 'files[]'},
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    ).on('fileuploadprogressall', function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            jQuery('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }).on('fileuploaddone',

        function (e, data) {
            jQuery.each(data.result.files, function (index, file) {
                if (file.url) {
                    var link = jQuery('<a>')
                        .attr('target', '_blank')
                        .prop('href', file.url);
                    jQuery(data.context.children()[index])
                        .wrap(link);
                } else if (file.error) {
                    var error = jQuery('<span class="alert-danger  text-danger"/>').text(file.error);
                    jQuery(data.context.children()[index])
                        .append('<br>')
                        .append(error);
                }
            });
            jQuery('body').modalmanager('loading');

            jQuery.growl.notice({title:"Upload Status",message:"File Uploading Successful!!<br>File contents will be saved to  the database"})  ;

           // jQuery.growl({title:"Information",message:""})

            jQuery.post(window.location.protocol + "//" + window.location.host + "/ajax_load/file_upload_status",{ajaxload:true},function(data,xhr){
                var infomodal = jQuery("#view-item-data").modal('show');
;                jQuery.growl.notice({title:'Import Status!!',message:"File Importation has been Done"})
               // jQuery.growl.close();
                infomodal.modal('show');
                jQuery('body').modalmanager('removeLoading');

                jQuery("#view-item-data .modal-dialog .modal-body").html(data);

              // alert(data)
            })
        });

      /*
        // Load existing files:
        jQuery('#fileupload').addClass('fileupload-processing');
        jQuery.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: jQuery('#fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: jQuery('#fileupload')[0]
        }).always(function () {
            jQuery(this).removeClass('fileupload-processing');
        }).done(function (result) {
            jQuery(this).fileupload('option', 'done')
                .call(this, jQuery.Event('done'), {result: result});
        });

      */
});
