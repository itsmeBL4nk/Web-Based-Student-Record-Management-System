@extends('admin.layout')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('content')
<div class="main-content container-fluid">
    <div class="main-content container-fluid">
        
       <section class="section">
        <div class="card">
            <div class="card">
                <div style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
                   <b>Pre Registered Student</b> 
                </div>
           
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                            <th>Id</th>
                           <th>LRN</th>
                            <th>Name</th>
                            <th>Grade&Strand</th>
                            <th>Gender</th>
                                    
                       </tr>
                    </thead>
                    <tbody>
                        @foreach ($preregistration as $prereg)
                        <tr>
                            <td >{{$prereg->id}}</td>
                            <td >{{$prereg->student_lrn}}</td>
                            <td >{{$prereg->la_name}}, {{$prereg->fi_name}}
                                {{$prereg->mi_name}}.</td>
                            <td >{{$prereg->stud_gradelvl}}-{{$prereg->stud_strand}}</td>
                            <td >{{$prereg->stud_gender}}</td>
                            
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
         </div>
        </div>

    </section>
</div>

@endsection

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection