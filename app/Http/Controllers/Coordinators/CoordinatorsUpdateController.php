<?php

namespace App\Http\Controllers\Coordinators;

use App\Http\Controllers\Controller;
use App\Models\Coordinator;
use App\Models\User;
use Illuminate\Http\Request;

class CoordinatorsUpdateController extends Controller
{
    public function update(Request $request)
    {
        /*
        $coordinator = Coordinator::where('school_id', '=', $request->input('school_id'))->first();
        if (isset($coordinator)) {
            return back()->with('assignedSchool', 'El colegio seleccionado ya tiene coordinador');
        }
        */
        $fields = [
            'name'=>'required|string',
            'email'=>'required|string|email|max:255',
            'phone'=>'required|string',
            'school_id'=>'required|string',
        ];
        $message = [
            'required'=>':attribute es requerido',
        ];
        $this->validate($request, $fields, $message);
        $user = User::find($request->input('user_id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        if (isset($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        $coordinator = Coordinator::where('user_id', '=', $user->id)->first();
        $coordinator->school_id = $request->input('school_id');
        $coordinator->save();

        return redirect('/coordinators')->with('updacoordinatorsuccess', 'Coordinador modificado');
    }
}
