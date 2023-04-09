<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('/public/assets/img/logo.jpg')}}">
    <title>
        Point Management
    </title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->

    <link rel="stylesheet" href="{{ asset('/assets/css/nucleo-svg.css') }}">
    
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <!-- CSS Files -->
    <link id="pagestyle"  href="{{ asset('/assets/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body class="g-sidenav-show">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0
        border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{route('index')}}">
                <img src="https://fpt.edu.vn/Content/images/assets/Logo-Btec.png" class="navbar-brand-img h-100" alt="main_logo">
                <marquee width="80%" direction="right">
                    <b style="color: rgb(255, 255, 255)"><i>You only live once, but if you do it right, once is enough.</i></b> 
                 </marquee>
            </a>
        </div>
        <div style="text-align: center" >
            <img  width="54px"  src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-512.png" alt="">
            <h5 style="font-size: 14px ; color :rgb(255, 255, 255)"></h5>
        </div>
        @if(auth()->check())
        <hr class="horizontal light mt-0 mb-2">
        <div style="max-height: 60%!important">
            <ul class="navbar-nav">
                @if(in_array(auth()->user()->role, ['teacher']))
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-title">Student</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('students')}}">
                                <span class="nav-link-text ms-1">
                                    List of students
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('students.add')}}">
                                <span class="nav-link-text ms-1">
                                    Add students
                                </span>
                            </a>
                        </li>
                    </ul>
                  </div>
                  <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-title">Teacher</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('teachers')}}">
                                <span class="nav-link-text ms-1">
                                    List of teachers
                                    
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('teachers.add')}}">
                                <span class="nav-link-text ms-1">
                                    Add teachers
                                </span>
                            </a>
                        </li>
                    </ul>
                  </div>
                @endif
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-title">Subject</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('subjects')}}">
                                <span class="nav-link-text ms-1">
                                    List of subjects
                                </span>
                            </a>
                        </li>
                        @if(in_array(auth()->user()->role, ['teacher']))
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('subjects.add')}}">
                        <span class="nav-link-text ms-1">
                            Add subject
                        </span>
                    </a>
                </li>
                @endif
                    </ul>
                  </div>
                  <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-title">Score</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        @if(in_array(auth()->user()->role, ['teacher']))
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('scores.request_edit')}}">
                        <span class="nav-link-text ms-1">
                            Request correction
                        </span>
                    </a>
                </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('scores.subjects')}}">
                                <span class="nav-link-text ms-1">
                                    Scoreboard by subject
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('scores.classrooms')}}">
                                <span class="nav-link-text ms-1">
                                    Scoreboard by class
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('scores.students')}}">
                                <span class="nav-link-text ms-1">
                                    Scoreboard by student
                                </span>
                            </a>
                        </li>
                        @endif
                        @if(in_array(auth()->user()->role, ['student']))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('scores.student', ['id' => auth()->user()->profile->id])}}">
                                <span class="nav-link-text ms-1">
                                    Personal scoreboard
                                </span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('scores.semesters')}}">
                                <span class="nav-link-text ms-1">
                                    Scoreboard by term
                                </span>
                            </a>
                        </li>
                    </ul>
                  </div>
                  <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="menu-title">Class</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        @if(in_array(auth()->user()->role, ['student']))
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('classes2', ['id' => auth()->user()->profile->class->id])}}">
                        <span class="nav-link-text ms-1">
                            Class list
                        </span>
                    </a>
                </li>
                @endif
                @if(in_array(auth()->user()->role, ['teacher']))
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('classes')}}">
                        <span class="nav-link-text ms-1">
                            Class list
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('classes.add')}}">
                        <span class="nav-link-text ms-1">
                            Add class
                        </span>
                    </a>
                </li>
                @endif
                    </ul>
                  </div>
        @endif
        
        
        <ul class="navbar-nav mb-3 ">
            @if(!auth()->check())
            <li class="nav-item ">
                <a class="nav-link text-white bg-gradient-primary" href="{{route('login')}}">
                    <span class="nav-link-text ms-1">
                        <b><i>Login</i></b>
                    </span>
                </a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link text-white bg-gradient-primary" href="{{route('logout')}}">
                    <span class="nav-link-text ms-6" >
                        <b><i>Log Out</i></b>
                        
                    </span>
                </a>
            </li>
            @endif
        </ul>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3 mt-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder mb-0">@yield('page_title')</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 pb-3">
                    @if (session()->has('error') || session()->has('errors'))
                    @include('components.error-alert', ['message' => session()->get('error') ?? session()->get('errors')->first()])
                    @endif
                    @if (session()->has('success'))
                    @include('components.success-alert', ['message' => session()->get('success')])
                    @endif
                    @yield('slot')
                </div>
            </div>
        </div>
    </main>
    
    <!--   Core JS Files   -->
    <script src="{{asset('/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/js/core/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>
</body>

</html>