<?php

namespace App\Http\Controllers\Homeworks;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworksDeleteController extends Controller
{
    public function delete(Request $request)
    {
        Homework::destroy($request->input('homework_id'));

        return back()->with('DeleHomeworkSuccess', 'Tarea eliminada');
    }
}
