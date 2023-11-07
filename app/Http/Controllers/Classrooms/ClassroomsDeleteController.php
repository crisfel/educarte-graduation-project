<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Classrooms\DeleteClassroomsUseCaseInterface;
use Illuminate\Http\Request;

class ClassroomsDeleteController extends Controller
{
    private DeleteClassroomsUseCaseInterface $deleteClassroomsUseCase;

    public function __construct(DeleteClassroomsUseCaseInterface $deleteClassroomsUseCase)
    {
        $this->deleteClassroomsUseCase = $deleteClassroomsUseCase;
    }

    public function delete(Request $request)
    {
        $this->deleteClassroomsUseCase->handle(
          $request->input('classroom_id')
        );

        return redirect('/classrooms')->with('deleclasssuccess','Aula eliminada');
    }
}
