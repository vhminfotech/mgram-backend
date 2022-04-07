$(document).ready(function() {
   $("#add-operator-form-validation").validate({
       rules: {
           operator_logo : { 
               extension: "png|jpe?g|gif",
               required: true,
           },
           operator_name : { required: true },
       },
        submitHandler: function() {
            var formData = new FormData(document.getElementById("add-operator-form-validation"));
            var url = baseurl +'ajaxAddOperators';
            ajaxFormSubmit( url, formData );
        }
   }); 
   
   $("#edit-operator-form-validation").validate({
       rules: {
           operator_logo : { extension: "png|jpe?g|gif" },
           operator_name : { required: true },
       },
       submitHandler: function(form) {
           var formData = new FormData(document.getElementById("edit-operator-form-validation"));
           var url = baseurl +'ajaxEditOperators';
           ajaxFormSubmit( url, formData );
        }
   }); 
});