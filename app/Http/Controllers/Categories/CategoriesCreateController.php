<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesCreateController extends Controller
{
    public function create()
    {
        if (Auth::user()->can('createCategory')) {
            return view('categories.create');
        }
        abort(403);
    }
}
