@extends('admin.layout')

@section('content')

    <div class="row match-height">
        <div class="col-md-6 col-12 mx-auto">
            <x-flash-message/>
        <div class="card">
            <div style="background-color: #9bc6fd;" class="card-header">
            <h4 style="font-size: 22px; color:black;" class="card-title"><a href="/schedule/classSchedule" style="height: 40px;
                font-size: 16px;color:black; " class="btn icon icon-left btn-success"><i data-feather="arrow-left"></i>
                    Back</a>&emsp;&emsp;&emsp;Edit Schedule</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/schedule/{{$schedule->id}}" enctype="multipart/form-data"
                    class="form form-vertical">
    
                @csrf

                @method('PUT')
                
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="room">Room No.</label>
                        <input type="text" class="form-control" name="room"
                        placeholder="Room No." value="{{$schedule->room}}">
                    </div>
                    @error('room')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                    <div class="col-12">
                        <div class="form-group">
                        <label for="building">Building</label>
                        <input type="text" id="" class="form-control" name="building"
                        placeholder="Building" value="{{$schedule->building}}">
                    </div>
                    @error('building')
                        <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="col-12">
                    <div class="form-group">
                    <label for="day">Day</label>
                    <input type="text" id="day" class="form-control" name="day"
                    placeholder="Day" value="{{$schedule->day}}">
                </div>
                @error('day')
                    <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                 </div>

                    <div class="col-12">
                        <div class="form-group">
                        <label for="timer">Timer</label>
                        <input type="text" id="timer" class="form-control" name="timer"
                        placeholder="Timer" value="{{$schedule->timer}}">
                    </div>
                    @error('timer')
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