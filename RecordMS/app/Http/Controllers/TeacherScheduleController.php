<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Teacherschedule;
use Illuminate\Validation\Rule;

class TeacherScheduleController extends Controller
{
     // create a teacher schedule
 public function create_teacherschedule(Request $request) 
 {
    $formFields = $request->validate([
         
                 'techr_id' => ['required'],
                 'schedule_id' => ['required', Rule::unique('teacherschedules','schedule_id')],
                 
             ]);
      Teacherschedule::create($formFields);
       
 return redirect('/teacherschedule/teacherschedule')->with('message', 'Teacher Schedule Created Successfully!');
 }
 // Show all Schedule
 public function teacherschedule()
 {
     $teacher = Teacher::get();
     $schedule = Schedule::get();
     $teacherschedule = teacherschedule::with('teacher', 'schedule')->get();
     
     return view('teacherschedule.teacherschedule', [
         'teacher' => $teacher,
         'schedule' => $schedule,
         'teacherschedule' => $teacherschedule,
     ]);
 }
 public function edit_teacherschedule(Teacherschedule $teacherschedule)
 {
     $teacher = Teacher::all();
     $schedule = Schedule::all();
     
     return view('teacherschedule.edit_teacherschedule', [
         'teacher' => $teacher,
         'schedule' => $schedule,
         'teacherschedule' => $teacherschedule,
     ]);
 }

 public function update_teacherSched(Request $request, Teacherschedule $teacherschedule)
 {  

    $formFields = $request->validate([
       
       'techr_id' => ['required'],   
       'schedule_id' => ['required'],
     ]);
 
     $teacherschedule->update($formFields);
         
     return back()->with('/teacherschedule/edit_teacherschedule')->with('message', 'Teacher Schedule Updated Successfully!');
 }
}
