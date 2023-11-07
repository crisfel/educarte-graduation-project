<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesIndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('seeCategory')) {
            $categories = Category::all();
            return view('categories.index', compact('categories'));
        }
        abort(403);
    }
}
