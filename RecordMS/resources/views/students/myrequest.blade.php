@extends('students.dashboard')

@section('student_content')
<x-flash-message/>

<div id="table-bordered">
    <div class="col-12">
        <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Teacher Table</li>
            </ol>
        </nav>
      <div class="card">
        <div style="background-color: #9bc6fd;" class="card-header">
          <h4 style="font-size: 20px; color:black;" class="card-title">Status Request</h4>
        </div>
        <div class="card-content">
          
          <!-- table bordered -->
          <div class="table-responsive">
            <table class="table table-bordered mb-0">
              <thead>
                <tr>
                  <th>LRN</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Date Release</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($requested as $requests)
                <tr>
                  <td class="text-bold-500">{{$requests->user_lrn}}</td>
                  <td>{{$requests->user_lname}}, {{$requests->user_fname}} {{$requests->user_midname}}.</td>
                  <td>{{$requests->status}}</td>
                  <td>{{$requests->released_date}}</td>

                    <td><a href="/cancel_request/{{$requests->id}}" 
                        class="btn icon btn-danger" onclick="return confirm('Are you sure to cancel your request?')"><i data-feather="x-square"></i></a></td>
                   </tr>
               </tbody>
            </table>
            <div class="form-group with-title mb-7">
              <textarea class="form-control" name="message_reject" id="message_reject" rows="3">{{$requests->message_reject}}</textarea>
              <label>Reason for rejecting the request</label>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection