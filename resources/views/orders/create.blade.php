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

    <tabs>
      <tab name="Pizzas" :selected="true">
        <div class="row">
          @foreach ($pizzas as $pizza)
            <div class="col-md-6">
              <h1 class="d-inline">{{ $pizza->type }}</h1>
              <i class="fa fa-info-circle float-right" data-toggle="tooltip" data-placement="bottom" title="{{ $pizza->description }}"></i>
              <h3>${{ number_format($pizza->price, 2) }}</h3>
              <div class="form-group">
                <label for="size">Size</label>
                <select class="form-control" name="size">
                  <option value="S">Small</option>
                  <option value="M">Medium</option>
                  <option value="L">Large</option>
                </select>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <input type="number" name="quantity" value="1" class="form-control">
                </div>
                <div class="form-group col-md-10">
                  <button type="button" name="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add to Order</button>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </tab>
      <tab name="Entrees">
        <h1>Entrees!</h1>
      </tab>
      <tab name="Appetizers">
        <div class="row">
          @foreach ($apps as $app)
            <div class="col-md-6">
              <h1 class="d-inline">{{ $app->name }}</h1>
              <i class="fa fa-info-circle float-right" data-toggle="tooltip" data-placement="bottom" title="{{ $app->description }}"></i>
              <h3>${{ number_format($app->price, 2) }}</h3>
              <div class="form-group">
                <label for="size">Size</label>
                <select class="form-control" name="size">
                  <option value="S">Small</option>
                  <option value="M">Medium</option>
                  <option value="L">Large</option>
                </select>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <input type="number" name="quantity" value="1" class="form-control">
                </div>
                <div class="form-group col-md-10">
                  <button type="button" name="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add to Order</button>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </tab>
      <tab name="Drinks">
        <h1>Drinks...</h1>
      </tab>
      <tab name="Desserts">
        <h1>Desserts</h1>
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
