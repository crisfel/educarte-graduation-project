<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportUsersController extends Controller
{
    public function import(Request $request)
    {
        $fields = [
            'userList'=>'required|mimes:xlsx,csv'
        ];
        $message = [
            'required'=>':attribute es requerido'
        ];
        $this->validate($request, $fields, $message);
        $file = $request->file('userList');
        Excel::import(new UsersImport(), $file);
        return back()->with('UsersImportSuccess', 'Importación de usuarios satisfactoria');
    }
}
