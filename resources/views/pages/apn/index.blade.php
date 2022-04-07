@extends('layouts.app')
@section('title', "APN List")

@section('content')
<link href="{{asset('/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<style>

/* Important part */

.modal-body{
    height: 60vh;
    overflow-y: auto;
}
    
</style>
        <link href="{{asset('/backend/libs/toastr/build/toastr.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th style="text-align:center">APN Name</th>
                                    <th style="text-align:center">Operator</th>
                                    <th style="text-align:center">Created at</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                    @if(!empty($apn_data))
                                    @foreach($apn_data as $value)
                                    
                                    <tr>
                                        <td style="text-align:center">{{$value->apn_name}}</td>
                                        <td style="text-align:center">{{$value->operator_name}}</td>
                                        <td style="text-align:center">{{date("d-m-Y -- H:i:s", strtotime($value->created_at))}}</td>
                                        <td style="text-align:center">
                                            <a class="btn btn-outline-secondary btn-sm" id="view_apn" data-id="{{$value->id}}" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{url("editapn", $value->id)}}" class="btn btn-outline-secondary btn-sm" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-outline-secondary btn-sm" id="delete_apn" data-id="{{$value->id}}" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
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
    </div>
</div>

<!-- Transaction Modal -->
<div id="apnModal" class="modal fade transaction-detailModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction-detailModalLabel">APN Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{asset('/backend/js/pages/apn/apn.js')}}"></script>
@endsection
