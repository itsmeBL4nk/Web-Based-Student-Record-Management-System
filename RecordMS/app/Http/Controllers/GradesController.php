<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subteacher;
use App\Exports\GradeExport;
use Illuminate\Http\Request;
use App\Imports\GradesImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class GradesController extends Controller
{
// Show form grade
    public function add_grade(Student $student)
    {
        $classes=Classes::get();
        $subteacher=DB::table('subteachers')
        ->join('grades', 'subteachers.id', '=', 'grades.subjectteacher_id')
        // ->join('subteachers', 'subteachers.id', '=', 'grades.subjectteacher_id')
        ->where('subteachers.teacher_ID', '=', auth()->user()->teacher_id)
        ->where('subteachers.class_ID', '=', $student->classes_id)
        ->where('grades.lrn', '=', $student->lrn)
        ->get();
        // dd($subteacher);
        return view('grades.add_grade',[
        'subteacher' => $subteacher,
        'classes' => $classes,
        'student'=> $student,
      ]);
    }
    public function grades(Request $request, Grade $grade)
    {
        $data = [];
        $final = count($request->get('id'));
        
        for($x = 0; $x < $final; $x++){
            $data[] = [
                'id' => $request->get('id')[$x],
                'subjectteacher_id' => $request->get('subjectteacher_id')[$x],
                'lrn' => $request->get('lrn')[$x],
                'sub_name' => $request->get('sub_name')[$x],
                'sub_type' => $request->get('sub_type')[$x],
                'semester' => $request->get('semester')[$x],
                'school_yr' => $request->get('school_yr')[$x],
                'qrtr_one' => $request->get('qrtr_one')[$x],
                'qrtr_two' => $request->get('qrtr_two')[$x],
                'created_at' => $request->get('created_at')[$x],
                'updated_at' => $request->get('updated_at')[$x]
            ];
           
        }
    //    dd($data);
        Grade::upsert($data, ['id','subjectteacher_id','lrn','sub_name','sub_type','semester','school_yr',
        'qrtr_one','qrtr_two','created_at','updated_at']);
        return back()->with('message', 'Grade  Input Successfully!');
    }
    public function show_grade()
    {   
        // $student = student::get();
        $teacher = teacher::get();
        $grade = grade::with('subteacher')->get();
        $grade = grade::where('teacher_ID', '=', auth()->user()->teacher_id)->get();
        
        return view('grades.add_grade', [
            'grade' => $grade,
            'teacher' => $teacher,
        ]);
    }
    public function export_grade() 
    {
        return Excel::download(new GradeExport, 'grades.xlsx');
    }
     
    public function import_grade(Request $request) 
    {
        $request->validate([
            'excel_file'=>'required|mimes:xlsx'
        ]);
        
        Excel::import(new GradesImport,$request->file('excel_file'));
               
        return back();
    }
public function update_grade(Request $request, Grade $grade )
{
    $formFields = $request->validate([
        'lrn' => ['required'],
        'subject' => 'required',
        'sub_type' => 'required',
        'qrtr_one' => 'required',
        'qrtr_two' => 'required',
        'finals' => 'required',
    ]);

    $grade->update($formFields);
    return back()->with('message', 'Grades Updated Successfully!');
}
    
}
