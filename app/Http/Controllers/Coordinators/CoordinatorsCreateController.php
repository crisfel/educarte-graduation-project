<?php

namespace App\Http\Controllers\Coordinators;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoordinatorsCreateController extends Controller
{
    public function create()
    {
        if (Auth::user()->can('createCoordinator')) {
        $schools = School::all();
        $users = User::where('role', 'like', 'Coordinator')->get();
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

        return view('coordinators.create', compact('freeSchools'));
    }
        abort(403);
    }
}
