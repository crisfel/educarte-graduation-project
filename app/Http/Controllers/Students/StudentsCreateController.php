<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsCreateController extends Controller
{
    public function create()
    {
        if (Auth::user()->can('createStudents')) {
            $coordinator = User::find(Auth::user()->id);
            $classrooms = Classroom::where('school_id', '=', $coordinator->coordinator->school_id)->get();

            return view('students.create', compact('classrooms'));
        }
        abort(403);
    }
}
