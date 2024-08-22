@extends('admin.layout')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('content')

<div class="main-content container-fluid">
    <x-flash-message/>
    <a href="#AddUserModal" class="btn btn-outline-primary" data-bs-toggle="modal"><i data-feather="user-plus">
        </i>Add Admin</a>
     
    <section class="section">
        <div class="card">
            <div style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
                <b>Users</b>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                            <th style="padding: 10px">ID</th>
                            
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

{{--==================================================ADD USER=================================================== --}}

<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/store_user">

            @csrf
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Admin</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
            </div>

            <div style="padding-top: 15px;" class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="username">UserName</label>
                        <input type="text" id="username" class="form-control" placeholder="UserName"
                            name="username"  value="{{old('username')}}">
                    </div>
                        @error('username')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Email"
                            name="email" value="{{old('email')}}">
                    </div>
                        @error('email')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Password"
                            name="password" value="{{old('password')}}">
                    </div>
                        @error('password')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" id="password_confirmation" class="form-control"
                         placeholder="Password Confirmation"
                        name="password_confirmation" value="{{old('password_confirmation')}}">
                    </div>
                        @error('password_confirmation')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>
                
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Add Admin</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
            </div>
        </div>
        </div>
        <input type="hidden" id="role" class="form-control"
        name="role" value="2">
    </form>
    </div>
    
</div>

@endsection

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection
