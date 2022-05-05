<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LogsListController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategoriesController;

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
    return view('master');
});

Route::resource('/users', UsersController::class);
// Route::resource('/logs', LogsListController::class);
// Route::resource('/items', ItemsController::class);
// Route::resource('/categories', CategoriesController::class);

Route::get('/login', [UsersController::class, 'showFormLogin']);
Route::post('/login', [UsersController::class, 'login']);


Route::fallback(function () {
    return redirect('/');
});