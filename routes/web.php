<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UsersController;
// use App\Http\Controllers\LogsListController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\User;
use App\Models\items;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
Route::put('/user/editprofile', function (Request $request){
    $data=(Object)[];
    if (!empty($request->profile_photo_path)){
        if($request->hasFile('profile_photo_path')){
            $ruta = $request->file('profile_photo_path')->storePublicly('img/profile', 'public');
        }
        $data->profile_photo_path = '/'.$ruta;
        $oldimg = User::where('id', Auth::id())->get()[0]->profile_photo_path;
        if ($oldimg != '/img/default/default-user.jpg'){
            File::delete(public_path($oldimg));
        }
    }
    $data->description = $request->description;
    $data->instagram = $request->instagram;
    $data->whatsapp = $request->whatsapp;
    $data->o_contact = $request->o_contact;
    User::where('id', Auth::id())->update((Array)$data);
    return redirect('/items');
});


Route::get('/', function () {
    if (!empty(Auth::user())){
        if (Auth::user()->state === 1 || Auth::user()->state === 2 || Auth::user()->state === 4){
            $errs = [1 => 'El teu compte esta desactivat temporalment, si creus que es un error contacta amb un administrador', 2 => 'El teu compte esta desactivat permanentment, si creus que es un error contacta amb un administrador', 4 => 'El teu compte esta desactivat indefinidament, si creus que es un error contacta amb un administrador'];
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
    return view('index', ['categories' => categories::whereNotNull('image')->where('state',0)->get()]);
})->middleware('verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/usersxstate',function(Request $request){
        if($request->ajax()){
            if (Auth::user()->state === 3){
                $data = ['actius' => User::all()->where('state', '0')->count(), 'destemporalment' => User::all()->where('state', '1')->count(),
                         'desactivats' => User::all()->where('state', '2')->count(), 'administradors' => User::all()->where('state', '3')->count()];
                return $data;
            }
        }
        return redirect('/');
    });
    Route::get('/allitems', function (Request $request){
        if($request->ajax()){
            if(Auth::user()->state === 3){
                return items::with('imatges')->get();
            }
        }
        return redirect('/');
    });
    Route::get('/itemsxstate',function(Request $request){
        if($request->ajax()){
            if (Auth::user()->state === 3){
                $data = ['actius' => items::all()->where('state', '0')->count(), 'venuts' => items::all()->where('state', '1')->count(),
                        'desactivats' => items::all()->where('state', '2')->count(), 'caducats' => items::all()->where('state', '3')->count(),
                        'esborrats' => items::all()->where('state', '4')->count()];
                return $data;
            }
        }
        return redirect('/');
    });
    Route::put('/user/{id}', function($id, Request $request){
        if($request->ajax()){
            if ($request->op == 'st'){
                if ($request->state == 2){
                    items::where('id_seller', $id)->update(array('state' => '2'));
                }
                User::where('id', $id)->update(['state'=> $request->state]);
                return ['success' => 1];
            }
        }
        return ['success' => 0];
    });
    Route::get('/search', function (Request $request) {
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title and body columns from the items table
        $items = items::query()
            ->where([['name', 'LIKE', "%{$search}%"], ['state', '=', 0]])
            ->orWhere([['description', 'LIKE', "%{$search}%"], ['state', '=', 0]])
            ->get();
        // Return the search view with the resluts
        return view('items', ['categories' => categories::where('state', 0),'items' => $items]);
    })->name('search')->middleware('verified');
    Route::resource('/items', ItemsController::class);
    // Route::resource('/logs', LogsListController::class);
    Route::resource('/categories', CategoriesController::class);
    Route::get('/items',[ItemsController::class, 'index'])->name('items');
    Route::get('/allcategories',function(Request $request){
        if($request->ajax()){
            if(Auth::user()->state === 3){
                return Categories::all();
            }
        }
        return redirect('/');
    })->name('all');
    Route::get('/user/items', function () {
        return view('items-user',['categories' => categories::where('state', 0),'items' => items::where(['id_seller' => Auth::user()->id, 'state' => '0'])->get()]);
    })->name('items-user');
    Route::get('/index', function () {
        return redirect('/');
    })->name('index');
    Route::get('/usrs', function (Request $request) {
        if($request->ajax()){
            if(Auth::user()->state === 3) {
                return ['data'=> User::all(), 'user'=> Auth::id()];
            }
        }
        return redirect('/');
    });
    Route::get('/panel', function (Request $request) {
        if(Auth::user()->state === 3) {
            return view('panel');
        }
        return redirect('/');
    })->name('panel');
});
Route::fallback(function () {
    return redirect('/');
});
