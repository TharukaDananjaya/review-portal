@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 mt-4 mb-4 flex justify-center items-center">
        <div class="w-full max-w-md">
            <div class="card dark:bg-slate-800 p-8 rounded-xl shadow-md">
                <div class="flex justify-center items-center">
                    <a href="{{route('home')}}">
                        <img src="{{ asset('assests/img/logo.png') }}" alt="" class="w-24">
                    </a>
                </div>
                {{-- <h3 class="text-center text-md font-bold dark:text-white text-gray-500">{{ env('APP_NAME') }}</h3> --}}
                <h1 class="dark:text-white text-gray-500 text-xl font-bold text-center">Register a new account</h1>
                <form method="POST" action="{{ route('register') }}" class="mt-8">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm dark:text-white text-gray-500 mb-2">Name <span class="text-red-500"><strong>*</strong></span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                            class="w-full h-10 p-3 rounded-lg text-sm border bg-slate-600 dark:text-white text-gray-500 focus:border-blue-500 @error('name') border-red-500 @enderror">
                    </div>
                    <div class="mb-4">
                        <label for="nid" class="block text-sm dark:text-white text-gray-500 mb-2">NID <span class="text-red-500"><strong>*</strong></span></label>
                        <input type="text" id="nid" name="nid" value="{{ old('nid') }}" required
                            class="w-full h-10 p-3 rounded-lg text-sm border bg-slate-600 dark:text-white text-gray-500 focus:border-blue-500 @error('nid') border-red-500 @enderror">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm dark:text-white text-gray-500 mb-2">Email <span class="text-red-500"><strong>*</strong></span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            required autocomplete="off"
                            class="w-full h-10 p-3 rounded-lg text-sm border bg-slate-600 dark:text-white text-gray-500 focus:border-blue-500 @error('email') border-red-500 @enderror">
                    </div>
                    <div class="mb-4">
                        <label for="mobile_number" class="block text-sm dark:text-white text-gray-500 mb-2">Mobile Number <span class="text-red-500"><strong>*</strong></span></label>
                        <input type="text" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}"
                            required autocomplete="off" placeholder="9601234567"
                            class="w-full h-10 p-3 rounded-lg text-sm border bg-slate-600 dark:text-white text-gray-500 focus:border-blue-500 @error('mobile_number') border-red-500 @enderror">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm dark:text-white text-gray-500 mb-2">Password <span class="text-red-500"><strong>*</strong></span></label>
                        <input type="password" id="password" name="password" required
                            class="w-full h-10 p-3 rounded-lg text-sm border bg-slate-600 dark:text-white text-gray-500 focus:border-blue-500 @error('password') border-red-500 @enderror">
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="block text-sm dark:text-white text-gray-500 mb-2">Confirm Password <span class="text-red-500"><strong>*</strong></span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full h-10 p-3 rounded-lg text-sm border bg-slate-600 dark:text-white text-gray-500 focus:border-blue-500 @error('password_confirmation') border-red-500 @enderror">
                    </div>



                    <div class="flex items-end justify-end">
                        <button type="submit"
                            class="background-accent-light-custom hover:bg-orange-500 w-full h-10 text-sm dark:text-white text-gray-500 py-2 px-4 rounded-lg focus:outline-none">Sign
                            up</button>
                    </div>
                </form>

                @if (Route::has('register'))
                    <div class="mt-4 text-center">
                        <a href="{{ route('login.index') }}" class="text-sm dark:text-white text-gray-500">Already have an account?
                            <span class="color-light-custom">Sign in!</span></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
