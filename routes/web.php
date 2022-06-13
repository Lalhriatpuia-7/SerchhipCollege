<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SubjectStreamController;
use App\Http\Controllers\SyllabusController;
use App\Models\Administration;
use App\Models\News;
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

// Route::get('/', function () {

//     return view('welcome');
// });

//home
Route::get('/', [HomePageController::class, 'index']);

//subjects
Route::get('/subjects/science', [SubjectStreamController::class, 'getsciencesubjects']);
Route::get('/subjects/arts', [SubjectStreamController::class, 'getartsubjects']);
Route::get('/subjects/commerce', [SubjectStreamController::class, 'getcommercesubjects']);

//administration and staff
Route::get('/administration/teachingstaff', [StaffController::class, 'get_teaching_staff']);
Route::get('/administration/administrationstaff', [StaffController::class, 'get_administration_staff']);
Route::get('/administration/principal', [AdministrationController::class, 'index']);
Route::get('/administration/vice-principal', [AdministrationController::class, 'get_vice_principal']);
Route::get('/administration/annual-reports', [AdministrationController::class, 'get_pdf_file']);
Route::get('/administration/organogram', [AdministrationController::class, 'get_organogram']);
Route::get('/administration/mou', [AdministrationController::class, 'get_mou']);
Route::get('/administration/resource-management-system', [AdministrationController::class, 'get_resource_management_system']);

//academic
Route::get('/academic/department/academic-stream', [DepartmentController::class, 'index']);
Route::get('/academic/syllabus', [SyllabusController::class, 'index']);
Route::get('/academic/results/show-results', [ResultsController::class, 'index']);
Route::POST('/academic/results/show-results', [ResultsController::class, 'index']);

//information
Route::get('/information/notification', [NotificationController::class, 'index']);
Route::get('information/news', [NewsController::class, 'index']);

//about us and other page posts
Route::get('/about-us/college', [AboutUsController::class, 'index']);
Route::get('/about-us/affliation', [AboutUsController::class, 'get_affliation_status']);
Route::get('/about-us/library', [AboutUsController::class, 'get_library_index']);
Route::get('/about-us/rules-and-regulations', [AboutUsController::class, 'get_rules_and_regulations_index']);
Route::get('/about-us/code-of-conducts', [AboutUsController::class, 'get_code_of_cunducts_index']);
Route::get('/about-us/institutional-distinctiveness', [AboutUsController::class, 'get_institutional_distinctiveness_index']);
Route::get('/about-us/system-and-procedure', [AboutUsController::class, 'get_system_and_procedure_index']);
Route::get('/about-us/gender-sensitization', [AboutUsController::class, 'get_gender_sensitization_index']);


//voyager defined routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});