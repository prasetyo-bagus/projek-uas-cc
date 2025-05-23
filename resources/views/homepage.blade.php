@extends('layouts.guest')

@section('content')
    <style>
        /* Tooltip Style */
        .tooltip-container {
            position: relative;
        }

        .tooltip-text {
            visibility: hidden;
            width: auto;
            min-width: 100px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 8px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 12px;
            white-space: nowrap;
        }

        .tooltip-text::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: rgba(0, 0, 0, 0.8) transparent transparent transparent;
        }

        .tooltip-container:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }

        /* Hero Section Enhancements */
        .hero-section {
            position: relative;
            overflow: hidden;
        }

        .hero-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 2;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 1s ease-out;
            font-size: 90%;
        }

        .hero-description {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 1.2s ease-out;
            font-size: 90%;
        }

        .hero-buttons {
            animation: fadeInUp 1.4s ease-out;
            transform: scale(0.95);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .swiper-slide-active .hero-overlay {
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>

    <div class="hero-section">
        <div class="swiper heroSwiper w-full h-[65vh] md:h-[80vh] relative">
            <div class="swiper-wrapper w-full h-full">
                @foreach ($banners as $banner)
                    <div class="swiper-slide w-full aspect-video md:h-[70vh] bg-center bg-cover flex lazy-slide"
                        data-bg="{{ $banner->image ? asset('storage/' . $banner->image) : asset('default_images/defaultbanner.png') }}">

                        <div
                            class="hero-overlay flex flex-col justify-end items-center text-center w-full min-h-full px-6 pb-16 md:pb-24 bg-gradient-to-b from-black/10 via-black/20 to-black/50">
                            <div class="container mx-auto hero-content">
                                <h1 class="hero-title text-2xl md:text-5xl font-bold text-white mb-3">
                                    {{ $banner->title ?? 'Nusantara Edupark' }}
                                </h1>
                                <p class="hero-description text-base md:text-xl text-white mb-6 drop-shadow-md">
                                    {{ $banner->description ?? 'Wisata Edukasi Pertanian, Peternakan, dan Perkebunan' }}
                                </p>
                                <div
                                    class="hero-buttons flex flex-col md:flex-row justify-center space-y-3 md:space-y-0 md:space-x-3">
                                    <a href="{{ route('packets') }}"
                                        class="bg-purple-800 hover:bg-purple-700 text-white px-5 py-2.5 rounded-full font-medium transition-all transform hover:scale-105 inline-flex items-center justify-center">
                                        <i class="fas fa-ticket-alt mr-2"></i> Lihat Paket Wisata
                                    </a>
                                    <a href="{{ route('gallery') }}"
                                        class="bg-white/30 backdrop-blur-sm hover:bg-white/40 text-white border border-white/50 px-5 py-2.5 rounded-full font-medium transition-all transform hover:scale-105 inline-flex items-center justify-center">
                                        <i class="fas fa-images mr-2"></i> Galeri
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Tambahkan area klik untuk banner -->
                        <div class="absolute inset-0 cursor-pointer"
                            onclick="openBannerModal('{{ $banner->image ? asset('storage/' . $banner->image) : asset('default_images/defaultbanner.png') }}', '{{ $banner->title ?? 'Nusantara Edupark' }}')">
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- swiper pagination -->
            <div class="swiper-pagination"></div>
        </div>

        <!-- Wave/Curved shape at the bottom -->
        {{-- <div class="hero-wave">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none" class="w-full h-[60px] md:h-[80px]">
                <path fill="#ffffff" d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
            </svg>
        </div> --}}
    </div>

    <!-- Modal untuk Banner -->
    <dialog id="banner-modal" class="rounded-xl max-w-4xl sm:mx-auto backdrop:bg-black/80"
        onclick="handleOutsideClick(event, this)">
        <div class="relative bg-transparent rounded-xl overflow-hidden max-h-[50vh]">
            <button onclick="document.getElementById('banner-modal').close()"
                class="absolute top-2 right-2 bg-black/60 text-white rounded-full p-2 hover:bg-black z-10">
                <i class="fas fa-times"></i>
            </button>
            <img id="banner-modal-image" src="" alt="Banner" class="w-full h-auto max-h-[50vh] object-contain">
        </div>
    </dialog>

    <script>
        function openBannerModal(imageUrl, title) {
            const modal = document.getElementById('banner-modal');
            const img = document.getElementById('banner-modal-image');
            img.src = imageUrl;
            img.alt = title;
            modal.showModal();
        }
    </script>

    <script>
        // Load Font Awesome asynchronously
        document.addEventListener("DOMContentLoaded", function() {
            // Check if Font Awesome is already loaded
            if (!document.querySelector('link[href*="fontawesome"]')) {
                const fontAwesome = document.createElement('link');
                fontAwesome.rel = 'stylesheet';
                fontAwesome.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css';
                fontAwesome.integrity =
                    'sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==';
                fontAwesome.crossOrigin = 'anonymous';
                fontAwesome.referrerPolicy = 'no-referrer';

                // Append to head
                document.head.appendChild(fontAwesome);
            }
        });
    </script>

    <script>
        // Script untuk mengoptimalkan AOS
        document.addEventListener("DOMContentLoaded", function() {
            // Deteksi apakah perangkat mobile
            const isMobile = window.innerWidth < 768;

            // Fungsi untuk me-load AOS library
            function loadAOS() {
                const aosScript = document.createElement('script');
                aosScript.src = 'https://unpkg.com/aos@next/dist/aos.js';
                aosScript.defer = true;
                aosScript.onload = function() {
                    AOS.init({
                        // Disable animation pada perangkat mobile untuk performa
                        disable: isMobile ? 'phone' : false,
                        once: true, // Animasi hanya sekali
                        duration: 800,
                        delay: 0,
                        throttleDelay: 99,
                    });
                };
                document.head.appendChild(aosScript);
            }

            // Load AOS secara asynchronous setelah konten utama dimuat
            if ('requestIdleCallback' in window) {
                requestIdleCallback(loadAOS);
            } else {
                setTimeout(loadAOS, 1000);
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const swiperScript = document.createElement('script');
            swiperScript.src = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js';
            swiperScript.onload = function() {
                const swiper = new Swiper(".heroSwiper", {
                    loop: true,
                    effect: "fade",
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    on: {
                        init: function() {
                            loadActiveSlideBg();
                        },
                        slideChangeTransitionStart: function() {
                            loadActiveSlideBg();
                        },
                    },
                });
            };
            document.head.appendChild(swiperScript);

            function loadActiveSlideBg() {
                const activeSlide = document.querySelector(".swiper-slide-active.lazy-slide");
                if (activeSlide && !activeSlide.classList.contains("bg-loaded")) {
                    const bg = activeSlide.getAttribute("data-bg");
                    if (bg) {
                        activeSlide.style.backgroundImage =
                            `linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('${bg}')`;
                        activeSlide.classList.add("bg-loaded");
                    }
                }
            }
        });
    </script>

    {{-- <!-- Sponsors Section -->
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
    </section> --}}

    <!-- Features Section with Playful Elements -->
    <section class="py-12 bg-white relative overflow-hidden">
        <!-- Background Decorative Elements - simplified -->
        <div
            class="absolute top-0 right-0 w-28 h-28 bg-yellow-200 rounded-full opacity-20 transform -translate-y-1/2 translate-x-1/2">
        </div>
        <div
            class="absolute bottom-0 left-0 w-40 h-40 bg-green-200 rounded-full opacity-20 transform translate-y-1/2 -translate-x-1/2">
        </div>

        <div class="container mx-auto px-6">
            <div class="text-center mb-10" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-gray-800 relative inline-block">
                    <span class="relative z-10">Pengalaman Wisata Edukatif</span>
                    <svg class="absolute -bottom-2 left-0 w-full h-3 text-green-200 z-0" viewBox="0 0 200 8">
                        <path d="M0 4C40 0 60 8 100 4C140 0 160 8 200 4" fill="none" stroke="currentColor"
                            stroke-width="4" stroke-linecap="round"></path>
                    </svg>
                </h2>
                <p class="text-gray-600 mt-3">Nikmati beragam aktivitas menarik dan bermanfaat</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-xl transition-all text-center transform hover:-translate-y-2 hover:rotate-1 group"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-all">
                        <i class="fas fa-seedling text-green-600 text-2xl group-hover:animate-bounce-slow"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Edukasi Pertanian</h3>
                    <p class="text-gray-600 text-sm">Pelajari teknik bertani modern dan tradisional dengan pengalaman
                        langsung
                        di lahan pertanian kami.</p>
                    <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>
                </div>

                <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-xl transition-all text-center transform hover:-translate-y-2 hover:rotate-1 group"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-all">
                        <i class="fas fa-horse text-orange-600 text-2xl group-hover:animate-bounce-slow"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Peternakan Interaktif</h3>
                    <p class="text-gray-600 text-sm">Berinteraksi dengan beragam hewan ternak dan pelajari cara merawat
                        mereka
                        dengan baik.</p>
                    <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>
                </div>

                <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-xl transition-all text-center transform hover:-translate-y-2 hover:rotate-1 group"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-all">
                        <i class="fas fa-tree text-blue-600 text-2xl group-hover:animate-bounce-slow"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Taman Perkebunan</h3>
                    <p class="text-gray-600 text-sm">Jelajahi aneka tanaman perkebunan dan pelajari proses panen hingga
                        pengolahan hasil perkebunan.</p>
                    <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PACKET -->
    <!-- Popular Tours Section with Animated Effects -->
    <section class="py-12 bg-white relative overflow-hidden">
        <!-- Background Elements - simplified -->
        <!-- <div class="absolute inset-0 bg-pattern opacity-5"></div> -->

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8" data-aos="fade-up">
                <div>
                    <h2
                        class="text-2xl md:text-3xl font-bold text-gray-900 relative pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:h-1 after:w-16 after:bg-purple-800">
                        Paket Wisata</h2>
                    <p class="text-gray-600 mt-2 text-base">Pilihan paket wisata edukatif</p>
                </div>
                <a href="{{ route('packets') }}"
                    class="group flex items-center mt-4 md:mt-0 text-purple-800 font-semibold hover:text-purple-900 transition-all duration-300">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse ($packets as $packet)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 group relative"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative h-40 md:h-48 overflow-hidden rounded-t-xl">
                            <div class="absolute inset-0 bg-gray-300 animate-pulse"></div>
                            <img data-src="{{ asset('storage/' . $packet->image) }}" loading="lazy"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-110 cursor-pointer opacity-0"
                                alt="{{ $packet->title }}"
                                onload="this.style.opacity='1'; this.parentElement.querySelector('.animate-pulse').classList.add('opacity-0');"
                                onclick="openImageModal('{{ asset('storage/' . $packet->image) }}', '{{ $packet->title }}')">
                            <div
                                class="absolute inset-0 bg-gradient-to-b from-transparent to-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>

                            <!-- Tombol untuk melihat gambar paket wisata -->
                            <div class="absolute z-10 top-2 right-2 flex gap-2">
                                <button
                                    onclick="openImageModal('{{ asset('storage/' . $packet->image) }}', '{{ $packet->title }}')"
                                    class="bg-white/80 hover:bg-white text-purple-900 rounded-full p-1.5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform hover:scale-105 tooltip-container">
                                    <i class="fas fa-expand"></i>
                                    <span class="tooltip-text">Perbesar</span>
                                </button>
                            </div>
                        </div>

                        <div class="p-4">
                            <div class="mb-2">
                                <h3 class="text-lg font-bold text-gray-800 group-hover:text-purple-700 transition-colors">
                                    {{ $packet->title }}</h3>
                                <div
                                    class="w-10 h-1 bg-purple-700 mt-1.5 mb-2 group-hover:w-16 transition-all duration-300">
                                </div>
                                <!-- <p class="text-gray-600 mb-4 line-clamp-2">{{ $packet->description }}</p> -->
                            </div>

                            <div class="space-y-2">
                                <!-- Pricing Cards -->
                                <div class="grid grid-cols-2 gap-2">
                                    <div
                                        class="bg-purple-50 rounded-lg p-2 border-l-4 border-purple-600 transform transition-transform hover:scale-105">
                                        <p class="text-xs text-gray-600 mb-0.5">Weekday</p>
                                        <p class="text-base font-bold text-purple-700">
                                            {{ $packet->weekday_price ?: 'Hubungi kami' }}
                                        </p>
                                    </div>
                                    <div
                                        class="bg-indigo-50 rounded-lg p-2 border-l-4 border-indigo-600 transform transition-transform hover:scale-105">
                                        <p class="text-xs text-gray-600 mb-0.5">Weekend</p>
                                        <p class="text-base font-bold text-indigo-700">
                                            {{ $packet->weekend_price ?: 'Hubungi kami' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-2 pt-1.5">
                                    <a href="{{ route('packets') }}#contact-packet"
                                        class="flex-1 bg-purple-600 hover:bg-purple-800 text-white font-medium py-1.5 px-3 rounded-lg transition-colors text-center inline-flex items-center justify-center text-sm">
                                        <i class="fas fa-ticket-alt mr-1"></i> Pesan
                                    </a>
                                    <button
                                        onclick="document.getElementById('detailModal-{{ $packet->id }}').showModal()"
                                        class="flex-1 bg-purple-100 hover:bg-purple-200 text-purple-700 font-medium py-1.5 px-3 rounded-lg transition-colors text-sm">
                                        <i class="fas fa-info-circle mr-1"></i> Detail
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Decoration elements -->
                        <div
                            class="absolute -bottom-2 -right-2 w-16 h-16 bg-purple-200 rounded-full opacity-20 z-0 transform scale-0 group-hover:scale-100 transition-transform duration-500">
                        </div>
                        <div
                            class="absolute -top-2 -left-2 w-12 h-12 bg-indigo-200 rounded-full opacity-20 z-0 transform scale-0 group-hover:scale-100 transition-transform duration-500 delay-100">
                        </div>

                        <dialog id="detailModal-{{ $packet->id }}"
                            class="rounded-xl w-500 max-w-3xl sm:mx-auto mx-2 my-4 sm:my-8 p-0 overflow-hidden backdrop:bg-black/50 backdrop-blur-sm"
                            onclick="handleOutsideClick(event, this)">

                            <div class="bg-white rounded-xl shadow-lg overflow-hidden max-h-[90vh] flex flex-col">
                                <!-- Header -->
                                <div class="p-4 sm:p-6 border-b border-gray-200 bg-purple-50">
                                    <h4 class="text-xl sm:text-2xl font-bold text-purple-800 flex items-center mb-1">
                                        <i class="fas fa-ticket-alt mr-2 text-purple-700"></i> {{ $packet->title }}
                                    </h4>
                                    <p class="text-gray-600 text-sm">{{ $packet->description }}</p>
                                </div>

                                <!-- Body -->
                                <div class="p-4 sm:p-6 space-y-4 overflow-y-auto flex-1">
                                    <div
                                        class="rich-content text-sm text-gray-700 leading-relaxed prose prose-sm sm:prose">
                                        {!! $packet->detail !!}
                                    </div>

                                    <!-- Harga -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <div class="flex items-center p-4 bg-purple-50 rounded-md shadow-sm">
                                            <div class="bg-purple-600 text-white p-2 rounded-full mr-3">
                                                <i class="fas fa-calendar-week"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm text-gray-600">Harga Weekday</div>
                                                <div class="text-lg font-bold text-purple-700">
                                                    {{ $packet->weekday_price ?: 'Hubungi kami' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center p-4 bg-indigo-50 rounded-md shadow-sm">
                                            <div class="bg-indigo-600 text-white p-2 rounded-full mr-3">
                                                <i class="fas fa-calendar-week"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm text-gray-600">Harga Weekend</div>
                                                <div class="text-lg font-bold text-indigo-700">
                                                    {{ $packet->weekend_price ?: 'Hubungi kami' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <div
                                    class="px-4 sm:px-6 py-4 bg-gray-50 flex flex-col sm:flex-row justify-end gap-3 border-t">
                                    <button onclick="document.getElementById('detailModal-{{ $packet->id }}').close()"
                                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-md transition w-full sm:w-auto">
                                        Tutup
                                    </button>
                                    <a href="{{ route('packets') }}#contact-packet"
                                        class="bg-purple-700 hover:bg-purple-800 text-white py-2 px-4 rounded-md transition font-medium w-full sm:w-auto text-center">
                                        <i class="fas fa-ticket-alt mr-1"></i> Pesan Sekarang
                                    </a>
                                    <a href="https://wa.me/6281939114933?text=Halo%2C%20saya%20mau%20tanya"
                                        class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-md transition w-full sm:w-auto"
                                        target="_blank" rel="noopener noreferrer">
                                        <i class="fab fa-whatsapp text-xl mr-2"></i> Whatsapp
                                    </a>

                                    <a href="https://www.traveloka.com/id-id/activities/indonesia/product/nusantara-edupark-madiun-5389237971312"
                                        class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition w-full sm:w-auto"
                                        target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-plane-departure text-xl mr-2"></i> Traveloka
                                    </a>
                                </div>
                            </div>
                        </dialog>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12" data-aos="fade-up">
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
    <section class="py-12 bg-white relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 bg-pattern opacity-5"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8" data-aos="fade-up">
                <div>
                    <h2
                        class="text-2xl md:text-3xl font-bold text-gray-900 relative pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:h-1 after:w-16 after:bg-green-700 flex items-center">
                        Fasilitas
                    </h2>
                    <p class="text-gray-600 mt-2 text-base">Fasilitas yang tersedia</p>
                </div>
                <a href="{{ route('facilities') }}"
                    class="group flex items-center mt-4 md:mt-0 text-green-700 font-semibold hover:text-green-800 transition-all duration-300">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse ($facilities as $facility)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 group"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative overflow-hidden">
                            <div class="relative w-full h-48 overflow-hidden bg-gray-300 animate-pulse">
                                <img src="{{ asset('storage/' . $facility->image) }}" loading="lazy"
                                    class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700 opacity-0 cursor-pointer"
                                    alt="{{ $facility->title }}"
                                    onload="this.style.opacity='1'; this.parentElement.classList.remove('animate-pulse');"
                                    onclick="openImageModal('{{ asset('storage/' . $facility->image) }}', '{{ $facility->title }}')">
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
                                <p class="text-white px-4 pb-3 font-medium text-sm">
                                    <i class="fas fa-building mr-2"></i> Fasilitas
                                </p>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <!-- <span
                                                                            class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                                                                            <i class="fas fa-check-circle text-green-600 mr-1"></i> Tersedia
                                                                        </span> -->
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $facility->title }}</h3>
                            <p class="text-gray-600 mb-3 text-sm">{{ $facility->description }}</p>
                            @if ($facility->detail)
                                <div class="flex justify-end">
                                    <a href="javascript:void(0)"
                                        onclick="openDetailModal('{{ $facility->title }}', '{{ addslashes($facility->description) }}', '{{ addslashes($facility->detail) }}', '{{ asset('storage/' . $facility->image) }}')"
                                        class="text-blue-600 hover:text-blue-800 font-medium transition-colors flex items-center text-sm">
                                        <i class="fas fa-info-circle mr-1"></i> Detail
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10" data-aos="fade-up">
                        <div class="bg-gray-100 rounded-lg p-6 inline-block">
                            <i class="fas fa-building text-gray-400 text-3xl mb-3"></i>
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
            class="bg-white p-3 rounded-xl shadow-2xl w-full max-w-2xl mx-auto transform scale-95 opacity-0 transition-all duration-300 max-h-[80vh] overflow-y-auto">

            <div class="flex justify-between items-start mb-3">
                <h2 id="facility-title" class="text-xl font-bold text-gray-800"></h2>
                <button onclick="closeDetailModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-3">
                <div class="overflow-hidden rounded-lg">
                    <img id="facility-image" src="" alt="Gambar Fasilitas"
                        class="w-full h-auto object-cover rounded-lg hover:scale-105 transition-transform duration-500">
                </div>
                <div>
                    <div class="mb-3">
                        <h3 class="text-base font-semibold text-gray-700 mb-1">Deskripsi:</h3>
                        <p id="facility-description" class="text-gray-600 text-sm"></p>
                    </div>

                    <div class="p-3 bg-gray-50 rounded-lg">
                        <h3 class="font-semibold mb-2 text-purple-700 text-sm">Detail Fasilitas:</h3>
                        <div id="facility-detail" class="prose max-w-none text-gray-700 text-sm"></div>
                    </div>
                </div>
            </div>

            <div class="mt-4 flex justify-end">
                <button onclick="closeDetailModal()"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-1.5 px-3 rounded-lg transition-colors text-sm">
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
    <section class="py-12 relative overflow-hidden">
        <!-- Background dengan bentuk gelombang -->
        <div class="absolute inset-0">
            <!-- Warna dasar yang konsisten dengan skema warna lainnya -->
            <div class="absolute inset-0 bg-gradient-to-br from-purple-800 to-indigo-900"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-8" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-yellow-300 relative inline-block">
                    <i class="fas fa-images text-yellow-300 mr-2 animate-pulse-slow"></i>
                    Galeri Destinasi
                </h2>
                <p class="text-white mt-2 text-sm">Keindahan dan keseruan di Nusantara Edupark</p>
            </div>

            <!-- Container untuk gambar-gambar gallery -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-16">
                @forelse ($galleries->take(8) as $gallery)
                    <div class="relative overflow-hidden rounded-lg group cursor-pointer"
                        onclick="openGalleryModal('{{ asset('storage/' . $gallery->image) }}')" data-aos="zoom-in"
                        data-aos-delay="{{ $loop->index * 50 }}">
                        <div class="relative w-full h-40 overflow-hidden bg-gray-300 animate-pulse">
                            <img src="{{ asset('storage/' . $gallery->image) }}"
                                class="w-full h-40 object-cover group-hover:scale-110 transition-all duration-500 opacity-0 cursor-pointer"
                                alt="{{ $gallery->title }}"
                                onload="this.style.opacity='1'; this.parentElement.classList.remove('animate-pulse');">
                        </div>
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-3">
                            <span class="text-white font-medium text-sm"><i class="fas fa-image mr-2"></i>
                                {{ $gallery->title }}</span>
                        </div>

                    </div>
                @empty
                    <div class="col-span-4 text-center py-10" data-aos="fade-up">
                        <div class="text-white bg-purple-800/50 rounded-lg p-5 inline-block">
                            <i class="fas fa-image text-3xl mb-3"></i>
                            <p>Belum ada foto galeri yang tersedia.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="text-center mb-8" data-aos="fade-up" data-aos-delay="400">
                <a href="{{ route('gallery') }}"
                    class="border-2 border-yellow-400 bg-yellow-300 text-purple-800 hover:bg-yellow-400 hover:border-yellow-500 font-semibold py-1.5 px-5 rounded-full transition-all transform hover:scale-105 flex items-center justify-center mx-auto w-max text-sm">
                    <i class="fas fa-images mr-2"></i> Lihat Semua Foto
                </a>
            </div>
        </div>
    </section>

    <!-- Modal Galeri -->
    <div id="gallery-modal"
        class="fixed inset-0 bg-black bg-opacity-80 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-opacity duration-300">
        <div id="gallery-modal-box"
            class="bg-transparent w-full max-w-2xl mx-auto transform scale-95 opacity-0 transition-all duration-300">

            <div class="relative">
                <button onclick="closeGalleryModal()"
                    class="absolute -top-8 right-0 text-white hover:text-gray-300 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>

                <div class="flex flex-col">
                    <!-- Gambar -->
                    <div class="overflow-hidden rounded-lg bg-black flex items-center justify-center">
                        <img id="gallery-image" src="" alt=""
                            class="max-h-[55vh] max-w-full object-contain">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openGalleryModal(imageUrl) {
            const modal = document.getElementById('gallery-modal');
            const box = document.getElementById('gallery-modal-box');

            document.getElementById('gallery-image').src = imageUrl;
            document.getElementById('gallery-image').alt = 'Galeri';

            modal.classList.remove('hidden');
            setTimeout(() => {
                box.classList.remove('scale-95', 'opacity-0');
                box.classList.add('scale-100', 'opacity-100');
            }, 10);

            document.body.style.overflow = 'hidden';
        }

        function closeGalleryModal() {
            const modal = document.getElementById('gallery-modal');
            const box = document.getElementById('gallery-modal-box');

            box.classList.remove('scale-100', 'opacity-100');
            box.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeGalleryModal();
            }
        });
    </script>



    <!-- Blog Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8" data-aos="fade-up">
                <div>
                    <h2
                        class="text-2xl md:text-3xl font-bold text-gray-900 relative pb-2 after:content-[''] after:absolute after:bottom-0 after:left-0 after:h-1 after:w-16 after:bg-purple-800">
                        Berita Pilihan</h2>
                    <p class="text-gray-600 mt-2 text-base">Berita Pilihan di Nusantara Edupark</p>
                </div>
                <a href="/news"
                    class="group flex items-center mt-4 md:mt-0 text-purple-800 font-semibold hover:text-purple-900 transition-all duration-300">
                    Semua Berita
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($blogs->take(3) as $blogItem)
                    <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 group"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative overflow-hidden">
                            <div class="relative w-full h-48 overflow-hidden bg-gray-300 animate-pulse">
                                <img src="{{ asset('storage/' . $blogItem->picture) }}" loading="lazy"
                                    class="w-full h-48 object-cover object-center transform group-hover:scale-105 transition-transform duration-500 opacity-0 cursor-pointer"
                                    alt="{{ $blogItem->title }}"
                                    onload="this.style.opacity='1'; this.parentElement.classList.remove('animate-pulse', 'bg-gray-300');"
                                    onclick="openImageModal('{{ asset('storage/' . $blogItem->picture) }}', '{{ $blogItem->title }}')">
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="text-xs font-semibold text-purple-900 mb-2">
                                {{ $blogItem->created_at->format('d M Y') }}
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-purple-900 transition-colors">
                                {{ Str::words($blogItem->title, 12) }}
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed mb-3">
                                {{ Str::limit($blogItem->content, 100) }}
                            </p>
                            <a href="{{ route('blogs.show', $blogItem->url) }}"
                                class="inline-flex items-center text-purple-900 font-medium group-hover:text-purple-900 transition-colors text-sm">
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
    <section id="testimonials" class="py-12 bg-white relative overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute top-10 left-10 text-5xl text-gray-200 opacity-20 transform -rotate-12">
            <i class="fas fa-quote-left"></i>
        </div>
        <div class="absolute bottom-10 right-10 text-5xl text-gray-200 opacity-20 transform rotate-12">
            <i class="fas fa-quote-right"></i>
        </div>


        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-8" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-gray-900 relative inline-block">
                    <i class="fas fa-comments text-yellow-500 mr-2 animate-pulse-slow"></i>
                    Apa Kata Mereka?
                </h2>
                <p class="text-gray-600 mt-2 text-sm">Pengalaman pengunjung di Nusantara Edupark</p>
            </div>



            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center" data-aos="fade-up">
                <i class="fas fa-quote-left text-purple-800 mr-3"></i>
                Ulasan Pengunjung
            </h3>

            <div id="testimonials-container" class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up">
                <!-- Testimonial akan dirender melalui JavaScript -->
                <div class="bg-white p-4 rounded-xl shadow-md hover:shadow-xl transition-all animate-pulse">
                    <div class="flex items-center mb-3">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-gray-600 ml-2">5.0</span>
                    </div>
                    <div class="h-16 bg-gray-200 rounded mb-3"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-gray-300"></div>
                        <div class="ml-3">
                            <div class="h-4 bg-gray-200 rounded w-20"></div>
                            <div class="h-3 bg-gray-200 rounded w-14 mt-1"></div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-md hover:shadow-xl transition-all animate-pulse">
                    <div class="flex items-center mb-3">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-gray-600 ml-2">4.5</span>
                    </div>
                    <div class="h-16 bg-gray-200 rounded mb-3"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-gray-300"></div>
                        <div class="ml-3">
                            <div class="h-4 bg-gray-200 rounded w-20"></div>
                            <div class="h-3 bg-gray-200 rounded w-14 mt-1"></div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-md hover:shadow-xl transition-all animate-pulse">
                    <div class="flex items-center mb-3">
                        <div class="text-yellow-400 flex">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-gray-600 ml-2">5.0</span>
                    </div>
                    <div class="h-16 bg-gray-200 rounded mb-3"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-gray-300"></div>
                        <div class="ml-3">
                            <div class="h-4 bg-gray-200 rounded w-20"></div>
                            <div class="h-3 bg-gray-200 rounded w-14 mt-1"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-6" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('testimonials.all') }}"
                    class="inline-flex items-center text-purple-800 font-medium hover:text-purple-900 transition-colors text-sm">
                    <span>Lihat Semua Ulasan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
        <!-- Form Testimonial -->
        <div class="max-w-3xl mx-auto mb-12 mt-12" data-aos="fade-up" data-aos-delay="400">
            @include('review.formkomentar')
        </div>
    </section>

    <script>
        function handleOutsideClick(event, dialog) {
            // Tutup hanya jika klik terjadi di luar konten modal
            const rect = dialog.querySelector('div').getBoundingClientRect();
            if (
                event.clientX < rect.left ||
                event.clientX > rect.right ||
                event.clientY < rect.top ||
                event.clientY > rect.bottom
            ) {
                dialog.close();
            }
        }
    </script>

    <script>
        // Lazy loading images with Intersection Observer API
        document.addEventListener('DOMContentLoaded', function() {
            // Check if Intersection Observer API is available
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            const src = img.getAttribute('data-src');
                            if (src) {
                                img.src = src;
                                img.onload = function() {
                                    img.style.opacity = '1';
                                    const animateElement = img.parentElement.querySelector(
                                        '.animate-pulse');
                                    if (animateElement) {
                                        animateElement.classList.remove('animate-pulse');
                                    }
                                };
                                // Once loaded, no need to observe anymore
                                observer.unobserve(img);
                            }
                        }
                    });
                }, {
                    rootMargin: '100px 0px',
                    threshold: 0.01
                });

                // Select all images with data-src attribute
                const lazyImages = document.querySelectorAll('img[data-src]');
                lazyImages.forEach(img => {
                    imageObserver.observe(img);
                });

                // Handle images in modals separately
                document.querySelectorAll('dialog').forEach(dialog => {
                    dialog.addEventListener('click', function() {
                        const dialogImages = this.querySelectorAll('img[data-src]');
                        dialogImages.forEach(img => {
                            if (!img.src) {
                                const src = img.getAttribute('data-src');
                                if (src) {
                                    img.src = src;
                                }
                            }
                        });
                    });
                });
            } else {
                // Fallback for browsers that don't support Intersection Observer
                document.querySelectorAll('img[data-src]').forEach(img => {
                    img.src = img.getAttribute('data-src');
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load testimonials when they are about to be visible
            const testimonialsSection = document.getElementById('testimonials');
            let testimonialsLoaded = false;

            function loadTestimonials() {
                if (testimonialsLoaded) return;

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
                            noData.innerHTML =
                                `<div class="text-gray-500">
                                    <i class="fas fa-comment-slash text-4xl mb-3"></i>
                                    <p>Belum ada ulasan. Jadilah yang pertama memberikan ulasan!</p>
                                </div>`;

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
                                photoHtml =
                                    `<div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                                        <span class="text-lg font-medium text-purple-700">${testimonial.nama.charAt(0)}</span>
                                    </div>`;
                            }

                            // Buat card testimonial
                            const testimonialCard = document.createElement('div');

                            testimonialCard.className =
                                'bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all';
                            testimonialCard.innerHTML =
                                `<div class="flex items-center mb-4">
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
                                </div>`;


                            container.appendChild(testimonialCard);
                        });

                        testimonialsLoaded = true;
                    })
                    .catch(error => {
                        console.error('Error fetching testimonials:', error);
                        const container = document.getElementById('testimonials-container');
                        container.innerHTML =
                            '<div class="col-span-3 text-center py-8 text-red-500">Gagal memuat testimonial</div>';
                    });
            }

            // Use Intersection Observer to load testimonials when section is visible
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            loadTestimonials();
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    rootMargin: '100px'
                });

                observer.observe(testimonialsSection);
            } else {
                // Fallback for browsers that don't support Intersection Observer
                loadTestimonials();
            }
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

    <!-- Modal Global untuk Gambar -->
    <dialog id="image-modal" class="rounded-xl max-w-3xl sm:mx-auto backdrop:bg-black/80"
        onclick="handleOutsideClick(event, this)">
        <div class="relative bg-transparent rounded-xl overflow-hidden max-h-[75vh]">
            <button onclick="document.getElementById('image-modal').close()"
                class="absolute top-2 right-2 bg-black/60 text-white rounded-full p-1.5 hover:bg-black z-10">
                <i class="fas fa-times"></i>
            </button>
            <img id="modal-image" src="" alt="Image" class="w-full h-auto max-h-[75vh] object-contain">
            <div id="modal-caption" class="bg-black/70 text-white p-1.5 text-center absolute bottom-0 w-full text-sm">
            </div>
        </div>
    </dialog>

    <script>
        function openImageModal(imageUrl, caption) {
            const modal = document.getElementById('image-modal');
            const img = document.getElementById('modal-image');
            const captionEl = document.getElementById('modal-caption');

            img.src = imageUrl;
            img.alt = caption;
            captionEl.textContent = caption;
            modal.showModal();

            // Mencegah scrolling pada body ketika modal terbuka
            document.body.style.overflow = 'hidden';
        }

        document.getElementById('image-modal').addEventListener('close', function() {
            // Mengaktifkan kembali scrolling pada body ketika modal ditutup
            document.body.style.overflow = 'auto';
        });
    </script>
@endsection
