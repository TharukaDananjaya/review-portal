@extends('layouts.app')
@section('title')
    Edit Invoice
@endsection
@section('dashboard_title')
    Edit Invoice
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
                <span class="color-light-custom">Edit Invoice</span>
            </li>
        </ol>
    </nav>
    {{-- end breadcrumb --}}

    <div class="mt-5">
        <div class="">
            <div class="shadow-md p-3 rounded-md">
                <form method="POST" action="{{ route('admin.invoice.update') }}" class="mt-8">
                    @csrf
                    <input type="hidden" name="id" name="id" value="{{ $data['id'] }}">
                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <div class="mb-4">
                                <label for="customer_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Customer Name <span
                                        class="text-red-500"><strong>*</strong></span></label>
                                <input type="text" id="customer_name" name="customer_name"
                                    value="{{ $data['customer_name'] }}" required autofocus
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('customer_name') border-red-500 @enderror">
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label for="date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date <span
                                        class="text-red-500"><strong>*</strong></span></label>
                                <input type="date" id="date" name="date" value="{{ $data['date'] }}" required
                                    autofocus
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('date') border-red-500 @enderror">
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label for="product_condition"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product condition
                                    <span class="text-red-500"><strong>*</strong></span></label>
                                <select id="product_condition" name="product_condition"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('product_condition') border-red-500 @enderror">
                                    <option selected>Choose a status</option>
                                    <option value="NEUF" @if ($data['product_condition'] == 'NEUF') selected @endif>NEUF</option>
                                    <option value="VRAC" @if ($data['product_condition'] == 'VRAC') selected @endif>VRAC</option>
                                    <option value="DESCELLER" @if ($data['product_condition'] == 'DESCELLER') selected @endif>DESCELLER
                                    </option>
                                    <option value="VENANT" @if ($data['product_condition'] == 'VENANT') selected @endif>VENANT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="flex justify-end mt-2">
                        <div class="mb-4">
                            <label for="currency"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select currency <span
                                    class="text-red-500"><strong>*</strong></span></label>
                            <select id="currency" name="currency"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('currency') border-red-500 @enderror">
                                <option value="USD" selected>United States Dollar (USD)</option>
                                <option value="EUR">Euro (EUR)</option>
                                <option value="GBP">British Pound Sterling (GBP)</option>
                                <option value="JPY">Japanese Yen (JPY)</option>
                                <option value="AUD">Australian Dollar (AUD)</option>
                                <option value="CAD">Canadian Dollar (CAD)</option>
                                <option value="CHF">Swiss Franc (CHF)</option>
                                <option value="CNY">Chinese Yuan (CNY)</option>
                                <option value="SEK">Swedish Krona (SEK)</option>
                                <option value="NZD">New Zealand Dollar (NZD)</option>
                                <option value="MXN">Mexican Peso (MXN)</option>
                                <option value="SGD">Singapore Dollar (SGD)</option>
                                <option value="HKD">Hong Kong Dollar (HKD)</option>
                                <option value="NOK">Norwegian Krone (NOK)</option>
                                <option value="KRW">South Korean Won (KRW)</option>
                                <option value="TRY">Turkish Lira (TRY)</option>
                                <option value="RUB">Russian Ruble (RUB)</option>
                                <option value="INR">Indian Rupee (INR)</option>
                                <option value="BRL">Brazilian Real (BRL)</option>
                                <option value="ZAR">South African Rand (ZAR)</option>
                                <option value="XOF">West African CFA Franc (XOF)</option>
                            </select>
                        </div>
                    </div>
                    @foreach ($data['products'] as $item)
                        <div class="grid grid-cols-5 gap-4 mt-2 line">
                            <div class="col-span-2">
                                <div class="mb-4">
                                    <label for="designation"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Designation
                                        <span class="text-red-500"><strong>*</strong></span></label>
                                    <input type="text" id="designation" name="designation[]"
                                        value="{{ $item['designation'] }}" autofocus
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror">
                                </div>
                                <div class="mb-4">
                                    <label for="notes"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes </label>
                                    <textarea id="notes" name="notes[]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('notes') border-red-500 @enderror">{{ $item['notes'] }}</textarea>
                                </div>
                            </div>
                            <div>
                                <div class="mb-4">
                                    <label for="qty"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qty <span
                                            class="text-red-500"><strong>*</strong></span></label>
                                    <input type="number" id="qty" name="qty[]" value="{{ $item['qty'] }}"
                                        autofocus
                                        class="qty bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror">
                                </div>
                            </div>
                            <div>
                                <div class="mb-4">
                                    <label for="puht"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pu Ht <span
                                            class="text-red-500"><strong>*</strong></span></label>
                                    <input type="number" step="0.01" min="0.01" id="puht" name="puht[]"
                                        value="{{ number_format($item['puht'], 3) }}" autofocus
                                        class="puht bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror">
                                </div>
                            </div>
                            <div>
                                <div class="mb-4">
                                    <label for="total_ht"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Ht <span
                                            class="text-red-500"><strong>*</strong></span></label>
                                    <input type="number" step="0.01" min="0.01" id="total_ht"
                                        name="total_ht[]" value="{{ number_format($item['total_ht'], 3) }}" autofocus
                                        class="total_ht bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- Optional Rows --}}
                    <div class="row-container">

                    </div>
                    <div class="text-end mt-2">
                        <button type="button"
                            class="bg-blue-400 hover:bg-blue-500 text-xs text-white py-1 px-5 rounded-lg focus:outline-none inline-flex items-center"
                            id="add-row">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>

                            Add Row</button>
                    </div>
                    <div class="grid grid-cols-5 gap-4 mt-2 mb-4">
                        <div class="col-start-4 text-center">
                            <h1 for="total_ht" class="text-lg text-gray-900 dark:text-white">Total Amount</h1>
                        </div>
                        <div class="text-center">
                            <h1 id="grand_total" class="text-2xl text-gray-900 dark:text-white">
                                {{ number_format($data['total_amount'], 3) }}</h1>
                        </div>
                    </div>
                    <div class="flex items-end justify-end">
                        <button type="submit"
                            class="background-accent-light-custom hover:bg-orange-500 text-sm text-white py-2 px-4 rounded-lg focus:outline-none">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // Attach change event listener to quantity and price inputs
            $(document).on('input', '.line .qty, .line .puht', function() {
                var $line = $(this).closest('.line');
                var qty = parseFloat($line.find('.qty').val()) || 0; // Get quantity value
                var puht = parseFloat($line.find('.puht').val()) || 0; // Get price value
                var total = qty * puht; // Calculate total

                // Update total_hut field with the calculated total
                $line.find('.total_ht').val(total.toFixed(3));

                // Calculate and update grand total
                var grandTotal = 0;
                $('.total_ht').each(function() {
                    grandTotal += parseFloat($(this).val()) || 0;
                });
                $('#grand_total').html(grandTotal.toFixed(3));
            });

            function addRow() {
                // Clone the row template
                var element = `<div class="grid grid-cols-5 gap-4 mt-2 line row-template">
                        <div class="col-span-2">
                            <div class="mb-4">
                                <label for="designation"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Designation
                                    (optional)</label>
                                <input type="text" id="designation" name="designation[]" value=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror">
                            </div>
                            <div class="mb-4">
                                    <label for="notes"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes </label>
                                    <textarea id="notes" name="notes[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('notes') border-red-500 @enderror"></textarea>
                                </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label for="qty"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qty
                                    (optional)</label>
                                <input type="number" id="qty" name="qty[]" value=""
                                    class="qty bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror">
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label for="puht"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pu Ht
                                    (optional)</label>
                                <input type="number" step="0.01" min="0.01" id="puht" name="puht[]"
                                    value=""
                                    class="puht bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror">
                            </div>
                        </div>
                        <div>
                            <div class="mb-4">
                                <label for="total_ht"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Ht
                                    (optional)</label>
                                <input type="number" step="0.01" min="0.01" id="total_ht" name="total_ht[]"
                                    value="" readonly
                                    class="total_ht bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @enderror">
                            </div>

                        </div>
                        <div>
                            <button type="button"
                                class="remove-row bg-red-400 hover:bg-red-500 text-xs text-white py-1 px-5 rounded-lg focus:outline-none inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>

                                Remove</button>
                        </div>
                    </div>`
                // Append the new row to the container
                $(".row-container").append(element);
            }

            // Function to remove a row
            $(document).on("click", ".remove-row", function() {
                $(this).closest(".line").remove();
            });

            // Event handler for the add button click
            $("#add-row").click(function() {
                addRow();
            });
        });
    </script>
@endsection
