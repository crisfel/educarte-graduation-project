<?php

namespace App\Http\Controllers\Homeworks;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeworksEditController extends Controller
{
    public function edit($id, $classroom_id)
    {
        if (Auth::user()->can('editHomeworks')) {
            $homework = Homework::find($id);

            return view('homeworks.edit', compact('homework', 'id', 'classroom_id'));
        }
        abort(403);
    }
}
