@extends ('layouts.master')
@section ('content')
  <div class="container">
    {{-- TODO: Orders --}}
    <h1>Order #{{ $order->id }}</h1>
    <h3>Customer: {{ $order->user->name }}</h3>
    @foreach ($pizzas as $pizza)
      @php
        $pizzaName = $pizza->type;
        echo $pizzaName->type . "<br />";
      @endphp
    @endforeach

    @foreach ($entrees as $entree)
      @php
        $entreeName = $entree->item;
        echo $entreeName->name . "<br />";
      @endphp
    @endforeach

    @foreach ($appetizers as $appetizer)
      @php
        $appetizerName = $appetizer->item;
        echo $appetizerName->name . "<br />";
      @endphp
    @endforeach

    @foreach ($drinks as $drink)
      @php
        $drinkBrand = $drink->item;
        echo $drinkBrand->brand . "<br />";
      @endphp
    @endforeach

    @foreach ($desserts as $dessert)
      @php
        $dessertName = $dessert->item;
        echo $dessertName->name . "<br />";
      @endphp
    @endforeach


  </div>

@endsection
