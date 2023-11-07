<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolDeleteController extends Controller
{
    public function delete(Request $request)
    {
        $school = School::find($request->input('school_id'));
        $school->is_deleted = 1;
        $school->save();


        return back()->with('deleschoolsuccess', 'Colegio eliminado');
    }
}
