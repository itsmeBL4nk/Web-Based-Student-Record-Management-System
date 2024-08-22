<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Transcript;
use Illuminate\Http\Request;
use App\Models\PreEnrollment;
use App\Models\preregistration;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function student_dashboard()
    {
        return view('students.dashboard');
    }

    public function request_form()
    {
        return view('students.request_form');
    }

    public function submit_request(Request $request)
    {
        
        $data = new transcript;
        $data->reason=$request->reason;
        $data->other_reason=$request->other_reason;
        $data->status="Pending";
        $data->released_date="TBA";
        $data->stud_ID=$request->stud_ID;
        $tran = Transcript::get();

        if (count($tran) == 0) {
            if(Auth::id())
            {
                $data->user_id=Auth::user()->id;
                $data->user_lrn=Auth::user()->lrn;
                $data->user_lname=Auth::user()->lname;
                $data->user_fname=Auth::user()->fname;
                $data->user_midname=Auth::user()->mid_name;
            }
        $data->save();
        return redirect('/students/request_form')->with('message', 'Requested Successfully!!');
        }
        for ($i=0; $i < count($tran); $i++) { 
            // dd($tran[$i]->user_lrn);
            if($request->lrn == $tran[$i]->user_lrn)
            {
                return back()->with('error', 'You already submit your request!');
            }
        }
                $data->user_id=Auth::user()->id;
                $data->user_lrn=Auth::user()->lrn;
                $data->user_lname=Auth::user()->lname;
                $data->user_fname=Auth::user()->fname;
                $data->user_midname=Auth::user()->mid_name;
        $data->save();
        return redirect('/students/request_form')->with('message', 'Transcript of Record Requested Successfully!');
    }
    public function myrequest()
    {
        if(Auth::id())
        {
            $requested = transcript::where('user_id', '=', auth()->user()->id)->get();
            return view('students.myrequest', compact('requested'));
        }
        else
        {
            return redirect()->back();
        }
    }
    public function cancel_request($id)
    {
        $data=transcript::find($id);
        $data->delete();
        return redirect()->back();
    }
// show enrollment form
    public function pre_enrollment()
    {
        return view('students.pre_enrollment');
    }
    
    public function submit_enrollment(Request $request)
    { 
        $grades = grade::where('lrn', '=', auth()->user()->lrn)->get();
        $fin_failed=0;
        foreach ($grades as $grade) {
            $final = ($grade->qrtr_one + $grade->qrtr_two) / 2;
             
            if ($final > 74){
                $failed = 0;
            }else{
                $failed = 1;
            }
            $fin_failed = $fin_failed + $failed;
            
        }
        // dd($fin_failed);
        if ($fin_failed == 0) {
            $data = new preenrollment;
            $data->grade_lvl=$request->grade_lvl;
            $data->stud_id=$request->stud_id;
            $pre = PreEnrollment::get();
            
                if (count($pre) == 0) {
                    if(Auth::id())
                    {
                        $data->student_lrn=Auth::user()->lrn;
                    }
                    $data->save();
                    return redirect('/students/pre_enrollment')->with('message', 'Pre Enrollment Successfully!');
                }
            for ($i=0; $i < count($pre); $i++) { 
                // dd($pre[$i]->student_lrn);
                if($request->lrn == $pre[$i]->student_lrn)
                {
                    return back()->with('error', 'You already submit your request!');
                }
            }
            
            $data->student_lrn=Auth::user()->lrn;
            $data->save();
            return redirect('/students/pre_enrollment')->with('message', 'Pre Enrollment Successfully!');
        } else {
            return redirect('/students/pre_enrollment')->with('error', 'Failed to Pre Enroll! You have failing grades!');
        }
        
        
    }

     public function all_preEnrolled()
    {
        $student = student::get();
        $preenrollment = preenrollment::with('student')->get();

        return view('students.all_preEnrolled',[
            'student' => $student,
            'preenrollment' => $preenrollment
        ]);
    }
    public function preRegister()
    {
        $preregistration = preregistration::get();

        return view('students.preRegister',[
            'preregistration' => $preregistration,
        ]);
    }
    public function grades()
    { 
        $grades = grade::where('lrn', '=', auth()->user()->lrn)->get();

        return view('students.grades', compact('grades'));
    }
}
