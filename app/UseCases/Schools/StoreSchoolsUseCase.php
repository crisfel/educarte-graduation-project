<?php

namespace App\UseCases\Schools;

use App\Models\School;
use App\Repositories\Contracts\Schools\SchoolRepositoryInterface;
use App\UseCases\Contracts\Schools\StoreSchoolsUseCaseInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

class StoreSchoolsUseCase implements StoreSchoolsUseCaseInterface
{
    private SchoolRepositoryInterface $schoolRepository;

    /**
     * @param SchoolRepositoryInterface $schoolRepository
     */
    public function __construct(SchoolRepositoryInterface $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }


    public function handle(string $name, string $address, string $city, string $country, bool $isEnabled, UploadedFile $icon): bool
    {
        $school = new School();
        $school->name = $name;
        $school->address = $address;
        $school->city = $city;
        $school->country = $country;
        $school->is_enable =  $isEnabled;
        $this->schoolRepository->save($school, $icon);
        return true;

    }


}
