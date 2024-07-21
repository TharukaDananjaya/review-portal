@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <div class="mt-20">
        <img class=" bg-teal-100" src="{{ asset('assests/img/Portal Header Image.jpg') }}" >
    </div>
    <div class="p-4 mt-10" id="main-content">
        <div
            class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 min-h-screen sm:container mx-auto">
            <div class="mt-1">
                <h1 class="text-teal-500 text-2xl text-center">Active Bills for Comment</h1>
                <div class="grid sm:grid-cols-2 grid-cols-1">
                    <div>
                        <div class="p-5 mb-4 ">
                            {{-- <time class="text-lg font-semibold text-gray-900 dark:text-white">January 13th, 2022</time> --}}
                            <ol class="mt-3 divide-y divider-gray-200 dark:divide-gray-700">
                                @foreach ($data as $item)
                                    <li class="border-b border-gray-200 dark:border-gray-700">
                                        <a href="{{ route('documents.view', ['id' => $item->id]) }}"
                                            class="items-center block p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700 transition-transform transform hover:translate-x-1">
                                            <span
                                                class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-400 border border-gray-500">Bills</span>
                                            <div class="text-gray-600 dark:text-gray-400">
                                                <div class="text-base font-normal"><span
                                                        class="font-medium text-gray-900 dark:text-white">{{ $item['title'] }}</span>
                                                </div>
                                                {{-- <div class="text-sm font-normal">"I wanted to share a webinar zeroheight."</div> --}}
                                                {{-- <span
                                                class="inline-flex items-center text-xs font-normal text-gray-500 dark:text-gray-400">
                                                <svg class="w-2.5 h-2.5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 .5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19ZM8.374 17.4a7.6 7.6 0 0 1-5.9-7.4c0-.83.137-1.655.406-2.441l.239.019a3.887 3.887 0 0 1 2.082 2.5 4.1 4.1 0 0 0 2.441 2.8c1.148.522 1.389 2.007.732 4.522Zm3.6-8.829a.997.997 0 0 0-.027-.225 5.456 5.456 0 0 0-2.811-3.662c-.832-.527-1.347-.854-1.486-1.89a7.584 7.584 0 0 1 8.364 2.47c-1.387.208-2.14 2.237-2.14 3.307a1.187 1.187 0 0 1-1.9 0Zm1.626 8.053-.671-2.013a1.9 1.9 0 0 1 1.771-1.757l2.032.619a7.553 7.553 0 0 1-3.132 3.151Z" />
                                                </svg>
                                                Public
                                            </span> --}}
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    <div></div>
                </div>



                {{-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">

                    @foreach ($data as $item)
                        <div>
                            <a href="{{ route('documents.view', ['id' => $item->id]) }}">

                                <div class="p-4 bg-gray-100 dark:bg-slate-700 rounded-md shadow-md flex flex-col h-full">
                                    <div class="flex mb-4">
                                        <div class="flex-grow">
                                            <span
                                                class="text-md text-gray-700 dark:text-white me-4">{{ $item['title'] }}</span>

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
                                            <a href="{{ route('documents.download', ['id' => $item->id]) }}"
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
                </div> --}}
                <div class="p-2 mt-4">
                    @if (!empty($data))
                        {{ $data->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
