
/*jslint unparam: true, regexp: true */
/*global window, $ */
jQuery(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.protocol + "//" + window.location.hostname + '/upload_file/loans_file',
        uploadButton = jQuery('<button/>')
            .addClass('btn btn-circle btn-primary')
            .prop('disabled', true)
            .html('<i title="Loading..." class="fa icon-spin icon-spinner"></i>')
            .on('click', function () {
                var $this = jQuery(this),
                    data = $this.data();
                $this
                    .off('click')
                    .html('<i title="Loading..." class="glyphicon glyphicon-upload"></i>')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    jQuery('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(xls|csv)$/i,
        maxFileSize: 5000000, // 50 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = jQuery('<div/>').appendTo('#files');
        jQuery.each(data.files, function (index, file) {
            var node = jQuery('<p/>')
                .append(jQuery('<span/>').text(file.name));
            if (!index) {
                node
                    .append('&nbsp;&nbsp;')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    })
        .on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = jQuery(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('&nbsp;&nbsp;')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('&nbsp;&nbsp;')
                .append(jQuery('<span class="alert-danger  text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .html('<i class="glyphicon glyphicon-upload"></i>')
                .prop('title','Click to Upload File')
                .attr('data-toggle','tooltip')
                .prop('disabled', !!data.files.error);
        }
    })
        .on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        jQuery('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
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
    }).on('fileuploadfail', function (e, data) {
        jQuery.each(data.files, function (index, file) {
            var error = jQuery('<span class="alert-danger text-danger"/>').text('File upload failed.');
            jQuery(data.context.children()[index])
                .append('&nbsp;&nbsp;')
                .append(error);
        });
    }).prop('disabled', !jQuery.support.fileInput)
        .parent().addClass(jQuery.support.fileInput ? undefined : 'disabled');
});
