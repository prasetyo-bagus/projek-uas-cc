@extends('layouts.guest')

<body class="bg-gray-50">
    @section('content')
        <!-- Hero Section -->
        <section class="py-24 bg-gradient-to-br from-green-600 to-green-800 relative overflow-hidden">
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
                    class="inline-block px-4 py-1 rounded-full bg-white/20 backdrop-blur-sm text-white text-sm font-medium mb-4">Explore
                    Our Facilities</span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">Fasilitas <span
                        class="text-yellow-300">Nusantara Edupark</span></h1>
                <p class="text-xl text-white/80 max-w-2xl mx-auto">Berbagai fasilitas modern dan nyaman untuk pengalaman
                    kunjungan yang berkesan</p>
            </div>
        </section>

        <!-- Facilities Grid -->
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                @if ($facilities->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($facilities as $facility)
                            <div
                                class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group border border-gray-100">
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->title }}"
                                        class="w-full h-64 object-cover transform group-hover:scale-110 transition-all duration-500">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end">
                                        <div
                                            class="p-5 translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                            <span
                                                class="bg-green-600 text-white text-xs uppercase tracking-wider py-1 px-2 rounded-md">Facility</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-7">
                                    <h3
                                        class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-green-700 transition-colors">
                                        {{ $facility->title }}
                                    </h3>
                                    <p class="text-gray-600 mb-4 leading-relaxed">{{ $facility->description }}</p>

                                    @if ($facility->detail)
                                        <div
                                            class="p-5 bg-green-50 border border-green-100 rounded-xl mt-5 text-sm text-gray-700">
                                            <h4 class="font-semibold mb-2 text-green-700 flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Detail Fasilitas:
                                            </h4>
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
                    <div class="mt-16 flex justify-center" id="pagination-container">
                        <div class="pagination-wrapper rounded-full overflow-hidden shadow">
                            {{ $facilities->onEachSide(1)->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>
                @else
                    <div class="text-center py-24">
                        <div class="inline-block p-8 rounded-2xl bg-white shadow-md border border-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto text-gray-400 mb-5"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <h3 class="text-2xl font-medium text-gray-700 mb-3">Belum Ada Fasilitas</h3>
                            <p class="text-gray-500">Fasilitas akan segera ditambahkan. Silakan kunjungi kembali nanti.</p>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endsection
</body>
