@extends('admin.layout')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('content')

<div class="main-content container-fluid">

    <div class="page-title">
        <div class="row">
            <x-flash-message/>
            <div class="col-12 col-md-6">
                <a href="#AddTeacherModal" class="btn btn-outline-primary"
                data-bs-toggle="modal">
                    <i data-feather="plus-square"></i>Add Teacher</a>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><b> Teacher Table</b></li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>

    <section class="section">
        <div  class="card">
            <div style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
               <b>All Teacher</b>
            </div>
            <div st class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                            <th style="padding: 10px">ID</th>
                                    <th>Name</th>
                                    <th>UserName</th>
                                    <th>Address</th>
                                    <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $teacher)
                                    
                                <tr style="color: black">
                                    <td>{{$teacher->id}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->username}}</td>
                                    <td>{{$teacher->address}}</td>
                                    
                                    
                                    <td>
                                    {{-- <a href="/teachers/{{$teacher->id}}/view_teacher"
                                     class="btn icon btn-primary"><i data-feather="user"></i></a> --}}
                                     
                                     <a href="/teachers/{{$teacher->id}}/edit_teacher"
                                     class="btn icon btn-primary"><i data-feather="edit"></i></a>

                                     <a href="/delete_teacher/{{$teacher->id}}" 
                                    class="btn icon btn-danger" onclick="return confirm('Delete Teacher?')">
                                    <i data-feather="trash-2"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                       
                    </tbody>
                
{{--==================================================ADD TEACHER=================================================== --}}

<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="AddTeacherModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/store_teacher" enctype="multipart/form-data"
            class="form form-vertical">
            @csrf
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Add Teacher</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
            </div>

            <div style="padding-top: 15px; padding-left:15px; padding-bottom:15px;" class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="name">FullName</label>
                        <input type="text" id="name" class="form-control" placeholder="FullName"
                            name="name"  value="{{old('name')}}">
                    </div>
                        @error('name')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="username">UserName</label>
                        <input type="text" id="username" class="form-control" placeholder="UserName"
                            name="username" value="{{old('username')}}">
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
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" placeholder="Mobile"
                         name="phone" value="{{old('phone')}}">
                    </div>
                        @error('phone')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" placeholder="Address" 
                        name="address" value="{{old('address')}}">
                    </div>
                        @error('address')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Add Teacher</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
            </div>
        </div>
        </div>
        <input type="hidden" id="role" class="form-control" placeholder="Role"
        name="role" value="1">
        <input type="hidden" id="password" class="form-control" placeholder="Password"
        name="password" value="teacher">
        </form>
    </div>
</div>
</table>
</div>
</div>

</section>
</div>
@endsection

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection