<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachersCreateController extends Controller
{
    public function create()
    {
        if (Auth::user()->can('createTeachers') ) {
            return view('teachers.create');
        }
        abort(403);
    }
}
