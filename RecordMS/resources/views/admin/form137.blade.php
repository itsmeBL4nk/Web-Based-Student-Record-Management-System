<!DOCTYPE html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SRMS-BNHS</title>

<link rel="stylesheet" href="{{asset('assets/layout/css/form137.css')}}">
<link rel="shortcut icon" href="{{asset('assets/layout/images/school_image/bnhslogo.png')}}" type="image/x-icon">


</head>
<form method="POST" action="/admin/{{$transcript->id}}" enctype="multipart/form-data">

  @csrf

    
    <button style="background-color:aqua; width:150px; height:40px;" onclick="printDiv('printThis')">
      <i class='fas fa-print' style='font-size:20px;color:rgb(8, 8, 8)'width="100"></i>
      Print Form 137</button>
      
      <button type="button" style="background-color:aqua; width:150px; height:40px;" >
        <a href="{{URL::previous()}}" style="text-decoration:none;"><i class='fas fa-arrow-circle-left'
           style='font-size:20px;color:rgb(8, 8, 8)'width="100"></i>Back</a></button>
      
<body>
  <p>
    <div class="auto" id="printThis">
    <img class="logo-img-left" src="{{asset('assets/layout/images/deped_logo.png')}}" alt=""
     style="float:left;width:80px;height:80px; border-radius:50px">  
    </p>
    <p>
    <img class="logo-img-right" src="{{asset('assets/layout/images/deped_solo.png')}}" alt=""
     style="float:left;width:150px;height:80px; ">  
    </p>
    <p style="font-size:16px; text-align:center;">REPUBLIC OF THE PHILIPPINES</p>
    <p style="font-size:16px; text-align:center;">DEPARTMENT OF EDUCATION</p>
    <h1 style="font-size:20px; text-align:center;">SENIOR HIGH SCHOOL PERMANENT RECORD</h1>
   
    <table class="table_lrn" > 
        <tr class="lrn_row" >
          <th class="lrn_head">LEARNER'S INFORMATION</th>
        </tr>
    </table>
    

    <div id="fetch-feild">
        <div class="col-md-12">
    
          <label class="input" for="">LAST NAME</label>
          <input class="input" type="text" style="width:300px;text-align:center" value="{{$transcript->student->lname}}"> 
    
          <label class="input" for="">FIRST NAME</label>
          <input class="input" type="text" style="width:350px;text-align:center"value="{{$transcript->student->fname}}">

          <label class="input" for="">MIDDLE NAME</label>
          <input class="input" type="text" style="width:300px;text-align:center"value="{{$transcript->student->mid_name}}">      
    
          <label style="font-size:6" for="">LRN</label> 
          <input class="input" type="text" style="width:270px;text-align:center"value="{{$transcript->student->lrn}}">

          <label style="font-size:6" for="">Date of Birth(MM/DD/YYYY)</label> 
          <input class="input" type="text" style="width:210px;text-align:center">

          <label style="font-size:6" for="">Sex</label> 
          <input class="input" type="text" style="width:100px;text-align:center" value="{{$transcript->student->gender}}">

          <label style="font-size:6" for="">Date of Admission(MM/DD/YYYY)</label> 
          <input class="input" type="text" style="width:120px;text-align:center"><br><br>
          

          <table class="table_lrn"> 
            <tr class="lrn_row">
              <th class="lrn_head">ELIGIBILITY FOR SHS ENROLLMENT</th>
            </tr>
        </table><br>
        {{-- <div class="box" style="width:20px; height:20px;text-align:center"style="width:20px; height:20px;text-align:center">
          <label for="vehicle1"> I have a bike</label><br>
        </div> --}}

        
          <input class="box" type="text" style="width:20px;text-align:center">
          <label style="font-size:6" for="">High School Completer*&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label> 

          <label style="font-size:6" for="">Gen Ave.</label> 
          <input class="input" type="text" style="width:100px;text-align:center">

          <input class="box" type="text" style="width:20px;text-align:center">
          <label style="font-size:6" for="">Junior High School Completer*&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label> 

          <label style="font-size:6 " for="">Gen Ave.</label> 
          <input class="input" type="text" style="width:100px;text-align:center "><br><br>

          <label style="font-size:6" for="">Date of Graduation/Completion(MM/DD/YYYY)</label> 
          <input class="input" type="text" style="width:150px;text-align:center">

          <label style="font-size:6" for="">Name of School</label>
          <input class="input" type="text" style="width:260px;text-align:center" value="Bato National High School"> 
          
          <label style="font-size:6" for="">School Address</label>
          <input class="input" type="text" style="width:270px;text-align:center" value="San Miguel Bato, Camarines Sur"><br><br>

          <input class="box" type="text" style="width:20px;text-align:center">
          <label style="font-size:6" for="">PEPT Passer**&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>

          <label style="font-size:6 " for="">Rating</label> 
          <input class="input" type="text" style="width:100px;text-align:center">

          <input class="box" type="text" style="width:20px;text-align:center">
          <label style="font-size:6" for="">ALS A&E Passer***&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>

          <label style="font-size:6 " for="">Rating</label> 
          <input class="input" type="text" style="width:100px;text-align:center ">

          <input class="box" type="text" style="width:20px;text-align:center">
          <label style="font-size:6" for="">Others (Pls Specify)</label>
          <input class="input" type="text" style="width:350px;text-align:center "><br><br>

          <label style="font-size:6" for="">Date of Examination/Assessment(MM/DD/YYYY)</label> 
          <input class="input" type="text" style="width:150px;text-align:center">

          <label style="font-size:6" for="">Name and Address of Community Learning Center</label>
          <input class="input" type="text" style="width:300px;text-align:center"> <br>

          <i><label style="font-size:14px" for="">
          High School Completors are students from
           the secondary school under old curriculum&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label></i>

           <i><label style="font-size:14px" for="">
            ***ALS A&E Alternative Learning System and Equivalency Test for JHS</label></i><br>

            <i><label style="font-size:14px" for="">
              **PEPT Philippine Educational Placement Test for JHS</label></i><br>
              
              <table class="table_lrn"> 
                <tr class="lrn_row">
                  <th class="lrn_head">SCHOLASTIC RECORD</th>
                </tr>
            </table><br>

            <label class="input" for=""><strong>SCHOOL:</strong></label>
            <input class="input" type="text" style="width:350px;text-align:center" value="Bato National High School">

            <label class="input" for=""><strong>SCHOOL ID:</strong></label>
            <input class="input" type="text" style="width:175px;text-align:center" value="114448">

            <label class="input" for=""><strong>GRADE LEVEL:</strong></label>
            <input class="input" type="text" style="width:130px;text-align:center" value="{{$transcript->student->classes->gradelevel->grade_lvl}}">

            <label class="input" for=""><strong>SY:</strong></label>
            <input class="input" type="text" style="width:120px;text-align:center" value="{{$transcript->student->classes->schoolyear->schoolyear}}">
            <label class="input" for=""><strong>SEM:</strong></label>
            <input class="input" type="text" style="width:102px;text-align:center" value="1st"><br>
            <label class="input" for=""><strong>TRACK/STRAND:</strong></label>
            <input class="input" type="text" style="width:820px;text-align:center" value="{{$transcript->student->classes->strand->strand_name}}">

            <label class="input" for=""><strong>SECTION:</strong></label>
            <input class="input" type="text" style="width:220px;text-align:center" value="{{ $transcript->student->classes->section->section_name}}"><br><br>

            <table class="table_enrollment">
              <thead>
             
                  
              <tr class="enrollment_row">
                <th rowspan="2" class="enrollment_head" style="width:180px">
                Indicate if Subject is CORE, APPLIED or SPECIALIZED</th>
                <th rowspan="2" class="enrollment_head" style="width:600px">SUBJECTS</th>
                <th colspan="2"class="enrollment_head"style="width:300px">Quarter</th>
                <th rowspan="2" class="enrollment_head"style="width:130px">SEM FINAL GRADE</th>
                <th rowspan="2" class="enrollment_head"style="width:100px">ACTION TAKEN
                  <tr class="enrollment_row">
                    <td class="enrollment_td" style="text-align:center">1ST</td>
                    <td class="enrollment_td" style="text-align:center">2ND</td>
                  </tr></th>
              </tr>
            </thead> 
            @foreach ($semone as $grade)
              <tr>
                <td class="enrollment_td" style="height:15px; text-align:center">{{$grade->sub_type}}</td>
                <td class="enrollment_td" style="height:15px; text-align:center">{{$grade->sub_name}}</td>
                <td class="enrollment_td" style="height:15px; text-align:center">{{$grade->qrtr_one}}</td>
                 <td class="enrollment_td" style="height:15px; text-align:center">{{$grade->qrtr_two}}</td>
                <td class="enrollment_td" style="height:15px; text-align:center">{{round(($grade->qrtr_two+$grade->qrtr_one)/2)}}</td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                
              </tr>
              @endforeach
              <tr>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                 <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
              </tr>
              <tr>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                 <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
              </tr>
              <tr>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                 <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
              </tr>

              </table>
              <table class="table_average"> 
                <tr class="average_row">
                  <th class="average_head" style="height:15px; width:965px; text-align:right; ">General Ave. for the semester</th>
                  <th class="average_head" style="height:15px; width:130px; text-align:right; background-color: #fcf6f6">{{round(($qrtr_one+$qrtr_two)/2)}}</th>
                  <th class="average_head" style="height:15px; width:100px; text-align:right; background-color: #fcf6f6"></th>
                  </tr>
            </table>
            <br>
           

            <label class="input" for=""><strong>REMARKS:</strong></label>
            <input class="input" type="text" style="width:1150px;text-align:center"><br><br><br><br>


            <div class="wrap">
              <p>
              <strong>Prepared By:</strong>
              </p>
              <p style="text-align:center">
                <strong>Certified True and Correct:</strong>
              </p>
              <p style="text-align:right">
                <strong>Date Checked(MM/DD/YYYY):&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong>
              </p>
              </div><br><br><br>

              <div class="wrap">
                <p style="border-top: 2px solid rgb(12, 11, 11);">
                Signature of Adviser over Printed Name
                </p>
                <p style="text-align:center; border-top: 2px solid rgb(12, 11, 11);">
                  Signature of Authorized Person over Printed Name, Designation
                </p>
                <p style="text-align:right; border-top: 2px solid rgb(12, 11, 11);">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                 
                </p>
                </div><br>
                
                <label class="input" for=""><strong>REMEDIAL CLASSES</strong></label>
                <input class="input" type="text" style="width:70px;text-align:center">

                <label class="input" for=""><strong>Conducted from(MM/DD/YYYY):</strong></label>
                <input class="input" type="text" style="width:100px;text-align:center">

                <label class="input" for=""><strong>to(MM/DD/YYYY):</strong></label>
                <input class="input" type="text" style="width:100px;text-align:center">

                <label class="input" for=""><strong>SCHOOL:</strong></label>
                <input class="input" type="text" style="width:175px;text-align:center" value="Bato National High School">

                <label class="input" for=""><strong>SCHOOL ID:</strong></label>
                <input class="input" type="text" style="width:120px;text-align:center" value="114448"><br><br>

                <table class="table_enrollment">
                  <thead>
                  
                  <tr class="enrollment_row">
                    <th rowspan="2" class="enrollment_head" style="width:180px">
                    Indicate if Subject is CORE, APPLIED or SPECIALIZED</th>
                    <th rowspan="2" class="enrollment_head" style="width:600px">SUBJECTS</th>
                    <th rowspan="2" class="enrollment_head"style="width:130px">SEM FINAL GRADE</th>
                    <th rowspan="2" class="enrollment_head" style="width:130px">REMEDIAL CLASS MARK</th>
                    <th rowspan="2" class="enrollment_head" style="width:130px">RECOMPUTERIZED FINAL GRADE</th>
                    <th rowspan="2" class="enrollment_head"style="width:100px">ACTION TAKEN
                      
                  </tr>
                </thead> 
                @foreach ($semone as $grade)
                  <tr>
                    <td class="enrollment_td" style="height:15px; text-align:center">{{$grade->sub_type}}</td>
                    <td class="enrollment_td" style="height:15px; text-align:center">{{$grade->sub_name}}</td>
                    <td class="enrollment_td" style="height:15px; text-align:center">{{$grade->qrtr_one}}</td>
                    <td class="enrollment_td" style="height:15px; text-align:center">{{$grade->qrtr_two}}</td>
                    <td class="enrollment_td" style="height:15px; text-align:center">{{round(($grade->qrtr_two+$grade->qrtr_one)/2)}}</td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                  </tr>
                  @endforeach
                  <tr>
                      <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center">
                     <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                  </tr>
                  <tr>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center">
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    </tr>
                    <tr>
                      <td class="enrollment_td" style="height:15px; text-align:center"></td>
                      <td class="enrollment_td" style="height:15px; text-align:center"></td>
                      <td class="enrollment_td" style="height:15px; text-align:center">
                      <td class="enrollment_td" style="height:15px; text-align:center"></td>
                      <td class="enrollment_td" style="height:15px; text-align:center"></td>
                      <td class="enrollment_td" style="height:15px; text-align:center"></td>
                      </tr>
                  </table><br><br>
                  <label class="input" for="">Name of Teacher/Adviser:</label>
                <input class="input" type="text" style="width:710px;text-align:center">

                <label class="input" for="">Signature:</label>
                <input class="input" type="text" style="width:300px;text-align:center"><br><br><br>

                <label class="input" for=""><strong>SCHOOL:</strong></label>
            <input class="input" type="text" style="width:350px;text-align:center" value="Bato National High School">

            <label class="input" for=""><strong>SCHOOL ID:</strong></label>
            <input class="input" type="text" style="width:175px;text-align:center" value="114448">

            <label class="input" for=""><strong>GRADE LEVEL:</strong></label>
            <input class="input" type="text" style="width:130px;text-align:center" value="{{$transcript->student->classes->gradelevel->grade_lvl}}">

            <label class="input" for=""><strong>SY:</strong></label>
            <input class="input" type="text" style="width:120px;text-align:center" value="{{$transcript->student->classes->schoolyear->schoolyear}}">

            <label class="input" for=""><strong>SEM:</strong></label>
            <input class="input" type="text" style="width:102px;text-align:center" value="2nd"><br>

            <label class="input" for=""><strong>TRACK/STRAND:</strong></label>
            <input class="input" type="text" style="width:820px;text-align:center" value="{{$transcript->student->classes->strand->strand_name}}">

            <label class="input" for=""><strong>SECTION:</strong></label>
            <input class="input" type="text" style="width:220px;text-align:center" value="{{ $transcript->student->classes->section->section_name}}"><br><br>

            <table class="table_enrollment">
              <thead>
              
              <tr class="enrollment_row">
                <th rowspan="2" class="enrollment_head" style="width:180px">
                Indicate if Subject is CORE, APPLIED or SPECIALIZED</th>
                <th rowspan="2" class="enrollment_head" style="width:600px">SUBJECTS</th>
                <th colspan="2"class="enrollment_head"style="width:300px">Quarter</th>
                <th rowspan="2" class="enrollment_head"style="width:130px">SEM FINAL GRADE</th>
                <th rowspan="2" class="enrollment_head"style="width:100px">ACTION TAKEN
                  <tr class="enrollment_row">
                    <td class="enrollment_td" style="text-align:center">1ST</td>
                    <td class="enrollment_td" style="text-align:center">2ND</td>
                  </tr></th>
              </tr>
            </thead> 
            @foreach ($semtwo as $grading)
            <tr>
              <td class="enrollment_td" style="height:15px; text-align:center">{{$grading->sub_type}}</td>
              <td class="enrollment_td" style="height:15px; text-align:center">{{$grading->sub_name}}</td>
              <td class="enrollment_td" style="height:15px; text-align:center">{{$grading->qrtr_one}}</td>
              <td class="enrollment_td" style="height:15px; text-align:center">{{$grading->qrtr_two}}</td>
              <td class="enrollment_td" style="height:15px; text-align:center">{{round(($grading->qrtr_two+$grading->qrtr_one)/2)}}</td>
              <td class="enrollment_td" style="height:15px; text-align:center"></td>
               
            </tr>
            @endforeach
              <tr>
                  <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                 <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
              </tr>
              <tr>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center">
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                </tr>
                <tr>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
                <td class="enrollment_td" style="height:15px; text-align:center"></td>
              </tr>
              </table>
              <table class="table_average"> 
                <tr class="average_row">
                  <th class="average_head" style="height:15px; width:965px; text-align:right; ">General Ave. for the semester</th></th>
                  <th class="average_head" style="height:15px; width:100px; text-align:right; background-color: #fcf6f6">{{round(($one + $two)/2)}}</th>
                  </tr>
            </table>
            <br>
            <label class="input" for=""><strong>REMARKS:</strong></label>
            <input class="input" type="text" style="width:1150px;text-align:center"><br><br><br><br>


            <div class="wrap">
              <p>
              <strong>Prepared By:</strong>
              </p>
              <p style="text-align:center">
                <strong>Certified True and Correct:</strong>
              </p>
              <p style="text-align:right">
                <strong>Date Checked(MM/DD/YYYY):&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong>
              </p>
              </div><br><br><br>

              <div class="wrap">
                <p style="border-top: 2px solid rgb(12, 11, 11);">
                Signature of Adviser over Printed Name
                </p>
                <p style="text-align:center; border-top: 2px solid rgb(12, 11, 11);">
                  Signature of Authorized Person over Printed Name, Designation
                </p>
                <p style="text-align:right; border-top: 2px solid rgb(12, 11, 11);">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                 
                </p>
                </div><br>
                
                <label class="input" for=""><strong>REMEDIAL CLASSES</strong></label>
                <input class="input" type="text" style="width:70px;text-align:center">

                <label class="input" for=""><strong>Conducted from(MM/DD/YYYY):</strong></label>
                <input class="input" type="text" style="width:100px;text-align:center">

                <label class="input" for=""><strong>to(MM/DD/YYYY):</strong></label>
                <input class="input" type="text" style="width:100px;text-align:center">

                <label class="input" for=""><strong>SCHOOL:</strong></label>
                <input class="input" type="text" style="width:175px;text-align:center" value="Bato National High School">

                <label class="input" for=""><strong>SCHOOL ID:</strong></label>
                <input class="input" type="text" style="width:120px;text-align:center" value="114448"><br><br>

                <table class="table_enrollment">
                  <thead>
                  
                  <tr class="enrollment_row">
                    <th rowspan="2" class="enrollment_head" style="width:180px">
                    Indicate if Subject is CORE, APPLIED or SPECIALIZED</th>
                    <th rowspan="2" class="enrollment_head" style="width:600px">SUBJECTS</th>
                    <th rowspan="2" class="enrollment_head"style="width:130px">SEM FINAL GRADE</th>
                    <th rowspan="2" class="enrollment_head" style="width:130px">REMEDIAL CLASS MARK</th>
                    <th rowspan="2" class="enrollment_head" style="width:130px">RECOMPUTERIZED FINAL GRADE</th>
                    <th rowspan="2" class="enrollment_head"style="width:100px">ACTION TAKEN
                      
                  </tr>
                </thead> 
                @foreach ($semtwo as $grading)
                <tr>
                  <td class="enrollment_td" style="height:15px; text-align:center">{{$grading->sub_type}}</td>
                  <td class="enrollment_td" style="height:15px; text-align:center">{{$grading->sub_name}}</td>
                  <td class="enrollment_td" style="height:15px; text-align:center">{{$grading->qrtr_one}}</td>
                  <td class="enrollment_td" style="height:15px; text-align:center">{{$grading->qrtr_two}}</td>
                  <td class="enrollment_td" style="height:15px; text-align:center">{{round(($grading->qrtr_two+$grading->qrtr_one)/2)}}</td>
                  <td class="enrollment_td" style="height:15px; text-align:center"></td>
                </tr>
                @endforeach
                    <tr>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center">
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                  </tr>
                  <tr>
                      <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center">
                     <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                  </tr>
    
                  <tr>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center">
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                    <td class="enrollment_td" style="height:15px; text-align:center"></td>
                  </tr>
                  </table><br><br>
                  <label class="input" for="">Name of Teacher/Adviser:</label>
                <input class="input" type="text" style="width:710px;text-align:center">

                <label class="input" for="">Signature:</label>
                <input class="input" type="text" style="width:300px;text-align:center"><br><br><br>

                
      </div>
  </div>
</div>

</body>

<script>

  function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
</script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</html>
