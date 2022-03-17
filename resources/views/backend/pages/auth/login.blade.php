<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login | Mgram /backend</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/backend/images/favicon.png')}}">
    <!-- Bootstrap Css -->
    <link href="{{asset('/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/backend/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        .card-body.pt-0 {
            padding-top: 20px !important;
        }
    </style>
 </head>
 <body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0"> 
                            <div class="p-2">
                                <form class="form-horizontal" method="POST" action="">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Enter username">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                    </div>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <div>
                            <p>Don't have an account ? <a href="{{url('register')}}" class="fw-medium text-primary"> Signup now </a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->
    <!-- JAVASCRIPT -->
    <script src="{{asset('/backend/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/backend/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('/backend/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('/backend/libs/node-waves/waves.min.js')}}"></script>
    <!-- App js -->
    <script src="{{asset('/backend/js/app.js')}}"></script>
</body>
</html>
