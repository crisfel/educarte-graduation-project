<?php

namespace App\Http\Controllers\Homeworks;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Homework;
use App\Models\Uploaded_homework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeworksIndexController extends Controller
{
    public function index($id)
    {
        if (Auth::user()->can('seeHomeworks')) {
            if ($id == 'all') {
                $homeworks = Homework::all();
                return view('homeworks.index', compact('homeworks'));
            }
            $classroom = Classroom::find($id);
            $homeworks = Homework::where('classroom_id', '=', $id)->get();

            return view('homeworks.index', compact('homeworks', 'id', 'classroom'));
        }
        abort(403);
    }
}
