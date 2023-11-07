<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;

class DetailProjectProjectsController extends Controller
{
    public function detailProject($id)
    {
        try {
        $project = Project::find($id);

        return view('projects.detailProject', compact('project'));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
