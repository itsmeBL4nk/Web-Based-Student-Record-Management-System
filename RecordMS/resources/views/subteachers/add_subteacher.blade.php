@extends('admin.layout')

@section('content')
<div class="col-md-6 col-12 mx-auto">
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Add Subject Teacher</h4>
        </div>
        <div class="card-content">
        <div class="card-body">

            <form method="POST" action="/create_subteacher" enctype="multipart/form-data"
            class="form form-vertical">

            @csrf
            <div class="form-body">
                <div class="row">
                <div class="col-12">
                    <div class="form-group">
                    <label for="teachers_id">Teacher Name</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="teachers_id" name="teachers_id" value="{{old('teachers_id')}}">
                            <option selected disabled>Teacher</option>
                           @foreach ($teacher as $teacher)
                           <option value="{{$teacher->id}}">{{$teacher->name}}</option>   
                           @endforeach
                            
                        </select>
                    </fieldset>
                    </div>
                    @error('teachers_id')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-group">
                    <label for="strands_id">Strand</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="strands_id" name="strands_id" value="{{old('strands_id')}}">
                            <option selected disabled>Strand</option>
                           @foreach ($strand as $strand)
                           <option value="{{$strand->id}}">{{$strand->strand_name}}</option>   
                           @endforeach
                            
                        </select>
                    </fieldset>
                    </div>
                    @error('strands_id')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-group">
                    <label for="subjects_id">Subject</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="subjects_id" name="subjects_id" value="{{old('subjects_id')}}">
                            <option selected disabled>Subject</option>
                           @foreach ($subject as $subject)
                           <option value="{{$subject->id}}">{{$subject->sub_name}}</option>   
                           @endforeach
                        </select>
                    </fieldset>
                    </div>
                    @error('subjects_id')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="col-12">
                    <div class="form-group">
                    <label for="gradelevels_id">Grade Level</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="gradelevels_id" name="gradelevels_id" value="{{old('gradelevels_id')}}">
                            <option selected disabled>Grade Level</option>
                           @foreach ($gradelevel as $gradelevel)
                           <option value="{{$gradelevel->id}}">{{$gradelevel->grade_lvl}}</option>   
                           @endforeach
                            
                        </select>
                    </fieldset>
                    </div>
                    @error('gradelevels_id')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="sections_id">Section</label>
                        <fieldset class="form-group">
                            <select class="form-select"  id="sections_id" name="sections_id" value="{{old('sections_id')}}">
                                <option selected disabled>Section</option>
                               @foreach ($section as $section)
                               <option value="{{$section->id}}">{{$section->section_name}}</option>   
                               @endforeach
                                
                            </select>
                        </fieldset>
                        </div>
                        @error('sections_id')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                <div class="col-12">
                    <div class="form-group">
                    <label for="schoolyears_id">School Year</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="schoolyears_id" name="schoolyears_id" value="{{old('schoolyears_id')}}">
                            <option selected disabled>School Year</option>
                           @foreach ($schoolyear as $schoolyear)
                           <option value="{{$schoolyear->id}}">{{$schoolyear->schoolyear}}</option>   
                           @endforeach
                        </select>
                    </fieldset>
                    </div>
                    @error('schoolyears_id')
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