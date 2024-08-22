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
                <a href="#AddSectionModal" class="btn btn-outline-primary"
                data-bs-toggle="modal">
                    <i data-feather="plus-square"></i>Add Section</a>
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
            <div style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
               <b>All Section</b> 
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                            <th>ID </th>
                            <th>Section </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($section as $section)
                                    
                                <tr>
                                    <td>{{$section->id}}</td>
                                    <td>{{$section->section_name}}</td>

                                    <td> <a href="/section/{{$section->id}}/edit_section"
                                     class="btn icon btn-primary"><i data-feather="edit"></i></a>

                                     <a href="/delete_section/{{$section->id}}" 
                                        class="btn icon btn-danger" onclick="return confirm('Delete Section?')">
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

{{--------------------------------------------ADD SECTION--------------------------------------------------------}}
<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="AddSectionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/create_section" enctype="multipart/form-data"
                class="form form-vertical">
    
                @csrf
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Add Section</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
            </div>
            <div style="padding-top: 15px;" class="row">
                
                <div class="col-12">
                    <div class="form-group">
                        <label for="section_name">Section Name</label>
                        <input type="text" id="section_name" class="form-control" name="section_name"
                            placeholder="Section Name" value="{{old('section_name')}}">
                        </div>
                        @error('section_name')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>
                
                
                <div class="col-12 d-flex justify-content-end">
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