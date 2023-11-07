<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachersIndexController extends Controller
{

    public function index()
    {
        if (Auth::user()->can('seeTeachers') ) {
            /**
             * @var TYPE_NAME $teachers
             */
            $coordinator = User::find(Auth::user()->id);
            $teachers = User::where('role', 'like', 'Teacher')->get();
            foreach ($teachers as $index => $teacher) {
                if ($teacher->teacher->school_id != $coordinator->coordinator->school_id) {
                    $teachers->pull($index);
                }
            }

            return view('teachers.index', compact('teachers', 'coordinator'));
        }
        abort(403);
    }
}
