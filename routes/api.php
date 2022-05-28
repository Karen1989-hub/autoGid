<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ExcursionController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\api\ApiExcursController;
use App\Http\Controllers\api\ApiEstablishmentController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/registration',[RegistrationController::class,'registr']);
Route::post('/login',[RegistrationController::class,'login']);
Route::post('/registrautoris',[RegistrationController::class,'registrautoris']);

Route::post('/restorePassword',[RegistrationController::class,'restorePassword']);
Route::post('/getRestorKey',[RegistrationController::class,'getRestorKey']);
Route::post('/updateUserPassword',[RegistrationController::class,'updateUserPassword']);

Route::post('/sendKeyAgain',[RegistrationController::class,'sendKeyAgain']);

Route::get('/getExcursions',[ExcursionController::class,'getExcursions']);
Route::get('/getExcursions2',[ApiExcursController::class,'getExcurs']);
Route::post('/getDostoprimByExcursId',[ApiExcursController::class,'getDostoprimByExcursId']);

Route::get('/getEstablishments',[ApiEstablishmentController::class,'getEstablishments']);

