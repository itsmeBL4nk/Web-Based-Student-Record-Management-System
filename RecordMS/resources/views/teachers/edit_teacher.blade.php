@extends('admin.layout')


@section('content')
<div class="col-md-8 col-12 mx-auto">
    <x-flash-message/>
    <div class="card">
        <div style="background-color: #9bc6fd;" class="card-header">
           
        <h4 style="font-size: 20px; color:black;" class="card-title"><a href="/teachers/all_teacher" style="height: 40px;
         font-size: 16px;color:black; " class="btn icon icon-left btn-success"><i data-feather="arrow-left"></i>
             Back</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Edit Teacher's Information</h4>
        
        </div>
        <div class="card-content">
        <div class="card-body">
            <form method="POST" action="/teachers/{{$teacher->id}}" enctype="multipart/form-data"
            class="form form-vertical">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="row">

                <div class="col-12">
                            <label for="username">UserName</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="UserName" 
                                name="username" value="{{$teacher->username}}">
                            </div>
                            @error('username')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    </div>

                <div class="col-12">
                        <label for="name">Name</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Name"
                             name="name" value="{{$teacher->name}}">
                        </div>
                    @error('name')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                    
                        <label for="email">Email</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Email" 
                            name="email" value="{{$teacher->email}}">
                        </div>
                    </div>
                    @error('email')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                        <label for="phone">Mobile</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Mobile" 
                            name="phone" value="{{$teacher->phone}}">
                        </div>
                    </div>
                    @error('phone')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="col-12">
                        <label for="address">Address</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Address" 
                            name="address" value="{{$teacher->address}}">
                        </div>
                    </div>
                    @error('address')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>


<!-- // Basic Vertical form layout section end -->

@endsection