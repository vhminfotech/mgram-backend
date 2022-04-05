@extends('layouts.app')
@section('title', "Configuration List")

@section('content')
<link href="{{asset('/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<style>

/* Important part */

.modal-body{
    height: 60vh;
    overflow-y: auto;
}
    
</style>

        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                       <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Config Name</th>
                                    <th style="text-align:center">Config Value</th>
                                    <th style="text-align:center">Updated At</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    @if(!empty($settingData))
                                    @foreach($settingData as $value)
                                    
                                    <tr>
                                        <td style="text-align:center">{{$value->config_name}}</td>
                                        <td style="text-align:center">
                                            @if($value->config_value === '')
                                                Please Update the Field
                                            @elseif($value->config_name === 'apk')
                                               {{url('/') . $value->config_value}}
                                            @else
                                                {{$value->config_value}}
                                            @endif
                                        </td>
                                        <td style="text-align:center">{{date("d-m-Y -- H:i:s", strtotime($value->updated_at))}}</td>
                                        <td style="text-align:center">
                                          
                                            <a href="{{url("editSetting", $value->id)}}" class="btn btn-outline-secondary btn-sm" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                          
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('header')
<!-- DataTables -->
<link href="{{asset('/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Sweet Alert-->
<link href="{{asset('/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('footer')
<!-- Required datatable js -->
<script src="{{asset('/backend/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('/backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/backend/js/pages/datatables.init.js')}}"></script>  
<!-- Sweet Alerts js -->
<script src="{{asset('/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>

@endsection
