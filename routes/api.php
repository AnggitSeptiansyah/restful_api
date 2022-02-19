<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormController;
use App\Http\Controllers\API\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => 'auth:sanctum'], function () {
// });


Route::group(['middleware' => 'auth:sanctum'], function () {
  Route::get('/form', [FormController::class, 'index']);
  Route::get('/logout', [AuthController::class, 'logout']);

  // Student
  Route::post('students/create', [StudentController::class, 'create']);
  Route::get('students/{student}/show', [StudentController::class, 'show']);
  Route::post('students/{student}', [StudentController::class, 'update']);
  Route::delete('students/{student}/destroy', [StudentController::class, 'destroy']);
});


Route::post('login', [AuthController::class, 'login']);
