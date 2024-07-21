@extends('layouts.app')
@section('title')
    Ideas & Suggestions
@endsection
@section('dashboard_title')
    Ideas & Suggestions
@endsection
@section('content')
    {{-- breadcrumb --}}
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 bg-white dark:bg-slate-700 p-2 text-sm rounded-md shadow-md">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="text-gray-500 dark:text-white dark:hover:text-gray-200 hover:text-gray-700 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-2 text-gray-900 dark:text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 dark:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li> --}}
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 dark:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li>
                <span class="color-light-custom">Ideas & Suggestions</span>
            </li>
        </ol>
    </nav>
    {{-- end breadcrumb --}}

    <div class="mt-5">
        <div class="grid sm:grid-cols-5 grid-cols-1">
            <div class="sm:col-start-2 sm:col-span-3 shadow-md p-3 rounded-md">
                <form method="POST" action="{{ route('user.idea-and-suggestion.store') }}" class="mt-8">
                    @csrf
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <div class="mb-4">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Describe your
                                    idea<span class="text-red-500"><strong>*</strong></span></label>
                                <textarea rows="5" id="description" name="description" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            </div>

                        </div>
                    </div>
                    <div class="flex items-end justify-end">
                        <button type="submit"
                            class="background-accent-light-custom hover:bg-blue-400 text-sm text-white py-2 px-4 rounded-lg focus:outline-none">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="grid sm:grid-cols-5 grid-cols-1">
            <div class="sm:col-start-2 sm:col-span-3 shadow-md p-3 rounded-md">
                <div class="grid grid-cols-1 gap-4">
                    <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-600">
                        @foreach ($data as $item)
                            <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    @if (auth()->user()->photo != null && auth()->user()->photo != '')
                                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                            src="{{ asset('storage/profiles/' . auth()->user()->photo) }}" alt="">
                                    @else
                                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                            src="{{ asset('assests/img/logo.png') }}" alt="">
                                    @endif

                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">
                                            {{ $item->name }}</p>
                                        <p class="mt-1 truncate text-xs leading-5 text-gray-600 dark:text-white">
                                            {{ $item->email }}</p>
                                        <p class="mt-2 text-sm leading-5 text-gray-500 ">
                                            {{ $item->description }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm leading-6 text-gray-900 dark:text-white">
                                        You
                                    </p>
                                    <p class="mt-1 text-xs leading-5 text-gray-500">Posted <time datetime="">
                                            {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                        </time></p>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <div class="flex items-end justify-end">
                    <div class="p-2 mt-4">
                        @if (!empty($data))
                            {{ $data->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
