@extends('admin.layout')



@section('content')

<div class="main-content container-fluid">

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <h5></h5>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Teacher Table</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>

<div class="col-md-8 col-12 mx-auto">

    <x-flash-message/>
    {{-- <div class="align-items: center;"> --}}
    <div class="card" >
        <div class="card-header">
        <h4 class="card-title">Add Teacher's Information</h4>
        </div>
        <div class="card-content">
        <div class="card-body">

            

            <form method="POST" action="/store_teacher" enctype="multipart/form-data"
            class="form form-vertical">

            @csrf
            <div class="form-body">
                <div class="row">
                
                    <div class="col-12">
                    <div class="form-group has-icon-left">
                        <label for="name">FullName</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                            <div class="form-control-icon" >
                                <i class='fas fa-user-tie fa-fw' style='font-size:16px;color:rgb(7, 7, 7)'
                        width="20"></i>
                            </div>
                        </div>
                    </div>
                    @error('name')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-group has-icon-left">
                        <label for="username">UserName</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="UserName" name="username" value="{{old('username')}}">
                            <div class="form-control-icon" >
                                <i class='fas fa-user-alt fa-fw' style='font-size:16px;color:rgb(7, 7, 7)'
                        width="20"></i>
                            </div>
                        </div>
                    </div>

                    @error('username')
                <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
                </div>

                <div class="col-12">
                    
                    <div class="form-group has-icon-left">
                        <label for="email">Email</label>
                        <div class="position-relative">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                            <div class="form-control-icon" >
                                <i class='fa fa-address-card fa-fw' style='font-size:16px;color:rgb(7, 7, 7)'
                                width="20"></i>
                            </div>
                        </div>
                    </div>
                    @error('email')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-group has-icon-left">
                        <label for="phone">Phone No.</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Mobile" name="phone" value="{{old('phone')}}">
                            <div class="form-control-icon" >
                                <i class='fa fa-phone fa-fw' style='font-size:16px;color:rgb(7, 7, 7)'
                                width="20"></i>
                            </div>
                        </div>
                    </div>
                    @error('phone')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="col-12">
                    <div class="form-group has-icon-left">
                        <label for="address">Address</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Address" name="address" value="{{old('address')}}">
                            <div class="form-control-icon" >
                                <i class='fas fa-map-marker-alt fa-fw' style='font-size:16px;color:rgb(7, 7, 7)'
                                width="20"></i>
                            </div>
                        </div>
                    </div>
                    @error('address')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-group has-icon-left">
                        <label for="role">Role</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Role" name="role"  value="{{old('role')}}">
                            <div class="form-control-icon">
                                <i class='fas fa-book-reader fa-fw' style='font-size:16px;color:rgb(7, 7, 7)'
                                width="20"></i>
                            </div>
                        </div>
                    </div>
                    @error('role')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-group has-icon-left">
                        <label for="password">Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" placeholder="Password" 
                            name="password" value="{{old('password')}}" />
                            <div class="form-control-icon" >
                                <i data-feather="lock"></i>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                {{-- <div class="col-lg-6 col-md-12">
                    
                    <div class="form-file">
                        <input type="file" class="form-file-input" name="image">
                        <label class="form-file-label" for="image">
                            <span class="form-file-text">Choose file</span>
                            <span class="form-file-button btn-primary "><i data-feather="upload"></i></span>
                        </label>
                    </div>

                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div> --}}
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
    </div>


<!-- // Basic Vertical form layout section end -->

@endsection