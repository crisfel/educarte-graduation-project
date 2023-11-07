<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolIndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('seeSchools')) {
        $schools = School::where('is_deleted',0)->get();
        return view('Schools.index', compact('schools'));
        }
        abort(403);
    }
}
