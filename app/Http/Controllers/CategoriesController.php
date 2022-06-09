<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return categories::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = (object)[];
        $data->name = $request->name;
        if (isset($request->image)){
            $route = $request->file('image')->storePublicly('img/categories', 'public');
            $data->image = "/".$route;
        }
        categories::create((array)$data);
        return redirect('/panel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $category)
    {

        return view('items', [
            'items' => $category->items,
            'categories' => items::select(DB::raw('items.id_category, categories.name, COUNT(items.id) as itemsxcat'))->join('categories','items.id_category','=','categories.id')->groupBy('items.id_category', 'categories.name')->get(),
            'id_category' => $category->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $categories)
    {
        //
    }
}
