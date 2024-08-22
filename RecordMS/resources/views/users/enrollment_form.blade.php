<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRMS-BNHS</title>
	<link rel="stylesheet" href="{{asset('assets/layout/css/homepage.css')}}">
    <link rel="stylesheet" href="{{asset('assets/layout/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/layout/vendors/chartjs/Chart.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/layout/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/layout/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/layout/images/school_image/bnhslogo.png')}}" type="image/x-icon">
  
    
</head>
<body>
    <div  style="background-color:  #000099" class="menu-area"class="menu-area">
		<a href="/"><img style="padding-bottom: 400px" class="logo-img" src="{{asset('assets/layout/images/school_image/bnhslogo.png')}}"
        alt="" srcset="" style="border-radius:50px; padding-top: 1px;"  width="110px" height="110px"></a>
	<ul>
		<li>
		<a href="/users/strand_homepage">Strand</a>
		</li>
		<li>
		<a href="/users/aboutus">About Us</a>
		</li>
		<li>
		<a  href="/users/enrollment_form">Pre Registration</a>
		</li>
		<li>
			<a  href="/">Home</a>
		</li>
    </ul>

	</div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <form method="POST" action="/submit_enrollment" enctype="multipart/form-data"
                      class="form form-vertical ">
                      <a href="/" class='sidebar-link'>
                        <i class='fas fa-sign-in-alt' style='font-size:35px;color:rgb(7, 7, 7)'
                        width="20"></i>  
                    </a>
                     @csrf
                        <h4 style="text-align: center;" class="card-title">Pre-Enrollment Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="student_lrn">lrn(Learner Reference Number)</label>
                                            <input type="text" id="student_lrn" class="form-control" placeholder="LRN(Learner Reference Number)"
                                                name="student_lrn">
                                        </div>
                                        @error('student_lrn')
                                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                                         @enderror
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="la_name">Last Name</label>
                                            <input type="text" id="la_name" class="form-control" placeholder="Last Name"
                                                name="la_name">
                                        </div>
                                        @error('la_name')
                                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                                         @enderror
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="fi_name">First Name</label>
                                            <input type="text" id="fi_name" class="form-control" placeholder="First Name"
                                                name="fi_name">
                                        </div>
                                        @error('fi_name')
                                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                                         @enderror
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mi_name">Middle Name</label>
                                            <input type="text" id="mi_name" class="form-control" placeholder="Middle Name"
                                                name="mi_name">
                                        </div>
                                        @error('mi_name')
                                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                                         @enderror
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="stud_gender">Gender</label>
                                            <fieldset class="form-group">
                                                <select class="form-select"  id="stud_gender" name="stud_gender" value="{{old('stud_gender')}}">
                                                    <option selected disabled>Please Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        @error('stud_gender')
                                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                                         @enderror
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="stud_gradelvl">Grade Level</label>
                                            <fieldset class="form-group">
                                                <select class="form-select"  id="stud_gradelvl" name="stud_gradelvl" value="{{old('stud_gradelvl')}}">
                                                    <option selected disabled>Please Select</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        @error('stud_gradelvl')
                                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                                         @enderror
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="stud_strand">Strand</label>
                                            <input type="text" id="stud_strand" class="form-control" placeholder="Strand"
                                                name="stud_strand">
                                        </div>
                                        @error('stud_strand')
                                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                                         @enderror
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="{{asset('assets/layout/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/layout/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/layout/js/app.js')}}"></script>
    
    <script src="{{asset('assets/layout/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('assets/layout/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/layout/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('assets/layout/js/main.js')}}"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
