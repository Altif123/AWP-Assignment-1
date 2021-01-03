@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="justify-content-center grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-4">
            <div class="py-4 px-8">
                <section
                        class="flex-col py-8 px-8 h-full bg-background-first sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                    <header class="font-semibold text-2xl bg-background-header text-t-fourth py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('Where to find us') }}
                    </header>
                    <iframe
                            class="py-8 px-8 border-solid border-4 border-light-blue-500"
                            width="100%"
                            height="70%"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBy6q3uT7Aowry6z0t58QuVkllZmCaq7-A
    &q=Coffeevolution,Huddersfeiled+UK" allowfullscreen>
                    </iframe>
                    <a href="https://www.google.com/maps/place/Coffeevolution/@53.647599,-1.781867,1066m/data=!3m1!1e3!4m5!3m4!1s0x0:0x3ccf176ea896f5b!8m2!3d53.6475988!4d-1.781867?hl=en-US">
                        <div class="flex flex-wrap ">
                            <button type="submit" role="button"
                                    class="select-none w-full align-center  font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                Print map
                            </button>
                        </div>
                    </a>
                </section>
            </div>
            <section
                    class="flex flex-col flex-1 py-8 px-8 lg:w-3/4 sm:w-full  break-words bg-background-first sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold text-2xl bg-background-header text-t-fourth py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Contact us') }}
                </header>

                <p class="w-full max-w-lg text-center py-8">We strive to serve up the best, most amazing experience at
                    Huddersfield-Cafe, and
                    what you think
                    lies at the heart of everything we do. We’d love to hear your thoughts on everything
                    from our food to our furniture, so don’t be shy…</p>

                <form method="POST" action="{{route('contact.store')}}" class="w-full max-w-lg">
                    @csrf
                    <x-flashMessage/>
                    <div class="flex flex-wrap pt-2">
                        <label class="block tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            Name:
                        </label>

                        <input id="name" aria-label="name" type="text"
                               class="form-input w-full @error('name')  border-red-500 @enderror"
                               name="name" required autocomplete="name" autofocus
                               placeholder=" Name goes here..." value="">

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap pt-2">
                        <label for="email" class="block tracking-wide text-gray-700 text-xs font-bold mb-2">
                            {{ __('Email') }}:
                        </label>

                        <input id="email" type="email"
                               class="form-input w-full bg-background-fourth @error('email') border-red-500 @enderror"
                               name="email"
                               value="{{ old('email') }}" required autocomplete="email"
                               placeholder=" E.G Joe@Blog.com">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap pt-2">
                        <label for="subject" class="block tracking-wide text-gray-700 text-xs font-bold mb-2">
                            {{ __('Subject') }}:
                        </label>

                        <input id="subject" aria-label="subject" type="text"
                               class="form-input w-full @error('subject')  border-red-500 @enderror"
                               name="subject" required autocomplete="subject" autofocus
                               placeholder=" subject goes here..." value="">

                        @error('subject')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap pt-2">
                        <label for="message" class="block tracking-wide text-gray-700 text-xs font-bold mb-2">
                            {{ __('Message') }}:
                        </label>

                        <input id="message" aria-label="message" type="text"
                               class="form-input w-full @error('message')  border-red-500 @enderror"
                               name="message" required autocomplete="subject" autofocus
                               placeholder=" Message goes here..." value="">

                        @error('message')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap mt-8">
                        <button type="submit" role="button"
                                class="select-none w-full align-center  font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            Send
                        </button>
                    </div>
                </form>

            </section>
        </div>
    </main>
@endsection
