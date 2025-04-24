@extends('navbar.guestnavbar')

<body class="bg-gray-50">
    @section('content')
        <!-- Hero Section -->
        {{-- <section class="hero-section flex items-center justify-center">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg">Nusantara Edupark</h1>
                <p class="text-xl md:text-2xl text-white mb-8 drop-shadow-md">Wisata Edukasi Pertanian, Peternakan, dan
                    Perkebunan</p>
                <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
                    <!-- <a href="#"
                        class="bg-purple-900 hover:bg-purple-600 text-white font-semibold py-3 px-8 rounded-full transition-all">
                        Jelajahi Sekarang
                    </a> -->
                    <!-- <a href="#"
                        class="bg-white hover:bg-gray-100 text-purple-900 font-semibold py-3 px-8 rounded-full transition-all">
                        Lihat Paket Wisata
                    </a> -->
                </div>
            </div>
        </section> --}}

        {{-- <section class="hero-section flex items-center justify-center bg-cover bg-center"
            style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                                url('{{ optional($banner)->image ? asset('storage/' . $banner->image) : asset('default_images/defaultbanner.png') }}'); height: 80vh;">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg">
                    {{ $banner->title ?? 'Nusantara Edupark' }}
                </h1>
                <p class="text-xl md:text-2xl text-white mb-8 drop-shadow-md">
                    {{ $banner->description ?? 'Wisata Edukasi Pertanian, Peternakan, dan Perkebunan' }}
                </p>
                <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
                    <!-- <a href="#"
                        class="bg-purple-900 hover:bg-purple-600 text-white font-semibold py-3 px-8 rounded-full transition-all">
                        Jelajahi Sekarang
                    </a>
                    <a href="#"
                        class="bg-white hover:bg-gray-100 text-purple-900 font-semibold py-3 px-8 rounded-full transition-all">
                        Lihat Paket Wisata
                    </a> -->
                </div>
            </div>
        </section> --}}


        <div class="swiper heroSwiper w-full h-[80vh] relative">
            <div class="swiper-wrapper w-full h-full">
                @foreach($banners as $banner)
                    <div class="swiper-slide w-full h-full bg-cover bg-center flex"
                        style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('{{ $banner->image ? asset('storage/' . $banner->image) : asset('default_images/defaultbanner.pn') }}');">

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
                                    <a href="#"
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
            document.addEventListener("DOMContentLoaded", function () {
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
                            <i class="fas fa-arrow-circle-right text-green-500"></i>
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
                            <i class="fas fa-arrow-circle-right text-orange-500"></i>
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
                            <i class="fas fa-arrow-circle-right text-blue-500"></i>
                        </div>
                    </div>
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
                            @if($facility->detail)
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
        <!-- Gallery Section with Wavy Background -->
        <section class="py-16 relative overflow-hidden">
            <!-- Background dengan bentuk bergelombang seperti referensi -->
            <div class="absolute inset-0">
                <!-- Warna dasar sesuai permintaan: rgb(220, 160, 109) -->
                <div class="absolute inset-0" style="background-color: rgb(144, 0, 239);"></div>

                <!-- Lapisan gelombang atas untuk tekstur -->
                <div class="absolute inset-0 opacity-20">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"
                        class="absolute w-full h-full">
                        <path fill="#fff"
                            d="M0,128L48,133.3C96,139,192,149,288,149.3C384,149,480,139,576,144C672,149,768,171,864,165.3C960,160,1056,128,1152,122.7C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                        </path>
                    </svg>
                </div>

                <!-- Gelombang bawah seperti referensi -->
                <div class="absolute bottom-0 left-0 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none" class="w-full"
                        style="height: 60px;">
                        <path fill="#ffffff"
                            d="M0,32L60,42.7C120,53,240,75,360,69.3C480,64,600,32,720,21.3C840,11,960,21,1080,37.3C1200,53,1320,75,1380,85.3L1440,96L1440,120L1380,120C1320,120,1200,120,1080,120C960,120,840,120,720,120C600,120,480,120,360,120C240,120,120,120,60,120L0,120Z">
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
                            <span class="text-white font-medium"><i class="fas fa-image mr-2"></i> {{ $gallery->title }}</span>
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
                        class="inline-block border-2 border-yellow-400 bg-yellow-300 text-purple-800 hover:bg-yellow-400 hover:border-yellow-500 font-semibold py-2 px-6 rounded-full transition-all transform hover:scale-105 flex items-center justify-center mx-auto w-max">
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

                {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($blog as $blog)
                    <div
                        class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 group">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $blog->picture) }}"
                                class="w-full h-56 object-cover object-center transform group-hover:scale-105 transition-transform duration-500"
                                alt="{{ $blog->title }}">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="text-xs font-semibold text-purple-900 mb-2">
                                {{ $blog->created_at->format('d M Y') }}</div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-purple-900 transition-colors">
                                {{ $blog->title }}</h3>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ Str::limit($blog->content, 120) }}
                            </p>
                            <a href="{{ route('blogs.show', $blog->url) }}"
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
                </div> --}}
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
                                    {{ $blogItem->created_at->format('d M Y') }}</div>
                                <h3
                                    class="text-xl font-bold text-gray-800 mb-3 group-hover:text-purple-900 transition-colors">
                                    {{ $blogItem->title }}
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                    {{ Str::limit($blogItem->content, 120) }}</p>
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
                    <a href="#"
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
            document.addEventListener('DOMContentLoaded', function () {
                // Ambil testimonial dari API
                fetch('{{ route("api.testimonials") }}')
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

                        // Render testimonial
                        data.forEach(testimonial => {
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
                                photoHtml = `<img src="${window.location.origin}/storage/${testimonial.foto}" class="w-12 h-12 rounded-full object-cover" alt="${testimonial.nama}">`;
                            } else {
                                photoHtml = `
                                                        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                                                            <span class="text-lg font-medium text-purple-700">${testimonial.nama.charAt(0)}</span>
                                                        </div>
                                                    `;
                            }

                            // Buat card testimonial
                            const testimonialCard = document.createElement('div');
                            testimonialCard.className = 'bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all';
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
                        container.innerHTML = '<div class="col-span-3 text-center py-8 text-red-500">Gagal memuat testimonial</div>';
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