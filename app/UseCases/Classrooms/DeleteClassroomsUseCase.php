<?php

namespace App\UseCases\Classrooms;

use App\Models\Classroom;
use App\UseCases\Contracts\Classrooms\DeleteClassroomsUseCaseInterface;

class DeleteClassroomsUseCase implements DeleteClassroomsUseCaseInterface
{
    public function handle(int $classroom_id):bool
    {
        Classroom::destroy($classroom_id);
        return true;
    }
}
