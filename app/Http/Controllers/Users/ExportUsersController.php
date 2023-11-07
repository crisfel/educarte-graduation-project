<?php

namespace App\Http\Controllers\Users;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportUsersController extends Controller
{
    public function export($id)
    {
        if ($id == 'coord') {
            return Excel::download(new UsersExport($id), 'LISTA DE COORDINADORES.xlsx');
        }
        if ($id == 'teach') {
            return Excel::download(new UsersExport($id), 'LISTA DE PROFESORES.xlsx');
        }
        if ($id == 'stud') {
            return Excel::download(new UsersExport($id), 'LISTA DE ESTUDIANTES.xlsx');
        }
    }
}
