<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Syllabus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexProjectsController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        if (isset($id)) {
            if ($id == 'all') {
                $projects = Project::all();

                return view('projects.index', compact('projects', 'id'));
            }

            if (Auth::user()->role == 'Student' && $id == 'syllabus') {
                $projects = collect([]);
                $user = User::find(Auth::user()->id);

                $syllabuses = Syllabus::where('classroom_id', $user->student->classroom_id)->get();

                foreach ($syllabuses as $syllabus) {
                    $projects->push($syllabus->project);
                }

                return view('projects.index', compact('projects', 'id'));
            }

            $projects = Project::where('subcategory_id', $id)->get();

            return view('projects.index', compact('projects', 'id'));



        }

        $projects = Project::where('user_id', Auth::user()->id)->get();

        return view('projects.index', compact('projects','id'));
    }
}
