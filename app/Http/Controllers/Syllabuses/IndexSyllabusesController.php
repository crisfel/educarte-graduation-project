<?php

namespace App\Http\Controllers\Syllabuses;

use App\Http\Controllers\Controller;
use App\Models\Syllabus;
use Illuminate\Http\Request;

class IndexSyllabusesController extends Controller
{
    public function index(Request $request)
    {
        $classroom_id = $request->input('classroom_id');
        $syllabus = Syllabus::where('classroom_id', $classroom_id)->first();

        return view('syllabuses.index', compact('classroom_id', 'syllabus'));
    }
}
