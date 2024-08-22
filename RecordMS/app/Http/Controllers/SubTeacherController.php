<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Subteacher;
use Illuminate\Http\Request;

class SubTeacherController extends Controller
{
    public function create_subteacher(Request $request)
  
    {
         $formFields = $request->validate([

            'sem' => ['required'],
            'teacher_ID' => ['required'],
            'subject_ID' => 'required',
            'class_ID' => 'required',
             ]);

          Subteacher::create($formFields);
          
    return redirect('/subteachers/subteacher')->with('message', 'Subject Teacher Created Successfully!');
    }
    public function subteacher()
    {
        $teacher = Teacher:: get();
        $classes = Classes:: get();
        $subject = Subject:: get();
        $subteacher = subteacher::with('teacher', 'classes','subject' )->get();
      
        return view('subteachers.subteacher', [
        'teacher' => $teacher,
        'classes' => $classes,
        'subject' => $subject,
        'subteacher' => $subteacher,
        ]);
    }
    public function edit_subteacher(Subteacher $subteacher)
    {
        $teacher = Teacher:: get();
        $classes = Classes:: get();
        $subject = Subject:: get();
        
      return view('subteachers.edit_subteacher', [
        'subteacher' =>$subteacher,
        'teacher' => $teacher,
        'classes' => $classes,
        'subject' => $subject,
    ]);
    }
    public function delete_subteacher($id)
    {
        $data=subteacher::find($id);
    
        $data->delete();
    
        return redirect()->back();
    }

    public function update_subteacher(Request $request, Subteacher $subteacher)
    {  
    // dd($request->all());
       $formFields = $request->validate([
          
        'sem' => ['required'],
        'teacher_ID' => ['required'],
        'subject_ID' => 'required',
        'class_ID' => 'required',
        ]);
    
        $subteacher->update($formFields);
            
        return back()->with('/subteachers.edit_subteacher')->with('message', 'Subject Teacher Updated Successfully!');
    }
}
