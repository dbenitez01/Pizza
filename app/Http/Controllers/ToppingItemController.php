<?php

namespace App\Http\Controllers;

use App\ToppingItem;
use Illuminate\Http\Request;

class ToppingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toppings = ToppingItem::all();
        return view ('toppingitems.index', compact('toppings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('toppingitems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'type' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        // dd(request()->all());
        ToppingItem::create(request(['type', 'description', 'price']));

        return redirect('/toppings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ToppingItem  $toppingItem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ToppingItem  $toppingItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $top = ToppingItem::find($id);
        return view ('toppingitems.edit', compact('top'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ToppingItem  $toppingItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'type' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $top = ToppingItem::find($id);
        $top->type = $request['type'];
        $top->description = $request['description'];
        $top->price = $request['price'];
        $top->save();

        return redirect('/toppings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ToppingItem  $toppingItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $top = ToppingItem::find($id);
        $top->delete();

        return redirect ('/toppings');
    }
}
