<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation
{
    use Importable , SkipsErrors;
    public function model(array $row)
    {
        return new Student([
            'lrn'     => $row['lrn'],
            'lname'     => $row['last_name'],
            'fname'     => $row['first_name'],
            'mid_name'     => $row['middle_name'],
            'gender'     => $row['gender'],
            'email'    => $row['email'],
            'phone_num'     => $row['phone'],
            'address'     => $row['address'],
            'classes_id'     => $row['classes'],
            'role'     => $row['role'],
            'password' => Hash::make('password')
        ]);
    }
            public function rules(): array
        {
             return [
            '*.lrn' => ['numeric', 'digits:12', 'unique:students,lrn'] ,
            '*.email' => ['email',  'unique:students,email'] ,
          ];
        //   'lrn' =>  ['min:12', 'max:12', Rule::unique('students','lrn')],
        }
    // public function onError(\Throwable $e)
    // {
        //     // Handle the exception how you'd like.
        // }
        
    }
    // 'lrn'    => $row['lrn'], 
    // 'lname'    => $row['last_name'],
    // 'fname'    => $row['first_name'],
    // 'mid_name'    => $row['middle_name'],
    // 'gender'    => $row['gender'], 
    // 'email'    => $row['email'], 
    // 'phone_num'    => $row['phone'], 
    // 'address'    => $row['address'], 
    // 'classes_id'    => $row['classes'], 
    // 'role'    => $row['role'], 