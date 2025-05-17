@extends('layouts.guest')


@section('content')
    <!-- Hero Section -->
    <section class="py-20 bg-purple-800 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"
                class="absolute w-full h-full">
                <path fill="#fff"
                    d="M0,128L48,133.3C96,139,192,149,288,149.3C384,149,480,139,576,144C672,149,768,171,864,165.3C960,160,1056,128,1152,122.7C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Paket Wisata Nusantara Edupark</h1>
            <p class="text-xl text-white/80 mb-0">Pengalaman wisata edukatif yang menyenangkan</p>
        </div>
    </section>

    <!-- Packets Grid -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Pilihan Paket Wisata</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Kami menawarkan berbagai paket wisata edukatif yang dirancang
                    untuk berbagai kebutuhan dan preferensi pengunjung.</p>
            </div>

            @if ($packets->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($packets as $packet)
                        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all">
                            <div class="relative h-56 overflow-hidden">
                                <img src="{{ asset('storage/' . $packet->image) }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500"
                                    alt="{{ $packet->title }}">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $packet->title }}</h3>
                                <p class="text-gray-600 mb-4">{!! $packet->detail !!}</p>

                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-users text-purple-600 mr-2"></i>
                                        {{ $packet->capacity ?: 'Kapasitas sesuai paket' }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-clock text-purple-600 mr-2"></i>
                                        {{ $packet->duration ?: 'Durasi bervariasi' }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-tag text-purple-600 mr-2"></i>
                                        {{ $packet->price ?: 'Hubungi kami untuk info harga' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $packets->links() }}
                </div>
            @else
                <div class="text-center py-20">
                    <div class="inline-block p-6 rounded-lg bg-gray-100 shadow-sm">
                        <i class="fas fa-ticket-alt text-gray-400 text-5xl mb-4"></i>
                        <h3 class="text-xl font-medium text-gray-700 mb-2">Belum Ada Paket Wisata</h3>
                        <p class="text-gray-500">Paket wisata akan segera ditambahkan. Silakan kunjungi kembali nanti.
                        </p>
                    </div>
                </div>
            @endif


            <!-- Call to Action -->
            <div id="contact-packet" class="mt-20 text-center py-12 px-6 bg-purple-100 rounded-2xl">
                <h2 class="text-2xl font-bold text-purple-900 mb-4">Butuh Paket Wisata?</h2>
                <p class="text-purple-700 mb-8 max-w-2xl mx-auto">Kami dapat menyesuaikan paket wisata sesuai dengan
                    kebutuhan spesifik Anda. Hubungi tim kami untuk mendiskusikan rencana kunjungan Anda.</p>
                <div class="flex justify-center space-x-4">
                    <a href="https://wa.me/6281939114933?text=Halo%2C%20saya%20mau%20tanya"
                        class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full transition-colors">
                        <i class="fab fa-whatsapp text-xl mr-2"></i> Whatsapp
                    </a>
                    <a href="https://www.traveloka.com/id-id/activities/indonesia/product/nusantara-edupark-madiun-5389237971312"
                        class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-full transition-colors">
                        <i class="fas fa-plane-departure text-xl mr-2"></i> Traveloka
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection