@extends ('layouts.master')
  @section ('content')
    <h1>Desserts</h1>
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
            @foreach ($desserts as $des)
              <tr>
                <td>{{ $des->id }}</td>
                <td>{{ $des->name }}</td>
                <td>{{ $des->description }}</td>
                <td>{{ $des->price }}</td>
                <td>{{ $des->created_at->diffForHumans() }}</td>
                <td>{{ $des->updated_at->diffForHumans() }}</td>
                <td><a href="/desserts/{{$des->id}}/edit" class="btn btn-primary">Edit</a></td>
                <td>{{ Form::open(array('url' => 'desserts/' . $des->id )) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}</td>
              </tr>
            @endforeach
          </table>
          <a href="/desserts/create" class="btn btn-primary">Create new Dessert</a>
        </div>
      </div>
  @endsection
