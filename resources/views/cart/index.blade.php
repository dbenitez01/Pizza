@extends ('layouts.master')
@section ('content')
  <div class="container">
    <div class="row">
      <h1>My Cart</h1>
    </div>
    <div class="row">
      <a href="{{ route('orders.create') }}">Add More Food</a>
    </div>
    <cart-items>

      @foreach ($pizzas as $pizza)
        <cart-item name="{{ $pizza['name'] }}" price="{{ $pizza['price'] }}"
        description="{{ $pizza['description'] }}" quantity="{{ $pizza['quantity'] }}" size="{{ $pizza['size'] }}"></cart-item>
      @endforeach
      @foreach ($entrees as $entree)
        <cart-item name="{{ $entree['name'] }}" price="{{ $entree['price'] }}"
        description="{{ $entree['description'] }}" quantity="{{ $entree['quantity'] }}" size="{{ $entree['size'] }}"></cart-item>
      @endforeach
      @foreach ($appetizers as $app)
        <cart-item name="{{ $app['name'] }}" price="{{ $app['price'] }}"
        description="{{ $app['description'] }}" quantity="{{ $app['quantity'] }}" size="{{ $app['size'] }}"></cart-item>
      @endforeach
      @foreach ($drinks as $drink)
        <cart-item name="{{ $drink['name'] }}" price="{{ $drink['price'] }}"
        description="{{ $drink['description'] }}" quantity="{{ $drink['quantity'] }}" size="{{ $drink['size'] }}"></cart-item>
      @endforeach
      @foreach ($desserts as $dessert)
        <cart-item name="{{ $dessert['name'] }}" price="{{ $dessert['price'] }}"
        description="{{ $dessert['description'] }}" quantity="{{ $dessert['quantity'] }}" size="{{ $dessert['size'] }}"></cart-item>
      @endforeach

    </cart-items>

    {{-- <pre>

      @php
        print_r($cart);
      @endphp

    </pre> --}}


  </div>

@endsection
