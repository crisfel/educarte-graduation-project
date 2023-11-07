<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ChangeStatusProjectsController extends Controller
{
    public function changeStatus(Request $request)
    {
        $project = Project::find($request->input('id'));
        $project->is_enable = $request->input('status');
        $project->save();
        return back();
    }
}
