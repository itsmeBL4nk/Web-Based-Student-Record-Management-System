@extends('students.dashboard')


@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('student_content')

<div class="main-content container-fluid">

    <div class="page-title">
         </div>

    </div>
   
    <section class="section">
        <div class="card">
            <div style="background-color: #9bc6fd;" class="card-header">
                <b style="font-size: 18px; color:black;">Grades</b>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                          <th style="border:1px solid #111010; border-collapse: collapse;">Teacher</th>
                          <th style="border:1px solid #111010; border-collapse: collapse;">Subject</th>
                          <th style="border:1px solid #111010; border-collapse: collapse;">1st</th>
                          <th style="border:1px solid #111010; border-collapse: collapse;">2nd</th>
                          <th style="border:1px solid #111010; border-collapse: collapse;">Final Grade</th>      
                        </tr>
                    </thead>
                      @foreach ($grades as $grade)
                    <tbody>
                      <tr>
                        <td style="border:1px solid #111010; border-collapse: collapse;">{{$grade->subteacher->teacher->name}}</td>
                        <td style="border:1px solid #111010; border-collapse: collapse;">{{$grade->sub_name}}</td>
                        <td style="border:1px solid #111010; border-collapse: collapse;">{{$grade->qrtr_one}}</td>
                        <td style="border:1px solid #111010; border-collapse: collapse;">{{$grade->qrtr_two}}</td>
                        <td style="border:1px solid #111010; border-collapse: collapse;">{{round(($grade->qrtr_two+$grade->qrtr_one)/2)}}</td>
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

