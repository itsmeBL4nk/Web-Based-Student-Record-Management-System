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
                <a  href="#AddTimeModal" class="btn btn-outline-primary" data-bs-toggle="modal">
                    <i data-feather="plus-square"></i> Add Time</a>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View All Strand</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
   
    <section class="section">
        <div class="card">
            <div class="card-header">
                
                Timer
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th style="border:1px solid #111010; border-collapse: collapse;">ID </th>
                            <th style="border:1px solid #111010; border-collapse: collapse;">Time Start</th>
                            <th style="border:1px solid #111010; border-collapse: collapse;">Time End</th>
                            <th style="border:1px solid #111010; border-collapse: collapse;">Action</th>          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $timer)
                                    
                                <tr style="border:1px solid #111010; border-collapse: collapse;">
                                    <td style="border:1px solid #111010; border-collapse: collapse;">
                                    {{$timer->id}}</td>
                                    <td style="border:1px solid #111010; border-collapse: collapse;">
                                    {{$timer->time_start}}</td>
                                    <td style="border:1px solid #111010; border-collapse: collapse;">
                                        {{$timer->time_end}}</td>
                                    
                                    
                                    {{-- <td>{{$section->student->lrn}}</td> --}}

                                    
                                    
                                   <td style="border:1px solid #111010; border-collapse: collapse;"> <a href="/timers/{{$timer->id}}/edit_timer"
                                     class="btn icon btn-primary"><i data-feather="edit"></i></a>

                                     <a href="/delete_timer/{{$timer->id}}" 
                                        class="btn icon btn-danger" onclick="return confirm('Delete Time Slot?')">
                                        <i data-feather="trash-2"></i></a>
                                     

                                    </td>

                                    {{-- <td style="border:1px solid #111010; border-collapse: collapse;"><a href="/cancel_request/{{$section->id}}" 
                                        class="btn icon btn-danger" onclick="return confirm('Are you sure to cancel your request?')">
                                        <i data-feather="trash-2"></i></a></td> --}}
                                </tr>
                                 @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
{{--==================================================ADD Time=================================================== --}}

<div class="me-1 mb-1 d-inline-block">
    
    <div class="modal fade text-left" id="AddTimeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <form method="POST" action="/create_addtimer" enctype="multipart/form-data"
                class="form form-vertical">
    
                @csrf
        
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
            <h4 class="modal-title white" id="myModalLabel17">Add Time</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
            </div>

            <form method="POST" action="/create_gradeLevel" enctype="multipart/form-data"
                class="form form-vertical">
    
                @csrf
                
                <div style="padding-top: 15px;" class="form-body">
                    <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="time_start">Time Start</label>
                            <input type="text" id="time_start" class="form-control" name="time_start"
                                placeholder="Time Start" value="{{old('time_start')}}">
                            </div>
                            @error('time_start')
                            <p class="invalid-credential text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="time_end">Time End</label>
                            <input type="text" id="time_end" class="form-control" name="time_end"
                                placeholder="Time End" value="{{old('time_end')}}">
                            </div>
                            @error('time_end')
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

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection