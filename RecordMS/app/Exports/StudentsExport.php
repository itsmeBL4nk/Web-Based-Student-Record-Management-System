<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
  
class StudentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::select("lrn", "lname", "fname", "mid_name", "gender",
         "email", "phone_num", "address","classes_id","role")->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["LRN", "Last Name", "First Name", "Middle Name", "Gender", "Email", "Phone", "Address", 
        "Classes", "Role"];
    }
}