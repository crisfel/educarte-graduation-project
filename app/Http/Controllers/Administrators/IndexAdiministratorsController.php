<?php

namespace App\Http\Controllers\Administrators;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexAdiministratorsController extends Controller
{
    public function index()
    {
        $administrators = User::where('role', '=', 'Administrator')->get();
        return view('administrators.index', compact('administrators'));
    }
}
