@extends ('layouts.master')
@section ('content')
  <div class="container">
    <h1>My Past Orders</h1>
    @include('orders.partials.orders')
  </div>

@endsection
