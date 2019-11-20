var placeID = null;


$('.crop_image').click(function (event) {
    $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (response) {
        var rand = Math.floor(Math.random() * 1000000);
        $.ajax({
            url: "upload.php?title=" + rand,
            type: "POST",
            data: { "image": response },
            success: function (data) {
                $('#uploadimageModal').modal('hide');
                $(placeID).html(data);
            }
        });
    })
});

function canvasArea(areaID, placeHolder) {
    placeID = placeHolder;
    var reader = new FileReader();
    reader.onload = function (event) {
        $image_crop.croppie('bind', {
            url: event.target.result
        }).then(function () {
            console.log('jQuery bind complete');
        });
    }

    reader.readAsDataURL(areaID.files[0]);
    $('#uploadimageModal').modal('show');

}
