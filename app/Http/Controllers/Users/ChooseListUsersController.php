<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChooseListUsersController extends Controller
{
    public function chooseList(Request $request)
    {
        $id = $request->input('id');

        return view('users.chooseList', compact('id'));
    }
}
