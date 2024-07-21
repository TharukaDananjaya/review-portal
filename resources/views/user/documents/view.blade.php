@extends('layouts.app')
@section('title')
    View Document
@endsection
@section('dashboard_title')
    View Document
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
                <a href="{{ route('user.documents.list') }}"
                    class="text-gray-500 hover:text-gray-700 dark:text-white dark:hover:text-gray-200">
                    <span>Documents</span>
                </a>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 dark:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li>
                <span class="color-light-custom">View Document</span>
            </li>
        </ol>
    </nav>
    {{-- end breadcrumb --}}
    <div class="mt-5">

        <div class="grid sm:grid-cols-5 grid-cols-1">
            <div class="sm:col-start-2 sm:col-span-3 shadow-md p-3 rounded-md">
                <div class="gap-4 mb-4">
                    <a href="">
                        <div>
                            <div class="p-4 bg-gray-100 dark:bg-slate-700 rounded-md shadow-md">
                                <div class="flex">
                                    <div class="flex-grow">
                                        <span class="text-md text-gray-700 dark:text-white me-4">{{ $data['title'] }}</span>

                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-green-400 border border-green-400">Admin</span>
                                        <p class="text-gray-500 dark:text-gray-400 text-xs mt-1">{{ $data['note'] }}</p>
                                        <p class="text-md text-gray-400 dark:text-gray-500 text-xs mt-2">
                                            {{ $data['original_file_name'] }}</p>
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

                                <div class="flex mt-5">
                                    <div class="flex-grow flex items-center">
                                        <span
                                            class="bg-dark-100 text-dark-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-lg dark:bg-gray-700 dark:text-gray-400 border border-dark-400">
                                            {{$comment_count}} comments
                                        </span>
                                        <a href="{{ route('admin.documents.download', ['id' => $data->id]) }}"
                                            style="margin-top: 3px; padding: 1px 10px 1px 10px;"
                                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 rounded-lg dark:bg-blue-900 dark:text-blue-300 bg-dark-100 text-dark-800 dark:text-dark-400 border border-dark-400 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                            <span class="ms-0.5">download</span> <!-- Adjusted margin class -->
                                        </a>
                                        <a href="{{ url($data->document) }}" target="_blank"
                                            style="margin-top: 3px; padding: 1px 10px 1px 10px;"
                                            class="bg-teal-100 text-teal-800 text-xs font-medium me-2 rounded-lg dark:bg-teal-900 dark:text-teal-300 bg-dark-100 text-dark-800 dark:text-dark-400 border border-dark-400 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                              </svg>
                                              
                                            <span class="ms-0.5">view</span> <!-- Adjusted margin class -->
                                        </a>
                                    </div>

                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <ol class="relative border-s border-gray-200 dark:border-gray-700">

                    @foreach ($comments as $item)
                        <li class="mb-10 ms-6 mt-10">
                            <span
                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                @if ($item->photo != null && $item->photo != '')
                                    <img class="rounded-full shadow-lg"
                                        src="{{ asset('storage/profiles/' . $item->photo) }}" alt="">
                                @else
                                    <img class="rounded-full shadow-lg" src="{{ asset('assests/img/logo.png') }}"
                                        alt="">
                                @endif
                            </span>
                            <div
                                class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                                <div class="items-center justify-between mb-3 sm:flex">
                                    <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</time>
                                    <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">
                                        {{ $item->user_name }} commented</div>
                                </div>
                                <div
                                    class="p-3 text-xs italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                    {{ $item->comment }}</div>
                            </div>
                        </li>
                    @endforeach
                    @if (count($comments) == 0)
                        <li class="mb-10 ms-6 mt-10 text-sm font-normal text-gray-500 lex dark:text-gray-300">Write first
                            comment</li>
                    @endif
                </ol>


                <form method="POST" action="{{ route('user.documents.comment.store') }}" class="mt-8"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <div
                                class="p-3 text-xs italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                <div class="mb-4">
                                    <label for="comment"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comment <span
                                            class="text-red-500"><strong>*</strong></span></label>
                                    <textarea rows="5" id="comment" name="comment"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('comment') border-red-500 @enderror">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-end justify-end mt-4">
                        <button type="submit"
                            class="background-accent-light-custom hover:bg-orange-500 text-sm text-white py-2 px-4 rounded-lg focus:outline-none">Comment</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
