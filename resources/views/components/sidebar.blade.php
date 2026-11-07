{{-- <body class="min-h-screen bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-white"> --}}

{{-- MOBILE OVERLAY --}}
<div id="sidebar-overlay" class="fixed inset-0 z-40 hidden bg-gray-950/50 lg:hidden" aria-hidden="true"></div>

{{-- SIDEBAR --}}
<aside id="admin-sidebar"
    class="fixed inset-y-0 left-0 z-50 flex w-64 -translate-x-full
                  flex-col border-r border-gray-200 bg-white transition-transform
                  duration-300 ease-in-out dark:border-gray-700 dark:bg-gray-800
                  lg:translate-x-0">

    {{-- LOGO --}}
    <div
        class="flex h-16 shrink-0 items-center justify-between border-b
                    border-gray-200 px-5 dark:border-gray-700">

        <a href="{{ url('/dashboard') }}" class="flex items-center gap-3">

            <div
                class="flex h-10 w-10 items-center justify-center
                            rounded-xl bg-blue-600 text-xl font-bold text-white">
                B
            </div>

            <div>
                <h1 class="text-lg font-bold tracking-tight">
                    Article.com
                </h1>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    Author Page
                </p>
            </div>
        </a>

        <button id="sidebar-close" type="button"
            class="rounded-lg p-2 text-gray-500 hover:bg-gray-100
                           lg:hidden dark:hover:bg-gray-700"
            aria-label="Tutup menu">
            ✕
        </button>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 space-y-1 overflow-y-auto px-3 py-5">

        <p class="mb-3 px-3 text-xs font-semibold uppercase
                      tracking-wider text-gray-400">
            Menu Utama
        </p>

        <a href="{{ url('/dashboard') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2.5
                      text-sm font-medium
                      {{ request()->is('admin/dashboard')
                          ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400'
                          : 'text-gray-600 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' }}">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M3 10.5 12 3l9 7.5M5 9v11h14V9M9 20v-6h6v6" />
            </svg>
            Dashboard
        </a>

        <p class="mb-2 mt-7 px-3 text-xs font-semibold uppercase
                      tracking-wider text-gray-400">
            Konten
        </p>

        <a href="{{ url('/dashboard/posts') }}"
            class="{{ Request::is('dashboard') ? 'active' : '' }} flex items-center gap-3 rounded-lg px-3 py-2.5
                      text-sm font-medium text-gray-600 hover:bg-gray-100
                      dark:text-gray-300 dark:hover:bg-gray-700">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M8 4h8l4 4v12H4V4h4Zm7 0v5h5M8 13h8M8 17h8" />
            </svg>
            Artikel
        </a>

        <a href="{{ url('/admin/kategori') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2.5
                      text-sm font-medium text-gray-600 hover:bg-gray-100
                      dark:text-gray-300 dark:hover:bg-gray-700">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M4 5h16v4H4zM4 11h7v8H4zM14 11h6v8h-6z" />
            </svg>
            Kategori
        </a>

        <a href="{{ url('/admin/tag') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2.5
                      text-sm font-medium text-gray-600 hover:bg-gray-100
                      dark:text-gray-300 dark:hover:bg-gray-700">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                    d="M20 13 13 20l-9-9V4h7l9 9ZM8 8h.01" />
            </svg>
            Tag
        </a>

        <a href="{{ url('/admin/komentar') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2.5
                      text-sm font-medium text-gray-600 hover:bg-gray-100
                      dark:text-gray-300 dark:hover:bg-gray-700">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 11.5a8.4 8.4 0 0 1-.9 3.8
                          8.5 8.5 0 0 1-7.6 4.7
                          8.4 8.4 0 0 1-3.8-.9L3 21l1.9-5.7
                          a8.4 8.4 0 0 1-.9-3.8
                          8.5 8.5 0 0 1 4.7-7.6
                          8.4 8.4 0 0 1 3.8-.9h.5
                          a8.5 8.5 0 0 1 8 8v.5Z" />
            </svg>
            Komentar
            <span
                class="ml-auto rounded-full bg-red-100 px-2 py-0.5
                             text-xs font-semibold text-red-600">
                5
            </span>
        </a>

        <a href="{{ url('/admin/media') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2.5
                      text-sm font-medium text-gray-600 hover:bg-gray-100
                      dark:text-gray-300 dark:hover:bg-gray-700">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <rect x="3" y="3" width="18" height="18" rx="2" stroke-width="1.8" />
                <circle cx="8.5" cy="8.5" r="1.5" stroke-width="1.8" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m21 15-5-5L5 21" />
            </svg>
            Media
        </a>

        <p class="mb-2 mt-7 px-3 text-xs font-semibold uppercase
                      tracking-wider text-gray-400">
            Pengaturan
        </p>

        <a href="{{ url('/admin/pengguna') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2.5
                      text-sm font-medium text-gray-600 hover:bg-gray-100
                      dark:text-gray-300 dark:hover:bg-gray-700">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2
                          M10 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8
                          M20 8v6m3-3h-6" />
            </svg>
            Pengguna
        </a>

        <a href="{{ url('/admin/pengaturan') }}"
            class="flex items-center gap-3 rounded-lg px-3 py-2.5
                      text-sm font-medium text-gray-600 hover:bg-gray-100
                      dark:text-gray-300 dark:hover:bg-gray-700">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="3" stroke-width="1.8" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m19.4 15 .1.1 1.4 1.1-1.5 2.6-1.7-.6
                          a8 8 0 0 1-1.7 1l-.3 1.8h-3l-.3-1.8
                          a8 8 0 0 1-1.7-1l-1.7.6-1.5-2.6
                          1.4-1.1a8 8 0 0 1 0-2l-1.4-1.1
                          1.5-2.6 1.7.6a8 8 0 0 1 1.7-1l.3-1.8h3l.3 1.8
                          a8 8 0 0 1 1.7 1l1.7-.6 1.5 2.6-1.4 1.1
                          a8 8 0 0 1 0 2Z" />
            </svg>
            Pengaturan
        </a>

    </nav>

    {{-- SIDEBAR FOOTER --}}
    <div class="shrink-0 border-t border-gray-200 p-4 dark:border-gray-700">
        <div class="flex items-center gap-3">
            <div
                class="flex h-10 w-10 items-center justify-center
                            rounded-full bg-blue-100 font-bold text-blue-700
                            dark:bg-blue-900 dark:text-blue-300">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>

            <div class="min-w-0 flex-1">
                <p class="truncate text-sm font-semibold">
                    {{ auth()->user()->name ?? 'Administrator' }}
                </p>
                <p class="truncate text-xs text-gray-500 dark:text-gray-400">
                    Administrator
                </p>
            </div>
        </div>
    </div>
</aside>
{{-- AKHIR SIDEBAR --}}

<x-header />
{{-- SIDEBAR & DROPDOWN SCRIPT --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const openBtn = document.getElementById('sidebar-open');
        const closeBtn = document.getElementById('sidebar-close');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        openBtn?.addEventListener('click', openSidebar);
        closeBtn?.addEventListener('click', closeSidebar);
        overlay?.addEventListener('click', closeSidebar);

        document.addEventListener('keydown', event => {
            if (event.key === 'Escape') {
                closeSidebar();
                document.getElementById('profile-menu')
                    ?.classList.add('hidden');
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
                sidebar.classList.remove('-translate-x-full');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        });

        // PROFILE DROPDOWN
        const profileToggle = document.getElementById('profile-toggle');
        const profileMenu = document.getElementById('profile-menu');

        profileToggle?.addEventListener('click', event => {
            event.stopPropagation();
            profileMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', event => {
            if (
                !profileMenu?.contains(event.target) &&
                !profileToggle?.contains(event.target)
            ) {
                profileMenu?.classList.add('hidden');
            }
        });

        // DARK MODE
        document.getElementById('theme-toggle')
            ?.addEventListener('click', () => {
                const isDark = document.documentElement.classList.toggle('dark');

                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            });
    });
</script>
