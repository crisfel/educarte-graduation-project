<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\UseCases\Contracts\Schools\StoreSchoolsUseCaseInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

/**
 *
 */
class CategoriesStoreController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function store(Request $request)
    {
        $fields = [
            'name'=>'required|string',
            'description'=>'required|string',
            'icon_url'=>'required|mimes:jpg,jpeg,png',
        ];
        $message = [
            'required'=>':attribute es requerido',
        ];
        $this->validate($request, $fields, $message);


        $category = new Category();
        $category->name = $request->input('name');
        $category->icon_url = '';
        $category->description = $request->input('description');
        $category->save();
        if ($request->hasFile('icon_url')) {
            $pathName = Sprintf('category_images/%s.png', $category->id);
            Storage::disk('public')->put($pathName, file_get_contents($request->file('icon_url')));
            $client = new Client();
            $url = "https://miel.robotschool.co/upload.php";
            $client->request(RequestAlias::METHOD_POST, $url, [
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => fopen(
                            Storage::disk('public')
                                ->getDriver()
                                ->getAdapter()
                                ->getPathPrefix() . 'category_images/' . $category->id . '.png', 'r'),
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'category_images'
                    ]
                ]
            ]);
            $category->icon_url = '/storage/category_images/' . $category->id . '.png';
            $category->save();
        }
        unlink(storage_path('app/public/category_images/'.$category->id.'.png'));

        return redirect('/categories')->with('stocategosuccess', 'Categoría agregada');
    }
}
