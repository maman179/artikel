<x-layouts />
<x-sidebar />

@if (session('success'))
    <meta name="flash-success" content="{{ session('success') }}">
@endif


{{-- PAGE HEADER --}}
<div class="py-3 px-3 flex flex-col justify-between gap-4 sm:flex-row
                sm:items-center">

    <div>
        <h1 class="text-2xl font-bold tracking-tight sm:text-3xl">
            {{ $title }}
        </h1>
    </div>

    <a href="{{ url('/dashboard/posts/create') }}"
        class=" mt-3 inline-flex items-center justify-center gap-2 rounded-lg
                  bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white
                  shadow-sm transition hover:bg-blue-700
                  focus:outline-none focus:ring-4 focus:ring-blue-300">

        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m-7-7h14" />
        </svg>

        Tambah Artikel
    </a>
</div>

{{-- CONTENT GRID --}}
<div class="grid grid-cols-1 col-lg-8 gap-6 mt-3 py-3 px-3">

    {{-- ARTIKEL TERBARU --}}
    <div
        class="overflow-hidden rounded-xl border border-gray-200
                    bg-white shadow-sm xl:col-span-2
                    dark:border-gray-700 dark:bg-gray-800">

        <div
            class="flex items-center justify-between border-b
                        border-gray-200 py-3 px-3  dark:border-gray-700">

            <div>
                <h2 class="font-bold">Daftar {{ $posts->count() }} Artikel dibuat oleh {{ auth()->user()->name }}
                </h2>

            </div>

            <a href="{{ url('/posts') }}"
                class="text-sm font-medium text-blue-600 hover:underline
                          dark:text-blue-400">
                Lihat di website
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">

                <thead
                    class="bg-gray-50 text-xs uppercase
                                  text-gray-500 dark:bg-gray-700/50
                                  dark:text-gray-400">
                    <tr>
                        <th class="px-5 py-3 font-semibold">No</th>
                        <th class="px-5 py-3 font-semibold">Article Title</th>
                        <th class="px-5 py-3 font-semibold">Published</th>
                        <th class="px-5 py-3 text-center font-semibold">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">

                    @forelse (($posts ?? []) as $post)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40">

                            <td class="px-5 py-4">
                                <p class="max-w-xs truncate font-semibold">
                                    {{ $loop->iteration }}
                                </p>

                            <td class="px-5 py-4">
                                <p class="max-w-xs truncate font-semibold">
                                    {{ $post->title }}
                                </p>

                                <p class="mt-1 text-xs text-gray-500">
                                    {{ $post->category->name ?? 'Tanpa kategori' }}
                                </p>
                            </td>

                            <td
                                class="whitespace-nowrap px-5 py-4 text-xs
                                           text-gray-500 dark:text-gray-400">
                                {{ $post['created_at']->diffForHumans() }}
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- BUTTON DETAIL --}}
                                    <a href="/dashboard/posts/{{ $post->slug }}"
                                        class="inline-flex items-center gap-1 rounded-lg
                   bg-blue-100 px-3 py-2 text-xs font-semibold
                   text-blue-700 transition hover:bg-blue-200
                   dark:bg-blue-900/40 dark:text-blue-400">

                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                        </svg>

                                    </a>

                                    {{-- BUTTON EDIT --}}
                                    <a href="/dashboard/posts/{{ $post->slug }}/edit"
                                        class="inline-flex items-center gap-1 rounded-lg
                   bg-amber-100 px-3 py-2 text-xs font-semibold
                   text-amber-700 transition hover:bg-amber-200
                   dark:bg-amber-900/40 dark:text-amber-400">

                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                        </svg>

                                    </a>

                                    {{-- BUTTON DELETE --}}
                                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST"
                                        class="form-delete">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center gap-1 rounded-lg
               bg-red-100 px-3 py-2 text-xs font-semibold
               text-red-700 transition hover:bg-red-200
               dark:bg-red-900/40 dark:text-red-400">

                                            <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16" />
                                            </svg>

                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty

                        {{-- DATA CONTOH UNTUK TAMPILAN --}}
                        @foreach ([['judul' => 'Cara Membuat Blog yang Menarik', 'kategori' => 'Tutorial', 'status' => 'published', 'tanggal' => '27 Okt 2026'], ['judul' => 'Tips Menulis Artikel SEO', 'kategori' => 'SEO', 'status' => 'published', 'tanggal' => '26 Okt 2026'], ['judul' => 'Mengenal Dunia Blogging', 'kategori' => 'Blogging', 'status' => 'draft', 'tanggal' => '25 Okt 2026'], ['judul' => 'Strategi Konten Digital', 'kategori' => 'Digital', 'status' => 'published', 'tanggal' => '24 Okt 2026']] as $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40">
                                <td class="px-5 py-4">
                                    <p class="max-w-xs truncate font-semibold">
                                        {{ $item['judul'] }}
                                    </p>

                                    <p class="mt-1 text-xs text-gray-500">
                                        {{ $item['kategori'] }}
                                    </p>
                                </td>

                                <td class="px-5 py-4">
                                    @if ($item['status'] === 'published')
                                        <span
                                            class="rounded-full bg-green-100 px-2.5
                                                         py-1 text-xs font-medium
                                                         text-green-700">
                                            Terbit
                                        </span>
                                    @else
                                        <span
                                            class="rounded-full bg-amber-100 px-2.5
                                                         py-1 text-xs font-medium
                                                         text-amber-700">
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                <td
                                    class="whitespace-nowrap px-5 py-4 text-xs
                                               text-gray-500 dark:text-gray-400">
                                    {{ $item['tanggal'] }}
                                </td>
                            </tr>
                        @endforeach

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    <x-footer />
