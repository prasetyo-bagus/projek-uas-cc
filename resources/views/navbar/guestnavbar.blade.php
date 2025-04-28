<!-- Navbar with Alpine.js for mobile toggle -->
<nav class="bg-white border-gray-200 shadow-sm sticky top-0 z-50" x-data="{ open: false }">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('homepage') }}" class="flex items-center space-x-3">
            <span class="text-xl font-bold text-purple-800">NUSANTARA EDUPARK</span>
        </a>
        
        <!-- Mobile menu button -->
        <button @click="open = !open" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        
        <!-- Navigation Menu -->
        <div class="hidden w-full md:block md:w-auto" 
                :class="{'block': open, 'hidden': !open}" 
                id="navbar-menu">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="{{ route('homepage') }}"
                        class="block py-2 px-3 text-gray-700 hover:text-purple-700 rounded-sm md:p-0 {{ request()->routeIs('homepage') ? 'text-purple-700 font-bold' : '' }}"
                        aria-current="page">
                        <i class="fas fa-home mr-1"></i> Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('blogs.index') }}"
                        class="block py-2 px-3 text-gray-700 hover:text-purple-700 rounded-sm md:p-0 {{ request()->routeIs('blogs.*') ? 'text-purple-700 font-bold' : '' }}">
                        <i class="fas fa-newspaper mr-1"></i> Blog
                    </a>
                </li>
                <!-- <li>
                    <a href="{{ route('homepage') }}"
                        class="block py-2 px-3 text-gray-700 hover:text-purple-700 rounded-sm md:p-0">
                        <i class="fas fa-comment-dots mr-1"></i> Testimonial
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>