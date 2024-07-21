<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('assests/img/logo.png') }}" />
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

</head>

<body class="backgound-gray-custom">
    @include('layouts.alert')
    <div
        class="min-h-screen flex flex-col bg-gray-50 dark:bg-slate-800 }}">
        {{-- <header class="bg-white shadow py-4">
            <div class="container mx-auto px-4 flex items-center justify-between">
                <a href="{{ url('/') }}" class="font-bold text-2xl">My App</a>

                <nav class="space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="px-3 py-2 rounded hover:bg-gray-200">Home</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="px-3 py-2 rounded hover:bg-gray-200">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        @else
                            <a href="{{ route('login') }}" class="px-3 py-2 rounded hover:bg-gray-200">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-3 py-2 rounded hover:bg-gray-200">Register</a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>
        </header> --}}

        <main class="flex-grow">
            @if (auth()->user() != null && !Request::routeIs('home'))
                @include('layouts.navbar')
                @include('layouts.sidebar')
                <div class="p-4 sm:ml-64 mt-20" id="main-content">
                    <div
                        class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 min-h-screen container mx-auto">
                        @yield('content')
                    </div>
                </div>
            @else
                {{-- @if(Request::routeIs('home') || Request::routeIs('documents.view'))
                @include('layouts.front-navbar')
                @endif --}}
                
                @yield('content')
            @endif
        </main>
        <div class="fixed z-50 inset-0 overflow-y-auto bg-gray-400 bg-opacity-50 hidden" id="delete-modal">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white dark:bg-slate-700 rounded-lg shadow-lg relative w-full max-w-md p-6">
                    <!-- Modal Content -->
                    <div class="text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="text-lg font-semibold mb-2 dark:text-white">Confirm Delete</h3>
                        <p class="text-sm text-gray-700 dark:text-white mb-4">Are you sure you want to delete this item?
                        </p>
                        <!-- Buttons -->
                        <div class="flex justify-center">
                            <form action="" method="post" id="deleteForm">
                                @csrf
                                <button type="submit"
                                    class="deleteBtn bg-red-500 text-white text-sm hover:bg-red-600 px-5 py-1.5 rounded-md mr-2">Yes,
                                    I'm sure</button>
                                <button type="button"
                                    class="bg-gray-300 text-gray-700 text-sm hover:bg-gray-400 px-5 py-1.5 rounded-md ml-2"
                                    id="cancel-delete-btn">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var dataArray = null;
        </script>
        @yield('scripts')
        @vite('resources/js/app.js')
</body>

</html>
