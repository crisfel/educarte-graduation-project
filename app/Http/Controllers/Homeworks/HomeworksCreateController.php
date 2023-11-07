<?php

namespace App\Http\Controllers\Homeworks;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeworksCreateController extends Controller
{
    public function create($id)
    {
        if (Auth::user()->can('createHomeworks')) {
            $user = User::find(Auth::user()->id);
            //$classrooms = Classroom::where('user_id', '=', $user->id)->get();

            return view('homeworks.create', compact('id'));
        }
        abort(403);
    }
}
