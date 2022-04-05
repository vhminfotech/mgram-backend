@extends('layouts.app')
@section('title', "Edit Setting")

@section('content')

<link href="{{asset('/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- end page title -->
           <div class="row">
               <div class="col-12">
                   <form method="POST" id="edit-apn-form-validation"  enctype='multipart/form-data'> @csrf
                   <div class="card">
                       <div class="card-body">
                           <input name="operator" type="hidden" value="{{$settingData->operator}}">

                           @if($settingData->config_name === 'apk')
                           
                           <div class="mb-3 row">
                               <div class="input-group">
                                   <label for="apk" class="col-md-2 col-form-label">APK File</label>
                                    <div class="col-md-10">
                                       <input type="file" class="form-control" name="apk" id="operator_logo" aria-describedby="apk" aria-label="Upload">
                                       @if($settingData->config_value !== '')
                                        <div class="alert alert-primary mt-3" role="alert">
                                           <a href="{{$settingData->config_value}}" class="alert-link">Uploaded OLD APK FILE</a>. Give it a click if you want to download.
                                        </div>
                                       @endif
                                    </div>
                                </div>
                           
                                @else
                           
                                <div class="mb-3 row">
                                    <label for="config_value" class="col-md-2 col-form-label">{{$settingData->config_name}}</label>
                                    <div class="col-md-10">
                                        <input autocomplete="off" class="form-control" value="{{$settingData->config_value}}" type="text" name="config_value" id="config_value">
                                    </div>
                                </div>

                                @endif
                           
                            <div>
                                <button class="btn btn-primary mt-6" type="submit">Submit</button>
                            </div>
                       </div>
                   </div>
               </form>
               </div> 
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
                apk : {
                    required: true,
                },
                config_value : {
                    required: true,
                }
            }
        });
    });
</script>
@endsection
