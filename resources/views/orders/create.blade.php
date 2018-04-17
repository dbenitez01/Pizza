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

    <hr> <!-- subnav -->
      <ul class="nav justify-content-center nav-fill">
        <li class="nav-item"><h4><a href="nav-link active">Pizza</a></h4></li>
        <li class="nav-item"><h4><a href="nav-link">Entrees</a></h4></li>
        <li class="nav-item"><h4><a href="nav-link">Appetizers</a></h4></li>
        <li class="nav-item"><h4><a href="nav-link">Drinks</a></h4></li>
        <li class="nav-item"><h4><a href="nav-link">Desserts</a></h4></li>
      </ul>
    <hr> <!-- end subnav -->
    <div class="row">
      @foreach ($pizzas as $pizza)
        <div class="col-md-6">
          <h1>{{ $pizza->type }}</h1>
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





    </form>
  </div>

@endsection
