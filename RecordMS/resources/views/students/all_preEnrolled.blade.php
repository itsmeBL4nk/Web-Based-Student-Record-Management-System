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
                   <b>Pre-Enrolled Student</b> 
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
                        @foreach ($preenrollment as $preenrollments)
                        <tr>
                            <td >{{$preenrollments->id}}</td>
                            <td >{{$preenrollments->student_lrn}}</td>
                            <td >{{$preenrollments->student->lname}}, {{$preenrollments->student->fname}}
                                {{$preenrollments->student->mid_name}}.</td>
                            <td >{{$preenrollments->grade_lvl}}-{{$preenrollments->student->classes->strand->strand_name}}</td>
                            <td >{{$preenrollments->student->gender}}</td>
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