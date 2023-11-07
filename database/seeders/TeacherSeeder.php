<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $teacher = new Teacher();
        $user->name = 'Carlos';
        $user->email = 'carlos@gmail.com';
        $user->phone = '4537895';
        $user->is_enable = 1;
        $user->role = 'Teacher';
        $user->password = bcrypt('carlos');
        $user->save();
        $teacher->school_id = 1;
        $teacher->user_id = $user->id;
        $teacher->save();
        $user->assignRole('Teacher');

        $user = new User();
        $teacher = new Teacher();
        $user->name = 'David Castellanos';
        $user->email = 'davidca@gmail.com';
        $user->phone = '4564756';
        $user->is_enable = 1;
        $user->role = 'Teacher';
        $user->password = bcrypt('davidca');
        $user->save();
        $teacher->school_id = 1;
        $teacher->user_id = $user->id;
        $teacher->save();
        $user->assignRole('Teacher');

        $user = new User();
        $teacher = new Teacher();
        $user->name = 'Jorge Hernandez';
        $user->email = 'jorgehe@gmail.com';
        $user->phone = '2567654';
        $user->is_enable = 1;
        $user->role = 'Teacher';
        $user->password = bcrypt('jorgehe');
        $user->save();
        $teacher->school_id = 1;
        $teacher->user_id = $user->id;
        $teacher->save();
        $user->assignRole('Teacher');

        $user = new User();
        $teacher = new Teacher();
        $user->name = 'Claudia';
        $user->email = 'claudia@gmail.com';
        $user->phone = '5454665';
        $user->is_enable = 1;
        $user->role = 'Teacher';
        $user->password = bcrypt('claudia');
        $user->save();
        $teacher->school_id = 2;
        $teacher->user_id = $user->id;
        $teacher->save();
        $user->assignRole('Teacher');

        $user = new User();
        $teacher = new Teacher();
        $user->name = 'Diego Fontanar';
        $user->email = 'diegofo@gmail.com';
        $user->phone = '6457875';
        $user->is_enable = 1;
        $user->role = 'Teacher';
        $user->password = bcrypt('diegofo');
        $user->save();
        $teacher->school_id = 2;
        $teacher->user_id = $user->id;
        $teacher->save();
        $user->assignRole('Teacher');
    }
}
