@extends ('layouts.master')
@section ('content')
  <div class="container">
    {{-- TODO: Orders --}}
    <h1>Order #{{ $order->id }}</h1>
    @if ($order->status == 'complete')
      Order was completed on {{ $order->updated_at }}
    @endif
    <h3>Customer: {{ $order->user->name }}</h3>
    Order Type: {{ $order->type }}<br />
    @if ($order->type == 'delivery')
      Deliver to: {{ $order->user->address }}<br />
    @endif
    <h4>Total: ${{ $order->total_price }}</h4>
    <h3>Order Items</h3>
    @foreach ($pizzas as $pizza)
      @php
        $pizzaName = $pizza->type;
        echo $pizza->quantity. " &times; (" . $pizza->size. ") " .$pizza->type->type . " for $". $pizza->subtotal_price ."<br />";
      @endphp
    @endforeach

    @foreach ($entrees as $entree)
      @php
        $entreeName = $entree->item;
        echo $entree->quantity. " &times; (" . $entree->size. ") " .$entree->item->name . " for $". $entree->subtotal_price. "<br />";
      @endphp
    @endforeach

    @foreach ($appetizers as $appetizer)
      @php
        $appetizerName = $appetizer->item;
        echo $appetizer->quantity. " &times; (" . $appetizer->size. ") " .$appetizer->item->name . " for $". $appetizer->subtotal_price. "<br />";
      @endphp
    @endforeach

    @foreach ($drinks as $drink)
      @php
        $drinkBrand = $drink->item;
        echo $drink->quantity. " &times; (" . $drink->size. ") " .$drink->item->brand . " for $". $drink->subtotal_price. "<br />";
      @endphp
    @endforeach

    @foreach ($desserts as $dessert)
      @php
        $dessertName = $dessert->item;
        echo $dessert->quantity. " &times; (" . $dessert->size. ") " .$dessert->item->name . " for $". $dessert->subtotal_price. "<br />";
      @endphp
    @endforeach


  </div>

@endsection
