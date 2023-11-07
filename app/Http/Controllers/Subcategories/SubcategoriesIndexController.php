<?php

namespace App\Http\Controllers\Subcategories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubcategoriesIndexController extends Controller
{
    public function index($id)
    {
        if (Auth::user()->can('seeSubcategory')) {
            $category = Category::find($id);
            $subcategories = Subcategory::where('category_id', '=', $id)->get();
            return view('subcategories.index', compact('subcategories', 'id', 'category'));
        }
        abort(403);
    }

}
