<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Models\Etudiant;
use Symfony\Component\Console\Question\Question;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('Course',[CourseController::class,'index']);
//apiRessource est une foncyion qui nous permet de meppé notre Route sur les methodes(action) du controller
Route::apiResource("Course","CourseController");//ainsi a partir de cette ligne nous pouvons avoir des n-pointe qui veut tout simplement dire des URL qui seront utiliser coté application
Route::apiResource("Etudiant","EtudiantController");
Route::apiResource("Professeur","ProfesseurController");
Route::apiResource("User","UserController");
//Route::post("login",[UserController::class,"login"]);
//Route::post('Etudiant/login',[EtudiantController::class,'login']);
Route::Post("login","UserController@login");
/**grace a ceci je vient d'avoir la confirmation que laravel est très intelligent il sagit là d'un framework vraiment passionnant */