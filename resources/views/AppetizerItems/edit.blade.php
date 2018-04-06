@extends ('layouts.master')
  @section ('content')
    <h1>Edit {{ $app->name }}</h1>
    {{ Form::model($app, array('route' => array('appetizers.update', $app->id), 'method' => 'PUT')) }}
      {{ csrf_field() }}
      <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
      </div>
      <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
      </div>
      <div class="form-group">
        {{ Form::label('price', 'Price') }}
        {{ Form::text('price', null, array('class' => 'form-control')) }}
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    {{ Form::close() }}
    @include('layouts.partials.errors')

  @endsection
