<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GradeLevelController extends Controller
{
    public function add_gradeLevel()
    {
        return view('gradeLevel.add_gradeLevel');
    }
public function create_gradeLevel(Request $request)
{
    $formFields = $request->validate([
        
        'grade_lvl' => ['required', Rule::unique('gradelevels','grade_lvl')]
        
    ]);
    if($request->grade_lvl == 11)
    {
    GradeLevel::create($formFields);
    return redirect('/gradeLevel/all_gradeLevel')->with('message', 'Grade Level Created Successfully!');
    }
    elseif ($request->grade_lvl == 12 )
    {
    GradeLevel::create($formFields);
    return redirect('/gradeLevel/all_gradeLevel')->with('message', 'Grade Level Created Successfully!');
    }

    return redirect()->back()->with('error', 'Input the appropriate grade level');
}

public function gradeLevel()
{
    $data = gradelevel::all();

    return view('gradeLevel.all_gradeLevel', compact('data'));
}

// show edit form
public function edit_gradelevel(GradeLevel $gradelevel)
{
    return view('gradeLevel.edit_gradeLevel', ['gradelevel' =>$gradelevel]);
}

    //  store strand data
public function update_gradelevel(Request $request, GradeLevel $gradelevel )
{
    // dd($request->all());
        
    $formFields = $request->validate([
            
        'grade_lvl' => ['required'],
        
    ]);

    $gradelevel->update($formFields);
        
    return redirect('/gradeLevel/all_gradeLevel')->with('message', 'Grade Level Created Successfully!');
}

public function delete_gradelevel($id)
{

    $data=gradelevel::find($id);

    $data->delete();

    return redirect()->back();
}
}
