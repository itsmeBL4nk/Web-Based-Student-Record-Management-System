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
                <a href="#AddGradeLevelModal" class="btn btn-outline-primary" data-bs-toggle="modal">
                    <i data-feather="plus-square"></i>Add GradeLevel</a>
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
              <b>Grade Level</b>  
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                            <th style="border:1px solid #111010; border-collapse: collapse;">ID </th>
                            <th style="border:1px solid #111010; border-collapse: collapse;">Grade Level</th>
                            
                           
                            <th style="border:1px solid #111010; border-collapse: collapse;">Action</th>          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $gradelevel)
                                    
                                <tr style="border:1px solid #111010; border-collapse: collapse;">
                                    <td style="border:1px solid #111010; border-collapse: collapse;">
                                    {{$gradelevel->id}}</td>
                                    <td style="border:1px solid #111010; border-collapse: collapse;">
                                    {{$gradelevel->grade_lvl}}</td>
 
                                   <td style="border:1px solid #111010; border-collapse: collapse;"> <a href="/gradeLevel/{{$gradelevel->id}}/edit_gradelevel"
                                     class="btn icon btn-primary"><i data-feather="edit"></i></a>

                                     <a href="/delete_gradelevel/{{$gradelevel->id}}" 
                                        class="btn icon btn-danger" onclick="return confirm('Delete Grade Level?')">
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

{{--==================================================ADD GRADE LEVEL=================================================== --}}

<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="AddGradeLevelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/create_gradeLevel" enctype="multipart/form-data"
                class="form form-vertical">
    
                @csrf
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Add Grade Level</h4>
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
                        <label for="grade_lvl">Grade Level</label>
                        <fieldset class="form-group">
                            <select class="form-select"  id="grade_lvl" name="grade_lvl" value="{{old('grade_lvl')}}">
                                <option selected disabled>Grade Level</option>
                                <option value="11">11</option>
                               <option value="12">12</option>
                            </select>
                        </fieldset>
                        </div>
                        @error('grade_lvl')
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