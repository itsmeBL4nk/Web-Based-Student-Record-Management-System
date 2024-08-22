<?php

namespace App\Imports;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GradesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Grade([
            'lrn'    => $row['lrn'], 
            'lastName'    => $row['last_name'],
            'firstName'    => $row['first_name'],
            'middleName'    => $row['middle_name'],
            'sub_type'    => $row['subject_type'],
            'subject'    => $row['subject'],
            'qrtr_one'   => $row['first_quarter'],
            'qrtr_two'   => $row['second_quarter'],
            'finals'   => $row['finals'], 
            'sem'   => $row['semester'], 
            'teacher_ID'   => $row['teacher_id'], 
        ]);
    }
}