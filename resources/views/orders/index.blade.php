@extends ('layouts.master')
@section ('content')
  <div class="container">
    {{-- TODO: Orders --}}
    <h1>(( Show Ongoing Orders here ))</h1>
    @foreach ($orders as $order)
      {{ $order->id }}
    @endforeach
  </div>

@endsection
