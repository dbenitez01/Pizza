@if (!$orders->isEmpty())
<table class="table">

  <thead>
    <tr>
      <th>Order Id</th>
      <th>Status</th>
      <th>Type</th>
      <th>Order Items</th>
      <th>Customer</th>
      <th>Total</th>
      <th>Date</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
      <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->status }}</td>
        <td>{{ $order->type }}</td>
        <td>
          @php
            $pizzas = $order->pizzas;
            foreach ($pizzas as $pizza) {
              echo $pizza->quantity. " &times; (" . $pizza->size. ") " .$pizza->type->type . "<br />";
            }
            $appetizers = $order->appetizers;
            foreach ($appetizers as $app) {
              echo $app->quantity. " &times; (" . $app->size. ") " .$app->item->name . "<br />";
            }
            $entrees = $order->entrees;
            foreach ($entrees as $entree) {
              echo $entree->quantity. " &times; (" . $entree->size. ") " .$entree->item->name . "<br />";
            }
            $drinks = $order->drinks;
            foreach ($drinks as $drink) {
              echo $drink->quantity. " &times; (" . $drink->size. ") " .$drink->item->brand . "<br />";
            }
            $desserts = $order->desserts;
            foreach ($desserts as $dessert) {
              echo $dessert->quantity. " &times; (" . $dessert->size. ") " .$dessert->item->name . "<br />";
            }
          @endphp
        </td>
        <td>{{ $order->user->name}}
          @if ($order->type == 'delivery')
            @php
              echo "<br /> Deliver to: " . $order->user->address;
            @endphp
          @endif
        </td>
        <td>${{ $order->total_price}}</td>
        <td>{{ $order->created_at->diffForHumans() }}</td>
        <td><a href="/orders/{{ $order->id }}" class="btn btn-primary">View</a></td>
        @if (isset($current) && $current)
          <td><a href="/orders/{{ $order->id }}/complete" class="btn btn-success">Complete Order</a></td>
        @endif
      {{-- @php
        $pizzas = App\Pizza::find($order->id)->get();

      @endphp --}}


    </tr>
    @endforeach
  </tbody>
</table>
@else
There currently no orders here...
@endif
