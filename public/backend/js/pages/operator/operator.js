$(document).ready(function() {
   $("#add-operator-form-validation").validate({
       rules: {
           operator_logo : { 
               extension: "png|jpe?g|gif",
               required: true,
           },
           operator_name : { required: true },
       }
   }); 
   
   $("#edit-operator-form-validation").validate({
       rules: {
           operator_logo : { extension: "png|jpe?g|gif" },
           operator_name : { required: true },
       }
   }); 
});