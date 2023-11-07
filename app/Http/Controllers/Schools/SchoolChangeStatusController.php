<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\UseCases\Contracts\Teachers\ChangeStatusTeachersUseCaseInterface;
use Illuminate\Http\Request;

class SchoolChangeStatusController extends Controller
{
    public function changeStatusSchool(Request $request)
    {
       $school =  School::find($request->input('id'));
       $school->is_enable = $request->input('status');
       $school->save();
       return back();
    }
}
