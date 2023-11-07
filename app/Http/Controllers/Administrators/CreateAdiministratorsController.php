<?php

namespace App\Http\Controllers\Administrators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateAdiministratorsController extends Controller
{
    public function create()
    {
        return view('administrators.create');
    }
}
