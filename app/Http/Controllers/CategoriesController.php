<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return categories::where('state', '0')->get();
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
     * @param  \App\Models\categories  $category
     * @return \Illuminate\Http\Response
     */
    public function show(categories $category)
    {
        if ($category->state == 0 || Auth::user()->state == 3){
        categories::where('id', $category->id)->update(array('views' => $category->views+1));
        return view('items', [
            'items' => $category->items->where('state', '0'),
            'categories' => items::select(DB::raw('items.id_category, categories.name, COUNT(items.id) as itemsxcat'))
                            ->Join('categories','items.id_category','=','categories.id')
                            ->where('items.state', 0)
                            ->groupBy('items.id_category', 'categories.name')
                            ->get(),
            'id_category' => $category->id]);
        }else{
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $category)
    {
        items::where('id_category', $request->id)->update(array('state' => '2'));
        $category->where('id', $request->id)->update(array('state' => $request->state));
        return redirect('/panel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $category
     * @return \Illuminate\Http\Response
     */
    // public function destroy(categories $category)
    // {
    //     //
    // }

}
