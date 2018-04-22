@extends ('layouts.master')
  @section ('content')
    <div class="container">
    <h1>Locations</h1>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <tr>
              <th>ID</th>
              <th>Address</th>
              <th>Current Manager</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th></th>
              <th></th>
            </tr>
            @foreach ($locations as $loc)
              <tr>
                <td>{{ $loc->id }}</td>
                <td>{{ $loc->address }}</td>
                <td>{{ $loc->current_manager }}</td>
                <td>{{ $loc->created_at->diffForHumans() }}</td>
                <td>{{ $loc->updated_at->diffForHumans() }}</td>
                <td><a href="/locations/{{$loc->id}}/edit" class="btn btn-primary">Edit</a></td>
                <td>{{ Form::open(array('url' => 'locations/' . $loc->id )) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}</td>
              </tr>
            @endforeach
          </table>
          <a href="/locations/create" class="btn btn-primary">Create new Location</a>
        </div>
      </div>

      </div>
  @endsection
