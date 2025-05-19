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

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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
    </style>
</head>

<body class="bg-gray-100 text-gray-900 font-sans antialiased">
    @include('navbar.guestnavbar')

    <main class="w-full">
        @yield('content')

        @livewireScripts
    </main>
    @extends('navbar.guestfooter')
</body>

</html>