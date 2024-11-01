<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-gray-900 to-black text-white">
    {{-- Navigation Bar (start) --}}
    <nav class="fixed w-full z-50 bg-gray-900/80 backdrop-blur-md">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <div
                    class="text-2xl font-bold bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                    NexaBot
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a>
                    <a href="{{ route('contact') }}" class="hover:text-blue-400 transition">Kontak</a>
                    <a href="{{ route('about') }}" class="hover:text-blue-400 transition">Tentang</a>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded-full transition">
                    Hubungi Kami
                </button>
            </div>
        </div>
    </nav>
    {{-- Navigation Bar (end) --}}

    <div>
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="bg-gray-900 pb-5 m-0">
        <div class="mt-12 pt-8 text-center text-gray-400">
            <p>&copy; 2024 AIBot Creator. All rights reserved.</p>
        </div>
    </footer>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
</body>

</html>
