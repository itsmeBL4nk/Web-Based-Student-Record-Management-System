@extends('admin.layout')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('content')

<div class="main-content container-fluid">

    <div class="page-title">
        <div class="row">
            <div class="col-8 col-md-6">
                <x-flash-message/>
                <a href="#AddSubjectModal" class="btn btn-outline-primary" data-bs-toggle="modal">
                    <i data-feather="plus-square"></i>Add Subject</a>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View All Strand</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <section class="section">
        <div class="card">
            <div  style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
                <b>Subjects</b> 
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr  style="color: blue">
                            <th style="border:1px solid #111010; border-collapse: collapse;">ID</th>
                            <th style="border:1px solid #111010; border-collapse: collapse;">Subject Type</th>
                            <th style="border:1px solid #111010; border-collapse: collapse;">Subject Name</th>
                            <th style="border:1px solid #111010; border-collapse: collapse;">Action</th>

                                    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $subject)
                                    
                                <tr style="border:1px solid #111010; border-collapse: collapse;">

                                    <td style="border:1px solid #111010; border-collapse: collapse;">{{$subject->id}}</td>
                                    <td style="border:1px solid #111010; border-collapse: collapse;">{{$subject->sub_type}}</td>
                                    <td style="border:1px solid #111010; border-collapse: collapse;">{{$subject->sub_name}}</td>
                                    
                                    
                                   <td style="border:1px solid #111010; border-collapse: collapse;"> <a href="/subjects/{{$subject->id}}/edit_subject"
                                     class="btn icon btn-primary"><i data-feather="edit"></i></a>

                                     <a href="/delete_subject/{{$subject->id}}" 
                                        class="btn icon btn-danger" onclick="return confirm('Delete Subject?')">
                                        <i data-feather="trash-2"></i></a>
                                    </td>
                                    
                                </tr>
                                 @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
{{--==================================================ADD SUBJECT=================================================== --}}

<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="AddSubjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/create_subject" enctype="multipart/form-data"
                class="form form-vertical">
    
                @csrf
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Add Subject</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
            </div>

            <form method="POST" action="/create_gradeLevel" enctype="multipart/form-data"
                class="form form-vertical">
    
                @csrf
                
                <div style="padding-top: 15px;" class="form-body">
                    <div class="row">

                    <div class="col-12">
                            <div class="form-group">
                                <label for="sub_type">Subject Type</label>
                                <fieldset class="form-group">
                                    <select class="form-select" name="sub_type" >
                                        <option selected disabled>Subject Type</option>
                                        <option value="CORE">CORE</option>
                                        <option value="APPLIED">APPLIED</option>
                                        <option value="SPECIALIZED">SPECIALIZED</option>
                                    </select>
                                </fieldset>
                            </div>
                            @error('sub_type')
                            <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="sub_name">Subject Name</label>
                            <input type="text" id="sub_name" class="form-control" name="sub_name"
                                placeholder="Subject Name" value="{{old('sub_name')}}">
                            </div>
                            @error('sub_name')
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

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection