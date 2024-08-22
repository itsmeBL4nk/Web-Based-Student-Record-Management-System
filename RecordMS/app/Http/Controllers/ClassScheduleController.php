<?php

namespace App\Http\Controllers;


use App\Models\Room;
use App\Models\Timer;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Schedule;
use Illuminate\Http\Request;


class ClassScheduleController extends Controller
{
    // Show add Form of class schedule

    public function add_class()

    {
        $teacher = Teacher::get();
        $subject = Subject::get();
        $room = Room::get();
        $timer = Timer::get();
        
        return view('schedule.add_class',[
            'teacher' => $teacher,
            'subject' => $subject,
            'room' => $room,
            'timer' => $timer,
        ]);
    }

    // create a class schedule
    public function create_schedule(Request $request)
  
    {
        // dd($request->all());
        
        $formFields = $request->validate([

                    'timer' => 'required',
                    'building' => 'required',
                    'room' => 'required',
                    'day' => 'required',
                    
                ]);
         Schedule::create($formFields);
          
    return redirect('/schedule/classSchedule')->with('message', 'Class Schedule Created Successfully!');
    }
// Show all Schedule
    public function showAll()
    {
        $schedule = schedule::with('teacher')->get();
        
        return view('schedule.classSchedule', [
            'schedule' => $schedule,
        ]);
    }

    // show edit form
public function edit_classSched(Schedule $schedule)
{
    
    return view('schedule.edit_classSched', ['schedule' =>$schedule]);
}

 //  edit to submit class schedule

 public function update_classSched(Request $request, Schedule $schedule )
 {
     $formFields = $request->validate([
 
        'timer' => 'required',
        'building' => 'required',
        'room' => 'required',
        'day' => 'required',  
     ]);
     $schedule->update($formFields);
         
     return back()->with('message', 'Class Schedule Updated Successfully!');
 }

 public function delete_schedule($id)
 {
 
     $data=schedule::find($id);
 
     $data->delete();
 
     return redirect()->back();
 }

}
