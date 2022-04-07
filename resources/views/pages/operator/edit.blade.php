@extends('layouts.app')
@section('title', "Edit Operator")

@section('content')

<link href="{{asset('/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <!-- end page title -->
           <div class="row">
               <div class="col-12">
                   <form method="POST" id="edit-operator-form-validation" enctype='multipart/form-data'> @csrf
                       <input name="id" value="{{$operator_data->id}}" type="hidden">
                   <div class="card">
                       <div class="card-body">
                           <div class="mb-3 row">
                               <div class="input-group">
                                   <label for="operator_logo" class="col-md-2 col-form-label">Operator Logo</label>
                                   <div class="col-md-10">
                                    <input type="file" class="form-control" name="operator_logo" id="operator_logo" aria-describedby="operator_logo" aria-label="Upload">
                                   </div>
                               </div>
                           </div>
                           
                           <div class="mb-3 row">
                               <label for="operator_name" class="col-md-2 col-form-label">Operator Name</label>
                               <div class="col-md-10">
                                   <input autocomplete="off" class="form-control" value="{{$operator_data->operator_name}}" type="text" name="operator_name" id="operator_name">
                               </div>
                           </div>
                           
                           <div class="mb-3 row">
                               <label for="apn_name" class="col-md-2 col-form-label ">Active Status</label>
                               <input type="checkbox" name="active_status" id="active_status" switch="none" {{$operator_data->active_status == 1 ? 'checked' : ''}}>
                               <label for="active_status" data-on-label="On" data-off-label="Off"></label>
                           </div>
                           <div>
                               <button class="btn btn-outline-primary mr-3" type="submit">Submit</button>
                               <div class="vr"></div>
                               <button class="btn btn-outline-danger ml-3" type="button" onclick="window.history.back()" >Cancel</button>
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
    input[switch]+label {
            margin-top: 5px;
    }

</style>
@endsection

@section('footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="{{asset('/backend/js/pages/operator/operator.js')}}"></script>
@endsection
