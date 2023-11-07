<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesDeleteController extends Controller
{
    public function delete(Request $request)
    {
        Category::destroy($request->input('category_id'));
        return back()->with('delecategosuccess','Categoría eliminada');

    }
}
