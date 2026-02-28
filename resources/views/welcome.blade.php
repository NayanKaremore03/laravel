<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-950 text-white">

    <!-- Navbar -->
    <nav class="flex items-center justify-between px-8 py-5 bg-gray-900 shadow-lg">
        <h1 class="text-2xl font-bold text-indigo-500">
            {{ config('app.name', 'Laravel') }}
        </h1>

        <div class="space-x-6 hidden md:flex">
            <a href="#" class="hover:text-indigo-400 transition">Home</a>
            <a href="#" class="hover:text-indigo-400 transition">Features</a>
            <a href="#" class="hover:text-indigo-400 transition">About</a>
            <a href="#" class="hover:text-indigo-400 transition">Contact</a>
        </div>

        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-indigo-600 px-4 py-2 rounded-lg hover:bg-indigo-500 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-indigo-600 px-4 py-2 rounded-lg hover:bg-indigo-500 transition">
                        Login
                    </a>
                @endauth
            </div>
        @endif
    </nav>

    <!-- Hero Section -->
    <section class="min-h-screen flex flex-col justify-center items-center text-center px-6">
        <h2 class="text-4xl md:text-6xl font-extrabold mb-6">
            Build Something Amazing with
            <span class="text-indigo-500">Laravel</span>
        </h2>

        <p class="text-gray-400 max-w-2xl mb-8 text-lg">
            Laravel is a powerful PHP framework designed to make web development
            simple, elegant, and enjoyable.
        </p>

        <div class="space-x-4">
            <a href="#" class="bg-indigo-600 px-6 py-3 rounded-lg text-lg hover:bg-indigo-500 transition">
                Get Started
            </a>

            <a href="https://laravel.com/docs" target="_blank"
               class="border border-indigo-600 px-6 py-3 rounded-lg text-lg hover:bg-indigo-600 transition">
                Documentation
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gray-900">
        <div class="max-w-6xl mx-auto px-6">
            <h3 class="text-3xl font-bold text-center mb-12">
                Why Choose Laravel?
            </h3>

            <div class="grid md:grid-cols-3 gap-10">

                <div class="bg-gray-800 p-8 rounded-2xl shadow-lg hover:scale-105 transition">
                    <h4 class="text-xl font-semibold mb-4 text-indigo-400">
                        MVC Architecture
                    </h4>
                    <p class="text-gray-400">
                        Clean separation of logic and presentation using
                        Model-View-Controller structure.
                    </p>
                </div>

                <div class="bg-gray-800 p-8 rounded-2xl shadow-lg hover:scale-105 transition">
                    <h4 class="text-xl font-semibold mb-4 text-indigo-400">
                        Built-in Authentication
                    </h4>
                    <p class="text-gray-400">
                        Secure authentication and authorization system
                        out of the box.
                    </p>
                </div>

                <div class="bg-gray-800 p-8 rounded-2xl shadow-lg hover:scale-105 transition">
                    <h4 class="text-xl font-semibold mb-4 text-indigo-400">
                        Powerful ORM
                    </h4>
                    <p class="text-gray-400">
                        Eloquent ORM makes working with databases
                        simple and expressive.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Call To Action -->
    <section class="py-20 text-center">
        <h3 class="text-3xl font-bold mb-6">
            Ready to Start Your Project?
        </h3>

        <a href="#" class="bg-indigo-600 px-8 py-4 text-lg rounded-xl hover:bg-indigo-500 transition">
            Create Your App Now
        </a>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 py-6 text-center text-gray-500">
        © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
    </footer>

</body>
</html>