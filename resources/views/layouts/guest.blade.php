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

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1530521954074-e64f6810b32d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
            height: 80vh;
        }

        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900 font-sans antialiased">
    @include('livewire.layout.navigation')

    <main class="container mx-auto px-6 mt-10">
        @yield('content')

        <!-- Footer -->
        <footer class="bg-[rgb(33,15,55)] text-white pt-16 pb-6">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <div class="flex items-center space-x-2 mb-4">
                            <i class="fas fa-leaf text-green-400 text-2xl"></i>
                            <span class="font-bold text-xl text-white">Nusantara Edupark</span>
                        </div>
                        <p class="text-gray-400 mb-4">Tempat wisata edukasi terbaik di bidang pertanian,
                            peternakan, dan
                            perkebunan.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition-all">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-all">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-all">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-all">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition-all">Beranda</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-all">Tentang
                                    Kami</a>
                            </li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-all">Paket
                                    Wisata</a>
                            </li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-all">Galeri</a>
                            </li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-all">Blog</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt text-green-400 mt-1 mr-3"></i>
                                <span class="text-gray-400">Jl. Raya Dungus, Kelurahan Munggut, Mojopurno, Kec. Wungu,
                                    Kabupaten Madiun, Jawa Timur 63181</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-phone-alt text-green-400 mr-3"></i>
                                <span class="text-gray-400">081939114933</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-envelope text-green-400 mr-3"></i>
                                <span class="text-gray-400">info@nusantaraedupark.id</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Jam Operasional</h4>
                        <ul class="space-y-2">
                            <li class="flex justify-between">
                                <span class="text-gray-400">Senin - Jumat</span>
                                <span class="text-gray-400">08:00 - 16:00</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-gray-400">Sabtu - Minggu</span>
                                <span class="text-gray-400">08:00 - 17:00</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="text-gray-400">Hari Libur</span>
                                <span class="text-gray-400">09:00 - 16:00</span>
                            </li>
                        </ul>
                        {{-- <div class="mt-6">
                            <h4 class="text-lg font-semibold mb-2">Newsletter</h4>
                            <div class="flex">
                                <input type="email" placeholder="Email Anda"
                                    class="bg-gray-700 text-white px-4 py-2 rounded-l-md w-full focus:outline-none">
                                <button
                                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-r-md transition-all">Langganan</button>
                            </div>
                            <p class="text-gray-400 text-sm mt-2">Dapatkan info terbaru dan promo menarik</p>
                        </div>
                    </div>
                </div> --}}
                <div class="border-t border-gray-700 mt-10 pt-6">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p class="text-gray-400 text-sm">© 2025 Nusantara Edupark. Hak Cipta Dilindungi.</p>
                        <div class="flex space-x-4 mt-4 md:mt-0">
                            <a href="#" class="text-gray-400 hover:text-white text-sm transition-all">Kebijakan
                                Privasi</a>
                            <a href="#" class="text-gray-400 hover:text-white text-sm transition-all">Syarat
                                &
                                Ketentuan</a>
                            <a href="#" class="text-gray-400 hover:text-white text-sm transition-all">FAQ</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        @livewireScripts
</body>

</html>