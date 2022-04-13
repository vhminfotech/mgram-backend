@extends('layouts.app')
@section('title', "Subscriber's List")

@section('content')
<link href="{{asset('/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="col-8">
                <div class="row">
                    <div class="col-sm-4">
                        <div id="reportrange" class="btn btn-success"><span></span> <b class="caret"></b></div>
                    </div>
                    <div class="col-sm">
                        <select id="operators" class="form-control valid">
                            <option value="">Select Operator</option>
                            @foreach($get_operators as $operator)
                                <option value="{{$operator->operator_name}}">{{$operator->operator_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class=" col-sm">
                        <button id="filter" class="btn btn-primary">Filter</button>
                    </div>
                </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <input type="hidden" id="last_record_date" value="{{$get_last_record_date->created_at}}"/>
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
                                    <th style="display: none">Created at</th>
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
                                        <td style="display: none">{{date("M d, Y", strtotime($value->created_at))}}</td>
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
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script src="{{asset('/backend/js/pages/subscribers/subscribers.js')}}"></script>

@endsection
