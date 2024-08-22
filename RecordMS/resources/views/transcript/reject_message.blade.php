@extends('admin.layout')

@section('content')
<div class="col-md-6 col-12 mx-auto">
    <div class="card">
        <form method="POST" action="/transcript/{{$transcripts->id}}" enctype="multipart/form-data"
            class="form form-vertical">
            @csrf
        @method('PUT')
        <div class="card-header">
        <h4 style="color:black;padding-right: 10px;" class="card-title">Student Information</h4>
        </div>
        <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal">
            <div class="form-body">
                <div class="row">
                <div class="col-md-4">
                    <label>LRN</label>
                </div>
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control" value="{{$transcripts->user_lrn}}">
                </div>
                <div class="col-md-4">
                    <label>FullName</label>
                </div>
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control" placeholder="First Name" value="{{$transcripts->user_lname}},  {{$transcripts->user_fname}} {{$transcripts->user_midname}}.">
                </div>
                <div class="col-md-4">
                    <label>Status</label>
                </div>
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control" value="{{$transcripts->status}}">
                </div>
                <div class="card-body">
                    <div class="form-group with-title mb-7">
                        <textarea class="form-control" name="message_reject" rows="3"></textarea>
                        <label>Message</label>
                    </div>
                </div>
                <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" name="status"  class="btn btn-primary me-1 mb-1" value="Rejected">Submit</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
                </div>
            </div>
            </form>
        </div>
        </div>
</div>
   
@endsection
{{-- <section class="section">
    <div  class="col-md-10 col-12 mx-auto">
            <div class="card">
                @foreach ($data as $transcripts)
                <div style="font-size:18px;color:black;padding-right: 10px;"class="card-header">
                   <b>{{$transcripts->user_lrn}}: {{$transcripts->user_lname}},
                         {{$transcripts->user_fname}} {{$transcripts->user_midname}}
                </div>
                <div style="color:black;padding-left: 28px;">
                    <b>Status: {{$transcripts->status}}
                 </div>
                @endforeach
                <form method="POST" action="/transcript/{{$transcripts->id}}" enctype="multipart/form-data"
                    class="form form-vertical">
                    @csrf
                @method('PUT')
                    <div class="card-body">
                        <div class="form-group with-title mb-7">
                            <textarea class="form-control" name="message_reject" id="message_reject" rows="3">{{$transcripts->message_reject}}</textarea>
                            <label>Message</label>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" name="status" class="btn btn-primary me-1 mb-1" value="Rejected">Submit</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </form>
            </div>
        </div>
</section> --}}