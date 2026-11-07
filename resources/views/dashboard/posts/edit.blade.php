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
                Update Article
            </span>
        </div>


        {{-- FORM CARD --}}
        <div
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">

            {{-- CARD HEADER --}}
            <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Artikel
                </h2>

            </div>

            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="p-6"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $post->id }}">
                <input type="hidden" name="author_id" value="{{ auth()->id() }}">

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

                    {{-- TITLE --}}
                    <div class="sm:col-span-2">

                        <label for="title" class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Judul Artikel <span class="text-red-500">*</span>
                        </label>

                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                            placeholder="Masukkan judul artikel..." required
                            class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">

                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
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

                            <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}"
                                readonly
                                class="w-full bg-gray-50 px-4 py-3 text-sm text-gray-600 outline-none dark:bg-gray-700 dark:text-gray-300">
                        </div>

                        @error('slug')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            Slug akan dibuat otomatis berdasarkan judul artikel.
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
                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>

                        @error('category_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- IMAGE --}}
                    <div class="sm:col-span-2">
                        <input type="hidden" name="oldImage" value="{{ $post->image }}">
                        <label for="image" class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Upload Image
                        </label>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}"
                                class="img-preview mb-2 max-h-60 rounded-lg object-cover">
                        @else
                            <img class="img-preview mb-2 max-h-60 rounded-lg object-cover">
                        @endif
                        <input type="file" name="image" id="image"
                            class=" bg-white-50 px-4 py-3 text-sm text-gray-600 outline-none dark:bg-gray-700 dark:text-gray-300"
                            onchange="previewImage()">
                    </div>

                    {{-- CAPTION --}}
                    <div class="sm:col-span-2">
                        <label for="caption" class="mb-2 block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            Caption Artikel <span class="text-red-500">*</span>
                        </label>

                        <input type="text" name="caption" id="caption"
                            class="bg-white-50 px-4 py-3 text-sm text-gray-600 outline-none dark:bg-gray-700 dark:text-gray-300"
                            value="{{ $post->caption }}" placeholder="Masukkan caption artikel..." required>

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

                        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">

                        <trix-editor input="body"
                            class="min-h-[300px] rounded-lg border border-gray-300 bg-white text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        </trix-editor>

                        @error('body')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
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
                        Update Article
                    </button>

                </div>

            </form>
        </div>

        {{-- FOOTER INFO --}}
        <p class="mt-5 text-center text-xs text-gray-400">
            Pastikan semua informasi artikel sudah benar sebelum menyimpan perubahan.
        </p>

    </div>
</div>

{{-- AUTO SLUG --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('keyup', function() {

            let value = title.value;

            slug.value = value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

        });

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
