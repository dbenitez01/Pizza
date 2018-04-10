@extends ('layouts.master')
  @section ('content')
    <h1>Create a new Topping</h1>
    <form action="/toppings" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" id="type" name="type">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
    @include('layouts.partials.errors')

  @endsection
