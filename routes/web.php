<?php

use App\Http\Controllers\ForumController;
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

Route::get("/home", [UserController::class, 'index'])->name("Home");

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('Login');

Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('Register');

Route::post('/logout', [AuthController::class, 'logout'])->name('Logout');

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('ListAllUsers');

    Route::get("/main", [ForumController::class, 'mainForum'])->name("Main");

    Route::get("/topics", [ForumController::class, 'topics'])->name("Topics");

    Route::get("/posts", [ForumController::class, 'posts'])->name("Posts");

    Route::get("/tags", [ForumController::class, 'tags'])->name("Tags");

    Route::get('/users/{id}', [UserController::class, 'listUserById'])->name('ListUserById');

    Route::put('/users/{id}/update', [UserController::class, 'updateUser'])->name('UpdateUser');

    Route::get('/users/{id}/edit', [UserController::class, 'editUser'])->name('EditUser');
    
    Route::get('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('DeleteUser');
});
