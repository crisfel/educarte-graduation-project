<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreationTypeProjectsController extends Controller
{
    public function creationType($id) {

        return view('projects.creationType', compact('id'));
    }
}
