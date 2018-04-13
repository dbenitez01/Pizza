@extends ('layouts.master')
  @section ('content')
    <div class="container">
    <h1>Appetizers</h1>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Price</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th></th>
              <th></th>
            </tr>
            @foreach ($appetizers as $app)
              <tr>
                <td>{{ $app->id }}</td>
                <td>{{ $app->name }}</td>
                <td>{{ $app->description }}</td>
                <td>{{ $app->price }}</td>
                <td>{{ $app->created_at->diffForHumans() }}</td>
                <td>{{ $app->updated_at->diffForHumans() }}</td>
                <td><a href="/appetizers/{{$app->id}}/edit" class="btn btn-primary">Edit</a></td>
                <td>{{ Form::open(array('url' => 'appetizers/' . $app->id )) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}</td>
              </tr>
            @endforeach
          </table>
          <a href="/appetizers/create" class="btn btn-primary">Create new appetizer</a>
        </div>
      </div>


      </div>
  @endsection
