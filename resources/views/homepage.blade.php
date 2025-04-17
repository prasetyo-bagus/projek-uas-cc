@extends('layouts.guest')

<body class="bg-gray-50">
    @section('content')
        <!-- Hero Section -->
        {{-- <section class="hero-section flex items-center justify-center">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg">Nusantara Edupark</h1>
                <p class="text-xl md:text-2xl text-white mb-8 drop-shadow-md">Wisata Edukasi Pertanian, Peternakan, dan
                    Perkebunan</p>
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
        </section> --}}

        <section class="hero-section flex items-center justify-center bg-cover bg-center"
            style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('storage/' . $banner->image) }}'); height: 80vh;">
            <div class="container mx-auto px-6 text-center">
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
                    <a href="#"
                        class="text-green-600 hover:text-green-700 font-semibold transition-all flex items-center group">
                        Lihat Semua <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div
                        class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 group">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-700"
                                alt="Agro Edukasi">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
                                <p class="text-white px-4 pb-4 font-medium">
                                    <i class="fas fa-camera mr-2"></i> 12+ aktivitas seru
                                </p>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-3">
                                <span
                                    class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                                    <i class="fas fa-crown text-yellow-500 mr-1"></i> Bestseller
                                </span>
                                <span class="text-gray-600"><i class="fas fa-clock mr-1"></i> 1 Hari</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Paket Agro Edukasi</h3>
                            <p class="text-gray-600 mb-4">Mengenal berbagai tanaman, cara menanam dan merawatnya dengan
                                metode organik.</p>
                            <div class="flex justify-between items-center">
                                <p class="text-green-600 font-bold flex items-center">
                                    <i class="fas fa-tag mr-1"></i> Rp 150.000/orang
                                </p>
                                <a href="#"
                                    class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-colors flex items-center">
                                    <i class="fas fa-ticket-alt mr-1"></i> Pesan
                                </a>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 group">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1500595046743-cd271d694e30?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-700"
                                alt="Peternakan Seru">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
                                <p class="text-white px-4 pb-4 font-medium">
                                    <i class="fas fa-camera mr-2"></i> 15+ aktivitas seru
                                </p>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-3">
                                <span
                                    class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                                    <i class="fas fa-users mr-1"></i> Keluarga
                                </span>
                                <span class="text-gray-600"><i class="fas fa-clock mr-1"></i> 1 Hari</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Peternakan Seru</h3>
                            <p class="text-gray-600 mb-4">Berinteraksi dengan hewan ternak dan belajar proses pengolahan
                                hasil peternakan.</p>
                            <div class="flex justify-between items-center">
                                <p class="text-green-600 font-bold flex items-center">
                                    <i class="fas fa-tag mr-1"></i> Rp 180.000/orang
                                </p>
                                <a href="#"
                                    class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-colors flex items-center">
                                    <i class="fas fa-ticket-alt mr-1"></i> Pesan
                                </a>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 group">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                class="w-full h-60 object-cover group-hover:scale-110 transition-transform duration-700"
                                alt="Paket Lengkap">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
                                <p class="text-white px-4 pb-4 font-medium">
                                    <i class="fas fa-camera mr-2"></i> 20+ aktivitas seru
                                </p>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-3">
                                <span
                                    class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                                    <i class="fas fa-percentage mr-1"></i> Hemat
                                </span>
                                <span class="text-gray-600"><i class="fas fa-clock mr-1"></i> 2 Hari</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Paket Lengkap</h3>
                            <p class="text-gray-600 mb-4">Gabungan edukasi pertanian, peternakan, dan perkebunan dalam satu
                                paket lengkap.</p>
                            <div class="flex justify-between items-center">
                                <p class="text-green-600 font-bold flex items-center">
                                    <i class="fas fa-tag mr-1"></i> Rp 300.000/orang
                                </p>
                                <a href="#"
                                    class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-colors flex items-center">
                                    <i class="fas fa-ticket-alt mr-1"></i> Pesan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Section with Fun Interactive Elements -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 relative inline-block">
                        <i class="fas fa-images text-purple-500 mr-2 animate-pulse-slow"></i>
                        Galeri Destinasi
                    </h2>
                    <p class="text-gray-600 mt-2">Keindahan dan keseruan di Nusantara Edupark</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="relative overflow-hidden rounded-lg group">
                        <img src="https://images.unsplash.com/photo-1487874744939-d2c0a128fea1?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-500"
                            alt="Gallery 1">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                            <span class="text-white font-medium"><i class="fas fa-tractor mr-2"></i> Area Pertanian</span>
                        </div>
                        <div
                            class="absolute top-2 right-2 bg-white rounded-full h-8 w-8 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fas fa-search-plus text-purple-600"></i>
                        </div>
                    </div>

                    <div class="relative overflow-hidden rounded-lg group">
                        <img src="https://images.unsplash.com/photo-1500268732869-c341057e081f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-500"
                            alt="Gallery 2">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                            <span class="text-white font-medium"><i class="fas fa-leaf mr-2"></i> Kebun Edukasi</span>
                        </div>
                        <div
                            class="absolute top-2 right-2 bg-white rounded-full h-8 w-8 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fas fa-search-plus text-blue-600"></i>
                        </div>
                    </div>

                    <div class="relative overflow-hidden rounded-lg group">
                        <img src="https://images.unsplash.com/photo-1550304943-4f24f54ddde9?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-500"
                            alt="Gallery 3">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-green-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                            <span class="text-white font-medium"><i class="fas fa-horse mr-2"></i> Area Peternakan</span>
                        </div>
                        <div
                            class="absolute top-2 right-2 bg-white rounded-full h-8 w-8 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fas fa-search-plus text-green-600"></i>
                        </div>
                    </div>

                    <div class="relative overflow-hidden rounded-lg group">
                        <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                            class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-500"
                            alt="Gallery 4">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-orange-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                            <span class="text-white font-medium"><i class="fas fa-seedling mr-2"></i> Kebun Buah</span>
                        </div>
                        <div
                            class="absolute top-2 right-2 bg-white rounded-full h-8 w-8 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fas fa-search-plus text-orange-600"></i>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-8">
                    <a href="#"
                        class="border-2 border-green-600 text-green-600 hover:bg-green-600 hover:text-white font-semibold py-2 px-6 rounded-full transition-all transform hover:scale-105 flex items-center justify-center mx-auto w-max">
                        <i class="fas fa-images mr-2"></i> Lihat Semua Foto
                    </a>
                </div>
            </div>
        </section>

        <!-- Testimonials Section with Animated Ratings -->
        <section class="py-16 bg-gray-50 relative overflow-hidden">
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
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all">
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
                        <p class="text-gray-600 mb-4">"Pengalaman yang luar biasa bagi anak-anak kami. Mereka bisa belajar
                            tentang pertanian sambil bermain. Sangat direkomendasikan untuk liburan keluarga!"</p>
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/women/12.jpg" class="w-12 h-12 rounded-full"
                                alt="User">
                            <div class="ml-3">
                                <h4 class="font-semibold text-gray-800">Sinta Dewi</h4>
                                <p class="text-gray-600 text-sm">Jakarta</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all">
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
                        <p class="text-gray-600 mb-4">"Pemandu wisatanya sangat ramah dan menjelaskan dengan detail.
                            Kegiatan memerah susu sapi menjadi favorit anak-anak. Pasti akan berkunjung lagi!"</p>
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-12 h-12 rounded-full"
                                alt="User">
                            <div class="ml-3">
                                <h4 class="font-semibold text-gray-800">Budi Santoso</h4>
                                <p class="text-gray-600 text-sm">Bandung</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all">
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
                        <p class="text-gray-600 mb-4">"Tempatnya bersih dan tertata dengan baik. Anak-anak sekolah kami
                            sangat antusias dengan semua kegiatan. Paket edukasi yang ditawarkan sangat informatif."</p>
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/women/65.jpg" class="w-12 h-12 rounded-full"
                                alt="User">
                            <div class="ml-3">
                                <h4 class="font-semibold text-gray-800">Rina Wijaya</h4>
                                <p class="text-gray-600 text-sm">Surabaya</p>
                            </div>
                        </div>
                    </div>
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
                        <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 group">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $blogItem->picture) }}"
                                    class="w-full h-56 object-cover object-center transform group-hover:scale-105 transition-transform duration-500"
                                    alt="{{ $blogItem->title }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            <div class="p-6">
                                <div class="text-xs font-semibold text-purple-900 mb-2">
                                    {{ $blogItem->created_at->format('d M Y') }}</div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-purple-900 transition-colors">
                                    {{ $blogItem->title }}
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ Str::limit($blogItem->content, 120) }}</p>
                                <a href="{{ route('blogs.show', $blogItem->url) }}"
                                    class="inline-flex items-center text-purple-900 font-medium group-hover:text-purple-900 transition-colors">
                                    Baca Selengkapnya
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 ml-1 transform group-hover:translate-x-1 transition-transform duration-300"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
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