@extends('users.home')

@section('user_style')

{{-- <link rel="stylesheet" href="{{asset('assets/layout/css/bootstrap.css')}}">
    
    <link rel="shortcut icon" href="{{asset('assets/layout/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/layout/css/app.css')}}">
    
@endsection

@section('users')
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - Voler Admin Dashboard</title>
    
</head>

<body>
    <div id="auth">
        
<div class="container">
    <div class="row">
        <div class="col-md-7 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="assets/images/favicon.svg" height="48" class='mb-4'>
                        <h3>Register</h3>
                        <p>Please fill the form to register.</p>
                    </div>
                    <form method="POST" action="/store_user">

                        @csrf

                        <div class="row">
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input type="text" class="form-control"  name="name" value="{{old('name')}}">
                                </div>
                                @error('name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            </div>

                            

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="user_name">UserName</label>
                                    <input type="text"  class="form-control"  name="user_name" value="{{old('user_name')}}">
                                </div>
                                @error('user_name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email"  class="form-control" name="email" value="{{old('email')}}">
                                </div>
                                @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                 @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
                                </div>
                                @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                 @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password"  class="form-control" name="password" value="{{old('password')}}">
                                </div>
                                @error('password')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                 @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="password_confirmation"> Confirm Password</label>
                                    <input type="password"  class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}">
                                </div>
                                @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                 @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control" name="password" value="{{old('phone')}}">>
                                </div>
                                @error('password')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                 @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}">
                                </div>
                                @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                 @enderror
                            </div> 
                            
                        </div>

                                <a href="/login">Have an account? Login</a>
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
    
</body>

</html>

@endsection

@section('user_script')
    <script src="{{asset('assets/layout/assets/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/layout/assets/js/app.js')}}"></script>
    
    <script src="{{asset('assets/layout/assets/js/main.js')}}"></script> --}}
    @endsection
