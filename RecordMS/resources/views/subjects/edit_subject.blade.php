@extends('admin.layout')

@section('content')

   <div class="col-md-6 col-12 mx-auto">
            <x-flash-message/>
        <div class="card">
            <div style="background-color: #9bc6fd;" class="card-header">
            <h4 style="font-size: 22px; color:black;" class="card-title"><a href="/subjects/all_subject" style="height: 40px;
                font-size: 16px;color:black; " class="btn icon icon-left btn-success"><i data-feather="arrow-left"></i>
                    Back</a>&emsp;&emsp;&emsp;&emsp;&emsp;Edit Subject</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/subjects/{{$subject->id}}" enctype="multipart/form-data"
                    class="form form-vertical">
    
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="row">
                        
                        <div class="col-12">
                            <div class="form-group">
                            <label for="sub_type">Subject Type</label>
                                <fieldset class="form-group">
                                        <select class="form-select" name="sub_type" >
                                            <option selected disabled>{{$subject->sub_type}}</option>
                                            <option value="APPLIED"{{$subject->sub_type == "APPLIED" ? 'selected' : ''}}>APPLIED</option>
                                            <option value="CORE"{{$subject->sub_type == "CORE" ? 'selected' : ''}}>CORE</option>
                                            <option value="SPECIALIZED"{{$subject->sub_type == "SPECIALIZED" ? 'selected' : ''}}>SPECIALIZED</option>
                                        </select>
                                </fieldset>
                            </div>
                            @error('sub_type')
                            <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                    <div class="col-12">
                        <div class="form-group">
                        <label for="sub_name">Subject Name</label>
                        <input type="text" id="sub_name" class="form-control" name="sub_name"
                            placeholder="Subject Name" value="{{$subject->sub_name}}">
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