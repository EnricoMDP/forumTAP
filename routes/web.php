<?php

use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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

Route::get("/", [UserController::class, 'index'])->name("Home");
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('Login');
Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('Register');
Route::post('/logout', [AuthController::class, 'logout'])->name('Logout');

Route::middleware('auth')->group(function () {

    Route::get("/main", [ForumController::class, 'mainForum'])->name("Main");
    Route::get("/topics", [ForumController::class, 'topics'])->name("Topics");
    Route::get("/posts", [ForumController::class, 'posts'])->name("Posts");
    Route::get("/tags", [ForumController::class, 'tags'])->name("Tags");

    Route::get('/users', [UserController::class, 'listAllUsers'])->name('ListAllUsers');
    Route::get('/users/{id}', [UserController::class, 'listUserById'])->name('ListUserById');
    Route::put('/users/{id}/update', [UserController::class, 'updateUser'])->name('UpdateUser');
    Route::delete('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('DeleteUser');

    Route::get('/categories', [CategoryController::class, 'viewCategories'])->name('viewCategories');
    Route::match(['get', 'post'], '/createCategory', [CategoryController::class, 'createCategory'])->name('CreateCategory');
    Route::get('/categories/{id}', [CategoryController::class, 'listByTitle'])->name('listByTitle');
    Route::put('/categories/{id}/update', [CategoryController::class, 'updateCategory'])->name('UpdateCategory');
    Route::delete('/categories/{id}/delete', [CategoryController::class, 'deleteCategory'])->name('DeleteCategory');

    Route::get('/tags', [TagController::class, 'listAllTags'])->name('viewTags');
    Route::put('/tags/{id}/update', [TagController::class, 'updateCategory'])->name('UpdateCategory');
    Route::delete('/tags/{id}/delete', [TagController::class, 'deleteCategory'])->name('DeleteCategory');
    Route::match(['get', 'post'], '/createTag', [TagController::class, 'createTag'])->name('CreateTag');
    
});
