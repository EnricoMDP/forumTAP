<?php

use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
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

    //Usuários
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('ListAllUsers');
    Route::get('/users/{id}', [UserController::class, 'listUserById'])->name('ListUserById');
    Route::put('/users/{id}/update', [UserController::class, 'updateUser'])->name('UpdateUser');
    Route::delete('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('DeleteUser');

    //Categorias
    Route::match(['get', 'post'], '/createCategory', [CategoryController::class, 'createCategory'])->name('CreateCategory');
    Route::get('/categories', [CategoryController::class, 'listAllCategories'])->name('ListAllCategories');
    Route::get('/categories/{id}', [CategoryController::class, 'listByTitle'])->name('listByTitle');
    Route::put('/categories/{id}/update', [CategoryController::class, 'updateCategory'])->name('UpdateCategory');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'editCategory'])->name('EditCategory');    
    Route::delete('/categories/{id}/delete', [CategoryController::class, 'deleteCategory'])->name('DeleteCategory');

    //Tags
    Route::match(['get', 'post'], '/createTag', [TagController::class, 'createTag'])->name('CreateTag');
    Route::get('/tags', [TagController::class, 'listAllTags'])->name('ListAllTags');
    Route::get('/tags/{id}', [TagController::class, 'listTagByTitle'])->name('ListTagByTitle');
    Route::put('/tags/{id}/update', [TagController::class, 'UpdateTag'])->name('UpdateTag');
    Route::get('/tags/{id}/edit', [TagController::class, 'editTag'])->name('EditTag');
    Route::delete('/tags/{id}/delete', [TagController::class, 'DeleteTag'])->name('DeleteTag');

    //Tópicos
    
    Route::match(['get', 'post'],'/createTopic', [TopicController::class, 'createTopic'])->name('CreateTopic');
    Route::get('/topics', [TopicController::class, 'listAllTopics'])->name('ListAllTopics');
    Route::get('/topics/{id}', [TopicController::class, 'listTopicById'])->name('ListTopicById');
    Route::put('/topics/{id}/update', [TopicController::class, 'updateTopic'])->name('UpdateTopic');
    Route::get('/topics/{id}/edit', [TopicController::class, 'editTopic'])->name('EditTopic');
    Route::delete('/topics/{id}/delete', [TopicController::class, 'deleteTopic'])->name('DeleteTopic');
    Route::get('/search', [TopicController::class, 'searchTopics'])->name('SearchTopics');

    //Comentários
    Route::post('/comments/create', [CommentController::class, 'createComment'])->name('CreateComment');
    Route::get('/comments', [CommentController::class, 'listAllComments'])->name('ListAllComments');
    Route::get('/comments/{id}', [CommentController::class, 'listCommentById'])->name('ListCommentById');
    Route::put('/comments/{id}/update', [CommentController::class, 'updateComment'])->name('UpdateComment');
    Route::get('/comments/{id}/edit', [CommentController::class, 'editComment'])->name('EditComment');
    Route::delete('/comments/{id}/delete', [CommentController::class, 'deleteComment'])->name('DeleteComment');

});

