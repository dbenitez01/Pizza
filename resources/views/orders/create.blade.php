@extends ('layouts.master')
@section ('content')
  <div class="container">
    <div class="text-center">
      {{-- TODO: Orders --}}
      <form>
      <h1>Find A Local {{ config('app.name', 'Laravel') }}</h1>
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
            <menu-item name="{{ $pizza->type }}" price="{{ $pizza->price }}" description="{{ $pizza->description }}" propid="{{ $pizza->id }}"></menu-item>
          @endforeach
        </div>
      </tab>
      <tab name="Entrees">
        @foreach ($entrees as $entree)
          <menu-item name="{{ $entree->name }}" price="{{ $entree->price }}" description="{{ $entree->description }}"></menu-item>
        @endforeach
      </tab>
      <tab name="Appetizers">
        <div class="row">
          @foreach ($apps as $app)
            <menu-item name="{{ $app->name }}" price="{{ $app->price }}" description="{{ $app->description }}"></menu-item>
          @endforeach
        </div>
      </tab>
      <tab name="Drinks">
        @foreach ($drinks as $drink)
          <menu-item name="{{ $drink->brand }}" price="{{ $drink->price }}" description="{{ $drink->description }}"></menu-item>
        @endforeach
      </tab>
      <tab name="Desserts">
        @foreach ($desserts as $dessert)
          <menu-item name="{{ $dessert->name }}" price="{{ $dessert->price }}" description="{{ $dessert->description }}"></menu-item>
        @endforeach
      </tab>
    </tabs>

{{--
    <h1>All tasks</h1>
    <ul>
      <li v-for="task in tasks" v-text="task.description"></li>
    </ul>

    <h1>Incomplete tasks</h1>
    <ul>
      <li v-for="task in incompleteTasks" v-text="task.description"></li>
    </ul>
    <task-list></task-list>
    <task>Go to the store</task>


    <card title="Card Title" body="Some quick example text to build on the card title and make up the bulk of the card's content."></card>
    <card title="Blah blah" body="Some quick example text to build on the card title and make up the bulk of the card's content."></card> --}}





    </form>
  </div>

@endsection
