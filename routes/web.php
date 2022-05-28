<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExcursionController;
use App\Http\Controllers\DostoprimController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EstablishmentController;

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
    return view('welcome');
});

Route::get('/admin/loginForm',[AdminLoginController::class,'showLoginForm'])->name('showLoginForm');
Route::post('/admin/loginAdmin',[AdminLoginController::class,'loginAdmin'])->name('loginAdmin');

Route::prefix('/admin')->middleware('auth')->group(function(){
    Route::get('/logout',[AdminLoginController::class,'logout'])->name('logout');

    Route::get('/home',[AdminController::class,'showAdminHomePage'])->name('showAdminHomePage');
    Route::post('/createExcursion',[ExcursionController::class,'createExcursion'])->name('createExcursion'); 
    Route::get('/showEditExcursionPage',[ExcursionController::class,'showEditExcursionPage'])->name('showEditExcursionPage');  
    Route::get('/showEditExcursById/{id}',[ExcursionController::class,'showEditExcursById'])->name('showEditExcursById'); 
    Route::get('/showDostoprimCreateForm',[DostoprimController::class,'showDostoprimCreateForm'])->name('showDostoprimCreateForm');
    Route::post('/updateExcursion',[ExcursionController::class,'updateExcursion'])->name('updateExcursion');
    Route::get('/deleteExcursion/{id}',[ExcursionController::class,'deleteExcursion']);
    
    Route::post('/createDostoprim',[DostoprimController::class,'createDostoprim'])->name('createDostoprim');
    Route::get('/showDeletDostoprimPage',[DostoprimController::class,'showDeletDostoprimPage'])->name('showDeletDostoprimPage');
    Route::get('/deletDostoprim/{id}',[DostoprimController::class,'deletDostoprim'])->name('deletDostoprim');
    Route::get('/deletDostoprimImg/{id}',[DostoprimController::class,'deletDostoprimImg'])->name('deletDostoprimImg');
    Route::get('/showAddDostoprimToExcursPage',[ExcursionController::class,'showAddDostoprimToExcursPage'])->name('showAddDostoprimToExcursPage');
    Route::post('/addDostoprimRilation',[ExcursionController::class,'addDostoprimRilation'])->name('addDostoprimRilation');
    Route::get('/deleteDostoprimRilation/{excurs_id}/{dostoprim_id}',[ExcursionController::class,'deleteDostoprimRilation'])->name('deleteDostoprimRilation');
    Route::get('/showEditDostoprimPage',[DostoprimController::class,'showEditDostoprimPage'])->name('showEditDostoprimPage');
    Route::post('/updateDostoprim',[DostoprimController::class,'updateDostoprim'])->name('updateDostoprim');

    Route::get('/showAddEstablishmentPage',[EstablishmentController::class,'showAddEstablishmentPage'])->name('showAddEstablishmentPage');
    Route::post('/addEstablishment',[EstablishmentController::class,'addEstablishment'])->name('addEstablishment');
    Route::get('/showDeleteEstablishmentPage',[EstablishmentController::class,'showDeleteEstablishmentPage'])->name('showDeleteEstablishmentPage');
    Route::post('/deleteEstablishment',[EstablishmentController::class,'deleteEstablishment'])->name('deleteEstablishment');
    Route::get('/showEditEstablishmentPage',[EstablishmentController::class,'showEditEstablishmentPage'])->name('showEditEstablishmentPage');
    Route::post('/updateEstablishment',[EstablishmentController::class,'updateEstablishment'])->name('updateEstablishment');

    Route::get('/showCheckEstablishment',[EstablishmentController::class,'showCheckEstablishment'])->name('showCheckEstablishment');
});


