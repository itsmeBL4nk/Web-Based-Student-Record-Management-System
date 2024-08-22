<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolYearController extends Controller
{
    public function school_year()
    {
        return view('school.add_schoolYear');
    }
    // create school year
    public function create_schoolyear(Request $request)
  
    {
        // dd($request->all());
        
        $formFields = $request->validate([
            
                    'schoolyear' => ['required'],
                    
                ]);
                SchoolYear::create($formFields);
          
            return redirect('/school/schoolyear')->with('message', 'SchoolYear Created Successfully!');
    }

    public function schoolyear()
    {
        $data = schoolyear::all();

        return view('school.schoolyear', compact('data'));
    }

    public function edit_schoolyear(Schoolyear $schoolyear)
    {
      return view('school.edit_schoolyear', ['schoolyear' =>$schoolyear]);
    }

    public function update_schoolyear(Request $request, Schoolyear $schoolyear )
    {
        // dd($request->all());
            
        $formFields = $request->validate([
                
            'schoolyear' => ['required'],
        ]);
    
        $schoolyear->update($formFields);

        return redirect('/school/schoolyear')->with('message', 'SchoolYear Updated Successfully!');
    }
    public function delete_schoolyear($id)
    {
    
        $data=schoolyear::find($id);
    
        $data->delete();
    
        return redirect()->back();
    }
    function active($id)
{
	//get product status with the help of product ID
	$data = DB::table('schoolyears')
				->select('status')
				->where('id','=',$id)
				->first();

	//Check user status
	if($data->status == '1'){
		$status = '0';
	}else{
		$status = '1';
	}

	//update product status
	$values = array('status' => $status );
	DB::table('schoolyears')->where('id',$id)->update($values);

    return redirect()->back();
}


    // public function active($id)
    // {
    //     $data=schoolyear::find($id);
        
    //     $data->status='Active';

    //     $data->save();

    //     return redirect()->back();

    // }

    // public function inactive($id)
    // {
    //     $data=schoolyear::find($id);
        
    //     $data->status='Inactive';

    //     $data->save();

    //     return redirect()->back();

    // }

}
