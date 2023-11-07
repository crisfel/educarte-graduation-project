<?php

namespace App\UseCases\Classrooms;

use App\Models\Classroom;
use App\Models\Teacher;
use App\Repositories\Contracts\Classrooms\ClassroomRepositoryInterface;
use App\UseCases\Contracts\Classrooms\UpdateClassroomsUseCaseInterface;

/**
 * @property ClassroomRepositoryInterface $classroomRepository
 */
class UpdateClassroomsUseCase implements UpdateClassroomsUseCaseInterface
{
    private ClassroomRepositoryInterface $classroomRepository1;

    public function __constructor(ClassroomRepositoryInterface $classroomRepository)
    {
        $this->classroomRepository1 = $classroomRepository;
    }

    public function handle(string $name, string $code, int $user_id, int $classroom_id): bool
    {
        $classroom = Classroom::find($classroom_id);
        $classroom->name = $name;
        $classroom->code = $code;
        $classroom->user_id = $user_id;
        $teacher = Teacher::where('user_id', '=', $user_id)->first();
        $classroom->school_id = $teacher->school_id;
        $classroom->save();
        //$this->classroomRepository1->update($name, $code, $user_id, $classroom_id);
        return true;
    }
}
