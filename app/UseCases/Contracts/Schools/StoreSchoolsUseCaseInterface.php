<?php

namespace App\UseCases\Contracts\Schools;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

interface StoreSchoolsUseCaseInterface
{
    public function handle(string $name, string $address, string $city, string $country, bool $isEnabled, UploadedFile $icon): bool;
}
