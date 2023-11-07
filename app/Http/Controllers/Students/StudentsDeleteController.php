<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsDeleteController extends Controller
{
    public function delete(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->delete();

        return redirect('/students')->with('DeleteStudentSuccess', 'Estudiante eliminado');
    }
}
