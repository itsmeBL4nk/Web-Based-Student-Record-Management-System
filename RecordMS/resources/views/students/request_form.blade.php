@extends('students.dashboard')

@section('student_content')
 

<x-flash-message/>
 <section id="multiple-column-form">
    <div class="match-height">
        <div class="col-8 mx-auto">
            <div class="card">
                <div  style="background-color: #9bc6fd;font-size: 16px; color:black"  class="card-header">
                    <h4  style=" color:black" class="card-title">Request Transcript of Record</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        

                     <form method="POST" action="/submit_request" enctype="multipart/form-data"
            class="form form-vertical">

            @csrf
             <div class="row">
                               <section class="section">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label style="color: black"> Please select a reason why you request your Transcript of Record</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select"  id="reason" name="reason">
                                                                <option selected disabled>Reason</option>
                                                                <option value="College Admission Application">College Admission Application</option>
                                                                <option value=" Transfer to a New School "> Transfer to a New School </option>
                                                                <option value=" Career & Placements"> Career & Placements </option>
                                                            </select>
                                                        </fieldset>
                                                    <div class="form-group with-title mb-3">
                                                        <textarea class="form-control" name="other_reason"rows="3"></textarea>
                                                        <label>Other Reason: </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" placeholder="Password"
                             name="lrn" value="{{auth()->user()->lrn}}">
                             <input type="hidden" class="form-control" placeholder="Password"
                             name="stud_ID" value="{{auth()->user()->student_id}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection