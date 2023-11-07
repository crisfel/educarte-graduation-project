<?php

namespace App\Repositories\Contracts\Classrooms;

interface ClassroomRepositoryInterface
{
    public function save(string $name, string $code, int $user_id): bool;
}
