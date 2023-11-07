<?php

namespace App\Http\Controllers\Coordinators;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoordinatorsEditController extends Controller
{
    public function edit($id)
    {
        if(Auth::user()->can('editCoordinators')) {
            $users = User::where('role', 'like', 'Coordinator')->get();
            $user = User::find($id);
            $schools = School::all();
            $freeSchools = Array();
            for ($i=0; $i<count($schools); $i++) {
                array_push($freeSchools, $schools[$i]);
                for ($j=0; $j < count($users); $j++) {
                    if (isset($users[$j]->coordinator->school_id) && $schools[$i]->id == $users[$j]->coordinator->school_id) {
                        array_pop($freeSchools);
                        break;
                    }
                }
            }
            $school = School::find($user->coordinator->school_id);
            array_push($freeSchools, $school);

            return view('coordinators.edit', compact('user', 'freeSchools','id'));
        }
        abort(403);
    }
}
