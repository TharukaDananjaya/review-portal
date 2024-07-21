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
                <a href="{{ route('admin.invoice.manage') }}"
                    class="text-gray-500 hover:text-gray-700 dark:text-white dark:hover:text-gray-200">
                    <span>Invoices</span>
                </a>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 dark:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li>
                <span class="color-light-custom">Manage Invoices</span>
            </li>
        </ol>
    </nav>
    {{-- end breadcrumb --}}
    <div class="mt-5">

        <div class="flex justify-between items-center mb-5">
            <form action="{{ route('admin.invoice.multi-print') }}" class="flex" method="post" id="print-form">
                @csrf
                <div id="print-items">

                </div>
                <div id="print-button" style="display: none">
                    <button id="print" type="button"
                        class="inline-flex items-center px-5 py-1.5 bg-success-700 border border-transparent rounded-md text-sm font-semibold text-white hover:bg-success-800 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                        </svg>
                    </button>
                </div>
                <div class="flex ms-2">
                    <div class="flex items-center me-2">
                        <input type="radio" id="pdf" name="print_type" value="pdf" checked
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-400 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="pdf" class="ms-1 font-semibold dark:text-white text-gray-700">PDF</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" id="png" name="print_type" value="png"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-400 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="png" class="ms-1  font-semibold dark:text-white text-gray-700">PNG</label>
                    </div>
                </div>
            </form>
            <div class="flex-grow mx-4">
                <form action="{{ route('admin.invoice.search') }}" method="post" id="search-form">
                    @csrf
                    <div class="max-w-md mx-auto mb-4">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-400 focus:border-blue-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-400 dark:focus:border-blue-400"
                                placeholder="Search Customer Name..." name="search" required />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>

                        </div>
                    </div>
                </form>
            </div>
            <div>
                <a href="{{ route('admin.invoice.add') }}"
                    class="inline-flex items-center px-5 py-1.5 background-accent-light-custom border border-transparent rounded-md text-sm font-semibold text-white hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                        </path>
                    </svg>
                    Create Invoice
                </a>
            </div>
        </div>

        {{-- @if (Request::routeIs('admin.invoice.search'))
            <a href="{{ route('admin.invoice.manage') }}"
                class="inline-block text-white end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                clear
            </a>
        @endif --}}
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="select-all" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-400 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="select-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product Condition
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Amount
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
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input type="checkbox"
                                        class="select-check w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-400 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        value="{{ $item['id'] }}">
                                    <label class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->customer_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->product_condition }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->total_amount }}
                            </td>
                            <td class="px-6 py-4">
                                {{ date('Y-m-d H:i', strtotime($item->created_at)) }}
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <a href="{{ route('admin.invoice.edit', ['id' => $item->id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-400 hover:underline mr-3">Edit</a>
                                {{-- <a href="{{route('admin.invoice.invite', ['id' =>$item->id])}}"
                                    class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Invite</a> --}}
                                <a href="#" id="{{ route('admin.invoice.delete', ['id' => $item->id]) }}"
                                    class="font-medium open-delete-modal text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                <a href="{{ route('admin.invoice.print', ['id' => $item->id]) }}" target="_blank" id=""
                                    class="font-medium text-green-600 dark:text-green-500 hover:underline ms-3">Print</a>
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
@section('scripts')
    <script>
        $(document).ready(function() {
            // Select All checkbox
            $('#select-all').change(function() {
                $('.select-check').prop('checked', $(this).prop('checked'));
                if ($(this).prop('checked')) {
                    $('#print-button').show();
                } else {
                    $('#print-button').hide();
                }
            });

            // Individual checkbox
            $('.select-check').change(function() {
                if ($('.select-check:checked').length > 0) {
                    $('#print-button').show();
                } else {
                    $('#print-button').hide();
                }
            });

            $("#print").click(function() {
                addCheckBoxesToPrintForm()
                $("#print-form").submit()
            })

            function addCheckBoxesToPrintForm() {
                var selectedBoxes = [];
                $("#print-items").html('')
                $(".select-check").each(function() {

                    if (this.checked) {
                        $("#print-items").append(
                            `<input type="hidden" name="slected_rows[]" value="` + this.value + `" > `
                        )
                    }
                })

            }
        });
    </script>
@endsection
