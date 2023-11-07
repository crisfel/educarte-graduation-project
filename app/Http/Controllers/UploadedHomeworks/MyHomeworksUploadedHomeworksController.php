<?php

namespace App\Http\Controllers\UploadedHomeworks;

use App\Http\Controllers\Controller;
use App\Models\Uploaded_homework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyHomeworksUploadedHomeworksController extends Controller
{
    public function myHomeworks()
    {
        $user_id = Auth::user()->id;
        $myHomeworks = Uploaded_homework::where('user_id',$user_id)->get();
        return view('uploadedHomeworks.myHomeworks', compact('myHomeworks'));
    }
}
