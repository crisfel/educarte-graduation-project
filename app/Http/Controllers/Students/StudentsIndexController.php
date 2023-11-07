<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsIndexController extends Controller
{
    public function index($id)
    {
        if (Auth::user()->can('seeStudents')) {
            $students = User::where('role', 'like', 'Student')->get();
            $classroom = Classroom::find($id);
            if(Auth::user()->role == 'Coordinator') {
            $coordinator = User::find(Auth::user()->id);
            if ($id == 'all') {
                foreach ($students as $index => $student) {
                    if ($student->student->school_id != $coordinator->coordinator->school_id) {
                        $students->pull($index);
                    }
                }

                return view('students.index', compact('students', 'coordinator'));
            }
            foreach ($students as $index => $student) {
                if ($student->student->school_id != $coordinator->coordinator->school_id
                    || $student->student->classroom_id != $classroom->id) {
                    $students->pull($index);
                }
            }

            return view('students.index', compact('students', 'coordinator'));
            }
            if(Auth::user()->role == 'Teacher') {
                $user = User::find(Auth::user()->id);
                if ($id == 'all') {
                    foreach ($students as $index => $student) {
                        if (is_null($student->student->classroom) || $student->student->classroom->user->id != Auth::user()->id) {
                            $students->pull($index);
                        }
                    }

                    return view('students.index', compact('students'));
                }
                foreach ($students as $index => $student) {
                    if ($student->student->classroom_id != $id) {
                        $students->pull($index);
                    }
                }

                return view('students.index', compact('students'));
            }
        }
        abort(403);
    }
}
