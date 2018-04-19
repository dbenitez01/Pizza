@extends ('layouts.master')
@section ('content')
  <div class="container">
    <div class="row">
      <h1>Your Cart</h1>
    </div>
    <div class="row">
      <a href="#">Add More Food</a>
    </div>
    {{-- @foreach ($cart as $item)
      {{-- <div class="row">
        {{ $item['id'] }}
        {{ $item['price'] }}
      </div>
    @endforeach --}}
    @foreach ($dbPizzas as $pizza)
      {{ $pizza->type }}
    @endforeach
    @foreach ($dbEntrees as $entree)
      {{ $entree->name }}
    @endforeach
    @foreach ($dbApps as $app)
      {{ $app->name }}
    @endforeach
    @foreach ($dbDesserts as $dessert)
      {{ $dessert->name }}
    @endforeach
    @foreach ($dbDrinks as $drink)
      {{ $drink->brand }}
    @endforeach
    <pre>



    </pre>
  </div>

@endsection
