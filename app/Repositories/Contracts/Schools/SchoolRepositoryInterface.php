<?php

namespace App\Repositories\Contracts\Schools;

use App\Models\School;
use Illuminate\Http\UploadedFile;

interface SchoolRepositoryInterface
{
    public function save(School $school, UploadedFile $icon): void;
}
