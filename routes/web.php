<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LogsListController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Http\Request;

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

Route::resource('/items', ItemsController::class);
Route::resource('/logs', LogsListController::class);
Route::resource('/categories', CategoriesController::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/items',[ItemsController::class, 'index'])->name('items');
    Route::get('/index', function () {
        return redirect('/');
    })->name('index');
    // Route::get('/items', function () {
    //     return view('items');
    // })->name('items');
    Route::get('/panel', function () {
        return view('panel');
    })->name('panel');
});
Route::fallback(function () {
    return redirect('/');
});
