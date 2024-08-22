@extends('admin.layout')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('content')

<div class="main-content container-fluid">
    <div class="main-content container-fluid">

        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6">
                    <x-flash-message/>
                    
                        <form method="POST" action="/import" enctype="multipart/form-data">
                        @csrf
                        @if (isset($errors) && $errors->any())
                        <div class="row">
                            <div class="col-md-8 col-md-offset-1">
                              <div class="alert alert-danger alert-dismissible">
                                  {{-- <h4 style="color:rgb(247, 247, 244)" ><i class="icon fa fa-ban"></i> Error!</h4>
                                  <p>Import Student Information Denied! Please check it again</p> --}}
                                  @foreach($errors->all() as $erroring)
                                  {{ $erroring }} <br>
                                  @endforeach      
                              </div>
                            </div>
                        </div>
                        @endif

                        {{-- <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf --}}
                        <input type="file" name="file" class="form-control">
                        <br>
                     <button class="btn btn-outline-primary"><i data-feather="upload"></i>Import</button>
                    @error('file')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                   
                      </form>
                </div>
                
                <div class="col-12 col-md-6">
                    <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><b>All Student Table</b> </li>
                        </ol>
                    </nav>
                </div>
            </div>
           
        </div>
        <div style="text-align:right; width:100%; padding:0;">
            <a href="#AddStudentModal" class="btn btn-outline-primary"
             data-bs-toggle="modal">
                <i data-feather="plus-square"></i>Add Student</a>

            {{-- <a class="btn btn-outline-info" href="{{ route('students.export') }}">
            <i data-feather="download"></i>Export</a> --}}
        </div>

    <section class="section">
        <div class="card">
            <div style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
                <b>Students</b>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                                
                                    <th>LRN</th>
                                    <th>Name</th>
                                    <th>Strand</th>
                                    <th>Grade& Section</th>
                                    <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $student)
                        <tr style="color: black">
                            <td >{{$student->lrn}}</td>
                            <td >{{$student->lname}}, {{$student->fname}} {{$student->mid_name}}.</td>
                            <td >{{$student->classes->strand->strand_name}}</td>
                            <td>{{$student->classes->gradelevel->grade_lvl}}-
                                {{ $student->classes->section->section_name}}</td>
                            <td>
                                {{-- <a href="/admin/{{$student->id}}/form137"
                                class="btn icon btn-info"><i data-feather="user"></i></a> --}}
                               <a href="/students/{{$student->id}}/edit_student"
                                   class="btn icon btn-primary"><i data-feather="edit"></i></a>
                           </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

     </section>
    </div>
</div>
{{--------------------------------------------ADD STUDENT--------------------------------------------------------}}
<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="AddStudentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/store_student" enctype="multipart/form-data"
        class="form form-vertical ">
        @csrf
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Add Student</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
            </div>
            <div style="padding-top: 15px; padding-left:15px; padding-bottom:15px;" class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="lrn">LRN</label>
                        <input type="text" id="lrn" class="form-control" placeholder="LRN"
                            name="lrn"  value="{{old('lrn')}}">
                    </div>
                        @error('lrn')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" class="form-control" placeholder="Last Name"
                            name="lname" value="{{old('lname')}}">
                    </div>
                        @error('lname')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" class="form-control" placeholder="First Name"
                            name="fname" value="{{old('fname')}}">
                    </div>
                        @error('fname')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="mid_name">Middle Name</label>
                        <input type="text" id="mid_name" class="form-control" placeholder="Middle Name"
                            name="mid_name" value="{{old('mid_name')}}">
                    </div>
                        @error('mid_name')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <fieldset class="form-group">
                            <select class="form-select"  id="gender" name="gender" value="{{old('gender')}}">
                                <option value="0">Please Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </fieldset>
                    </div>
                        @error('gender')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email"
                            placeholder="Email" value="{{old('email')}}">
                    </div>
                        @error('email')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>
                
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="phone_num">Mobile Phone</label>
                        <input type="text" id="phone_num" class="form-control" name="phone_num"
                            placeholder="Mobile Phone" value="{{old('phone_num')}}">
                    </div>
                        @error('phone_num')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" class="form-control" name="address"
                            placeholder="Address" value="{{old('address')}}">
                    </div>
                        @error('address')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="classes_id">Class</label>
                        <fieldset class="form-group">
                            <select class="form-select"  id="classes_id" name="classes_id" value="{{old('classes_id')}}">
                                <option selected disabled>Class</option>
                               @foreach ($classes as $classes)
                               <option value="{{$classes->id}}">{{$classes->teacher->name}}::{{$classes->gradelevel->grade_lvl}}
                                -{{$classes->strand->strand_name}}-{{$classes->section->section_name}}</option>   
                               @endforeach
                                
                            </select>
                        </fieldset>
                    </div>
                        @error('classes_id')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Add Student</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
            </div>
        </div>
        </div>
        <input type="hidden" id="role" class="form-control" placeholder="Role"
        name="role" value="0">
        <input type="hidden" id="password" class="form-control" placeholder="Password"
        name="password" value="name">
        {{-- <input type="hidden" id="qrtr_one" class="form-control" placeholder="qrtr_one"
        name="qrtr_one" value="0">
        <input type="hidden" id="qrtr_two" class="form-control" placeholder="qrtr_two"
        name="qrtr_two" value="0"> --}}
    </form>
    </div>
</div>

@endsection

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection