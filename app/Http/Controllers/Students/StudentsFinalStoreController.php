<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsFinalStoreController extends Controller
{
    public function finalStore(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->is_enable = 1;
        $user->role = 'Student';
        $user->password = $request->input('password');
        $user->save();
        $student = new Student();
        $student->user_id = $user->id;
        $student->school_id = $request->input('school_id');
        $student->classroom_id = $request->input('classroom_id');
        $student->save();
        return redirect('/students')->with('StoreStudentSuccess', 'Estudiante agregado');
    }
}
