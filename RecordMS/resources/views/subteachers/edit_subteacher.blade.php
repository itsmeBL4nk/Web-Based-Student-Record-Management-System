@extends('admin.layout')

@section('content')

    <div class="row match-height">
        <div class="col-md-6 col-12 mx-auto">
            <x-flash-message/>
        <div class="card">
            <div style="background-color: #9bc6fd;"  class="card-header">
            <h4 style="font-size: 20px; color:black;" class="card-title"><a href="/subteachers/subteacher" style="height: 40px;
                font-size: 16px;color:black; " class="btn icon icon-left btn-success"><i data-feather="arrow-left"></i>
                    Back</a>&emsp;&emsp;&emsp;&emsp;Subject Teacher</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/subteachers/{{$subteacher->id}}" enctype="multipart/form-data"
                    class="form form-vertical">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="row">
                
                        <div class="col-12">
                            <div class="form-group">
                                <label for="sem">Semester</label>
                                <fieldset class="form-group">
                                    <select class="form-select" name="sem" >
                                        <option selected disabled>{{$subteacher->sem}}</option>
                                        <option value="1"{{$subteacher->sem == "1" ? 'selected' : ''}}>1</option>
                                        <option value="2"{{$subteacher->sem == "2" ? 'selected' : ''}}>2</option>
                                    </select>
                            </fieldset>
                            </div>
                            @error('sem')
                            <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="teacher_ID">Teacher</label>
                            <fieldset class="form-group">
                                <select class="form-select"  id="teacher_ID" name="teacher_ID" value="{{old('teacher_ID')}}">
                                    <option selected disabled>{{$subteacher->teacher->name}}</option>
                                    @foreach ($teacher as $teachers)
                                    @if($subteacher->teacher_ID == $teachers->id){
                                        <option value="{{$teachers->id}}"{{$teachers->id == $teachers->id  ? 'selected' : ''}}>{{$teachers->name}}</option>
                                    }
                                    @else{
                                        <option value="{{$teachers->id}}">{{$teachers->name}}</option>
                                    }
                                    @endif
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
                            <select class="form-select" name="subject_ID" value="{{old('subject_ID')}}">
                                <option selected disabled>{{$subteacher->subject->sub_name}}</option>
                                @foreach ($subject as $subjects)
                                    @if($subteacher->subject_ID == $subjects->id){
                                        <option value="{{$subjects->id}}"{{$subjects->id == $subjects->id  ? 'selected' : ''}}>{{$subjects->sub_name}}</option>
                                    }
                                    @else{
                                        <option value="{{$subjects->id}}">{{$subjects->sub_name}}</option>
                                    }
                                    @endif
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
                                    <option selected disabled>{{$subteacher->classes->class_code}}</option>
                                    @foreach ($classes as $subclasses)
                                    @if($subteacher->class_ID == $subclasses->id){
                                        <option value="{{$subclasses->id}}"{{$subclasses->id == $subclasses->id  ? 'selected' : ''}}>
                                        {{$subclasses->teacher->name}}--{{$subclasses->gradelevel->grade_lvl}}--{{$subclasses->strand->strand_name}}
                                    --{{$subclasses->section->section_name}}</option>
                                    }
                                    @else{
                                        <option value="{{$subclasses->id}}">{{$subclasses->teacher->name}}--{{$subclasses->gradelevel->grade_lvl}}
                                        --{{$subclasses->section->section_name}}--</option>
                                    }
                                    @endif
                                    @endforeach
                                   {{-- @foreach ($classes as $subclasses)
                                   <option selected disabled>{{$subclasses->class_code}}</option>
                                   <option value="{{$subclasses->id}}">{{$subclasses->class_code}}</option>   
                                   @endforeach --}}
                                </select>
                            </fieldset>
                        </div>
                    @error('class_ID')
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