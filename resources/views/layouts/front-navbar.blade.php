<!-- Navbar -->

<header class="bg-teal-50 dark:bg-slate-800 shadow fixed right-0 left-0 z-10" id="navbar">
    <div class="px-4 py-3 grid grid-cols-5 gap-4">
        <!-- Empty grid cell to push logo to the left -->
        <div class="col-span-1"></div>
        <div class="col-span-1"></div>
        <div class="col-span-1">
            <div class="flex sm:justify-start ml-14">
               <a href="{{route('home')}}">
                <img src="{{ asset('assests/img/logo.png') }}" alt="logo" width="100px">
               </a>
            </div>
        </div>
        <!-- Empty grid cell to push buttons to the right -->
        <div class="col-span-2">
            <!-- Logo centered in the middle cell -->

            <div class="flex sm:justify-end">

                <div class="mt-4">
                    <a href="" class="uppercase mt-3 text-teal-500 font-semibold text-sm hover:font-bold">Home</a>
                    <span class="text-teal-500 font-medium text-xl">|</span>
                    <a href="" class="uppercase mt-3 text-teal-500 font-semibold text-sm">News</a>
                    <span class="text-teal-500 font-medium text-xl">|</span>
                    <a href="" class="uppercase mt-3 text-teal-500 font-semibold text-sm">Majlis Sessions</a>
                    <span class="text-teal-500 font-medium text-xl">|</span>
                    <a href="" class="bg-teal-400 uppercase text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-teal-900 dark:text-teal-300">Bills</a>
                </div>
                <button id="theme-toggle" type="button"
                    class="text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-blue-400 rounded-lg text-sm p-2.5 mb-2 mt-2">
                    <svg id="theme-toggle-dark-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>

                    <svg id="theme-toggle-light-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="hidden w-6 h-6">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>

                </button>
                @if (auth()->user() != null)
                    <a class="inline-flex items-center text-white background-accent-light-custom hover:bg-orange-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-1 md:ml-3 me-2 mb-2.5 mt-2"
                        href="{{ route('dashboard') }}"><span class="md:hidden">Dashboard</span><span
                            class="hidden md:inline">Dashboard</span><svg class="hidden w-3 h-3 ml-2 xl:inline"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                        </svg></a>
                @else
                    <a class="inline-flex items-center text-white background-accent-light-custom hover:bg-orange-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-1 md:ml-3 me-2 mb-2.5 mt-2"
                        href="/login/"><span class="md:hidden">Login</span><span class="hidden md:inline">Sign
                            in</span><svg class="hidden w-3 h-3 ml-2 xl:inline" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                        </svg></a>
                @endif
                <div class="relative ml-3">

                    {{-- <button type="button"
                        class="relative flex rounded-full bg-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">Open user menu</span>
                        @if (auth()->user()->photo != null && auth()->user()->photo != '')
                            <img class="h-10 w-10 rounded-full" src="{{ asset('storage/profiles/' . auth()->user()->photo) }}"
                                alt="">
                        @else
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                        @endif
                    </button>
    
                    <!-- Dropdown menu -->
                    <div class="absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-md bg-white dark:bg-slate-700 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                        id="user-menu" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                        tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-600"
                            role="menuitem" tabindex="-1" id="user-menu-item-0">{{ auth()->user()->name }}</a>
                        <a href="{{ route('profile') }}"
                            class="block px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-600"
                            role="menuitem" tabindex="-1" id="user-menu-item-1">Your Profile</a>
                        <a href="#" id="open-logout-modal"
                            class="block px-4 py-2 text-sm text-gray-70 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-600"
                            role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                    </div> --}}
                </div>

            </div> <!-- Spacer for other navbar content -->
        </div>
    </div>
</header>
