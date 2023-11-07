<?php

namespace App\Http\Controllers\Coordinators;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CoordinatorsDeleteController extends Controller
{
    public function delete(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $user->delete();

        return redirect('/coordinators')->with('deletecoordinatorsuccess','Coordinador eliminado');
    }
}
