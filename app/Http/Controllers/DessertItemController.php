<?php

namespace App\Http\Controllers;

use App\DessertItem;
use Illuminate\Http\Request;

class DessertItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desserts = DessertItem::all();
        return view('dessertitems.index', compact('desserts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dessertitems.create');
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
        $dessert = new DessertItem;
        $dessert->name = request('name');
        $dessert->description = request('description');
        $dessert->price = request('price');
        $dessert->user_photo = $photoName;
        $dessert->save();
        // DessertItem::create(request(['name', 'description','price']));

        return redirect('/desserts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $des = DessertItem::find($id);
        return view('dessertitems.edit', compact('des'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $des = DessertItem::find($id);
        $des->name = $request['name'];
        $des->description = $request['description'];
        $des->price = $request['price'];
        $des->save();

        return redirect('/desserts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $des = DessertItem::find($id);
        $des->delete();

        return redirect('/desserts');
    }
}
