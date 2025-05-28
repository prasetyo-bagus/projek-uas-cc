<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Nusantara Edupark') }}</title>

    <!-- Vite & Livewire -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --swiper-pagination-color: white;
            --swiper-pagination-bullet-inactive-color: rgba(255, 255, 255, 0.5);
            --swiper-pagination-bullet-inactive-opacity: 0.5;
            --swiper-pagination-bullet-opacity: 1;
            --swiper-pagination-bottom: 8px;
            --swiper-pagination-right: 8px;
        }

        .rich-content ul {
            list-style-type: disc;
            margin-left: 1.5rem;
        }

        .rich-content ol {
            list-style-type: decimal;
            margin-left: 1.5rem;
        }

        .rich-content li {
            margin-bottom: 0.25rem;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        .rich-content ul {
            list-style-type: disc;
            margin-left: 1.5rem;
            padding-left: 1rem;
        }

        .rich-content ol {
            list-style-type: decimal;
            margin-left: 1.5rem;
            padding-left: 1rem;
        }

        .rich-content li {
            margin-bottom: 0.25rem;
        }

        /* Navbar styles */
        nav {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        nav a {
            position: relative;
        }

        nav a:hover {
            transform: translateY(-1px);
        }

        nav a.text-purple-700.font-bold:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #6B46C1, #4F46E5);
            border-radius: 2px;
        }

        @media (min-width: 768px) {
            nav a:after {
                content: '';
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 0;
                height: 2px;
                background: linear-gradient(90deg, #6B46C1, #4F46E5);
                transition: width 0.3s ease;
                border-radius: 2px;
            }

            nav a:hover:after {
                width: 100%;
            }
        }

        /* Padding untuk konten utama agar tidak tertutup navbar */
        .content-wrapper {
            padding-top: 72px;
            /* Sesuaikan dengan tinggi navbar */
        }

        /* Penanganan khusus untuk homepage - tanpa padding untuk hero section */
        .homepage-content .hero-section {
            margin-top: -72px;
            /* Mengembalikan posisi hero section ke atas */
        }
    </style>
</head>

<body class="text-gray-900 font-poppins antialiased">
    @include('navbar.guestnavbar')

    <main class="w-full bg-white{{ request()->routeIs('homepage') ? 'homepage-content' : '' }}">
        @yield('content')

        @livewireScripts
    </main>
    @extends('navbar.guestfooter')

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: false,
                mirror: true
            });
        });
    </script>
</body>

</html>
