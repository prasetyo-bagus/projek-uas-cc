@extends('layouts.guest')

<body class="bg-gray-50">
    @section('content')
        <!-- Hero Section -->
        <section class="hero-section flex items-center justify-center">
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
        </section>


        <section class="py-16 bg-white relative overflow-hidden">
            <!-- Background Decorative Elements -->
            <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-300 rounded-full opacity-50 transform -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-green-300 rounded-full opacity-50 transform translate-y-1/2 -translate-x-1/2"></div>
            <div class="absolute top-1/3 left-1/4 w-16 h-16 bg-pink-300 rounded-full opacity-40"></div>
            <div class="absolute bottom-1/3 right-1/4 w-24 h-24 bg-blue-300 rounded-full opacity-40"></div>

            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-pink-600 relative inline-block">
                        <span class="relative z-10">Petualangan Belajar yang Seru</span>
                        <svg class="absolute -bottom-2 left-0 w-full h-3 text-yellow-300 z-0" viewBox="0 0 200 8">
                            <path d="M0 4C40 0 60 8 100 4C140 0 160 8 200 4" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round"></path>
                        </svg>
                    </h2>
                    <p class="text-purple-600 mt-4 font-semibold">Nikmati beragam aktivitas menarik dan bermanfaat</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all text-center transform hover:-translate-y-2 hover:rotate-1 group border-2 border-green-300">
                        <div class="bg-green-200 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all border-4 border-green-300">
                            <i class="fas fa-seedling text-green-600 text-4xl group-hover:animate-bounce-slow"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-green-700 mb-2">Petualangan Bertani</h3>
                        <p class="text-green-600 font-medium">Tanam bibit, siram tanaman, dan panen hasil kebun! Jadi petani cilik yang hebat bersama teman-teman!</p>
                        <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fas fa-arrow-circle-right text-green-500 text-2xl"></i>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all text-center transform hover:-translate-y-2 hover:rotate-1 group border-2 border-orange-300">
                        <div class="bg-orange-200 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all border-4 border-orange-300">
                            <i class="fas fa-horse text-orange-600 text-4xl group-hover:animate-bounce-slow"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-orange-700 mb-2">Sahabat Hewan</h3>
                        <p class="text-orange-600 font-medium">Bermain dan belajar bersama hewan-hewan lucu! Beri makan kelinci, perah susu sapi, dan kumpulkan telur ayam!</p>
                        <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fas fa-arrow-circle-right text-orange-500 text-2xl"></i>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all text-center transform hover:-translate-y-2 hover:rotate-1 group border-2 border-blue-300">
                        <div class="bg-blue-200 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-all border-4 border-blue-300">
                            <i class="fas fa-tree text-blue-600 text-4xl group-hover:animate-bounce-slow"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-blue-700 mb-2">Taman Pohon Ajaib</h3>
                        <p class="text-blue-600 font-medium">Jelajahi kebun buah dan sayur raksasa! Lihat bagaimana tanaman tumbuh dan berubah menjadi makanan lezat!</p>
                        <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="fas fa-arrow-circle-right text-blue-500 text-2xl"></i>
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
                                    class="text-white bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-lg transition-colors flex items-center">
                                    <i class="fas fa-ticket-alt mr-1"></i> Pesan
                                </a>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 group">
                        <div class="relative overflow-hidden">
                            <img src="https://i.ytimg.com/vi/xT6tpI38XOA/maxresdefault.jpg?sqp=-oaymwEmCIAKENAF8quKqQMa8AEB-AH-CYAC0AWKAgwIABABGGMgZShKMA8=&rs=AOn4CLAg9r7NuknVhJs_Re7LcaJ5UEq5-Q"
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
                                    class="text-white bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-lg transition-colors flex items-center">
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
                                    class="text-white bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-lg transition-colors flex items-center">
                                    <i class="fas fa-ticket-alt mr-1"></i> Pesan
                                </a>
                            </div>
                        </div>
                    </div>
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
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="absolute w-full h-full">
                <path fill="#fff" d="M0,128L48,133.3C96,139,192,149,288,149.3C384,149,480,139,576,144C672,149,768,171,864,165.3C960,160,1056,128,1152,122.7C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>

        <!-- Gelombang bawah seperti referensi -->
        <div class="absolute bottom-0 left-0 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none" class="w-full" style="height: 60px;">
                <path fill="#ffffff" d="M0,32L60,42.7C120,53,240,75,360,69.3C480,64,600,32,720,21.3C840,11,960,21,1080,37.3C1200,53,1320,75,1380,85.3L1440,96L1440,120L1380,120C1320,120,1200,120,1080,120C960,120,840,120,720,120C600,120,480,120,360,120C240,120,120,120,60,120L0,120Z"></path>
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
            <div class="relative overflow-hidden rounded-lg group">
                <img src="https://bob.kemenparekraf.go.id/wp-content/uploads/2021/05/56556048_2254883347901748_7825172382198834738_n.jpg"
                    class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-500" alt="Gallery 1">
                <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                    <span class="text-white font-medium"><i class="fas fa-tractor mr-2"></i> Area Pertanian</span>
                </div>
                <div class="absolute top-2 right-2 bg-white rounded-full h-8 w-8 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fas fa-search-plus text-purple-600"></i>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-lg group">
                <img src="https://sentulfresh.com/wp-content/uploads/2016/01/wei.jpg"
                    class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-500" alt="Gallery 2">
                <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                    <span class="text-white font-medium"><i class="fas fa-leaf mr-2"></i> Kebun Edukasi</span>
                </div>
                <div class="absolute top-2 right-2 bg-white rounded-full h-8 w-8 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fas fa-search-plus text-blue-600"></i>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-lg group">
                <img src="https://cdn.idntimes.com/content-images/post/20240120/snapinstaapp-13707056-156168484806757-1065501168-n-1080-5988a86a9617547c61ca519636de6f0b.jpg"
                    class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-500" alt="Gallery 3">
                <div class="absolute inset-0 bg-gradient-to-t from-green-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                    <span class="text-white font-medium"><i class="fas fa-horse mr-2"></i> Area Peternakan</span>
                </div>
                <div class="absolute top-2 right-2 bg-white rounded-full h-8 w-8 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fas fa-search-plus text-green-600"></i>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-lg group">
                <img src="https://kampungcoklat.id/wp-content/uploads/2023/01/Paket-Edukasi-A.png"
                    class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-500" alt="Gallery 4">
                <div class="absolute inset-0 bg-gradient-to-t from-orange-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                    <span class="text-white font-medium"><i class="fas fa-seedling mr-2"></i> Kebun Buah</span>
                </div>
                <div class="absolute top-2 right-2 bg-white rounded-full h-8 w-8 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fas fa-search-plus text-orange-600"></i>
                </div>
            </div>
        </div>

        <div class="text-center mb-10">
            <a href="#"
                class="inline-block border-2 border-yellow-400 bg-yellow-300 text-purple-800 hover:bg-yellow-400 hover:border-yellow-500 font-semibold py-2 px-6 rounded-full transition-all transform hover:scale-105 flex items-center justify-center mx-auto w-max">
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

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
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
                                <h3
                                    class="text-xl font-bold text-gray-800 mb-3 group-hover:text-purple-900 transition-colors">
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
