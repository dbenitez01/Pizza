@extends ('layouts.master')
  @section ('content')
    <div class="container">
    <h1>Entrees</h1>
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
            @foreach ($entrees as $ent)
              <tr>
                <td>{{ $ent->id }}</td>
                <td>{{ $ent->name }}</td>
                <td>{{ $ent->description }}</td>
                <td>{{ $ent->price }}</td>
                <td>{{ $ent->created_at->diffForHumans() }}</td>
                <td>{{ $ent->updated_at->diffForHumans() }}</td>
                <td><a href="/entrees/{{$ent->id}}/edit" class="btn btn-primary">Edit</a></td>
                <td>{{ Form::open(array('url' => 'entrees/' . $ent->id )) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}</td>
              </tr>
            @endforeach
          </table>
          <a href="/entrees/create" class="btn btn-primary">Create new Entree</a>
        </div>
      </div>

      </div>
  @endsection
