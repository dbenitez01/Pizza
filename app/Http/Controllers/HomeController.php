<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['cart' => array()]);
        return view('home');
    }
    public function addToCart(Request $request) {
        $order = request(['id','price', 'quantity', 'size', 'table']);
        $request->session()->push('cart', $order);
        return $request->session()->all();
    }
    public function cart(Request $request) {
      $cart = $request->session()->get('cart');
      return view('cart.index', compact('cart'));
    }
}
