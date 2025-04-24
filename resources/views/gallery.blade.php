@extends('navbar.guestnavbar')

<body class="bg-gray-50">
    @section('content')
        <!-- Hero Section -->
        <section class="py-20 bg-purple-900 relative overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"
                    class="absolute w-full h-full">
                    <path fill="#fff"
                        d="M0,128L48,133.3C96,139,192,149,288,149.3C384,149,480,139,576,144C672,149,768,171,864,165.3C960,160,1056,128,1152,122.7C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div>
            <div class="container mx-auto px-6 text-center relative z-10">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Galeri Nusantara Edupark</h1>
                <p class="text-xl text-white/80 mb-0">Keindahan dan keseruan dalam jepretan foto</p>
            </div>
        </section>

        <!-- Gallery Grid -->
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                @if($galleries->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                    @foreach($galleries as $gallery)
                    <div class="relative group overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="{{ asset('storage/' . $gallery->image) }}" 
                            alt="{{ $gallery->title }}" 
                            class="w-full aspect-square object-cover transform group-hover:scale-110 transition-all duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/80 via-purple-800/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col justify-end p-4">
                            <h3 class="text-white font-semibold text-lg">{{ $gallery->title }}</h3>
                            @if($gallery->description)
                            <p class="text-white/90 text-sm">{{ $gallery->description }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $galleries->links() }}
                </div>
                @else
                <div class="text-center py-20">
                    <div class="inline-block p-6 rounded-lg bg-gray-100 shadow-sm">
                        <i class="fas fa-images text-gray-400 text-5xl mb-4"></i>
                        <h3 class="text-xl font-medium text-gray-700 mb-2">Belum Ada Foto</h3>
                        <p class="text-gray-500">Galeri foto akan segera ditambahkan. Silakan kunjungi kembali nanti.</p>
                    </div>
                </div>
                @endif
            </div>
        </section>
    @endsection
</body> 