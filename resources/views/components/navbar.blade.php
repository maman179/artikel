<!-- NAVBAR -->
<nav class="sticky top-0 z-50 border-b border-green-100 bg-white/95 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

        {{-- LOGO / BRAND --}}
        <a href="{{ route('homepage') }}" class="flex items-center gap-2 text-xl font-bold text-green-800">
            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-100 text-2xl">
                🌳
            </span>
            <span>Artikel.com</span>
        </a>

        {{-- MENU DESKTOP --}}
        <div class="hidden items-center gap-8 md:flex">

            <nav class="flex items-center gap-2">
                <x-nav-link href="/dashboard" :active="request()->routeIs('/dashboard')">Dashboard</x-nav-link>
                </a>

                <x-nav-link href="{{ route('posts') }}" :active="request()->routeIs('posts')">Blog</x-nav-link>
                </a>

                <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">Contact</x-nav-link>
                </a>

                <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">About</x-nav-link>
                </a>

            </nav>
        </div>
        @auth
            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="rounded-xl bg-red-700 px-5 py-2.5 font-semibold text-white shadow-sm transition hover:bg-red-800 hover:shadow-md">

                    <span>Logout</span>
                </button>
            </form>
        @else
            {{-- LOGIN --}}
            <a href="/login"
                class="rounded-xl bg-green-700 px-5 py-2.5 font-semibold text-white shadow-sm transition hover:bg-green-800 hover:shadow-md">
                Login
            </a>
        </div>
    @endauth
</nav>

<!-- Akhir Navbar -->
