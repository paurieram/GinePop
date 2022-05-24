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
// Route::resource('/categories', CategoriesController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::post('/items',[ItemsController::class, '']);
    // Route::post('/pais',[ItemsController::class, '']);
    Route::get('/index', function () {
        return redirect('/');
    })->name('index');
    Route::get('/items', function () {
        return view('items');
    })->name('items');
    Route::get('/panel', function () {
        return view('panel');
    })->name('panel');
    Route::get('/items/add', function () {
        return view('items-add');
    })->name('items-add');
    Route::get('/items/view/{id}', function (Request $request) {
        return view('items-view');
        // return view('products-view', ['id' => $request]);
    })->name('view');
});
Route::fallback(function () {
    return redirect('/');
});
