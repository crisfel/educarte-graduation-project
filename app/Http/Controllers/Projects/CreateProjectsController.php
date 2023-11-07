<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateProjectsController extends Controller
{
    public function create(Request $request)
    {
        $id = $request->input('subcategory_id');
        $creationType = $request->input('creation_type');
        return view('projects.create', compact('id', 'creationType'));
    }
}
