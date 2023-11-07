<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

class UpdateProjectsController extends Controller
{
    public function update(Request $request)
    {
        $project = Project::find($request->input('project_id'));
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->theme_type = "project";
        if (Auth::user()->role == 'Administrator') {
            $project->theme_type = $request->input('theme_type');
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
            unlink(storage_path('app/public/project_images/'.$project->id.'.png'));
        }
        $project->save();

        return redirect('/projects')->with('UpdaProjectSuccess', 'Tema modificado');
    }
}
