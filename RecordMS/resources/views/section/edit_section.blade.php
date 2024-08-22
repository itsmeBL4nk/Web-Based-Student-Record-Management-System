@extends('admin.layout')

@section('content')

    <div class="row match-height">
        <div class="col-md-6 col-12 mx-auto">
            <x-flash-message/>
        <div class="card">
            <div style="background-color: #9bc6fd;" class="card-header">
           
                <h4 style="font-size: 22px; color:black;" class="card-title"><a href="/section/all_section" style="height: 40px;
                 font-size: 16px;color:black; " class="btn icon icon-left btn-success"><i data-feather="arrow-left"></i>
                     Back</a>&emsp;&emsp;&emsp;&emsp;Edit Strand</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/section/{{$section->id}}" enctype="multipart/form-data"
                    class="form form-vertical">
    
                @csrf

                @method('PUT')
                
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="section_name">Section</label>
                        <input type="text" id="section_name" class="form-control" name="section_name"
                        placeholder="Section" value="{{$section->section_name}}">
                    </div>
                    @error('section_name')
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