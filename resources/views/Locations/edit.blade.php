@extends ('layouts.master')
  @section ('content')
    <div class="container">
    <h1>Edit {{ $loc->name }}</h1>
    {{ Form::model($loc, array('route' => array('locations.update', $loc->id), 'method' => 'PUT')) }}
      {{ csrf_field() }}
      <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', null, array('class' => 'form-control')) }}
      </div>
      <div class="form-group">
        {{ Form::label('current_manager', 'Manager') }}
        {{ Form::number('current_manager', null, array('class' => 'form-control')) }}
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    {{ Form::close() }}
    @include('layouts.partials.errors')

    </div>

  @endsection
