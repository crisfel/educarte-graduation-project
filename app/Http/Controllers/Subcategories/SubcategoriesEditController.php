<?php

namespace App\Http\Controllers\Subcategories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubcategoriesEditController extends Controller
{
    public function edit($id)
    {
        if (Auth::user()->can('editSubcategory')) {
            $subcategory = Subcategory::find($id);
            $categories = Category::all();
            return view('subcategories.edit', compact('subcategory', 'categories', 'id'));
        }
        abort(403);
    }
}
