<?php

namespace App\Http\Controllers\Coordinators;

use App\Http\Controllers\Controller;
use App\Models\Coordinator;
use App\Models\User;
use Illuminate\Http\Request;

class CoordinatorsChangeStatusController extends Controller
{
    public function changeStatusCoordinator(Request $request)
    {
        $coordinator =  User::find($request->input('id'));
        $coordinator->is_enable = $request->input('status');
        $coordinator->save();
        return back();
    }
}
