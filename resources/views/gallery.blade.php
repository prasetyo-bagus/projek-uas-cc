@extends('layouts.guest')

<body class="bg-gray-50">
    @section('content')
        <!-- Hero Section -->
        <section class="py-24 bg-gradient-to-br from-purple-700 to-purple-900 relative overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"
                    class="absolute w-full h-full">
                    <path fill="#fff"
                        d="M0,128L48,133.3C96,139,192,149,288,149.3C384,149,480,139,576,144C672,149,768,171,864,165.3C960,160,1056,128,1152,122.7C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div>
            <div class="container mx-auto px-6 text-center relative z-10">
                <span
                    class="inline-block px-4 py-1 rounded-full bg-white/20 backdrop-blur-sm text-white text-sm font-medium mb-4">Photo
                    Gallery</span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">Galeri <span
                        class="text-pink-300">Nusantara Edupark</span></h1>
                <p class="text-xl text-white/80 max-w-2xl mx-auto">Keindahan dan keseruan dalam jepretan foto</p>
            </div>
        </section>

        <!-- Gallery Grid -->
        <section class="py-20 bg-gray-50" x-data="{ isOpen: false, imageSrc: '', imageTitle: '' }">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                @if ($galleries->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                        @foreach ($galleries as $gallery)
                            <div class="relative group overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer"
                                @click="isOpen = true; imageSrc = '{{ asset('storage/' . $gallery->image) }}'; imageTitle = '{{ $gallery->title }}'">
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                                    class="w-full aspect-square object-cover transform group-hover:scale-110 transition-all duration-500">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-purple-900/80 via-purple-800/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end p-4">
                                    <h3 class="text-white font-semibold text-lg">{{ $gallery->title }}</h3>
                                    @if ($gallery->description)
                                        <p class="text-white/90 text-sm">{{ $gallery->description }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-16 flex justify-center" id="pagination-container">
                        <div class="pagination-wrapper rounded-full overflow-hidden shadow">
                            {{ $galleries->onEachSide(1)->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                @else
                    <div class="text-center py-24">
                        <div class="inline-block p-8 rounded-2xl bg-white shadow-md border border-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-gray-400 mb-5"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <h3 class="text-2xl font-medium text-gray-700 mb-3">Belum Ada Foto</h3>
                            <p class="text-gray-500">Galeri foto akan segera ditambahkan. Silakan kunjungi kembali nanti.
                            </p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Image Modal -->
            <div x-show="isOpen" @keydown.window.escape="isOpen = false"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4" x-cloak>
                <div class="bg-white rounded-xl overflow-hidden shadow-lg w-auto max-w-[90vw] max-h-[90vh]">
                    <div class="relative">
                        <button @click="isOpen = false"
                            class="absolute top-2 right-2 text-white bg-black bg-opacity-50 rounded-full p-1 hover:bg-opacity-75 z-10">
                            ✕
                        </button>
                        <img :src="imageSrc" :alt="imageTitle"
                            class="w-auto h-auto max-w-full max-h-[70vh] object-contain mx-auto" />
                    </div>
                </div>
            </div>

        </section>


    @endsection
</body>

<style>
    /* Custom styling for pagination with purple theme */
    .pagination-wrapper .shadow-sm {
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    /* Override the green theme with purple theme */
    .pagination-wrapper [aria-current="page"] span {
        background-color: #9333ea !important;
        /* Purple-600 */
        border-color: #9333ea !important;
    }

    .pagination-wrapper a:hover {
        color: #9333ea !important;
        /* Purple hover color */
        border-color: #e9d5ff !important;
        /* Light purple border */
    }

    .pagination-wrapper a:focus {
        border-color: #d8b4fe !important;
        /* Medium purple border */
    }
</style>
