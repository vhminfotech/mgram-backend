$(document).ready(function() {
    $("#edit-apn-form-validation").validate({
        rules: {
            apk : { required: true },
            config_value : { required: true }
        }
    });
});