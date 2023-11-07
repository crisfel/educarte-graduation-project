<?php

namespace App\Http\Controllers\UploadedHomeworks;

use App\Http\Controllers\Controller;
use App\Models\Uploaded_homework;
use App\Models\User;
use Illuminate\Http\Request;

class UploadedHomeworksIndexController extends Controller
{
    public function index($id)
    {
        $student = User::find($id);
        $uploaded_homeworks = Uploaded_homework::where('user_id', '=', $id)->get();

        return view('uploadedHomeworks.index', compact('uploaded_homeworks','student'));
    }
}
