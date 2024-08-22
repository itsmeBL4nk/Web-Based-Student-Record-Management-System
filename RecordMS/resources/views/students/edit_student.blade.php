@extends('admin.layout')

@section('content')

<div class="row match-height">
    <div class="col-md-8 col-12 mx-auto ">
        <x-flash-message/>
        <div class="card">
            <div style="background-color: #9bc6fd;" class="card-header">
            <h4 style="font-size: 20px; color:black;" class="card-title"><a href="/students/all_student" style="height: 40px;
                font-size: 16px;color:black; " class="btn icon icon-left btn-success"><i data-feather="arrow-left"></i>
                    Back</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Edit Student Information</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                
                <form method="POST" action="/students/{{$student->id}}" enctype="multipart/form-data"
                    class="form form-vertical">
                    @csrf

                    @method('PUT')
                <div class="form-body">
                    <div class="row">
                        
                        <div class="col-md-6 col-12">
                                <label for="lrn">LRN</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="User LRN"
                                    name="lrn" value="{{$student->lrn}}">
                                </div>
                        </div>
                            @error('lrn')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        <div class="col-md-6 col-12">
                                <label for="lname">Last Name</label>
                            <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name"
                                    name="lname" value="{{$student->lname}}">
                                </div>
                            
                            @error('lname')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        </div>
                    
                        <div class="col-md-6 col-12">
                                <label for="fname">First Name</label>
                            <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name"
                                    name="fname" value="{{$student->fname}}">
                            </div>

                            @error('fname')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        </div>

                        <div class="col-md-6 col-12">
                                <label for="mid_name">Middle Name</label>
                            <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Middle Name"
                                    name="mid_name" value="{{$student->mid_name}}">
                            </div>
                                @error('mid_name')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        </div>

                        <div class="col-md-6 col-12">
                                <label for="gender">Gender</label>
                            <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Gender"
                                    name="gender" value="{{$student->gender}}">
                            </div>
                            @error('gender')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        </div>
                    
                    <div class="col-md-6 col-12">
                            <label for="email">Email</label>
                        <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email" 
                                name="email" value="{{$student->email}}">
                        </div>
                        @error('email')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-md-6 col-12">
                            <label for="phone_num">Mobile</label>
                        <div class="form-group">
                                <input type="text" class="form-control" placeholder="Mobile" 
                                name="phone_num" value="{{$student->phone_num}}">
                        </div>
                        @error('phone')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 col-12">
                            <label for="address">Address</label>
                        <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address" 
                                name="address" value="{{$student->address}}">
                        </div>
                        @error('address')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group has-icon-left">
                            <label for="classes_id">Class</label>
                            <fieldset class="form-group">
                                <select class="form-select"  id="classes_id" name="classes_id" value="{{old('classes_id')}}">
                                    <option selected disabled>{{$student->classes->gradelevel->grade_lvl}}--
                                        {{$student->classes->section->section_name}}--
                                        {{$student->classes->strand->strand_name}}</option>
                                        @foreach ($classes as $classA)
                                            @if($student->classes_id == $classA->id){
                                                <option value="{{$classA->id}}"{{$classA->id == $classA->id  ? 'selected' : ''}}>{{$classA->teacher->name}}:: {{$classA->gradelevel->grade_lvl}}
                                                    --{{$classA->section->section_name}}--{{$classA->strand->strand_name}}</option>
                                            }
                                            @else{
                                                <option value="{{$classA->id}}">{{$classA->teacher->name}}:: {{$classA->gradelevel->grade_lvl}}
                                                    --{{$classA->section->section_name}}--{{$classA->strand->strand_name}}</option>
                                            }
                                            @endif
                                        @endforeach
                                </select>
                            </fieldset>
                        </div>
                        @error('classes_id')
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
</div>
    @endsection