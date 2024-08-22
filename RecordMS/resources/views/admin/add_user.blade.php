@extends('admin.layout')


@section('content')


<div class="col-md-6 col-12 mx-auto">
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Add User</h4>
        </div>
        <div class="card-content">
        <div class="card-body">
            
            <form method="POST" action="/store_user">

            @csrf
            <div class="form-body">
                <div class="row">

                <div class="col-12">
                    <div class="form-group has-icon-left">
                        <label for="name">Name</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}"/>
                            <div class="form-control-icon" >
                                <i data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    @error('name')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                    
                    <div class="form-group has-icon-left">
                        <label for="email">Email</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email')}}" />
                            <div class="form-control-icon" >
                                <i data-feather="mail"></i>
                            </div>
                        </div>
                    </div>
                    @error('email')
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

                <div class="col-12">
                    <div class="form-group has-icon-left">
                        <label for="password_confirmation">Password Confirmation</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" placeholder="Password Confirmation" 
                            name="password_confirmation" value="{{old('password_confirmation')}}" />
                            <div class="form-control-icon" >
                                <i data-feather="lock"></i>
                            </div>
                        </div>
                    </div>
                    @error('password_confirmation')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
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
@endsection