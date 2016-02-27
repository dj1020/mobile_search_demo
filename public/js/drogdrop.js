/**
 * Created by twinkledj on 2/27/16.
 */

(function ($) {
    var previewImg = $('.uploader img');
    var fileInput = $('.uploader input[type=file]');
    var html = $(document);

    fileInput
        .on('dragover', function (e) {
            e.preventDefault();
            previewImg.addClass('hover');
        })
        .on('dragleave', function (e) {
            e.preventDefault();
            previewImg.removeClass('hover');
        })
        .on('drop', function (e) {
            previewImg.removeClass('hover');
        });

})(jQuery);