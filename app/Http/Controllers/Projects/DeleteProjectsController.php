<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DeleteProjectsController extends Controller
{
    public function delete(Request $request)
    {
        Project::destroy($request->input('project_id'));

        return back()->with('DeleProjectSuccess', 'Tema eliminado');
    }
}
