<?php

namespace App\UseCases\Contracts\Teachers;

interface ChangeStatusTeachersUseCaseInterface
{
    public function handle(int $id, int $status): bool;
}
