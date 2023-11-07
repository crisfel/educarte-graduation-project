<?php

namespace App\UseCases\Contracts\Teachers;

interface UpdateTeachersUseCaseInterface
{
    public function handle(string $name, string $email, string $phone, $password, int $user_id): bool;
}
