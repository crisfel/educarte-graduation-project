<?php

namespace App\UseCases\Contracts\Classrooms;

interface DeleteClassroomsUseCaseInterface
{

    public function handle(int $classroom_id): bool;
}
