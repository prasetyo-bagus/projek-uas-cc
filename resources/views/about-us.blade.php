@extends('layouts.guest')

@section('content')
<!-- Hero Section -->
<section class="relative bg-purple-900 text-white py-32">
    <!-- Background Image dengan overlay -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('storage/images/about/hero-bg.jpg') }}');">
        <div class="absolute inset-0 bg-purple-900 opacity-75"></div>
    </div>

    <!-- Icon-icon dekoratif -->
    <div class="absolute inset-0 overflow-hidden opacity-10">
        <i class="fas fa-leaf absolute text-6xl" style="top: 15%; left: 10%;"></i>
        <i class="fas fa-tractor absolute text-7xl" style="top: 60%; left: 15%;"></i>
        <i class="fas fa-cow absolute text-6xl" style="top: 30%; right: 12%;"></i>
        <i class="fas fa-seedling absolute text-5xl" style="top: 70%; right: 20%;"></i>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Tentang Nusantara Edupark</h1>
            <p class="text-xl md:text-2xl text-gray-200">Wisata Edukasi Pertanian, Peternakan, dan Perkebunan</p>
            <div class="mt-10 flex justify-center space-x-4">
               
            </div>
        </div>
    </div>
</section>

<!-- Our History Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <div class="relative">
                    <img src="{{ asset('storage/Logo/LogoNusantara2.png') }}" alt="Sejarah Nusantara Edupark" class="w-3/5 h-auto mx-auto">
                    <div class="absolute -bottom-6 -right-6 bg-purple-600 text-white py-2 px-4 rounded shadow-md">
                        <span class="text-xl font-bold">Sejak 2021</span>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6 relative">
                    <span class="relative z-10">Sejarah Kami</span>
                    <div class="absolute -bottom-2 left-0 h-3 w-20 bg-purple-300 z-0"></div>
                </h2>
                <p class="text-gray-600 mb-6">
                    Nusantara Edupark didirikan pada tahun 2021 dengan visi mengembangkan pariwisata berbasis pendidikan dalam bidang pertanian, peternakan, dan perkebunan. Berawal dari keinginan untuk memperkenalkan kembali sektor agraris kepada masyarakat terutama generasi muda.
                </p>
                <p class="text-gray-600 mb-6">
                    Berlokasi di Jalan Raya Dungus, Kelurahan Munggut, Mojopurno, Kec. Wungu, Kabupaten Madiun, Jawa Timur, Nusantara Edupark hadir dengan konsep wisata yang menggabungkan keseruan berwisata dengan nilai-nilai edukasi yang bermanfaat bagi semua kalangan.
                </p>
                <p class="text-gray-600">
                    Melalui berbagai program wisata edukatif dan pengalaman interaktif, Nusantara Edupark terus berkomitmen untuk menjadi pusat pendidikan informal mengenai pertanian, peternakan, dan perkebunan yang menyenangkan bagi seluruh keluarga.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Our Vision & Mission -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Visi & Misi Kami</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Kami hadir dengan tujuan yang jelas untuk memajukan sektor pertanian, peternakan, dan perkebunan melalui pendekatan edukasi yang menyenangkan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="bg-purple-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-eye text-purple-600 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-center text-gray-800 mb-4">Visi</h3>
                <p class="text-gray-600 text-center">
                    Menjadi destinasi wisata edukasi terdepan di Indonesia yang mengintegrasikan konsep pendidikan, pelestarian lingkungan, dan pengembangan ekonomi lokal berbasis pertanian, peternakan, dan perkebunan.
                </p>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-bullseye text-green-600 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-center text-gray-800 mb-4">Misi</h3>
                <ul class="text-gray-600 space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <span>Menyediakan pengalaman belajar interaktif tentang proses pertanian, peternakan, dan perkebunan.</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <span>Menumbuhkan kesadaran akan pentingnya pelestarian lingkungan dan praktik pertanian berkelanjutan.</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <span>Memberdayakan masyarakat lokal melalui lapangan kerja dan pelatihan keterampilan.</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <span>Mendorong inovasi dan penelitian dalam teknologi pertanian dan peternakan modern.</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <span>Menciptakan destinasi wisata keluarga yang edukatif, menyenangkan, dan berkualitas.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>



<!-- Our Partners & Supporters -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Mitra & Pendukung</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Kami berkolaborasi dengan berbagai instansi dan lembaga untuk menciptakan pengalaman edukatif terbaik.</p>
        </div>

        <div class="flex flex-wrap justify-center items-center gap-10 md:gap-16">
            @forelse ($sponsors ?? [] as $sponsor)
                <div class="group">
                    <a href="{{ $sponsor->detail }}" target="_blank" class="block" title="{{ $sponsor->title }}">
                        <img src="{{ asset('storage/' . $sponsor->image) }}" alt="{{ $sponsor->title }}"
                            class="h-24 md:h-28 filter grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110">
                    </a>
                </div>
            @empty
                <div class="flex flex-wrap justify-center items-center gap-10 md:gap-16">
                    <div class="group">
                        <a href="#" class="block">
                            <img src="{{ asset('storage/images/about/partner-1.png') }}" alt="Partner 1" class="h-24 md:h-28 filter grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110">
                        </a>
                    </div>
                    <div class="group">
                        <a href="#" class="block">
                            <img src="{{ asset('storage/images/about/partner-2.png') }}" alt="Partner 2" class="h-24 md:h-28 filter grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110">
                        </a>
                    </div>
                    <div class="group">
                        <a href="#" class="block">
                            <img src="{{ asset('storage/images/about/partner-3.png') }}" alt="Partner 3" class="h-24 md:h-28 filter grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110">
                        </a>
                    </div>
                    <div class="group">
                        <a href="#" class="block">
                            <img src="{{ asset('storage/images/about/partner-4.png') }}" alt="Partner 4" class="h-24 md:h-28 filter grayscale hover:grayscale-0 transition-all duration-300 hover:scale-110">
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Contact & Location Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6 relative">
                    <span class="relative z-10">Hubungi Kami</span>
                    <div class="absolute -bottom-2 left-0 h-3 w-20 bg-purple-300 z-0"></div>
                </h2>
                <p class="text-gray-600 mb-8">
                    Kami siap melayani Anda untuk informasi lebih lanjut, pemesanan kunjungan kelompok, atau kerjasama lainnya. Jangan ragu untuk menghubungi kami.
                </p>

                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="bg-purple-100 rounded-full p-3 mr-4">
                            <i class="fas fa-map-marker-alt text-purple-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Alamat</h3>
                            <p class="text-gray-600">Jl. Raya Dungus, Kelurahan Munggut, Mojopurno, Kec. Wungu, Kabupaten Madiun, Jawa Timur 63181</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-purple-100 rounded-full p-3 mr-4">
                            <i class="fas fa-phone-alt text-purple-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Telepon</h3>
                            <p class="text-gray-600">081939114933</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-purple-100 rounded-full p-3 mr-4">
                            <i class="fas fa-envelope text-purple-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Email</h3>
                            <p class="text-gray-600">info@nusantaraedupark.id</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-purple-100 rounded-full p-3 mr-4">
                            <i class="fas fa-clock text-purple-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Jam Operasional</h3>
                            <p class="text-gray-600">Senin - Jumat: 08:30 - 16:30</p>
                            <p class="text-gray-600">Sabtu - Minggu: 08:30 - 17:00</p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6 relative">
                    <span class="relative z-10">Lokasi Kami</span>
                    <div class="absolute -bottom-2 left-0 h-3 w-20 bg-purple-300 z-0"></div>
                </h2>
                <div class="rounded-lg overflow-hidden shadow-lg h-96">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.225468086152!2d111.5581496751084!3d-7.658890392357514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bde6649ef6b3%3A0xeb63ac06162d7710!2sNusantara%20Edupark!5e0!3m2!1sid!2sid!4v1746713245419!5m2!1sid!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-purple-900 text-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Menjelajahi Nusantara Edupark?</h2>
        <p class="text-xl text-gray-200 mb-10 max-w-3xl mx-auto">
            Jadwalkan kunjungan Anda untuk pengalaman wisata edukatif yang tak terlupakan bersama keluarga dan teman-teman.
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="{{ route('packets') }}" class="bg-white text-purple-900 hover:bg-gray-200 font-bold py-3 px-8 rounded-full transition-all inline-flex items-center justify-center">
                <i class="fas fa-ticket-alt mr-2"></i> Lihat Paket Wisata
            </a>
        </div>
    </div>
</section>
@endsection 