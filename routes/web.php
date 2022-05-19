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
    return view('index');
});

// Route::resource('/users', UsersController::class);
// Route::resource('/logs', LogsListController::class);
Route::resource('/items', ItemsController::class);
// Route::resource('/categories', CategoriesController::class);

// Route::get('/login', [UsersController::class, 'showFormLogin']);
// Route::post('/login', [UsersController::class, 'login']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/index', function () {
        return redirect('/');
    })->name('index');
    Route::get('/products', function () {
        return view('products');
    })->name('products');
});
Route::fallback(function () {
    return redirect('/');
});
