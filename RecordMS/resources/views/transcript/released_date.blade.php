@extends('admin.layout')

@section('content')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<div class="col-md-8 col-12 mx-auto">
    <div class="card">
        <form method="POST" action="/transcript/{{$transcript->id}}" enctype="multipart/form-data"
            class="form form-vertical">
            @csrf
        @method('PUT')
        <div style="background-color: #9bc6fd;"class="card-header">
        <h4 style="color:black;padding-right: 10px; " class="card-title"><a href="/admin/show_request" style="height: 40px;
            font-size: 16px;color:black; " class="btn icon icon-left btn-success"><i data-feather="arrow-left"></i>
                Back</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Student Information</h4>
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
                    <input type="text" class="form-control" value="{{$transcript->user_lrn}}">
                </div>
                <div class="col-md-4">
                    <label>FullName</label>
                </div>
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control" placeholder="First Name" value="{{$transcript->user_lname}},  {{$transcript->user_fname}} {{$transcript->user_midname}}.">
                </div>
                <div class="col-md-4">
                    <label>Status</label>
                </div>
                <div class="col-md-8 form-group">
                    <input type="text" class="form-control" value="{{$transcript->status}}">
                </div>
                
                <div class="col-md-4">
                    <label>Released Date</label>
                </div>
                <div class="col-md-8 form-group">
                    {{-- <input type="date" name="released_date" class="form-control" value="{{$transcript->released_date}}"> --}}
                    <input id="date_picker" type="date" name="released_date" class="form-control" value="{{$transcript->released_date}}">
                    @error('released_date')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                {{-- <ul class="list-unstyled mb-0">
                    <li class="d-inline-block me-2 mb-1">
                        <div class='form-check'>
                            <div class="checkbox">
                                <input type="checkbox" class='form-check-input form-check-success'
                                 name="status" id="status" value="Approved">
                                <label for="checkbox2">Approve</label>
                            </div>
                        </div>
                    </li>
                    <li class="d-inline-block me-2 mb-1">
                        <div class='form-check'>
                            <div class="checkbox">
                                <input type="checkbox" class='form-check-input form-check-success'
                                name="status" id="status" value="Rejected">
                                <label for="checkbox2">Reject</label>
                            </div>
                        </div>
                    </li>
                </ul> --}}
                
                {{-- <textarea class="form-control" rows="1">{{$transcript->other_reason}}</textarea> --}}
                <div class="card-body">
                    <div class="form-group with-title mb-7">
                        <textarea class="form-control" rows="1">{{$transcript->reason}}</textarea>
                        <label>Student reason for requesting Transcript of Record</label>
                    </div>
                    <div class="form-group with-title mb-7">
                        <textarea class="form-control" rows="1">{{$transcript->other_reason}}</textarea>
                        <label>Other Reason::</label>
                    </div>
                    {{--<div class="form-group with-title mb-7">
                        <textarea class="form-control" name="message_reject" id="message_reject" rows="3">{{$transcript->message_reject}}</textarea>
                        <label>Reason for rejecting the request</label>
                        @error('message_reject')
                        <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div> --}}
                </div>
                
                <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit"  name="status" class="btn btn-primary me-1 mb-1" value="Approved" >Accept</button>
                    {{-- <button type="submit"  class="btn btn-danger me-1 mb-1" >Reject</button> --}}
                    <a href="#reject" class="btn btn-danger me-1 mb-1" data-bs-toggle="modal" >Reject</a>
                    {{-- <a href="#" class="btn btn-danger">Danger</a> --}}
                </div>
                </div>
            </div>
            </form>
         </div>
        </div>
{{--==================================================ADD STRAND=================================================== --}}

<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="reject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/transcript/{{$transcript->id}}" enctype="multipart/form-data"
            class="form form-vertical">
            @csrf
        @method('PUT')
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Message</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
            </div>
                <div style="padding-top: 15px;" class="form-body">
                    <div class="row">

                    <div class="col-12">

                        <div class="form-group with-title mb-7">
                            <textarea class="form-control" name="message_reject" id="message_reject" rows="3">{{$transcript->message_reject}}</textarea>
                            <label>Reason for rejecting the request</label>
                            @error('message_reject')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    
                    <div class="col-12 d-flex justify-content-end">
                        <button name="status" type="submit" class="btn btn-primary me-1 mb-1" value="Rejected">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
        </form>
</div>
        
    </form>
</div>

<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date_picker').attr('min',today);
</script>

   
@endsection