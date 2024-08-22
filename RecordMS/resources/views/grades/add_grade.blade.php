@extends('teachers.teacher_dashboard')

@section('teacher_content')

<!-- Hoverable rows start -->
<div class="row" id="table-hover-row">
  <form method="POST" action="/grades" enctype="multipart/form-data"
                    class="form form-vertical" >
                    @csrf
  <div class="col-10 mx-auto">
    <x-flash-message/> 
    <div class="card">
      <div style="background-color: #9bc6fd;" class="card-header">
        <h4 style="font-size: 22px; color:black;" class="card-title"><a href="/teachers/classlist" style="height: 40px;
          font-size: 16px;color:black; " class="btn icon icon-left btn-success"><i data-feather="arrow-left"></i>
              Back</a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Input Grades</h4>
      </div>
      
      <div class="card-content">
        <div style=" width:100%; padding:0;">
          <h4 style="color:black;padding-left: 30px; font-size:14px;" class="card-title">
            <b>{{$student->lrn}}: {{$student->lname}}, {{$student->fname}} 
              {{$student->mid_name}}.</b>
           </h4>
           <div style="color:black;padding-left: 30px; font-size:14px;" >
           <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button></b>
           </div>
    </div>
        <!-- table hover -->
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            @error('qrtr_one')
            <span class="text-danger">{{$message}}</span>
            @enderror
            {{-- @error('qrtr_two')
            <span class="text-danger">{{$message}}</span>
            @enderror --}}
            <thead style="border:1px solid #111010; border-collapse: collapse;">
              <tr style="border:1px solid #111010; border-collapse: collapse;">
                <th style="border:1px solid #111010; border-collapse: collapse;">Semester</th>
                <th style="border:1px solid #111010; border-collapse: collapse;">Subject</th>
                <th style="border:1px solid #111010; border-collapse: collapse;">First Quarter</th>
                <th style="border:1px solid #111010; border-collapse: collapse;">Second Quarter</th>
                <th style="border:1px solid #111010; border-collapse: collapse;">Gen. Average</th>
              </tr>
            </thead>
              <tbody style="border:1px solid #111010; border-collapse: collapse;">
                @foreach ($subteacher as $grades)
                {{-- <input type="hidden" name="id[]" class="form-control" value="{{$grades->id}}">
                <input type="hidden" name="subjectteacher_id[]" class="form-control" value="{{$grades->subjectteacher_id}}">
                <input type="hidden" name="lrn[]" class="form-control" value="{{$grades->lrn}}">
                <input type="hidden" name="sub_name[]" class="form-control" value="{{$grades->sub_name}}">
                <input type="hidden" name="sub_type[]" class="form-control" value="{{$grades->sub_type}}">
                <input type="hidden" name="semester[]" class="form-control" value="{{$grades->semester}}">
                <input type="hidden" name="school_yr[]" class="form-control" value="{{$grades->school_yr}}"> --}}
                

              <tr style="border:1px solid #111010; border-collapse: collapse;">
                <td style="border:1px solid #111010; border-collapse: collapse;">{{$grades->semester}}</td>
                <td style="border:1px solid #111010; border-collapse: collapse;">{{$grades->sub_name}}</td>
                <td style="border:1px solid #111010; border-collapse: collapse;">
                  <input type="hidden" name="id[]" class="form-control" value="{{$grades->id}}">
                  <input type="hidden" name="subjectteacher_id[]" class="form-control" value="{{$grades->subjectteacher_id}}">
                  <input type="hidden" name="lrn[]" class="form-control" value="{{$grades->lrn}}">
                  <input type="hidden" name="sub_name[]" class="form-control" value="{{$grades->sub_name}}">
                  <input type="hidden" name="sub_type[]" class="form-control" value="{{$grades->sub_type}}">
                  <input type="hidden" name="semester[]" class="form-control" value="{{$grades->semester}}">
                  <input type="hidden" name="school_yr[]" class="form-control" value="{{$grades->school_yr}}">
                  
                    <input type="text" name="qrtr_one[]" size="10" value="{{$grades->qrtr_one}}"
                    onkeypress="return restrictAlphabet(event)"></td>
                  <td style="border:1px solid #111010; border-collapse: collapse;">
                    <input type="text" name="qrtr_two[]" size="10"  value="{{$grades->qrtr_two}}"
                    onkeypress="return restrictAlphabet(event)"></td>
                    <input type="hidden" name="created_at[]" class="form-control" value="{{$grades->created_at}}">
                    <input type="hidden" name="updated_at[]" class="form-control" value="{{$grades->updated_at}}">
                    <td style="border:1px solid #111010; border-collapse: collapse;">
                      
                      <?php
                      if($grades->qrtr_two){
                        echo round(($grades->qrtr_two+$grades->qrtr_one)/2);
                      }?>
                    
                  </tr>
                @endforeach
              </tbody>
            </form>
          </table>
        </div>
<!-- Hoverable rows end -->

{{-- <section id="multiple-column-form">
    <div  id="table-inverse">
      <form method="POST" action="/grades" enctype="multipart/form-data"
                    class="form form-vertical" >
                    @csrf
        <div class="col-8 mx-auto">
            <div style="background-color: #9bc6fd;" class="card-header">
              <h5 style="color:black" class="card-title">First Semester<a href="/teachers/classlist">
                <i class='fas fa-sign-out-alt' style='padding-left: 450px;font-size:26px; width:50;height:50;
                 color:rgb(7, 7, 7)'></i></a></h5>
                
                <div style=" width:100%; padding:0;">
                      <h6 style="color:black;padding-right: 10px;" class="card-title">
                        <b>{{$student->lrn}}: {{$student->lname}}, {{$student->fname}} 
                          {{$student->mid_name}}.</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                       </h6>
                       <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button></b>
                </div>
            <div class="card-content">
                <table  class="table table-light mb-0;">
                  <thead style="border:1px solid #111010; border-collapse: collapse;">
                    <tr style="border:1px solid #111010; border-collapse: collapse;">
                      <th style="border:1px solid #111010; border-collapse: collapse;">Subject</th>
                      <th style="border:1px solid #111010; border-collapse: collapse;">First Quarter</th>
                      <th style="border:1px solid #111010; border-collapse: collapse;">Second Quarter</th>
                      <th style="border:1px solid #111010; border-collapse: collapse;">Gen. Average</th>
                    </tr>
                  </thead>
                  <tbody style="border:1px solid #111010; border-collapse: collapse;">
                    @foreach ($subteacher as $grades)
                    <input type="hidden" name="id[]" class="form-control" value="{{$grades->id}}">
                    <input type="hidden" name="subjectteacher_id[]" class="form-control" value="{{$grades->subjectteacher_id}}">
                    <input type="hidden" name="lrn[]" class="form-control" value="{{$grades->lrn}}">
                    <input type="hidden" name="sub_name[]" class="form-control" value="{{$grades->sub_name}}">
                    <input type="hidden" name="sub_type[]" class="form-control" value="{{$grades->sub_type}}">
                    <input type="hidden" name="semester[]" class="form-control" value="{{$grades->semester}}">
                    <input type="hidden" name="school_yr[]" class="form-control" value="{{$grades->school_yr}}">
                    <input type="hidden" name="created_at[]" class="form-control" value="{{$grades->created_at}}">
                    <input type="hidden" name="updated_at[]" class="form-control" value="{{$grades->updated_at}}">

                   <tr style="border:1px solid #111010; border-collapse: collapse;">
                    <td style="border:1px solid #111010; border-collapse: collapse;">{{$grades->sub_name}}</td>
                    <td style="border:1px solid #111010; border-collapse: collapse;">
                        <input type="text" name="qrtr_one[]" size="10" value="{{$grades->qrtr_one}}"></td>
                      <td style="border:1px solid #111010; border-collapse: collapse;">
                        <input type="text" name="qrtr_two[]" size="10"  value="{{$grades->qrtr_two}}" ></td>
                        <td style="border:1px solid #111010; border-collapse: collapse;">
                       
                         
                      </tr>
                    @endforeach
                    
                </tbody>
                 </form>
                </table>
            </div>
          </div>
        </div>
    </div>
    
    
</section> --}}
<script type="text/javascript">
    function restrictAlphabet(e){
      var x = e.which || e.keycode;
      if((x >=48 && x <=57))
         return true;
        else
          return false;

    }
</script>
    
@endsection