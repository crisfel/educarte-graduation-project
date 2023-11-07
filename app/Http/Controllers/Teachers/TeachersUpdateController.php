<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\UseCases\Contracts\Teachers\UpdateTeachersUseCaseInterface;
use Illuminate\Http\Request;

class TeachersUpdateController extends Controller
{
    private UpdateTeachersUseCaseInterface $updateTeachersUseCase;

    public function __construct(UpdateTeachersUseCaseInterface $updateTeachersUseCase)
    {
        $this->updateTeachersUseCase = $updateTeachersUseCase;
    }
    public function update(Request $request)
    {
        $fields = [
            'name'=>'required|string',
            'email'=>'required|string|email|max:255',
            'phone'=>'required|string',
        ];
        $message = [
            'required'=>':attribute es requerido',
        ];
        $this->validate($request, $fields, $message);
        $this->updateTeachersUseCase->handle(
            $request->input('name'),
            $request->input('email'),
            $request->input('phone'),
            $request->input('password'),
            $request->input('user_id'),
        );
        return redirect('/teachers')->with('updateachsuccess', 'Profesor modificado');
    }
}
