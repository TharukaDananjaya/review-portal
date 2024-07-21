<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-slate-800">
        <ul class="border-b border-gray-200 dark:border-gray-700">
            <li class="flex items-center justify-center">
                <img src="{{ asset('assests/img/logo.png') }}" alt="" class="w-20 mb-2">
                {{-- <span class="text-sm font-bold text-gray-900 dark:text-white">{{ env('APP_NAME') }}</span> --}}
                <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                    aria-controls="default-sidebar" type="button"
                    class="sm:hidden inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-slate-700 dark:focus:ring-gray-600"
                    id="sidebar-toggle-2">
                    <span class="sr-only">Open sidebar</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>

                </button>
            </li>
        </ul>
        <ul class="space-y-2 font-medium mt-3">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white   group {{ Request::routeIs('dashboard') ? 'active hover:bg-orange-500' : 'hover:bg-gray-100 dark:hover:bg-slate-700' }}">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5  transition duration-75 group-hover:text-gray-900  {{ Request::routeIs('dashboard') ? 'dark:group-hover:text-white dark:text-gray-100 text-gray-100' : 'dark:group-hover:text-white dark:text-gray-400 text-gray-500' }}">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>

                    <span class="ms-3"> Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->type == 1)
                <li>
                    <button type="button"
                        class="sidebar-menu flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-nid" data-collapse-toggle="dropdown-nid">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                          </svg>
                          

                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Invoice</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-nid"
                        class="{{ Request::routeIs('admin.invoice.manage') || Request::routeIs('admin.invoice.add') ? '' : 'hidden' }} py-2 space-y-2 transition-transform duration-300 ease-in-out collapsible">
                        <li>
                            <a href="{{ route('admin.invoice.add') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group  dark:text-white  {{ Request::routeIs('admin.invoice.add') ? 'active hover:bg-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="{{ Request::routeIs('admin.invoice.add') ? 'dark:group-hover:text-white dark:text-gray-100 text-gray-100' : 'dark:group-hover:text-white dark:text-gray-400 text-gray-500' }} w-5 h-5  transition duration-75 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>

                                Create Invoice
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.invoice.manage') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group  dark:text-white  {{ Request::routeIs('admin.invoice.manage') ? 'active hover:bg-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="{{ Request::routeIs('admin.invoice.manage') ? 'dark:group-hover:text-white dark:text-gray-100 text-gray-100' : 'dark:group-hover:text-white dark:text-gray-400 text-gray-500' }} w-5 h-5  transition duration-75 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                                </svg>
                                Manage Invoices</a>
                        </li>
                        <li>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="sidebar-menu flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-users" data-collapse-toggle="dropdown-users">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>

                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Users</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-users"
                        class="{{ Request::routeIs('admin.users.manage') || Request::routeIs('admin.users.add') ? '' : 'hidden' }} py-2 space-y-2 transition-transform duration-300 ease-in-out collapsible">
                        <li>
                            <a href="{{ route('admin.users.add') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group  dark:text-white  {{ Request::routeIs('admin.users.add') ? 'active hover:bg-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="{{ Request::routeIs('admin.users.add') ? 'dark:group-hover:text-white dark:text-gray-100 text-gray-100' : 'dark:group-hover:text-white dark:text-gray-400 text-gray-500' }} w-5 h-5  transition duration-75 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>

                                Add User
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.manage') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group  dark:text-white  {{ Request::routeIs('admin.users.manage') ? 'active hover:bg-orange-500' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="{{ Request::routeIs('admin.users.manage') ? 'dark:group-hover:text-white dark:text-gray-100 text-gray-100' : 'dark:group-hover:text-white dark:text-gray-400 text-gray-500' }} w-5 h-5  transition duration-75 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                                </svg>
                                Manage Users</a>
                        </li>
                        <li>
                        </li>
                    </ul>
                </li>
            @endif

            <li>
                <a href="{{ route('profile') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white   group {{ Request::routeIs('profile') ? 'active hover:bg-orange-500' : 'hover:bg-gray-100 dark:hover:bg-slate-700' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5  transition duration-75 group-hover:text-gray-900  {{ Request::routeIs('profile') ? 'dark:group-hover:text-white dark:text-gray-100 text-gray-100' : 'dark:group-hover:text-white dark:text-gray-400 text-gray-500' }}">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>


                    <span class="ms-3"> Profile</span>
                </a>
            </li>

        </ul>
    </div>
</aside>
