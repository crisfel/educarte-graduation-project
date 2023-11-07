<?php

namespace App\UseCases\Teachers;

use App\Models\User;
use App\Repositories\Contracts\Teachers\TeachersRepositoryInterface;
use App\UseCases\Contracts\Teachers\ChangeStatusTeachersUseCaseInterface;

class ChangeStatusTeachersUseCase implements ChangeStatusTeachersUseCaseInterface
{
    private TeachersRepositoryInterface $teachersRepository;

    public function __construct(TeachersRepositoryInterface $teachersRepository)
    {
        $this->teachersRepository = $teachersRepository;
    }

    public function handle(int $id, int $status): bool
    {
        $this->teachersRepository->changeStatus($id, $status);
        return true;
    }
}
