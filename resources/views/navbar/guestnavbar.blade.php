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
                        class="block py-1.5 px-2 text-sm hover:bg-purple-50 md:hover:bg-transparent md:p-0 transition-all duration-200"
                        :class="{
                            'font-bold border-b-2 border-white': atTop && isHomepage && !open && @json(request()->routeIs('homepage')), 
                            'font-bold border-b-2 border-purple-700': (!atTop || !isHomepage) && @json(request()->routeIs('homepage'))
                        }">
                        Beranda
                    </a>
                </li>
                <li>
                    <a 
                        href="{{ route('services') }}"
                        x-bind:class="open ? 'text-purple-700 hover:text-purple-700' : (atTop && isHomepage ? 'md:text-white text-white hover:text-gray-200' : 'text-purple-800 hover:text-purple-700')"
                        class="block py-1.5 px-2 text-sm hover:bg-purple-50 md:hover:bg-transparent md:p-0 transition-all duration-200"
                        :class="{
                            'font-bold border-b-2 border-white': atTop && isHomepage && !open && @json(request()->routeIs('services')), 
                            'font-bold border-b-2 border-purple-700': (!atTop || !isHomepage) && @json(request()->routeIs('services'))
                        }"
                    >
                        Layanan
                    </a>
                </li>
                <li>
                    <a href="{{ route('about-us') }}"
                        x-bind:class="open ? 'text-purple-700 hover:text-purple-700' : (atTop && isHomepage ? 'md:text-white text-white hover:text-gray-200' : 'text-purple-800 hover:text-purple-700')"
                        class="block py-1.5 px-2 text-sm hover:bg-purple-50 md:hover:bg-transparent md:p-0 transition-all duration-200"
                        :class="{
                            'font-bold border-b-2 border-white': atTop && isHomepage && !open && @json(request()->routeIs('about-us')), 
                            'font-bold border-b-2 border-purple-700': (!atTop || !isHomepage) && @json(request()->routeIs('about-us'))
                        }">
                        Tentang Kami
                    </a>
                </li>
                <!-- Menu lainnya bisa ditambahkan kembali sesuai kebutuhan -->
            </ul>
        </div>
    </div>
</nav>