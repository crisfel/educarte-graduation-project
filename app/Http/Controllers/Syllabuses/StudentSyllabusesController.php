<?php

namespace App\Http\Controllers\Syllabuses;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentSyllabusesController extends Controller
{
    public function showStudentSyllabus()
    {
        $user = User::find(Auth::user()->id);
        $classroom_id = $user->student->classroom->id;
        return redirect('/syllabus?classroom_id='.$classroom_id);
    }
}
