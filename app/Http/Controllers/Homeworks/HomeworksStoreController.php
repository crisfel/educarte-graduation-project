<?php

namespace App\Http\Controllers\Homeworks;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use App\Models\Uploaded_homework;
use App\Models\User;
use Illuminate\Http\Request;

class HomeworksStoreController extends Controller
{
    public function store(Request $request)
    {
        $fields = [
            'title'=>'required|string',
            'percent'=>'required|string',
            'description'=>'required|string',
            'requiredFile'=>'required|string'
        ];
        $message = [
            'required'=>':attribute es requerido',
        ];
        $this->validate($request, $fields, $message);
        $percentAcum = 0;
        $homeworks = Homework::where('classroom_id',$request->input('classroom_id'))->get();
        foreach ($homeworks as $homework) {
            $percentAcum += $homework->percent;
        }
        $virtualPercent = $percentAcum + $request->input('percent');
        if ($virtualPercent > 100) {
            $freePercent = 100 - $percentAcum;
            return redirect('/homeworks/'.$request->input('classroom_id'))->with('PercentHomeworkError', 'Supero el 100%, tiene '.$freePercent.'% para usar');
        }
        $homework = new Homework();
        $dueDate = $request->input('due_date');
        $dueTime = $request->input('due_time');
        //return var_dump($inputDueDate);
        $homework->title = $request->input('title');
        $homework->description = $request->input('description');
        $homework->percent = $request->input('percent');
        $homework->requiredFile = $request->input('requiredFile');
        if (isset($dueDate) && isset($dueTime)) {
            $homework->due_date = $dueDate;
            $homework->due_time = $dueTime;
        }
        $homework->due_time = $request->input('due_time');
        $homework->classroom_id = $request->input('classroom_id');
        $homework->save();
        $students = User::where('role', 'like', 'Student')->get();
        $classroom_id = $request->input('classroom_id');
        foreach ($students as $index => $student) {
            if ($student->student->classroom_id != $classroom_id) {
                $students->pull($index);
            }
        }
        foreach ($students as $student) {
            $uploaded_homework = new Uploaded_homework();
            $uploaded_homework->path = null;
            $uploaded_homework->score = 0;
            $uploaded_homework->homework_id = $homework->id;
            $uploaded_homework->user_id = $student->id;
            $uploaded_homework->save();
        }

        return redirect('/homeworks/'.$request->input('classroom_id'))->with('StoreHomeworkSuccess', 'Tarea creada');
    }
}
