@extends ('layouts.master')
@section ('content')
  <div class="container">
    <div class="d-flex justify-content-between">
      <h1>My Cart</h1>

      <a href="{{ route('orders.create') }}" class="mt-3  ">Add More Food</a>
    </div>
    <cart-items>

      @foreach ($pizzas as $pizza)
        <cart-item name="{{ $pizza['name'] }}" price="{{ $pizza['price'] }}"
        description="{{ $pizza['description'] }}" quantity="{{ $pizza['quantity'] }}" size="{{ $pizza['size'] }}" table="{{ $pizza['table'] }}"
          propid="{{ $pizza['id'] }}"></cart-item>
      @endforeach
      @foreach ($entrees as $entree)
        <cart-item name="{{ $entree['name'] }}" price="{{ $entree['price'] }}"
        description="{{ $entree['description'] }}" quantity="{{ $entree['quantity'] }}" size="{{ $entree['size'] }}" table="{{ $entree['table'] }}" propid="{{ $entree['id'] }}"></cart-item>
      @endforeach
      @foreach ($appetizers as $app)
        <cart-item name="{{ $app['name'] }}" price="{{ $app['price'] }}"
        description="{{ $app['description'] }}" quantity="{{ $app['quantity'] }}" size="{{ $app['size'] }}"  table="{{ $app['table'] }}" propid="{{ $app['id'] }}"></cart-item>
      @endforeach
      @foreach ($drinks as $drink)
        <cart-item name="{{ $drink['name'] }}" price="{{ $drink['price'] }}"
        description="{{ $drink['description'] }}" quantity="{{ $drink['quantity'] }}" size="{{ $drink['size'] }}" table="{{ $drink['table'] }}" propid="{{ $drink['id'] }}"></cart-item>
      @endforeach
      @foreach ($desserts as $dessert)
        <cart-item name="{{ $dessert['name'] }}" price="{{ $dessert['price'] }}"
        description="{{ $dessert['description'] }}" quantity="{{ $dessert['quantity'] }}" size="{{ $dessert['size'] }}" table="{{ $dessert['table'] }}" propid="{{ $dessert['id'] }}"></cart-item>
      @endforeach

    </cart-items>

    {{-- <pre>

      @php
        print_r($cart);
      @endphp

    </pre> --}}


  </div>

@endsection
