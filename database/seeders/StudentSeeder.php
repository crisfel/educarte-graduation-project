<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Generic student';
        $user->email = 'student@student.com';
        $user->phone = '5674314';
        $user->is_enable = 1;
        $user->role = 'Student';
        $user->password = bcrypt('student');
        $user->save();
        $student = new Student();
        $student->user_id = $user->id;
        $student->school_id = 1;
        $student->classroom_id = 1;
        $student->save();
        $user->assignRole('Student');

        $user = new User();
        $user->name = 'Fernando Hurtado';
        $user->email = 'fernandohu@gmail.com';
        $user->phone = '4672356';
        $user->is_enable = 1;
        $user->role = 'Student';
        $user->password = bcrypt('fernandohu');
        $user->save();
        $student = new Student();
        $student->user_id = $user->id;
        $student->school_id = 1;
        $student->classroom_id = 1;
        $student->save();
        $user->assignRole('Student');

        $user = new User();
        $user->name = 'Diana Guzman';
        $user->email = 'dianagu@gmail.com';
        $user->phone = '6782397';
        $user->is_enable = 1;
        $user->role = 'Student';
        $user->password = bcrypt('dianagu');
        $user->save();
        $student = new Student();
        $student->user_id = $user->id;
        $student->school_id = 1;
        $student->classroom_id = 1;
        $student->save();
        $user->assignRole('Student');

        $user = new User();
        $user->name = 'Marcos Portilla';
        $user->email = 'marcospo@gmail.com';
        $user->phone = '5688346';
        $user->is_enable = 1;
        $user->role = 'Student';
        $user->password = bcrypt('marcospo');
        $user->save();
        $student = new Student();
        $student->user_id = $user->id;
        $student->school_id = 1;
        $student->classroom_id = 1;
        $student->save();
        $user->assignRole('Student');
    }
}
