<?php

namespace App\Http\Controllers;

use App\Models\Strand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// show add strand form
class StrandController extends Controller
{
    public function add_strand()
    {
        return view('admin.add_strand');
    }
// create a strand
    public function create_strand(Request $request)
  {
    $formFields = $request->validate([
            
                    'track' => ['required'],
                    'strand_name' => ['required', Rule::unique('strands','strand_name')],
                ]);
                
    Strand::create($formFields);
    return redirect('/admin/all_strand')->with('message', 'Strand Created Successfully!');
    }
// show all strand data
    public function showstrand()
    {
        $data = strand::all();

        return view('admin.all_strand', compact('data'));
    }

// show edit form
public function edit_strand(Strand $strand)
{

    return view('admin.edit_strand', ['strand' =>$strand]);
}

    //  store strand data

public function update_strand(Request $request, Strand $strand )
{
    // dd($request->all());
        
    $formFields = $request->validate([
            
        'track' => ['required'],
        'strand_name' => 'required',
        
    ]);

    $strand->update($formFields);
        
    return redirect('/admin/all_strand')->with('message', 'Strand Updated Successfully!');
}
public function delete_strand($id)
{

    $data=strand::find($id);

    $data->delete();

    return redirect()->back();
}
}
