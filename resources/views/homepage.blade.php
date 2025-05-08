@extends('layouts.guest')

<body class="bg-gray-50">
    @section('content')
        <div class="swiper heroSwiper w-full h-[80vh] relative">
            <div class="swiper-wrapper w-full h-full">
                @foreach ($banners as $banner)
                    <div class="swiper-slide w-full h-full bg-cover bg-center flex"
                        style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('{{ $banner->image ? asset('storage/' . $banner->image) : asset('default_images/defaultbanner.png') }}');">

                        <!-- Konten di bawah -->
                        <div class="flex flex-col justify-end items-center text-center w-full min-h-full px-6 pb-12">
                            <div class="container mx-auto">
                                <h1 class="text-5xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg">
                                    {{ $banner->title ?? 'Nusantara Edupark' }}
                                </h1>
                                <p class="text-xl md:text-2xl text-white mb-8 drop-shadow-md">
                                    {{ $banner->description ?? 'Wisata Edukasi Pertanian, Peternakan, dan Perkebunan' }}
                                </p>
                                <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
                                    <a href="#"
                                        class="bg-purple-900 hover:bg-purple-600 text-white font-semibold py-3 px-8 rounded-full transition-all">
                                        Jelajahi Sekarang
                                    </a>
                                    <a href="{{ route('packets') }}"
                                        class="bg-white hover:bg-gray-100 text-purple-900 font-semibold py-3 px-8 rounded-full transition-all">
                                        Lihat Paket Wisata
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Tombol Navigasi -->
            <div
                class="swiper-button-prev w-6 h-6 ml-4 top-1/2 -translate-y-1/2 left-0 absolute z-10 filter brightness-0 invert">
            </div>
            <div
                class="swiper-button-next w-6 h-6 mr-4 top-1/2 -translate-y-1/2 right-0 absolute z-10 filter brightness-0 invert">
            </div>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const swiper = new Swiper(".heroSwiper", {
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    effect: 'fade',
                    speed: 1000,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            });
        </script>

        <!-- Sponsors Section -->
        <section class="py-4 bg-white  border-gray-100">
            <div class="container mx-auto px-6">
                <div class="text-center mb-6">
                    <!-- <h3 class="text-lg font-medium text-gray-500">Didukung Oleh</h3> -->
                </div>

                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12">
                    @forelse ($sponsors as $sponsor)
                        <div class="group">
                            <a href="{{ $sponsor->detail }}" target="_blank" class="block" title="{{ $sponsor->title }}">
                                <img src="{{ asset('storage/' . $sponsor->image) }}" alt="{{ $sponsor->title }}"
                                    class="h-20 md:h-20 filter hover:grayscale-0 transition-all duration-300 hover:scale-110">
                            </a>
                        </div>
                    @empty
                        <div class="text-gray-400 italic text-sm">Belum ada sponsor</div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Features Section with Playful Elements -->
        <section class="py-16 bg-white relative overflow-hidden">
            <!-- Background Decorative Elements -->
            <div
                class="absolute top-0 right-0 w-32 h-32 bg-yellow-200 rounded-full opacity-30 transform -translate-y-1/2 translate-x-1/2">
            </div>
            <div
                class="absolute bottom-0 left-0 w-48 h-48 bg-green-200 rounded-full opacity-30 transform translate-y-1/2 -translate-x-1/2">
            </div>

            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 relative inline-block">
                        <span class="relative z-10">Pengalaman Wisata Edukatif</span>
                        <svg class="absolute -bottom-2 left-0 w-full h-3 text-green-200 z-0" viewBox="0 0 200 8">
                            <path d="M0 4C40 0 60 8 100 4C140 0 160 8 200 4" fill="none" stroke="currentColor"
                                stroke-width="4" stroke-linecap="round"></path>
                        </svg>
                    </h2>
                    <p class="text-gray-600 mt-4">Nikmati beragam aktivitas menarik dan bermanfaat</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all text-center transform hover:-translate-y-2 hover:rotate-1 group">
                        <div
                            class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all">
                            <i class="fas fa-seedling text-green-600 text-3xl group-hover:animate-bounce-slow"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Edukasi Pertanian</h3>
                        <p class="text-gray-600">Pelajari teknik bertani modern dan tradisional dengan pengalaman langsung
                            di lahan pertanian kami.</p>
                        <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>

                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all text-center transform hover:-translate-y-2 hover:rotate-1 group">
                        <div
                            class="bg-orange-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all">
                            <i class="fas fa-horse text-orange-600 text-3xl group-hover:animate-bounce-slow"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Peternakan Interaktif</h3>
                        <p class="text-gray-600">Berinteraksi dengan beragam hewan ternak dan pelajari cara merawat mereka
                            dengan baik.</p>
                        <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>

                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all text-center transform hover:-translate-y-2 hover:rotate-1 group">
                        <div
                            class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all">
                            <i class="fas fa-tree text-blue-600 text-3xl group-hover:animate-bounce-slow"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Taman Perkebunan</h3>
                        <p class="text-gray-600">Jelajahi aneka tanaman perkebunan dan pelajari proses panen hingga
                            pengolahan hasil perkebunan.</p>
                        <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PACKET -->
        <!-- Popular Tours Section with Animated Effects -->
        <section class="py-16 bg-gray-50 relative overflow-hidden">
            <!-- Decorative Background Elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-5 pointer-events-none">
                <i class="fas fa-leaf absolute text-green-500 text-6xl" style="top: 10%; left: 5%;"></i>
                <i class="fas fa-carrot absolute text-orange-500 text-5xl" style="top: 30%; left: 15%;"></i>
                <i class="fas fa-tractor absolute text-red-500 text-7xl" style="top: 70%; left: 8%;"></i>
                <i class="fas fa-cow absolute text-gray-500 text-6xl" style="top: 40%; right: 12%;"></i>
                <i class="fas fa-egg absolute text-yellow-500 text-5xl" style="top: 15%; right: 20%;"></i>
                <i class="fas fa-apple-alt absolute text-red-500 text-4xl" style="top: 80%; right: 5%;"></i>
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 relative inline-block">
                            <i class="fas fa-star text-yellow-400 mr-2 animate-pulse-slow"></i>
                            Paket Wisata Favorit
                        </h2>
                        <p class="text-gray-600 mt-2">Pilihan paket wisata edukatif yang paling diminati</p>
                    </div>
                    <a href="{{ route('packets') }}"
                        class="text-green-600 hover:text-green-700 font-semibold transition-all flex items-center group">
                        Lihat Semua <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse ($packets as $packet)
                        <div
                            class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 group">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $packet->image) }}"
                                    class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-700"
                                    alt="{{ $packet->title }}">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
                                    <p class="text-white px-4 pb-4 font-medium">
                                        <i class="fas fa-camera mr-2"></i> Paket Wisata
                                    </p>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-center mb-3">
                                    <span
                                        class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                                        <i class="fas fa-crown text-yellow-500 mr-1"></i> Bestseller
                                    </span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $packet->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ $packet->description }}</p>
                                <div class="flex justify-between items-center">
                                    <p class="text-green-600 font-bold flex items-center">
                                        <i class="fas fa-tag mr-1"></i> Rp. {{ $packet->detail ?? 'Hubungi kami' }}
                                    </p>
                                    <a href="#"
                                        class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-colors flex items-center">
                                        <i class="fas fa-ticket-alt mr-1"></i> Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-12">
                            <div class="bg-gray-100 rounded-lg p-8 inline-block">
                                <i class="fas fa-ticket-alt text-gray-400 text-4xl mb-3"></i>
                                <p class="text-gray-500">Belum ada paket wisata yang tersedia.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>


        <!-- FACILITY -->
        <section class="py-16 bg-gray-50 relative overflow-hidden">
            <!-- Decorative Background Elements -->
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-5 pointer-events-none">
                <i class="fas fa-leaf absolute text-green-500 text-6xl" style="top: 10%; left: 5%;"></i>
                <i class="fas fa-carrot absolute text-orange-500 text-5xl" style="top: 30%; left: 15%;"></i>
                <i class="fas fa-tractor absolute text-red-500 text-7xl" style="top: 70%; left: 8%;"></i>
                <i class="fas fa-cow absolute text-gray-500 text-6xl" style="top: 40%; right: 12%;"></i>
                <i class="fas fa-egg absolute text-yellow-500 text-5xl" style="top: 15%; right: 20%;"></i>
                <i class="fas fa-apple-alt absolute text-red-500 text-4xl" style="top: 80%; right: 5%;"></i>
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 relative inline-block">
                            <i class="fas fa-star text-yellow-400 mr-2 animate-pulse-slow"></i>
                            FASILITAS
                        </h2>
                        <p class="text-gray-600 mt-2">FASILITAS YANG TERSEDIA</p>
                    </div>
                    <a href="{{ route('facilities') }}"
                        class="text-green-600 hover:text-green-700 font-semibold transition-all flex items-center group">
                        Lihat Semua <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse ($facilities as $facility)
                        <div
                            class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 group">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $facility->image) }}"
                                    class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-700"
                                    alt="{{ $facility->title }}">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
                                    <p class="text-white px-4 pb-4 font-medium">
                                        <i class="fas fa-building mr-2"></i> Fasilitas
                                    </p>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-center mb-3">
                                    <span
                                        class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                                        <i class="fas fa-check-circle text-green-600 mr-1"></i> Tersedia
                                    </span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $facility->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ $facility->description }}</p>
                                @if ($facility->detail)
                                    <div class="flex justify-end">
                                        <a href="#"
                                            class="text-blue-600 hover:text-blue-800 font-medium transition-colors flex items-center">
                                            <i class="fas fa-info-circle mr-1"></i> Detail
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-12">
                            <div class="bg-gray-100 rounded-lg p-8 inline-block">
                                <i class="fas fa-building text-gray-400 text-4xl mb-3"></i>
                                <p class="text-gray-500">Belum ada fasilitas yang tersedia.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>


        <!-- Gallery Section with Fun Interactive Elements -->
        <section class="py-16 relative overflow-hidden">
            <!-- Background dengan bentuk gelombang dan icon anak-anak -->
            <div class="absolute inset-0">
                <!-- Warna dasar sesuai permintaan: rgb(144, 0, 239) -->
                <div class="absolute inset-0" style="background-color: rgb(144, 0, 239);"></div>

                <!-- Icon anak-anak yang transparan di background (lebih banyak dan ramai) -->
                <div class="absolute inset-0 opacity-10">
                    <!-- Icon anak bermain 1 -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute top-10 left-1/4 w-24 h-24">
                        <path fill="#ffffff"
                            d="M50,10 C55,10 59,14 59,19 C59,24 55,28 50,28 C45,28 41,24 41,19 C41,14 45,10 50,10 Z" />
                        <path fill="#ffffff" d="M40,30 L60,30 L65,50 L60,70 L40,70 L35,50 Z" />
                        <path fill="#ffffff" d="M35,45 L25,60 L30,65 L40,50 Z" />
                        <path fill="#ffffff" d="M65,45 L75,60 L70,65 L60,50 Z" />
                        <path fill="#ffffff" d="M40,70 L35,90 L45,90 L48,70 Z" />
                        <path fill="#ffffff" d="M60,70 L65,90 L55,90 L52,70 Z" />
                    </svg>

                    <!-- Icon anak membaca -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute top-40 right-1/4 w-28 h-28">
                        <path fill="#ffffff"
                            d="M30,30 C35,25 45,25 50,30 C55,25 65,25 70,30 C75,35 75,65 70,70 C65,75 55,75 50,70 C45,75 35,75 30,70 C25,65 25,35 30,30 Z" />
                        <circle fill="#ffffff" cx="50" cy="20" r="10" />
                        <path fill="#ffffff" d="M45,15 C45,15 47,20 50,20 C53,20 55,15 55,15" />
                    </svg>

                    <!-- Icon balon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute bottom-40 left-1/5 w-16 h-16">
                        <path fill="#ffffff"
                            d="M50,10 C65,10 75,25 75,40 C75,55 65,70 50,70 C35,70 25,55 25,40 C25,25 35,10 50,10 Z" />
                        <path fill="#ffffff" d="M50,70 L45,90 L55,90 L50,70 Z" />
                    </svg>

                    <!-- Icon mainan kubus -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute top-60 left-20 w-20 h-20">
                        <rect fill="#ffffff" x="20" y="20" width="60" height="60" rx="10"
                            ry="10" />
                        <circle fill="#9000EF" cx="35" cy="35" r="5" />
                        <circle fill="#9000EF" cx="65" cy="35" r="5" />
                        <circle fill="#9000EF" cx="35" cy="65" r="5" />
                        <circle fill="#9000EF" cx="65" cy="65" r="5" />
                    </svg>

                    <!-- TAMBAHAN IKON -->

                    <!-- Icon anak bermain 2 -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute top-24 left-2/3 w-20 h-20">
                        <circle fill="#ffffff" cx="50" cy="20" r="15" />
                        <path fill="#ffffff" d="M35,40 L65,40 L70,80 L30,80 Z" />
                        <path fill="#ffffff" d="M30,50 L20,70 L30,70 Z" />
                        <path fill="#ffffff" d="M70,50 L80,70 L70,70 Z" />
                    </svg>

                    <!-- Icon pensil -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute top-1/3 left-10 w-24 h-24" transform="rotate(30)">
                        <path fill="#ffffff" d="M20,80 L30,20 L70,20 L80,80 Z" />
                        <path fill="#9000EF" d="M30,20 L70,20 L70,10 L30,10 Z" />
                    </svg>

                    <!-- Icon buku -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute bottom-60 right-20 w-28 h-28">
                        <path fill="#ffffff" d="M20,20 L80,20 L80,80 L20,80 Z" />
                        <path fill="#9000EF" d="M50,20 L50,80 L52,80 L52,20 Z" />
                        <path fill="#ffffff" d="M30,35 L45,35 L45,40 L30,40 Z" />
                        <path fill="#ffffff" d="M55,35 L70,35 L70,40 L55,40 Z" />
                        <path fill="#ffffff" d="M30,50 L45,50 L45,55 L30,55 Z" />
                        <path fill="#ffffff" d="M55,50 L70,50 L70,55 L55,55 Z" />
                        <path fill="#ffffff" d="M30,65 L45,65 L45,70 L30,70 Z" />
                        <path fill="#ffffff" d="M55,65 L70,65 L70,70 L55,70 Z" />
                    </svg>

                    <!-- Icon bintang -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute top-10 right-20 w-12 h-12">
                        <path fill="#ffffff" d="M50,10 L61,35 L90,35 L65,50 L75,80 L50,65 L25,80 L35,50 L10,35 L39,35 Z" />
                    </svg>

                    <!-- Icon robot mainan -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute bottom-32 right-1/3 w-24 h-24">
                        <rect fill="#ffffff" x="30" y="20" width="40" height="30" rx="5"
                            ry="5" />
                        <rect fill="#ffffff" x="35" y="50" width="30" height="30" />
                        <rect fill="#ffffff" x="25" y="60" width="10" height="20" />
                        <rect fill="#ffffff" x="65" y="60" width="10" height="20" />
                        <circle fill="#9000EF" cx="40" cy="30" r="5" />
                        <circle fill="#9000EF" cx="60" cy="30" r="5" />
                        <rect fill="#9000EF" x="40" y="40" width="20" height="5" />
                    </svg>

                    <!-- Icon puzzle -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute top-1/2 right-10 w-16 h-16">
                        <path fill="#ffffff"
                            d="M25,25 L40,25 L40,40 L55,40 L55,25 L70,25 L70,40 L55,55 L70,55 L70,70 L55,70 L55,55 L40,55 L40,70 L25,70 L25,55 L40,40 L25,40 Z" />
                    </svg>

                    <!-- Icon anak melompat -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute bottom-40 left-1/3 w-20 h-20">
                        <circle fill="#ffffff" cx="50" cy="20" r="10" />
                        <path fill="#ffffff" d="M45,30 L55,30 L60,50 L40,50 Z" />
                        <path fill="#ffffff" d="M40,50 L30,80 L40,80 Z" />
                        <path fill="#ffffff" d="M60,50 L70,80 L60,80 Z" />
                        <path fill="#ffffff" d="M40,40 L20,45 L20,35 Z" />
                        <path fill="#ffffff" d="M60,40 L80,45 L80,35 Z" />
                    </svg>

                    <!-- Icon matahari -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute top-20 left-1/2 w-16 h-16">
                        <circle fill="#ffffff" cx="50" cy="50" r="20" />
                        <path fill="#ffffff"
                            d="M50,15 L50,5 M50,95 L50,85 M15,50 L5,50 M95,50 L85,50 M25,25 L18,18 M75,75 L82,82 M25,75 L18,82 M75,25 L82,18"
                            stroke="#ffffff" stroke-width="3" />
                    </svg>

                    <!-- Icon bola -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute bottom-20 right-20 w-14 h-14">
                        <circle fill="#ffffff" cx="50" cy="50" r="30" />
                        <path fill="none" stroke="#9000EF" stroke-width="2"
                            d="M20,50 L80,50 M50,20 L50,80 M30,30 L70,70 M30,70 L70,30" />
                    </svg>

                    <!-- Icon pesawat kertas -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute top-36 left-36 w-18 h-18">
                        <path fill="#ffffff" d="M10,40 L50,20 L90,40 L50,60 Z" />
                        <path fill="#ffffff" d="M50,60 L50,90 L40,75 L50,60 Z" />
                    </svg>

                    <!-- Icon rumah -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                        class="absolute top-2/3 left-2/3 w-20 h-20">
                        <path fill="#ffffff" d="M20,50 L50,20 L80,50 L80,90 L20,90 Z" />
                        <rect fill="#9000EF" x="45" y="60" width="10" height="30" />
                        <rect fill="#9000EF" x="30" y="70" width="10" height="10" />
                        <rect fill="#9000EF" x="60" y="70" width="10" height="10" />
                    </svg>
                </div>

                <!-- Gelombang sederhana di bagian atas -->
                <div class="absolute top-0 left-0 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none"
                        class="w-full" style="height: 60px;">
                        <path fill="#ffffff"
                            d="M0,32L60,42.7C120,53,240,75,360,69.3C480,64,600,32,720,21.3C840,11,960,21,1080,37.3C1200,53,1320,75,1380,85.3L1440,96L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
                        </path>
                    </svg>
                </div>

                <!-- Gelombang bertumpuk di bagian bawah seperti di referensi -->
                <div class="absolute bottom-0 left-0 w-full overflow-hidden" style="height: 200px;">
                    <!-- Gelombang 1 (paling belakang, paling terang) -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"
                        class="absolute w-full bottom-0" style="height: 200px; opacity: 0.3;">
                        <path fill="#ffffff"
                            d="M0,224L80,213.3C160,203,320,181,480,181.3C640,181,800,203,960,202.7C1120,203,1280,181,1360,170.7L1440,160L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
                        </path>
                    </svg>

                    <!-- Gelombang 2 (tengah) -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"
                        class="absolute w-full bottom-0" style="height: 170px; opacity: 0.4;">
                        <path fill="#ffffff"
                            d="M0,192L80,176C160,160,320,128,480,128C640,128,800,160,960,160C1120,160,1280,128,1360,112L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
                        </path>
                    </svg>

                    <!-- Gelombang 3 (paling depan) -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"
                        class="absolute w-full bottom-0" style="height: 140px; opacity: 0.5;">
                        <path fill="#ffffff"
                            d="M0,160L80,144C160,128,320,96,480,96C640,96,800,128,960,128C1120,128,1280,96,1360,80L1440,64L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
                        </path>
                    </svg>
                </div>
            </div>

            <div class="container mx-auto px-6 relative z-10">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-yellow-200 relative inline-block">
                        <i class="fas fa-images text-yellow-300 mr-2 animate-pulse-slow"></i>
                        Galeri Destinasi
                    </h2>
                    <p class="text-white mt-2">Keindahan dan keseruan di Nusantara Edupark</p>
                </div>

                <!-- Container untuk gambar-gambar gallery -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-20">
                    @forelse ($galleries as $gallery)
                        <div class="relative overflow-hidden rounded-lg group">
                            <img src="{{ asset('storage/' . $gallery->image) }}"
                                class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-500"
                                alt="{{ $gallery->title }}">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                                <span class="text-white font-medium"><i class="fas fa-image mr-2"></i>
                                    {{ $gallery->title }}</span>
                            </div>
                            <div
                                class="absolute top-2 right-2 bg-white rounded-full h-8 w-8 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fas fa-search-plus text-purple-600"></i>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-4 text-center py-12">
                            <div class="text-white bg-purple-800/50 rounded-lg p-6 inline-block">
                                <i class="fas fa-image text-4xl mb-3"></i>
                                <p>Belum ada foto galeri yang tersedia.</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                <div class="text-center mb-10">
                    <a href="{{ route('gallery') }}"
                        class="border-2 border-yellow-400 bg-yellow-300 text-purple-800 hover:bg-yellow-400 hover:border-yellow-500 font-semibold py-2 px-6 rounded-full transition-all transform hover:scale-105 flex items-center justify-center mx-auto w-max">
                        <i class="fas fa-images mr-2"></i> Lihat Semua Foto
                    </a>
                </div>
            </div>
        </section>

        <!-- Blog Section -->
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12">
                    <div>
                        <h2
                            class="text-3xl md:text-4xl font-bold text-gray-900 relative pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:h-1 after:w-16 after:bg-purple-900">
                            Blog Unggulan</h2>
                        <p class="text-gray-600 mt-3 text-lg">Artikel terbaru seputar edukasi</p>
                    </div>
                    <a href="#"
                        class="group flex items-center mt-4 md:mt-0 text-purple-900 font-semibold hover:text-purple-900 transition-all duration-300">
                        Semua Artikel
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($blogs as $blogItem)
                        <div
                            class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 group">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $blogItem->picture) }}"
                                    class="w-full h-56 object-cover object-center transform group-hover:scale-105 transition-transform duration-500"
                                    alt="{{ $blogItem->title }}">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="text-xs font-semibold text-purple-900 mb-2">
                                    {{ $blogItem->created_at->format('d M Y') }}
                                </div>
                                <h3
                                    class="text-xl font-bold text-gray-800 mb-3 group-hover:text-purple-900 transition-colors">
                                    {{ $blogItem->title }}
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                    {{ Str::limit($blogItem->content, 120) }}
                                </p>
                                <a href="{{ route('blogs.show', $blogItem->url) }}"
                                    class="inline-flex items-center text-purple-900 font-medium group-hover:text-purple-900 transition-colors">
                                    Baca Selengkapnya
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- Testimonials Section with Animated Ratings -->
        <section id="testimonials" class="py-16 bg-gray-50 relative overflow-hidden">
            <!-- Background decorative elements -->
            <div class="absolute top-10 left-10 text-6xl text-gray-200 opacity-20 transform -rotate-12">
                <i class="fas fa-quote-left"></i>
            </div>
            <div class="absolute bottom-10 right-10 text-6xl text-gray-200 opacity-20 transform rotate-12">
                <i class="fas fa-quote-right"></i>
            </div>


            <div class="container mx-auto px-6 relative z-10">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 relative inline-block">
                        <i class="fas fa-comments text-yellow-500 mr-2 animate-pulse-slow"></i>
                        Apa Kata Mereka?
                    </h2>
                    <p class="text-gray-600 mt-2">Pengalaman pengunjung di Nusantara Edupark</p>
                </div>



                <h3 class="text-2xl font-bold text-gray-800 mb-8 flex items-center">
                    <i class="fas fa-quote-left text-purple-500 mr-3"></i>
                    Testimonial Pengunjung
                </h3>

                <div id="testimonials-container" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Testimonial akan dirender melalui JavaScript -->
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all animate-pulse">
                        <div class="flex items-center mb-4">
                            <div class="text-yellow-400 flex">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-600 ml-2">5.0</span>
                        </div>
                        <div class="h-20 bg-gray-200 rounded mb-4"></div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-gray-300"></div>
                            <div class="ml-3">
                                <div class="h-5 bg-gray-200 rounded w-24"></div>
                                <div class="h-4 bg-gray-200 rounded w-16 mt-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all animate-pulse">
                        <div class="flex items-center mb-4">
                            <div class="text-yellow-400 flex">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-600 ml-2">4.5</span>
                        </div>
                        <div class="h-20 bg-gray-200 rounded mb-4"></div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-gray-300"></div>
                            <div class="ml-3">
                                <div class="h-5 bg-gray-200 rounded w-24"></div>
                                <div class="h-4 bg-gray-200 rounded w-16 mt-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all animate-pulse">
                        <div class="flex items-center mb-4">
                            <div class="text-yellow-400 flex">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-600 ml-2">5.0</span>
                        </div>
                        <div class="h-20 bg-gray-200 rounded mb-4"></div>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-gray-300"></div>
                            <div class="ml-3">
                                <div class="h-5 bg-gray-200 rounded w-24"></div>
                                <div class="h-4 bg-gray-200 rounded w-16 mt-1"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-8">

                    <a href="{{ route('testimonials.all') }}"
                        class="inline-flex items-center text-purple-700 font-medium hover:text-purple-900 transition-colors">
                        <span>Lihat Semua Testimonial</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Form Testimonial -->
            <div class="max-w-4xl mx-auto mb-16 mt-16">
                @include('review.formkomentar')
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Ambil testimonial dari API
                fetch('{{ route('api.testimonials') }}')

                    .then(response => response.json())
                    .then(data => {
                        // Kosongkan container untuk menghilangkan skeletons
                        const container = document.getElementById('testimonials-container');
                        container.innerHTML = '';

                        // Jika tidak ada testimonial yg disetujui, tampilkan placeholder
                        if (data.length === 0) {
                            const noData = document.createElement('div');
                            noData.className = 'col-span-3 text-center py-10';
                            noData.innerHTML = `

                                                                                                            <div class="text-gray-500">
                                                                                                                <i class="fas fa-comment-slash text-4xl mb-3"></i>
                                                                                                                <p>Belum ada testimonial. Jadilah yang pertama memberikan testimoni!</p>
                                                                                                            </div>
                                                                                                        `;

                            container.appendChild(noData);
                            return;
                        }


                        // Hanya tampilkan 3 testimonial terbaru
                        const latestThree = data.slice(0, 3);

                        // Render testimonial
                        latestThree.forEach(testimonial => {

                            // Buat elemen bintang berdasarkan rating
                            let starsHtml = '';
                            for (let i = 1; i <= 5; i++) {
                                if (i <= testimonial.rating) {
                                    starsHtml += '<i class="fas fa-star"></i>';
                                } else {
                                    starsHtml += '<i class="far fa-star"></i>';
                                }
                            }

                            // Tentukan foto profil (pakai default jika tidak ada)
                            let photoHtml = '';
                            if (testimonial.foto) {

                                photoHtml =
                                    `<img src="${window.location.origin}/storage/${testimonial.foto}" class="w-12 h-12 rounded-full object-cover" alt="${testimonial.nama}">`;
                            } else {
                                photoHtml = `
                                                                                                                <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                                                                                                                    <span class="text-lg font-medium text-purple-700">${testimonial.nama.charAt(0)}</span>
                                                                                                                </div>
                                                                                                            `;

                            }

                            // Buat card testimonial
                            const testimonialCard = document.createElement('div');

                            testimonialCard.className =
                                'bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all';
                            testimonialCard.innerHTML = `
                                                                                                            <div class="flex items-center mb-4">
                                                                                                                <div class="text-yellow-400 flex">
                                                                                                                    ${starsHtml}
                                                                                                                </div>
                                                                                                                <span class="text-gray-600 ml-2">${testimonial.rating}.0</span>
                                                                                                            </div>
                                                                                                            <p class="text-gray-600 mb-4">"${testimonial.pesan}"</p>
                                                                                                            <div class="flex items-center">
                                                                                                                ${photoHtml}
                                                                                                                <div class="ml-3">
                                                                                                                    <h4 class="font-semibold text-gray-800">${testimonial.nama}</h4>
                                                                                                                    <p class="text-gray-600 text-sm">${testimonial.kota || 'Pengunjung'}</p>
                                                                                                                </div>
                                                                                                                <div class="ml-auto text-xs text-gray-400">
                                                                                                                    ${new Date(testimonial.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })}
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        `;


                            container.appendChild(testimonialCard);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching testimonials:', error);
                        const container = document.getElementById('testimonials-container');

                        container.innerHTML =
                            '<div class="col-span-3 text-center py-8 text-red-500">Gagal memuat testimonial</div>';

                    });
            });
        </script>




        <script>
            function validateCaptcha() {
                // Memeriksa apakah reCAPTCHA terisi
                var response = grecaptcha.getResponse();
                if (response.length == 0) {
                    alert("Harap centang CAPTCHA terlebih dahulu.");
                    return false; // Menjaga form tidak dikirim jika CAPTCHA tidak dicentang
                }
                return true; // Mengirimkan form jika CAPTCHA terisi
            }
        </script>

        </main>
        {{-- <!-- CTA Section -->
        <section class="py-20"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'); background-size: cover; background-position: center;">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Siap Untuk Petualangan Edukatif?</h2>
                <p class="text-xl text-white mb-8 max-w-2xl mx-auto">Jadikan liburan keluarga Anda lebih bermakna
                    dengan
                    pengalaman wisata edukatif yang menyenangkan di Nusantara Edupark.</p>
                <a href="#"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-full text-lg transition-all inline-block">
                    Booking Sekarang
                </a>
            </div>
        </section> --}}
    @endsection

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    {{--
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".heroSwiper", {
            loop: true,
            autoplay: {
                delay: 1000,
                disableOnInteraction: false,
            },
            effect: 'fade',
            speed: 1000,
        });
    </script> --}}
</body>
