<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

class StoreProjectsController extends Controller
{
    public function store(Request $request)
    {
        if (isset($_FILES['themeFile'])) {
            $fileThemeName = $_FILES['themeFile']['name'];
            $themeExtension = pathinfo($fileThemeName, PATHINFO_EXTENSION);
            if ($themeExtension != 'pdf') {

                return redirect('/project/creation-type/'.$request->input('subcategory_id'))->with('invalidFormat','Formato de archivo erróneo');
            }
        }
        $fileImageName = $_FILES['image']['name'];
        $imageExtension = pathinfo($fileImageName, PATHINFO_EXTENSION);
        if ($imageExtension != 'jpg' && $imageExtension != 'jpeg' && $imageExtension != 'png') {

            return redirect('/project/creation-type/'.$request->input('subcategory_id'))->with('invalidFormat','Formato de archivo erróneo');
        }
        $description = $request->input('description');
        $project = new Project();
        $project->name = $request->input('name');
        $project->description = '';
        if (isset($description)) {
            $project->description = $description;
        }
        $project->theme_type = 'project';

        if (isset($request->theme_type)) {
            $project->theme_type = $request->input('theme_type');
        }

        $project->icon_url = '';
        $project->is_enable = 0;
        $project->user_id = Auth::user()->id;
        $project->subcategory_id = $request->input('subcategory_id');
        $project->save();
        if ($request->hasFile('themeFile')) {
            $pathName = Sprintf('theme_files/%s.pdf', $project->id);
            Storage::disk('public')->put($pathName, file_get_contents($request->file('themeFile')));
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
                                ->getPathPrefix() . 'theme_files/' . $project->id . '.pdf', 'r'),
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'theme_files'
                    ]
                ]
            ]);
            $project->is_file = 1;
            $project->description = '/storage/theme_files/' . $project->id . '.pdf';
            $project->save();
        }

        if ($request->hasFile('image')) {
            $pathName = Sprintf('project_images/%s.png', $project->id);
            Storage::disk('public')->put($pathName, file_get_contents($request->file('image')));
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
                                ->getPathPrefix() . 'project_images/' . $project->id . '.png', 'r'),
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'project_images'
                    ]
                ]
            ]);
            $project->icon_url = '/storage/project_images/' . $project->id . '.png';
            $project->save();
            unlink(storage_path('app/public/project_images/'.$project->id.'.png'));

            return redirect('/projects')->with('StoreProjectSuccess', 'Tema agregado');
        }

    }
}
