<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PizzaTypes;

class PizzaTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pizzaTypes = PizzaTypes::all();
      return view('pizzatypes.index', compact('pizzaTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizzatypes.create');
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
      PizzaTypes::create(request(['type', 'description','price']));

      return redirect('/pizzas');
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
      $pizza = PizzaTypes::find($id);
      return view('pizzatypes.edit', compact('pizza'));
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
        'type' => 'required',
        'description' => 'required',
        'price' => 'required'
      ]);
      $pizza = PizzaTypes::find($id);
      $pizza->type = $request['type'];
      $pizza->description = $request['description'];
      $pizza->price = $request['price'];
      $pizza->save();

      return redirect('/pizzas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pizza = PizzaTypes::find($id);
      $pizza->delete();

      return redirect('/pizzas');
    }
}
