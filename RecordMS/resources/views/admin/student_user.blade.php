@extends('admin.layout')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('content')

<div class="main-content container-fluid">
  
    <section class="section">
        <div class="card">
            <div style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
               <b>Student Account</b> 
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                            <th style="padding: 10px">ID</th>
                            
                                    <th>LRN</th>
                                    <th>Email</th>
                                    <th>Role</th>
                          </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->lrn}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
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

