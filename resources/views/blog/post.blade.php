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
        </article>
    </div>
</main>
