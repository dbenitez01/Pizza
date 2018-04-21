<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\PizzaTypes;
use App\AppetizerItem;
use App\EntreeItem;
use App\DessertItem;
use App\DrinkItem;
use App\ToppingItem;
use App\Pizza;
use App\Drink;
use App\Entree;
use App\Dessert;
use App\Appetizer;
use Illuminate\Support\Facades\Auth;


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
    $entrees = EntreeItem::all();
    $drinks = DrinkItem::all();
    $desserts = DessertItem::all();
    $toppings = ToppingItem::all();

    $cart = session('cart');
    return view ('orders.create', compact('pizzas', 'apps','entrees','drinks','desserts','toppings', 'cart'));
  }
  public function store() {
    $cart = session()->get('cart');
    $total_price = 0;
    foreach ($cart as $item) {
      $total_price += $item['price'];
    }

    $order = new Order;
    $order->user_id = Auth::user()->id;
    $order->total_price = sprintf('%0.2f',$total_price);
    $order->location_id = 1;
    $order->status = "new";
    $order->save();

    $order = Order::latest()->first();
    foreach ($cart as $item) {
      switch ($item['table']) {
        case 'pizza':
          $pizza = new Pizza;
          $pizza->orderId = $order->id;
          $pizza->pizzaTypeId = $item['id'];
          $pizza->subtotal_price = sprintf('%0.2f', $item['price'] * $item['quantity']);
          $pizza->quantity = $item['quantity'];
          $pizza->size = $item['size'];
          $pizza->save();
          break;
        case 'entree':
          $entree = new Entree;
          $entree->order_id = $order->id;
          $entree->entree_item_id = $item['id'];
          $entree->subtotal_price = sprintf('%0.2f', $item['price'] * $item['quantity']);
          $entree->quantity = $item['quantity'];
          $entree->size = $item['size'];
          $entree->save();
          break;
        case 'app':
          $app = new Appetizer;
          $app->order_id = $order->id;
          $app->appetizer_item_id = $item['id'];
          $app->subtotal_price = sprintf('%0.2f', $item['price'] * $item['quantity']);
          $app->quantity = $item['quantity'];
          $app->size = $item['size'];
          $app->save();
          break;
        case 'drink':
          $drink = new Drink;
          $drink->order_id = $order->id;
          $drink->drinkitem_id = $item['id'];
          $drink->subtotal_price = sprintf('%0.2f', $item['price'] * $item['quantity']);
          $drink->quantity = $item['quantity'];
          $drink->size = $item['size'];
          $drink->save();
          break;
        case 'dessert':
          $dessert = new Dessert;
          $dessert->order_id = $order->id;
          $dessert->dessert_item_id = $item['id'];
          $dessert->subtotal_price = sprintf('%0.2f', $item['price'] * $item['quantity']);
          $dessert->quantity = $item['quantity'];
          $dessert->size = $item['size'];
          $dessert->save();
          break;
        }
    }
    session()->forget('cart');

    return redirect('/orders');
  }
}
