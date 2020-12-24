@extends('layouts.app')

@section('content')

    <main class="sm:container sm:mx-auto sm:mt-10">
        <section
                class="flex flex-col  w-1/3  py-8 px-8 break-words bg-background-first sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
            <div class=" justify-content-center">
                <header class="font-semibold text-2xl bg-background-header text-t-fourth py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Payment') }}
                </header>
            </div>
            @if(count($errors) > 0)
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">ERROR</div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form role="form" action="{{ route('payment.process') }}" method="post"
                  id="payment"
                  data-cc-on-file="false"
                  data-stripe-publishable-key="{{ env('STRIPE_SECRET') }}">
                @csrf

                <div class="flex flex-wrap">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Name on Card</label>
                    <input class="form-input w-full @error('name')  border-red-500 @enderror" size="4" id="name"
                           type='text'>
                </div>

                <div class="flex flex-wrap">

                    <label class='block text-gray-700 text-sm font-bold mb-2 sm:mb-4'>Card Number</label>
                    <input autocomplete='off' id="card_number"
                           class="form-input w-full @error('name')  border-red-500 @enderror" size='20'
                           type='text'>
                </div>

                <div class="flex flex-wrap">
                    <label class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">CVC</label>
                    <input autocomplete='off' class="form-input w-full @error('name')  border-red-500 @enderror"
                           name="card-cvc" id="card-cvc" placeholder='e.g 415'
                           size='4'
                           type='text'>
                </div>
                <div class="flex flex-wrap">
                    <label class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Expiration Month</label>
                    <input class="form-input w-full @error('name')  border-red-500 @enderror"
                           id="card-expiry-month" placeholder='MM' size='2'
                           type='text'>
                </div>
                <div class="flex flex-wrap">
                    <label class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Expiration Year</label>
                    <input class="form-input w-full @error('name')  border-red-500 @enderror"
                           id="card-expiry-year" placeholder='YYYY' size='4'
                           type='text'>
                </div>

                <div class="flex flex-wrap mt-8">
                    <div class="w-1/6">
                        <button class="select-none align-center  font-bold whitespace-no-wrap p-3 rounded-lg text-base
                    leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4" type="submit">
                            Pay Now
                        </button>
                    </div>
                </div>
            </form>

            <form action="{{ route('payment.process') }}" method="post" id="payment-form">
                @csrf
                <div class="flex flex-wrap">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Name on Card</label>
                    <input class="form-input w-full @error('name')  border-red-500 @enderror" size="4" id="name"
                           type='text'>
                </div>
                <div class="form-row">
                    <label for="card-element" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                    </div>
                    <div id="card-errors" role="alert"></div>
                </div>

                <button class="select-none align-center  font-bold whitespace-no-wrap p-3 rounded-lg text-base
                    leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4" type="submit">
                    Pay Now
                </button>
            </form>
        </section>
    </main>

    <script>

        (function () {
            var stripe = Stripe('{{ env('STRIPE_PK') }}');
            var elements = stripe.elements();
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
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
            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });
            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                var options = {
                    name: document.getElementById('name').value,
                }
                stripe.createToken(card, options).then(function (result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server
                        stripeTokenHandler(result.token);
                    }
                });
            });

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
