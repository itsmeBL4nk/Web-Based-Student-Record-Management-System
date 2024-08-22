<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    
    <link rel="stylesheet" href="{{asset('assets/layout/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/layout/css/buttons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/layout/vendors/chartjs/Chart.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/layout/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/layout/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/layout/images/school_image/bnhslogo.png')}}" type="image/x-icon">

    @yield('styles')
</head>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            
            <div class="sidebar-wrapper active">
    <div class="sidebar-header text-center">
        <img src="{{asset('assets/layout/images/schoollogo.jpg')}}" alt="" srcset="" style="border-radius:50px"  width="100px" height="300px">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            
            <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item active ">
                    <a href="/teachers/teacher_schedule" class='sidebar-link'>
                        <i class='fa fa-home fa-fw' style='font-size:16px;color:rgb(7, 7, 7)'
                        width="20"></i> 
                        <span>Dashboard</span>
                    </a>
            </li>
            <li class="sidebar-item  has-sub">

                <a href="#" class='sidebar-link'>
                    <i class='fas fa-server fa-fw' style='font-size:16px;color:rgb(7, 7, 7)'
                    width="20"></i> 
                    <span>Activities</span>
                </a>
                <ul class="submenu ">
                    <li>
                        <a href="/teachers/classlist">Classlist</a>
                    </li>

                    <li>
                        <a href="/teachers/teacher_schedule">My Schedule</a>
                    </li>
                    </ul>
                </li>
             </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div  style=" background-color: #deeafa"  id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        {{-- <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success me-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                      
                        @auth
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                
                                <div class="d-none d-md-block d-lg-inline-block">{{auth()->user()->username}}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#changepass"data-bs-toggle="modal"class="dropdown-item" class="dropdown-item">
                                    <i data-feather="user"></i> Account</a>
                                <div class="dropdown-divider"></div>
                                
                                <form class="inline" method="POST" action="/logout">
                                    @csrf
                                    <button type="submit">
                                <a class="dropdown-item"><i data-feather="log-out"></i> Logout</a>
                                    </button>
                                </form>
                            </div>
                        </li>
                        @endauth
                    </ul>
                </div>
            </nav>
            
            @yield('teacher_content')
{{--==================================================CHANGE PASSWORD=================================================== --}}

<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="changepass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/changepass">
                @csrf
                
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Change Password</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
            </div>
            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
            @endif
                
                <div style="padding-top: 15px;" class="form-body">
                    <div class="row">

                    <div class="col-12">
                        <div class="form-group">

                        <label for="oldPasswordInput" class="form-label">Old Password</label>
                        <input name="old_password" type="password" class="form-control
                         @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                            placeholder="Old Password">
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="newPasswordInput" class="form-label">New Password</label>
                            <input name="new_password" type="password" class="form-control
                             @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                placeholder="New Password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="new_password_confirmation" type="password"
                                 class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
        </div>
    </div>
    <script src="{{asset('assets/layout/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/layout/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/layout/js/app.js')}}"></script>
    
    <script src="{{asset('assets/layout/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('assets/layout/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/layout/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('assets/layout/js/main.js')}}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    
    @yield('script')

    
</body>
</html>

{{-- <a href="/login" class="btn btn-outline-info">Notification</a>
                            <a href="/login" class="btn btn-outline-info">View Grades</a>
                            <a href="/login" class="btn btn-outline-info">Schedule</a>
                            <a href="/login" class="btn btn-outline-info">Teachers</a>
                            <a href="/register" class="btn btn-outline-success">Home</a>
                            
                        </div> --}}
