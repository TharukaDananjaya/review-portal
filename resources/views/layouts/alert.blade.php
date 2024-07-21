@if (session('messages'))
    @if (session('messages')['messages']['type'] == 'success')
        <div class="fixed z-50 top-5 right-5 w-80 alert">
            <div
                class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg flex items-center justify-between shadow-md">
                <div class="flex items-start">
                    <div class="rounded-full bg-green-100 px-2 py-1 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class="w-6 h-6 text-green-500">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold">{{ session('messages')['messages']['heading'] }}</p>
                        <p class="text-sm">{{ session('messages')['messages']['description'] }}</p>
                    </div>
                </div>
                <button class="text-green-500 hover:text-green-700 focus:outline-none alert-close-btn">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    @else
        <div class="fixed z-50 top-5 right-5 w-80 alert">
            <div
                class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg flex items-center justify-between shadow-md">
                <div class="flex items-start">
                    <div class="rounded-full bg-red-100 px-2 py-1 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                            stroke="currentColor" class="w-6 h-6 text-red-500">
                            <path strokeLinecap="round" strokeLinejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-semibold">{{ session('messages')['messages']['heading'] }}</p>
                        <p class="text-sm">{{ session('messages')['messages']['description'] }}</p>
                    </div>
                </div>
                <button class="text-red-500 hover:text-red-700 focus:outline-none alert-close-btn">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <script>
        // Find all alerts and set timeout for each
        // $('.alert').each(function() {
        //     var timeout = 5000; // 10 seconds in milliseconds

        //     // Dismiss alert after timeout
        //     setTimeout(function() {
        //         $(".alert").closest('.alert').slideUp();
        //     }, timeout);
        // });
    </script>
@endif
@if ($errors->any())
    <div class="fixed z-50 top-5 right-5 w-80 alert">
        <div
            class="bg-red-50 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded-lg flex items-center justify-between shadow-md">
            <div class="flex items-start">
                <div class="rounded-full bg-red-100 px-2 py-1 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                        stroke="currentColor" class="w-6 h-6 text-red-500">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>

                </div>
                <div>
                    <p class="font-semibold">Error</p>
                    <ul class="list-outside list-disc">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm ml-8">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button class="text-red-500 hover:text-red-700 focus:outline-none alert-close-btn">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>
    <script>
        // Find all alerts and set timeout for each
        // $('.alert').each(function() {
        //     var timeout = 10000; // 10 seconds in milliseconds

        //     // Dismiss alert after timeout
        //     setTimeout(function() {
        //         $(".alert").closest('.alert').slideUp();
        //     }, timeout);
        // });
    </script>
@endif

<script>
    $(document).ready(function() {
        // Function to dismiss the alert

        $('.alert-close-btn').click(function() {
            $(".alert").closest('.alert').slideUp();
        });
    });
</script>
