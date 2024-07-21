@extends('layouts.app')
@section('title') Login @endsection
@section('content')
    <div class="container mx-auto px-4 mt-16 mb-16 flex justify-center items-center">
        <div class="w-full max-w-md mt-8">
            <div class="card dark:bg-slate-800 p-8 rounded-xl shadow-md">
                <div class="flex justify-center items-center">
                    <a href="{{route('login.index')}}">
                        <img src="{{ asset('assests/img/logo.png') }}" alt="" class="w-24">
                    </a>

                </div>
                {{-- <h3 class="text-center text-md font-bold dark:text-white text-gray-500">{{env('APP_NAME')}}</h3> --}}
                <h1 class="dark:text-white text-gray-500 text-xl font-bold text-center">Sign in to your account</h1>
                <form method="POST" action="{{ route('login') }}" class="mt-8">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm dark:text-white text-gray-500 mb-2">Email <span class="text-red-500"><strong>*</strong></span></label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full h-10 p-3 rounded-lg text-sm border dark:bg-slate-600 dark:text-white text-gray-500 focus:border-teal-500 @error('email') border-red-500 @enderror">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm dark:text-white text-gray-500 mb-2">Password <span class="text-red-500"><strong>*</strong></span></label>
                        <input type="password" id="password" name="password" required
                            class="w-full h-10 p-3 rounded-lg text-sm border dark:bg-slate-600 dark:text-white text-gray-500 focus:border-teal-500 @error('password') border-red-500 @enderror">
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <input name="remember_me" type="checkbox" id="checkbox"
                                class="h-4 w-4 focus:ring-orange-500 border-gray-300 rounded">
                            <label for="checkbox" class="ml-2 block text-sm dark:text-white text-gray-500">Remember Me</label>
                        </div>
                        <a href="" class="text-sm color-light-custom">Forgot your password?</a>
                    </div>

                    <div class="flex items-end justify-end">
                        <button type="submit"
                            class="background-accent-light-custom hover:bg-orange-500 w-full h-10 text-sm dark:text-white text-gray-500 py-2 px-4 rounded-lg focus:outline-none">Sign in</button>
                    </div>
                </form>

                @if (Route::has('register'))
                    <div class="mt-4 text-center">
                        <a href="{{ route('register') }}" class="text-sm dark:text-white text-gray-500">Don't have an account?
                            <span class="color-light-custom">Create one now!</span></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
