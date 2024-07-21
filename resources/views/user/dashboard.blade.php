@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('dashboard_title')
    Dashboard
@endsection
@section('content')
    <div class="bg-gradient-to-r from-teal-400 to-slate-700 shadow-md p-6 rounded-lg">
        <h2 class="text-3xl font-semibold text-white mb-2">Welcome back, {{ auth()->user()->name }}!</h2>
        <p class="text-white">We're glad to see you again. Hope you're having a great day!</p>
    </div>
@endsection
@section('scripts')
    
@endsection
