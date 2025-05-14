@extends('layouts.guest')

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
                        <path d="M0 4C40 0 60 8 100 4C140 0 160 8 200 4" fill="none" stroke="currentColor" stroke-width="4"
                            stroke-linecap="round"></path>
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
        <!-- Background Elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-purple-50 to-gray-50 opacity-50"></div>
        <div
            class="absolute top-0 right-0 w-32 h-32 bg-yellow-200 rounded-full opacity-30 transform -translate-y-1/2 translate-x-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-48 h-48 bg-green-200 rounded-full opacity-30 transform translate-y-1/2 -translate-x-1/2">
        </div>

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
                        <span class="relative z-10">Paket Wisata</span>
                        <svg class="absolute -bottom-2 left-0 w-full h-3 text-yellow-300 z-0" viewBox="0 0 200 8">
                            <path d="M0 4C40 0 60 8 100 4C140 0 160 8 200 4" fill="none" stroke="currentColor"
                                stroke-width="4" stroke-linecap="round"></path>
                        </svg>
                    </h2>
                    <p class="text-gray-600 mt-2">Pilihan paket wisata edukatif</p>
                </div>
                <a href="{{ route('packets') }}"
                    class="text-purple-700 hover:text-purple-900 font-semibold transition-all flex items-center group bg-white py-2 px-4 rounded-lg shadow-sm hover:shadow-md">
                    Lihat Semua <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($packets as $packet)
                    <div
                        class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 group relative">
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ asset('storage/' . $packet->image) }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                alt="{{ $packet->title }}">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
                                <div class="w-full flex justify-between items-center px-4 pb-3">
                                    <p class="text-white font-medium">
                                        <i class="fas fa-camera mr-2"></i> Paket Wisata
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 pb-12">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $packet->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $packet->description }}</p>

                            <div class="space-y-2 mb-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-users text-purple-600 mr-2"></i>
                                    {{ $packet->capacity ?: 'Kapasitas sesuai paket' }}
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-clock text-purple-600 mr-2"></i>
                                    {{ $packet->duration ?: 'Durasi bervariasi' }}
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-tag text-purple-600 mr-2"></i>
                                    {{ $packet->price ?: 'Hubungi kami untuk info harga' }}
                                </div>
                            </div>

                            <div class="absolute bottom-4 right-6">
                                <a href="{{ route('packets') }}#contact-packet"
                                    class="inline-block bg-purple-700 hover:bg-purple-800 text-white font-medium py-2 px-4 rounded-lg transition-colors">
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
                                <!-- <span
                                    class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                                    <i class="fas fa-check-circle text-green-600 mr-1"></i> Tersedia
                                </span> -->
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $facility->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $facility->description }}</p>
                            @if ($facility->detail)
                                <div class="flex justify-end">
                                    <a href="javascript:void(0)" onclick="openDetailModal('{{ $facility->title }}', '{{ addslashes($facility->description) }}', '{{ addslashes($facility->detail) }}', '{{ asset('storage/' . $facility->image) }}')"
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

    <!-- Modal Detail Fasilitas -->
    <div id="facility-detail-modal"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-opacity duration-300">
        <div id="facility-modal-box"
            class="bg-white p-6 rounded-xl shadow-2xl w-full max-w-3xl mx-auto transform scale-95 opacity-0 transition-all duration-300 max-h-[90vh] overflow-y-auto">
            
            <div class="flex justify-between items-start mb-4">
                <h2 id="facility-title" class="text-2xl font-bold text-gray-800"></h2>
                <button onclick="closeDetailModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div class="overflow-hidden rounded-lg">
                    <img id="facility-image" src="" alt="Gambar Fasilitas" class="w-full h-auto object-cover rounded-lg hover:scale-105 transition-transform duration-500">
                </div>
                <div>
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Deskripsi:</h3>
                        <p id="facility-description" class="text-gray-600"></p>
                    </div>
                    
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <h3 class="font-semibold mb-2 text-purple-700">Detail Fasilitas:</h3>
                        <div id="facility-detail" class="prose max-w-none text-gray-700"></div>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end">
                <button onclick="closeDetailModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        function openDetailModal(title, description, detail, imageUrl) {
            const modal = document.getElementById('facility-detail-modal');
            const box = document.getElementById('facility-modal-box');
            
            document.getElementById('facility-title').textContent = title;
            document.getElementById('facility-description').textContent = description;
            document.getElementById('facility-detail').innerHTML = detail;
            document.getElementById('facility-image').src = imageUrl;
            document.getElementById('facility-image').alt = title;
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                box.classList.remove('scale-95', 'opacity-0');
                box.classList.add('scale-100', 'opacity-100');
            }, 10);
        }
        
        function closeDetailModal() {
            const modal = document.getElementById('facility-detail-modal');
            const box = document.getElementById('facility-modal-box');
            
            box.classList.remove('scale-100', 'opacity-100');
            box.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>

    <!-- Gallery Section with Fun Interactive Elements -->
    <section class="py-16 relative overflow-hidden">
        <!-- Background dengan bentuk gelombang -->
        <div class="absolute inset-0">
            <!-- Warna dasar sesuai permintaan: rgb(144, 0, 239) -->
            <div class="absolute inset-0" style="background-color: rgb(144, 0, 239);"></div>

            <!-- Icon anak-anak yang transparan di background (dihapus untuk mengurangi beban) -->

            <!-- Gelombang sederhana di bagian atas -->
            <div class="absolute top-0 left-0 w-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none" class="w-full"
                    style="height: 60px;">
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
                @forelse ($galleries->take(8) as $gallery)
                    <div class="relative overflow-hidden rounded-lg group cursor-pointer" onclick="openGalleryModal('{{ asset('storage/' . $gallery->image) }}', '{{ $gallery->title }}', '{{ addslashes($gallery->description ?? '') }}')">
                        <img src="{{ asset('storage/' . $gallery->image) }}"
                            class="w-full h-48 object-cover group-hover:scale-110 transition-all duration-500"
                            alt="{{ $gallery->title }}">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-4">
                            <span class="text-white font-medium"><i class="fas fa-image mr-2"></i>
                                {{ $gallery->title }}</span>
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

    <!-- Modal Galeri -->
    <div id="gallery-modal"
        class="fixed inset-0 bg-black bg-opacity-80 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-opacity duration-300">
        <div id="gallery-modal-box"
            class="bg-transparent w-full max-w-5xl mx-auto transform scale-95 opacity-0 transition-all duration-300">
            
            <div class="relative">
                <button onclick="closeGalleryModal()" class="absolute -top-10 right-0 text-white hover:text-gray-300 transition-colors">
                    <i class="fas fa-times text-2xl"></i>
                </button>
                
                <div class="flex flex-col">
                    <!-- Gambar -->
                    <div class="overflow-hidden rounded-lg bg-black flex items-center justify-center">
                        <img id="gallery-image" src="" alt="" class="max-h-[70vh] max-w-full object-contain">
                    </div>
                    
                    <!-- Caption -->
                    <div class="bg-white p-4 rounded-b-lg">
                        <h3 id="gallery-title" class="text-xl font-bold text-gray-800 mb-2"></h3>
                        <p id="gallery-description" class="text-gray-600"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openGalleryModal(imageUrl, title, description) {
            const modal = document.getElementById('gallery-modal');
            const box = document.getElementById('gallery-modal-box');
            
            document.getElementById('gallery-image').src = imageUrl;
            document.getElementById('gallery-image').alt = title;
            document.getElementById('gallery-title').textContent = title;
            document.getElementById('gallery-description').textContent = description || 'Tidak ada deskripsi';
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                box.classList.remove('scale-95', 'opacity-0');
                box.classList.add('scale-100', 'opacity-100');
            }, 10);
            
            // Mencegah scrolling pada body ketika modal terbuka
            document.body.style.overflow = 'hidden';
        }
        
        function closeGalleryModal() {
            const modal = document.getElementById('gallery-modal');
            const box = document.getElementById('gallery-modal-box');
            
            box.classList.remove('scale-100', 'opacity-100');
            box.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
                // Mengaktifkan kembali scrolling pada body
                document.body.style.overflow = 'auto';
            }, 300);
        }
        
        // Menambahkan keyboard listener untuk menutup dengan tombol ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeGalleryModal();
                closeDetailModal();
            }
        });
    </script>

    <!-- Blog Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12">
                <div>
                    <h2
                        class="text-3xl md:text-4xl font-bold text-gray-900 relative pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:h-1 after:w-16 after:bg-purple-900">
                        Berita Pilihan</h2>
                    <p class="text-gray-600 mt-3 text-lg">Berita Pilihan di Nusantara Edupark</p>
                </div>
                <a href="/news"
                    class="group flex items-center mt-4 md:mt-0 text-purple-900 font-semibold hover:text-purple-900 transition-all duration-300">
                    Semua Berita
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
                            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-purple-900 transition-colors">
                                {{ Str::words($blogItem->title, 12) }}
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
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
        document.addEventListener('DOMContentLoaded', function () {
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
@endsection