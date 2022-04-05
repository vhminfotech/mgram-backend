@extends('layouts.app')
@section('title', "Subscriber's List")

@section('content')
<link href="{{asset('/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<div class="page-content">
    <div class="container-fluid">
    <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Subscriber's List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Operator</th>
                                    <th>MSISDN</th>
                                    <th>Chat Feature</th>
                                    <th>Status</th>
                                    <th>Last Active</th>
                                    <th>Created at</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    @if(!empty($user_data))
                                    @foreach($user_data as $value)
                                    <tr>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->operator_name}}</td>
                                        <td>{{$value->MSISDN}}</td>
                                        <td>{{$value->chat_feature == '1' ? 'Enabled' : 'Disabled'}}</td>
                                        <td>{{$value->user_status == '1' ? 'Active' : 'Inactive' }}</td>
                                        <td>{{$value->last_active == '' ? 'Not Available' : date("d-m-Y -- H:i:s", strtotime($value->last_active))}}</td>
                                        <td>{{date("d-m-Y -- H:i:s", strtotime($value->created_at))}}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('header')
<!-- DataTables -->
<link href="{{asset('/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
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
