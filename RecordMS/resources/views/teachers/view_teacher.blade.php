<!DOCTYPE html>
<html lang="en">
<head>
<title>View Profile</title>
<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">Account settings</h4>
    <div class="d-flex align-items-start py-3 border-bottom">
       <img src="{{$teacher->image ? asset('storage/' . $teacher->image) : 
       asset('/images/logo.png')}}"
            alt="user" width="90">
            <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
            <link rel="stylesheet" href="{{asset('assets/layout/css/profile_settings.css')}}">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </head>

    <form method="POST" action="/teachers/{{$teacher->id}}" enctype="multipart/form-data">

        @csrf

      
        
        <div class="pl-sm-4 pl-2" id="img-section">
            
            <b>Profile Photo</b>
            <p>Change Image</p>
            
        </div>
       
        
    </div>
    <div class="py-2">
        <div class="row py-2">
            <div class="col-md-6">
                <label for="firstname">User Id</label>
                <input type="text" class="bg-light form-control" placeholder="User Id" value="{{$teacher->user_id}}">
            </div>
            <div class="col-md-6">
                <label for="name">Name</label>
                <input type="text" class="bg-light form-control" placeholder="Name" value="{{$teacher->name}}">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="email">Email Address</label>
                <input type="email" class="bg-light form-control" placeholder="Email" value="{{$teacher->email}}">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="phone">Phone Number</label>
                <input type="tel" class="bg-light form-control" placeholder="Phone Number" value="{{$teacher->phone}}">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="address">Address</label>
                <input type="text" class="bg-light form-control" placeholder="Address" value="{{$teacher->address}}">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="subject">Subject</label>
                <input type="tel" class="bg-light form-control" placeholder="Subject" value="{{$teacher->subject}}">
            </div>
        </div>

        <a class="inlineRight" href="/teachers/all_teacher">
            <i class='fas fa-arrow-circle-left' style='font-size:26px;color:rgb(7, 7, 7)'
                        width="20"></i></a>
        
    </div>
</div>
</html>
   