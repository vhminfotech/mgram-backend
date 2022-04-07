$(document).on('click', '#view_apn', function(){
    var id = $(this).attr("data-id");
    var modelBody=$('.modal-body');
    $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
        url: baseurl + "ajaxGetApn",
        data: {'id': id},
        success: function (html) {
            modelBody.empty();
            modelBody.append(html);
            $('#apnModal').modal('show');
        }
    });
});

$(document).on('click', '#delete_apn', function(){
    var id = $(this).attr("data-id");
    var row = $(this).closest('tr');
    Swal.fire({
          title: "Are you sure?",
//          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: !0,
          confirmButtonColor: "#34c38f",
          cancelButtonColor: "#f46a6a",
          confirmButtonText: "Yes, delete it!",
        }).then(function (respose) {
            if(respose.isConfirmed){
                $.ajax({
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                    url: baseurl + "ajaxDeleteApn",
                    data: {'id': id},
                    success: function (response) {
                        if(response == 1){
                            Swal.fire("Deleted!", "Your record has been deleted.", "success");
                            table.row( row ).remove().draw();
                        }else{
                            Swal.fire("Deleted!", "Your file has been deleted.", "success");
                        }
                    }
                });
            }
        });
    });


$(document).ready(function() {
    $("#add-apn-form-validation").validate({
        rules: {
            operator : { required: true },
            apn_name : { required: true },
            apn: { required: true },
            proxy: { required: true },
            port: { required: true },
            username: { required: true },
            password: { required: true },
            server: { required: true },
            mmsc: { required: true },
            mms_proxy: { required: true },
            mms_port : { required: true },
            mcc: { required: true },
            mnc: { required: true },
            apn_protocol: { required: true },
            apn_type: { required: true },
            apn_roaming: { required: true },
            bearer: { required: true },
            mvno_type: { required: true },
            mvno_value: { required: true },
        },
        submitHandler: function() {
            var url = baseurl +'ajaxAddApn';
            var formData = new FormData(document.getElementById("add-apn-form-validation"));
            ajaxFormSubmit( url, formData );
        }
    });
    
    $("#edit-apn-form-validation").validate({
        rules: {
            operator : { required: true },
            apn_name : { required: true },
            apn: { required: true },
            proxy: { required: true },
            port: { required: true },
            username: { required: true },
            password: { required: true },
            server: { required: true },
            mmsc: { required: true },
            mms_proxy: { required: true },
            mms_port : { required: true },
            mcc: { required: true },
            mnc: { required: true },
            apn_protocol: { required: true },
            apn_type: { required: true },
            apn_roaming: { required: true },
            bearer: { required: true },
            mvno_type: { required: true },
            mvno_value: { required: true },
        },
        submitHandler: function() {
            var url = baseurl +'ajaxEditApn';
            var formData = new FormData(document.getElementById("edit-apn-form-validation"));
            ajaxFormSubmit( url, formData );
        }
    });
});


