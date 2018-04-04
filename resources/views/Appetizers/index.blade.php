@extends ('layouts.master')

@section ('content')
  @foreach ($appetizers as $app)
    <div class="row">
      <div class="col-md-6">
        <p>{{ $app->created_at->toFormattedDateString() }}</p>
        <p>{{ $app->name }}</p>
      </div>
    </div>
  @endforeach
@endsection
