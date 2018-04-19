@extends ('layouts.master')
@section ('content')
  <div class="container">
    <div class="row">
      <h1>Your Cart</h1>
    </div>
    <div class="row">
      <a href="{{ route('orders.create') }}">Add More Food</a>
    </div>
    <ul class="list-group">
      @foreach ($pizzas as $pizza)
        <li class="list-group-item">
          <div class="d-flex w-100 justify-content-between">
            <h2 class="mb-1">{{ $pizza['size'] }} {{ $pizza['name']}}</h2>
            <h3>${{ $pizza['price'] }}</h3>
          </div>
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ $pizza['description']}}</h5>
            <input type="number" name="quantity" value="{{ $pizza['quantity'] }}" class="form-control" min="1" max="10" style="width: 10%;">
          </div>
          <div class="d-flex float-right">
            <a href="#">Remove</a>
          </div>
        </li>
      @endforeach
    </ul>
    <hr>

      <div class="d-flex w-25 justify-content-between">
          <h4>Subtotal</h4>
          <h4>$12.99</h4>
      </div>
      <div class="d-flex w-25 justify-content-between">
          <h2>Total</h2>
          <h2>$12.99</h2>
      </div>
      <button type="button" name="button" class="btn btn-primary">Order Now</button>

    <pre>
      @php
        print_r($pizzas);
      @endphp
      @php
        print_r($entrees);
      @endphp
      @php
        print_r($appetizers);
      @endphp
      @php
        print_r($drinks);
      @endphp
      @php
        print_r($desserts);
      @endphp
    </pre>


  </div>

@endsection
