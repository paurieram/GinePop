<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LogsListController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

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
    return view('index', ['categories' => categories::whereNotNull('image')->get()->take(4)]);
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
    Route::get('/usrs', function () {
        if(Auth::user()->state === 3) {
            return user::all();
        }else{
            return redirect('/');
        }
    });
    Route::get('/panel', function () {
        if(Auth::user()->state === 3) {
            return view('panel');
        }else{
            return redirect('/');
        }
    })->name('panel');
});
Route::fallback(function () {
    return redirect('/');
});
