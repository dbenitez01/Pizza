<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
  public function index()
  {
      // Display the orders
      $orders = Order::all();
      return view ('orders.index', compact('orders'));
  }
}
