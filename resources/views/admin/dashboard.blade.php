@extends('layouts.app')
@section('title') Dashboard @endsection
@section('dashboard_title') Dashboard @endsection
@section('content')
<div class="bg-gradient-to-r from-blue-400 to-slate-700 shadow-md p-6 rounded-lg">
    <h2 class="text-3xl font-semibold text-white mb-2">Welcome back, {{auth()->user()->name}}!</h2>
    <p class="text-white">We're glad to see you again. Hope you're having a great day!</p>
</div>

<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-4">
    {{-- <!-- Total Users Card -->
    <div class="bg-slate-100 dark:bg-slate-700 p-4 rounded-lg flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
          </svg>          
        <div>
            <h3 class="text-sm dark:text-white font-semibold mb-2">Total Users</h3>
            <p class="text-gray-700 dark:text-gray-400 text-4xl">{{number_format($total_users)}}</p>
        </div>
    </div>

    <!-- Active Users Card -->
    <div class="bg-slate-100 dark:bg-slate-700 p-4 rounded-lg flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-green-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
          </svg>          
        <div>
            <h3 class="text-sm dark:text-white font-semibold mb-2">Active Users</h3>
            <p class="text-green-600 text-4xl">{{number_format($active_users)}}</p>
        </div>
    </div>

    <!-- Inactive Users Card -->
    <div class="bg-slate-100 dark:bg-slate-700 p-4 rounded-lg flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-red-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
          </svg>
        <div>
            <h3 class="text-sm dark:text-white font-semibold mb-2">Inactive Users</h3>
            <p class="text-red-600 text-4xl">{{number_format($inactive_users)}}</p>
        </div>
    </div>

    <!-- Earnings Card -->
    <div class="bg-slate-100 dark:bg-slate-700 p-4 rounded-lg flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-indigo-600">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          
        <div>
            <h3 class="text-sm dark:text-white font-semibold mb-2">Earnings</h3>
            <p class="text-indigo-600 text-4xl">${{number_format($earnings, 2)}}</p>
        </div>
    </div> --}}
</div>

@endsection