@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            <h1 class="mb-6 mt-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                Basket
            </h1>
            <x-flashMessage/>
        </div>
        <div class="float-right pb-3">
            <span class="bg-green-500 text-grey-600 text-xl font-bold rounded p-3">Basket Total: £{{$cartTotal}}</span>
        </div>

        <form method="POST" action="order/store/{{$items}}">
            @csrf
            <button type="submit" role="button">
                <i class="fas fa-plus inline bg-green-500 text-grey-600 text-xl font-bold rounded p-3 crud-button cursor-pointer px-3 py-2"> Confirm</i>
            </button>
        </form>

        <div class="grid p-6 lg:grid-cols-3  md:grid-cols-2 sm:grid-cols-1  gap-3  bg-background-third rounded-md">
            @foreach($items as $item)
                @include('_partials.itemCard')
            @endforeach
        </div>

        <section class="flex flex-col w-full  py-8 px-8 break-words bg-background-third sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
            <div class="flex flex-col w-1/2  py-8 px-8 break-words bg-background-first sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
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
            <form action="{{ route('payment.process') }}" method="post" id="payment_form">
                @csrf
                <div class="flex flex-wrap pt-2">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Name on Card</label>
                    <input class="form-input w-full @error('name')  border-red-500 @enderror" size="4" id="name"
                           type='text'>
                </div>
                <div class="flex flex-wrap pt-2">
                    <label for="address" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Address</label>
                    <input class="form-input w-full @error('address')  border-red-500 @enderror" size="4" id="address"
                           type='text'>
                </div>
                <div class="flex flex-wrap pt-2">
                    <label for="city" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">City</label>
                    <input class="form-input w-full @error('city')  border-red-500 @enderror" size="4" id="city"
                           type='text'>
                </div>
                <div class="flex flex-wrap pt-2">
                    <label for="post_code" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">Post Code</label>
                    <input class="form-input w-full @error('post_code')  border-red-500 @enderror" size="4" id="post_code"
                           type='text'>
                </div>
                <div class="pb-5">
                <div class="form-row ">
                    <label for="card_area" class="block text-gray-700 pt-2 text-sm font-bold mb-2 sm:mb-4">
                        Credit or debit card
                    </label>
                    <div id="card_element" class="form-input ">
                    </div>
                    <div id="card_errors" role="alert"></div>
                </div>
                </div>
                <button class="select-none align-center  font-bold whitespace-no-wrap p-3 rounded-lg text-base
                    leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4" type="submit">
                    Pay Now
                </button>
            </form>
            </div>
        </section>
    </main>
    <script src="https://js.stripe.com/v3/"></script>
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
            card.mount('#card_area');
            card.addEventListener('change', function (event) {
                var showError = document.getElementById('card_errors');
                if (event.error) {
                    showError.textContent = event.error.message;
                } else {
                    showError.textContent = '';
                }
            });
            var form = document.getElementById('payment_form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                var options = {
                    name: document.getElementById('name').value,
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,
                    address_zip: document.getElementById('post_code').value,
                }
                stripe.createToken(card, options).then(function (result) {
                    if (!result.error) {
                        stripeTokenAppend(result.token);
                    } else {
                        var errors = document.getElementById('card_errors');
                        errors.textContent = result.error.message;

                    }
                });
            });
            function stripeTokenAppend(token) {
                var form = document.getElementById('payment_form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        })();
    </script>
@endsection
