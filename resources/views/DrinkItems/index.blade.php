@extends ('layouts.master')
  @section ('content')
    <h1>Drinks</h1>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <tr>
              <th>ID</th>
              <th>Brand</th>
              <th>Description</th>
              <th>Price</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th></th>
              <th></th>
            </tr>
            @foreach ($drinks as $drink)
              <tr>
                <td>{{ $drink->id }}</td>
                <td>{{ $drink->brand }}</td>
                <td>{{ $drink->description }}</td>
                <td>{{ $drink->price }}</td>
                <td>{{ $drink->created_at->diffForHumans() }}</td>
                <td>{{ $drink->updated_at->diffForHumans() }}</td>
                <td><a href="/drinks/{{$drink->id}}/edit" class="btn btn-primary">Edit</a></td>
                <td>{{ Form::open(array('url' => 'drinks/' . $drink->id )) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}</td>
              </tr>
            @endforeach
          </table>
          <a href="/drinks/create" class="btn btn-primary">Create new drink</a>
        </div>
      </div>
  @endsection
