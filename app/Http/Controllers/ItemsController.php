<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\imgs;
use App\Models\items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addProduct',  ['categories' => Categories::all(), 'date' => date('Y-m-d h:m:s', strtotime(' + 2 years'))]);
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
            $ruta = $request->file('url'.$i)->storePublicly('img', 'public');
            
            imgs::create(["url" => $ruta, "id_item" => $item->id]);
            echo $i;
        }

        return redirect('/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(items $items)
    {
        //
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
    public function update(Request $request, items $items)
    {
        //
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
