@extends ('layouts.master')
  @section ('content')
    <div class="container">
    <h1>Toppings</h1>
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
            @foreach ($toppings as $top)
              <tr>
                <td>{{ $top->id }}</td>
                <td>{{ $top->type}}</td>
                <td>{{ $top->description }}</td>
                <td>{{ $top->price }}</td>
                <td>{{ $top->created_at->diffForHumans() }}</td>
                <td>{{ $top->updated_at->diffForHumans() }}</td>
                <td><a href="/toppings/{{$top->id}}/edit" class="btn btn-primary">Edit</a></td>
                <td>{{ Form::open(array('url' => 'toppings/' . $top->id )) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}</td>
              </tr>
            @endforeach
          </table>
          <a href="/toppings/create" class="btn btn-primary">Create new Topping</a>
        </div>
      </div>


      </div>
  @endsection
