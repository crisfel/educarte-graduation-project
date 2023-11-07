<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\AcademicHistory;
use App\Models\Homework;
use App\Models\Student;
use App\Models\Uploaded_homework;
use Illuminate\Http\Request;

class ClassroomsRefreshController extends Controller
{
    public function refresh($id)
    {
        $students = Student::where('classroom_id', $id)->get();

        foreach ($students as $student) {
            $upHomeworks = Uploaded_homework::where('user_id',$student->user->id)->get();
            $totalScore = 0;
            foreach ($upHomeworks as $upHomework) {
                $totalScore += ($upHomework->score)*($upHomework->homework->percent/100);
            }
            $academicHistory = new AcademicHistory();
            $academicHistory->user_id = $student->user->id;
            $academicHistory->classroom_id = $id;
            $academicHistory->totalScore = $totalScore;
            $academicHistory->save();
        }
        foreach ($students as $student) {
            $student->classroom_id = null;
            $student->save();
        }
        $homeworks = Homework::where('classroom_id', $id)->get();
        foreach ($homeworks as $homework) {
            Homework::destroy($homework->id);
        }

        return back()->with('RefreshSuccess', 'Curso reiniciado');
    }
}
