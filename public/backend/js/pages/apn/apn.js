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
            }
        });
    });