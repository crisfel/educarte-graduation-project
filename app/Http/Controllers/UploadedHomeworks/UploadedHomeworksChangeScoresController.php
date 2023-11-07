<?php

namespace App\Http\Controllers\UploadedHomeworks;

use App\Http\Controllers\Controller;
use App\Models\Uploaded_homework;
use Illuminate\Http\Request;

class UploadedHomeworksChangeScoresController extends Controller
{
    public function changeScores(Request $request)
    {
        $ids = explode(',', $request->input('ids'));
        $scores = explode(',', $request->input('scores'));
        for ($i=0; $i<count($ids); $i++) {
            if ($scores[$i] != "" && $scores[$i] >= 0 && $scores[$i] <= 50) {
               $uphomework =  Uploaded_homework::find($ids[$i]);
               $uphomework->score = $scores[$i];
               $uphomework->status = 'graded';
               $uphomework->save();
            }
        }

        return back()->with('UpdaUphomeworksSuccess', 'Calificaciones registradas');
    }
}
