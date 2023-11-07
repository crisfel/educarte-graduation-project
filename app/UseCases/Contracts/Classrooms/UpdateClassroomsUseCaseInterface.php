<?php

namespace App\UseCases\Contracts\Classrooms;

interface UpdateClassroomsUseCaseInterface
{
    public function handle(string $name, string $code, int $user_id, int $classroom_id): bool;
}
