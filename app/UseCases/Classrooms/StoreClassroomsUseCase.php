<?php

namespace App\UseCases\Classrooms;

use App\Repositories\Contracts\Classrooms\ClassroomRepositoryInterface;
use App\Repositories\Contracts\Schools\SchoolRepositoryInterface;
use App\UseCases\Contracts\Classrooms\StoreClassroomsUseCaseInterface;

class StoreClassroomsUseCase implements StoreClassroomsUseCaseInterface
{
    private ClassroomRepositoryInterface $classroomRepository;

    public function __construct(ClassroomRepositoryInterface $classroomRepository)
    {
        $this->classroomRepository = $classroomRepository;
    }

    public function handle(string $name, string $code, int $user_id): bool
    {
        $this->classroomRepository->save($name, $code, $user_id);
        return true;
    }
}
