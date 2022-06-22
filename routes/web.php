<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LogsListController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\user;
use App\Models\items;
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

// Route::get('/clicks', function () {
//     // if(!empty(Auth::user()) && Auth::user()->state === 3){
//     //     // return [0 => user::all(),1 => items::all()];
//     //     $arr = [];
//     //     for ($i=0; $i >= count(user::all()); $i++) { 
//     //         arr
//     //     }
//     //     // foreach ($variable as $key => $value) {
//     //     //     # code...
//     //     // }
//     // }else{
//     //     return redirect('/');
//     // }
// });

Route::get('/search', function (Request $request) {
    // Get the search value from the request
    $search = $request->input('search');
    // Search in the title and body columns from the items table
    $items = items::query()
        ->where([['name', 'LIKE', "%{$search}%"], ['state', 0]])
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->get();
    // Return the search view with the resluts compacted
    return view('items', ['categories' => categories::where('state', 0),'items' => $items]);
})->name('search')->middleware('verified');


Route::get('/', function () {
    if (!empty(Auth::user())){
        if (Auth::user()->state === 1 || Auth::user()->state === 2 || Auth::user()->state === 4){
            $errs = [1 => 'El teu compte esta desactivat tempoalment, si creus que es un error contacta amb un administrador', 2 => 'El teu compte esta desactivat permanentment, si creus que es un error contacta amb un administrador', 4 => 'El teu compte esta desactivat indefinidament, si creus que es un error contacta amb un administrador'];
            $i = 1;
            if(Auth::user()->state === 1){
                $i = 1;
            }else if(Auth::user()->state === 2){
                $i = 2;
            }else if(Auth::user()->state === 4){
                $i = 4;
            }
            Auth::logout();
            return redirect('/login')->with(['usrerror' => $errs[$i]]);
        }
    }
    return view('index', ['categories' => categories::whereNotNull('image')->get()]);
})->middleware('verified');

Route::resource('/items', ItemsController::class)->middleware('verified');
Route::resource('/logs', LogsListController::class);
Route::resource('/categories', CategoriesController::class)->middleware('verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/items',[ItemsController::class, 'index'])->name('items')->middleware('verified');
    Route::get('/user/items', function () {
        return view('items-user',['categories' => categories::where('state', 0),'items' => items::where(['id_seller' => Auth::user()->id, 'state' => '0'])->get()]);
    })->name('items-user');
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
