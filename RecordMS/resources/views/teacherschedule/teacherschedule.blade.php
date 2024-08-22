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
                <a href="#AddTeacherScheduleModal" class="btn btn-outline-primary"
                data-bs-toggle="modal">
                    <i data-feather="plus-square"></i>Add TeacherSchedule</a>
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
               <b>Teacher Schedule</b> 
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                            <th>Teacher</th>
                            <th>Days</th>
                            <th>Room&Building</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teacherschedule as $teacherschedule)
                                    
                                <tr>
                                    <td>{{$teacherschedule->teacher->name}}</td>
                                    <td>{{$teacherschedule->schedule->day}}</td>
                                    <td>{{$teacherschedule->schedule->room}}-
                                        {{$teacherschedule->schedule->building}}</td>
                                    <td>{{$teacherschedule->schedule->timer}}</td>
                                        
                                        
                                    <td> <a href="/teacherschedule/{{$teacherschedule->id}}/edit_teacherschedule"
                                     class="btn icon btn-primary"><i data-feather="edit"></i></a>
                                     <a href="/delete_schedule/{{$teacherschedule->id}}" 
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
    
    <div class="modal fade text-left" id="AddTeacherScheduleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/create_teacherschedule" enctype="multipart/form-data"
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
                    <label for="techr_id">Teacher Name</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="techr_id" name="techr_id" value="{{old('techr_id')}}">
                            <option selected disabled>Teacher Name</option>
                           @foreach ($teacher as $teacher)
                           <option value="{{$teacher->id}}">{{$teacher->name}}</option>   
                           @endforeach
                        </select>
                    </fieldset>
                    </div>
                    @error('techr_id')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

               
                    <div class="col-12">
                        <div class="form-group">
                        <label for="schedule_id">Schedule</label>
                        <fieldset class="form-group">
                            <select class="form-select"  id="schedule_id" name="schedule_id" value="{{old('schedule_id')}}">
                                <option selected disabled>Schedule</option>
                               @foreach ($schedule as $schedule)
                               <option value="{{$schedule->id}}">{{$schedule->room}}-{{$schedule->building}}-{{$schedule->day}}
                            -{{$schedule->timer}}</option>   
                               @endforeach
                            </select>
                        </fieldset>
                        </div>
                        @error('schedule_id')
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