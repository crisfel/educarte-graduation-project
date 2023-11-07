<?php

namespace App\Http\Controllers\Syllabuses;

use App\Http\Controllers\Controller;
use App\Models\Syllabus;
use Illuminate\Http\Request;

class StoreSyllabusesController extends Controller
{
    public function store(Request $request)
    {
        $ids = $request->input('projectCheck');
        if (is_null($ids)) {
            return back()->with('StoreSyllabusError', 'No selecciono ningún tema');
        }
        $syllabus = Syllabus::where('classroom_id', $request->input('classroom_id'))->first();
        if (! is_null($syllabus)) {
            return back()->with('SyllabusExists', 'El plan de estudios para este curso ya esta creado');
        }
        foreach ($ids as $id) {
            $syllabus = new Syllabus();
            $syllabus->classroom_id = $request->input('classroom_id');
            $syllabus->project_id = $id;
            $syllabus->save();
        }
        $syllabus = Syllabus::where('classroom_id', $request->input('classroom_id'))->get();

        return redirect('/syllabus?classroom_id='.$request->input('classroom_id'))->with('StoreSyllabusSuccess', 'Plan de estudios agregado');
    }
}
