@extends('admin.layout')

@section('content')

<x-flash-message/>
        <div class="col-md-4 col-12 mx-auto">
        <div class="card">
            <div class="card-header">
                
            <h4 class="card-title">Add School Year</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/create_schoolyear" enctype="multipart/form-data"
                class="form form-vertical">
    
                @csrf
                
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="schoolyear">School Year</label>
                        <input type="text" id="schoolyear" class="form-control" name="schoolyear"
                            placeholder="School Year" value="{{old('schoolyear')}}">
                        </div>
                        @error('schoolyear')
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