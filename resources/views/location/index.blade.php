@extends ('layouts.master')
@section ('content')
@foreach($location as $loc)
    <div class="row">
        <div class="col-md-6">
            {{--<p>{{$loc->created_at->toFormattedDateString()}}</p>--}}
            <p>{{$loc->id}}</p>
            <p>{{$loc->Address}}</p>
        </div>

    </div>
    @endforeach
    @endsection