@extends('admin.layout')

@section('content')

    <div class="row match-height">
        <div class="col-md-6 col-12 mx-auto">
            <x-flash-message/>
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Edit Semester</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/semesters/{{$semester->id}}" enctype="multipart/form-data"
                    class="form form-vertical">
    
                @csrf

                @method('PUT')
                
                <div class="form-body">
                    <div class="row">
                    
                    <div class="col-12">
                        <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="text" id="semester" class="form-control" name="semester"
                            placeholder="Semester" value="{{$semester->semester}}">
                        </div>
                        @error('semester')
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