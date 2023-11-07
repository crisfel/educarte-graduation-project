<?php

namespace App\Repositories\Classrooms;

use App\Models\Classroom;
use App\Repositories\Contracts\Classrooms\ClassroomRepositoryInterface;

class ClassroomRepository implements ClassroomRepositoryInterface
{
    public function save(string $name, string $code, int $user_id): bool
    {
        $classroom = new Classroom();
        $classroom->name = $name;
        $classroom->code = $code;
        $classroom->user_id = $user_id;
        $classroom->save();
        return true;
    }

    public function update(string $name, string $code, int $user_id, int $classroom_id): bool
    {
        $classroom = Classroom::find($classroom_id);
        $classroom->name = $name;
        $classroom->code = $code;
        $classroom->user_id = $user_id;
        $classroom->save();
        return true;
    }
}
