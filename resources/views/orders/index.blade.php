@extends ('layouts.master')
@section ('content')
  <div class="container">
    {{-- TODO: Orders --}}
    <h1>Current Orders</h1>
    @php
      $current = true;
    @endphp
    @include('orders.partials.orders')
  </div>

@endsection
