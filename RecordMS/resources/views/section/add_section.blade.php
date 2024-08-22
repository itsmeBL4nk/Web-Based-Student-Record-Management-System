@extends('admin.layout')

@section('content')

   
        <div class="col-md-6 col-12 mx-auto">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Add Section</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/create_section" enctype="multipart/form-data"
                class="form form-vertical">
    
                @csrf
                <div class="form-body">
                    <div class="row">
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

                    <div class="col-12">
                        <div class="form-group">
                        <label for="schoolyear_id">School Year</label>
                        <input type="text" id="schoolyear_id" class="form-control" name="schoolyear_id"
                            placeholder="School Year" value="{{old('schoolyear_id')}}">
                        </div>
                        @error('schoolyear_id')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                        <label for="strand_id">Strand</label>
                        <input type="text" id="strand_id" class="form-control" name="strand_id"
                            placeholder="Strand" value="{{old('strand_id')}}">
                        </div>
                        @error('strand_id')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                        <label for="gradelvl_id">Grade Level</label>
                        <input type="text" id="gradelvl_id" class="form-control" name="gradelvl_id"
                            placeholder="Grade Level" value="{{old('gradelvl_id')}}">
                        </div>
                        @error('gradelvl_id')
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