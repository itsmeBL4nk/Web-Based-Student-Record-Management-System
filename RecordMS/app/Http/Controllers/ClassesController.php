<?php

namespace App\Http\Controllers;

use App\Models\Strand;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Gradelevel;
use App\Models\Schoolyear;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClassesController extends Controller
{

    public function add_classes()
    {
      $teacher = Teacher:: get();
      $gradelevel = Gradelevel:: get();
      $strand = Strand:: get();
      $section = Section:: get();
      $schoolyear = Schoolyear:: get();

      return view('classType.add_classes',[
        'teacher' => $teacher,
        'gradelevel' => $gradelevel,
        'strand' => $strand,
        'section' => $section,
        'schoolyear' => $schoolyear,
      ]);
    }
    
    public function create_classes(Request $request)
  
    {
        // dd($request->all());
        
        $formFields = $request->validate([

            'class_code' => ['required', Rule::unique('classes','class_code')],
            'teach_id' => ['required', Rule::unique('classes','teach_id')],
            'gradelevel_id' => 'required',
            'strand_id' => 'required',
            'section_id' => ['required', Rule::unique('classes','section_id')],
            'schoolyr_id' => 'required',
             ]);

          Classes::create($formFields);
          
    return redirect('/classType/classes')->with('message', 'Class Created Successfully!');
    }

    public function classes()
    {
      $teacher = Teacher:: get();
      $gradelevel = Gradelevel:: get();
      $strand = Strand:: get();
      $section = Section:: get();
      $schoolyear = Schoolyear:: get();
      $classes = classes::with('schoolyear', 'teacher', 'gradelevel', 'strand', 'section')->get();

        return view('classType.classes',[
        'teacher' => $teacher,
        'gradelevel' => $gradelevel,
        'strand' => $strand,
        'classes' => $classes,
        'section' => $section,
        'schoolyear' => $schoolyear,
        ]);
    }

    public function edit_class(Classes $classes)
    {
      $teacher = Teacher:: get();
      $gradelevel = Gradelevel:: get();
      $strand = Strand:: get();
      $section =Section:: get();
      $schoolyear =Schoolyear:: get();

      return view('classType.edit_class', [
        'teacher' => $teacher,
        'gradelevel' => $gradelevel,
        'strand' => $strand,
        'section' => $section,
        'schoolyear' => $schoolyear,
        'classes' =>$classes,
      ]);
    }
    public function update_class(Request $request, Classes $classes)
    {  


        $formFields = $request->validate([
          
          'class_code' => ['required'],   
          'teach_id' => ['required'],
          'gradelevel_id' => 'required',
          'strand_id' => 'required',
          'section_id' => 'required',
          'schoolyr_id' => 'required',
        ]);
    
        $classes->update($formFields);
            
        return redirect('/classType/classes')->with('message', 'Class Updated Successfully!');
    }
    public function delete_class($id)
{

    $data=classes::find($id);

    $data->delete();

    return redirect()->back();
}
    

}
