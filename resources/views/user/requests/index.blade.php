@extends('layouts.app')
@section('title')
    Requets
@endsection
@section('dashboard_title')
    Requets
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
                <span class="color-light-custom">Request</span>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 dark:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li>
                <span class="color-light-custom">Manage Request</span>
            </li>
        </ol>
    </nav>
    {{-- end breadcrumb --}}
    <div class="mt-5">

        <div class="text-end mb-5">
            <button id="make-new-request"
                class="inline-flex items-center px-5 py-1.5 background-accent-light-custom border border-transparent rounded-md text-sm font-semibold text-white hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Make New Request
            </button>
        </div>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        {{-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-400 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th> --}}
                        <th scope="col" class="px-6 py-3">
                            #ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Request Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Document
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Note
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            Action
                        </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            {{-- <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-400 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> --}}
                            <td class="px-6 py-4">{{ $item->id }}</td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($item->request_type == 'call_back')
                                    <span
                                        class="inline-flex items-center rounded-md bg-indigo-50 dark:bg-indigo-100 px-2 py-1 text-xs font-medium text-indigo-700 dark:text-indigo-800 ring-1 ring-inset ring-indigo-800/20">CALL
                                        BACK</span>
                                @elseif($item->request_type == 'meet')
                                    <span
                                        class="inline-flex items-center rounded-md bg-violet-50 dark:bg-violet-100 px-2 py-1 text-xs font-medium text-violet-700 dark:text-violet-800 ring-1 ring-inset ring-violet-800/20">MEET</span>
                                @elseif($item->request_type == 'other')
                                    <span
                                        class="inline-flex items-center rounded-md bg-fuchsia-50 dark:bg-fuchsia-100 px-2 py-1 text-xs font-medium text-fuchsia-700 dark:text-fuchsia-800 ring-1 ring-inset ring-fuchsia-800/20">OTHER</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if ($item->document != null)
                                    <a href="{{ route('user.requests.download', ['id' => $item->id]) }}"
                                        class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-1 text-center inline-flex items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 me-2 mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 me-2 -ms-1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>

                                        download file</a>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->note }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->status == 'pending')
                                    <span
                                        class="inline-flex items-center rounded-md  px-2 py-1 text-xs font-medium text-yellow-700 dark:text-yellow-800 ring-1 ring-inset ring-yellow-800">PENDING</span>
                                @elseif($item->status == 'attended')
                                    <span
                                        class="inline-flex items-center rounded-md  px-2 py-1 text-xs font-medium text-blue-700 dark:text-blue-800 ring-1 ring-inset ring-blue-800">ATTENDED</span>
                                @elseif($item->status == 'completed')
                                    <span
                                        class="inline-flex items-center rounded-md  px-2 py-1 text-xs font-medium text-green-700 dark:text-green-800 ring-1 ring-inset ring-green-800">COMPLETED</span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                {{ date('Y-m-d H:i', strtotime($item->created_at)) }}
                            </td>
                            {{-- <td class="flex items-center px-6 py-4">
                                <a href="{{ route('admin.users.edit', ['id' => $item->id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-400 hover:underline mr-3">Edit</a>
                                <a href="{{route('admin.users.invite', ['id' =>$item->id])}}"
                                    class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Invite</a>
                                <a href="#" id="{{ route('admin.users.delete', ['id' => $item->id]) }}"
                                    class="font-medium open-delete-modal text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Modal backdrop -->
            <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 hidden"
                id="make-request-modal">
                <!-- Modal container -->
                <div class="bg-white dark:bg-slate-700 rounded-lg p-8 max-w-md w-full ">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold dark:text-white text-gray-600">Make Request</h2>

                        <!-- Close button -->
                        <button class="text-gray-600 hover:text-gray-800 dark:text-white focus:outline-none"
                            id="modal-close-btn">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal content -->
                    <div>
                        <form action="{{ route('user.requests.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="request_type"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Request Type <span
                                        class="text-red-500"><strong>*</strong></span></label>
                                <select id="request_type" name="request_type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 @error('request_type') border-red-500 @enderror">
                                    <option selected>Choose a option</option>
                                    <option value="call_back">Request to Call Back</option>
                                    <option value="meet">Request to Meet</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-4" style="display: none" id="document">
                                <label for="file"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Document <span
                                        class="text-sm"><strong>(optional)</strong></span></label>
                                <input type="file" id="file" name="file" value="{{ old('file') }}"
                                    placeholder="John"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 @error('file') border-red-500 @enderror">
                            </div>
                            <div class="mb-4">
                                <label for="note"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note
                                    <span class="text-sm"><strong>(optional)</strong></span></label>
                                <textarea rows="5" id="note" name="note" value="{{ old('note') }}" placeholder="Note"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-400 focus:border-blue-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400 @error('note') border-red-500 @enderror"> </textarea>
                            </div>
                            <div class="flex items-end justify-end">
                                <button type="submit"
                                    class="background-accent-light-custom hover:bg-blue-400 text-sm text-white py-2 px-4 rounded-lg focus:outline-none">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="p-2 mt-4">
                @if (!empty($data))
                    {{ $data->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Get modal elements
        const modalBackdrop = document.getElementById('make-request-modal');
        const modalCloseBtn = document.getElementById('modal-close-btn');

        // Function to show modal
        function showModal() {
            modalBackdrop.classList.remove('hidden');
        }

        // Function to hide modal
        function hideModal() {
            modalBackdrop.classList.add('hidden');
        }

        // Event listener for close button
        modalCloseBtn.addEventListener('click', hideModal);

        // Event listener for backdrop click to close modal
        modalBackdrop.addEventListener('click', function(event) {
            if (event.target === modalBackdrop) {
                hideModal();
            }
        });

        $("#make-new-request").click(function() {
            showModal();
        })
        $("#request_type").on("change", function() {
            let value = this.value;
            if (value == 'other') {
                $("#document").show();
            } else {
                $("#document").hide();
            }
        })
    </script>
@endsection
