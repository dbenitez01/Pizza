<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PizzaTypes;
use App\EntreeItem;
use App\AppetizerItem;
use App\DessertItem;
use App\DrinkItem;
use App\ToppingItem;

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
        $order = request(['id','name','brand','type','description','price', 'quantity', 'size', 'table']);
        $request->session()->push('cart', $order);
        return $request->session()->all();
    }
    public function cart(Request $request) {
      $cart = $request->session()->get('cart');
      $pizzas = array();
      $entrees = array();
      $desserts = array();
      $appetizers = array();
      $drinks = array();

      $pizzaIds = array();
      $entreeIds = array();
      $dessertIds = array();
      $appetizerIds = array();
      $drinkIds = array();

      foreach ($cart as $item) {
        switch ($item['table']) {
          case 'pizza':
            array_push($pizzas, $item);
            array_push($pizzaIds, $item['id']);
            break;
          case 'entree':
            array_push($entrees, $item);
            array_push($entreeIds, $item['id']);
            break;
          case 'dessert':
            array_push($desserts, $item);
            array_push($dessertIds, $item['id']);
            break;
          case 'app':
            array_push($appetizers, $item);
            array_push($appetizerIds, $item['id']);
            break;
          case 'drink':
            array_push($drinks, $item);
            array_push($drinkIds, $item['id']);
            break;
        }
      }
      // if(!empty($pizzaIds)) {
      //   $dbPizzas = PizzaTypes::where('id', $pizzaIds)->get();
      // } else {
      //   $dbPizzas = [];
      // }
      // if(!empty($entreeIds)) {
      //   $dbEntrees = EntreeItem::where('id', $entreeIds)->get();
      // } else {
      //   $dbEntrees = [];
      // }
      // if(!empty($dessertIds)) {
      //   $dbDesserts = DessertItem::where('id', $dessertIds)->get();
      // } else {
      //   $dbDesserts = [];
      // }
      // if(!empty($drinkIds)) {
      //   $dbDrinks = DrinkItem::where('id', $drinkIds)->get();
      // } else {
      //   $dbDrinks = [];
      // }
      // if(!empty($appetizerIds)) {
      //   $dbApps = AppetizerItem::where('id', $appetizerIds)->get();
      // } else {
      //   $dbApps = [];
      // }

      return view('cart.index', compact('cart','pizzas','entrees','desserts','appetizers','drinks'));
      // return view('cart.index', compact('cart'));
    }
}
