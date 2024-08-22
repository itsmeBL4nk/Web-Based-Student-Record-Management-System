<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subteacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function teacher_dashboard()
    {
        return view('teachers.teacher_dashboard');
    }
    // student=subteacher||subteacher=grades
    public function classlist(Request $request, Student $student)
    {
        $query=student::query();
        $classes=Subteacher::where('teacher_ID', auth()->user()->teacher_id)->get();
            
        if($request->ajax()){
            $student = $query->where(['classes_id'=>$request->classes])->get();
            return response()->json(['student' => $student]);
        }
        $student = $query->orderBy('lname')
            ->where('classes_id', '=', auth()->user()->teacher_id)->get();
        return view('teachers.classlist', [
            'student' => $student,
            'classes' => $classes,
            'student' => $student,

        ]);
    }
    
}
//    $subteacher=Subteacher::where('teacher_ID', '=', auth()->user()->teacher_id)
    //     ->get(); ITO SA MAY DROPDOWN 

// $query=student::query();
// $classes=classes::orderBy('teach_id')
// ->where('teach_id', '=', auth()->user()->teacher_id)->get();
//  $student=student::orderBy('lname')
//  ->where('classes_id', '=', auth()->user()->teacher_id)
//  ->get();
//  $grades=Grade::where('subjectteacher_id', '=', auth()->user()->teacher_id)->get();
// $subteacher=Subteacher::get();
// $student=Student::where('classes_id', $subteacher->class_ID)->get();
// $teacher = Teacher::get();
// $student=Student::where('classes_id', '=', auth()->user()->teacher_id)
//     ->where('classes_id', $teacher->id)
//     ->get();
    // $subteacher=DB::table('grades')
    // ->join('subteachers', 'subteachers.id', '=', 'grades.subjectteacher_id')
    // ->where('subteachers.teacher_ID', '=', auth()->user()->teacher_id)
    // ->where('subteachers.class_ID', '=', $student->classes_id)
    // ->where('grades.lrn', '=', $student->lrn)
    // ->get();