<?php

namespace App\UseCases\Teachers;

use App\Models\User;
use App\Repositories\Contracts\Teachers\TeachersRepositoryInterface;
use App\Repositories\Teachers\TeachersRepository;
use App\UseCases\Contracts\Teachers\StoreTeachersUseCaseInterface;

class StoreTeachersUseCase implements StoreTeachersUseCaseInterface
{
    private TeachersRepositoryInterface $teachersRepository;

    public function __construct(TeachersRepositoryInterface $teachersRepository) {
        $this->teachersRepository = $teachersRepository;
    }


    public function handle(string $name, string $email, string $phone, string $password, bool $is_enable): bool
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->is_enable = $is_enable;
        $user->role = 'Teacher';
        $user->password = bcrypt($password);
        $this->teachersRepository->saveTeacher($user);
        return true;


    }
}
