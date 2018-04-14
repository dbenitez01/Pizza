@extends ('layouts.master')
@section ('content')
  <div class="container">
    <div class="text-center">
      {{-- TODO: Orders --}}
      <h1>Find A Local {{ config('app.name', 'Laravel') }}</h1>
      <div class="row justify-content-center"> <!-- icon row -->
        <div class="col-md-2">
          <div class="d-inline-block">
            <a href="#">
            <i class="fa fa-car fa-4x"></i>
            <p>Delivery</p></a>
          </div>
        </div>
        <div class="col-md-2">
          <div class="d-inline-block">
            <a href="#">
            <i class="fa fa-shopping-bag fa-4x"></i><br>
            <p>Carry Out</p></a>
          </div>
        </div>
      </div> <!-- End icon row -->
    </div>
    {{-- TODO: List locaions when clicking one of the buttons --}}

    
  </div>

@endsection
