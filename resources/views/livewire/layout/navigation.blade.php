<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Purple Navigation</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Heroicons CDN (for SVG icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Alpine.js (for interactions) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.2/cdn.min.js" defer></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        purple: {
                            100: '#F3E8FF',
                            200: '#E9D5FF',
                            300: '#D8B4FE',
                            400: '#C084FC',
                            500: '#A855F7',
                            600: '#9333EA',
                            700: '#7E22CE',
                            800: '#6B21A8',
                            900: '#581C87'
                        }
                    }
                }
            }
        }
    </script>
</head>

<body>
    <?php
    use App\Livewire\Actions\Logout;

    $logout = function (Logout $logout) {
        $logout();
        $this->redirect('/', navigate: true);
    };
    ?>

    <nav x-data="{ open: false }" class="bg-white white:bg-gray-900  dark:border-purple-900 shadow-sm">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('homepage') }}" wire:navigate
                            class="text-purple-600 dark:text-purple-400 font-bold text-xl">
                            <i class="fas fa-bolt mr-2"></i>
                            <!-- Replace with your logo or keep text -->
                            <span>NUSANTARA EDUPARK</span>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-6 sm:-my-px sm:ms-8 sm:flex">
                        <a href="{{ route('homepage') }}" wire:navigate
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('homepage') ? 'border-purple-500 text-purple-700 dark:text-purple-300' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-300' }} text-sm font-medium transition duration-150 ease-in-out">
                            <i class="fas fa-home mr-1.5 text-purple-500"></i>
                            {{ __('Home') }}
                        </a>
                        <!-- Add more navigation links as needed -->
                        <a href="{{ route('blogs.index') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-300 transition duration-150 ease-in-out">
                            <i class="fas fa-chart-line mr-1.5 text-purple-500"></i>
                            {{ __('Blog') }}
                        </a>



                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        @if (auth()->check())
                            <!-- Notifications -->
                            <button
                                class="p-1 mr-4 text-purple-600 dark:text-purple-400 rounded-full hover:bg-purple-100 dark:hover:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-400">
                                <i class="fas fa-bell"></i>
                            </button>

                            <!-- User Dropdown -->
                            <div x-data="{ open: false }" @click.away="open = false" class="relative">
                                <button @click="open = !open"
                                    class="flex items-center px-3 py-2 rounded-lg bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-300 hover:bg-purple-200 dark:hover:bg-purple-800 transition duration-150 ease-in-out">
                                    <div class="mr-2 h-7 w-7 rounded-full bg-purple-500 flex items-center justify-center text-white"
                                        x-data="{{ json_encode(['name' => auth()->user()->name ?? 'Guest']) }}">
                                        <span x-text="name.charAt(0).toUpperCase()"></span>
                                    </div>
                                    <div x-data="{{ json_encode(['name' => auth()->user()->name ?? 'Guest']) }}" x-text="name"
                                        x-on:profile-updated.window="name = $event.detail.name"
                                        class="text-sm font-medium">
                                    </div>
                                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                                </button>

                                <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute right-0 mt-2 w-48 py-1 bg-white dark:bg-gray-800 rounded-lg shadow-lg z-50"
                                    style="display: none;">
                                    <a href="{{ route('profile') }}" wire:navigate
                                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-purple-100 dark:hover:bg-purple-900">
                                        <i class="fas fa-user-circle mr-2 text-purple-500"></i>
                                        {{ __('Profile') }}
                                    </a>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-purple-100 dark:hover:bg-purple-900">
                                        <i class="fas fa-cog mr-2 text-purple-500"></i>
                                        {{ __('Settings') }}
                                    </a>
                                    <div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>
                                    <!-- Authentication -->
                                    <button wire:click="logout"
                                        class="w-full text-left block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-purple-100 dark:hover:bg-purple-900">
                                        <i class="fas fa-sign-out-alt mr-2 text-purple-500"></i>
                                        {{ __('Log Out') }}
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = !open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-purple-500 hover:text-purple-700 hover:bg-purple-100 dark:hover:bg-purple-900 focus:outline-none transition duration-150 ease-in-out">
                            <i class="fas fa-bars h-6 w-6" x-show="!open"></i>
                            <i class="fas fa-times h-6 w-6" x-show="open" style="display: none;"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="{{ route('dashboard') }}" wire:navigate
                        class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('dashboard') ? 'border-purple-500 text-purple-700 dark:text-purple-300 bg-purple-50 dark:bg-purple-900/50' : 'border-transparent text-gray-600 dark:text-gray-400 hover:text-purple-700 dark:hover:text-purple-300 hover:bg-purple-50 dark:hover:bg-purple-900/50' }} text-base font-medium focus:outline-none transition duration-150 ease-in-out">
                        <i class="fas fa-home mr-2 text-purple-500"></i>
                        {{ __('Dashboard') }}
                    </a>
                    <!-- Add more responsive links as needed -->
                    <a href="{{ route('blogs.index') }}"
                        class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-purple-700 dark:hover:text-purple-300 hover:bg-purple-50 dark:hover:bg-purple-900/50 focus:outline-none transition duration-150 ease-in-out">
                        <i class="fas fa-chart-line mr-2 text-purple-500"></i>
                        {{ __('Blog') }}
                    </a>



                </div>

                <!-- Responsive Settings Options -->
                @if (auth()->check())
                    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-700">
                        <div class="px-4 flex items-center">
                            <div class="mr-3 h-10 w-10 rounded-full bg-purple-500 flex items-center justify-center text-white text-lg"
                                x-data="{{ json_encode(['name' => auth()->user()->name ?? 'Guest']) }}">
                                <span x-text="name.charAt(0).toUpperCase()"></span>
                            </div>
                            <div>
                                <div class="font-medium text-base text-gray-800 dark:text-gray-200"
                                    x-data="{{ json_encode(['name' => auth()->user()->name ?? 'Guest']) }}" x-text="name"
                                    x-on:profile-updated.window="name = $event.detail.name"></div>
                                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <a href="{{ route('profile') }}" wire:navigate
                                class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-purple-700 dark:hover:text-purple-300 hover:bg-purple-50 dark:hover:bg-purple-900/50 focus:outline-none transition duration-150 ease-in-out">
                                <i class="fas fa-user-circle mr-2 text-purple-500"></i>
                                {{ __('Profile') }}
                            </a>
                            <a href="#"
                                class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-purple-700 dark:hover:text-purple-300 hover:bg-purple-50 dark:hover:bg-purple-900/50 focus:outline-none transition duration-150 ease-in-out">
                                <i class="fas fa-cog mr-2 text-purple-500"></i>
                                {{ __('Settings') }}
                            </a>
                            <!-- Authentication -->
                            <button wire:click="logout"
                                class="w-full text-left block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 dark:text-gray-400 hover:text-purple-700 dark:hover:text-purple-300 hover:bg-purple-50 dark:hover:bg-purple-900/50 focus:outline-none transition duration-150 ease-in-out">
                                <i class="fas fa-sign-out-alt mr-2 text-purple-500"></i>
                                {{ __('Log Out') }}
                            </button>
                        </div>
                    </div>
                @endif
            </div>
    </nav>
</body>

</html>
