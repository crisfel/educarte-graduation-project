<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use App\Models\Student;
use App\Models\Uploaded_homework;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsClassroomUpdateController extends Controller
{
    public function classroomUpdate(Request $request)
    {
        $ids = explode(',',$request->input('cart'));
        if ($ids[0] == "") {
            return redirect('/transfers')->with('transfersError', 'No selecciono ningun estudiante');
        }
        foreach ($ids as $id) {
            $uploadedHomeworks = Uploaded_homework::where('user_id', $id)->get();
            foreach ($uploadedHomeworks as $uphomework) {
                Uploaded_homework::destroy($uphomework->id);
            }
            $student = Student::where('user_id', '=', $id)->first();
            $student->classroom_id = $request->input('classroom_id');
            $student->save();
            $homeworks = Homework::where('classroom_id', $request->input('classroom_id'))->get();
            foreach($homeworks as $homework) {
                $upHomework = new Uploaded_homework();
                $upHomework->path = null;
                $upHomework->score = 0;
                $upHomework->homework_id = $homework->id;
                $upHomework->user_id = $id;
                $upHomework->save();
            }
        }

        return redirect('/students/all')->with('transfersSuccess', 'Transferencias exitosas');
    }
}
