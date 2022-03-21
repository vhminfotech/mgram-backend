@extends('layouts.app')
@section('title', "User's List")

@section('content')
<div class="page-content">
    <div class="container-fluid">
    <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">User's List</h4>
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
<link href="/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="/backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

 <!-- Responsive datatable examples -->
<link href="/backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     
@endsection

@section('footer')
<!-- Required datatable js -->
<script src="/backend/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/backend/libs/jszip/jszip.min.js"></script>
<script src="/backend/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="/backend/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="/backend/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/backend/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/backend/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        
<!-- Responsive examples -->
<script src="/backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="/backend/js/pages/datatables.init.js"></script>  
@endsection
