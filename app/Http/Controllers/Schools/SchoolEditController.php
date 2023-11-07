<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolEditController extends Controller
{
    public function edit($id)
    {
        $school = School::find($id);

        return view('Schools.edit', compact('school', 'id'));
    }
}
