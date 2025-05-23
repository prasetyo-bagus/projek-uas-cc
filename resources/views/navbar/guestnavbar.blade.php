<!-- Navbar with Alpine.js for mobile toggle -->
<!-- Navbar with Alpine.js for mobile toggle -->
<nav class="transition-all duration-300 fixed top-0 w-full z-50" 
    x-data="{ 
        open: false, 
        atTop: true,
        isHomepage: {{ request()->routeIs('homepage') ? 'true' : 'false' }}
    }" 
    @scroll.window="atTop = (window.pageYOffset < 50)" 
    :class="{
        'bg-white/0 shadow-none': atTop && isHomepage, 
        'bg-white': !atTop || !isHomepage
    }">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
        <a href="{{ route('homepage') }}" class="flex items-center space-x-2">
            <!-- Logo -->
            <img src="{{ asset('Logo/LogoNusantara2.png') }}" class="h-10 w-auto" alt="Nusantara Edupark Logo" onerror="this.onerror=null; this.src='https://via.placeholder.com/120x48/6B46C1/FFFFFF?text=EDUPARK'">
            <span class="text-lg font-bold hidden sm:inline-block" :class="{'text-white': atTop && isHomepage, 'bg-gradient-to-r from-purple-800 to-indigo-700 text-transparent bg-clip-text': !atTop || !isHomepage}">NUSANTARA EDUPARK</span>
        </a>

        <!-- Mobile menu button -->
        <button @click="open = !open" type="button"
            class="inline-flex items-center p-1.5 w-9 h-9 justify-center text-sm rounded-lg md:hidden hover:bg-purple-50 focus:outline-none focus:ring-2 focus:ring-purple-300 transition-all"
            :class="{'text-purple-700': atTop && isHomepage, 'text-gray-500': !atTop || !isHomepage}"
            aria-controls="navbar-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- Navigation Menu -->
        <div class="hidden w-full md:block md:w-auto transition-all duration-300" 
             :class="{'block': open, 'hidden': !open}" 
             id="navbar-menu">
            <ul class="flex flex-col font-medium p-3 md:p-0 mt-3 rounded-lg md:flex-row md:space-x-6 md:mt-0 md:border-0">
                <li>
                    <a href="{{ route('homepage') }}"
                        x-bind:class="open ? 'text-purple-700 hover:text-purple-700' : (atTop && isHomepage ? 'md:text-white text-white hover:text-gray-200' : 'text-purple-800 hover:text-purple-700')"
                        class="block py-1.5 px-2 text-sm hover:bg-purple-50 md:hover:bg-transparent rounded md:p-0 transition-all duration-200"
                        :class="{
                            'font-bold border-b-2 border-white': atTop && isHomepage && !open && request()->routeIs('homepage'), 
                            'font-bold border-b-2 border-purple-700': (!atTop || !isHomepage) && request()->routeIs('homepage')
                        }">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('services') }}"
                        x-bind:class="open ? 'text-purple-700 hover:text-purple-700' : (atTop && isHomepage ? 'md:text-white text-white hover:text-gray-200' : 'text-purple-800 hover:text-purple-700')"
                        class="block py-1.5 px-2 text-sm hover:bg-purple-50 md:hover:bg-transparent rounded md:p-0 transition-all duration-200"
                        :class="{
                            'font-bold border-b-2 border-white': atTop && isHomepage && !open && request()->routeIs('services'), 
                            'font-bold border-b-2 border-purple-700': (!atTop || !isHomepage) && request()->routeIs('services')
                        }">
                        Layanan
                    </a>
                </li>
                <li>
                    <a href="{{ route('about-us') }}"
                        x-bind:class="open ? 'text-purple-700 hover:text-purple-700' : (atTop && isHomepage ? 'md:text-white text-white hover:text-gray-200' : 'text-purple-800 hover:text-purple-700')"
                        class="block py-1.5 px-2 text-sm hover:bg-purple-50 md:hover:bg-transparent rounded md:p-0 transition-all duration-200"
                        :class="{
                            'font-bold border-b-2 border-white': atTop && isHomepage && !open && request()->routeIs('about-us'), 
                            'font-bold border-b-2 border-purple-700': (!atTop || !isHomepage) && request()->routeIs('about-us')
                        }">
                        Tentang Kami
                    </a>
                </li>
                <!-- Menu lainnya bisa ditambahkan kembali sesuai kebutuhan -->
            </ul>
        </div>
    </div>
</nav>

{{-- @yield('content') --}}

<!-- Footer -->
{{-- <footer class="bg-[rgb(33,15,55)] text-white pt-12 pb-6 mt-16">
    <div class="container mx-auto px-4 md:px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="mb-8 md:mb-0">
                <div class="flex items-center space-x-2 mb-4">
                    <i class="fas fa-leaf text-green-400 text-2xl"></i>
                    <span class="font-bold text-xl text-white">Nusantara Edupark</span>
                </div>
                <p class="text-gray-400 mb-4">Tempat wisata edukasi terbaik di bidang pertanian,
                    peternakan, dan perkebunan.</p>
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
            
            <!-- Quick Links -->
            <div class="mb-8 md:mb-0">
                <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-all">Beranda</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-all">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-all">Paket Wisata</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-all">Galeri</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-all">Blog</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="mb-8 md:mb-0">
                <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                <ul class="space-y-3">
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
            
            <!-- Operation Hours -->
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
            </div>
        </div>
        
        <!-- Copyright Section -->
        <div class="border-t border-gray-700 mt-10 pt-6">
            <div class="flex flex-col sm:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 sm:mb-0">© 2025 Nusantara Edupark. Hak Cipta Dilindungi.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-all">Kebijakan Privasi</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-all">Syarat & Ketentuan</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-all">FAQ</a>
                </div>
            </div>
        </div>
    </div>
</footer> --}}