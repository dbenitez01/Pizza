<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DrinkItem;

class DrinkItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $drinks = DrinkItem::all();
      return view('drinkitems.index', compact('drinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drinkitems.create');
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
        'brand' => 'required',
        'description' => 'required',
        'price' => 'required'
      ]);
      // dd(request()->all());$photoName = time().'.'.$request->user_photo->getClientOriginalExtension();
      $photoName = time().'.'.$request->user_photo->getClientOriginalExtension();
      /*
      talk the select file and move it public directory and make avatars
      folder if doesn't exsit then give it that unique name.
      */
      $request->user_photo->move(public_path('storage/avatars'), $photoName);
      $drink = new DrinkItem;
      $drink->brand = request('brand');
      $drink->description = request('description');
      $drink->price = request('price');
      $drink->user_photo = $photoName;
      $drink->save();
      // DrinkItem::create(request(['brand', 'description','price']));

      return redirect('/drinks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $drink = DrinkItem::find($id);
      return view('drinkitems.edit', compact('drink'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $drink = DrinkItem::find($id);
      $drink->delete();

      return redirect('/drinks');
    }
}
