@extends('admin.layout')

@section('content')

   
        <div class="col-md-6 col-12 mx-auto">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Add Subject</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/create_subject" enctype="multipart/form-data"
                class="form form-vertical">
    
                @csrf
                <div class="form-body">
                    <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                        <label for="sub_type">Subject Type</label>
                        <input type="text" id="" class="form-control" name="sub_type"
                            placeholder="Subject Type" value="{{old('sub_type')}}">
                        </div>
                        @error('sub_type')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                        <label for="sub_name">Subject Name</label>
                        <input type="text" id="sub_name" class="form-control" name="sub_name"
                            placeholder="Subject Name" value="{{old('sub_name')}}">
                        </div>
                        @error('sub_name')
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