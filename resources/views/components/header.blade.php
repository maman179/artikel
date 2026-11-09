{{-- HEADER --}}
<div class="min-h-screen lg:ml-64">
    {{-- NAVBAR --}}
    <header
        class="sticky top-0 z-30 border-b border-gray-200
                       bg-white/95 backdrop-blur dark:border-gray-700
                       dark:bg-gray-800/95">

        <div class="flex h-16 items-center justify-between gap-4 px-4 sm:px-6">

            <div class="flex min-w-0 items-center gap-3">

                <button id="sidebar-open" type="button"
                    class="rounded-lg p-2 text-gray-600 hover:bg-gray-100
                                   dark:text-gray-300 dark:hover:bg-gray-700
                                   lg:hidden"
                    aria-label="Buka menu">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div
                    class="hidden min-w-0 text-sm text-gray-500 sm:block
                                dark:text-gray-400">
                    Admin <span class="mx-1">/</span>
                    <span class="font-semibold text-gray-900 dark:text-white">
                        @yield('breadcrumb', 'Dashboard')
                    </span>
                </div>

                <h2 class="truncate text-base font-semibold sm:hidden">
                    @yield('breadcrumb', 'Dashboard')
                </h2>
            </div>

            <div class="flex shrink-0 items-center gap-2 sm:gap-3">

                {{-- SEARCH --}}
                <form action="{{ url('/admin/artikel') }}" method="GET" class="hidden md:block">

                    <div class="relative">
                        <input type="search" name="q" placeholder="Cari artikel..."
                            class="w-48 rounded-lg border border-gray-300
                                          bg-gray-50 py-2 pl-9 pr-3 text-sm
                                          focus:border-blue-500 focus:outline-none
                                          focus:ring-2 focus:ring-blue-200
                                          lg:w-64 dark:border-gray-600
                                          dark:bg-gray-700 dark:text-white">

                        <svg class="absolute left-3 top-2.5 h-4 w-4
                                        text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="7" stroke-width="2" />
                            <path stroke-linecap="round" stroke-width="2" d="m16 16 4 4" />
                        </svg>
                    </div>
                </form>

                {{-- THEME --}}
                <button id="theme-toggle" type="button"
                    class="rounded-lg p-2 text-gray-500
                                   hover:bg-gray-100 dark:text-gray-300
                                   dark:hover:bg-gray-700"
                    aria-label="Ubah tema">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20.9 13A9 9 0 0 1 11 3.1
                                  9 9 0 1 0 20.9 13Z" />
                    </svg>
                </button>

                {{-- PROFILE DROPDOWN --}}
                <div class="relative">
                    <button id="profile-toggle" type="button"
                        class="flex items-center gap-2 rounded-lg p-1.5
                                       hover:bg-gray-100 dark:hover:bg-gray-700">

                        <div
                            class="flex h-9 w-9 items-center justify-center
                                        rounded-full bg-blue-600 font-semibold
                                        text-white">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <small>Selamat datang, {{ auth()->user()->name ?? 'Administrator' }}</small>
                        <svg class="hidden h-4 w-4 text-gray-500 sm:block" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div id="profile-menu"
                        class="absolute right-0 mt-2 hidden w-52
                                    rounded-lg border border-gray-200 bg-white
                                    py-2 shadow-lg dark:border-gray-700
                                    dark:bg-gray-800">

                        <div
                            class="border-b border-gray-100 px-4 py-3
                                        dark:border-gray-700">
                            <p class="truncate text-sm font-semibold">
                                {{ auth()->user()->name ?? 'Administrator' }}
                            </p>
                            <p class="truncate text-xs text-gray-500">
                                {{ auth()->user()->email ?? '' }}
                            </p>
                        </div>

                        <a href="{{ url('/profile') }}"
                            class="block px-4 py-2 text-sm hover:bg-gray-100
                                      dark:hover:bg-gray-700">
                            Profil Saya
                        </a>

                        <!-- LOGOUT -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-gray-700">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H5a3 3 0 01-3-3V7a3 3 0 013-3h5a3 3 0 013 3v1" />
                                </svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
