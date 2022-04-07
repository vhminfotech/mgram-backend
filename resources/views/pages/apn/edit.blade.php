@extends('layouts.app')
@section('title', "Edit APN")

@section('content')

<link href="{{asset('/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />

        @foreach($apn_data as $value)
        @endforeach
        <!-- end page title -->
           <div class="row">
               <div class="col-12">
                   <form method="POST" id="edit-apn-form-validation"> @csrf
                   <div class="card">
                       <div class="card-body">
                           <div class="mb-3 row">
                               <label class="col-md-2 col-form-label">Operator</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->operator_name}}" type="text" disabled="">
                               </div>
                              
                           </div>
                           <div class="mb-3 row">
                               <label for="apn_name" class="col-md-2 col-form-label">APN Name</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->apn_name}}" type="text" name="apn_name" id="apn_name">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="apn" class="col-md-2 col-form-label">APN</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->apn}}" type="text" name="apn" id="apn">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="proxy" class="col-md-2 col-form-label">Proxy</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->proxy}}" type="text" name="proxy" id="proxy">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="port" class="col-md-2 col-form-label">Port</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->port}}" type="text" name="port" id="port">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="username" class="col-md-2 col-form-label">Username</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->username}}" type="text" name="username" id="username">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="password" class="col-md-2 col-form-label">Password</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->password}}" type="text" name="password" id="password">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="server" class="col-md-2 col-form-label">Server</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->server}}" type="text" name="server" id="server">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mmsc" class="col-md-2 col-form-label">MMSC</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->mmsc}}" type="text" name="mmsc" id="mmsc">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mms_proxy" class="col-md-2 col-form-label">MMS Proxy</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->mms_proxy}}" type="text" name="mms_proxy" id="mms_proxy">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mms_port" class="col-md-2 col-form-label">MMS Port</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->mms_port}}" type="text" name="mms_port" id="mms_port">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mcc" class="col-md-2 col-form-label">MCC</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->mcc}}" type="text" name="mcc" id="mcc">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mnc" class="col-md-2 col-form-label">MNC</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->mnc}}" type="text" name="mnc" id="mnc">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="auth_type" class="col-md-2 col-form-label">Auth Type</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->auth_type}}" type="text" name="auth_type" id="auth_type">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="apn_protocol" class="col-md-2 col-form-label">APN Protocol</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->apn_protocol}}" type="text" name="apn_protocol" id="apn_protocol">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="apn_type" class="col-md-2 col-form-label">APN Type</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->apn_type}}" type="text" name="apn_type" id="apn_type">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="apn_roaming" class="col-md-2 col-form-label">APN Roaming</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->apn_roaming}}" type="text" name="apn_roaming" id="apn_roaming">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="bearer" class="col-md-2 col-form-label">Bearer</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->bearer}}" type="text" name="bearer" id="bearer">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mvno_type" class="col-md-2 col-form-label">MVNO Type</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->mvno_type}}" type="text" name="mvno_type" id="mvno_type">
                               </div>
                           </div>
                           <div class="mb-3 row">
                               <label for="mvno_value" class="col-md-2 col-form-label">MVNO Value</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$value->mvno_value}}" type="text" name="mvno_value" id="mvno_value">
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
<script src="{{asset('/backend/js/pages/apn/apn.js')}}"></script>
@endsection
