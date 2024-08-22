@extends('admin.layout')

@section('content')
        <div class="col-md-4 col-12 mx-auto">
        <div class="card">
            <div class="card-header">
                
            <h4 class="card-title">Add Grade Level</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/create_gradeLevel" enctype="multipart/form-data"
                class="form form-vertical">
    
                @csrf
                
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="grade_lvl">Grade Level</label>
                        <input type="text" id="grade_lvl" class="form-control" name="grade_lvl"
                            placeholder="Grade Level" value="{{old('grade_lvl')}}">
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