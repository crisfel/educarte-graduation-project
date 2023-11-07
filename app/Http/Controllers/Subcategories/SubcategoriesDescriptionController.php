<?php

namespace App\Http\Controllers\Subcategories;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoriesDescriptionController extends Controller
{
    public function description($id)
    {
        $subcategory = Subcategory::find($id);

        return view('subcategories.description', compact('subcategory'));
    }
}
