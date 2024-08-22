@extends('teachers.teacher_dashboard')

@section('teacher_content')
<x-flash-message/>

<div id="table-bordered">
  <div class="col-12">
    <div class="card">
      <div style="background-color: #9bc6fd;" class="card-header">
        <h4 style="color:black;padding-right: 10px;" class="card-title">My Schedule</h4>
      </div>
      <div class="card-content">
        <div class="table-responsive">
          <table class="table table-bordered mb-0">
            <thead>
              <tr>
                <th>Days</th>
                <th>Room&Building</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($teacherschedule as $teacherschedule)
              <tr>
                <td>{{$teacherschedule->schedule->day}}</td>
                <td>{{$teacherschedule->schedule->room}}-
                {{$teacherschedule->schedule->building}}</td>
               <td>{{$teacherschedule->schedule->timer}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection