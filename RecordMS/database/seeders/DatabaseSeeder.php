<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Student::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $users =[
            ['lrn' =>'123456789012',
            'email' =>'remy2@gmail.com',
            'password' => bcrypt('1234'),
            'role' =>'0'
        ],

        ['username' =>'teacher',
            'email' =>'hey12@gmail.com',
            'password' =>bcrypt('1234'),
            'role' =>'1'
        ],

        ['username' =>'admin',
            'email' =>'admin@gmail.com',
            'password' =>bcrypt('admin512'),
            'role' =>'2'
        ],
        

    ];

    foreach($users as $user)
    {
        User::create($user);
    }

    // Student::factory(6)->create([
    //     'user_id' => $user-> id
    // ]);
    }
}
