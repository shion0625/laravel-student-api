<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();
        Student::create([
            'name' => 'kaito',
            'age' => 22,
            'sex' => 'male',
            'email' => 'kaito@gmail.com',
            'course' => 'common programming'
        ]);

        Student::create([
            'name' => 'yodogawa',
            'age' => 30,
            'sex' => 'female',
            'email' => 'yodogawa@gmail.com',
            'course' => 'c programming'
        ]);
    }
}
