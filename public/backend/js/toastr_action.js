function ajaxFormSubmit(url, data){
    $.ajax({
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
        url: url,
        data: data,
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        async: false,
        success: function (result) {
            if(result){
                showToster('success', 'Data Saved Successfully');
            }else{
                showToster('error', 'There is some error. Please try again');
            }
        }
    });
}

function showToster(status, message) {
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 2000
    };
    
    if (status == 'success') {
        toastr.success(message, 'Success');
        setTimeout(function () {
            window.location.href = document.referrer;
        }, 2000);
    }
    if (status == 'error') {
        toastr.error(message, 'Error');
    }
}


