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
                <a href="#AddClassModal" class="btn btn-outline-primary"
                data-bs-toggle="modal">
                    <i data-feather="plus-square"></i>Add Class</a>
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
            <div style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
                <b>Classes</b> 
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                            <th>ID </th>
                            <th>Class Code</th>
                            <th>Teacher</th>
                            <th>Grade&Strand</th>
                            <th>Section</th>
                            <th>S/Y </th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $classes)
                                <tr>
                                    <td>{{$classes->id}}</td>
                                    <td>{{$classes->class_code}}</td>
                                    <td>{{$classes->teacher->name}}</td>
                                    <td>{{$classes->gradelevel->grade_lvl}}-{{$classes->strand->strand_name}}</td>
                                    <td>{{$classes->section->section_name}}</td>
                                    <td>{{$classes->schoolyear->schoolyear}}</td>
                                    <td> <a href="/classType/{{$classes->id}}/edit_class"
                                     class="btn icon btn-primary"><i data-feather="edit"></i></a>

                                     <a href="/delete_class/{{$classes->id}}" 
                                        class="btn icon btn-danger" onclick="return confirm('Delete Class?')">
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
{{--------------------------------------------ADD CLASS-------------------------------------------------------}}
<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="AddClassModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/create_classes" enctype="multipart/form-data"
            class="form form-vertical">

            @csrf
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Add Class</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
            </div>
            <div style="padding-top: 15px;" class="row">

                <div class="col-12">
                    <div class="form-group">
                        <label for="class_code">Class Code</label>
                        <input type="text" id="class_code" class="form-control" placeholder="Class Code"
                            name="class_code"  value="{{old('class_code')}}">
                    </div>
                        @error('class_code')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                    <label for="teach_id">Teacher Name</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="teach_id" name="teach_id" value="{{old('teach_id')}}">
                            <option selected disabled>Teacher</option>
                           @foreach ($teacher as $teachers)
                           <option value="{{$teachers->id}}">{{$teachers->name}}</option>   
                           @endforeach
                            
                        </select>
                    </fieldset>
                    </div>
                    @error('teach_id')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-group">
                    <label for="gradelevel_id">Grade Level</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="gradelevel_id" name="gradelevel_id" value="{{old('gradelevel_id')}}">
                            <option selected disabled>Grade Level</option>
                           @foreach ($gradelevel as $gradelevel)
                           <option value="{{$gradelevel->id}}">{{$gradelevel->grade_lvl}}</option>   
                           @endforeach
                            
                        </select>
                    </fieldset>
                    </div>
                    @error('gradelevel_id')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-group">
                    <label for="strand_id">Strand</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="strand_id" name="strand_id" value="{{old('strand_id')}}">
                            <option selected disabled>Strand</option>
                           @foreach ($strand as $strand)
                           <option value="{{$strand->id}}">{{$strand->strand_name}}</option>   
                           @endforeach
                            
                        </select>
                    </fieldset>
                    </div>
                    @error('strand_id')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                    <label for="section_id">Section</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="section_id" name="section_id" value="{{old('section_id')}}">
                            <option selected disabled>Section</option>
                           @foreach ($section as $section)
                           <option value="{{$section->id}}">{{$section->section_name}}</option>   
                           @endforeach
                        </select>
                    </fieldset>
                    </div>
                    @error('section_id')
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
        <input type="hidden" id="schoolyr_id" class="form-control" placeholder="School Year"
        name="schoolyr_id" value="1">
        </form>
    </div>
    </div>

@endsection

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection