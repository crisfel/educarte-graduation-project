<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Teachers\DeleteTeachersUseCaseInterface;
use Illuminate\Http\Request;

class TeachersDeleteController extends Controller
{
    private DeleteTeachersUseCaseInterface $deleteTeachersUseCase;

    public function __construct(DeleteTeachersUseCaseInterface $deleteTeachersUseCase)
    {
        $this->deleteTeachersUseCase = $deleteTeachersUseCase;
    }

    public function delete(Request $request)
    {
        $this->deleteTeachersUseCase->handle(
            $request->input('user_id')
        );

        return back()->with('deleteteachersuccess','Profesor eliminado');

    }
}
