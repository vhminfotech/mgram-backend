@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Monthly Users</h4>
                    <div id="monthly_users" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('header')
@endsection

@section('footer')
    <script src="{{asset('/backend/js/pages/dashboard.init.js')}}"></script>
    <script src="{{asset('/backend/libs/apexcharts/apexcharts.min.js')}}"></script>

    <script>
        const monthly_users = {{json_encode($monthly_users )}};
    </script>

    <script src="{{asset('/backend/js/pages/dashboard/dashboard.js')}}"></script>
@endsection

