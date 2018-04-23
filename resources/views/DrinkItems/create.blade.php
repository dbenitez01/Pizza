@extends ('layouts.master')
  @section ('content')
    <div class="container">
    <h1>Create a new Drink</h1>
    <form action="/drinks" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="user_photo">Avatar</label>
        <input type="file" name="user_photo" accept="image/*">
      </div>
      <div class="form-group">
        <label for="brand">Brand</label>
        <input type="text" class="form-control" id="brand" name="brand">
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

    </div>

  @endsection
