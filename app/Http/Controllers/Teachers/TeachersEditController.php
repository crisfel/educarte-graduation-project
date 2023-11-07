<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachersEditController extends Controller
{
    public function edit($id)
    {
        if (Auth::user()->can('editTeachers') ) {
            $schools = School::all();
            $user = User::find($id);
            return view('teachers.edit', compact('user','schools', 'id'));
        }
        abort(403);
    }
}
