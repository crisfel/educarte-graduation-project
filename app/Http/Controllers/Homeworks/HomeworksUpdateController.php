<?php

namespace App\Http\Controllers\Homeworks;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworksUpdateController extends Controller
{
    public function update(Request $request)
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
        $homework = Homework::find($request->input('homework_id'));
        $dueDate = $request->input('due_date');
        $dueTime = $request->input('due_time');
        $percentAcum = 0;
        $homeworks = Homework::where('classroom_id',$request->input('classroom_id'))->get();
        foreach ($homeworks as $value) {
            $percentAcum += $value->percent;
        }
        $percentAcum = $percentAcum - $homework->percent;
        $virtualPercent = $percentAcum + $request->input('percent');
        if ($virtualPercent > 100) {
            return redirect('/homeworks/'.$request->input('classroom_id'))->with('PercentHomeworkError', 'Supero el 100%');
        }
        $homework->title = $request->input('title');
        $homework->description = $request->input('description');
        $homework->percent= $request->input('percent');
        $homework->requiredFile = $request->input('requiredFile');
        $homework->due_date = $request->input('due_date');
        $homework->due_time = $request->input('due_time');
        $homework->save();

        return redirect('/homeworks/'.$homework->classroom_id)->with('UpdaHomeworkSuccess', 'Tarea modifcada');
    }
}
