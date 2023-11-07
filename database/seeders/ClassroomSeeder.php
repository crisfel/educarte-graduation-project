<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classroom = new Classroom();
        $classroom->name = "Robótica doméstica 607";
        $classroom->code = "RODO607";
        $classroom->user_id = User::where('email', 'like','carlos@gmail.com')->first()->id;
        $classroom->school_id = 1;
        $classroom->save();

        $classroom = new Classroom();
        $classroom->name = "Robótica industrial 802";
        $classroom->code = "ROIN802";
        $classroom->user_id = User::where('email', 'like','davidca@gmail.com')->first()->id;
        $classroom->school_id = 1;
        $classroom->save();

        $classroom = new Classroom();
        $classroom->name = "Domótica para niños 305";
        $classroom->code = "DONI305";
        $classroom->user_id = User::where('email', 'like','claudia@gmail.com')->first()->id;
        $classroom->school_id = 2;
        $classroom->save();

        $classroom = new Classroom();
        $classroom->name = "Domótica escolar";
        $classroom->code = "DOES403";
        $classroom->user_id = User::where('email', 'like','diegofo@gmail.com')->first()->id;
        $classroom->school_id = 2;
        $classroom->save();


    }
}
