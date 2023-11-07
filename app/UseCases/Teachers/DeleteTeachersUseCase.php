<?php

namespace App\UseCases\Teachers;

use App\Repositories\Contracts\Teachers\TeachersRepositoryInterface;
use App\UseCases\Contracts\Teachers\DeleteTeachersUseCaseInterface;

class DeleteTeachersUseCase implements DeleteTeachersUseCaseinterface
{
    private TeachersRepositoryInterface $teachersRepository;

    public function __construct(TeachersRepositoryInterface $teachersRepository){
        $this->teachersRepository = $teachersRepository;
    }

    public function handle(int $user_id):bool
    {
        $this->teachersRepository->deleteTeacher($user_id);
        return true;
    }
}
