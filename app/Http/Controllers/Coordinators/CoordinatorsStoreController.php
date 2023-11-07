<?php

namespace App\Http\Controllers\Coordinators;

use App\Http\Controllers\Controller;
use App\Models\Coordinator;
use App\Models\User;
use Illuminate\Http\Request;

class CoordinatorsStoreController extends Controller
{
    public function store(Request $request)
    {
        $foreignUser = User::where('email','=', $request->input('email'))->first();
        if (isset($foreignUser)) {

            return back()->with('existingEmail', 'El correo insertado ya existe');
        }
        $fields = [
            'name'=>'required|string',
            'email'=>'required|string|email|max:255',
            'phone'=>'required|string',
            'school_id'=>'required|string',
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
        $user->password = bcrypt($request->input('password'));
        $user->role = 'Coordinator';
        $user->is_enable = 1;
        $user->save();
        $user = User::where('email', 'like', $request->input('email'))->first();
        $coordinator = new Coordinator();
        $coordinator->user_id = $user->id;
        $coordinator->school_id = $request->input('school_id');
        $coordinator->save();
        $user->assignrole('Coordinator');
        return redirect('/coordinators')->with('storecoordinatorsuccess', 'Coordinador agregado');
    }
}
