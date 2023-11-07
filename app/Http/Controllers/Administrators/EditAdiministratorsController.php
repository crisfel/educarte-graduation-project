<?php

namespace App\Http\Controllers\Administrators;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use function Symfony\Component\String\u;

class EditAdiministratorsController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);

        return view('administrators.edit', compact('user','id'));
    }
}
