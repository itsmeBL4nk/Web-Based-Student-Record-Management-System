@extends('admin.layout')

@section('content')
<div class="col-md-6 col-12 mx-auto">
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Add Class</h4>
        </div>
        <div class="card-content">
        <div class="card-body">

            <form method="POST" action="/create_classes" enctype="multipart/form-data"
            class="form form-vertical">

            @csrf
            <div class="form-body">
                <div class="row">
                <div class="col-12">
                    <div class="form-group">
                    <label for="teacher_id">Teacher Name</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="teacher_id" name="teacher_id" value="{{old('teacher_id')}}">
                            <option selected disabled>Teacher</option>
                           @foreach ($teacher as $teacher)
                           <option value="{{$teacher->id}}">{{$teacher->name}}</option>   
                           @endforeach
                            
                        </select>
                    </fieldset>
                    </div>
                    @error('teacher_id')
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

                <div class="col-12">
                    <div class="form-group">
                    <label for="schoolyr_id">School Year</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="schoolyr_id" name="schoolyr_id" value="{{old('schoolyr_id')}}">
                            <option selected disabled>School Year</option>
                           @foreach ($schoolyear as $schoolyear)
                           <option value="{{$schoolyear->id}}">{{$schoolyear->schoolyear}}</option>   
                           @endforeach
                        </select>
                    </fieldset>
                    </div>
                    @error('schoolyr_id')
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