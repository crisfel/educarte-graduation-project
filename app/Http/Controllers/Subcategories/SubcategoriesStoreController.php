<?php

namespace App\Http\Controllers\Subcategories;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

class SubcategoriesStoreController extends Controller
{
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
        $subcategory = new Subcategory();
        $subcategory->name = $request->input('name');
        $subcategory->icon_url = '';
        $subcategory->description = $request->input('description');
        $subcategory->category_id = $request->input('category_id');
        $subcategory->save();
        if ($request->hasFile('icon_url')) {
            $pathName = Sprintf('subcategory_images/%s.png', $subcategory->id);
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
                                ->getPathPrefix() . 'subcategory_images/' . $subcategory->id . '.png', 'r'),
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'subcategory_images'
                    ]
                ]
            ]);
            $subcategory->icon_url = 'storage/subcategory_images/' . $subcategory->id . '.png';
            $subcategory->save();
        }
        unlink(storage_path('app/public/subcategory_images/'.$subcategory->id.'.png'));

        return redirect('/subcategories/'.$subcategory->category_id)->with('storesubcasuccess', 'Subcategoría agregada');
    }
}
