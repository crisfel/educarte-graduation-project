<?php

namespace App\UseCases\Contracts\Teachers;

interface DeleteTeachersUseCaseInterface
{
    public function handle(int $user_id):bool;
}
