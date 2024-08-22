<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Strand;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Transcript;
use Illuminate\Http\Request;
use App\Models\Preenrollment;
use App\Models\preregistration;
use App\Models\Teacherschedule;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function home()
    {
        return view('users.home');
    }
    public function showuser()
    {
        $data = User::where('role', '=', 2)->get();
        return view('admin.showuser', compact('data'));
    }
    public function teacher_user()
    {
        $data = User::where('role', '=', 1)->get();
        
        return view('admin.teacher_user', compact('data'));
    }
    public function student_user()
    {
        $data = User::where('role', '=', 0)->get();
        
        return view('admin.student_user', compact('data'));
    }
    public function add_user()
    {
        return view('admin.add_user');
    }
// Create to Store user
    public function store_user(Request $request)
    {
        $formFields = $request->validate([
            
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'role' => 'required',
            'password' => 'required|confirmed|min:4'
            
        ]);

        // Hash Password
         $formFields['password'] = bcrypt($formFields['password']);
         // Create User

        $user = User::create($formFields); 

        return redirect('admin/showuser')->with('message', 'User created successfully!!');

    }
    
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    public function login()
    {
        return view('users.login');
        
    }
    public function student_auth(Request $request){

        $formFields = $request->validate([
            'lrn' => ['required'], 
            'password' => 'required'
            
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            {
                if(auth()->user()->role == 'student')
                {
                    return redirect()->route('students.myrequest');
                }
            }
        }
        return back()->withErrors(['lrn'=> 'Invalid Credentials!'])
                ->onlyInput('lrn');
    }

    public function authenticate(Request $request){

        $formFields = $request->validate([
            'username' => ['required'], 
            'password' => 'required'
         ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            {
                if(auth()->user()->role == 'teacher')
                {
                    return redirect()->route('teachers.teacher_schedule');
                }
                else if(auth()->user()->role == 'admin')
                {
                    return redirect()->route('admin.layout')->with('message', 'You are now Logged In!');
                }
            }
        }
        return back()->withErrors(['username'=> 'Invalid Credentials!'])
                ->onlyInput('username');
    }
    // Authenticate
    public function student_dashboard()
    {
        return view('students.dashboard');
    }
    public function teacher_schedule()
    {
        return view('teachers.teacher_schedule');
    }
    public function admin_dashboard()
    // $pre= Preenrollment::count();

    // $preenroll = Preenrollment::get();
    // foreach ($preenroll as $pre) {
    //    $active=$pre->student->classes->schoolyear->status;
    //     if ($active == '1'){
    //         $active = Preenrollment::count();
    //     }else{
    //     }
    //     // dd($active);
    // }
    {
         // show the total teacher or data of the system
         $teacher = Teacher::count();
         // show the total student
         $student = Student::count();
         // show the total user
         $user = User::count();
         // total strand
        $strand = Strand::count();
        $transcript = Transcript::count();

        // $pre= DB::table('preenrollments')
        // ->join('schoolyears', 'preenrollments.id', '=','preenrollments.stud_id')
        // ->where('schoolyears.status', '1')
        // ->count();
        $pre = Preenrollment::count();

        

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
         'two_one', 'two_two','zero_zero','two_three','two_four'));
 
    }
    public function schedule()
    {
        $teacherschedule=teacherschedule::where('techr_id', '=', auth()->user()->teacher_id)->get();
    
        return view('teachers.teacher_schedule', compact('teacherschedule'));
    }
    // show enrollment form
    public function enrollment_form()
    {
        return view('users.enrollment_form');
    }
    public function submit_enrollment(Request $request)
  
     {
         $formFields = $request->validate([
            'student_lrn' => ['required','numeric', 'digits:12', Rule::unique('preregistrations','student_lrn')],
            'la_name' => 'required',
            'fi_name' => 'required',
            'mi_name' => 'required',
            'stud_gender' => 'required',
            'stud_gradelvl' => 'required',
            'stud_strand' => 'required',
            ]);
            preregistration::create($formFields);
           
     return redirect('/')->with('message', 'Pre Registration Successfully!');
     }
      // Authenticate
    public function aboutus()
    {
        return view('users.aboutus');
    }
    public function strand_homepage()
    {
        return view('users.strand_homepage');
    }
    public function landing_page()
    {
        return view('users.landing_page');
    }

    public function changepass(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password does not match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("message", "Password changed successfully!");
}

    
}


