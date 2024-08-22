<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('assets/layout/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/layout/css/boxicons.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/layout/css/styling.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/layout/images/school_image/bnhslogo.png')}}"  type="image/x-icon">

<title>SRMS-BNHS</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img class="logo"  src="{{asset('assets/layout/images/school_image/bnhslogo.png')}}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#abousUS">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#strand">Strand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#registration">Pre Registration</a>
                    </li>
                    <li style="box-shadow: rgba(178, 184, 192, 0.3) 0px 0px 0px 3px;" class="nav-item">
                        <a style="background-color:rgb(218, 218, 237);color:blue"
                         class="nav-link"  href="/users/landing_page">Login<i class='fas fa-arrow-right'
                          style='padding-left:15px;font-size:14px;color:rgb(7, 7, 7)'></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><!-- //NAVBAR -->

    <!-- LOGIN FORM-->
    <div  class="hero vh-100 d-flex align-items-center" id="home">
        <div class="container">
            <div class="row">
              <div class="container">
                <div class="row">
                    <div style="background-color: rgb(196, 254, 254)" class="col-md-5 col-sm-12 mx-auto">
                        <div style="background-color: rgb(224, 245, 245)" class="card pt-4">
                            <div class="card-body">
                                <div class="text-center mb-5">
                                    <h3>SRMS-BNHS</h3>
                                </div>
                                <form method="POST" action="/users/authenticate">
                                  @csrf

                                    <div class="form-group position-relative has-icon-left">
                                        <label style="color: rgb(14, 22, 22); backgroud-color: red" 
                                         for="username">Username</label>
                                        <div class="position-relative"> 
                                            <input type="text" style="border:1px solid black;" class="form-control" placeholder="Enter Username" name="username" id="username">
                                        </div>
                                        <br>
                                        @error('username')
                                        <p style="color:red;">
                                        {{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group position-relative has-icon-left">
                                        <div class="clearfix">
                                            <label style="color: rgb(14, 22, 22)" for="password">Password</label>
                                            {{-- <a href="auth-forgot-password.html" class='float-end'>
                                                <small>Forgot password?</small>
                                            </a> --}}
                                        </div>
                                        <div class="position-relative">
                                            <input type="password" style="border:1px solid black;" class="form-control" placeholder="Enter Password" name="password" id="password">
                                        </div>
                                        @error('password')
                                        <p style="color:red;">
                                        {{$message}}</p>
                                        @enderror
                                    </div>
            
                                    <div class='form-check clearfix my-4'>
                                        
                                        <div class="float-end">
                                            <a style="color: rgb(253, 7, 7)" href="/users/landing_page">Login as a Student?</a>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <button class="btn btn-primary float-end">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    {{-- <!-- PRICING -->
    <section id="pricing" class="bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h3 class="text-primary">Strand</h6>
                    <h4>The School offers </h1>
                    <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet eaque fuga
                        in cumque optio consectetur harum vitae debitis sapiente praesentium aperiam aut</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6">
                    <div class="pricing card-effect text-center">
                        <h6>STARTER</h6>
                        <h1>$99</h1>
                        <hr>
                        <ul class="list-unstyled mb-4">
                            <li><i class='bx bxs-check-circle'></i>
                                Premium support</li>
                            <li><i class='bx bxs-check-circle'></i>
                                30+ Webmaster Tools</li>
                            <li><i class='bx bxs-check-circle'></i>
                                Drag & Drop Builder</li>
                            <li><i class='bx bxs-check-circle'></i>
                                eCommerce Store</li>
                            <li><i class='bx bxs-check-circle'></i>Wordpress plugins</li>
                        </ul>
                        <button class="btn btn-primary">Get Started</button>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="pricing card-effect text-center">
                        <h6>STARTER</h6>
                        <h1>$199</h1>
                        <hr>
                        <ul class="list-unstyled mb-4">
                            <li><i class='bx bxs-check-circle'></i>
                                Premium support</li>
                            <li><i class='bx bxs-check-circle'></i>
                                30+ Webmaster Tools</li>
                            <li><i class='bx bxs-check-circle'></i>
                                Drag & Drop Builder</li>
                            <li><i class='bx bxs-check-circle'></i>
                                eCommerce Store</li>
                            <li><i class='bx bxs-check-circle'></i>Wordpress plugins</li>
                        </ul>
                        <button class="btn btn-primary">Get Started</button>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="pricing card-effect text-center">
                        <h6>STARTER</h6>
                        <h1>$299</h1>
                        <hr>
                        <ul class="list-unstyled mb-4">
                            <li><i class='bx bxs-check-circle'></i>
                                Premium support</li>
                            <li><i class='bx bxs-check-circle'></i>
                                30+ Webmaster Tools</li>
                            <li><i class='bx bxs-check-circle'></i>
                                Drag & Drop Builder</li>
                            <li><i class='bx bxs-check-circle'></i>
                                eCommerce Store</li>
                            <li><i class='bx bxs-check-circle'></i>Wordpress plugins</li>
                        </ul>
                        <button class="btn btn-primary">Get Started</button>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="pricing card-effect text-center">
                        <h6>STARTER</h6>
                        <h1>$399</h1>
                        <hr>
                        <ul class="list-unstyled mb-4">
                            <li><i class='bx bxs-check-circle'></i>
                                Premium support</li>
                            <li><i class='bx bxs-check-circle'></i>
                                30+ Webmaster Tools</li>
                            <li><i class='bx bxs-check-circle'></i>
                                Drag & Drop Builder</li>
                            <li><i class='bx bxs-check-circle'></i>
                                eCommerce Store</li>
                            <li><i class='bx bxs-check-circle'></i>Wordpress plugins</li>
                        </ul>
                        <button class="btn btn-primary">Get Started</button>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- PRICING --> --}}
        <!-- STRAND -->
        <section id="strand">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-8 mx-auto text-center">
                        <h2 style="color:blue;text-decoration: underline;">STRAND</h2 >
                        <h6 style="font-family: " monospace;>The School offers courses for Senior High School Student:</h4><br>
                            <h5  style="color:rgb(244, 62, 86); font-style: italic;text-decoration: underline;">Academic Track</h4>
                        {{-- <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet eaque fuga
                            in cumque optio consectetur harum vitae debitis sapiente praesentium aperiam aut</p> --}}
                    </div>
                </div>
                <div  class="row text-center g-4">
                    <div class="col-lg-3 col-sm-6">
                        <div style="background-color: rgb(253, 176, 222)" class="team-member card-effect">
                            <img src="{{asset('assets/layout/images/school_image/abm-1.png')}}" alt="">
                            <h4 class="mb-0 mt-4">ABM</h4>
                            {{-- <p>Web Developer</p>  --}}
                            {{-- <div class="social-icons">
                                <a href="#"><i class='bx bxl-facebook'></i></a>
                                <a href="#"><i class='bx bxl-twitter'></i></a>
                                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div style="background-color: rgb(84, 249, 202)" class="team-member card-effect">
                            <img src="{{asset('assets/layout/images/school_image/images.png')}}" alt="">
                            <h5 class="mb-0 mt-4">GAS</h5>
                            {{-- <div class="social-icons">
                                <a href="#"><i class='bx bxl-facebook'></i></a>
                                <a href="#"><i class='bx bxl-twitter'></i></a>
                                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div style="background-color: rgb(247, 57, 76)" class="team-member card-effect">
                            <img src="{{asset('assets/layout/images/school_image/images (7).jpeg')}}"  alt="">
                            <h5 class="mb-0 mt-4">HUMMS</h5>
                            
                            {{-- <div class="social-icons">
                                <a href="#"><i class='bx bxl-facebook'></i></a>
                                <a href="#"><i class='bx bxl-twitter'></i></a>
                                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                            </div> --}}
                        </div>
                    </div>
                    <div  class="col-lg-3 col-sm-6">
                        <div style="background-color: rgb(19, 226, 226)" class="team-member card-effect">
                            <img src="{{asset('assets/layout/images/school_image/images (3).png')}}" alt="">
                            <h5 class="mb-0 mt-4">STEM</h5>
                            
                            {{-- <div class="social-icons">
                                <a href="#"><i class='bx bxl-facebook'></i></a>
                                <a href="#"><i class='bx bxl-twitter'></i></a>
                                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-8 mx-auto text-center">
                            <h5  style="color:rgb(244, 62, 86); font-style: italic;text-decoration: underline;">Technological Vocational Livelihood(TVL)</h4>
                        {{-- <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet eaque fuga
                            in cumque optio consectetur harum vitae debitis sapiente praesentium aperiam aut</p> --}}
                    </div>
                </div>
                <div  class="row text-center g-4">
                    <div class="col-lg-3 col-sm-6">
                        <div style="background-color: rgb(253, 176, 177)" class="team-member card-effect">
                            <img src="{{asset('assets/layout/images/school_image/HE-BPP1.jpeg')}}" alt="">
                            <h4 class="mb-0 mt-4">HE-BPP</h4>
                            {{-- <p>Web Developer</p>  --}}
                            {{-- <div class="social-icons">
                                <a href="#"><i class='bx bxl-facebook'></i></a>
                                <a href="#"><i class='bx bxl-twitter'></i></a>
                                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div style="background-color: rgb(84, 249, 202)" class="team-member card-effect">
                            <img src="{{asset('assets/layout/images/school_image/HE-BNC.png')}}" alt="">
                            <h5 class="mb-0 mt-4">HE-BNC</h5>
                            {{-- <div class="social-icons">
                                <a href="#"><i class='bx bxl-facebook'></i></a>
                                <a href="#"><i class='bx bxl-twitter'></i></a>
                                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div style="background-color: rgb(247, 57, 76)" class="team-member card-effect">
                            <img src="{{asset('assets/layout/images/school_image/CICT.png')}}"  alt="">
                            <h5 class="mb-0 mt-4">CICT</h5>
                            
                            {{-- <div class="social-icons">
                                <a href="#"><i class='bx bxl-facebook'></i></a>
                                <a href="#"><i class='bx bxl-twitter'></i></a>
                                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                            </div> --}}
                        </div>
                    </div>
                    <div  class="col-lg-3 col-sm-6">
                        <div style="background-color: rgb(19, 226, 226)" class="team-member card-effect">
                            <img src="{{asset('assets/layout/images/school_image/INDUSTRIAL.png')}}" alt="">
                            <h5 class="mb-0 mt-4">Industrial Arts</h5>
                            
                            {{-- <div class="social-icons">
                                <a href="#"><i class='bx bxl-facebook'></i></a>
                                <a href="#"><i class='bx bxl-twitter'></i></a>
                                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- TEAM -->

    {{-- ABOUT US--}}
    <section id="abousUS">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h2 style="color:blue;text-decoration: underline;" class="text-primary">ABOUT US</h2>
                </div>
                <br>
                <br>
                <br>
                <div class="image-section mx-auto" >
                    <img src="{{asset('assets/layout/images/school_image/pic1.jpg')}}">
                </div>
            </div>
            <div class="row g-8">
                {{-- <div class="col-lg-4 col-sm-6">
                    <div class="service card-effect bounceInUp">
                        <div class="iconbox">
                            <i class='bx bxs-check-shield'></i>
                        </div>
                        <h5 class="mt-4 mb-2">Service</h5>
                        <p>"A school of beauty, a school humility a school of loyalty , serving God and community"</p>
                    </div>
                </div> --}}
                <div class="col-lg-6 col-sm-6">
                    <div class="service card-effect">
                        {{-- <div class="iconbox">
                            <i class='bx bxs-comment-detail'></i>
                        </div> --}}
                        <h3 class="mt-4 mb-2 text-center" style="color: rgb(247, 57, 76)">Mission</h3><br>
                        <p style="color: rgb(16, 15, 15)">To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic
                             education where: Students learn in a child-friendly, gender sensitive, safe and motivating environment 
                             Teachers facilitate learning and constantly nurture every learner Administrators and staff, as 
                             stewards of the institution, ensure an enabling and portive environment for effective learning to 
                             happen Family, community and other stakeholders are actively engaged and share responsibility for 
                             developing lifelong learners </p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="service card-effect">
                        {{-- <div class="iconbox">
                            <i class='bx bxs-doughnut-chart'></i>
                        </div> --}}
                        <h3 class="mt-4 mb-2 text-center" style="color: rgb(247, 57, 76)">Vision</h3><br>
                        <p style="color: rgb(16, 15, 15)">We dream of Filipino who passionately love their country and whose competencies and value anable them to 
                            realize thier full potential and contribute meaningfully to building the nation. We are a learner centered 
                            public institution, the department of education continuously improves itself to better serve its stakeholders. </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- SERVICES -->

    <!-- FEATURES -->
    <section class="row w-100 py-0 bg-light" id="features">
        <div class="col-lg-6 col-img"></div>
        <div class="col-lg-6 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h6 class="text-primary">WHY TO CHOOSE US</h6>
                        <h1>Best solution for your business</h1>
                        <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet eaque
                            fuga
                            in cumque optio consectetur harum vitae debitis sapiente praesentium aperiam aut</p>

                        <div class="feature d-flex mt-5">
                            <div class="iconbox me-3">
                                <i class='bx bxs-comment-edit'></i>
                            </div>
                            <div>
                                <h5>Feature</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil perspiciatis illo </p>
                            </div>
                        </div>
                        <div class="feature d-flex">
                            <div class="iconbox me-3">
                                <i class='bx bxs-user-circle'></i>
                            </div>
                            <div>
                                <h5>Feature</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil perspiciatis illo </p>
                            </div>
                        </div>
                        <div class="feature d-flex">
                            <div class="iconbox me-3">
                                <i class='bx bxs-download'></i>
                            </div>
                            <div>
                                <h5>Feature</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil perspiciatis illo </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- FEATURES -->

    {{-- <!-- PROJECTS -->
    <section id="portfolio">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h6 class="text-primary">PROJECTS</h6>
                    <h1>Our Recent Work</h1>
                    <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet eaque fuga
                        in cumque optio consectetur harum vitae debitis sapiente praesentium aperiam aut</p>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-sm-6">
                    <div class="project">
                        <img src="img/pro1.jpg" alt="">
                        <div class="overlay">
                            <div>
                                <h4 class="text-white">Project Title</h4>
                                <h6 class="text-white">Website Design</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="project">
                        <img src="img/pro2.jpg" alt="">
                        <div class="overlay">
                            <div>
                                <h4 class="text-white">Project Title</h4>
                                <h6 class="text-white">Website Design</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="project">
                        <img src="img/pro3.jpg" alt="">
                        <div class="overlay">
                            <div>
                                <h4 class="text-white">Project Title</h4>
                                <h6 class="text-white">Website Design</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="project">
                        <img src="img/pro4.jpg" alt="">
                        <div class="overlay">
                            <div>
                                <h4 class="text-white">Project Title</h4>
                                <h6 class="text-white">Website Design</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="project">
                        <img src="img/pro5.jpg" alt="">
                        <div class="overlay">
                            <div>
                                <h4 class="text-white">Project Title</h4>
                                <h6 class="text-white">Website Design</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="project">
                        <img src="img/pro6.jpg" alt="">
                        <div class="overlay">
                            <div>
                                <h4 class="text-white">Project Title</h4>
                                <h6 class="text-white">Website Design</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- PROJECTS --> --}}

    {{-- <!-- BLOG -->
    <section id="blog" class="bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h6 class="text-primary">BLOG</h6>
                    <h1>Latest News From The Blog</h1>
                    <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet eaque fuga
                        in cumque optio consectetur harum vitae debitis sapiente praesentium aperiam aut</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="blog-post card-effect">
                        <img src="img/blog1.jpg" alt="">
                        <h5 class="mt-4"><a href="#">harum vitae debitis sapiente praesentium aperiam au</a></h5>
                        <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-post card-effect">
                        <img src="img/blog2.jpg" alt="">
                        <h5 class="mt-4"><a href="#">harum vitae debitis sapiente praesentium aperiam au</a></h5>
                        <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-post card-effect">
                        <img src="img/blog3.jpg" alt="">
                        <h5 class="mt-4"><a href="#">harum vitae debitis sapiente praesentium aperiam au</a></h5>
                        <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet </p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- BLOG --> --}}

    <!-- Registration -->
    <section id="registration">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h2 style="color:blue;text-decoration: underline;" class="text-primary">Pre Registration</h2>
                    {{-- <h1>Get In Touch</h1>
                    <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet eaque fuga
                        in cumque optio consectetur harum vitae debitis sapiente praesentium aperiam aut</p> --}}
                </div>
            </div>

            <form method="POST" action="/submit_enrollment" action="" class="row g-3 justify-content-center">
              @csrf

                <div class="col-md-5">
                  <label style="color: black">LRN</label>
                    <input type="text" style="border:1px solid black;" class="form-control"
                     name="student_lrn" placeholder="LRN" value="{{old('student_lrn')}}">
                     @error('student_lrn')
                     <p style="color:red;">{{$message}}</p>
                      @enderror
                 </div>
                <div class="col-md-5">
                  <label style="color: black">Last Name</label>
                    <input type="text" style="border:1px solid black;" class="form-control" 
                    name="la_name" placeholder="Last Name" value="{{old('la_name')}}">
                    @error('la_name')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror
                </div>
                <div class="col-md-5">
                  <label style="color: black">First Name</label>
                    <input type="text"style="border:1px solid black;" class="form-control"
                    name="fi_name" placeholder="First Name" value="{{old('fi_name')}}">
                    @error('fi_name')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                     @enderror
                </div>
                <div class="col-md-5">
                  <label style="color: black">Middle Name</label>
                  <input type="text"style="border:1px solid black;" class="form-control"
                  name="mi_name" placeholder="Middle Name" value="{{old('mi_name')}}">
                  @error('mi_name')
                  <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                   @enderror
              </div>
              <div class="col-md-5">
                <label style="color: black">Gender</label>
                <fieldset class="form-group">
                  <select class="form-select"  id="stud_gender" name="stud_gender" value="{{old('stud_gender')}}">
                      <option selected disabled>Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                  </select>
              </fieldset>
              @error('stud_gender')
              <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
               @enderror
              </div>
              <div class="col-md-5">
                <label style="color: black">Grade Level</label>
                <fieldset class="form-group">
                  <select class="form-select"  id="stud_gradelvl" name="stud_gradelvl" value="{{old('stud_gradelvl')}}">
                      <option selected disabled>Grade Level</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                  </select>
              </fieldset>
              @error('stud_gradelvl')
              <p style="color:red;">{{$message}}</p>
               @enderror
                
              </div>
              <div class="col-md-5">
                <label style="color: black">Strand</label>
                <input type="text"style="border:1px solid black;" class="form-control"
                name="stud_strand" placeholder="Strand"  value="{{old('stud_strand')}}">
                @error('stud_strand')
                <p style="color:red;">{{$message}}</p>
                 @enderror
              </div>
                <div class="col-md-10 d-grid">
                    <button class="btn btn-primary">Pre Registration</button>
                </div>
            </form>

        </div>
    </section><!-- Registration -->

    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <img class="logo" src="img/logo-white.svg" alt="">
                    </div>
                    <div class="col-lg-2">
                        <h5 class="text-white">Brand</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Pricing</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h5 class="text-white">More</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Privacy & Policy</a></li>
                            <li><a href="#">Warranty</a></li>
                            <li><a href="#">Shipment</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="text-white">Contact</h5>
                        <ul class="list-unstyled">
                            <li>Address: 2715 Ash Dr. San Jose, South Dakota 83475</li>
                            <li>Email: jackson.graham@example.com</li>
                            <li>Phone: (603) 555-0123</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0">© 2020 copyright all right reserved | Designed with <i
                            class="bx bx-heart text-danger"></i> by<a
                                href="https://www.youtube.com/channel/UCYMEEnLzGGGIpQQ3Nu_sBsQ"
                                class="text-white">SA7MAN</a></p>
                    </div>
                    <div class="col-md-6">
                        <div class="social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="{{asset('assets/layout/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</body>
</html>