<!doctype html>
<html lang="id" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet" />
    <title>@yield('title')</title>
    <style>
        html::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-[#333]">
    @include('partials.navbar')

    <div class="pt-16">
        @yield('content')
    </div>
    
    @include('partials.footer')

    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
        });
    </script>
</body>
</html>