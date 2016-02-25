/**
 * Created by twinkledj on 2/25/16.
 * ref to: https://developer.mozilla.org/en-US/docs/Web/API/FileReader/readAsDataURL
 */

function previewImg(input, selector) {
    console.log('previewing image');
    if (input.files && input.files[0] && selector) {

        var preview = document.querySelector(selector);
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
}