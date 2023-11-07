<?php

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Student;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexStatisticsController extends Controller
{
    public function __invoke()
    {
        $coordinator = Auth::user();
        $school_id = $coordinator->coordinator->school_id;
        $students = Student::where('school_id', $school_id)->get();
        $subcategories = Subcategory::all();
        $arraySubcategories = array();
        $arrayCategories = array();
        $arrayCountSubcategories = array();
        $arrayCountCategories = array();

        foreach ($students as $student) {
            foreach ($subcategories as $subcategory) {
                $countProjects = Project::where([
                    ['user_id', $student->user->id],
                    ['subcategory_id', $subcategory->id]
                ])->count();

                if ($countProjects > 0) {
                    $key = array_search($subcategory->name, $arraySubcategories);

                    if (! $key) {
                        array_push($arraySubcategories, $subcategory->name);
                            //$key = array_search($subcategory->name, $arraySubcategories);
                            //array_splice($arrayCountSubcategories, $key, 0, $countProjects);
                        array_push($arrayCountSubcategories,  $countProjects);

                        $key = array_search($subcategory->category->name, $arrayCategories);

                        if (! $key) {
                            array_push($arrayCategories, $subcategory->category->name);
                            array_push($arrayCountCategories, $countProjects);
                        } else {
                            $arrayCountCategories[$key] += $countProjects;
                        }
                    } else {
                        $arrayCountSubcategories[$key] +=  $countProjects;
                        $key = array_search($subcategory->category->name, $arrayCategories);

                        if (! $key) {
                            array_push($arrayCategories, $subcategory->category->name);
                            array_push($arrayCountCategories, $countProjects);
                        } else {
                            $arrayCountCategories[$key] += $countProjects;
                        }
                    }
                }
            }
        }

        $subcategoryData = [
            'names' => json_encode($arraySubcategories, JSON_UNESCAPED_UNICODE),
            'counts' => json_encode($arrayCountSubcategories, JSON_UNESCAPED_UNICODE)
        ];

        $categoryData = [
            'names' =>  json_encode($arrayCategories, JSON_UNESCAPED_UNICODE),
            'counts' => json_encode($arrayCountCategories, JSON_UNESCAPED_UNICODE)
        ];

        return view('statistics.index', ['subcategoryData' => $subcategoryData,
            'categoryData' => $categoryData]);

    }

}
