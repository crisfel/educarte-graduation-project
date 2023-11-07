<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsStoreController extends Controller
{
    public function store(Request $request)
    {
        //return $request;
        $foreignUser = User::where('email','=', $request->input('email'))->first();
        if (isset($foreignUser)) {

            return back()->with('existingEmail', 'El correo insertado ya existe');
        }
        $fields = [
            'name'=>'required|string',
            'email'=>'required|string|email|max:255',
            'phone'=>'required|string',
            'classroom_id'=>'required|string',
            'password'=>'required|string'
        ];
        $message = [
            'required'=>':attribute es requerido',
        ];
        $this->validate($request, $fields, $message);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->is_enable = 1;
        $user->role = 'Student';
        $user->password = bcrypt($request->input('password'));
        $user->save();
        $student = new Student();
        $student->user_id = $user->id;
        $coordinator = User::find(Auth::user()->id);
        $student->school_id = $coordinator->coordinator->school_id;
        $student->classroom_id = $request->input('classroom_id');
        $student->save();
        $user->assignRole('Student');

        return redirect('/students/all')->with('StoreStudentSuccess', 'Estudiante agregado');
    }
}
