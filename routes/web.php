<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {

        return redirect('/home');
    }

    return view('auth.login');
});

Auth::routes();


Route::group(['middleware' => ['auth', 'isEnabled', 'isDeletedSchool']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ADMINISTRATORS
    Route::get('/schools/create', [App\Http\Controllers\Schools\SchoolCreateController::class, 'create']);
    Route::post('/schools/store', [App\Http\Controllers\Schools\SchoolStoreController::class, 'store']);
    Route::get('/schools', [App\Http\Controllers\Schools\SchoolIndexController::class, 'index']);
    Route::post('/changeStatusSchool', [App\Http\Controllers\Schools\SchoolChangeStatusController::class, 'changeStatusSchool']);
    Route::get('/schools/edit/{id}', [App\Http\Controllers\Schools\SchoolEditController::class, 'edit']);
    Route::post('/schools/update', [App\Http\Controllers\Schools\SchoolUpdateController::class, 'update']);
    Route::post('/schools/delete', [App\Http\Controllers\Schools\SchoolDeleteController::class, 'delete']);

//COORDINATORS
    Route::get('/coordinators/create', [App\Http\Controllers\Coordinators\CoordinatorsCreateController::class, 'create']);
    Route::post('/coordinators/store', [App\Http\Controllers\Coordinators\CoordinatorsStoreController::class, 'store']);
    Route::get('/coordinators', [App\Http\Controllers\Coordinators\CoordinatorsIndexController::class, 'index']);
    Route::post('/changeStatusCoordinator', [App\Http\Controllers\Coordinators\CoordinatorsChangeStatusController::class, 'changeStatusCoordinator']);
    Route::get('/coordinators/edit/{id}', [App\Http\Controllers\Coordinators\CoordinatorsEditController::class, 'edit']);
    Route::post('/coordinators/update', [App\Http\Controllers\Coordinators\CoordinatorsUpdateController::class, 'update']);
    Route::post('/coordinators/delete', [App\Http\Controllers\Coordinators\CoordinatorsDeleteController::class, 'delete']);


//CATEGORIES
    Route::get('/categories/create', [App\Http\Controllers\Categories\CategoriesCreateController::class, 'create']);
    Route::post('/categories/store', [App\Http\Controllers\Categories\CategoriesStoreController::class, 'store']);
    Route::get('/categories/description/{id}', [App\Http\Controllers\Categories\CategoriesDescriptionController::class, 'description']);
    Route::get('/categories', [App\Http\Controllers\Categories\CategoriesIndexController::class, 'index']);
    Route::get('/categories/edit/{id}', [App\Http\Controllers\Categories\CategoriesEditController::class, 'edit']);
    Route::post('/categories/update', [App\Http\Controllers\Categories\CategoriesUpdateController::class, 'update']);
    Route::post('/categories/delete', [App\Http\Controllers\Categories\CategoriesDeleteController::class, 'delete']);


//SUBCATEGORIES
    Route::get('/subcategories/create/{id}', [App\Http\Controllers\Subcategories\SubcategoriesCreateController::class, 'create']);
    Route::post('/subcategories/store', [App\Http\Controllers\Subcategories\SubcategoriesStoreController::class, 'store']);
    Route::get('/subcategories/description/{id}', [App\Http\Controllers\Subcategories\SubcategoriesDescriptionController::class, 'description']);
    Route::get('/subcategories/{id}', [App\Http\Controllers\Subcategories\SubcategoriesIndexController::class, 'index']);
    Route::get('/subcategories/edit/{id}', [App\Http\Controllers\Subcategories\SubcategoriesEditController::class, 'edit']);
    Route::post('/subcategories/update', [App\Http\Controllers\Subcategories\SubcategoriesUpdateController::class, 'update']);
    Route::post('/subcategories/delete', [App\Http\Controllers\Subcategories\SubcategoriesDeleteController::class, 'delete']);

//TEACHERS
    Route::get('/teachers/create', [App\Http\Controllers\Teachers\TeachersCreateController::class, 'create']);
    Route::post('/teachers/store', [App\Http\Controllers\Teachers\TeachersStoreController::class, 'store']);
    Route::get('/teachers', [App\Http\Controllers\Teachers\TeachersIndexController::class, 'index']);
    Route::post('/changeStatusTeacher', [App\Http\Controllers\Teachers\TeachersChangeStatusController::class, 'changeStatusTeacher']);
    Route::get('/teachers/edit/{id}', [App\Http\Controllers\Teachers\TeachersEditController::class, 'edit']);
    Route::post('/teachers/update', [App\Http\Controllers\Teachers\TeachersUpdateController::class, 'update']);
    Route::post('/teachers/delete', [App\Http\Controllers\Teachers\TeachersDeleteController::class, 'delete']);

//CLASSROOMS
    Route::get('/classrooms/create', [App\Http\Controllers\Classrooms\ClassroomsCreateController::class, 'create']);
    Route::post('/classrooms/store', [App\Http\Controllers\Classrooms\ClassroomsStoreController::class, 'store']);
    Route::get('/classrooms', [App\Http\Controllers\Classrooms\ClassroomsIndexController::class, 'index']);
    Route::get('/classrooms/edit/{id}', [App\Http\Controllers\Classrooms\ClassroomsEditController::class, 'edit']);
    Route::post('/classrooms/update', [App\Http\Controllers\Classrooms\ClassroomsUpdateController::class, 'update']);
    Route::post('/classrooms/delete', [App\Http\Controllers\Classrooms\ClassroomsDeleteController::class, 'delete']);
    Route::get('/classrooms/refresh/{id}', [App\Http\Controllers\Classrooms\ClassroomsRefreshController::class, 'refresh']);

//STUDENTS
    Route::get('/students/create', [App\Http\Controllers\Students\StudentsCreateController::class, 'create']);
    Route::post('/students/store', [App\Http\Controllers\Students\StudentsStoreController::class, 'store']);
    Route::post('/students/finalSave', [App\Http\Controllers\Students\StudentsFinalStoreController::class, 'finalStore']);
    Route::get('/students/{id}', [App\Http\Controllers\Students\StudentsIndexController::class, 'index']);
    Route::get('/students/edit/{id}', [App\Http\Controllers\Students\StudentsEditController::class, 'edit']);
    Route::post('/students/update', [App\Http\Controllers\Students\StudentsUpdateController::class, 'update']);
    Route::post('/students/delete', [App\Http\Controllers\Students\StudentsDeleteController::class, 'delete']);
    Route::get('/transfers', [App\Http\Controllers\Students\StudentsTransfersIndexController::class, 'transfers']);
    Route::post('/studentsClassroomUpdate', [App\Http\Controllers\Students\StudentsClassroomUpdateController::class, 'classroomUpdate']);

//HOMEWORKS
    Route::get('/homeworks/create/{id}', [App\Http\Controllers\Homeworks\HomeworksCreateController::class, 'create']);
    Route::post('/homeworks/store', [App\Http\Controllers\Homeworks\HomeworksStoreController::class, 'store']);
    Route::get('/homeworks/{id}', [App\Http\Controllers\Homeworks\HomeworksIndexController::class, 'index']);
    Route::get('/homeworks/edit/{id}/{classroom_id}', [App\Http\Controllers\Homeworks\HomeworksEditController::class, 'edit']);
    Route::post('/homeworks/update', [App\Http\Controllers\Homeworks\HomeworksUpdateController::class, 'update']);
    Route::post('/homeworks/delete', [App\Http\Controllers\Homeworks\HomeworksDeleteController::class, 'delete']);

//UPLOADED_HOMEWORKS
    Route::get('/uploadedHomeworks/{id}', [App\Http\Controllers\UploadedHomeworks\UploadedHomeworksIndexController::class, 'index']);
    Route::post('/uploadedHomeworks/changeScores', [App\Http\Controllers\UploadedHomeworks\UploadedHomeworksChangeScoresController::class, 'changeScores']);
    Route::get('/myHomeworks', [App\Http\Controllers\UploadedHomeworks\MyHomeworksUploadedHomeworksController::class, 'myHomeworks']);
    Route::get('/detailMyHomework/{id}', [App\Http\Controllers\UploadedHomeworks\DetailMyHomeworksUploadedHomeworksController::class, 'detailMyHomework']);
    Route::post('/uploadMyHomework', [App\Http\Controllers\UploadedHomeworks\UploadMyHomeworkUploadedHomeworksController::class, 'uploadMyHomework']);

//PROJECTS
    Route::get('/myCategories', [App\Http\Controllers\Projects\MyCategoriesProjectsController::class, 'myCategories']);
    Route::get('/mySubcategories/{id}', [App\Http\Controllers\Projects\MySubcategoriesProjectsController::class, 'mySubcategories']);
    Route::post('/project/create', [App\Http\Controllers\Projects\CreateProjectsController::class, 'create']);
    Route::post('/project/store', [App\Http\Controllers\Projects\StoreProjectsController::class, 'store']);
    Route::get('/projects', [App\Http\Controllers\Projects\indexProjectsController::class, 'index']);
    Route::get('/detailProject/{id}', [App\Http\Controllers\Projects\DetailProjectProjectsController::class, 'detailProject']);
    Route::get('/showDocument/{id}', [App\Http\Controllers\Projects\ShowDocumentProjectsController::class, 'showDocument']);
    Route::post('/changeStatusProject', [App\Http\Controllers\Projects\ChangeStatusProjectsController::class, 'changeStatus']);
    Route::get('/project/edit/{id}', [App\Http\Controllers\Projects\EditProjectsController::class, 'edit']);
    Route::post('/project/update', [App\Http\Controllers\Projects\UpdateProjectsController::class, 'update']);
    Route::post('/project/delete', [App\Http\Controllers\Projects\DeleteProjectsController::class, 'delete']);
    Route::get('/project/creation-type/{id}', [App\Http\Controllers\Projects\CreationTypeProjectsController::class, 'creationType']);

//SYLLABUS
    Route::get('/syllabus', [App\Http\Controllers\Syllabuses\IndexSyllabusesController::class, 'index']);
    Route::get('/syllabus/create', [App\Http\Controllers\Syllabuses\CreateSyllabusesController::class, 'create']);
    Route::post('/syllabus/store', [App\Http\Controllers\Syllabuses\StoreSyllabusesController::class, 'store']);
    Route::get('/syllabus/show/{id}', [App\Http\Controllers\Syllabuses\ShowSyllabusesController::class, 'show']);
    Route::post('/syllabus/delete', [App\Http\Controllers\Syllabuses\DeleteSyllabusesController::class, 'delete']);
    Route::get('/showStudentSyllabus', [App\Http\Controllers\Syllabuses\StudentSyllabusesController::class, 'showStudentSyllabus']);

//SCORES
    Route::get('/scores', [App\Http\Controllers\Scores\IndexScoresController::class, 'index']);
    Route::get('/academicHistories/{id}', [App\Http\Controllers\Scores\AcademicHistoriesScoresController::class, 'academicHistories']);

//IMPORTS AND EXPORTS
    Route::get('/chooseUserList', [App\Http\Controllers\Users\ChooseListUsersController::class, 'chooseList']);
    Route::get('/exportUsers/{id}', [App\Http\Controllers\Users\ExportUsersController::class, 'export']);
    Route::post('/importUsers', [App\Http\Controllers\Users\ImportUsersController::class, 'import']);

//USERS
    Route::get('/changePassword', [App\Http\Controllers\Users\ChangePasswordUsersController::class, 'changePassword']);
    Route::post('/updatePassword', [App\Http\Controllers\Users\UpdatePasswordUsersController::class, 'updatePassword']);

//ADMINISTRATORS
    Route::get('/administrators/create', [App\Http\Controllers\Administrators\CreateAdiministratorsController::class, 'create']);
    Route::post('/administrators/store', [App\Http\Controllers\Administrators\StoreAdiministratorsController::class, 'store']);
    Route::get('/administrators', [App\Http\Controllers\Administrators\IndexAdiministratorsController::class, 'index']);
    Route::get('/administrators/edit/{id}', [App\Http\Controllers\Administrators\EditAdiministratorsController::class, 'edit']);
    Route::post('/administrators/update', [App\Http\Controllers\Administrators\UpdateAdiministratorsController::class, 'update']);
    Route::post('/administrators/delete', [App\Http\Controllers\Administrators\DeleteAdiministratorsController::class, 'delete']);

    //STATISTICS
    Route::get('/statistics', App\Http\Controllers\Statistics\IndexStatisticsController::class)->name('statistics.index');


});

