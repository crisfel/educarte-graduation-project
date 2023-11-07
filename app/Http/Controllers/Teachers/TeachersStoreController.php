<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\UseCases\Contracts\Teachers\StoreTeachersUseCaseInterface;
use Illuminate\Http\Request;

class TeachersStoreController extends Controller
{

    private StoreTeachersUseCaseInterface $storeTeachersUseCase;

    public function __construct(StoreTeachersUseCaseInterface $storeTeachersUseCase){
        $this->storeTeachersUseCase = $storeTeachersUseCase;
    }

    public function store(Request $request)
    {
        $foreignUser = User::where('email','=', $request->input('email'))->first();
        if (isset($foreignUser)) {

            return back()->with('existingEmail', 'El correo insertado ya existe');
        }
        $fields = [
            'name'=>'required|string',
            'email'=>'required|string|email|max:255',
            'phone'=>'required|string',
            'password'=>'required|string'
        ];
        $message = [
            'required'=>':attribute es requerido',
        ];
        $this->validate($request, $fields, $message);

           $this->storeTeachersUseCase->handle(
           $request->input('name'),
           $request->input('email'),
           $request->input('phone'),
           $request->input('password'),
           true
       );

           return redirect('/teachers')->with('storeteachersuccess', 'Profesor agregado');

    }

}
