@extends('admin.layout')

@section('content')

    <div class="row match-height">
        <div class="col-md-8 col-12 mx-auto">
            <x-flash-message/>
        <div class="card">
            <div style="background-color: #9bc6fd;" class="card-header">
            <h4 style="font-size: 20px; color:black;"class="card-title"><a href="/classType/classes" style="height: 40px;
                font-size: 16px;color:black; " class="btn icon icon-left btn-success"><i data-feather="arrow-left"></i>
                    Back</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Edit Classes</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/classType/{{$classes->id}}">
    
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                            <label for="class_code">Class Code</label>
                            <input type="text" class="form-control" name="class_code"
                            placeholder="Class Code" value="{{$classes->class_code}}">
                            </div>
                        @error('class_code')
                            <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="teach_id">Teacher Name</label>
                            <fieldset class="form-group">
                                <select class="form-select" name="teach_id">
                                        <option selected disabled>{{$classes->teacher->name}}</option>
                                        @foreach ($teacher as $teachers)
                                            @if($classes->teach_id == $teachers->id){
                                                <option value="{{$teachers->id}}"{{$teachers->id == $teachers->id  ? 'selected' : ''}}>{{$teachers->name}}</option>
                                            }
                                            @else{
                                                <option value="{{$teachers->id}}">{{$teachers->name}}</option>
                                            }
                                            @endif
                                        @endforeach
                                </select>
                            </fieldset>
                            </select>
                            
                        </div>
                            @error('teach_id')
                            <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                        <label for="gradelevel_id">Grade Level</label>
                        <fieldset class="form-group">
                            <select class="form-select" id="gradelevel_id" name="gradelevel_id" value="{{old('gradelevel_id')}}">
                                    <option selected disabled>{{$classes->gradelevel->grade_lvl}}</option>
                                    @foreach ($gradelevel as $gradelevels)
                                            @if($classes->gradelevel_id == $gradelevels->id){
                                                <option value="{{$gradelevels->id}}"{{$gradelevels->id == $gradelevels->id  ? 'selected' : ''}}>{{$gradelevels->grade_lvl}}</option>
                                            }
                                            @else{
                                                <option value="{{$gradelevels->id}}">{{$gradelevels->grade_lvl}}</option>
                                            }
                                            @endif
                                    @endforeach
                            </select>
                        </fieldset>
                    </div>
                    @error('gradelevel_id')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-md-6 col-12">
                        <div class="form-group">
                        <label for="strand_id">Strand</label>
                        <fieldset class="form-group">
                            <select class="form-select" id="strand_id" name="strand_id" value="{{old('strand_id')}}">
                                    <option selected disabled>{{$classes->strand->strand_name}}</option>
                                    @foreach ($strand as $strands)
                                            @if($classes->strand_id == $strands->id){
                                                <option value="{{$strands->id}}"{{$strands->id == $strands->id  ? 'selected' : ''}}>{{$strands->strand_name}}</option>
                                            }
                                            @else{
                                                <option value="{{$strands->id}}">{{$strands->strand_name}}</option>
                                            }
                                            @endif
                                    @endforeach
                            </select>
                        </fieldset>
                        </div>
                        @error('strand_id')
                        <p class=" invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                        <label for="section_id">Section</label>
                        <fieldset class="form-group">
                            <select class="form-select" id="section_id" name="section_id" value="{{old('section_id')}}">
                                <option selected disabled>{{$classes->section->section_name}}</option>
                                @foreach ($section as $sections)
                                @if($classes->section_id == $sections->id){
                                    <option value="{{$sections->id}}"{{$sections->id == $sections->id  ? 'selected' : ''}}>{{$sections->section_name}}</option>
                                }
                                @else{
                                    <option value="{{$sections->id}}">{{$sections->section_name}}</option>
                                }
                                @endif
                        @endforeach
                            </select>
                        </fieldset>
                        </div>
                        @error('section_id')
                        <p class=" invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                        <label for="schoolyr_id">School Year</label>
                        <fieldset class="form-group">
                            <select class="form-select" id="schoolyr_id" name="schoolyr_id" value="{{old('schoolyr_id')}}">
                                <option selected disabled>{{$classes->schoolyear->schoolyear}}</option>
                                @foreach ($schoolyear as $schoolyears)
                                    @if($classes->schoolyr_id == $schoolyears->id){
                                        <option value="{{$schoolyears->id}}"{{$schoolyears->id == $schoolyears->id  ? 'selected' : ''}}>{{$schoolyears->schoolyear}}</option>
                                    }
                                    @else{
                                        <option value="{{$schoolyears->id}}">{{$schoolyears->schoolyear}}</option>
                                    }
                                    @endif
                                @endforeach
                            </select>
                        </fieldset>
                        </div>
                        @error('schoolyr_id')
                        <p class=" invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
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