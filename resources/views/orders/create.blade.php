@extends ('layouts.master')
@section ('content')
  <div class="container">
    <div class="text-center">
      {{-- TODO: Orders --}}
      <form>
      <h1 class="mt-3">Find A Local {{ config('app.name', 'Laravel') }}</h1>
      <div class="row justify-content-center"> <!-- icon row -->
        <div class="col-md-2">
          <div class="d-inline-block">
            <a href="#">
            <i class="fa fa-car fa-4x"></i>
            <p>Delivery</p></a>
          </div>
        </div>
        <div class="col-md-2">
          <div class="d-inline-block">
            <a href="#">
            <i class="fa fa-shopping-bag fa-4x"></i><br>
            <p>Carry Out</p></a>
          </div>
        </div>
      </div> <!-- End icon row -->
    </div>
    {{-- TODO: List locaions when clicking one of the buttons --}}
    <div class="danger" v-text="errors.get('name')"></div>
    <tabs>
      <tab name="Pizzas" :selected="true">
        <div class="row">
          @foreach ($pizzas as $pizza)
            <menu-item name="{{ $pizza->type }}" price="{{ $pizza->price }}" description="{{ $pizza->description }}" propid="{{ $pizza->id }}" table="pizza"></menu-item>
          @endforeach
        </div>
      </tab>
      <tab name="Entrees">
        <div class="row">
        @foreach ($entrees as $entree)
          <menu-item name="{{ $entree->name }}" price="{{ $entree->price }}" description="{{ $entree->description }}" propid="{{ $entree->id }}" table="entree"></menu-item>
        @endforeach
        </div>
      </tab>
      <tab name="Appetizers">
        <div class="row">
          @foreach ($apps as $app)
            <menu-item name="{{ $app->name }}" price="{{ $app->price }}" description="{{ $app->description }}" propid="{{ $app->id }}" table="app"></menu-item>
          @endforeach
        </div>
      </tab>
      <tab name="Drinks">
        <div class="row">
        @foreach ($drinks as $drink)
          <menu-item name="{{ $drink->brand }}" price="{{ $drink->price }}" description="{{ $drink->description }}" propid="{{ $drink->id }}" table="drink"></menu-item>
        @endforeach
        </div>
      </tab>
      <tab name="Desserts">
        <div class="row">
        @foreach ($desserts as $dessert)
          <menu-item name="{{ $dessert->name }}" price="{{ $dessert->price }}" description="{{ $dessert->description }}" propid="{{ $dessert->id }}" table="dessert"></menu-item>
        @endforeach
        </div>
      </tab>
    </tabs>

    </form>
  </div>

@endsection
