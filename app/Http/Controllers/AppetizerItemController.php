<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppetizerItem;

class AppetizerItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $appetizers = AppetizerItem::all();
      return view('appetizeritems.index', compact('appetizers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appetizeritems.create');
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
      $app = new AppetizerItem;
      $app->name = request('name');
      $app->description = request('description');
      $app->price = request('price');
      $app->user_photo = $photoName;
      $app->save();
      // AppetizerItem::create(request(['name', 'description','price']));

      return redirect('/appetizers');
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
      $app = AppetizerItem::find($id);
      return view('appetizeritems.edit', compact('app'));
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
        $app = AppetizerItem::find($id);
        $app->name = $request['name'];
        $app->description = $request['description'];
        $app->price = $request['price'];
        $app->save();

        return redirect('/appetizers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app = AppetizerItem::find($id);
        $app->delete();

        return redirect('/appetizers');
    }
}
