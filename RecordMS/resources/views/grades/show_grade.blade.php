@extends('teachers.teacher_dashboard')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('teacher_content')

<div class="main-content container-fluid">

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <x-flash-message/>
                <form method="POST" action="{{ route('import_grade') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="file" name="excel_file" class="form-control">
                    <br>
                    <button class="btn btn-outline-primary"><i data-feather="upload"></i>Import</button>
                        @error('excel_file')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    
            </div>
            
        </div>

    </div>
    <div style="text-align:right; width:100%; padding:0;">

            <a class="btn btn-outline-info" href="/grades/add_grade">
                <i data-feather="plus-square"></i>Add Grade</a>
        <a class="btn btn-outline-info" href="{{route('grades.export') }}">
        <i data-feather="download"></i>Export</a>
    </div>
   
    <section class="section">
        <div class="card">
            <div  class="card-header">
                <b>Grades</b>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr style="color: blue">
                          <th  style="border:1px solid #111010;font-size:14px; border-collapse: collapse;">LRN</th>
                          <th  style="border:1px solid #111010;font-size:14px; border-collapse: collapse;">Subject</th>
                          <th  style="border:1px solid #111010; border-collapse: collapse;">First Quarter</th>
                          <th  style="border:1px solid #111010; border-collapse: collapse;">Second Quarter</th>
                          <th  style="border:1px solid #111010; border-collapse: collapse;">Action</th>
                            
                        </tr>
                    </thead>
                      @foreach ($grade as $grades)
                    <tbody>
                      <tr>
                        <td style="border:1px solid #111010;font-size:13px; border-collapse: collapse;">{{$grades->lrn}}</td>
                        <td style="border:1px solid #111010;font-size:13px; border-collapse: collapse;">
                            {{$grades->subteacher->subject->sub_name}}</td>
                        <td style="border:1px solid #111010;font-size:13px; border-collapse: collapse;">{{$grades->qrtr_one}}</td>
                        <td style="border:1px solid #111010;font-size:13px; border-collapse: collapse;">{{$grades->qrtr_two}}</td>
                        <td style="border:1px solid #111010;font-size:13px; border-collapse: collapse;">
                            <a href="/grades/{{$grades->id}}/edit_grades"
                            class="btn icon btn-primary"><i data-feather="edit"></i></a>
                         </td>
                       
                      </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
     </form>
</div>

    
@endsection

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection


