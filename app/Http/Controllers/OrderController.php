<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\PizzaTypes;
use App\AppetizerItem;

class OrderController extends Controller
{
  public function __construct()
    {
        // $this->middleware('auth');
        // Redirect to home if they're not an admin
        $this->middleware('admin')->only('index');

        // $this->middleware('subscribed')->except('store');
    }
  public function index()
  {
      // Display the orders
      $orders = Order::all();
      return view ('orders.index', compact('orders'));
  }

  public function create() {

    $pizzas = PizzaTypes::all();
    $apps = AppetizerItem::all();

    $cart = session('cart');
    return view ('orders.create', compact('pizzas', 'apps', 'cart'));
  }
  public function store() {
    return ['message' => 'You sent a post request!'];
  }
}
