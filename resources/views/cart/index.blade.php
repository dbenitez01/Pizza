@extends ('layouts.master')
@section ('content')
  <div class="container">
    <div class="row">
      <h1>Your Cart</h1>
    </div>
    <div class="row">
      <a href="#">Add More Food</a>
    </div>
    @foreach ($cart as $item)
      <div class="row">
        {{ $item['id'] }}
        {{ $item['price'] }}
      </div>
    @endforeach

    <pre>
      <?php print_r($cart); ?>
    </pre>
  </div>

@endsection
