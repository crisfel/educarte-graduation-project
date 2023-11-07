<?php

namespace App\Http\Controllers\Scores;

use App\Http\Controllers\Controller;
use App\Models\AcademicHistory;
use App\Models\User;
use Illuminate\Http\Request;

class AcademicHistoriesScoresController extends Controller
{
    public function academicHistories($id)
    {
        $academicHistories = AcademicHistory::where('user_id', $id)->get();
        $user = User::find($id);

        return view('scores.academicHistories', compact('academicHistories', 'user'));
    }
}
