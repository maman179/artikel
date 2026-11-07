<x-layouts />
<x-navbar />


@if (session('success'))
    <meta name="flash-success" content="{{ session('success') }}">
@endif

@if (session('error'))
    <meta name="flash-error" content="{{ session('error') }}">
@endif

@if (session('errorLogin'))
    <meta name="flash-errorLogin" content="{{ session('errorLogin') }}">
@endif

<div class="min-h-screen flex items-center justify-center w-full dark:bg-gray-950">
    <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg px-8 py-6 max-w-md">
        <h1 class="text-2xl font-bold text-center mb-4 dark:text-gray-200">Welcome Back!</h1>
        <form action="/login" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email
                    Address</label>
                <input type="email" id="email" name="email"
                    class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="your@email.com"
                    {{ $errors->has('email')
                        ? 'border-red-500 focus:ring-red-300 focus:border-red-500'
                        : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600' }}"
                    @error('email') aria-invalid="true" aria-describedby="email-error" @enderror autofocus required>
                @error('email')
                    <p id="email-error" class="mt-2 text-sm text-red-600 dark:text-red-400">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                <input type="password" id="password" name="password"
                    class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter your password" required>
                <a href="#"
                    class="text-xs text-gray-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Forgot
                    Password?</a>
            </div>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input type="checkbox" id="remember"
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 focus:outline-none"
                        checked>
                    <label for="remember" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Remember
                        me</label>
                </div>
                <a href="/register"
                    class="text-xs text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register
                    Now</a>
            </div>
            <button onclick="alert("hello")" type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login</button>
        </form>
    </div>
</div>
