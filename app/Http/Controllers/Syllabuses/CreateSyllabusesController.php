<?php

namespace App\Http\Controllers\Syllabuses;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CreateSyllabusesController extends Controller
{
    public function create(Request $request)
    {
        $classroom_id = $request->input('classroom_id');
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $projects = Project::all();

        return view('syllabuses.create', compact('categories', 'subcategories', 'projects', 'classroom_id'));
    }
}
