<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Register | Mgram Backend</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public/backend/images/favicon.png')}}">
    <!-- Bootstrap Css -->
    <link href="{{asset('public/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('public/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('public/backend/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
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
                                <form class="needs-validation" novalidate method="POST" action="">
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="useremail" placeholder="Enter email" required>  
                                        <div class="invalid-feedback">
                                            Please Enter Email
                                        </div>      
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Enter username" required>
                                        <div class="invalid-feedback">
                                            Please Enter Username
                                        </div>  
                                    </div>
                                    <div class="mb-3">
                                        <label for="userpassword" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password" required>
                                            <div class="invalid-feedback">
                                                Please Enter Password
                                            </div>
                                    </div>
                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <div>
                            <p>Already have an account ? <a href="{{url('login')}}" class="fw-medium text-primary"> Login</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->
    <!-- JAVASCRIPT -->
    <script src="{{asset('public/backend/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/backend/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/backend/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('public/backend/libs/node-waves/waves.min.js')}}"></script>
    <!-- App js -->
    <script src="{{asset('public/backend/js/app.js')}}"></script>
</body>
</html>
