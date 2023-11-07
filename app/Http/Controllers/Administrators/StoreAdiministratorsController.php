<?php

namespace App\Http\Controllers\Administrators;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreAdiministratorsController extends Controller
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
            'password'=>'required|string',
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
        $user->role = 'Administrator';
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $user->assignRole('Administrator');

        return redirect('/administrators')->with('StoreAdministratorsSuccess', 'Administrador agregado');
    }
}
