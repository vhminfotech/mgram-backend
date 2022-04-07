$(document).ready(function() {
    $("#edit-setting-form-validation").validate({
        rules: {
            apk : { required: true },
            config_value : { required: true }
        },
        submitHandler: function() {
            var url = baseurl +'ajaxEditSetting';
            var formData = new FormData(document.getElementById("edit-setting-form-validation"));
            ajaxFormSubmit( url, formData );
        }
    });
});