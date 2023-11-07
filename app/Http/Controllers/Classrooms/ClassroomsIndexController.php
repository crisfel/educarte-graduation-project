<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomsIndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('seeClassrooms')) {
            if (Auth::user()->role == 'Coordinator') {
            $coordinator = User::find(Auth::user()->id);
            $classrooms = Classroom::all();
                foreach ($classrooms as $index => $classroom) {
                    if ($classroom->school_id != $coordinator->coordinator->school_id) {
                        $classrooms->pull($index);
                    }
                }

            return view('classrooms.index', compact('classrooms', 'coordinator'));
            }
            $teacher = User::find(Auth::user()->id);
            $classrooms = Classroom::where('user_id', '=', $teacher->id)->get();

            return view('classrooms.index', compact('classrooms'));
        }
        abort(403);
    }
}
