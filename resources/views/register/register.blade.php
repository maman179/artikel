<x-layouts />
<x-navbar />

<section class="flex flex-col items-center justify-center min-h-screen px-4 py-8 bg-gray-50 dark:bg-gray-900">

    <div
        class="w-full max-w-md bg-white rounded-xl shadow-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">

        <div class="p-6 space-y-6 sm:p-8">

            {{-- Judul --}}
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Registration Form
                </h1>

            </div>

            {{-- Form Registrasi --}}
            <form action="{{ url('/register') }}" method="POST" class="space-y-5">
                @csrf

                {{-- NAME --}}
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Lengkap
                    </label>

                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        class="block w-full rounded-lg border p-2.5 text-sm
                        bg-gray-50 text-gray-900 placeholder-gray-400
                        focus:outline-none focus:ring-2
                        dark:bg-gray-700 dark:text-white dark:placeholder-gray-400
                        {{ $errors->has('name')
                            ? 'border-red-500 focus:ring-red-300 focus:border-red-500'
                            : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600' }}"
                        @error('name') aria-invalid="true" aria-describedby="name-error" @enderror>

                    @error('name')
                        <p id="name-error" class="mt-2 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- USERNAME --}}
                <div>
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Username
                    </label>

                    <input type="text" name="username" id="username" value="{{ old('username') }}"
                        placeholder="Masukkan username"
                        class="block w-full rounded-lg border p-2.5 text-sm
                        bg-gray-50 text-gray-900 placeholder-gray-400
                        focus:outline-none focus:ring-2
                        dark:bg-gray-700 dark:text-white dark:placeholder-gray-400
                        {{ $errors->has('username')
                            ? 'border-red-500 focus:ring-red-300 focus:border-red-500'
                            : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600' }}"
                        @error('username') aria-invalid="true" aria-describedby="username-error" @enderror>

                    @error('username')
                        <p id="username-error" class="mt-2 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email
                    </label>

                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        placeholder="example@gmail.com"
                        class="block w-full rounded-lg border p-2.5 text-sm
                        bg-gray-50 text-gray-900 placeholder-gray-400
                        focus:outline-none focus:ring-2
                        dark:bg-gray-700 dark:text-white dark:placeholder-gray-400
                        {{ $errors->has('email')
                            ? 'border-red-500 focus:ring-red-300 focus:border-red-500'
                            : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600' }}"
                        @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>

                    @error('email')
                        <p id="email-error" class="mt-2 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Password
                    </label>

                    <input type="password" name="password" id="password" placeholder="Minimal 8 karakter"
                        class="block w-full rounded-lg border p-2.5 text-sm
                        bg-gray-50 text-gray-900 placeholder-gray-400
                        focus:outline-none focus:ring-2
                        dark:bg-gray-700 dark:text-white dark:placeholder-gray-400
                        {{ $errors->has('password')
                            ? 'border-red-500 focus:ring-red-300 focus:border-red-500'
                            : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600' }}"
                        @error('password') aria-invalid="true" aria-describedby="password-error" @enderror>

                    @error('password')
                        <p id="password-error" class="mt-2 text-sm text-red-600 dark:text-red-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- TOMBOL REGISTER --}}
                <button type="submit"
                    class="w-full rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold
                    text-white transition duration-200 hover:bg-blue-700
                    focus:outline-none focus:ring-4 focus:ring-blue-300
                    dark:focus:ring-blue-800">

                    Register
                </button>

                {{-- LINK LOGIN --}}
                <p class="text-sm text-center text-gray-500 dark:text-gray-400">
                    Sudah punya akun?

                    <a href="{{ url('/login') }}" class="font-medium text-blue-600 hover:underline dark:text-blue-400">
                        Login
                    </a>
                </p>

            </form>
        </div>
    </div>
</section>
