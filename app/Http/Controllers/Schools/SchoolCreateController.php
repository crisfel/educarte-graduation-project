<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolCreateController extends Controller
{
    public function create()
    {
        if (Auth::user()->can('createSchool')) {
            return view('Schools.create');
        }
        abort(403);
    }
}
