@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <link href="{{asset('/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">
                            @csrf
                            <div class="col-6">
                                <h4 class="card-title mb-4">Monthly Subscribers</h4>
                            </div>
                            <div class="col-2">
                                <h4 class="card-title float-end mt-2">Select Year</h4>
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control" name="yearpicker" id="yearpicker" />
                            </div>
                        </div>
                    </div>
                    <div id="monthly_users" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection

@section('footer')
    <script src="{{asset('/backend/js/pages/dashboard.init.js')}}"></script>
    <script src="{{asset('/backend/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('/backend/js/pages/dashboard/dashboard.js')}}"></script>
@endsection

