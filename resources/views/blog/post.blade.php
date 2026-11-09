<x-layouts />
<x-navbar />

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article
            class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <a href="/posts" class="font-medium text-xs text-blue-600 hover:underline">&laquo; Back to all Post </a>
                <address class="flex items-center my-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                            alt="{{ $post->author->name }}">
                        <div>
                            <a href="/posts?author={{ $post->author->username }}" rel="author"
                                class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                            {{-- <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO Flowbite</p> --}}
                            <p class="text-base-xs text-gray-500 dark:text-gray-400">
                                {{ $post['created_at']->diffForHumans() }}</p>
                            <span
                                class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                            </span>
                        </div>
                    </div>
                </address>
                <h1
                    class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    {{ $post->title }}</h1>
            </header>
            @if ($post->image)
                <figure><img class="mb-3" src="{{ asset('storage/' . $post->image) }}"
                        alt="{{ $post->category->name }}">
                    <figcaption class="mb-3 text-xs text-gray-500 dark:text-gray-400">{{ $post->caption }}</figcaption>
                    {!! $post->body !!}
                @else
                    <figure><img src="https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png"
                            alt="{{ $post->category->name }}">
                        <figcaption>{{ $post->caption }}</figcaption>
                    </figure>
                    {!! $post->body !!}
            @endif

            <section class="not-format mt-8">

                {{-- Discussion Header --}}
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">
                        Komentar ({{ $totalComments }})
                    </h2>
                </div>

                {{-- Form Komentar --}}
                @auth
                    <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="mb-6">
                        @csrf
                        <div
                            class="py-2 px-4 mb-4 bg-white rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">

                            <textarea name="body" rows="4" placeholder="Write a comment..." required
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:bg-gray-800">{{ old('body') }}</textarea>

                            @error('body')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <button type="submit"
                            class="inline-flex items-center px-4 py-2.5 text-xs font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                            Kirim
                        </button>

                    </form>
                @else
                    <p class="mb-6 text-sm text-gray-500">
                        Silakan <a href="/login" class="text-blue-600 hover:underline">login</a>
                        untuk memberikan komentar.
                    </p>
                @endauth


                {{-- Daftar Komentar --}}
                @forelse ($comments as $comment)

                    <article
                        class="p-6 mb-6 text-base bg-white rounded-lg border border-gray-200 dark:bg-gray-900 dark:border-gray-700">

                        <footer class="flex justify-between items-center mb-2">

                            <div class="flex items-center">

                                <p
                                    class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white">

                                    <img class="mr-2 w-8 h-8 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                        alt="{{ $comment->user->name }}">

                                    {{ $comment->user->name }}

                                </p>

                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $comment->created_at->diffForHumans() }}
                                </p>

                            </div>

                            {{-- Dropdown --}}
                            @auth
                                @if (auth()->id() === $comment->user_id)
                                    <div class="relative">

                                        <button id="dropdownComment{{ $comment->id }}Button"
                                            data-dropdown-toggle="dropdownComment{{ $comment->id }}"
                                            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700"
                                            type="button">

                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 16 3">
                                                <path
                                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                            </svg>

                                        </button>

                                        <div id="dropdownComment{{ $comment->id }}"
                                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">

                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">

                                                <li>
                                                    <button type="button"
                                                        onclick="document.getElementById('editComment{{ $comment->id }}').classList.toggle('hidden')"
                                                        class="block w-full text-left py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                        Edit
                                                    </button>
                                                </li>

                                                <li>
                                                    <form
                                                        action="{{ route('comments.destroy', [$post->slug, $comment->id]) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            class="block w-full text-left py-2 px-4 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                            Remove
                                                        </button>

                                                    </form>
                                                </li>

                                            </ul>

                                        </div>

                                    </div>
                                @endif
                            @endauth

                        </footer>


                        {{-- Isi Komentar --}}
                        <p class="text-gray-700 dark:text-gray-300">
                            {{ $comment->body }}
                        </p>


                        {{-- Form Edit --}}
                        @auth
                            @if (auth()->id() === $comment->user_id)
                                <div id="editComment{{ $comment->id }}" class="hidden mt-4">

                                    <form action="{{ route('comments.update', [$post->slug, $comment->id]) }}"
                                        method="POST">

                                        @csrf
                                        @method('PUT')

                                        <textarea name="body" rows="3" required
                                            class="w-full p-3 text-sm border border-gray-300 rounded-lg dark:bg-gray-800 dark:text-white">{{ $comment->body }}</textarea>

                                        <button type="submit"
                                            class="mt-2 px-4 py-2 text-xs text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                            Update Comment
                                        </button>

                                    </form>

                                </div>
                            @endif
                        @endauth


                        {{-- Tombol Reply --}}
                        @auth
                            <div class="flex items-center mt-4 space-x-4">

                                <button type="button"
                                    onclick="document.getElementById('replyComment{{ $comment->id }}').classList.toggle('hidden')"
                                    class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">

                                    <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 18">
                                        <path
                                            d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Z" />
                                    </svg>

                                    Reply

                                </button>

                            </div>

                            {{-- Form Reply --}}
                            <div id="replyComment{{ $comment->id }}" class="hidden mt-4">

                                <form action="{{ route('comments.reply', [$post->slug, $comment->id]) }}" method="POST">

                                    @csrf

                                    <textarea name="body" rows="3" required placeholder="Write your reply..."
                                        class="w-full p-3 text-sm border border-gray-300 rounded-lg dark:bg-gray-800 dark:text-white"></textarea>

                                    <button type="submit"
                                        class="mt-2 px-4 py-2 text-xs text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                        Send Reply
                                    </button>

                                </form>

                            </div>
                        @endauth


                        {{-- Balasan Komentar --}}
                        @foreach ($comment->replies as $reply)
                            <article
                                class="p-6 mt-5 ml-6 lg:ml-12 text-base bg-gray-50 border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">

                                <footer class="flex justify-between items-center mb-2">

                                    <div class="flex items-center">

                                        <p
                                            class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white">

                                            <img class="mr-2 w-6 h-6 rounded-full"
                                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                                alt="{{ $reply->user->name }}">

                                            {{ $reply->user->name }}

                                        </p>

                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $reply->created_at->diffForHumans() }}
                                        </p>

                                    </div>

                                    {{-- Dropdown Reply --}}
                                    @auth
                                        @if (auth()->id() === $reply->user_id)
                                            <div class="relative">

                                                <button id="dropdownReply{{ $reply->id }}Button"
                                                    data-dropdown-toggle="dropdownReply{{ $reply->id }}"
                                                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700"
                                                    type="button">

                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 16 3">
                                                        <path
                                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                    </svg>

                                                </button>

                                                <div id="dropdownReply{{ $reply->id }}"
                                                    class="hidden z-10 w-36 bg-white rounded shadow dark:bg-gray-700">

                                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">

                                                        <li>
                                                            <button type="button"
                                                                onclick="document.getElementById('editReply{{ $reply->id }}').classList.toggle('hidden')"
                                                                class="block w-full text-left py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                Edit
                                                            </button>
                                                        </li>

                                                        <li>
                                                            <form
                                                                action="{{ route('comments.destroy', [$post->slug, $reply->id]) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Hapus balasan ini?')">

                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit"
                                                                    class="block w-full text-left py-2 px-4 text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                    Remove
                                                                </button>

                                                            </form>
                                                        </li>

                                                    </ul>

                                                </div>

                                            </div>
                                        @endif
                                    @endauth

                                </footer>


                                <p class="text-gray-700 dark:text-gray-300">
                                    {{ $reply->body }}
                                </p>


                                {{-- Edit Reply --}}
                                @auth
                                    @if (auth()->id() === $reply->user_id)
                                        <div id="editReply{{ $reply->id }}" class="hidden mt-3">

                                            <form action="{{ route('comments.update', [$post->slug, $reply->id]) }}"
                                                method="POST">

                                                @csrf
                                                @method('PUT')

                                                <textarea name="body" rows="2" required
                                                    class="w-full p-3 text-sm border rounded-lg dark:bg-gray-900 dark:text-white">{{ $reply->body }}</textarea>

                                                <button type="submit"
                                                    class="mt-2 px-4 py-2 text-xs text-white bg-blue-700 rounded-lg">
                                                    Update
                                                </button>

                                            </form>

                                        </div>
                                    @endif
                                @endauth

                            </article>
                        @endforeach

                    </article>

                @empty

                    <p class="text-gray-500 dark:text-gray-400">
                        Belum ada komentar. Jadilah orang pertama yang berkomentar!
                    </p>

                @endforelse
            </section>

            <aside aria-label="Related articles" class="py-8 lg:py-16 bg-gray-50 dark:bg-gray-500">
                <div class="px-4 mx-auto max-w-screen-xl">

                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                        Related Articles
                    </h2>

                    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                        @forelse ($relatedPosts as $relatedPost)
                            <article class="max-w-xs">

                                <a href="{{ url('/dashboard/posts/' . $relatedPost->slug) }}">

                                    @if ($relatedPost->image)
                                        <img src="{{ asset('storage/' . $relatedPost->image) }}"
                                            class="mb-5 rounded-lg w-full h-48 object-cover"
                                            alt="{{ $relatedPost->title }}">
                                    @else
                                        <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-1.png"
                                            class="mb-5 rounded-lg w-full h-48 object-cover"
                                            alt="{{ $relatedPost->title }}">
                                    @endif

                                </a>

                                <h3 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">

                                    <a href="{{ url('/dashboard/posts/' . $relatedPost->slug) }}"
                                        class="hover:text-blue-600">

                                        {{ $relatedPost->title }}

                                    </a>

                                </h3>

                                <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">

                                    {{ Str::limit(strip_tags($relatedPost->body), 100) }}

                                </p>

                                <p class="text-xs text-gray-500 dark:text-gray-400">

                                    {{ $relatedPost->created_at->diffForHumans() }}

                                </p>

                                <a href="/posts/{{ $post['slug'] }}"
                                    class="inline-flex items-center mt-3 font-medium text-blue-600 hover:underline">
                                    Read more &raquo;
                                </a>

                            </article>

                        @empty

                            <p class="text-gray-500 dark:text-gray-400 col-span-full">
                                Belum ada artikel terkait.
                            </p>
                        @endforelse

                    </div>
                </div>
            </aside>
        </article>
    </div>
</main>
