<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\imgs;
use App\Models\items;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items', [
            'items' => items::where('state', 0)->get(),
            'categories' => items::select(DB::raw('items.id_category, categories.name, COUNT(items.id) as itemsxcat'))
                                        ->join('categories','items.id_category','=','categories.id')
                                        ->where('items.state', 0)
                                        ->groupBy('items.id_category', 'categories.name')
                                        ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items-add',  ['categories' => categories::where('state', 0)->get(), 'date' => date('Y-m-d h:m:s', strtotime(' + 2 years'))]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = items::create($request->all());
        for($i = 0; $request->hasFile('url'.$i); $i++) {
            $ruta = $request->file('url'.$i)->storePublicly('img/productes', 'public');
            imgs::create(["url" => "/".$ruta, "id_item" => $item->id]);
        }
        return redirect('/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(items $item)
    {
        items::where('id', $item->id)->update(array('views' => $item->views+1));
        if ($item->state == 0){
            $item->state = 'producte a la venda';
        }else if($item->state == 1){
            $item->state = 'producte venut';
        }else if($item->state == 2){
            $item->state = 'producte desactivat';
        }else if($item->state == 3){
            $item->state = 'producte caducat';
        }
        if ($item->id_seller == Auth::id()){

        }
        $cat = categories::where('id', $item->id_category)->get();
        $item->category_name = $cat[0]->name;
        $usr = user::where('id', $item->id_seller)->get();
        $item->usr = $usr[0]->name;
        $item->sold = items::where('id_seller', $item->id_seller)->where('state', '0')->count();
        $item->name = items::where('id', $item->id)->where('state', '0')->get('name')[0]->name;
        return view('items-view', ['item' => $item, 'imatges' => imgs::all(), 'user'=> Auth::user(),'categories'=>categories::where('state', 0)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, items $item)
    {
        // return $item;
        if ($request->op == 'rq'){
            $item->update($request->all());
            return json_encode(['success' => 1]);
        }else if ($request->op == 'fm'){
            $item->update($request->all());
            for($i = 0; $request->hasFile('url'.$i); $i++) {
                $ruta = $request->file('url'.$i)->storePublicly('img/productes', 'public');
                imgs::create(["url" => "/".$ruta, "id_item" => $item->id]);
            }
            return redirect('/items');
        }else{
            return json_encode(['success' => 0]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(items $items)
    {
        //
    }

}
