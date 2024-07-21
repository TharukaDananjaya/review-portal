<!-- Navbar -->
<header class="bg-gray-50 dark:bg-slate-800 shadow fixed right-0 left-0 sm:ml-64" id="navbar">
    <div class="px-4 py-3 flex justify-between items-center">
        <!-- Navbar content -->
        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
            type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-slate-700 dark:focus:ring-gray-600"
            id="sidebar-toggle">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>
        <h1 class="text-gray-900 dark:text-white text-lg font-semibold flex"> @yield('dashboard_title')</h1>
        <div class="flex">
            <button id="theme-toggle" type="button"
                class="text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-slate-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-blue-400 rounded-lg text-sm p-2.5 ">
                <svg id="theme-toggle-dark-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="hidden w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                </svg>

                <svg id="theme-toggle-light-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    strokeWidth={1.5} stroke="currentColor" class="hidden w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                </svg>


            </button>
            <div class="relative ml-3">

                <button type="button"
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
                    <a href="@if (auth()->user()->type == 1) {{ route('admin.profile') }} @else {{ route('user.profile') }} @endif"
                        class="block px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-600"
                        role="menuitem" tabindex="-1" id="user-menu-item-1">Your Profile</a>
                    <a href="#" id="open-logout-modal"
                        class="block px-4 py-2 text-sm text-gray-70 dark:text-white hover:bg-slate-100 dark:hover:bg-gray-600"
                        role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                </div>
            </div>

        </div> <!-- Spacer for other navbar content -->
    </div>
</header>
<div class="fixed z-50 inset-0 overflow-y-auto bg-gray-400 bg-opacity-50 hidden" id="logout-modal">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white dark:bg-slate-700 rounded-lg shadow-lg relative w-full max-w-md p-6">
            <!-- Modal Content -->
            <div class="text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="text-lg font-semibold mb-2 dark:text-white">Confirm Sign Out</h3>
                <p class="text-sm text-gray-700 dark:text-white mb-4">Are you sure you want to sign out?</p>
                <!-- Buttons -->
                <div class="flex justify-center">
                    <a href="{{ route('singout') }}"
                        class="bg-blue-400 text-white text-sm hover:bg-blue-600 px-5 py-1.5 rounded-md mr-2"
                        id="confirm-btn">Confirm</a>
                    <button class="bg-gray-300 text-gray-700 text-sm hover:bg-gray-400 px-5 py-1.5 rounded-md ml-2"
                        id="cancel-btn">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="p-4 sm:ml-64 mt-20">
                    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                       <div class="grid grid-cols-3 gap-4 mb-4">
                          <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-slate-800">
                             <p class="text-2xl text-gray-400 dark:text-gray-500">
                                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                             </p>
                          </div>
                          <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-slate-800">
                             <p class="text-2xl text-gray-400 dark:text-gray-500">
                                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                             </p>
                          </div>
                          <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-slate-800">
                             <p class="text-2xl text-gray-400 dark:text-gray-500">
                                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                             </p>
                          </div>
                       </div>
                       <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-slate-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                       <div class="grid grid-cols-2 gap-4 mb-4">
                          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-slate-800">
                             <p class="text-2xl text-gray-400 dark:text-gray-500">
                                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                             </p>
                          </div>
                          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-slate-800">
                             <p class="text-2xl text-gray-400 dark:text-gray-500">
                                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                             </p>
                          </div>
                          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-slate-800">
                             <p class="text-2xl text-gray-400 dark:text-gray-500">
                                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                             </p>
                          </div>
                          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-slate-800">
                             <p class="text-2xl text-gray-400 dark:text-gray-500">
                                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                             </p>
                          </div>
                       </div>
                       <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-slate-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                       <div class="grid grid-cols-2 gap-4">
                          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-slate-800">
                             <p class="text-2xl text-gray-400 dark:text-gray-500">
                                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                             </p>
                          </div>
                          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-slate-800">
                             <p class="text-2xl text-gray-400 dark:text-gray-500">
                                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                             </p>
                          </div>
                          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-slate-800">
                             <p class="text-2xl text-gray-400 dark:text-gray-500">
                                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                             </p>
                          </div>
                          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-slate-800">
                             <p class="text-2xl text-gray-400 dark:text-gray-500">
                                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                             </p>
                          </div>
                       </div>
                    </div>
                  </div>
--}}
