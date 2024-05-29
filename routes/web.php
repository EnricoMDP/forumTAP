<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::get('/users', [UserController::class,'listAllUsers'])->name('routeListAllUsers');
Route::get('/users/{uid}', [UserController::class,'listUser'])->name('routeListAllUser');
Route::get('/createUser', [UserController::class,'createUser'])->name('routeCreateUser');
Route::get('/profile', [UserController::class,'showProfile'])->name('routeShowProfile');
#Route::get('/userLogin', [AuthController::class,'loginUser'])->name('routeLogin');
Route::match (['get', 'post'], '/userLogin', [AuthController::class, 'loginUser'])->name('routeLogin');


