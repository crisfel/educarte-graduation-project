<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesDescriptionController extends Controller
{
    public function description($id)
    {
        $category = Category::find($id);
        return view('categories.description', compact('category'));
    }
}
