<?php

namespace App\Http\Controllers;

use App\Models\Strand;
use App\Models\Section;
use App\Models\Gradelevel;
use App\Models\Schoolyear;
use Illuminate\Http\Request;

class SectionController extends Controller
{
     // Show add Form of section
     public function add_section()
     {
         return view('section.add_section');
     }

     // create a strand
    public function create_section(Request $request)
  
    {
        // dd($request->all());
        
        $formFields = $request->validate([
            
                    'section_name' => ['required'],
                    
                    
                ]);

          Section::create($formFields);
          
    return redirect('/section/all_section')->with('message', 'Section Created Successfully!');
    }

    public function sections()
    {
        $section = section::get();
        
        return view('section.all_section', [
            
            'section'=>$section,
            
        ]);
    }

    public function delete_section($id)
    {

        $data=section::find($id);

        $data->delete();

        return redirect()->back();
    }
    public function edit_section(Section $section)
    {
        return view('section.edit_section', ['section' =>$section]);
    }

    public function update_section(Request $request, Section $section )
{
    // dd($request->all());
        
    $formFields = $request->validate([
            
        'section_name' => ['required'],
        
    ]);

    $section->update($formFields);
        
    return redirect('/section/all_section')->with('message', 'Section Updated Successfully!');
}
}
