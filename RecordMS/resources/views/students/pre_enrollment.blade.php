@extends('students.dashboard')

@section('student_content')

<section id="basic-vertical-layouts">
    
        <div class="col-md-6 col-12 mx-auto">
        <div class="card">
            <div  style="background-color: #9bc6fd;"  class="card-header">
                <x-flash-message/>
            <h4 style="font-size: 20px; color:black;" class="card-title">Pre-Enrollment Form</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form method="POST" action="/students/submit_enrollment" enctype="multipart/form-data"
                      class="form form-vertical ">
                     @csrf

                <form class="form form-vertical">
                <div class="form-body">

                    <div class="col-12">
                        <div class="form-group">
                        <label for="grade_lvl">Grade Level</label>
                        <fieldset class="form-group">
                            <select class="form-select"  id="grade_lvl" name="grade_lvl" value="{{old('grade_lvl')}}">
                                <option selected disabled>Grade Level</option>
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
                    <input type="hidden" class="form-control" placeholder="Password"
                    name="stud_id" value="{{auth()->user()->student_id}}">
                    <input type="hidden" class="form-control" placeholder="Password"
                    name="lrn" value="{{auth()->user()->lrn}}">
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section>
    
@endsection