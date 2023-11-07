<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomsCreateController extends Controller
{
    public function create()
    {
        if (Auth::user()->can('createClassrooms')) {
            $coordinator = User::find(Auth::user()->id);
            $teachers = User::where('role', 'like', 'Teacher')->get();
            return view('classrooms.create', compact('teachers', 'coordinator'));
        }
        abort(403);
    }
}
