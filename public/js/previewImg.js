/**
 * Created by twinkledj on 2/25/16.
 */

function previewImg(input, selector) {
    if (input.files && input.files[0] && selector) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(selector).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}