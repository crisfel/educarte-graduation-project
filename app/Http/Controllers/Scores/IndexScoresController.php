<?php

namespace App\Http\Controllers\Scores;

use App\Http\Controllers\Controller;
use App\Models\Uploaded_homework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexScoresController extends Controller
{
    public function index()
    {
        $acum = 0;
        $upHomeworks = Uploaded_homework::where('user_id', Auth::user()->id)->get();
        foreach ($upHomeworks as $upHomework) {
            $acum += ($upHomework->homework->percent/100) * $upHomework->score;
        }
        return view('scores.index', compact('upHomeworks', 'acum'));
    }
}
