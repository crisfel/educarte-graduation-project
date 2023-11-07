<?php

namespace App\Http\Controllers\Subcategories;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoriesDeleteController extends Controller
{
    public function delete(Request $request)
    {
        Subcategory::destroy($request->input('subcategory_id'));
        return back()->with('delesubcasuccess', 'Subcategoría eliminada');
    }
}
