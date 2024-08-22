@extends('teachers.teacher_dashboard')

 @section('teacher_content')
<div class="col-md-8 col-12 mx-auto">
    <x-flash-message/>
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Edit Grades</h4>
        </div>
        <div class="card-content">
        <div class="card-body">
            <form method="POST" action="/grades/{{$grade->id}}" enctype="multipart/form-data"
            class="form form-vertical">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="row">

                <div class="col-12">
                            <label for="lrn">LRN</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="lrn" 
                                name="lrn" value="{{$grade->lrn}}">
                            </div>
                            @error('lrn')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    </div>

                <div class="col-12">
                        <label for="lastName">LastName</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="lastName"
                             name="lastName" value="{{$grade->lastName}}">
                        </div>
                    @error('lastName')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="col-12">
                    <label for="firstName">FirstName</label>
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="firstName"
                         name="firstName" value="{{$grade->firstName}}">
                    </div>
                @error('firstName')
                <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

                <div class="col-12">
                    
                        <label for="subject">Subject</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="subject" 
                            name="subject" value="{{$grade->subject}}">
                        </div>
                    </div>
                    @error('subject')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                        <label for="sub_type">Subject Type</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Subject Type" 
                            name="sub_type" value="{{$grade->sub_type}}">
                        </div>
                    @error('sub_type')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                
                <div class="col-12">
                        <label for="qrtr_one">First Quarter</label>
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="1st" 
                            name="qrtr_one" value="{{$grade->qrtr_one}}">
                        </div>
                    @error('qrtr_one')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="qrtr_two">Second Quarter</label>
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="1st" 
                        name="qrtr_two" value="{{$grade->qrtr_two}}">
                    </div>
                @error('qrtr_two')
                <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="col-12">
                <label for="finals">Final</label>
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="1st" 
                    name="finals" value="{{$grade->finals}}">
                </div>
            @error('finals')
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

 