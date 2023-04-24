$(document).on('change', 'input[name="uploadimage"]', function () {
    var ext = $(this).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        alert('Invalid file extension.  Only image file types are allowed. (.jpg, .png, .gif, etc.)  Please try again.');
        $(this).val(null);
    }
})