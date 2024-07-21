<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" />
    <title>403 | {{ config('app.name', 'Laravel') }}</title>
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

    <div class="min-h-screen flex flex-col  dark:bg-slate-800 {{ auth()->user() == null ? 'bg-slate-800' : 'bg-gray-50' }}">

        <main class="grid min-h-full place-items-center px-6 py-24 sm:py-32 lg:px-8">
          <div class="text-center">
            <p class="text-base font-semibold color-light-custom">403</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl dark:text-white">Forbidden</h1>
            <p class="mt-6 text-base leading-7 text-gray-600 dark:text-white">Sorry, you don't have permission to access this.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
              <a href="{{route('dashboard')}}" class="rounded-md background-accent-light-custom px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Go back home</a>
              <a href="#" class="text-sm font-semibold text-gray-900 dark:text-white">Contact support <span aria-hidden="true">&rarr;</span></a>
            </div>
          </div>
        </main>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
