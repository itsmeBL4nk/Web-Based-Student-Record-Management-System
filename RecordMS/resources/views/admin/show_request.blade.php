@extends('admin.layout')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('content')

<div class="main-content container-fluid">
  <x-flash-message/>
  
  <section class="section">
      <div class="card">
          <div style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
            <b> Transcript of Record</b> 
          </div>
          <div class="card-body">
              <table class='table table-striped' id="table1">
                  <thead>
                      <tr style="color: blue">
                        <th style="font-size:13px; padding-right:60px">LRN</th>
                        <th style="font-size:13px; padding-right:60px">Name</th>
                        <th style=" font-size:13px">Status</th>
                        <th style=" font-size:13px; padding-right:30px">Release Date</th>
                        <th style=" font-size:13px">Action</th>
                        <th style=" font-size:13px">View</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($transcript as $requests)
                    <tr>
                      <td style=" font-size:13px;padding-right:50px">{{$requests->user_lrn}}</td>
                      <td style=" font-size:13px;padding-right:40px">{{$requests->user_lname}}, {{$requests->user_fname}} {{$requests->user_midname}}</td>
                      {{-- <td style=" font-size:13px ">{{$requests->created_at->format('m-d-Y')}}</td> --}}
                      <td style=" font-size:13px"></a>{{$requests->status}}</td>
                        <td style=" font-size:13px;padding-right:50px">{{$requests->released_date}}</td>
                        <td style=" font-size:13px"><a href="/transcript/{{$requests->id}}/released_date"
                             class="btn icon btn-success"><i data-feather="trello"></i></a>
                        </td>
                        {{-- <td><a href="/admin/{{$requests->id}}/form137"
                          class="btn icon btn-info"><i class='fas fa-print' style='font-size:18px;color:rgb(8, 8, 8)'></i></a>
                        </td> --}}
                        {{-- <td><a href="/students/{{$requests->id}}/view"
                          class="btn icon btn-info"><i class='fas fa-eye' style='font-size:18px;color:rgb(8, 8, 8);margin:auto;'></i></a>
                        </td> --}}
                        <td><a href="/admin/{{$requests->id}}/form137"
                          class="btn icon btn-info"><i class='fas fa-eye' style='font-size:18px;color:rgb(8, 8, 8);margin:auto;'></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>

  </section>
</div>
@endsection

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection