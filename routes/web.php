<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\crudController;
use App\Http\controllers\loginController;
 
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

Route::get('/admin', function () {
    return view('admin');
});


Route::get('/login', function () {
    return view('login');
});


//------------------------CRUD DATA-------------------------
Route::POST('/dashboard', [crudController::class, 'insert_data']);
Route::GET('/dashboard', [crudController::class, 'view_data']);
Route::GET('delete/{id}', [crudController::class, 'destroy']);


//------------------------LOGIN-------------------------
Route::POST('/login', [loginController::class, 'loginChk']);
//------------------------LOGOUT-------------------------
Route::GET('/logout', [loginController::class, 'logoutChk']);