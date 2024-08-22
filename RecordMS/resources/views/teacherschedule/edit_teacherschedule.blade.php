@extends('admin.layout')

@section('content')

    <div class="row match-height">
        <div class="col-md-8 col-12 mx-auto">
            <x-flash-message/>
        <div class="card">
            <div style="background-color: #9bc6fd;" class="card-header">
           
                <h4 style="font-size: 22px; color:black;" class="card-title"><a href="/teacherschedule/teacherschedule" style="height: 40px;
                 font-size: 16px;color:black; " class="btn icon icon-left btn-success"><i data-feather="arrow-left"></i>
                     Back</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Edit Teacher Schedule</h4>
            </div>
            <div class="card-content">
            <div class="card-body">

                <form method="POST" action="/teacherschedule/{{$teacherschedule->id}}">
                    @csrf
                    @method('PUT')
                
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="techr_id">Teacher Name</label>
                            <fieldset class="form-group">
                                <select class="form-select"  id="techr_id" name="techr_id" value="{{$teacherschedule->techr_id}}">
                                        <option selected disabled>{{$teacherschedule->teacher->name}}</option>
                                @foreach ($teacher as $teachers)
                                    @if($teacherschedule->techr_id == $teachers->id){
                                        <option value="{{$teachers->id}}"{{$teachers->id == $teachers->id  ? 'selected' : ''}}>{{$teachers->name}}</option>
                                    }
                                    @else{
                                        <option value="{{$teachers->id}}">{{$teachers->name}}</option>
                                    }
                                    @endif
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
                                <select class="form-select"  id="schedule_id" name="schedule_id" value="{{$teacherschedule->schedule_id}}">
                                        <option selected disabled>{{$teacherschedule->schedule->timer}}--{{$teacherschedule->schedule->room}}
                                            --{{$teacherschedule->schedule->building}}--{{$teacherschedule->schedule->day}}</option>
                                        @foreach ($schedule as $schedules)
                                            @if($teacherschedule->schedule_id == $schedules->id){
                                                <option value="{{$schedules->id}}"{{$schedules->id == $schedules->id  ? 'selected' : ''}}>{{$schedules->timer}}--{{$schedules->room}}
                                                    --{{$schedules->building}}--{{$schedules->day}}</option>
                                            }
                                            @else{
                                                <option value="{{$schedules->id}}">{{$schedules->timer}}--{{$schedules->room}}
                                                    --{{$schedules->building}}--{{$schedules->day}}</option>
                                            }
                                            @endif
                                        @endforeach
                                </select>
                            </fieldset>
                        </div>
                    @error('schedule_id')
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