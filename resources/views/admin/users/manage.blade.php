@extends('layouts.app')
@section('title')
    Manage Users
@endsection
@section('dashboard_title')
    Manage Users
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
                <span class="color-light-custom">Users</span>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 dark:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li>
                <span class="color-light-custom">Manage Users</span>
            </li>
        </ol>
    </nav>
    {{-- end breadcrumb --}}
    <div class="mt-5">

        <div class="text-end mb-5">
            <a href="{{route('admin.users.add')}}"
                class="inline-flex items-center px-5 py-1.5 background-accent-light-custom border border-transparent rounded-md text-sm font-semibold text-white hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Add user
            </a>
        </div>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        {{-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th> --}}
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Mobile Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Verified
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            {{-- <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> --}}
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->mobile_number }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->number_verified_at != null)
                                    <span
                                        class="inline-flex items-center rounded-md  px-2 py-1 text-xs font-medium text-green-700 dark:text-green-800 ring-1 ring-inset ring-green-800">True</span>
                                @else
                                    <span
                                        class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500">False</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->type == 1)
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-50 dark:bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:text-green-800 ring-1 ring-inset ring-green-800/20">Admin</span>
                                @else
                                    <span
                                        class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">User</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->status == 1)
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> <span
                                            class="dark:text-green-500">Active</span>
                                    </div>
                                @else
                                    <div class="flex items-center">
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> <span
                                            class="dark:text-red-500">Inactive</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ date('Y-m-d H:i', strtotime($item->created_at)) }}
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <a href="{{route('admin.users.edit', ['id'=> $item->id])}}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-3">Edit</a>
                                    {{-- <a href="{{route('admin.users.invite', ['id' =>$item->id])}}"
                                    class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Invite</a> --}}
                                <a href="#" id="{{ route('admin.users.delete', ['id' => $item->id]) }}"
                                    class="font-medium open-delete-modal text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-2 mt-4">
                @if (!empty($data))
                {{ $data->links() }}
            @endif
            </div>
        </div>
    </div>
@endsection
