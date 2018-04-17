@extends ('layouts.master')
  @section ('content')
    <div class="container">
    <h1>Types of Pizza</h1>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <tr>
              <th>ID</th>
              <th>Type</th>
              <th>Description</th>
              <th>Price</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th></th>
              <th></th>
            </tr>
            @foreach ($pizzaTypes as $pizza)
              <tr>
                <td>{{ $pizza->id }}</td>
                <td>{{ $pizza->type}}</td>
                <td>{{ $pizza->description }}</td>
                <td>{{ $pizza->price }}</td>
                <td>{{ $pizza->created_at->diffForHumans() }}</td>
                <td>{{ $pizza->updated_at->diffForHumans() }}</td>
                <td><a href="/pizzas/{{$pizza->id}}/edit" class="btn btn-primary">Edit</a></td>
                <td>{{ Form::open(array('url' => 'pizzas/' . $pizza->id )) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}</td>
              </tr>
            @endforeach
          </table>
          <a href="/pizzas/create" class="btn btn-primary">Create new Pizza</a>
        </div>
      </div>


      </div>
  @endsection
