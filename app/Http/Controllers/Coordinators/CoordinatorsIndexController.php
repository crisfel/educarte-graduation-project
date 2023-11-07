<?php

namespace App\Http\Controllers\Coordinators;

use App\Http\Controllers\Controller;
use App\Models\Coordinator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoordinatorsIndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('seeCoordinators')) {
        $coordinators = User::where('role', 'like', 'Coordinator')->get();
        return view('coordinators.index', compact('coordinators'));
        }
        abort(403);
    }
}
