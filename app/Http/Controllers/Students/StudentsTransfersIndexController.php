<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsTransfersIndexController extends Controller
{
    public function transfers()
    {
        $coordinator = User::find(Auth::user()->id);
        $students = User::where('role', 'like', 'Student')->get();
        foreach ($students as $index => $student) {
            if ($student->student->school_id != $coordinator->coordinator->school_id) {
                $students->pull($index);
            }
        }
        $classrooms = Classroom::where('school_id', '=', $coordinator->coordinator->school_id)->get();

        return view('students.transfers', compact('coordinator', 'students', 'classrooms'));
    }
}
