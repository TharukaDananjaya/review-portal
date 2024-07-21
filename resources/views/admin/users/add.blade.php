@extends('layouts.app')
@section('title')
    Add User
@endsection
@section('dashboard_title')
    Add User
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
                <a href="{{ route('admin.users.manage') }}"
                    class="text-gray-500 hover:text-gray-700 dark:text-white dark:hover:text-gray-200">
                    <span>Users</span>
                </a>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 dark:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li>
                <span class="color-light-custom">Add User</span>
            </li>
        </ol>
    </nav>
    {{-- end breadcrumb --}}

    <div class="mt-5">
        <div class="grid sm:grid-cols-5 grid-cols-1">
            <div class="sm:col-start-2 sm:col-span-3 shadow-md p-3 rounded-md">
                <form method="POST" action="{{ route('admin.users.store') }}" class="mt-8">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="mb-4">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name <span
                                        class="text-red-500"><strong>*</strong></span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                    autofocus
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 @error('name') border-red-500 @enderror">
                            </div>
                            <div class="mb-4">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email <span
                                        class="text-red-500"><strong>*</strong></span></label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                    autofocus
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 @error('email') border-red-500 @enderror">
                            </div>
                            <div class="mb-4">
                                <label for="type"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                    option <span class="text-red-500"><strong>*</strong></span></label>
                                <select id="type" name="type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 @error('type') border-red-500 @enderror">
                                    <option selected>Choose a type</option>
                                    <option value="3">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>

                        </div>
                        <div>

                            <div class="mb-4">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                    option <span class="text-red-500"><strong>*</strong></span></label>
                                <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 @error('status') border-red-500 @enderror">
                                    <option selected>Choose a status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password <span
                                        class="text-red-500"><strong>*</strong></span></label>
                                <input type="password" id="password" name="password" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 @error('password') border-red-500 @enderror">
                            </div>
                            <div class="mb-4">
                                <label for="confirm_password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                    Password <span class="text-red-500"><strong>*</strong></span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 @error('password_confirmation') border-red-500 @enderror">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-end justify-end">
                        <button type="submit"
                            class="background-accent-light-custom hover:bg-blue-400 text-sm text-white py-2 px-4 rounded-lg focus:outline-none">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
