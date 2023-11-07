<?php

namespace App\Repositories\Schools;

use App\Models\School;
use App\Repositories\Contracts\Schools\SchoolRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

class SchoolRepository implements SchoolRepositoryInterface
{
    public function save(School $school, UploadedFile $icon): void
    {
        $school->save();
        if ($icon) {
            $pathName = Sprintf('school_logos/%s.png', $school->id);
            Storage::disk('public')->put($pathName, file_get_contents($icon));
            $client = new Client();
            $url = "https://miel.robotschool.co/upload.php";
            $client->request(RequestAlias::METHOD_POST, $url, [
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => fopen(
                            Storage::disk('public')
                                ->getDriver()
                                ->getAdapter()
                                ->getPathPrefix() . 'school_logos/' . $school->id . '.png', 'r'),
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'school_logos'
                    ]
                ]
            ]);
            $school->icon_url = 'storage/school_logos/' . $school->id . '.png';
            $school->save();
        }
        unlink(storage_path('app/public/school_logos/'.$school->id.'.png'));
    }




}
