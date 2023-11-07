<?php

namespace App\Http\Controllers\Syllabuses;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Project;
use App\Models\Syllabus;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ShowSyllabusesController extends Controller
{
    public function show($id)
    {
        $subcategories = Array();
        $classroom = Classroom::find($id);
        $syllabus = Syllabus::where('classroom_id', $id)->get();
        foreach ($syllabus as $value) {
            $i=0;
            $mysubcategory = $value->project->subcategory;
                foreach ($subcategories as $subcategory) {
                    if ($subcategory->id == $mysubcategory->id) {
                        $i++;
                    }
                }
                if ($i == 0) {
                    array_push($subcategories, $mysubcategory);
                }
            }
        $pdf = PDF::loadView('syllabuses.show',compact('classroom', 'syllabus', 'subcategories'));

        return $pdf->stream('theme'.$id.'.pdf');
    }


}
