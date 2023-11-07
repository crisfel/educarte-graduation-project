<?php

namespace App\Repositories\Contracts\Teachers;

use App\Models\User;

interface TeachersRepositoryInterface
{
    public function saveTeacher(User $user) : bool;
    public function changeStatus(int $id, int $status): bool;
    public function updateTeacher(string $name, string $email, string $phone, string $password, int $user_id): bool;
    public function deleteTeacher(int $user_id): bool;
}
