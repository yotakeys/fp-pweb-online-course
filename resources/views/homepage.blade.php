@extends('layouts.homepage.default')

@section('landing-section')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-primary overflow-hidden">
            <div class="flex items-center">
                <div class="w-full sm:max-w-md mt-6 px-3 py-4 bg-primary overflow-hidden sm:rounded-lg ">
                    <div>
                        <p>Hello, Again!</p>
                        <h1 class="text-left pb-6 text-3xl font-semibold">Join experienced Learning on this platform.</h1>
                    </div>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-secondary rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-primary-button class="ml-3 bg-white border border-secondary hover:bg-secondary hover:text-white">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
                <div class="hidden sm:block pl-5 ">
                    <img src="{{ asset('images/graphic3.png') }}" alt="Graphic" />
                </div>
            </div>
        </div>
    </div>
@endsection

@section('popular-courses-section')
    <div class="bg-tertiary">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 lg:py-10">
            <div class="pb-5 pt-10">
                <h1 class="text-center pt-6 pb-3 text-4xl font-semibold text-white">Popular Courses</h1>
                <p class="text-center text-xl text-white">Find your passion and start learning! now or never</p>
            </div>
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach ($courses as $course)
                    <a href="{{ route('reader.course.detail', ['id' => $course->id]) }}">
                        <div class="p-2 h-full"> @component('components.course-card', ['plan' => $course->plan->name,'title' => $course->title, 'description' => $course->description,'section_many' => count($course->sections),])@endcomponent</div>
                    </a>
                @endforeach
            </div>
            <div class="flex justify-center pt-10 py-1">
                <a href="{{ route('catalog.index') }}">
                    <x-secondary-button class="bg-white border border-yellow-500 hover:text-white hover:bg-yellow-500 py-3">Full Catalog</x-secondary-button>
                </a>
            </div>
        </div>
    </div>
@endsection
