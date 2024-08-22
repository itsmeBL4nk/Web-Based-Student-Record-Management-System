@extends('teachers.teacher_dashboard')

@section('styles')

<link rel="stylesheet" href="{{asset('assets/layout/vendors/simple-datatables/style.css')}}">

@endsection

@section('teacher_content')
<div class="main-content container-fluid">

    <section class="section">
        <div  class="card">
            <div style="background-color: #9bc6fd;font-size: 16px; color:black" class="card-header">
               <b>ClassList</b>
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <label>Classes</label>
                  <select name="classes" id="classes" class="form-select">
                    <option selected disabled>Select Class</option>
                    @if (count($classes)>0)
                      @foreach ($classes as $sub)
                      <option value="{{$sub['class_ID']}}">{{$sub->teacher->name}}::{{$sub->classes->gradelevel->grade_lvl}}
                        --{{$sub->classes->strand->strand_name}}--{{$sub->classes->section->section_name}}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
              </div>   

                <table class='table table-striped' id="table1">
                  <thead>
                    <tr>
                      <th>LRN</th>
                      <th>Fullname</th>
                      <th>Gender</th>
                      <th>Address</th>
                      <th>Grades</th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    @if(count($student)>0)
                    @foreach ($student as $students)
                    <tr>
                      <td>{{$students->lrn}}</td>
                      <td class="text-bold-500">{{$students->lname}}, {{$students->fname}} {{$students->mid_name}}.</td>
                      <td>{{$students->classes->schoolyear->schoolyear}}</td>
                      <td>{{$students->address}}</td>
                      <td>
                        <a href="/grades/{{$students->id}}/add_grade"
                         class="btn icon btn-primary">Add Grade</a>
                      </td>
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                <script>
                  $(document).ready(function(){
                    $("#classes").on('change',function(){
                      var  sub = $(this).val();
                      // alert(sub);
                      $.ajax({
                        url:"{{route('teachers.classlist')}}",
                        type:"GET",
                        data:{'classes':sub},
                        success:function(data){
                          console.log(data);
                          var student = data.student;
                          //  console.log(student.lenght);
                          var html = '';
                          if(student.length >0){
                            for(let i = 0;i<student.length;i++){
                              html +='<tr>\
                                      <td>'+student[i]['lrn']+'</td>\
                                      <td>'+student[i]['lname']+', '+student[i]['fname']+' '+student[i]['mid_name']+'.</td>\
                                      <td>'+student[i]['gender']+'</td>\
                                      <td>'+student[i]['address']+'</td>\
                                      <td><a href="/grades/'+student[i]['id']+'/add_grade" class="btn icon btn-primary"><i data-feather="plus-circle"></i>Add Grade</a></td>\
                                     </tr>';
                                     
                                     
                            }
                          }
                          else{
                            html +='<tr>\
                                    <td>No Students Found!!</td>\
                                   </tr>';
                          }
                          $("#tbody").html(html);
                        }
                      });
                    });
                  });
                  
                </script>
            </div>
      </div>
  </section>
</div>
@endsection

@section('script')

<script src="{{asset('assets/layout/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/layout/js/vendors.js')}}"></script>
    
@endsection