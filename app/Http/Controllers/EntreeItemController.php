<?php

namespace App\Http\Controllers;

use App\EntreeItem;
use Illuminate\Http\Request;

class EntreeItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = session('key');
        $entrees = EntreeItem::all();
        return view ('entreeitems.index', compact('entrees', 'key'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('entreeitems.create');
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        // dd(request()->all());

        $photoName = time().'.'.$request->user_photo->getClientOriginalExtension();

        /*
        talk the select file and move it public directory and make avatars
        folder if doesn't exsit then give it that unique name.
        */
        $request->user_photo->move(public_path('storage/avatars'), $photoName);
        $entree = new EntreeItem;
        $entree->name = request('name');
        $entree->description = request('description');
        $entree->price = request('price');
        $entree->user_photo = $photoName;
        $entree->save();
        // EntreeItem::create(request(['name','description','price']));

        return redirect('/entrees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EntreeItem  $entreeItem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EntreeItem  $entreeItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ent = EntreeItem::find($id);
        return view('entreeitems.edit', compact('ent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EntreeItem  $entreeItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $ent = DessertItem::find($id);
        $ent->name = $request['name'];
        $ent->description = $request['description'];
        $ent->price = $request['price'];
        $ent->save();

        return redirect('/desserts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EntreeItem  $entreeItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ent= EntreeItem::find($id);
        $ent->delete();

        return redirect('/entrees');
    }
}
