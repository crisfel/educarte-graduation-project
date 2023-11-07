<?php

namespace App\Http\Controllers\Syllabuses;

use App\Http\Controllers\Controller;
use App\Models\Syllabus;
use Illuminate\Http\Request;

class DeleteSyllabusesController extends Controller
{
    public function delete(Request $request)
    {
        $syllabus = Syllabus::where('classroom_id', $request->input('classroom_id'))->get();
        foreach ($syllabus as $value) {
            Syllabus::destroy($value->id);
        }

        return back()->with('DeleteSyllabusSuccess', 'Plan de estudios eliminado');

    }
}
