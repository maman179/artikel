<x-layouts />
<x-sidebar />

<div class="min-h-screen bg-gray-50 px-4 py-8 dark:bg-gray-900 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-4xl">

        {{-- BREADCRUMB --}}
        <div class="mb-6 flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">

            <a href="/dashboard/posts" class="hover:text-blue-600">
                Articles
            </a>

            <span>/</span>

            <span class="font-medium text-gray-800 dark:text-white">
                Create Article
            </span>

        </div>

        {{-- PAGE HEADER --}}
        <div class="mb-8">

            <div class="flex items-center gap-3">

                <div class="rounded-xl bg-blue-100 p-3 text-blue-600 dark:bg-blue-900/40 dark:text-blue-400">

                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>

                </div>

                <div>

                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white sm:text-3xl">
                        Create Article
                    </h1>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Buat dan publikasikan artikel baru di blog kamu.
                    </p>

                </div>

            </div>

        </div>

        {{-- FORM CARD --}}
        <div
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

            {{-- CARD HEADER --}}
            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">

                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Informasi Artikel
                </h2>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Lengkapi informasi berikut untuk membuat artikel baru.
                </p>

            </div>

            <form action="/dashboard/posts" method="POST" class="p-6" enctype="multipart/form-data">

                @csrf

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

                    {{-- TITLE --}}
                    <div class="sm:col-span-2">

                        <label for="title" class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300">

                            Judul Artikel <span class="text-red-500">*</span>

                        </label>
                        <input type="hidden" name="author_id" value={{ auth()->user()->id }}>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            placeholder="Masukkan judul artikel..." required
                            class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">

                        @error('title')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- SLUG --}}
                    <div class="sm:col-span-2">
                        <label for="slug" class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Slug Artikel
                        </label>

                        <div class="flex overflow-hidden rounded-lg border border-gray-300 dark:border-gray-600">
                            <span
                                class="flex items-center bg-gray-100 px-3 text-sm text-gray-500 dark:bg-gray-700 dark:text-gray-400">
                                /
                            </span>

                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                placeholder="slug-artikel" readonly
                                class="w-full bg-gray-50 px-4 py-3 text-sm text-gray-600 outline-none dark:bg-gray-700 dark:text-gray-300">

                        </div>

                        @error('slug')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            Slug dibuat otomatis berdasarkan judul artikel.
                        </p>

                    </div>

                    {{-- CATEGORY --}}
                    <div class="sm:col-span-2">

                        <label for="category_id"
                            class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300">

                            Kategori Artikel <span class="text-red-500">*</span>

                        </label>

                        <select name="category_id" id="category_id" required
                            class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                            <option value="">Pilih Kategori</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>
                            @endforeach

                        </select>

                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- File Upload --}}
                    <div class="sm:col-span-2">
                        <label for="image" class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Upload File
                        </label>
                        <img class="img-preview mb-2 max-h-60 rounded-lg object-cover" style="display: none;">
                        <input type="file" name="image" id="image"
                            class=" bg-white-50 px-4 py-3 text-sm text-gray-600 outline-none dark:bg-gray-700 dark:text-gray-300"
                            onchange="previewImage()">

                        @error('image')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- CAPTION --}}
                    <div class="sm:col-span-2">

                        <label for="caption" class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300">

                            Caption Artikel <span class="text-red-500">*</span>

                        </label>

                        <input type="text" name="caption" id="caption"
                            class="bg-white-50 px-4 py-3 text-sm text-gray-600 outline-none dark:bg-gray-700 dark:text-gray-300"
                            value="{{ old('caption') }}">

                        @error('caption')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- BODY --}}
                    <div class="sm:col-span-2">

                        <label for="body" class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300">

                            Isi Artikel <span class="text-red-500">*</span>

                        </label>

                        <input id="body" type="hidden" name="body" value="{{ old('body') }}">

                        <trix-editor input="body"
                            class="min-h-[300px] rounded-lg border border-gray-300 bg-white text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        </trix-editor>

                        @error('body')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>

                {{-- FORM FOOTER --}}
                <div
                    class="mt-8 flex flex-col-reverse justify-end gap-3 border-t border-gray-200 pt-6 dark:border-gray-700 sm:flex-row">

                    <a href="/dashboard/posts"
                        class="rounded-lg border border-gray-300 px-5 py-2.5 text-center text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">

                        Cancel

                    </a>

                    <button type="submit"
                        class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">

                        Create Article

                    </button>

                </div>

            </form>

        </div>

        {{-- FOOTER INFO --}}
        <p class="mt-5 text-center text-xs text-gray-400">
            Pastikan informasi artikel sudah benar sebelum menyimpan.
        </p>

    </div>

</div>

{{-- AUTO SLUG --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        function createSlug(value) {

            return value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

        }

        title.addEventListener('keyup', function() {

            slug.value = createSlug(title.value);

        });

        // Mengisi slug kembali jika validasi gagal
        if (title.value && !slug.value) {
            slug.value = createSlug(title.value);
        }

    });

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };
    }
</script>
