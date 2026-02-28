<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Professional Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-white text-gray-800">

<!-- ================= NAVBAR ================= -->
<header class="absolute w-full z-50">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900">
            {{ config('app.name', 'Laravel') }}
        </h1>

        <nav class="hidden md:flex space-x-8 text-sm font-medium">
            <a href="#" class="hover:text-blue-600 transition">Home</a>
            <a href="#features" class="hover:text-blue-600 transition">Features</a>
            <a href="#about" class="hover:text-blue-600 transition">About</a>
            <a href="#contact" class="hover:text-blue-600 transition">Contact</a>
        </nav>

        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="border border-blue-600 text-blue-600 px-5 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition">
                        Login
                    </a>
                @endauth
            </div>
        @endif
    </div>
</header>


<!-- ================= HERO SECTION ================= -->
<section class="bg-gradient-to-br from-blue-50 to-white pt-40 pb-28">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

        <div>
            <h2 class="text-5xl font-extrabold leading-tight text-gray-900 mb-6">
                Build Modern Web Applications with Confidence
            </h2>

            <p class="text-lg text-gray-600 mb-8">
                {{ config('app.name', 'Laravel') }} provides an elegant and powerful foundation
                for building secure, scalable, and high-performance applications.
            </p>

            <div class="flex space-x-4">
                <a href="#" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Get Started
                </a>

                <a href="https://laravel.com/docs" target="_blank"
                   class="border border-gray-300 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    View Documentation
                </a>
            </div>
        </div>

        <div class="hidden md:block">
            <div class="bg-white shadow-2xl rounded-2xl p-8 border">
                <h3 class="text-lg font-semibold mb-4">Example Controller</h3>
                <pre class="text-sm text-gray-700 bg-gray-50 p-4 rounded-lg overflow-x-auto">
Route::get('/', function () {
    return view('welcome');
});
                </pre>
            </div>
        </div>

    </div>
</section>


<!-- ================= FEATURES ================= -->
<section id="features" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center">

        <h3 class="text-4xl font-bold text-gray-900 mb-4">
            Powerful Features for Developers
        </h3>
        <p class="text-gray-600 mb-16">
            Everything you need to build enterprise-grade applications.
        </p>

        <div class="grid md:grid-cols-3 gap-12 text-left">

            <div>
                <div class="w-12 h-12 bg-blue-100 text-blue-600 flex items-center justify-center rounded-lg mb-4 font-bold text-xl">
                    01
                </div>
                <h4 class="text-xl font-semibold mb-3">Elegant Syntax</h4>
                <p class="text-gray-600">
                    Clean and expressive syntax that makes coding enjoyable
                    and reduces development time.
                </p>
            </div>

            <div>
                <div class="w-12 h-12 bg-blue-100 text-blue-600 flex items-center justify-center rounded-lg mb-4 font-bold text-xl">
                    02
                </div>
                <h4 class="text-xl font-semibold mb-3">Secure by Default</h4>
                <p class="text-gray-600">
                    Protection against common security vulnerabilities
                    like SQL injection and CSRF attacks.
                </p>
            </div>

            <div>
                <div class="w-12 h-12 bg-blue-100 text-blue-600 flex items-center justify-center rounded-lg mb-4 font-bold text-xl">
                    03
                </div>
                <h4 class="text-xl font-semibold mb-3">Scalable Architecture</h4>
                <p class="text-gray-600">
                    Designed to scale from small projects to enterprise-level systems.
                </p>
            </div>

        </div>
    </div>
</section>


<!-- ================= ABOUT ================= -->
<section id="about" class="py-24 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 text-center">

        <h3 class="text-4xl font-bold text-gray-900 mb-6">
            Built for Professionals
        </h3>

        <p class="text-gray-600 max-w-3xl mx-auto text-lg">
            Whether you're building APIs, SaaS platforms, enterprise systems,
            or simple websites — Laravel provides the tools and structure
            to deliver reliable software faster.
        </p>

    </div>
</section>


<!-- ================= CTA ================= -->
<section class="py-24 bg-blue-600 text-white text-center">
    <h3 class="text-4xl font-bold mb-6">
        Start Building Today
    </h3>

    <p class="mb-8 text-lg opacity-90">
        Create something exceptional with a framework trusted worldwide.
    </p>

    <a href="#" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition">
        Launch Your Project
    </a>
</section>


<!-- ================= FOOTER ================= -->
<footer class="bg-gray-900 text-gray-400 py-8">
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-sm">
        <p>
            © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
        </p>

        <div class="flex space-x-6 mt-4 md:mt-0">
            <a href="#" class="hover:text-white transition">Privacy Policy</a>
            <a href="#" class="hover:text-white transition">Terms of Service</a>
        </div>
    </div>
</footer>

</body>
</html>