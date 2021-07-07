
@extends('layouts.app')


@section('content')
    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID"> // Replace YOUR_CLIENT_ID with your sandbox client ID
    </script>
    {{--    form--}}
<div class="container">
    @foreach( $profiles as $profile)
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">الايميل</label>
                <input type="text" value="{{ old('email') ?? $profile->email ?? 'default' }}"
                       placeholder="{{$profile->email}}" class="form-control" id="taskTitle"  name="email" >
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">الاسم</label>
                <input type="text" value="{{ old('name') ?? $profile->name ?? 'default' }}"
                       placeholder="{{$profile->name}}" class="form-control" id="taskTitle"  name="name" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">العنوان</label>
            <input type="text" value="{{ old('address') ?? $profile->address ?? 'default' }}"
                   placeholder="{{$profile->address}}" class="form-control" id="taskTitle"  name="address" >
        </div>
        <div class="form-group">
            <label for="inputAddress">رقم التلفون</label>
            <input type="text" value="{{ old('phone') ?? $profile->phone ?? 'default' }}"
                   placeholder="{{$profile->phone}}" class="form-control" id="taskTitle"  name="phone" >
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">البلد</label>
                <input type="text" value="{{ old('country') ?? $profile->country ?? 'default' }}"
                       placeholder="{{$profile->country}}" class="form-control" id="taskTitle"  name="country" >
            </div>
            <div class="form-group col-md-4">
                <label for="inputCity">المدينة</label>
                <input type="text" value="{{ old('city') ?? $profile->city ?? 'default' }}"
                       placeholder="{{$profile->city}}" class="form-control" id="taskTitle"  name="city" >
            </div>

        </div>


    </form>
    <h4 class="my-5">طريقة الدفع</h4>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="radio" id="inlineRadio1" value="stripe">
            <label class="form-check-label" for="inlineRadio1">فيزا او ماستر  <i class="fab fa-cc-visa"></i></label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="radio" id="inlineRadio2" value="paypal">
            <label class="form-check-label" for="inlineRadio2">بيبال <i class="fab fa-cc-paypal"></i></label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="radio" id="inlineRadio3" value="western"  >
            <label class="form-check-label" for="inlineRadio3">  ويسترن  <i class="fas fa-money-check-alt"></i></label>
        </div>
    @endforeach
</div>
    {{--    form--}}


    @php
        $stripe_key = 'pk_test_oJ0pHCp4KC7WzPFyu6nJlKgn007njMWGWI';
    @endphp
    <div id="stripe"    class="container " style="margin-top:10%;margin-bottom:10%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <p>You will be charged  {{$sum}} $</p>
                </div>
                <div class="card">
                    <form action="{{route('checkout.credit-card')}}"  method="post" id="payment-form">
                        @csrf
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Enter your credit card information
                                </label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="" />
                            </div>
                        </div>
                        <div class="card-footer">
                            <button
                                id="card-button"
                                class="btn btn-dark"
                                type="submit"
                                data-secret="{{ $intent }}"
                            > Pay </button>
                        </div>
                    </form>.
                </div>
            </div>
        </div>
    </div>

    <div onload="loadFunction()" class="container mt-5">

        <div class="col-sm-2">  <div id="paypal-button-container">  <p>You will be charged <span id="value">{{$sum}}</span> $</p> </div></div>

{{--          <a href=" {{'checkoutpaypal'}}">  <i class="fab fa-cc-paypal fa-5x"></i></a>--}}
    </div>



    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $('#stripe').hide();
        $('#paypal').hide();
        $(document).ready(function() {
            $("input[name='radio']").click(function() {
                var test = $(this).val();
                // console.log(test)

              if (test==='stripe'){

                  $('#stripe').show();
                  $('#paypal-button-container').hide();
              }
              else if(test==='paypal')
                {

                    $('#paypal-button-container ').show();

                    $('#stripe').hide();

                }
            });
        });

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
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

        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
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

            stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
                .then(function(result) {
                    console.log(result);
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        console.log(result);
                        form.submit();
                    }
                });
        });



    </script>
    @push('scripts')
        <script
            src="https://www.paypal.com/sdk/js?client-id=Ae9dDSV1KHmoGRA-fP2r3KzRssg-teRiQpSLH8MaMkwjv1SufXFkiV2qmYOot5w8L2ryAkgOjKVEj4vb&disable-funding=credit,card"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
        </script>

        <script type="text/javascript">


            var amount = document.getElementById("value").innerText;
            setTimeout(function() {
           paypal.Buttons({
                    style: {
                        shape: 'pill',

                    },

                    createOrder: function (data, actions) {


                        // This function sets up the details of the transaction, including the amount and line item details.
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: amount
                                }
                            }]
                        });
                    },
                    onApprove: function (data, actions) {
                        // This function captures the funds from the transaction.
                        return actions.order.capture().then(function (details) {
                            // This function shows a transaction success message to your buyer.
                            alert('Transaction completed by ' + details.payer.name.given_name);
                        });
                    }
                }).render('#paypal-button-container')
            }, 2000);
                //This function displays Smart Payment Buttons on your web page.
                // This function displays Smart Payment Buttons on your web page.



        </script>
    @endpush

@endsection
