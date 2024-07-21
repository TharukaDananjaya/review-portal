@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')
    <div class="container mx-auto px-4 mt-16 mb-16 flex justify-center items-center">
        <div class="w-full max-w-md mt-8">
            <div class="card bg-slate-800 p-8 rounded-xl shadow-md">
                <div class="flex justify-center items-center">
                    <img src="{{ asset('assests/img/logo.png') }}" alt="" class="w-24">

                </div>
                <h3 class="text-center text-md font-bold text-white">{{ env('APP_NAME') }}</h3>
                <h1 class="text-white text-xl font-bold text-center">Verification</h1>
                <h6 class="text-gray-300 text-xs text-start mt-4">An SMS containing a six-digit verification code has been
                    sent to your mobile number. Please enter the code below to proceed.</h6>
                <form method="POST" action="{{ route('mobile.verify') }}" class="mt-4">
                    @csrf
                    <input type="hidden" name="nid" value="{{$nid}}">
                    <div class="mb-4">
                        <label for="otp" class="block text-sm text-white mb-2">OTP</label>
                        <input type="text" id="otp" name="otp" value="{{ old('otp') }}" required autofocus
                            class="w-full h-10 p-3 rounded-lg text-sm border bg-slate-600 text-white focus:border-blue-500 @error('otp') border-red-500 @enderror"
                            placeholder="123 456">
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            {{-- <input name="remember_me" type="checkbox" id="checkbox"
                                class="h-4 w-4 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="checkbox" class="ml-2 block text-sm text-white">Remember Me</label> --}}
                        </div>
                        <a href="" class="text-sm color-light-custom">Resend</a>
                    </div>

                    <div class="flex items-end justify-end">
                        <button type="submit"
                            class="background-accent-light-custom hover:bg-orange-500 w-full h-10 text-sm text-white py-2 px-4 rounded-lg focus:outline-none">Verify</button>
                    </div>
                </form>
                    <div class="mt-4 text-center">
                        <a href="{{ route('login.index') }}" class="text-sm text-white">
                            <span class="color-light-custom">sign in</span></a>
                    </div>
            </div>
        </div>
    </div>
@endsection
