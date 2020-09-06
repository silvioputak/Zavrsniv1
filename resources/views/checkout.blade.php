@extends('layout')

@section('title', 'Plaćanje')

@section('extra-css')

<script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')

    <div class="container">

    @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <h1 class="checkout-heading stylish-heading">Plaćanje</h1>
        <div class="checkout-section">
            <div>
                <form action="{{route('checkout.store')}}" method="POST" id="payment-form">
                    {{csrf_field()}}
                    <h2>Podaci</h2>

                    <div class="form-group">
                        <label for="email">Email Adresa</label>
                        @if (auth()->user())
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                        @else
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Ime</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required  minlength="3" maxlength="30">
                    </div>
                    <div class="form-group">
                        <label for="address">Adresa</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required
                        minlength="3" maxlength="30">
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="city">Grad</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required
                            minlength="3" maxlength="30">
                        </div>
                        <div class="form-group">
                            <label for="province">Županija</label>
                            <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" required
                            minlength="3" maxlength="30">
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="postalcode">Poštanski broj</label>
                            <input type="number" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required
                            min="10000" max="99999">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefon</label>
                            <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required
                            min="1000000" max="10000000000">
                        </div>
                    </div> <!-- end half-form -->

                    <div class="spacer"></div>

                    <h2>Podaci o plaćanju</h2>

                    <div class="form-group">
                        <label for="name_on_card">Ime na kartici</label>
                        <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="" required minlength="3" maxlength="20">
                    </div>
                    

                    <div class="form-group">
                    <label for="card-element">
                        Kreditna kartica
                        </label>
                        <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    
                   

                    <div class="spacer"></div>
                    
                    <button type="submit" class="button-primary full-width">Plati</button>


                </form>
            </div>



            <div class="checkout-table-container">
                <h2>Vaša narudžba</h2>

                <div class="checkout-table">
                    @foreach(Cart::content() as $item)

                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <img src="{{asset('storage/' .$item->model->image)}}" class="checkout-table-img">
                            <div class="checkout-item-details">
                                <div class="checkout-table-item">{{$item->model->name}}</div>
                                <div class="checkout-table-description">{{$item->model->details}}</div>
                                <div class="checkout-table-price">{{$item->model->price}} <span> Kn</span></div>
                            </div>
                        </div> <!-- end checkout-table -->
                        
                        <div class="checkout-table-row-right">
                            <div class="checkout-table-quantity">{{$item->qty}}</div>
                        </div>
                    </div> <!-- end checkout-table-row -->
                    @endforeach

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        Neto <br>
                        
                        Porez<br>
                        <span class="checkout-totals-total">Ukupno</span>

                    </div>

                    <div class="checkout-totals-right">
                        {{Cart::subtotal()}} <span> Kn</span><br>
                        
                        {{Cart::tax()}} <span> Kn</span><br>
                        <span class="checkout-totals-total">{{Cart::total()}} <span> Kn</span></span>

                    </div>
                </div> <!-- end checkout-totals -->

            </div>

        </div> <!-- end checkout-section -->
    </div>

@endsection

@section('extra-js')
    <script>
        (function(){
           // Create a Stripe client.
var stripe = Stripe('pk_test_51HD4FcKlNtIMsBHvNpuO2GUbVBK0j44nh6Y40TWzRfqslhaGZ523DbPGwCAzbPe1fVur4YZgAmJTIoEDVD6Onm8800FrbJXfuF');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {
    style: style,
    hidePostalCode:true
    });

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  var options = {
    name: document.getElementById('name_on_card').value,
    address_line1: document.getElementById('address').value,
    address_city: document.getElementById('city').value,
    address_state: document.getElementById('province').value,
    address_zip: document.getElementById('postalcode').value
    }

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
} 
        })();
    </script>
@endsection
