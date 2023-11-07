<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use App\UseCases\Contracts\Teachers\ChangeStatusTeachersUseCaseInterface;
use Illuminate\Http\Request;

class TeachersChangeStatusController extends Controller
{
    private ChangeStatusTeachersUseCaseInterface $changeStatusTeachersUseCase;

    public function __construct(ChangeStatusTeachersUseCaseInterface $changeStatusTeachersUseCase)
    {
        $this->changeStatusTeachersUseCase = $changeStatusTeachersUseCase;
    }

    public function changeStatusTeacher(Request $request)
    {
        $this->changeStatusTeachersUseCase->handle(
            $request->input('id'),
            $request->input('status')
        );

        return back();
    }
}
