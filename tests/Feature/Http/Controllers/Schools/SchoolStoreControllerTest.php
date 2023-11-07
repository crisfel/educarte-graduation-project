<?php

namespace Http\Controllers\Schools;

use App\Http\Controllers\Schools\SchoolStoreController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\TestCase;

/**
 * class SchoolStoreControllerTest
 */
class SchoolStoreControllerTest extends TestCase
{
    /**
     * Schools store path url
     * @type string
     */
    private const PATH_URL = 'schools/store';

    private const IMAGE_PATH = 'tests/Golden_files/test.png';

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return void
     * @throws GuzzleException
     */
    public function testStoreSchool()
    {
        $schoolStoreController = new SchoolStoreController();
        $request = new Request();
        $request->name = 'Gimanasion moderno';
        $request->icon_url = new UploadedFile(
            self::IMAGE_PATH,
            'banner-test.jpg',
            'image/jpeg',
            null,
            true
        );
        $schoolStoreController->store($request);
    }
}
