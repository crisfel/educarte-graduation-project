<?php

namespace App\UseCases\Teachers;

use App\Repositories\Contracts\Teachers\TeachersRepositoryInterface;
use App\UseCases\Contracts\Teachers\UpdateTeachersUseCaseInterface;

class UpdateTeachersUseCase implements UpdateTeachersUseCaseInterface
{
    private TeachersRepositoryInterface $teachersRepository;

    public function __construct(TeachersRepositoryInterface $teachersRepository)
    {
        $this->teachersRepository = $teachersRepository;
    }

    public function handle(string $name, string $email, string $phone, $password, int $user_id): bool
    {

        $this->teachersRepository->updateTeacher($name, $email, $phone, $password, $user_id);
        return true;
    }
}
