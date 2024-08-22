@extends('admin.layout')

@section('content')

<div class="col-md-6 col-12 mx-auto">
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Add Schedule</h4>
        </div>
        <div class="card-content">
        <div class="card-body">

            <form method="POST" action="/create_schedule" enctype="multipart/form-data"
            class="form form-vertical">

            @csrf
            <div class="form-body">
                <div class="row">
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
                
            <div class="form-body">
                <div class="row">
                <div class="col-12">
                    <div class="form-group">
                    <label for="subject_id">Subject Name</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="subject_id" name="subject_id" value="{{old('subject_id')}}">
                            <option selected disabled>Subject</option>
                           @foreach ($subject as $subject)
                           <option value="{{$subject->id}}">{{$subject->sub_name}}</option>   
                           @endforeach
                        </select>
                    </fieldset>
                    </div>
                    @error('subject_id')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

            <div class="form-body">
                <div class="row">
                <div class="col-12">
                    <div class="form-group">
                    <label for="room_id">Room</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="room_id" name="room_id" value="{{old('room_id')}}">
                            <option selected disabled>Room</option>
                           @foreach ($room as $room)
                           <option value="{{$room->id}}">{{$room->room_no}}-{{$room->bldg_name}}</option>   
                           @endforeach
                        </select>
                    </fieldset>
                    </div>
                    @error('room_id')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-group">
                    <label for="timer_id">Time Slot</label>
                    <fieldset class="form-group">
                        <select class="form-select"  id="timer_id" name="timer_id" value="{{old('timer_id')}}">
                            <option selected disabled>Time Slot </option>
                           @foreach ($timer as $timer)
                           <option value="{{$timer->id}}">{{$timer->time_start}}-{{$timer->time_end}}</option>   
                           @endforeach
                        </select>
                    </fieldset>
                    </div>
                    @error('timer_id')
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