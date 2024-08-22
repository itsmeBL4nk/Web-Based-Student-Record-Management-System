@extends('admin.layout')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('content')

<div class="main-content container-fluid">

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <x-flash-message/>
                <a href="#AddSubTeacherModal" class="btn btn-outline-primary"
                data-bs-toggle="modal">
                    <i data-feather="plus-square"></i>Subject Teacher</a>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View All Schedule</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div style="background-color: #9bc6fd;font-size: 16px; color:black"  class="card-header">
               <b>Subject Teacher</b> 
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                            <th>ID </th>
                            <th>Teacher</th>
                            <th>Subject</th>
                            <th>Class Code</th>
                            <th>Sem</th>
                            <th>S/Y </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subteacher as $subteacher)
                               <tr>
                                    <td>{{$subteacher->id}}</td>
                                    <td>{{$subteacher->teacher->name}}</td>
                                    <td>{{$subteacher->subject->sub_name}}</td>
                                    <td>{{$subteacher->classes->class_code}}
                                    <td>{{$subteacher->sem}}
                                    <td>{{$subteacher->classes->schoolyear->schoolyear}}</td>
                                    
                                    <td> <a href="/subteachers/{{$subteacher->id}}/edit_subteacher"
                                     class="btn icon btn-primary"><i data-feather="edit"></i></a>

                                     <a href="/delete_subteacher/{{$subteacher->id}}" 
                                        class="btn icon btn-danger" onclick="return confirm('Delete Subject Teacher?')">
                                        <i data-feather="trash-2"></i></a>
                                     

                                    </td>

                                    {{-- <td style="border:1px solid #111010; border-collapse: collapse;"><a href="/cancel_request/{{$section->id}}" 
                                        class="btn icon btn-danger" onclick="return confirm('Are you sure to cancel your request?')">
                                        <i data-feather="trash-2"></i></a></td> --}}
                                </tr>
                                 @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

{{--------------------------------------------ADD SUBJECT TEACHER--------------------------------------------------------}}
<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="AddSubTeacherModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/create_subteacher" enctype="multipart/form-data"
            class="form form-vertical">

            @csrf
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Add Subject Teacher</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
            </div>
            <div style="padding-top: 15px;" class="row">

                <div class="col-12">
                    <div class="form-group">
                    <label for="sem">Semester</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="sem" name="sem" value="{{old('sem')}}">
                            <option selected disabled>Semester</option>
                           <option value="1">1</option>
                           <option value="2">2</option>   
                        </select>
                    </fieldset>
                    </div>
                    @error('sem')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                    <label for="teacher_ID">Teacher Name</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="teacher_ID" name="teacher_ID" value="{{old('teacher_ID')}}">
                            <option selected disabled>Teacher Name</option>
                           @foreach ($teacher as $subjectteacher)
                           <option value="{{$subjectteacher->id}}">{{$subjectteacher->name}}</option>   
                           @endforeach
                        </select>
                    </fieldset>
                    </div>
                    @error('teacher_ID')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                    <label for="subject_ID">Subject</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="subject_ID" name="subject_ID" value="{{old('subject_ID')}}">
                            <option selected disabled>Subject</option>
                           @foreach ($subject as $subjectTeacher)
                           <option value="{{$subjectTeacher->id}}">{{$subjectTeacher->sub_name}}</option>   
                           @endforeach
                        </select>
                    </fieldset>
                    </div>
                    @error('subject_ID')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                    <label for="class_ID">Class</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="class_ID" name="class_ID" value="{{old('class_ID')}}">
                            <option selected disabled>Class</option>
                           @foreach ($classes as $classSubject)
                           <option value="{{$classSubject->id}}">{{$classSubject->teacher->name}}:: {{$classSubject->gradelevel->grade_lvl}}
                            -{{$classSubject->strand->strand_name}}-{{$classSubject->section->section_name}}</option>   
                           @endforeach
                            
                        </select>
                    </fieldset>
                    </div>
                    @error('class_ID')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                
                <div style="padding-top: 30px;" class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>

@endsection

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection