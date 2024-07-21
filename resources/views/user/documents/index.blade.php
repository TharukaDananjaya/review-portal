@extends('layouts.app')
@section('title')
    Comment on Bills
@endsection
@section('dashboard_title')
    Comment on Bills
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
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 dark:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li>
                <span class="color-light-custom">Comment on Bills</span>
            </li>
            {{-- <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 dark:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li> --}}
            {{-- <li>
                <span class="color-light-custom">Comment on Bills</span>
            </li> --}}
        </ol>

    </nav>
    {{-- end breadcrumb --}}
    <div class="mt-5">'
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
            @foreach ($data as $item)
                <div>
                    <a href="{{ route('user.documents.view', ['id' => $item->id]) }}">

                        <div class="p-4 bg-gray-100 dark:bg-slate-700 rounded-md shadow-md flex flex-col h-full">
                            <div class="flex mb-4">
                                <div class="flex-grow">
                                    <span class="text-md text-gray-700 dark:text-white me-4">{{ $item['title'] }}</span>

                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-green-400 border border-green-400">Admin</span>
                                    <p class="text-gray-500 dark:text-gray-400 text-xs mt-1">{{ $item['note'] }}</p>
                                    <p class="text-md text-gray-400 dark:text-gray-500 text-xs mt-2">
                                        {{ $item['original_file_name'] }}</p>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="h-12 w-12 rounded-full object-cover border p-2 border-gray-400 text-gray-500 dark:text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </div>
                            </div>

                            <div class="flex justify-between mt-auto">
                                <div class="flex-grow flex items-center">
                                    <span
                                        class="bg-dark-100 text-dark-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-gray-400 border border-dark-400">
                                        {{ $item->comment_count }} comments
                                    </span>
                                    <a href="{{ route('admin.documents.download', ['id' => $item->id]) }}"
                                        style="margin-top: 3px; padding: 1px 10px 1px 10px;"
                                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 rounded-lg dark:bg-blue-900 dark:text-blue-300 bg-dark-100 text-dark-800 dark:text-dark-400 border border-dark-400 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                        <span class="ms-0.5">download</span> <!-- Adjusted margin class -->
                                    </a>
                                    <a href="{{ url($item->document) }}" target="_blank"
                                        style="margin-top: 3px; padding: 1px 10px 1px 10px;"
                                        class="bg-teal-100 text-teal-800 text-xs font-medium me-2 rounded-lg dark:bg-teal-900 dark:text-teal-300 bg-dark-100 text-dark-800 dark:text-dark-400 border border-dark-400 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                        <span class="ms-0.5">view</span> <!-- Adjusted margin class -->
                                    </a>
                                </div>
                            </div>
                            <div class="text-xs text-end mt-1 text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="p-2 mt-4">
            @if (!empty($data))
                {{ $data->links() }}
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
