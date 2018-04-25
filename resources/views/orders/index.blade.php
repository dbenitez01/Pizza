@extends ('layouts.master')
@section ('content')
  <div class="container">
    {{-- TODO: Orders --}}
    <h1>Current Orders</h1>
    <table class="table">

      <thead>
        <tr>
          <th>Order Id</th>
          <th>Status</th>
          <th>Date</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
          <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->created_at->diffForHumans() }}</td>
            <th><a href="/orders/{{ $order->id }}" class="btn btn-primary">View</a></th>
          {{-- @php
            $pizzas = App\Pizza::find($order->id)->get();

          @endphp --}}


        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
