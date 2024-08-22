<!DOCTYPE html>
<html lang="en">
<head>
    
<title>View Profile</title>

<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Account settings</h4>
    
    <div class="d-flex align-items-start py-3 border-bottom">
       <img src="{{$student->photo ? asset('storage/' . $student->photo) : 
       asset('/images/logo.png')}}"
            alt="user" width="90">
            <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
            <link rel="stylesheet" href="{{asset('assets/layout/css/profile_settings.css')}}">
            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </head>

    <form method="POST" action="/student/{{$student->id}}" enctype="multipart/form-data">

        @csrf

      
        
        <div class="pl-sm-4 pl-2" id="img-section">
            
            <b>Profile Photo</b>
            <p>Change Image</p>
            
        </div>
       
        
    </div>
    <div class="py-2">
        <div class="row py-2">
            <div class="col-md-6">
                <label for="firstname">LRN</label>
                <input type="text" class="bg-light form-control" placeholder="LRN" value="{{$student->lrn}}">
            </div>
            <div class="col-md-6">
                <label for="name">Name</label>
                <input type="text" class="bg-light form-control" placeholder="Name" value="{{$student->name}}">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="email">Email Address</label>
                <input type="email" class="bg-light form-control" placeholder="Email" value="{{$student->email}}">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="phone_num">Phone Number</label>
                <input type="tel" class="bg-light form-control" placeholder="Phone Number" value="{{$student->phone_num}}">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="address">Address</label>
                <input type="text" class="bg-light form-control" placeholder="Address" value="{{$student->address}}">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="grade">Grade</label>
                <input type="text" class="bg-light form-control" placeholder="Grade" value="{{$student->grade}}">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="strand">Strand</label>
                <input type="text" class="bg-light form-control" placeholder="Strand" value="{{$student->strand}}">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="Section">Grade</label>
                <input type="text" class="bg-light form-control" placeholder="Section" value="{{$student->section}}">
            </div>
        </div>


        {{-- <div class="row py-2">
            <div class="col-md-6">
                <label for="country">Country</label>
                <select name="country" id="country" class="bg-light">
                    <option value="india" selected>India</option>
                    <option value="usa">USA</option>
                    <option value="uk">UK</option>
                    <option value="uae">UAE</option>
                </select>
            </div>
            <div class="col-md-6 pt-md-0 pt-3" id="lang">
                <label for="language">Language</label>
                <div class="arrow">
                    <select name="language" id="language" class="bg-light">
                        <option value="english" selected>English</option>
                        <option value="english_us">English (United States)</option>
                        <option value="enguk">English UK</option>
                        <option value="arab">Arabic</option>
                    </select>
                </div>
            </div>
        </div> --}}
        {{-- <div class="py-3 pb-4 border-bottom">
            <button class="btn btn-primary mr-3">Save Changes</button>
            <button class="btn border button">Cancel</button>
        </div> --}}

        <a class="inlineRight" href="/students/all_student">
            <i class='fas fa-arrow-left fa-fw' style='font-size:16px;color:rgb(7, 7, 7)'
                        width="20"></i>


        
    </div>
</div>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile Card</title>
    
	<link rel="stylesheet" href="{{asset('assets/layout/css/profile.css')}}">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

    <form method="POST" action="/student/{{$student->id}}" enctype="multipart/form-data">

        @csrf

<div class="wrapper">
    <div class="left">
        <img src="{{$student->photo ? asset('storage/' . $student->photo) : 
        asset('/images/logo.png')}}" 
        alt="user" width="100">
        <h5>{{$student->lrn}}</</h5>
         <p>{{$student->name}}</</p>
        
         
    </div>
    <div class="right">
        <div class="info">
            <a class="inlineRight" href="/students/all_student">
                <i class="fas fa-hand-point-right"></i>back</a>

                <i class="fa-solid fa-arrow-right-from-line"></i>
            <h3>Information</h3>
            
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    <p>{{$student->email}}</</p>
                 </div>
                 <div class="data">
                   <h4>Phone</h4>
                    <p>{{$student->phone}}</p>
              </div>

              
           
            </div>
        </div>
      
      <div class="projects">
        
            <div class="projects_data">
                <div class="data">
                    <h4>Address</h4>
                     <p>{{$student->address}}</p>
                 </div>
    
                 <div class="data">
                    <h4>Subject</h4>
                     <p>{{$student->subject}}</p>
                 </div>
            </div>
        </div>

        <div class="projects">
        
            <div class="projects_data">
                <div class="data">
                    <h4>Grade</h4>
                     <p>{{$student->grade}}</p>
                 </div>
    
                 <div class="data">
                    <h4>Strand</h4>
                     <p>{{$student->strand}}</p>
                 </div>

                 
            </div>
        </div>

        <div class="projects">

                 <div class="data">
                    <h4>Section</h4>
                     <p>{{$student->section}}</p>
                 </div>
            </div>

            
        </div>

        

        
      
        
    </div>
    
    </form>
   

</body>
</html> --}}