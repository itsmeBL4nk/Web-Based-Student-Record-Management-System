@extends('admin.layout')

@section('content')

    <div class="row match-height">
        <div class="col-md-6 col-12 mx-auto">
            <x-flash-message/>
        <div class="card">
            <div style="background-color: #9bc6fd;" class="card-header">
                    <h4 style="font-size: 22px; color:black;" class="card-title"><a href="/school/schoolyear" style="height: 40px;
                     font-size: 16px;color:black; " class="btn icon icon-left btn-success"><i data-feather="arrow-left"></i>
                     Back</a>&emsp;&emsp;&emsp;&emsp;Edit School Year</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/school/{{$schoolyear->id}}" enctype="multipart/form-data"
                    class="form form-vertical">
    
                @csrf

                @method('PUT')
                
                <div class="form-body">
                    <div class="row">
                    
                    <div class="col-12">
                        <div class="form-group">
                        <label for="schoolyear">School Year</label>
                        <input type="text" id="schoolyear" class="form-control" name="schoolyear"
                            placeholder="School Year" value="{{$schoolyear->schoolyear}}">
                        </div>
                        @error('schoolyear')
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