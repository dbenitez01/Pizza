<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

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
    return view ('orders.create');
  }
}
