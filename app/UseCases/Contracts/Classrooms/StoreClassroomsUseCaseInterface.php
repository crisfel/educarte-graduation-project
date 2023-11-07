<?php

namespace App\UseCases\Contracts\Classrooms;

interface StoreClassroomsUseCaseInterface
{
    public function handle(string $name, string $code, int $user_id): bool;
}
