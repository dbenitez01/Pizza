@extends ('layouts.master')
@section ('content')
  <div class="container">
    {{-- TODO: Orders --}}
    <h1>Order {{ $order->id }}</h1>
    @foreach ($pizzas as $pizza)
      @php
        $pizzaName = App\PizzaTypes::find($pizza->pizzaTypeId);
        echo $pizzaName->type;
      @endphp
      {{ $pizza->pizzaTypeId }}
    @endforeach


  </div>

@endsection
