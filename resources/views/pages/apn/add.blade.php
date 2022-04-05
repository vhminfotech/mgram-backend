@extends('layouts.app')
@section('title', "Add APN")

@section('content')

<link href="{{asset('/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />

        
        <!-- end page title -->
           <div class="row">
               <div class="col-12">
                   <form method="POST" id="edit-apn-form-validation"> @csrf
                   <div class="card">
                       <div class="card-body">
                           <div class="mb-3 row">
                               <label class="col-md-2 col-form-label">Operator</label>
                               <div class="col-md-10">
                                   <select class="form-select" name="operator"  id="operator">
                                       <option value="">Select</option>
                                       @foreach($operators as $op_value)
                                        <option value="{{$op_value->id}}">{{$op_value->operator_name}}</option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="apn_name" class="col-md-2 col-form-label">APN Name</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="apn_name" id="apn_name">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="apn" class="col-md-2 col-form-label">APN</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="apn" id="apn">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="proxy" class="col-md-2 col-form-label">Proxy</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control"type="text" name="proxy" id="proxy">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="port" class="col-md-2 col-form-label">Port</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="port" id="port">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="username" class="col-md-2 col-form-label">Username</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="username" id="username">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="password" class="col-md-2 col-form-label">Password</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="password" id="password">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="server" class="col-md-2 col-form-label">Server</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="server" id="server">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mmsc" class="col-md-2 col-form-label">MMSC</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="mmsc" id="mmsc">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mms_proxy" class="col-md-2 col-form-label">MMS Proxy</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="mms_proxy" id="mms_proxy">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mms_port" class="col-md-2 col-form-label">MMS Port</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="mms_port" id="mms_port">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mcc" class="col-md-2 col-form-label">MCC</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="mcc" id="mcc">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mnc" class="col-md-2 col-form-label">MNC</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="mnc" id="mnc">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="auth_type" class="col-md-2 col-form-label">Auth Type</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="auth_type" id="auth_type">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="apn_type" class="col-md-2 col-form-label">APN Type</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="apn_type" id="apn_type">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="apn_roaming" class="col-md-2 col-form-label">APN Roaming</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="apn_roaming" id="apn_roaming">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="bearer" class="col-md-2 col-form-label">Bearer</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="bearer" id="bearer">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mvno_type" class="col-md-2 col-form-label">MVNO Type</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="mvno_type" id="mvno_type">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mvno_value" class="col-md-2 col-form-label">MVNO Value</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" type="text" name="mvno_value" id="mvno_value">
                               </div>
                           </div>
                           <div>
                               <button class="btn btn-primary" type="submit">Submit form</button>
                           </div>
                       </div>
                   </div>
               </form>
               </div> <!-- end col -->
           </div>

@endsection

@section('header')
<style>
    input.form-control.error {
        border: 1px solid red;
    }

</style>
@endsection

@section('footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


<script>
    $(document).ready(function() {
        $("#edit-apn-form-validation").validate({
            rules: {
                operator : {
                    required: true,
                },
                apn_name : {
                    required: true,
                },
                apn: {
                    required: true,
                },
                proxy: {
                    required: true,
                },
                port: {
                    required: true,
                },
                username: {
                    required: true,
                },
                password: {
                    required: true,
                },
                server: {
                    required: true,
                },
                mmsc: {
                    required: true,
                },
                mms_proxy: {
                    required: true,
                },
                mms_port : {
                    required: true
                },
                mcc: {
                    required: true,
                },
                mnc: {
                    required: true,
                },
                auth_type: {
                    required: true,
                },
                apn_type: {
                    required: true,
                },
                apn_roaming: {
                    required: true,
                },
                bearer: {
                    required: true,
                },
                mvno_type: {
                    required: true,
                },
                mvno_value: {
                    required: true,
                },
            }
        });
    });
</script>
@endsection
