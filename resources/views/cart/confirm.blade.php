@extends ('layouts.master')
@section ('content')
  <div class="container">
      <h1>My Cart</h1>
    <form action="{{ route('orders.store') }}" method="post">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-9">
          <div class="form-group">
              <label for="credit-card">Credit Card Number</label>
              <input type="text" name="credit-card" class="form-control" placeholder="Card Number: XXXXXXXXXXXXXXXX">
          </div>
          <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="text" name="cvv" class="form-control w-25" placeholder="XXX">
          </div>
          <div class="form-group">
            <label for="name">Name on Card</label>
            <input type="text" name="name" class="form-control" placeholder="Name on Card">
          </div>
          <div class="form-row">
            <div class="col">


            <label for="name">Expiration Month</label>
            <select class="form-control" name="month">
              <option selected disabled hidden>Month</option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>

            </div>
            <div class="col">
              <label for="days">Expiration Day</label>
            <select class="form-control" name="days">
              <option selected disabled hidden>Day</option>
              @for ($i=1; $i < 32; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
          <div class="col">
            <label for="zip">Zip Code</label>
            <input type="text" name="zip" placeholder="Zip Code" class="form-control">
          </div>

        </div>
      </div>
        <div class="col-md-3">
          <h3>My Order</h3>
          {{-- <pre>

            @php
              print_r($cart);
            @endphp
          </pre> --}}
          @foreach ($cart as $item)
          <div class="d-flex justify-content-between">

              <div class="">
                {{ $item['name'] }}
              </div>
              <div class="">
                ${{ sprintf('%0.2f', $item['price'] * $item['quantity']) }}
              </div>

          </div>
          @endforeach
          <hr>
          <div class="">
            <p>Subtotal: ${{ $sub }}</p>
            <p>Tax: ${{ sprintf('%0.2f', $appliedTax) }}</p>
            <hr>
            <h3>Total: ${{ sprintf('%0.2f', $total) }}</h3>
          </div>
          <input type="Submit" name="Submit" value="Submit Order" class="btn btn-primary">
        </div>
      </div>
    </form>
    {{-- <pre>

      @php
        print_r($cart);
      @endphp
    </pre> --}}
  </div>
@endsection
