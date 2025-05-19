<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Nusantara Edupark</title>
    <!-- Tailwind CSS v3 -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{--
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script> --}}

    <!-- Summernote CSS & JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        'primary': {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            300: '#c4b5fd',
                            400: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95',
                            950: '#2e1065',
                        },
                    },
                }
            }
        }
        window.addEventListener('DOMContentLoaded', () => {
            document.body.classList.add('loaded');
        });
    </script>
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .sidebar-icon {
            width: 24px;
            display: inline-block;
            margin-right: 12px;
            text-align: center;
        }

        .sidebar-hover {
            transition: all 0.3s ease;
        }

        .sidebar-hover:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 3px solid #8b5cf6;
            transform: translateX(4px);
        }

        .active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 3px solid #8b5cf6;
            position: relative;
        }

        .active::after {
            content: '';
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #8b5cf6;
        }

        button.sidebar-hover {
            padding: 0.75rem 0;
            width: 100%;
            transition: all 0.3s ease;
        }

        button.sidebar-hover:hover {
            padding-left: calc(1.5rem - 3px);
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
                position: fixed;
                z-index: 50;
                height: 100%;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 40;
                display: none;
                backdrop-filter: blur(3px);
            }

            .overlay.active {
                display: block;
            }
        }

        .note-editable ul {
            list-style-type: disc;
            margin-left: 1.5rem;
        }

        .note-editable ol {
            list-style-type: decimal;
            margin-left: 1.5rem;
        }

        .summernote-content table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        .summernote-content th,
        .summernote-content td {
            border: 1px solid #ccc;
            padding: 8px;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Mobile overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Mobile header -->

    <header
        class="md:hidden bg-gradient-to-r from-primary-900 to-primary-900 text-white p-4 flex items-center justify-between sticky top-0 z-30 shadow-lg">
        <button id="sidebarToggle"
            class="text-white p-2 focus:outline-none hover:bg-primary-700 rounded-lg transition-all">

            <i class="fa-solid fa-bars"></i>
        </button>
        <span class="font-bold text-lg text-white">NUSANTARA EDUPARK</span>
        <div class="p-2">
            <img src="{{ asset('favicon.svg') }}" alt="Logo" class="w-12 h-12 object-contain">
        </div>
    </header>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div id="sidebar"
            class="sidebar bg-gradient-to-b from-gray-900 to-primary-900 text-white w-72 flex-shrink-0 shadow-xl md:translate-x-0">
            <!-- Logo section - hidden on mobile as it's in the header -->
            <div class="hidden md:block px-6 py-6 border-b border-gray-800/50">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="rounded-lg">
                            <img src="{{ asset('storage/logoNusantaraEdupark.jpg') }}" alt="Logo"
                                class="w-13 h-13 object-cover">
                        </div>
                        <span class="font-bold text-xl text-white">NUSANTARA EDUPARK</span>
                    </div>
                </div>
            </div>

            <!-- Mobile close button -->
            <div class="md:hidden p-4 flex justify-end">
                <button id="closeSidebar"
                    class="text-white focus:outline-none hover:bg-primary-800 p-2 rounded-lg transition-all">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- User profile section -->
            <div class="px-6 py-6 border-b border-gray-800/50">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-primary-400">
                        @if(auth()->user()->photo_path)
                            <img src="{{ asset('storage/' . auth()->user()->photo_path) }}" alt="Profile Photo"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-primary-600 flex items-center justify-center">
                                <i class="fa-solid fa-user text-white text-xl"></i>
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="font-medium text-white">{{ auth()->user()->name }}</p>
                        <div class="flex items-center text-xs text-gray-300 mt-1">
                            <span class="flex items-center">
                                <i class="fa-solid fa-circle text-green-400 text-[8px] mr-1.5"></i> Administrator
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="py-6">
                <p class="px-6 py-2 text-xs uppercase tracking-wider text-gray-400 font-semibold">Menu Utama</p>

                <a href="{{ route('dashboard') }}"
                    class="px-6 py-3 flex items-center sidebar-hover {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-gauge-high text-primary-400"></i></span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('blogs.index') }}"
                    class="px-6 py-3 flex items-center sidebar-hover {{ request()->routeIs('blogs.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-newspaper text-primary-400"></i></span>
                    <span>Berita</span>
                </a>

                <a href="{{ route('dynamic-assets.index') }}"
                    class="px-6 py-3 flex items-center sidebar-hover {{ request()->routeIs('dynamic-assets.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-photo-film text-primary-400"></i></span>
                    <span>Assets</span>
                </a>

                <a href="{{ route('testimonials.index') }}"
                    class="px-6 py-3 flex items-center sidebar-hover {{ request()->routeIs('testimonials.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-star text-primary-400"></i></span>
                    <span>Testimonial</span>
                </a>

                @auth
                    @if (auth()->user()->role === 'SUPER_ADMIN')
                        <a href="{{ route('users.index') }}"
                            class="px-6 py-3 flex items-center sidebar-hover {{ request()->is('register*') ? 'active' : '' }}">
                            <span class="sidebar-icon"><i class="fa-solid fa-user-plus text-primary-400"></i></span><span>Kelola
                                Admin</span>
                        </a>
                    @endif
                @endauth

                <p class="px-6 py-2 mt-6 text-xs uppercase tracking-wider text-gray-400 font-semibold">Akun</p>

                <a href="{{ route('profile.edit') }}"
                    class="px-6 py-3 flex items-center sidebar-hover {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                    <span class="sidebar-icon"><i class="fa-solid fa-gear text-primary-400"></i></span>
                    <span>Profile</span>
                </a>

                <form action="{{ route('logout') }}" method="POST" class="px-6 py-3">
                    @csrf
                    <button type="submit" class="flex items-center w-full text-left sidebar-hover group">
                        <span class="sidebar-icon"><i
                                class="fa-solid fa-right-from-bracket text-primary-400 group-hover:text-red-400 transition-colors"></i></span>
                        <span class="group-hover:text-red-400 transition-colors">Logout</span>
                    </button>
                </form>
            </div>


        </div>

        <!-- Content -->
        <div class="flex-1 overflow-auto">
            <div class="py-6 px-4 md:px-8">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const closeSidebar = document.getElementById('closeSidebar');
            const overlay = document.getElementById('overlay');
            const links = document.querySelectorAll('.sidebar-hover');

            // Toggle sidebar on mobile
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function () {
                    sidebar.classList.toggle('open');
                    overlay.classList.toggle('active');
                });
            }

            // Close sidebar when clicking close button
            if (closeSidebar) {
                closeSidebar.addEventListener('click', function () {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                });
            }

            // Close sidebar when clicking overlay
            if (overlay) {
                overlay.addEventListener('click', function () {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                });
            }

            // Close sidebar when clicking a link on mobile
            const mobileCheck = window.matchMedia('(max-width: 768px)');
            if (mobileCheck.matches) {
                links.forEach(link => {
                    link.addEventListener('click', function () {
                        sidebar.classList.remove('open');
                        overlay.classList.remove('active');
                    });
                });
            }

            // Active link highlighting
            links.forEach(link => {
                link.addEventListener('click', function () {
                    links.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Handle window resize
            window.addEventListener('resize', function () {
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>