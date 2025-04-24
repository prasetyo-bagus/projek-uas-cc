@extends('navbar.guestnavbar')

<body class="bg-gray-50">
    @section('content')
        <!-- Hero Section -->
        <section class="py-20 bg-green-700 relative overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"
                    class="absolute w-full h-full">
                    <path fill="#fff"
                        d="M0,128L48,133.3C96,139,192,149,288,149.3C384,149,480,139,576,144C672,149,768,171,864,165.3C960,160,1056,128,1152,122.7C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div>
            <div class="container mx-auto px-6 text-center relative z-10">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Fasilitas Nusantara Edupark</h1>
                <p class="text-xl text-white/80 mb-0">Berbagai fasilitas untuk kenyamanan pengunjung</p>
            </div>
        </section>

        <!-- Facilities Grid -->
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                @if($facilities->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($facilities as $facility)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 group">
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $facility->image) }}" 
                                alt="{{ $facility->title }}" 
                                class="w-full h-60 object-cover transform group-hover:scale-110 transition-all duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-green-700 transition-colors">
                                {{ $facility->title }}
                            </h3>
                            <p class="text-gray-600 mb-4">{{ $facility->description }}</p>
                            
                            @if($facility->detail)
                            <div class="p-4 bg-gray-50 rounded-lg mt-4 text-sm text-gray-700">
                                <h4 class="font-semibold mb-2 text-green-700">Detail Fasilitas:</h4>
                                <div class="prose max-w-none">
                                    {!! $facility->detail !!}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $facilities->links() }}
                </div>
                @else
                <div class="text-center py-20">
                    <div class="inline-block p-6 rounded-lg bg-gray-100 shadow-sm">
                        <i class="fas fa-building text-gray-400 text-5xl mb-4"></i>
                        <h3 class="text-xl font-medium text-gray-700 mb-2">Belum Ada Fasilitas</h3>
                        <p class="text-gray-500">Fasilitas akan segera ditambahkan. Silakan kunjungi kembali nanti.</p>
                    </div>
                </div>
                @endif
            </div>
        </section>
    @endsection
</body> 