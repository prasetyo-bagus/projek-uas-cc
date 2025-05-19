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
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col group">
                            <div class="relative h-[300px] sm:h-[400px] overflow-hidden group rounded-lg transform scale-95 group-hover:scale-100 transition-transform duration-700 ease-in-out">
                            <div class="absolute inset-0 flex items-center justify-center bg-gray-100">
                                <img src="{{ asset('storage/' . $packet->image) }}" loading="lazy"
                                    class="max-w-full max-h-full object-contain transition-transform duration-700 ease-in-out"
                                    alt="{{ $packet->title }}">
                            </div>

                            <button onclick="document.getElementById('imageModal-{{ $packet->id }}').showModal()"
                                    class="absolute z-10 top-3 right-3 ...">
                                <i class="fas fa-expand mr-1"></i> Lihat
                            </button>

                            <div class="absolute inset-0 z-[1] bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
                                <div class="w-full flex justify-between items-center px-4 pb-3">
                                    <p class="text-white font-medium">
                                        <i class="fas fa-camera mr-2"></i> {{ $packet->title }}
                                    </p>
                                </div>
                            </div>
                            <dialog id="imageModal-{{ $packet->id }}"
                                    class="rounded-xl max-w-5xl sm:mx-auto ... backdrop:bg-black/50"
                                    onclick="handleOutsideClick(event, this)">
                                <div class="relative bg-white rounded-xl shadow-lg overflow-hidden max-h-[90vh]">
                                    <button onclick="document.getElementById('imageModal-{{ $packet->id }}').close()"
                                            class="absolute top-2 right-2 bg-black/60 text-white rounded-full p-1 hover:bg-black z-10">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <img src="{{ asset('storage/' . $packet->image) }}"
                                        alt="{{ $packet->title }}"
                                        class="w-full h-auto max-h-[90vh] object-contain">
                                </div>
                            </dialog>
                        </div>

                            <div class="p-4 sm:p-6 border-b border-gray-200">
                                <h4 class="text-xl sm:text-2xl font-bold text-purple-800 flex items-center mb-1">
                                    {{ $packet->title }}
                                </h4>
                                <p class="font-semibold text-sm">{{ $packet->description }}</p>
                            </div>
                            <div class="p-4 sm:p-6 space-y-4 overflow-y-auto flex-1">
                                <div class="rich-content text-sm text-gray-700 leading-relaxed prose prose-sm sm:prose max-w-none max-h-32 overflow-hidden relative">
                                    {!! $packet->detail !!}
                                    <div class="absolute bottom-0 left-0 w-full h-8 bg-gradient-to-t from-white to-transparent"></div>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div class="flex items-center p-4 bg-purple-50 rounded-md shadow-sm">
                                        <div class="bg-purple-600 text-white p-2 rounded-full mr-3">
                                            <i class="fas fa-calendar-week"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm text-gray-600">Harga Weekday</div>
                                            <div class="text-lg font-bold text-purple-700">
                                                {{ $packet->weekday_price ?: 'Hubungi kami' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center p-4 bg-indigo-50 rounded-md shadow-sm">
                                        <div class="bg-indigo-600 text-white p-2 rounded-full mr-3">
                                            <i class="fas fa-calendar-week"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm text-gray-600">Harga Weekend</div>
                                            <div class="text-lg font-bold text-indigo-700">
                                                {{ $packet->weekend_price ?: 'Hubungi kami' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('packets') }}#contact-packet"
                                            class="w-full bg-purple-600 hover:bg-purple-800 text-white font-medium py-2 px-4 rounded-lg transition-colors text-center inline-flex items-center justify-center">
                                            <i class="fas fa-ticket-alt mr-1"></i> Pesan
                                        </a>
                                    <button onclick="document.getElementById('detailModal-{{ $packet->id }}').showModal()"
                                        class="w-full bg-purple-100 hover:bg-purple-200 text-purple-700 font-medium py-2 px-4 rounded-lg transition-colors">
                                        <i class="fas fa-info-circle mr-1"></i> Selengkapnya
                                    </button>
                                </div>
                            </div>
                        </div>

                        <dialog id="detailModal-{{ $packet->id }}"
                                        class="rounded-xl w-500 max-w-4xl sm:mx-auto mx-2 my-6 sm:my-16 p-0 overflow-hidden backdrop:bg-black/50"
                                        onclick="handleOutsideClick(event, this)">
                                        <div
                                            class="bg-white rounded-xl shadow-lg overflow-hidden max-h-[90vh] flex flex-col">
                                            <!-- Header -->
                                            <div class="p-4 sm:p-6 border-b border-gray-200">
                                                <h4 class="text-xl sm:text-2xl font-bold text-purple-800 flex items-center mb-1">
                                                    </i> {{ $packet->title }}
                                                </h4>
                                                <p class="text-gray-600 text-sm">{{ $packet->description }}</p>
                                            </div>

                                            <!-- Body -->
                                            <div class="p-4 sm:p-6 space-y-4 overflow-y-auto flex-1">
                                                <div
                                                    class="rich-content text-sm text-gray-700 leading-relaxed prose prose-sm sm:prose">
                                                    {!! $packet->detail !!}
                                                </div>

                                                <!-- Harga -->
                                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                                    <div class="flex items-center p-4 bg-purple-50 rounded-md shadow-sm">
                                                        <div class="bg-purple-600 text-white p-2 rounded-full mr-3">
                                                            <i class="fas fa-calendar-week"></i>
                                                        </div>
                                                        <div>
                                                            <div class="text-sm text-gray-600">Harga Weekday</div>
                                                            <div class="text-lg font-bold text-purple-700">
                                                                {{ $packet->weekday_price ?: 'Hubungi kami' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center p-4 bg-indigo-50 rounded-md shadow-sm">
                                                        <div class="bg-indigo-600 text-white p-2 rounded-full mr-3">
                                                            <i class="fas fa-calendar-week"></i>
                                                        </div>
                                                        <div>
                                                            <div class="text-sm text-gray-600">Harga Weekend</div>
                                                            <div class="text-lg font-bold text-indigo-700">
                                                                {{ $packet->weekend_price ?: 'Hubungi kami' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Footer -->
                                            <div
                                                class="px-4 sm:px-6 py-4 bg-gray-50 flex flex-col sm:flex-row justify-end gap-3 border-t">
                                                <button
                                                    onclick="document.getElementById('detailModal-{{ $packet->id }}').close()"
                                                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-md transition w-full sm:w-auto">
                                                    Tutup
                                                </button>
                                                <a href="{{ route('packets') }}#contact-packet"
                                                    class="bg-purple-700 hover:bg-purple-800 text-white py-2 px-4 rounded-md transition font-medium w-full sm:w-auto text-center">
                                                    <i class="fas fa-ticket-alt mr-1"></i> Pesan Sekarang
                                                </a>
                                                <a href="https://wa.me/6281939114933?text=Halo%2C%20saya%20mau%20tanya"
                                                    class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-md transition w-full sm:w-auto"
                                                    target="_blank" rel="noopener noreferrer">
                                                    <i class="fab fa-whatsapp text-xl mr-2"></i> Whatsapp
                                                </a>

                                                <a href="https://www.traveloka.com/id-id/activities/indonesia/product/nusantara-edupark-madiun-5389237971312"
                                                    class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition w-full sm:w-auto"
                                                    target="_blank" rel="noopener noreferrer">
                                                    <i class="fas fa-plane-departure text-xl mr-2"></i> Traveloka
                                                </a>
                                            </div>
                                        </div>
                                    </dialog>
                    @endforeach
                </div>
                <div class="mt-12">
                    {{ $packets->links() }}
                </div>
            @else
                <div class="text-center py-20">
                    <div class="inline-block p-6 rounded-lg bg-gray-100 shadow-sm">
                        <i class="fas fa-ticket-alt text-gray-400 text-5xl mb-4"></i>
                        <h3 class="text-xl font-medium text-gray-700 mb-2">Belum Ada Paket Wisata</h3>
                        <p class="text-gray-500">Paket wisata akan segera ditambahkan. Silakan kunjungi kembali nanti.</p>
                    </div>
                </div>
            @endif

            <!-- Call to Action -->
            <div id="contact-packet" class="mt-20 text-center py-12 px-6 bg-purple-100 rounded-2xl">
                <h2 class="text-2xl font-bold text-purple-900 mb-4">Butuh Paket Wisata?</h2>
                <p class="text-purple-700 mb-8 max-w-2xl mx-auto">Hubungi tim kami untuk mendiskusikan rencana kunjungan Anda.</p>
                <div class="flex justify-center space-x-4">
                    <a href="https://wa.me/6281939114933?text=Halo%2C%20saya%20mau%20tanya"
                        class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-medium py-3 px-6 rounded-full transition-colors">
                        <i class="fab fa-whatsapp text-xl mr-2"></i> Whatsapp
                    </a>
                    <a href="https://www.traveloka.com/id-id/activities/indonesia/product/nusantara-edupark-madiun-5389237971312"
                        class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-6 rounded-full transition-colors">
                        <i class="fas fa-plane-departure text-xl mr-2"></i> Traveloka
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function handleOutsideClick(event, dialog) {
        if (event.target === dialog) {
            dialog.close();
        }
    }
</script>