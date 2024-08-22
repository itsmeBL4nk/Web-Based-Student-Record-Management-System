<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Strand;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Gradelevel;
use App\Models\Transcript;
use Illuminate\Http\Request;
use App\Models\Preenrollment;
use App\Imports\StudentImport;
use App\Exports\StudentsExport;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Framework\MockObject\Builder\Stub;

class AdminController extends Controller
{

    public function index()
    {
        // show the total teacher or data of the system
        $teacher = Teacher::count();
        // show the total student
        $student = Student::count();
        // show the total user
        $user = User::count();
        // total strand
        $strand = Strand::count();
        // total subject
        // $subject = Subject::count();
        // show all request 
        $transcript = Transcript::count();

        $pre = Preenrollment::count();

        // $pre= DB::table('preenrollments')
        // ->join('schoolyears', 'preenrollments.id', '=','preenrollments.stud_id')
        // ->where('preenrollments.schoolyears', '1')
        // ->where('schoolyears.status', '1')
        // ->count();

        $stem = classes::where('strand_id', '=', 1)->count();
        $abm = classes::where('strand_id', '=', 2)->count();
        $gas = classes::where('strand_id', '=', 3)->count();
        $humms = classes::where('strand_id', '=', 4)->count();
        $tvl = classes::where('strand_id', '=', 5)->count();

        $two_one = classes::where('schoolyr_id', '=', 1)->count();
        $two_two = classes::where('schoolyr_id', '=', 2)->count();
        $zero_zero = classes::where('schoolyr_id', '=', 3)->count();
        $two_three = classes::where('schoolyr_id', '=', 4)->count();
        $two_four = classes::where('schoolyr_id', '=', 5)->count();

        
        return view('admin.dashboard', compact('teacher', 'student', 'user','pre',
        'strand', 'transcript', 'stem', 'abm' , 'gas', 'humms','tvl', 
        'two_one', 'two_two','zero_zero','two_three','two_four' ));
    }

public function create()
    {
        return view('teachers.add_teacher');
    }
public function store(Request $request)
  
    {
                     $formFields = $request->validate([
            
                    'username' => ['required', Rule::unique('teachers','username')],
                    'name' => 'required',
                    'email' => ['required', 'email', Rule::unique('teachers','email')],
                    'phone' => ['required','min:11', 'max:11'],
                    'address' => 'required',
                    'role' => 'required',
                    'password' => 'required|min:4'
                    
                ]);
                $formFields['password'] = bcrypt($formFields['password']);

                if($request->hasFile('image')){
                            $formFields['image'] = $request->file('image')->store
                            ('storage/teacherimage', 'public');
                          }

        Teacher::create($formFields);
          
        return redirect('/teachers/all_teacher')->with('message', 'Teacher Created Successfully!');
    }

    public function showteacher()
    {
        $data = teacher::all();

        return view('teachers.all_teacher', compact('data'));
    }
    public function edit_teacher(Teacher $teacher)
    {
        return view('teachers.edit_teacher', ['teacher' =>$teacher]);
    }

// store teacher's data
public function update_teacher(Request $request, Teacher $teacher )
{
    // dd($request->all());
        
    $formFields = $request->validate([
        'name' => 'required',
        'email' => ['required'],
        'phone' => 'required',
        'address' => 'required',
        'username' => ['required'],
    ]);
    $teacher->update($formFields);
        
    return back()->with('message', 'Teacher Updated Successfully!');
}
public function delete_teacher($id)
    {
        $data=teacher::find($id);
        $data->delete();
        return redirect()->back();
    }
// View Teacher Profile

    public function view_teacher(Teacher $teacher)
    {
         return view('teachers.view_teacher', ['teacher' =>$teacher]);
    }
    
    public function add_student()
    {
        $gradelevel = Gradelevel::get();
        $strand = Strand::get();
        $section = Section::get();
        return view('students.add_student', [
            'gradelevel'=> $gradelevel,
            'strand'=>$strand,
            'section'=>$section
        ]);
    }
    // store student

    public function store_student(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([

            'lrn' => ['required',  'numeric', 'digits:12', Rule::unique('students','lrn')],
            'lname' => 'required',
            'fname' => 'required',
            'mid_name' => 'required',
            'gender' => 'required',
            'email' => ['required', Rule::unique('students','email')],
            'phone_num' =>['required', 'numeric', 'digits:11',],
            'address' => 'required',
            'classes_id' => 'required',
            'role' => 'required',
            'password' => 'required|min:4'
           ]);
           $formFields['password'] = bcrypt($formFields['password']);
        
           Student::create($formFields);
        return redirect('/students/all_student')->with('message', 'Student Created Successfully!');
    }
    public function all_student()
    {
      $classes = Classes::get();
        $student = student::orderBy('lname')->with('classes')->get();
        
        return view('students.all_student', [
           
            'classes'=>$classes,
            'student'=> $student,
        ]);
    }
    public function edit_student(Student $student)
    {
        $classes = Classes::get();

        return view('students.edit_student', [
            'classes'=>$classes,
            'student'=> $student,
        ]);
    }
    public function update_student(Request $request, Student $student)
    {
        $formFields = $request->validate([
            
            'lrn' => ['required'],
            'lname' => 'required',
            'fname' => 'required',
            'mid_name' => 'required',
            'gender' => 'required',
            'email' => ['required'],
            'phone_num' => 'required',
            'address' => 'required',
            'classes_id' => 'required' ,
            'role',
            'password'
          ]);
          $student->update($formFields);
        return redirect('/students/all_student')->with('message', 'Student Updated Successfully!');
    }
    public function view_student(Student $student)
    {
        return view('students.view_student', ['student' =>$student]);
    }
    public function export() 
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
    // public function import(Request $request) 
    // {
    //     $file =$request->file('file')->store('import');
        
    //     $import = new StudentImport;
    //     $import->import($file);

    //     // dd($import->errors());
    //     return back()->with('message', 'Student Imported Successfully!');
    // }
    public function import(Request $request) 
    {
        $file =$request->file('file')->store('import');
        $import = new StudentImport;
        $import->import($file);
        
        return back()->with('message', 'Student Imported Successfully!');
  
    }
    public function show_request()
    {   
        $transcript = Transcript::get();
        return view('admin.show_request',[
            'transcript' => $transcript,
        ]);
    }
    public function released_date(Transcript $transcript)
    {
        return view('transcript.released_date',compact('transcript'));
    }
    public function submit_date(Request $request, Transcript $transcript)
    {
        $this->validate($request,[
            'status' => ['required'],
        ]);

        if($request->status == "Rejected")
        {
            $this->validate($request,[
                'message_reject' => ['required']
            ]);
            $transcript->status ="Rejected";
            $transcript->released_date = null;
            $transcript->message_reject = $request->message_reject;
        }
        else{
            $this->validate($request,[
                'released_date' => ['required']
            ]);
            $transcript->status ="Approved";
            $transcript->message_reject = null;
            $transcript->released_date = $request->released_date;
        }
        $transcript->save();
        return redirect('/admin/show_request')->with('message', 'Message Created Successfully!');
    }

    public function form137(Transcript $transcript)
    {   
        $student = Student::get();
            
        $semone = grade::where('lrn', '=', $transcript->user_lrn)
                        ->where('semester', '=', 1)
                        ->get();
        $semtwo = grade::where('lrn', '=', $transcript->user_lrn)
                        ->where('semester', '=', 2)
                        ->get();
        $qrtr_two = grade::where('semester', '=', 1)
                        ->where('lrn', '=', $transcript->user_lrn)
                        ->avg('qrtr_two');
        $qrtr_one = grade::where('semester', '=', 1)
                        ->where('lrn', '=', $transcript->user_lrn)
                        ->avg('qrtr_one');
        $one = grade::where('semester', '=', 2)
                        ->where('lrn', '=', $transcript->user_lrn)
                        ->avg('qrtr_one');
        $two = grade::where('semester', '=', 2)
                        ->where('lrn', '=', $transcript->user_lrn)
                        ->avg('qrtr_two');
                         
        return view('admin.form137', [
            'student' =>$student,
            'transcript'=> $transcript,
            'semone' =>$semone,
            'semtwo' =>$semtwo, 
            'qrtr_two' =>$qrtr_two,
            'qrtr_one' =>$qrtr_one,
            'one' =>$one,
            'two' =>$two,
            // 'final' =>$final,
            // 'finale' =>$final,
            ]);
    }
    public function view(Transcript $transcript)
    {
        $student = Student::get();
        
        return view('students.view', [
            'student'=> $student,
            'transcript'=> $transcript,
        ]);
    }
    
 

    

    

    
    

}
