<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesEditController extends Controller
{
    public function edit($id)
    {
        if (Auth::user()->can('editCategory')) {
            $category = Category::find($id);
            return view('categories.edit', compact('category'));
        }
        abort(403);
    }
}
