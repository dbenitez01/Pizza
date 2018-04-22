@extends ('layouts.master')
  @section ('content')
    <div class="container">
    <h1>Create a new Location</h1>
    <form action="/locations" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address">
      </div>
      <div class="form-group">
        <label for="current_manager">Current Manager</label>
        <input type="number" class="form-control" id="current_manager" name="current_manager">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </form>
    @include('layouts.partials.errors')

    </div>

  @endsection
