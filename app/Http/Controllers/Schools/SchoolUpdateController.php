<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\School;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

class SchoolUpdateController extends Controller
{
    public function update(Request $request)
    {
        $fields = [
            'name'=>'required|string',
            'address'=>'required|string',
            'city'=>'required|string',
            'country'=>'required|string',
            'icon_url'=>'mimes:jpg,jpeg,png',
        ];
        $message = [
            'required'=>':attribute es requerido',
        ];
        $this->validate($request, $fields, $message);

        $school =  School::find($request->input('school_id'));
       $school->name = $request->input('name');
       $school->address = $request->input('address');
       $school->city = $request->input('city');
       $school->country = $request->input('country');
       $school->save();

       if ($request->hasFile('icon_url')) {
           $pathName = Sprintf('school_logos/%s.png', $school->id);
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
                               ->getPathPrefix() . 'school_logos/' . $school->id . '.png', 'r'),
                   ],
                   [
                       'name' => 'path',
                       'contents' => 'school_logos'
                   ]
               ]
           ]);
           $school->icon_url = 'storage/school_logos/'.$school->id.'.png';
           $school->save();
           unlink(storage_path('app/public/school_logos/'.$school->id.'.png'));

           return redirect('/schools')->with('updaschoolsuccess', 'Colegio modificado');
       }

       return redirect('/schools')->with('updaschoolsuccess', 'Colegio modificado');
    }
}
