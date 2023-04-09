<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('/public/assets/img/logo.jpg')}}">
    <title>
        Quản lý điểm
    </title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/nucleo-svg.css') }}">
    
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <!-- CSS Files -->
    <link rel="stylesheet" id="pagestyle" href="{{ asset('/assets/css/material-dashboard.css?v=3.0.0') }}">
</head>

<body class="g-sidenav-show">
<div class="col-lg-4 col-md-8 col-12 mx-auto mt-5">
    <div class="card z-index-0 fadeIn3 fadeInBottom">
        
        <div class="card-body">
            <form class="text-start" method="POST" action="{{route('login.post')}}">
                <div class="brand-logo" style="text-align: center">
                    <img width="115px" height="112px" src="https://btec.fpt.edu.vn/wp-content/uploads/2021/02/Untitled-3.jpg">
                  </div>
                  <h4>Hello! let's get started</h4>
                  <h6 class="font-weight-light">Sign in to continue.</h6>
                <label class="form-label mt-3"><i>User</i></label>
                <div class="input-group input-group-outline">
                    <input type="text" name="username" class="form-control" required>
                </div>
                <label class="form-label mt-3"><i>Password</i></label>
                <div class="input-group input-group-outline">
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" value="Login">
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>