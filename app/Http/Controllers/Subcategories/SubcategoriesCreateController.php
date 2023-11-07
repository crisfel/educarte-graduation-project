<?php

namespace App\Http\Controllers\Subcategories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubcategoriesCreateController extends Controller
{
    public function create($id)
    {
        if (Auth::user()->can('createSubcategory')) {
        $categories = Category::all();
        return view('subcategories.create', compact('categories','id'));
        }
        abort(403);
    }
}
