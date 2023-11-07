<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\UseCases\Contracts\Schools\StoreSchoolsUseCaseInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

/**
 * Class SchoolStoreController
 * @package App\Http\Controllers\Schools
 * @author Cristian Delgado
 */
class SchoolStoreController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private StoreSchoolsUseCaseInterface $storeSchoolsUseCase;

    /**
     * @param StoreSchoolsUseCaseInterface $storeSchoolsUseCase
     */
    public function __construct(StoreSchoolsUseCaseInterface $storeSchoolsUseCase)
    {
        $this->storeSchoolsUseCase = $storeSchoolsUseCase;
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws GuzzleException
     */
    public function store(Request $request)
    {
        $fields = [
            'name'=>'required|string',
            'address'=>'required|string',
            'city'=>'required|string',
            'country'=>'required|string',
            'icon_url'=>'required|mimes:jpg,jpeg,png',
        ];
        $message = [
            'required'=>':attribute es requerido',
        ];
        $this->validate($request, $fields, $message);

        $this->storeSchoolsUseCase->handle(
            $request->input('name'),
            $request->input('address'),
            $request->input('city'),
            $request->input('country'),
            true,
            $request->file('icon_url')
        );
        return redirect('/schools')->with('storeschoolsuccess','Colegio agregado');
    }
}
