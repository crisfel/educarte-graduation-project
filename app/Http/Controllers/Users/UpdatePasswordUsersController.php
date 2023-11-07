<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordUsersController extends Controller
{
    public function updatePassword(Request $request)
    {
        $fields = [
            'oldPass'=>'required|string',
            'newPass1'=>'required|string',
            'newPass2'=>'required|string',
        ];
        $message = [
            'required'=>':attribute es requerido',
        ];
        $this->validate($request, $fields, $message);
        $user = User::find(Auth::user()->id);
        $id = $user->id;
        $oldPass = $request->input('oldPass');
        $oldPass2 = Auth::user()->password;
        if (Hash::check($oldPass, $oldPass2)) {
            if ($request->input('newPass1') == $request->input('newPass2')) {
                $user->password = Hash::make($request->input('newPass1'));
                $user->save();

                return back()->with('messageSuccess', 'Contraseña modificada con éxito');
            }
        }

        return back()->with('failChange','No se pudo cambiar la contraseña');
    }
}
