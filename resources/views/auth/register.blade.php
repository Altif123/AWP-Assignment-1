@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <div class="flex">
            <div class="w-full">
                <section
                        class="flex flex-col break-words bg-background-first sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                    <header class="font-semibold text-2xl bg-background-header text-t-fourth py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('Register') }}
                    </header>

                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                          action="{{ route('register') }}">
                        @csrf

                        <div class="flex flex-wrap">
                            <label for="name" class="block text-t-first text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Name') }}:
                            </label>

                            <input id="name" type="text"
                                   class="form-input bg-background-fourth w-full @error('name')  border-red-500 @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                   placeholder=" E.G Joe Blogs">

                            @error('name')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="email" class="block text-t-first text-sm font-bold mb-2 sm:mb-4">
                                {{ __('E-Mail Address please') }}:
                            </label>

                            <input id="email" type="email"
                                   class="form-input w-full bg-background-fourth @error('email') border-red-500 @enderror"
                                   name="email"
                                   value="{{ old('email') }}" required autocomplete="email"
                                   placeholder=" E.G Joe@Blog.com">

                            @error('email')
                            <p class="text-green-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="password" class="block text-t-first text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="password"
                                   class="form-input w-full bg-background-fourth @error('password') border-red-500 @enderror"
                                   name="password"
                                   required autocomplete="new-password" placeholder="*********">

                            @error('password')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="password-confirm" class="block text-t-first text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Confirm Password') }}:
                            </label>

                            <input id="password-confirm" type="password" class="form-input bg-background-fourth w-full"
                                   name="password_confirmation" required autocomplete="new-password"
                                   placeholder="*********">
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit"
                                    class="w-full select-none bg-background-btn font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 hover:bg-blue-700 sm:py-4">
                                {{ __('Register') }}
                            </button>

                            <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                                {{ __('Already have an account?') }}
                                <a class="text-gray-900 hover:text-blue-700 no-underline hover:underline"
                                   href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </p>
                        </div>
                    </form>

                </section>
            </div>
        </div>
    </main>
@endsection
