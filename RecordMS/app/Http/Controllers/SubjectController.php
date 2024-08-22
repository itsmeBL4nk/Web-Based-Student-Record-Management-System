<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    // Show add Form of subject
    public function add_subject()
    {
        return view('subjects.add_subject');
    }

    // create a strand
    public function create_subject(Request $request)
  
    {
        $formFields = $request->validate([
            
                    'sub_name' => ['required',Rule::unique('subjects','sub_name')],
                    'sub_type' => 'required',
                ]);
            Subject::create($formFields);
   return redirect('/subjects/all_subject')->with('message', 'Subject Created Successfully!');
    }

public function showsubject()
    {
        $data = subject::all();

        return view('subjects.all_subject', compact('data'));
    }
// show edit form
public function edit_subject(Subject $subject)
{
    return view('subjects.edit_subject', ['subject' =>$subject]);
}
    //  edit to submit subject
public function update_subject(Request $request, Subject $subject, Grade $grade,)
{
    $formFields = $request->validate([

        'sub_name' => ['required'],
        'sub_type' => 'required',
    ]);

    $subject->update($formFields);
    $grade->update($formFields);
        
    return back()->with('message', 'Subject Updated Successfully!');
}

public function delete_subject($id)
{

    $data=subject::find($id);

    $data->delete();

    return redirect()->back();
}

}
