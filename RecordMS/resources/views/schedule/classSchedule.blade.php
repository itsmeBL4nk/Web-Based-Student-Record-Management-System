@extends('admin.layout')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('content')

<div class="main-content container-fluid">

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <x-flash-message/>
                <a href="#AddScheduleModal" class="btn btn-outline-primary"
                data-bs-toggle="modal">
                    <i data-feather="plus-square"></i>Add Schedule</a>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Schedule</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <section class="section">
        <div class="card">
            <div style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
               <b>Class Schedule</b> 
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                            <th>Room No.</th>
                            <th>Building</th>
                            <th>Days</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedule as $schedule)
                                    
                                <tr>
                                    <td>{{$schedule->room}}</td>
                                    <td>{{$schedule->building}}</td>
                                    <td>{{$schedule->day}}</td>
                                    
                                    <td>{{$schedule->timer}}</td>
                                        
                                        
                                    <td> <a href="/schedule/{{$schedule->id}}/edit_classSched"
                                     class="btn icon btn-primary"><i data-feather="edit"></i></a>
                                     <a href="/delete_schedule/{{$schedule->id}}" 
                                        class="btn icon btn-danger" onclick="return confirm('Delete Schedule?')">
                                        <i data-feather="trash-2"></i></a>
                                    </td>

                                
                                </tr>
                                 @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

{{--------------------------------------------ADD SCHEDULE--------------------------------------------------------}}
<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="AddScheduleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/create_schedule" enctype="multipart/form-data"
            class="form form-vertical">

            @csrf
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Add Schedule</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
            </div>
            <div style="padding-top: 15px;" class="row">

                <div class="col-12">
                        <div class="form-group">
                            <label for="room">Room</label>
                            <input type="text" id="room" class="form-control" placeholder="Room"
                                name="room"  value="{{old('room')}}">
                        </div>
                            @error('room')
                            <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="building">Building</label>
                            <input type="text" id="building" class="form-control" placeholder="Building"
                                name="building"  value="{{old('building')}}">
                        </div>
                            @error('building')
                            <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="timer">Time Slot</label>
                            <input type="text" id="timer" class="form-control" placeholder="Time Slot"
                                name="timer"  value="{{old('timer')}}">
                        </div>
                            @error('timer')
                            <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="day">Day</label>
                            <input type="text" id="day" class="form-control" placeholder="Day"
                                name="day"  value="{{old('day')}}">
                        </div>
                            @error('day')
                            <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                    </div>
                
                <div style="padding-top: 30px;" class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection