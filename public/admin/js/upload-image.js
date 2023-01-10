/*jslint browser: true, white: true, eqeq: true, plusplus: true, sloppy: true, vars: true*/
/*global $, console, alert, FormData, FileReader*/


function noPreview() {
    $('#image-preview-div').css("display", "none");
    $('#preview-img').attr('src', 'noimage');
    $('upload-button').attr('disabled', '');
}

function selectImage(e) {
    $('#file').css("color", "green");
    $('#image-preview-div').css("display", "block");
    $('#preview-img').attr('src', e.target.result);
}

$(document).ready(function (e) {

    var maxsize = 500 * 1024; // 500 KB

    $('#max-size').html((maxsize/1024).toFixed(2));

    $('#file').change(function() {

        $('#message').empty();

        var file = this.files[0];
        var match = ["image/jpeg", "image/png", "image/jpg"];

        if ( !( (file.type == match[0]) || (file.type == match[1]) || (file.type == match[2]) ) )
        {
            noPreview();

            $('#message').html('<div class="alert alert-warning" role="alert">فایل انتخابی شما پشتیبانی نمیشود لطفا یکی از فرمت های  JPG, JPEG, PNG  را انتخاب کنید</div>');

            return false;
        }

        if ( file.size > maxsize )
        {
            noPreview();

            $('#message').html('<div class=\"alert alert-danger\" role=\"alert\">عکس انتخابی شما  ' + (file.size/1024).toFixed(2) + '  کیلو بایت میباشد لطفا عکس کمتر از  ' + (maxsize/1024).toFixed(2) + '  کیلو بایت انتخاب کنید</div>');

            return false;
        }

        $('#upload-button').removeAttr("disabled");

        var reader = new FileReader();
        reader.onload = selectImage;
        reader.readAsDataURL(this.files[0]);

    });

});
