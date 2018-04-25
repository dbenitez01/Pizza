@extends ('layouts.master')
@section ('content')
  <div class="container">
    {{-- TODO: Orders --}}
    <h1>Order {{ $order->id }}</h1>
    @foreach ($pizzas as $pizza)
      @php
        $pizzaName = $pizza->type;
        echo $pizzaName->type;
      @endphp
      {{ $pizza->pizzaTypeId }}
    @endforeach

    @foreach ($entrees as $entree)
      @php
        $entreeName = $entree->item;
        echo $pizzaName->name;
      @endphp
      {{ $pizza->pizzaTypeId }}
    @endforeach


  </div>

@endsection
