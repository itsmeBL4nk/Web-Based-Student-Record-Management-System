<?php

namespace App\Exports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
  
class GradeExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Grade::where('teacher_ID', '=', auth()->user()->teacher_id)
        ->get(['lrn','lastName','firstName','middleName', 'sub_type', 'subject','qrtr_one','qrtr_two','finals','sem','teacher_ID']);
    }
  
    public function headings(): array
    {
        return ["LRN","Last Name","First Name","Subject Type", "Subject","Middle Name", "First Quarter", "Second Quarter", "Finals", "Semester", "Teacher ID"];
    }
    
}